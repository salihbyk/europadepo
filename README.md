# Europa Depo - Eşya Depolama Sistemi

Modern, güvenli ve kullanıcı dostu eşya depolama web sitesi. HTMLy CMS tabanlı, otomatik güncelleme sistemi ile.

## Özellikler

### 🏢 İş Özellikleri
- **Çoklu Depolama Türleri**: Ev eşyası, ticari, arşiv, e-ticaret, medikal, sanat-antika depolama
- **Self Storage Çözümleri**: Kişisel depolama alanları
- **Paletli Depolama**: Endüstriyel depolama çözümleri
- **Modern Tema**: Responsive, mobil uyumlu tasarım

### 🔧 Teknik Özellikler
- **HTMLy CMS**: Hızlı, güvenli, dosya tabanlı CMS
- **Otomatik Güncelleme**: GitHub entegrasyonu ile otomatik sistem güncellemeleri
- **Config Koruması**: Güncelleme sırasında ayarlar ve içerik korunur
- **Yedekleme Sistemi**: Otomatik yedekleme öncesi güncelleme
- **Admin Paneli**: Gelişmiş yönetim arayüzü

## Kurulum

### Gereksinimler
- PHP 7.4 veya üzeri
- Web server (Apache/Nginx)
- ZIP extension
- JSON extension

### Adımlar
1. Projeyi indirin veya klonlayın
2. Web sunucunuzun document root'una yerleştirin
3. `config/config.ini.example` dosyasını `config/config.ini` olarak kopyalayın
4. `config/users/username.ini.example` dosyasını kopyalayın ve admin kullanıcısı oluşturun
5. Web tarayıcınızdan siteye erişin

## Güncelleme Sistemi

### Europa Depo Otomatik Güncelleme
1. Admin panelinden **Europa Depo Güncelleme** bölümüne gidin
2. GitHub repository ayarları (önceden yapılandırılmış):
   - Repository sahibi: `salihbyk`
   - Repository adı: `europadepo`
3. **Güncelleme Kontrol Et** butonuna tıklayın
4. Yeni versiyon varsa **Europa Depo Güncellemesini Başlat** butonuna tıklayın

### HTMLy CMS Güncelleme
HTMLy CMS'in kendisini güncellemek için:
1. Admin panelinden **HTMLy Güncelleme** bölümüne gidin
2. HTMLy'nin kendi güncelleme sistemini kullanın

**Not:** Europa Depo güncellemesi ile HTMLy güncellemesi birbirinden bağımsızdır.

### Manuel Güncelleme
1. GitHub'dan son sürümü indirin
2. Dosyaları çıkarın (config ve content klasörlerini koruyun)
3. Eski dosyaların üzerine kopyalayın
4. Admin panelinden cache'i temizleyin

### Korunan Dosyalar
Güncelleme sırasında bu dosya/klasörler korunur:
- `config/config.ini`
- `config/users/`
- `content/`
- `cache/`
- `version.json`
- `update_config.json`

## Versiyon Yönetimi

### Yeni Versiyon Çıkarma
1. `version.json` dosyasını güncelleyin
2. CHANGELOG'u güncelleyin
3. Git tag oluşturun: `git tag v1.1.0`
4. GitHub'a push edin: `git push origin v1.1.0`
5. GitHub Releases'den release oluşturun

### Versiyon Numaralandırma
- **Major.Minor.Patch** formatı kullanılır
- **Major**: Büyük değişiklikler, uyumsuzluk
- **Minor**: Yeni özellikler, geriye uyumlu
- **Patch**: Bug fix'ler, küçük düzeltmeler

## Geliştirme

### Klasör Yapısı
```
europadepo/
├── config/                 # Konfigürasyon dosyaları
├── content/                # İçerik dosyaları
├── system/                 # Sistem dosyaları
│   ├── admin/             # Admin paneli
│   ├── includes/          # PHP include dosyaları
│   └── resources/         # CSS, JS, resimler
├── themes/                # Tema dosyaları
├── version.json           # Versiyon bilgisi
├── update_config.json     # Güncelleme ayarları
└── README.md             # Bu dosya
```

### Tema Geliştirme
- `themes/yenidepo-htmly/` klasöründe tema dosyaları
- Modern, responsive tasarım
- Bootstrap tabanlı
- Mobil uyumlu

## Güvenlik

### Güvenlik Önlemleri
- Admin paneli login koruması
- CSRF token koruması
- File upload kısıtlamaları
- Path traversal koruması
- Config dosyası koruması

### Güvenlik Güncellemeleri
- Düzenli güvenlik güncellemeleri takip edin
- Otomatik güncelleme sistemini kullanın
- Yedekleme alın

## Destek

### Sorun Bildirimi
- GitHub Issues kullanın
- Detaylı açıklama yazın
- Sistem bilgilerini ekleyin

### Katkıda Bulunma
1. Fork edin
2. Feature branch oluşturun
3. Değişiklikleri commit edin
4. Pull request gönderin

## Lisans

Bu proje MIT lisansı altında lisanslanmıştır.

## Changelog

### v1.0.0 (2025-09-19)
- İlk versiyon
- HTMLy CMS entegrasyonu
- Otomatik güncelleme sistemi
- Modern tema tasarımı
- Çoklu depolama türü desteği
- Admin paneli entegrasyonu

---

**Europa Depo** - Güvenli Eşya Depolama Çözümleri