# Europa Depo v1.1.0 - AI İçerik Oluşturucu ve Güncelleme Sistemi 🚀

## 🆕 Yeni Özellikler

### 🤖 Europa AI İçerik Oluşturucu
- **ChatGPT API Entegrasyonu**: Admin panelinde AI ile otomatik içerik oluşturma
- **GPT-5 Desteği**: En güncel AI modeli ile kaliteli içerik üretimi
- **Akıllı Model Fallback**: GPT-5 → GPT-4o → GPT-4 Turbo otomatik geçiş
- **SEO Uyumlu İçerik**: Otomatik JSON-LD şema, SSS, tablolar
- **Gelişmiş Temizleme**: ChatGPT açıklamalarını otomatik kaldırma
- **Yapılandırılabilir Parametreler**: Model, token sayısı, yaratıcılık seviyesi

### 🚀 GitHub Tabanlı Güncelleme Sistemi
- **Otomatik Güncelleme**: GitHub releases üzerinden sistem güncellemeleri
- **Veri Güvenliği**: İçerik, kullanıcı ve yapılandırma dosyaları korunur
- **Akıllı Kopyalama**: Sadece değişen dosyaları güncelleme (hash karşılaştırma)
- **Backup Sistemi**: Güncelleme öncesi otomatik yedekleme
- **Ayrı Admin Panel**: HTMLy güncellemesi ile çakışmayan ayrı sistem

## 🔧 Teknik Geliştirmeler

- **Hash Tabanlı Dosya Karşılaştırma**: Gereksiz dosya yazımını önleme
- **Korumalı Dizin Sistemi**: `content/`, `config/users/`, `cache/` dizinleri korunur
- **API Hata Yönetimi**: Detaylı hata mesajları ve debug bilgileri
- **Güvenli İstek Yönetimi**: SSL doğrulama ve timeout ayarları

## 📝 Admin Panel Geliştirmeleri

- **AI İçerik Butonu**: İçerik ekleme sayfasında tek tık ile AI içerik
- **Yapılandırma Ayarları**: ChatGPT API ve güncelleme ayarları
- **Europa Güncelleme Menüsü**: Ayrı güncelleme yönetim paneli
- **Durum Göstergeleri**: API durumu ve güncelleme bilgileri

## 🛠️ Kurulum ve Kullanım

### AI İçerik Oluşturucu
1. Admin Panel → Config → ChatGPT API Key girin
2. Model seçin (GPT-5 önerilir)
3. İçerik Ekle → Başlık ve etiketler girin → "AI İle İçerik Oluştur"

### Güncelleme Sistemi
1. Admin Panel → Europa Depo Güncelleme
2. "Güncelleme Kontrol Et" ile yeni sürümleri kontrol edin
3. "Güncellemeyi İndir ve Kur" ile otomatik güncelleme

## 🔒 Güvenlik

- Kullanıcı içerikleri hiçbir zaman üzerine yazılmaz
- API anahtarları güvenli şekilde saklanır
- Güncelleme öncesi otomatik backup
- Sadece kod dosyaları güncellenir, veriler korunur

## 📊 Uyumluluk

- HTMLy CMS ile tam uyumlu
- PHP 7.4+ gereksinimler
- OpenAI API desteği
- GitHub API entegrasyonu

---

**Önemli**: Bu güncelleme mevcut içeriklerinizi, sayfalarınızı ve yapılandırmalarınızı korur. Sadece sistem dosyaları güncellenir.
