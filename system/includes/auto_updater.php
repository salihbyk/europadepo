<?php
if (!defined('HTMLY')) die('HTMLy');

require_once 'updater.php';

class AutoUpdater {
    
    private $updater;
    private $config;
    
    public function __construct() {
        $this->updater = new GitHubUpdater();
        $this->config = $this->updater->getUpdateConfig();
    }
    
    public function shouldCheckForUpdates() {
        if (!isset($this->config['auto_update_enabled']) || !$this->config['auto_update_enabled']) {
            return false;
        }
        
        $lastCheck = $this->config['last_check'] ?? 0;
        $interval = $this->config['check_update_interval'] ?? 86400; // 24 saat
        
        return (time() - $lastCheck) >= $interval;
    }
    
    public function checkAndNotify() {
        if (!$this->shouldCheckForUpdates()) {
            return null;
        }
        
        $updateCheck = $this->updater->checkForUpdates();
        
        if (isset($updateCheck['has_update']) && $updateCheck['has_update']) {
            // Admin panelinde bildirim göstermek için session'a kaydet
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['europa_update_notification'] = [
                'has_update' => true,
                'current_version' => $updateCheck['current_version'],
                'latest_version' => $updateCheck['latest_version'],
                'release_name' => $updateCheck['release_info']['name'] ?? '',
                'timestamp' => time()
            ];
            
            return $updateCheck;
        }
        
        return null;
    }
    
    public function getNotification() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_SESSION['europa_update_notification'])) {
            $notification = $_SESSION['europa_update_notification'];
            
            // 7 gün sonra bildirimi temizle
            if ((time() - $notification['timestamp']) > (7 * 24 * 60 * 60)) {
                unset($_SESSION['europa_update_notification']);
                return null;
            }
            
            return $notification;
        }
        
        return null;
    }
    
    public function dismissNotification() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        unset($_SESSION['europa_update_notification']);
    }
    
    public function enableAutoUpdate($enabled = true) {
        $newConfig = ['auto_update_enabled' => $enabled];
        return $this->updater->updateConfig($newConfig);
    }
    
    public function setCheckInterval($hours = 24) {
        $newConfig = ['check_update_interval' => $hours * 3600];
        return $this->updater->updateConfig($newConfig);
    }
}

// Admin panelinde otomatik kontrol
function check_for_updates_admin() {
    if (!login()) {
        return;
    }
    
    $user = $_SESSION[site_url()]['user'];
    $role = user('role', $user);
    
    if ($role !== 'admin') {
        return;
    }
    
    $autoUpdater = new AutoUpdater();
    $autoUpdater->checkAndNotify();
}

// Admin panelinde bildirim göster
function show_update_notification() {
    if (!login()) {
        return '';
    }
    
    $user = $_SESSION[site_url()]['user'];
    $role = user('role', $user);
    
    if ($role !== 'admin') {
        return '';
    }
    
    $autoUpdater = new AutoUpdater();
    $notification = $autoUpdater->getNotification();
    
    if (!$notification || !$notification['has_update']) {
        return '';
    }
    
    $html = '<div class="alert alert-info alert-dismissible fade show update-notification" role="alert">';
    $html .= '<div class="d-flex align-items-center">';
    $html .= '<i class="fa fa-info-circle fa-2x me-3 text-primary"></i>';
    $html .= '<div class="flex-grow-1">';
    $html .= '<h6 class="alert-heading mb-1">🎉 Yeni Güncelleme Mevcut!</h6>';
    $html .= '<p class="mb-1">';
    $html .= 'Mevcut: <strong>' . htmlspecialchars($notification['current_version']) . '</strong> → ';
    $html .= 'Yeni: <strong>' . htmlspecialchars($notification['latest_version']) . '</strong>';
    $html .= '</p>';
    
    if (!empty($notification['release_name'])) {
        $html .= '<small class="text-muted">' . htmlspecialchars($notification['release_name']) . '</small>';
    }
    
    $html .= '</div>';
    $html .= '<div class="ms-3">';
    $html .= '<a href="' . site_url() . 'admin/update" class="btn btn-primary btn-sm me-2">';
    $html .= '<i class="fa fa-download"></i> Güncelle';
    $html .= '</a>';
    $html .= '<button type="button" class="btn btn-outline-secondary btn-sm" onclick="dismissUpdateNotification()">';
    $html .= '<i class="fa fa-times"></i>';
    $html .= '</button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    
    $html .= '<script>';
    $html .= 'function dismissUpdateNotification() {';
    $html .= '  fetch("' . site_url() . 'admin/dismiss-update-notification", {';
    $html .= '    method: "POST",';
    $html .= '    headers: { "Content-Type": "application/json" },';
    $html .= '    body: JSON.stringify({ action: "dismiss" })';
    $html .= '  }).then(() => {';
    $html .= '    document.querySelector(".update-notification").style.display = "none";';
    $html .= '  });';
    $html .= '}';
    $html .= '</script>';
    
    return $html;
}

