<?php
if (!defined('HTMLY')) die('HTMLy');

class GitHubUpdater {

    private $config;
    private $version;
    private $updateConfig;

    public function __construct() {
        $this->loadConfigs();
    }

    private function loadConfigs() {
        // Version bilgilerini yükle
        if (file_exists('version.json')) {
            $this->version = json_decode(file_get_contents('version.json'), true);
        } else {
            $this->version = ['version' => '1.0.0'];
        }

        // Update config'ini yükle
        if (file_exists('update_config.json')) {
            $this->updateConfig = json_decode(file_get_contents('update_config.json'), true);
        } else {
            $this->updateConfig = ['auto_update_enabled' => false];
        }
    }

    public function getCurrentVersion() {
        return $this->version['version'] ?? '1.0.0';
    }

    public function checkForUpdates() {
        if (!isset($this->updateConfig['github_settings'])) {
            return ['error' => 'GitHub ayarları bulunamadı'];
        }

        $owner = $this->updateConfig['github_settings']['owner'];
        $repo = $this->updateConfig['github_settings']['repo'];

        $url = "https://api.github.com/repos/{$owner}/{$repo}/releases/latest";

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: EuropaDepo-Updater/1.0 (salihbyk/europadepo)',
                    'Accept: application/vnd.github.v3+json'
                ],
                'timeout' => 30,
                'ignore_errors' => true
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false
            ]
        ]);

        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            $error = error_get_last();
            $errorMsg = 'GitHub API\'ye erişim sağlanamadı';
            if ($error && isset($error['message'])) {
                $errorMsg .= ': ' . $error['message'];
            }

            // HTTP response headers kontrol et
            if (isset($http_response_header)) {
                $statusLine = $http_response_header[0] ?? '';
                if (strpos($statusLine, '404') !== false) {
                    $errorMsg = 'GitHub repository bulunamadı. Repository ayarlarını kontrol edin.';
                } elseif (strpos($statusLine, '403') !== false) {
                    $errorMsg = 'GitHub API rate limit aşıldı veya erişim reddedildi.';
                } elseif (strpos($statusLine, '500') !== false) {
                    $errorMsg = 'GitHub sunucu hatası. Lütfen daha sonra tekrar deneyin.';
                }
            }

            return ['error' => $errorMsg];
        }

        $data = json_decode($response, true);

        if (!$data) {
            return ['error' => 'GitHub API yanıtı JSON formatında değil'];
        }

        if (isset($data['message'])) {
            if ($data['message'] === 'Not Found') {
                return ['error' => 'GitHub repository bulunamadı veya henüz release oluşturulmamış. Lütfen GitHub\'da ilk release\'i oluşturun.'];
            } else {
                return ['error' => 'GitHub API Hatası: ' . $data['message']];
            }
        }

        if (!isset($data['tag_name'])) {
            return ['error' => 'GitHub\'dan geçersiz release yanıtı alındı'];
        }

        $latestVersion = ltrim($data['tag_name'], 'v');
        $currentVersion = $this->getCurrentVersion();

        // Son kontrol zamanını güncelle
        $this->updateConfig['last_check'] = time();
        file_put_contents('update_config.json', json_encode($this->updateConfig, JSON_PRETTY_PRINT));

        return [
            'current_version' => $currentVersion,
            'latest_version' => $latestVersion,
            'has_update' => version_compare($latestVersion, $currentVersion, '>'),
            'release_info' => [
                'name' => $data['name'] ?? '',
                'body' => $data['body'] ?? '',
                'published_at' => $data['published_at'] ?? '',
                'download_url' => $data['zipball_url'] ?? ''
            ]
        ];
    }

    public function downloadUpdate($downloadUrl) {
        if (!$downloadUrl) {
            return ['error' => 'İndirme URL\'si bulunamadı'];
        }

        // Backup oluştur
        if ($this->updateConfig['backup_before_update']) {
            $backupResult = $this->createBackup();
            if (isset($backupResult['error'])) {
                return $backupResult;
            }
        }

        $tempFile = sys_get_temp_dir() . '/europadepo_update_' . time() . '.zip';

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: EuropaDepo-Updater/1.0 (salihbyk/europadepo)',
                    'Accept: application/octet-stream'
                ],
                'timeout' => 300,
                'ignore_errors' => true
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false
            ]
        ]);

        $zipContent = @file_get_contents($downloadUrl, false, $context);

        if ($zipContent === false) {
            $error = error_get_last();
            $errorMsg = 'Güncelleme dosyası indirilemedi';
            if ($error && isset($error['message'])) {
                $errorMsg .= ': ' . $error['message'];
            }

            // HTTP response headers kontrol et
            if (isset($http_response_header)) {
                $statusLine = $http_response_header[0] ?? '';
                error_log("Download Debug - HTTP Status: $statusLine");
                if (strpos($statusLine, '404') !== false) {
                    $errorMsg = 'Release dosyası GitHub\'da bulunamadı (404). Release oluşturulmuş mu?';
                } elseif (strpos($statusLine, '403') !== false) {
                    $errorMsg = 'GitHub erişim reddedildi (403). Repository private mi?';
                }
            }

            return ['error' => $errorMsg];
        }

        // İndirilen içeriği kontrol et
        $contentLength = strlen($zipContent);
        error_log("Download Debug - Content length: $contentLength bytes");
        error_log("Download Debug - First 100 chars: " . substr($zipContent, 0, 100));

        if ($contentLength < 1024) {
            return ['error' => 'İndirilen dosya çok küçük (' . $contentLength . ' bytes). Muhtemelen hata mesajı: ' . substr($zipContent, 0, 200)];
        }

        // ZIP header kontrolü (PK signature)
        if (substr($zipContent, 0, 2) !== 'PK') {
            return ['error' => 'İndirilen dosya ZIP formatında değil. İlk karakterler: ' . bin2hex(substr($zipContent, 0, 10))];
        }

        if (file_put_contents($tempFile, $zipContent) === false) {
            return ['error' => 'Geçici dosya oluşturulamadı: ' . $tempFile];
        }

        error_log("Download Debug - Temp file created: $tempFile (" . filesize($tempFile) . " bytes)");

        return ['temp_file' => $tempFile];
    }

    public function extractAndInstall($tempFile) {
        if (!file_exists($tempFile)) {
            return ['error' => 'Geçici dosya bulunamadı'];
        }

        // Dosya boyutunu ve türünü kontrol et
        $fileSize = filesize($tempFile);
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($fileInfo, $tempFile);
        finfo_close($fileInfo);

        // Debug bilgileri
        error_log("Update Debug - Temp file: $tempFile");
        error_log("Update Debug - File size: $fileSize bytes");
        error_log("Update Debug - MIME type: $mimeType");

        // Dosya boyutu kontrolü
        if ($fileSize < 1024) { // 1KB'den küçükse muhtemelen hata mesajı
            $content = file_get_contents($tempFile);
            unlink($tempFile);
            return ['error' => 'İndirilen dosya çok küçük (muhtemelen hata mesajı): ' . substr($content, 0, 200)];
        }

        // MIME type kontrolü
        if (!in_array($mimeType, ['application/zip', 'application/x-zip-compressed', 'application/octet-stream'])) {
            $content = file_get_contents($tempFile);
            unlink($tempFile);
            return ['error' => 'İndirilen dosya ZIP formatında değil. MIME: ' . $mimeType . '. İçerik: ' . substr($content, 0, 200)];
        }

        $zip = new ZipArchive();
        $extractPath = sys_get_temp_dir() . '/europadepo_extract_' . time();

        $zipResult = $zip->open($tempFile);
        if ($zipResult !== TRUE) {
            $zipErrors = [
                ZipArchive::ER_OK => 'No error',
                ZipArchive::ER_MULTIDISK => 'Multi-disk zip archives not supported',
                ZipArchive::ER_RENAME => 'Renaming temporary file failed',
                ZipArchive::ER_CLOSE => 'Closing zip archive failed',
                ZipArchive::ER_SEEK => 'Seek error',
                ZipArchive::ER_READ => 'Read error',
                ZipArchive::ER_WRITE => 'Write error',
                ZipArchive::ER_CRC => 'CRC error',
                ZipArchive::ER_ZIPCLOSED => 'Containing zip archive was closed',
                ZipArchive::ER_NOENT => 'No such file',
                ZipArchive::ER_EXISTS => 'File already exists',
                ZipArchive::ER_OPEN => 'Can\'t open file',
                ZipArchive::ER_TMPOPEN => 'Failure to create temporary file',
                ZipArchive::ER_ZLIB => 'Zlib error',
                ZipArchive::ER_MEMORY => 'Memory allocation failure',
                ZipArchive::ER_CHANGED => 'Entry has been changed',
                ZipArchive::ER_COMPNOTSUPP => 'Compression method not supported',
                ZipArchive::ER_EOF => 'Premature EOF',
                ZipArchive::ER_INVAL => 'Invalid argument',
                ZipArchive::ER_NOZIP => 'Not a zip archive',
                ZipArchive::ER_INTERNAL => 'Internal error',
                ZipArchive::ER_INCONS => 'Zip archive inconsistent',
                ZipArchive::ER_REMOVE => 'Can\'t remove file',
                ZipArchive::ER_DELETED => 'Entry has been deleted'
            ];

            $errorMsg = $zipErrors[$zipResult] ?? 'Bilinmeyen ZIP hatası: ' . $zipResult;
            unlink($tempFile);
            return ['error' => 'ZIP dosyası açılamadı: ' . $errorMsg . ' (Kod: ' . $zipResult . ')'];
        }

        if (!$zip->extractTo($extractPath)) {
            $zip->close();
            unlink($tempFile);
            return ['error' => 'ZIP dosyası çıkarılamadı'];
        }

        $zip->close();
        unlink($tempFile);

        // GitHub'dan indirilen dosyalar genelde bir alt klasörde olur
        $extractedDirs = glob($extractPath . '/*', GLOB_ONLYDIR);
        if (!empty($extractedDirs)) {
            $extractPath = $extractedDirs[0];
        }

        // Dosyaları kopyala (korumalı dosyaları atla ve sadece değişenleri yaz)
        $result = $this->copyFiles($extractPath, getcwd());

        // Geçici klasörü temizle
        $this->removeDirectory($extractPath);

        if (isset($result['error'])) {
            return $result;
        }

        // Version dosyasını güncelle
        $this->updateVersionFile();

        return [
            'success' => true,
            'message' => 'Güncelleme başarıyla tamamlandı',
            'changed' => $result['changed'] ?? [],
            'added' => $result['added'] ?? []
        ];
    }

    private function copyFiles($source, $destination) {
        if (!is_dir($source)) {
            return ['error' => 'Kaynak klasör bulunamadı'];
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );

        $changedFiles = [];
        $addedFiles = [];

        foreach ($iterator as $item) {
            $relativePath = str_replace($source . DIRECTORY_SEPARATOR, '', $item->getPathname());
            $relativePath = str_replace('\\', '/', $relativePath);

            // Korumalı dosya kontrolü
            if ($this->isProtectedFile($relativePath)) {
                continue;
            }

            $destPath = $destination . DIRECTORY_SEPARATOR . $relativePath;

            if ($item->isDir()) {
                if (!is_dir($destPath)) {
                    mkdir($destPath, 0755, true);
                }
            } else {
                $destDir = dirname($destPath);
                if (!is_dir($destDir)) {
                    mkdir($destDir, 0755, true);
                }
                // Yalnızca değişen dosyaları yaz
                if (file_exists($destPath)) {
                    $srcHash = @md5_file($item->getPathname());
                    $dstHash = @md5_file($destPath);
                    if ($srcHash !== $dstHash) {
                        copy($item->getPathname(), $destPath);
                        $changedFiles[] = $relativePath;
                    }
                } else {
                    copy($item->getPathname(), $destPath);
                    $addedFiles[] = $relativePath;
                }
            }
        }

        return [
            'success' => true,
            'changed' => $changedFiles,
            'added' => $addedFiles
        ];
    }

    private function isProtectedFile($filePath) {
        // Varsayılan korunacak yollar (veri ve kullanıcı yapılandırmaları)
        $defaultFiles = [
            'config/config.ini',
            'version.json',
            'update_config.json'
        ];
        $defaultDirs = [
            'content/',         // Tüm yazılar/sayfalar/kategoriler
            'config/users/',    // Kullanıcılar
            'cache/'            // Cache
        ];

        $protectedFiles = $this->updateConfig['protected_files'] ?? [];
        $protectedDirs = $this->updateConfig['protected_directories'] ?? [];

        // Birleştir ve tekilleştir
        $protectedFiles = array_values(array_unique(array_merge($defaultFiles, $protectedFiles)));
        $protectedDirs  = array_values(array_unique(array_merge($defaultDirs, $protectedDirs)));

        // Dosya kontrolü
        foreach ($protectedFiles as $protected) {
            if (strpos($filePath, $protected) === 0) {
                return true;
            }
        }

        // Klasör kontrolü
        foreach ($protectedDirs as $protected) {
            if (strpos($filePath, $protected) === 0) {
                return true;
            }
        }

        return false;
    }

    private function createBackup() {
        $backupDir = $this->updateConfig['backup_directory'] ?? 'backups/';
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $backupFile = $backupDir . 'backup_' . date('Y-m-d_H-i-s') . '.zip';

        $zip = new ZipArchive();
        if ($zip->open($backupFile, ZipArchive::CREATE) !== TRUE) {
            return ['error' => 'Backup dosyası oluşturulamadı'];
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator('.', RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            $relativePath = str_replace('./', '', $file->getPathname());
            $relativePath = str_replace('\\', '/', $relativePath);

            // Backup klasörünü ve cache'i backup'a dahil etme
            if (strpos($relativePath, 'backups/') === 0 || strpos($relativePath, 'cache/') === 0) {
                continue;
            }

            if ($file->isFile()) {
                $zip->addFile($file->getPathname(), $relativePath);
            }
        }

        $zip->close();

        return ['success' => true, 'backup_file' => $backupFile];
    }

    private function updateVersionFile() {
        // GitHub'dan yeni version.json varsa onu kullan, yoksa mevcut versiyonu güncelle
        if (!file_exists('version.json')) {
            $newVersion = [
                'version' => '1.0.0',
                'build' => date('YmdHis'),
                'release_date' => date('Y-m-d'),
                'description' => 'Güncelleme tamamlandı'
            ];
            file_put_contents('version.json', json_encode($newVersion, JSON_PRETTY_PRINT));
        }
    }

    private function removeDirectory($dir) {
        if (!is_dir($dir)) {
            return;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                rmdir($file->getPathname());
            } else {
                unlink($file->getPathname());
            }
        }

        rmdir($dir);
    }

    public function getUpdateConfig() {
        return $this->updateConfig;
    }

    public function updateConfig($newConfig) {
        $this->updateConfig = array_merge($this->updateConfig, $newConfig);
        return file_put_contents('update_config.json', json_encode($this->updateConfig, JSON_PRETTY_PRINT));
    }
}

