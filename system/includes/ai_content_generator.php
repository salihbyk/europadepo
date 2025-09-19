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

SEO KURALLARI:
- Meta başlık ve açıklama ÜRETME (bu prompt sayfayı üretir; meta\'yı ayrı prompt ile alacağım).
- H2 başlıkta ana terim: "{SERVICE_NAME}".
- Metin içinde "Ankara", "güvenli", "sigortalı", "iklim/izleme" gibi uygun yardımcı terimler doğallaştır.
- Gereksiz tekrar yok, anahtar kelime doldurma yok.
- İçerikte 1 "CTA" başlığı olsun (İletişim linki {CTA_URL}).
- Tablo ekle (kapsam/fiyat parametreleri/KPI gibi hizmete uygun bir tablo).
- 3–4 adet SSS üret (<details>).
- "Yasaklı/İstisna" bölümü ekle (uygunsa).

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
- İç linkler (JSON): {INTERNAL_LINKS_JSON}  // ör: [{"href":"/ticari-depolama","text":"Ticari Depolama"}]

KISITLAR:
- Soğuk zincir vb. özellikleri sadece {FEATURES_JSON} içinde true ise yaz. Aksi halde dahil etme.
- İddialı sertifika/mevzuat cümleleri kurma; "uyumlu süreçler" gibi temkinli yaz.
- Harici marka/karşılaştırma yok.
- Görsel ekleme yok.

ÇIKTI:
- Sadece TEK bir <section>…</section> HTML bloğu + altında FAQPage ve Service JSON-LD (<script>) blokları.

ANAHTAR KELİMELER: {KEYWORDS}

ÇIKTI FORMATI:
- Sadece HTML formatında yanıt verin
- 3000-4000 kelime uzunluğunda detaylı içerik oluşturun
- Her bölümü kapsamlı şekilde açıklayın
- İçeriği tam olarak tamamlayın

ANAHTAR KELİMELER: {KEYWORDS}';
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

        // ChatGPT API'si ile içerik oluştur - SADECE AI KULLAN
        return $this->generateWithChatGPT($prompt);
    }

    private function generateWithChatGPT($prompt) {
        $apiKey = config('chatgpt.api.key');
        $model = config('chatgpt.model') ?: 'gpt-3.5-turbo';
        $maxTokens = (int)(config('chatgpt.max.tokens') ?: 8000);
        $temperature = (float)(config('chatgpt.temperature') ?: 0.7);
        // İstenen model ile dene; eğer yalnızca model kaynaklı hata oluşursa akıllı fallback uygula
        $requestedModel = $model;
        $attemptModels = [$requestedModel];
        if ($requestedModel === 'gpt-5') {
            // Yalnızca model bulunamazsa denenecek alternatifler
            $attemptModels[] = 'gpt-4o';
            $attemptModels[] = 'gpt-4-turbo-preview';
        }

        $lastError = null;
        foreach ($attemptModels as $attemptModel) {
            $data = [
                'model' => $attemptModel,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Sen profesyonel bir Türkçe SEO içerik yazarısın. Depolama hizmetleri hakkında bilgilendirici HTML içerik üretirsin. Sadece HTML formatında yanıt ver, ek açıklama ekleme.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt . "\n\nLütfen yukarıdaki bilgilere göre profesyonel bir HTML içerik oluştur. İçerik 3000-4000 kelime uzunluğunda, detaylı ve kapsamlı olsun. Sadece HTML formatında yanıt ver."
                    ]
                ],
                'max_tokens' => $maxTokens,
                'temperature' => $temperature,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0
            ];

            // Debug için request'i log'la
            error_log('ChatGPT API Request Model: ' . $attemptModel);
            error_log('ChatGPT API Request Tokens: ' . $maxTokens);

            $context = stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' => [
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $apiKey,
                        'User-Agent: EuropaDepo-AI/1.0'
                    ],
                    'content' => json_encode($data),
                    'timeout' => 60,
                    'ignore_errors' => true
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ]
            ]);

            $response = @file_get_contents('https://api.openai.com/v1/chat/completions', false, $context);

            if ($response === false) {
                $error = error_get_last();
                $errorMsg = 'ChatGPT API\'ye erişim sağlanamadı';
                if ($error && isset($error['message'])) {
                    $errorMsg .= ': ' . $error['message'];
                }

                // HTTP response headers kontrol et
                if (isset($http_response_header)) {
                    $statusLine = $http_response_header[0] ?? '';
                    if (strpos($statusLine, '401') !== false) {
                        $errorMsg = 'ChatGPT API anahtarı geçersiz. Lütfen doğru API anahtarını girin.';
                    } elseif (strpos($statusLine, '429') !== false) {
                        $errorMsg = 'ChatGPT API rate limit aşıldı. Lütfen biraz bekleyip tekrar deneyin.';
                    } elseif (strpos($statusLine, '402') !== false) {
                        $errorMsg = 'ChatGPT API krediniz tükendi. Lütfen OpenAI hesabınızı kontrol edin.';
                    }
                }

                $lastError = new Exception($errorMsg);
                // Ağ/kimlik/limit hatalarında fallback denemeyelim
                break;
            }

            $result = json_decode($response, true);

            if (!$result) {
                $lastError = new Exception('ChatGPT API\'den geçersiz yanıt');
                // Geçersiz yanıt varsa fallback denemeyelim
                break;
            }

            if (isset($result['error'])) {
                $message = strtolower($result['error']['message'] ?? '');
                $lastError = new Exception('ChatGPT API Hatası: ' . ($result['error']['message'] ?? 'Bilinmeyen hata'));

                // Sadece model kaynaklı hatalarda (örn. model bulunamadı/unsupported) bir sonraki modele geç
                $isModelError = (
                    strpos($message, 'model') !== false && (
                        strpos($message, 'not found') !== false ||
                        strpos($message, 'does not exist') !== false ||
                        strpos($message, 'unknown') !== false ||
                        strpos($message, 'unsupported') !== false
                    )
                );

                if ($isModelError && $attemptModel !== end($attemptModels)) {
                    continue; // sıradaki fallback model ile tekrar dene
                }

                // Diğer hatalarda denemeyi kes
                break;
            }

            if (!isset($result['choices'][0]['message']['content'])) {
                $lastError = new Exception('ChatGPT\'den içerik alınamadı');
                // İçerik yoksa fallback denemeyelim
                break;
            }

            // Başarılı
            $content = trim($result['choices'][0]['message']['content']);
            // İçeriği temizle ve döndür
            $content = $this->cleanAIResponse($content);
            return $content;
        }

        // Buraya düştüyse tüm denemeler başarısız oldu
        if ($lastError instanceof Exception) {
            throw $lastError;
        }

        throw new Exception('ChatGPT isteği başarısız oldu.');
    }

    private function cleanAIResponse($content) {
        // Başındaki gereksiz metinleri kaldır
        $content = preg_replace('/^(html|HTML|```html|```)/i', '', $content);
        $content = preg_replace('/```$/', '', $content);

        // Başında açıklama varsa kaldır
        $content = preg_replace('/^[^<]*(<section)/i', '$1', $content);

        // Sonundaki ChatGPT açıklamalarını kaldır
        $content = preg_replace('/(<\/section>)[^<]*$/i', '$1', $content);

        // ChatGPT'nin eklediği açıklamaları kaldır
        $patterns = [
            '/Bu örnek.*?dışındadır\.?/is',
            '/Bu içerik.*?hazırlanmıştır\.?/is',
            '/verilen talimatlar.*?dışındadır\.?/is',
            '/tam olarak istenen.*?dışındadır\.?/is',
            '/Not:.*?dışındadır\.?/is',
            '/\*\*Not:\*\*.*?dışındadır\.?/is',
            '/Bu şablon.*?örnektir\.?/is',
            '/gerçek.*?oluştur.*?gerekir\.?/is',
            '/ancak.*?kapsamı.*?dışındadır\.?/is',
            '/platformun.*?dışındadır\.?/is',
            '/uzunluktaki.*?dışındadır\.?/is',
            '/\n\s*Bu.*?dışındadır\.?\s*$/is',
            '/```[^`]*Bu.*?dışındadır.*?```/is'
        ];

        foreach ($patterns as $pattern) {
            $content = preg_replace($pattern, '', $content);
        }

        // Script taglarından sonraki açıklamaları kaldır
        $content = preg_replace('/(<\/script>)\s*[^<]*$/i', '$1', $content);

        // Boş satırları temizle
        $content = preg_replace('/\n\s*\n\s*\n/', "\n\n", $content);

        // Son kontrol: section dışındaki herşeyi kaldır (JSON-LD hariç)
        if (preg_match('/(<section.*?<\/section>)(.*?)$/s', $content, $matches)) {
            $sectionContent = $matches[1];
            $afterSection = $matches[2];

            // Script taglarını koru, diğer açıklamaları kaldır
            $scripts = '';
            if (preg_match_all('/<script[^>]*>.*?<\/script>/s', $afterSection, $scriptMatches)) {
                $scripts = implode("\n\n", $scriptMatches[0]);
            }

            $content = $sectionContent . "\n\n" . $scripts;
        }

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

    // Template fonksiyonları kaldırıldı - SADECE AI kullanılıyor

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
