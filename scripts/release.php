<?php
/**
 * Europa Depo Release Script
 * GitHub release oluşturmak için kullanılır
 */

if (php_sapi_name() !== 'cli') {
    die('Bu script sadece komut satırından çalıştırılabilir.');
}

// Parametreleri al
$options = getopt('v:m:', ['version:', 'message:']);

if (!isset($options['v']) && !isset($options['version'])) {
    echo "Kullanım: php release.php -v <versiyon> [-m <mesaj>]\n";
    echo "Örnek: php release.php -v 1.1.0 -m 'Yeni özellikler eklendi'\n";
    exit(1);
}

$version = $options['v'] ?? $options['version'];
$message = $options['m'] ?? $options['message'] ?? "Versiyon $version yayınlandı";

// Versiyon formatını kontrol et
if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
    echo "Hata: Versiyon formatı geçersiz. Format: X.Y.Z (örn: 1.2.3)\n";
    exit(1);
}

echo "Europa Depo Release Script\n";
echo "==========================\n";
echo "Versiyon: $version\n";
echo "Mesaj: $message\n";
echo "\n";

// version.json dosyasını güncelle
echo "1. version.json güncelleniyor...\n";

$versionFile = 'version.json';
if (!file_exists($versionFile)) {
    echo "Hata: version.json dosyası bulunamadı!\n";
    exit(1);
}

$versionData = json_decode(file_get_contents($versionFile), true);
if (!$versionData) {
    echo "Hata: version.json dosyası geçersiz!\n";
    exit(1);
}

// Versiyon bilgilerini güncelle
$versionData['version'] = $version;
$versionData['build'] = date('YmdHis');
$versionData['release_date'] = date('Y-m-d');
$versionData['description'] = $message;

// Changelog'a ekle
if (!isset($versionData['changelog'])) {
    $versionData['changelog'] = [];
}

array_unshift($versionData['changelog'], [
    'version' => $version,
    'date' => date('Y-m-d'),
    'changes' => explode(', ', $message)
]);

// Dosyayı kaydet
file_put_contents($versionFile, json_encode($versionData, JSON_PRETTY_PRINT));
echo "✓ version.json güncellendi\n";

// Git kontrolü
echo "\n2. Git durumu kontrol ediliyor...\n";

// Git status kontrolü
exec('git status --porcelain', $output, $return);
if (!empty($output)) {
    echo "Uyarı: Commit edilmemiş değişiklikler var:\n";
    foreach ($output as $line) {
        echo "  $line\n";
    }
    
    echo "\nDevam etmek istiyor musunuz? (y/n): ";
    $handle = fopen("php://stdin", "r");
    $confirm = trim(fgets($handle));
    fclose($handle);
    
    if (strtolower($confirm) !== 'y') {
        echo "İşlem iptal edildi.\n";
        exit(1);
    }
}

// Git add ve commit
echo "\n3. Git commit yapılıyor...\n";
exec("git add .");
exec("git commit -m 'Release v$version: $message'", $output, $return);

if ($return !== 0) {
    echo "Uyarı: Git commit başarısız oldu veya commit edilecek değişiklik yok.\n";
} else {
    echo "✓ Git commit tamamlandı\n";
}

// Git tag oluştur
echo "\n4. Git tag oluşturuluyor...\n";
exec("git tag -a v$version -m 'Version $version'", $output, $return);

if ($return !== 0) {
    echo "Hata: Git tag oluşturulamadı!\n";
    exit(1);
}
echo "✓ Git tag v$version oluşturuldu\n";

// Git push
echo "\n5. Git push yapılıyor...\n";
exec("git push origin main", $output, $return);
if ($return !== 0) {
    echo "Uyarı: Git push (main) başarısız oldu.\n";
} else {
    echo "✓ Git push (main) tamamlandı\n";
}

exec("git push origin v$version", $output, $return);
if ($return !== 0) {
    echo "Hata: Git push (tag) başarısız oldu!\n";
    exit(1);
}
echo "✓ Git push (tag) tamamlandı\n";

// GitHub Release oluşturma talimatları
echo "\n6. GitHub Release oluşturma:\n";
echo "   a) GitHub repository'nize gidin\n";
echo "   b) 'Releases' sekmesine tıklayın\n";
echo "   c) 'Create a new release' butonuna tıklayın\n";
echo "   d) Tag: v$version\n";
echo "   e) Title: Europa Depo v$version\n";
echo "   f) Description: $message\n";
echo "   g) 'Publish release' butonuna tıklayın\n";

echo "\n✅ Release işlemi tamamlandı!\n";
echo "Versiyon: v$version\n";
echo "Tag: v$version\n";
echo "Commit: Release v$version: $message\n";
echo "\nGitHub'da release oluşturmayı unutmayın!\n";

