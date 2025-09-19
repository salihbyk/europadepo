# 🎉 Europa Depo v1.0.0 - İlk Versiyon

Ankara'nın en güvenilir eşya depolama sisteminin ilk versiyonu yayında!

## ✨ Özellikler

### 🏢 İş Özellikleri
- **Çoklu Depolama Türleri**: Ev eşyası, ticari, arşiv, e-ticaret, medikal, sanat-antika
- **Self Storage Çözümleri**: Kişisel depolama alanları
- **Paletli Depolama**: Endüstriyel depolama çözümleri
- **Modern Responsive Tema**: Mobil uyumlu, hızlı yüklenen tasarım

### 🔧 Teknik Özellikler
- **HTMLy CMS**: Hızlı, güvenli, dosya tabanlı içerik yönetimi
- **GitHub Otomatik Güncelleme**: Tek tıkla sistem güncellemesi
- **Config Koruması**: Güncelleme sırasında ayarlar ve içerik korunur
- **Otomatik Yedekleme**: Güncelleme öncesi otomatik backup
- **Gelişmiş Admin Paneli**: Kolay yönetim arayüzü

## 🛡️ Güvenlik

- ✅ Config dosyaları korunması (`config/config.ini`, `config/users/`)
- ✅ İçerik dosyaları korunması (`content/`)
- ✅ CSRF token koruması
- ✅ Path traversal koruması
- ✅ File upload güvenliği

## 📋 Kurulum

### Hızlı Kurulum
1. **ZIP dosyasını indirin** ve web sunucunuza çıkarın
2. **Config ayarları**: `config/config.ini.example` → `config/config.ini`
3. **Admin kullanıcısı**: `config/users/username.ini.example` dosyasını kopyalayın
4. **Veritabanı**: Dosya tabanlı, veritabanı kurulumu gerekmez
5. **Hazır**: Web tarayıcınızdan erişin!

### Sistem Gereksinimleri
- PHP 7.4 veya üzeri
- Web server (Apache/Nginx)
- ZIP extension
- JSON extension

## 🔄 Otomatik Güncelleme Sistemi

### Nasıl Çalışır?
1. **Admin Panel** → **Europa Depo Güncelleme**
2. **"Güncelleme Kontrol Et"** butonuna tıklayın
3. Yeni versiyon varsa **"Güncellemeyi Başlat"**
4. Sistem otomatik olarak:
   - GitHub'dan son versiyonu indirir
   - Yedek oluşturur
   - Dosyaları günceller
   - Config'leri korur

### Korunan Dosyalar
Güncelleme sırasında bu dosyalar **HİÇBİR ZAMAN** değişmez:
- `config/config.ini` - Site ayarları
- `config/users/` - Kullanıcı hesapları
- `content/` - Tüm içerikler
- `cache/` - Cache dosyaları

## 🎨 Tema Özellikleri

### Yenidepo HTMLy Teması
- **Modern Tasarım**: Profesyonel, kurumsal görünüm
- **Responsive**: Mobil, tablet, desktop uyumlu
- **Hızlı**: Optimize edilmiş CSS/JS
- **SEO Dostu**: Arama motorları için optimize
- **Erişilebilir**: WCAG uyumlu

### Sayfalar
- 🏠 Ana Sayfa - Hero section, özellikler, iletişim
- 📋 Hakkımızda - Şirket bilgileri
- 🖼️ Galeri - Depo görselleri
- 📞 İletişim - İletişim formu ve bilgiler
- 📦 Depolama Türleri - 8 farklı depolama hizmeti

## 🚀 Gelecek Güncellemeler

### v1.1.0 (Planlanan)
- 📊 Dashboard widget'ları
- 🔔 Email bildirimleri
- 📱 PWA desteği
- 🌐 Çoklu dil desteği

### v1.2.0 (Planlanan)
- 💳 Online ödeme entegrasyonu
- 📅 Rezervasyon sistemi
- 👥 Müşteri paneli
- 📈 Analytics entegrasyonu

## 📞 Destek

- **GitHub Issues**: [Sorun bildirin](https://github.com/salihbyk/europadepo/issues)
- **Dokümantasyon**: README.md ve GITHUB_SETUP.md
- **Email**: salihbyk@gmail.com

## 🎯 Demo

Canlı demo için: [Europa Depo](http://localhost/europadepo) (localhost kurulumu sonrası)

---

**Europa Depo** - Ankara'nın En Güvenilir Eşya Depolama Sistemi 🏢✨
