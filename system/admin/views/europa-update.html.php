<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php

require_once 'system/includes/updater.php';

$CSRF = get_csrf();
$updater = new GitHubUpdater();
$updateCheck = null;
$error = null;

// Güncelleme kontrolü yap
if (isset($_GET['check']) && $_GET['check'] === '1') {
    $updateCheck = $updater->checkForUpdates();
}

// Manuel güncelleme işlemi
if (isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['csrf']) && $_GET['csrf'] === $CSRF) {
    $updateCheck = $updater->checkForUpdates();

    if (isset($updateCheck['has_update']) && $updateCheck['has_update']) {
        $downloadResult = $updater->downloadUpdate($updateCheck['release_info']['download_url']);

        if (isset($downloadResult['error'])) {
            $error = $downloadResult['error'];
        } else {
            $installResult = $updater->extractAndInstall($downloadResult['temp_file']);

            if (isset($installResult['error'])) {
                $error = $installResult['error'];
            } else {
                echo '<div class="alert alert-success">';
                echo '<h4><i class="fa fa-check-circle"></i> Europa Depo Güncelleme Başarılı!</h4>';
                echo '<p>Europa Depo sistemi başarıyla güncellendi. Değişikliklerin etkili olması için cache\'i temizlemeniz önerilir.</p>';
                echo '<div class="mt-3">';
                echo '<a href="' . site_url() . 'admin/clear-cache" class="btn btn-primary me-2"><i class="fa fa-trash"></i> Cache Temizle</a>';
                echo '<a href="' . site_url() . 'admin/europa-update" class="btn btn-secondary"><i class="fa fa-refresh"></i> Yeniden Kontrol Et</a>';
                echo '</div>';
                echo '</div>';
                return;
            }
        }
    }
}

$currentVersion = $updater->getCurrentVersion();
?>

