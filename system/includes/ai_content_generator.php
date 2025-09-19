<?php
if (!defined('HTMLY')) die('HTMLy');

class EuropaAIContentGenerator {
    
    private $prompt_template;
    private $internal_links;
    private $brand_info;
    
    public function __construct() {
        $this->setupPromptTemplate();
        $this->setupInternalLinks();
        $this->setupBrandInfo();
    }
    
    private function setupPromptTemplate() {
        $this->prompt_template = 'ROL: Üst düzey Türkçe SEO içerik yazarı + teknik editör + semantik HTML uzmanı.

HEDEF: europadepo.com için {SERVICE_NAME} sayfasına, "kaynak kod" halinde, doğrudan editöre yapıştırılabilir SEO uyumlu bir HTML içerik üret.

DİL & TON:
- Dil: Türkçe (Türkiye).
- Ton: Profesyonel, net, satışa yardımcı; abartısız.

ZORUNLU ÇIKTI BİÇİMİ:
- SADECE tek bir <section> bloklu TAM HTML ver (öncesine/sonrasına açıklama yazma).
- İlk başlık H2 ile başlasın.
- İçerik semantik olsun: <nav> (İçindekiler), <h3>, <ul>/<ol>, <table>, <details> (SSS).
- İç linkler {INTERNAL_LINKS_JSON} içindeki slug\'lara verilsin.
- Harici link verme.
- Tüm URL\'ler göreli: "/slug".
- Sonunda 2 adet JSON-LD ekle: FAQPage ve Service.
- MİNİMUM 2000 KELİME uzunluğunda detaylı, kapsamlı içerik oluştur.
- Her bölümü detaylandır, örnekler ver, avantajları açıkla.

SEO KURALLARI:
- Meta başlık ve açıklama ÜRETME (bu prompt sayfayı üretir; meta\'yı ayrı prompt ile alacağım).
- H2 başlıkta ana terim: "{SERVICE_NAME}".
- Metin içinde "Ankara", "güvenli", "sigortalı", "iklim/izleme" gibi uygun yardımcı terimler doğallaştır.
- Gereksiz tekrar yok, anahtar kelime doldurma yok.
- İçerikte 1 "CTA" başlığı olsun (İletişim linki {CTA_URL}).
- Tablo ekle (kapsam/fiyat parametreleri/KPI gibi hizmete uygun bir tablo).
- 5–6 adet SSS üret (<details>).
- "Yasaklı/İstisna" bölümü ekle (uygunsa).
- "Süreç Adımları" bölümü ekle (nasıl çalışır).
- "Avantajlar" bölümü detaylandır.

İÇERİK YAPISI (ZORUNLU):
1. İçindekiler navigasyonu
2. Ana hizmet açıklaması (detaylı, min 300 kelime)
3. Özellikler ve avantajlar (detaylı liste)
4. Süreç adımları (nasıl çalışır)
5. Fiyat tablosu (detaylı)
6. Güvenlik ve sigorta bilgileri
7. SSS bölümü (5-6 soru)
8. Yasaklı maddeler
9. İletişim CTA
10. JSON-LD şemaları

ŞEMA (JSON-LD):
- FAQPage: generated Q/A\'ları gir.
- Service: {
  name: "{SERVICE_NAME}",
  serviceType: "Storage",
  areaServed: "Ankara",
  provider.name: "{BRAND}",
  provider.url: "{BASE_URL}",
  url: "{SERVICE_URL}",
  offers.priceSpecification.unitText: "{PRICING_UNIT}"
}
- JSON-LD\'ler <script type="application/ld+json"> içinde ve geçerli JSON olsun.

DEĞİŞKENLER:
- Hizmet adı: {SERVICE_NAME}
- Sayfa URL: {SERVICE_URL}
- Marka: {BRAND}
- Site kökü: {BASE_URL}
- Şehir: {CITY}
- CTA URL: {CTA_URL}
- Fiyat birimi (ör: "m³", "palet/gün", "m²"): {PRICING_UNIT}
- İç linkler (JSON): {INTERNAL_LINKS_JSON}
- Anahtar kelimeler: {KEYWORDS}

KISITLAR:
- Soğuk zincir vb. özellikleri sadece {FEATURES_JSON} içinde true ise yaz. Aksi halde dahil etme.
- İddialı sertifika/mevzuat cümleleri kurma; "uyumlu süreçler" gibi temkinli yaz.
- Harici marka/karşılaştırma yok.
- Görsel ekleme yok.

ÇIKTI FORMATI:
<section>
[Detaylı, kapsamlı HTML içerik - minimum 2000 kelime]
</section>

<script type="application/ld+json">
[FAQPage JSON-LD]
</script>

<script type="application/ld+json">
[Service JSON-LD]
</script>

Lütfen yukarıdaki talimatları TAM OLARAK takip ederek {SERVICE_NAME} için profesyonel, kapsamlı, SEO uyumlu içerik oluşturun.';
    }
    
    private function setupInternalLinks() {
        $this->internal_links = [
            ["href" => "/hakkimizda", "text" => "Hakkımızda"],
            ["href" => "/iletisim", "text" => "İletişim"],
            ["href" => "/galeri", "text" => "Galeri"],
            ["href" => "/arsiv-depolama", "text" => "Arşiv Depolama"],
            ["href" => "/e-ticaret-urun-depolama", "text" => "E-ticaret Ürün Depolama"],
            ["href" => "/ev-esyasi-depolama", "text" => "Ev Eşyası Depolama"],
            ["href" => "/kisisel-esya-depolama", "text" => "Kişisel Eşya Depolama"],
            ["href" => "/medikal-urun-depolama", "text" => "Medikal Ürün Depolama"],
            ["href" => "/paletli-urun-depolama", "text" => "Paletli Ürün Depolama"],
            ["href" => "/sanat-antika-depolama", "text" => "Sanat-Antika Depolama"],
            ["href" => "/self-storage", "text" => "Self Storage"],
            ["href" => "/ticari-depolama", "text" => "Ticari Depolama"]
        ];
    }
    
    private function setupBrandInfo() {
        $this->brand_info = [
            'brand' => 'Europa Depo',
            'city' => 'Ankara',
            'base_url' => site_url(),
            'cta_url' => '/iletisim',
            'phone' => '444 6 995'
        ];
    }
    
    public function generateContent($title, $keywords = '') {
        // ChatGPT API ayarlarını kontrol et
        $apiKey = config('chatgpt.api.key');
        
        if (empty($apiKey)) {
            throw new Exception('ChatGPT API anahtarı ayarlanmamış. Lütfen Config sayfasından API anahtarınızı girin.');
        }
        
        // API anahtarının formatını kontrol et
        if (!preg_match('/^sk-/', $apiKey)) {
            throw new Exception('Geçersiz ChatGPT API anahtarı formatı. API anahtarı "sk-" ile başlamalıdır.');
        }
        
        // Hizmet türünü başlıktan tahmin et
        $serviceType = $this->detectServiceType($title);
        $pricingUnit = $this->detectPricingUnit($serviceType);
        
        // Prompt'u hazırla
        $prompt = $this->preparePrompt($title, $keywords, $serviceType, $pricingUnit);
        
        // ChatGPT API'si ile içerik oluştur
        try {
            return $this->generateWithChatGPT($prompt);
        } catch (Exception $e) {
            // API başarısız olursa hata mesajını daha detaylı ver
            $errorMsg = $e->getMessage();
            
            // Yaygın hataları kullanıcı dostu hale getir
            if (strpos($errorMsg, 'Invalid API key') !== false) {
                throw new Exception('ChatGPT API anahtarı geçersiz. Lütfen doğru API anahtarını girin.');
            } elseif (strpos($errorMsg, 'insufficient_quota') !== false) {
                throw new Exception('ChatGPT API krediniz tükendi. Lütfen OpenAI hesabınızı kontrol edin.');
            } elseif (strpos($errorMsg, 'rate_limit') !== false) {
                throw new Exception('ChatGPT API rate limit aşıldı. Lütfen biraz bekleyip tekrar deneyin.');
            }
            
            // Debug için log tut
            error_log('ChatGPT API Error: ' . $errorMsg);
            
            // Gerçek API hatası varsa kullanıcıya göster, template kullanma
            throw new Exception('ChatGPT API Hatası: ' . $errorMsg);
        }
    }
    
    private function generateWithChatGPT($prompt) {
        $apiKey = config('chatgpt.api.key');
        $model = config('chatgpt.model') ?: 'gpt-3.5-turbo';
        $maxTokens = (int)(config('chatgpt.max.tokens') ?: 4000);
        $temperature = (float)(config('chatgpt.temperature') ?: 0.7);
        
        // GPT-5 kullanmaya devam et (gerçek model)
        // Model ayarını olduğu gibi bırak
        
        $data = [
            'model' => $model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Sen profesyonel bir Türkçe SEO içerik yazarısın. SADECE HTML içerik üretirsin. Hiçbir açıklama, başlık veya ek metin ekleme. Direkt HTML kodunu ver.'
                ],
                [
                    'role' => 'user',
                    'content' => $prompt . "\n\nÖNEMLİ: Sadece HTML içeriği ver, başında 'html' veya açıklama yazma. Direkt <section> ile başla ve </section> ile bitir. Minimum 1500 kelime uzunluğunda detaylı içerik oluştur."
                ]
            ],
            'max_tokens' => $maxTokens,
            'temperature' => $temperature,
            'top_p' => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0
        ];
        
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $apiKey,
                    'User-Agent: EuropaDepo-AI/1.0'
                ],
                'content' => json_encode($data),
                'timeout' => 60
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false
            ]
        ]);
        
        $response = @file_get_contents('https://api.openai.com/v1/chat/completions', false, $context);
        
        if ($response === false) {
            throw new Exception('ChatGPT API\'ye erişim sağlanamadı');
        }
        
        $result = json_decode($response, true);
        
        if (!$result) {
            throw new Exception('ChatGPT API\'den geçersiz yanıt');
        }
        
        if (isset($result['error'])) {
            throw new Exception('ChatGPT API Hatası: ' . $result['error']['message']);
        }
        
        if (!isset($result['choices'][0]['message']['content'])) {
            throw new Exception('ChatGPT\'den içerik alınamadı');
        }
        
        $content = trim($result['choices'][0]['message']['content']);
        
        // İçeriği temizle ve düzelt
        $content = $this->cleanAIResponse($content);
        
        return $content;
    }
    
    private function cleanAIResponse($content) {
        // Başındaki gereksiz metinleri kaldır
        $content = preg_replace('/^(html|HTML|```html|```)/i', '', $content);
        $content = preg_replace('/```$/', '', $content);
        
        // Başında açıklama varsa kaldır
        $content = preg_replace('/^[^<]*(<section)/i', '$1', $content);
        
        // Sonundaki gereksiz metinleri kaldır
        $content = preg_replace('/(<\/section>)[^<]*$/i', '$1', $content);
        
        // Boş satırları temizle
        $content = preg_replace('/\n\s*\n\s*\n/', "\n\n", $content);
        
        return trim($content);
    }
    
    private function detectServiceType($title) {
        $title = strtolower($title);
        
        if (strpos($title, 'ev') !== false || strpos($title, 'eşya') !== false) {
            return 'ev-esyasi-depolama';
        } elseif (strpos($title, 'ticari') !== false || strpos($title, 'işletme') !== false) {
            return 'ticari-depolama';
        } elseif (strpos($title, 'arşiv') !== false || strpos($title, 'belge') !== false) {
            return 'arsiv-depolama';
        } elseif (strpos($title, 'e-ticaret') !== false || strpos($title, 'online') !== false) {
            return 'e-ticaret-urun-depolama';
        } elseif (strpos($title, 'medikal') !== false || strpos($title, 'tıbbi') !== false) {
            return 'medikal-urun-depolama';
        } elseif (strpos($title, 'self') !== false || strpos($title, 'kişisel') !== false) {
            return 'self-storage';
        } elseif (strpos($title, 'palet') !== false) {
            return 'paletli-urun-depolama';
        } elseif (strpos($title, 'sanat') !== false || strpos($title, 'antika') !== false) {
            return 'sanat-antika-depolama';
        }
        
        return 'ev-esyasi-depolama'; // varsayılan
    }
    
    private function detectPricingUnit($serviceType) {
        switch ($serviceType) {
            case 'paletli-urun-depolama':
                return 'palet/gün';
            case 'arsiv-depolama':
                return 'kutu/ay';
            case 'self-storage':
                return 'm²';
            default:
                return 'm³';
        }
    }
    
    private function preparePrompt($title, $keywords, $serviceType, $pricingUnit) {
        $serviceUrl = '/' . $this->createSlug($title);
        
        $replacements = [
            '{SERVICE_NAME}' => $title,
            '{SERVICE_URL}' => $serviceUrl,
            '{BRAND}' => $this->brand_info['brand'],
            '{BASE_URL}' => $this->brand_info['base_url'],
            '{CITY}' => $this->brand_info['city'],
            '{CTA_URL}' => $this->brand_info['cta_url'],
            '{PRICING_UNIT}' => $pricingUnit,
            '{KEYWORDS}' => $keywords,
            '{INTERNAL_LINKS_JSON}' => json_encode($this->internal_links),
            '{FEATURES_JSON}' => json_encode(['climate_control' => true, 'security' => true, 'insurance' => true])
        ];
        
        return str_replace(array_keys($replacements), array_values($replacements), $this->prompt_template);
    }
    
    private function generateTemplateContent($title, $keywords, $serviceType, $pricingUnit) {
        $slug = $this->createSlug($title);
        $keywordArray = array_map('trim', explode(',', $keywords));
        
        // Hizmet türüne göre özel içerik
        $serviceInfo = $this->getServiceInfo($serviceType);
        
        $content = '<section class="service-content">
    <nav class="content-navigation" style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 30px;">
        <h4 style="margin: 0 0 10px 0; font-size: 16px;">📋 İçindekiler</h4>
        <ul style="margin: 0; padding-left: 20px; list-style-type: none;">
            <li style="margin-bottom: 5px;"><a href="#genel-bilgiler" style="color: #667eea; text-decoration: none;">🏢 Genel Bilgiler</a></li>
            <li style="margin-bottom: 5px;"><a href="#ozellikler" style="color: #667eea; text-decoration: none;">✨ Özellikler</a></li>
            <li style="margin-bottom: 5px;"><a href="#fiyat-bilgileri" style="color: #667eea; text-decoration: none;">💰 Fiyat Bilgileri</a></li>
            <li style="margin-bottom: 5px;"><a href="#sss" style="color: #667eea; text-decoration: none;">❓ Sıkça Sorulan Sorular</a></li>
            <li style="margin-bottom: 5px;"><a href="#iletisim" style="color: #667eea; text-decoration: none;">📞 İletişim</a></li>
        </ul>
    </nav>

    <h2 id="genel-bilgiler" style="color: #2c3e50; margin: 30px 0 20px 0; font-size: 28px; border-bottom: 3px solid #667eea; padding-bottom: 10px;">
        🏢 ' . htmlspecialchars($title) . ' Hizmetleri
    </h2>

    <p style="font-size: 18px; line-height: 1.6; margin-bottom: 25px; color: #495057;">
        <strong>Europa Depo</strong> olarak Ankara\'da ' . strtolower($title) . ' alanında güvenli, sigortalı ve profesyonel depolama çözümleri sunuyoruz. 
        ' . $serviceInfo['description'] . '
    </p>

    <h3 id="ozellikler" style="color: #2c3e50; margin: 25px 0 15px 0; font-size: 22px;">
        ✨ ' . htmlspecialchars($title) . ' Özellikleri
    </h3>

    <ul style="margin: 20px 0; padding-left: 0; list-style: none;">
        <li style="margin-bottom: 12px; padding: 10px; background: #f8f9fa; border-left: 4px solid #667eea; border-radius: 4px;">
            <strong>🛡️ 7/24 Güvenlik:</strong> Güvenlik kameraları ve alarm sistemleri ile sürekli izleme
        </li>
        <li style="margin-bottom: 12px; padding: 10px; background: #f8f9fa; border-left: 4px solid #667eea; border-radius: 4px;">
            <strong>🌡️ İklim Kontrolü:</strong> Sıcaklık ve nem kontrollü depolama alanları
        </li>
        <li style="margin-bottom: 12px; padding: 10px; background: #f8f9fa; border-left: 4px solid #667eea; border-radius: 4px;">
            <strong>📋 Sigorta Koruması:</strong> Tam kapsamlı sigorta ile güvence altında
        </li>
        <li style="margin-bottom: 12px; padding: 10px; background: #f8f9fa; border-left: 4px solid #667eea; border-radius: 4px;">
            <strong>🚚 Profesyonel Nakliyat:</strong> Uzman ekip ile güvenli taşıma hizmeti
        </li>
    </ul>';

        // Hizmet türüne özel özellikler
        if (!empty($serviceInfo['features'])) {
            $content .= '
    <h4 style="color: #2c3e50; margin: 20px 0 15px 0;">🎯 ' . htmlspecialchars($title) . ' Özel Avantajları</h4>
    <ul style="margin: 15px 0; padding-left: 20px;">';
            
            foreach ($serviceInfo['features'] as $feature) {
                $content .= '
        <li style="margin-bottom: 8px; color: #495057;">' . htmlspecialchars($feature) . '</li>';
            }
            
            $content .= '
    </ul>';
        }

        // Fiyat tablosu
        $content .= '
    <h3 id="fiyat-bilgileri" style="color: #2c3e50; margin: 30px 0 15px 0; font-size: 22px;">
        💰 Fiyat Bilgileri
    </h3>

    <table style="width: 100%; border-collapse: collapse; margin: 20px 0; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <th style="padding: 15px; text-align: left; font-weight: 600;">📦 Depolama Türü</th>
                <th style="padding: 15px; text-align: left; font-weight: 600;">📏 Boyut</th>
                <th style="padding: 15px; text-align: left; font-weight: 600;">💵 Fiyat (' . htmlspecialchars($pricingUnit) . ')</th>
                <th style="padding: 15px; text-align: left; font-weight: 600;">⏱️ Süre</th>
            </tr>
        </thead>
        <tbody>';

        // Fiyat tablosu satırları
        $priceRows = $this->generatePriceRows($serviceType, $pricingUnit);
        foreach ($priceRows as $row) {
            $content .= '
            <tr style="border-bottom: 1px solid #e9ecef;">
                <td style="padding: 12px 15px; color: #495057;">' . $row['type'] . '</td>
                <td style="padding: 12px 15px; color: #495057;">' . $row['size'] . '</td>
                <td style="padding: 12px 15px; color: #667eea; font-weight: 600;">' . $row['price'] . '</td>
                <td style="padding: 12px 15px; color: #495057;">' . $row['duration'] . '</td>
            </tr>';
        }

        $content .= '
        </tbody>
    </table>

    <div style="background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 8px; padding: 15px; margin: 20px 0;">
        <p style="margin: 0; color: #856404;">
            <strong>💡 Not:</strong> Fiyatlar değişken olup, depolama süresine ve özel ihtiyaçlarınıza göre indirim uygulanabilir. 
            Detaylı fiyat teklifi için <a href="/iletisim" style="color: #667eea;">iletişime geçin</a>.
        </p>
    </div>';

        // SSS bölümü
        $content .= '
    <h3 id="sss" style="color: #2c3e50; margin: 30px 0 20px 0; font-size: 22px;">
        ❓ Sıkça Sorulan Sorular
    </h3>';

        $faqs = $this->generateFAQs($title, $serviceType);
        foreach ($faqs as $faq) {
            $content .= '
    <details style="margin-bottom: 15px; border: 1px solid #e9ecef; border-radius: 8px; overflow: hidden;">
        <summary style="padding: 15px; background: #f8f9fa; cursor: pointer; font-weight: 600; color: #495057; border-bottom: 1px solid #e9ecef;">
            ' . htmlspecialchars($faq['question']) . '
        </summary>
        <div style="padding: 15px; background: white;">
            <p style="margin: 0; color: #495057; line-height: 1.6;">
                ' . htmlspecialchars($faq['answer']) . '
            </p>
        </div>
    </details>';
        }

        // CTA bölümü
        $content .= '
    <h3 id="iletisim" style="color: #2c3e50; margin: 30px 0 20px 0; font-size: 22px;">
        📞 Hemen Teklif Alın
    </h3>

    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 12px; text-align: center; margin: 25px 0;">
        <h4 style="margin: 0 0 15px 0; font-size: 20px;">🎯 Ücretsiz Keşif ve Teklif</h4>
        <p style="margin: 0 0 20px 0; font-size: 16px; opacity: 0.9;">
            ' . htmlspecialchars($title) . ' ihtiyacınız için hemen arayın ve ücretsiz keşif hizmeti alın.
        </p>
        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
            <a href="tel:4446995" style="background: white; color: #667eea; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa fa-phone"></i> 444 6 995
            </a>
            <a href="/iletisim" style="background: rgba(255,255,255,0.2); color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa fa-envelope"></i> İletişim Formu
            </a>
        </div>
    </div>

    ' . $this->generateYasakliMaddeler($serviceType) . '

</section>';

        // JSON-LD şemaları ekle
        $content .= $this->generateJSONLD($title, $slug, $pricingUnit, $faqs);
        
        return $content;
    }
    
    private function getServiceInfo($serviceType) {
        $services = [
            'ev-esyasi-depolama' => [
                'description' => 'Ev taşıma, tadilat veya geçici saklama ihtiyaçlarınız için ideal çözümler sunuyoruz.',
                'features' => [
                    'Mobilya demontaj ve montaj hizmeti',
                    'Hassas eşyalar için özel paketleme',
                    'Kısa ve uzun süreli depolama seçenekleri',
                    'Ev eşyaları için optimize edilmiş alanlar'
                ]
            ],
            'ticari-depolama' => [
                'description' => 'İşletmenizin envanter, malzeme ve ürün depolama ihtiyaçları için profesyonel çözümler.',
                'features' => [
                    'Forklift erişimi olan geniş alanlar',
                    'Barkod sistemi ile envanter takibi',
                    'Esnek giriş-çıkış saatleri',
                    'Toplu malzeme kabul ve teslimat'
                ]
            ],
            'arsiv-depolama' => [
                'description' => 'Kurumsal belge ve arşiv dosyalarınız için güvenli ve organize depolama.',
                'features' => [
                    'Nem ve sıcaklık kontrollü ortam',
                    'Yangın söndürme sistemleri',
                    'Dosya indexleme ve kataloglama',
                    'Hızlı erişim ve teslimat sistemi'
                ]
            ],
            'e-ticaret-urun-depolama' => [
                'description' => 'E-ticaret işletmeniz için stok yönetimi ve hızlı kargo entegrasyonu.',
                'features' => [
                    'Kargo firmaları ile entegrasyon',
                    'Günlük sevkiyat desteği',
                    'Stok yönetim sistemi',
                    'Hızlı paketleme ve etiketleme'
                ]
            ],
            'self-storage' => [
                'description' => 'Kişisel kullanım için esnek, güvenli ve uygun fiyatlı depolama çözümleri.',
                'features' => [
                    '24/7 erişim imkanı',
                    'Kişisel güvenlik kodu',
                    'Farklı boyutlarda birimler',
                    'Aylık esnek ödeme seçenekleri'
                ]
            ]
        ];
        
        return $services[$serviceType] ?? [
            'description' => 'Özel ihtiyaçlarınıza yönelik profesyonel depolama çözümleri sunuyoruz.',
            'features' => [
                'Güvenli ve temiz depolama alanları',
                'Profesyonel müşteri hizmetleri',
                'Esnek depolama süreleri',
                'Uygun fiyat garantisi'
            ]
        ];
    }
    
    private function generatePriceRows($serviceType, $pricingUnit) {
        $baseRows = [
            ['type' => 'Küçük Alan', 'size' => '1-5 ' . $pricingUnit, 'price' => '₺150-300', 'duration' => 'Aylık'],
            ['type' => 'Orta Alan', 'size' => '5-15 ' . $pricingUnit, 'price' => '₺300-600', 'duration' => 'Aylık'],
            ['type' => 'Büyük Alan', 'size' => '15-50 ' . $pricingUnit, 'price' => '₺600-1200', 'duration' => 'Aylık'],
            ['type' => 'Özel Alan', 'size' => '50+ ' . $pricingUnit, 'price' => 'Teklif Alın', 'duration' => 'Esnek']
        ];
        
        return $baseRows;
    }
    
    private function generateFAQs($title, $serviceType) {
        return [
            [
                'question' => htmlspecialchars($title) . ' hizmeti nasıl çalışır?',
                'answer' => 'Öncelikle ihtiyacınızı değerlendiriyoruz, uygun depolama alanını belirliyoruz ve eşyalarınızı güvenli şekilde depoluyoruz. Tüm süreç boyunca profesyonel destek sağlıyoruz.'
            ],
            [
                'question' => 'Minimum depolama süresi nedir?',
                'answer' => 'Minimum 1 ay depolama süresi bulunmaktadır. Uzun süreli depolamalar için özel indirimler uygulanır.'
            ],
            [
                'question' => 'Eşyalarıma ne zaman erişebilirim?',
                'answer' => 'Çalışma saatleri içinde (08:00-18:00) önceden haber vererek eşyalarınıza erişebilirsiniz. Acil durumlar için 7/24 erişim imkanı da mevcuttur.'
            ],
            [
                'question' => 'Sigorta kapsamı nedir?',
                'answer' => 'Eşyalarınız tam kapsamlı sigorta ile korunur. Yangın, su baskını, hırsızlık ve doğal afetler sigorta kapsamındadır.'
            ]
        ];
    }
    
    private function generateYasakliMaddeler($serviceType) {
        return '
    <div style="background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 8px; padding: 20px; margin: 25px 0;">
        <h4 style="color: #721c24; margin: 0 0 15px 0; font-size: 18px;">
            ⚠️ Yasaklı ve Kabul Edilmeyen Maddeler
        </h4>
        <ul style="margin: 0; padding-left: 20px; color: #721c24;">
            <li>Yanıcı, patlayıcı ve tehlikeli maddeler</li>
            <li>Bozulabilir gıda maddeleri</li>
            <li>Canlı hayvan ve bitkiler</li>
            <li>Yasal olmayan veya çalıntı eşyalar</li>
            <li>Kötü kokulu veya sağlığa zararlı maddeler</li>
        </ul>
        <p style="margin: 10px 0 0 0; font-size: 14px; color: #721c24;">
            <strong>Not:</strong> Şüpheli durumlar için lütfen önceden bilgi verin.
        </p>
    </div>';
    }
    
    private function generateJSONLD($title, $slug, $pricingUnit, $faqs) {
        $faqData = [];
        foreach ($faqs as $faq) {
            $faqData[] = [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer']
                ]
            ];
        }
        
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqData
        ];
        
        $serviceSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $title,
            'serviceType' => 'Storage',
            'areaServed' => 'Ankara',
            'provider' => [
                '@type' => 'Organization',
                'name' => 'Europa Depo',
                'url' => site_url()
            ],
            'url' => site_url() . $slug,
            'offers' => [
                '@type' => 'Offer',
                'priceSpecification' => [
                    '@type' => 'PriceSpecification',
                    'unitText' => $pricingUnit
                ]
            ]
        ];
        
        return '

<script type="application/ld+json">
' . json_encode($faqSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '
</script>

<script type="application/ld+json">
' . json_encode($serviceSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '
</script>';
    }
    
    private function createSlug($text) {
        return strtolower(preg_replace(
            ['/[^a-zA-Z0-9 \-\p{L}]/u', '/[ -]+/', '/^-|-$/'], 
            ['', '-', ''], 
            $this->removeAccent($text)
        ));
    }
    
    private function removeAccent($str) {
        $tr_chars = ['ç', 'ğ', 'ı', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'I', 'İ', 'Ö', 'Ş', 'Ü'];
        $en_chars = ['c', 'g', 'i', 'o', 's', 'u', 'C', 'G', 'I', 'I', 'O', 'S', 'U'];
        return str_replace($tr_chars, $en_chars, $str);
    }
}
