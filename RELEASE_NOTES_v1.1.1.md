# Europa Depo v1.1.1

Yayın Tarihi: 2025-09-19

## Öne Çıkanlar
- SEO Title manuel alanı eklendi ve frontend'de önceliklendirildi
- Meta Description ilk etiketle başlatılıyor ve 160 karaktere akıllı kırpılıyor
- Admin panel tasarım iyileştirmeleri (AdminLTE card/ikon/stil)
- AI içerik üretimi kaldırıldı; sadece SEO Title + Description üretimi kaldı
- Generate AI SEO endpoint sadeleştirildi (puan özelliği kaldırıldı)

## Değişiklikler
- system/admin/views/add-content.html.php: SEO ayarları editör altına, collapsible card
- system/includes/ai_content_generator.php: generateSEOMeta() güncellendi
- system/htmly.php: /admin/generate-ai-seo sadeleştirildi
- system/admin/admin.php: SEO Title özel alanını kaydetme
- system/includes/functions.php: <title> ve og:title için manuel SEO title önceliği
- version.json: 1.1.1 sürüm bilgileri

## Notlar
- İçerik güncellerken eski yazılar için SEO Title alanını doldurup yeniden kaydetmeniz gerekir (dosyaya yazılması için).
- Güncelleyici korumaları (config/content) aynen devam ediyor.
