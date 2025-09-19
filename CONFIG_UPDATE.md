# Europa Depo - Config Güncelleme Rehberi

## 🚨 Canlı Sitede Düzeltilmesi Gerekenler

Canlı site [europadepo.com](https://europadepo.com/admin/content) üzerinde aşağıdaki ayarları düzeltmeniz gerekiyor:

### 1. Dil Ayarı Sorunu
**Sorun:** Admin panelinde "Image_post", "Image_post_comment" gibi İngilizce metinler görünüyor.
**Çözüm:** `config/config.ini` dosyasında dil ayarını değiştirin:

```ini
; Mevcut (Yanlış)
language = "en_US"

; Olması Gereken (Doğru)
language = "tr_TR"
```

### 2. Zaman Dilimi Ayarı
```ini
; Mevcut
timezone = "Asia/Jakarta"

; Olması Gereken
timezone = "Europe/Istanbul"
```

### 3. Site Bilgileri
```ini
; Mevcut
blog.title = "HTMLy"
blog.tagline = "Just another HTMLy blog"

; Olması Gereken
blog.title = "Ankara Eşya Depolama | Europa Depo 444 6 995"
blog.tagline = "Premium Eşya Depolama"
blog.description = "Ankara'da güvenli ve sigortalı depolama: ev, kişisel, ticari, arşiv ve e-ticaret çözümleri. 7/24 güvenlik, iklim izleme, profesyonel nakliyat. Hızlı teklif."
blog.copyright = "europadepo"
```

### 4. Tema Ayarı
```ini
; Mevcut
views.root = "themes/tailwind"

; Olması Gereken
views.root = "themes/yenidepo-htmly"
```

## 🔧 Nasıl Düzeltilir?

### Yöntem 1: FTP/cPanel ile
1. cPanel File Manager veya FTP ile siteye erişin
2. `config/config.ini` dosyasını düzenleyin
3. Yukarıdaki değişiklikleri yapın
4. Dosyayı kaydedin

### Yöntem 2: Admin Panel ile (Eğer erişim varsa)
1. [Admin Panel](https://europadepo.com/admin/config) → Config
2. Genel ayarlardan dil seçeneğini `tr_TR` yapın
3. Blog başlığı ve açıklamasını güncelleyin
4. Tema seçimini `yenidepo-htmly` yapın

### Yöntem 3: SSH ile (Eğer erişim varsa)
```bash
cd /path/to/europadepo
nano config/config.ini
# Değişiklikleri yapın ve kaydedin
```

## ✅ Değişiklik Sonrası

Değişiklikleri yaptıktan sonra:
1. **Cache Temizleme**: Admin Panel → Clear Cache
2. **Test**: Admin paneli yenileyin
3. **Kontrol**: Türkçe metinlerin görünüp görünmediğini kontrol edin

## 🎯 Beklenen Sonuç

Değişikliklerden sonra admin panelinde:
- ✅ "Görsel gönderi" (Image_post yerine)
- ✅ "Öne çıkan görsel içeren bir blog gönderisi oluşturuluyor" (Image_post_comment yerine)
- ✅ Tüm menüler Türkçe
- ✅ Site başlığı: "Ankara Eşya Depolama | Europa Depo 444 6 995"
- ✅ Europa Depo teması aktif

## 📞 Destek

Sorun devam ederse:
- GitHub Issues: [Sorun bildirin](https://github.com/salihbyk/europadepo/issues)
- Email: salihbyk@gmail.com