<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2><i class="fa fa-rocket text-primary"></i> Europa Depo Güncelleme Sistemi</h2>
                <p class="text-muted">Europa Depo tema ve özelliklerini GitHub üzerinden güncelleyin</p>
            </div>
            <div>
                <a href="<?= site_url() ?>admin/update" class="btn btn-outline-secondary">
                    <i class="fa fa-code"></i> HTMLy Güncellemesi
                </a>
            </div>
        </div>

        <hr>

        <?php if (isset($_GET['settings']) && $_GET['settings'] === 'saved'): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fa fa-check-circle"></i> <strong>Başarılı!</strong> Europa Depo güncelleme ayarları kaydedildi.
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle"></i> <strong>Hata:</strong> <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5><i class="fa fa-info-circle"></i> Mevcut Versiyon Bilgileri</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Kurulu Versiyon:</strong>
                                    <span class="badge badge-info badge-lg"><?= htmlspecialchars($currentVersion) ?></span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Son Kontrol:</strong>
                                    <?php
                                    $config = $updater->getUpdateConfig();
                                    if (isset($config['last_check']) && $config['last_check']) {
                                        echo '<span class="text-success">' . date('d.m.Y H:i', $config['last_check']) . '</span>';
                                    } else {
                                        echo '<span class="text-warning">Henüz kontrol edilmedi</span>';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="<?= site_url() ?>admin/europa-update?check=1" class="btn btn-info">
                                <i class="fa fa-refresh"></i> Güncelleme Kontrol Et
                            </a>
                        </div>
                    </div>
                </div>

                <?php if ($updateCheck): ?>
                    <?php if (isset($updateCheck['error'])): ?>
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle"></i> <strong>Kontrol Hatası:</strong> <?= htmlspecialchars($updateCheck['error']) ?>
                            <hr>
                            <div class="mt-3">
                                <h6><strong>Çözüm Adımları:</strong></h6>
                                <ol class="small">
                                    <li><strong>GitHub Repository Oluşturun:</strong>
                                        <ul>
                                            <li><a href="https://github.com/new" target="_blank">GitHub'da yeni repository oluşturun</a></li>
                                            <li>Repository adı: <code>europadepo</code></li>
                                            <li>Public olarak oluşturun</li>
                                        </ul>
                                    </li>
                                    <li><strong>İlk Release Oluşturun:</strong>
                                        <ul>
                                            <li>Repository → Releases → "Create a new release"</li>
                                            <li>Tag: <code>v1.0.0</code></li>
                                            <li>Title: <code>Europa Depo v1.0.0</code></li>
                                            <li>Bu projeyi ZIP olarak yükleyin</li>
                                        </ul>
                                    </li>
                                    <li><strong>Ayarları Kontrol Edin:</strong>
                                        <ul>
                                            <li>GitHub kullanıcı adı: <code>salihbyk</code></li>
                                            <li>Repository adı: <code>europadepo</code></li>
                                        </ul>
                                    </li>
                                </ol>

                                <div class="mt-3">
                                    <a href="https://github.com/new" target="_blank" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus"></i> GitHub'da Repository Oluştur
                                    </a>
                                    <a href="https://github.com/salihbyk/europadepo" target="_blank" class="btn btn-info btn-sm">
                                        <i class="fa fa-external-link"></i> Repository'yi Görüntüle
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($updateCheck['has_update']): ?>
                        <div class="alert alert-success border-success">
                            <h4><i class="fa fa-gift text-success"></i> Yeni Europa Depo Güncellemesi Mevcut!</h4>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <p><strong>Mevcut Versiyon:</strong>
                                        <span class="badge badge-secondary"><?= htmlspecialchars($updateCheck['current_version']) ?></span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Yeni Versiyon:</strong>
                                        <span class="badge badge-success"><?= htmlspecialchars($updateCheck['latest_version']) ?></span>
                                    </p>
                                </div>
                            </div>

                            <?php if (!empty($updateCheck['release_info']['name'])): ?>
                                <h5 class="mt-3"><i class="fa fa-tag"></i> <?= htmlspecialchars($updateCheck['release_info']['name']) ?></h5>
                            <?php endif; ?>

                            <?php if (!empty($updateCheck['release_info']['body'])): ?>
                                <div class="release-notes mt-3">
                                    <h6><i class="fa fa-list-ul"></i> Sürüm Notları:</h6>
                                    <div class="border rounded p-3 bg-light">
                                        <?= \Michelf\MarkdownExtra::defaultTransform($updateCheck['release_info']['body']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($updateCheck['release_info']['published_at'])): ?>
                                <p class="mt-2"><strong><i class="fa fa-calendar"></i> Yayın Tarihi:</strong>
                                    <?= date('d.m.Y H:i', strtotime($updateCheck['release_info']['published_at'])) ?>
                                </p>
                            <?php endif; ?>

                            <div class="mt-4">
                                <div class="alert alert-warning">
                                    <i class="fa fa-shield-alt"></i> <strong>Güvenlik Uyarısı:</strong>
                                    Güncelleme yapmadan önce mutlaka yedek alın! Config dosyalarınız ve içerik dosyalarınız korunacaktır ancak beklenmeyen durumlar için yedek almanız önerilir.
                                </div>

                                <div class="btn-group">
                                    <a href="<?= site_url() ?>admin/backup" class="btn btn-warning">
                                        <i class="fa fa-download"></i> Önce Yedek Al
                                    </a>

                                    <a href="<?= site_url() ?>admin/europa-update?action=update&csrf=<?= $CSRF ?>"
                                       class="btn btn-success btn-lg"
                                       onclick="return confirm('Europa Depo güncelleme işlemini başlatmak istediğinizden emin misiniz?\n\nBu işlem:\n• Tema dosyalarını güncelleyecek\n• Sistem dosyalarını güncelleyecek\n• Config dosyalarını koruyacak\n• İçerik dosyalarını koruyacak\n\nİşlem birkaç dakika sürebilir.')">
                                        <i class="fa fa-rocket"></i> Europa Depo Güncellemesini Başlat
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info">
                            <h4><i class="fa fa-check-circle text-success"></i> Europa Depo Sisteminiz Güncel!</h4>
                            <p>Mevcut versiyon: <strong><?= htmlspecialchars($updateCheck['current_version']) ?></strong></p>
                            <p>Son versiyon: <strong><?= htmlspecialchars($updateCheck['latest_version']) ?></strong></p>
                            <p class="mb-0">Yeni bir Europa Depo güncellemesi mevcut değil.</p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h5><i class="fa fa-cogs"></i> Güncelleme Ayarları</h5>
                    </div>
                    <div class="card-body">
                        <?php $config = $updater->getUpdateConfig(); ?>

                        <form method="post" action="<?= site_url() ?>admin/europa-update-settings">
                            <input type="hidden" name="csrf" value="<?= $CSRF ?>">

                            <div class="mb-3">
                                <label class="form-label"><strong>GitHub Repository Sahibi:</strong></label>
                                <input type="text" name="github_owner" class="form-control"
                                       value="<?= htmlspecialchars($config['github_settings']['owner'] ?? 'salihbyk') ?>"
                                       placeholder="örn: salihbyk">
                                <small class="form-text text-muted">GitHub kullanıcı adınız</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>GitHub Repository Adı:</strong></label>
                                <input type="text" name="github_repo" class="form-control"
                                       value="<?= htmlspecialchars($config['github_settings']['repo'] ?? '') ?>"
                                       placeholder="örn: europadepo">
                                <small class="form-text text-muted">Repository adınız</small>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="backup_before_update" class="form-check-input"
                                           <?= ($config['backup_before_update'] ?? true) ? 'checked' : '' ?>>
                                    <label class="form-check-label">Güncelleme öncesi otomatik yedekleme</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="auto_update_enabled" class="form-check-input"
                                           <?= ($config['auto_update_enabled'] ?? false) ? 'checked' : '' ?>>
                                    <label class="form-check-label">Otomatik güncelleme bildirimleri</label>
                                </div>
                                <small class="form-text text-muted">Admin panelinde güncelleme bildirimleri göster</small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-save"></i> Ayarları Kaydet
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-info text-white">
                        <h6><i class="fa fa-info"></i> Bilgi</h6>
                    </div>
                    <div class="card-body">
                        <small>
                            <p><strong>Europa Depo Güncelleme Sistemi</strong></p>
                            <p>Bu sistem sadece Europa Depo tema ve özelliklerini günceller. HTMLy CMS'in kendisini güncellemez.</p>
                            <p>HTMLy güncellemesi için <a href="<?= site_url() ?>admin/update">HTMLy Güncelleme</a> sayfasını kullanın.</p>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.release-notes {
    margin: 15px 0;
}
.release-notes h6 {
    margin-bottom: 10px;
    font-weight: bold;
}
.card {
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.alert {
    margin-bottom: 20px;
}
.badge-lg {
    font-size: 1em;
    padding: 0.5em 0.75em;
}
.btn-group .btn {
    margin-right: 10px;
}
.btn-group .btn:last-child {
    margin-right: 0;
}
</style>
