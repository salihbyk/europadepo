<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php
// X-Robots-Tag HTTP Header for Homepage
header('X-Robots-Tag: index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
?>

<!-- Hero Section Start -->
<div class="hero bg-section dark-section parallaxie hero-video-bg">
    <!-- Video Background -->
    <video class="hero-video" autoplay muted loop>
        <source src="<?php echo theme_path();?>images/depolamavideo.mp4"
            type="video/mp4">
        <track kind="captions"
            src="data:text/vtt;base64,V0VCVlRUCgowMDowMDowMC4wMDAgLS0+IDAwOjAwOjEwLjAwMAo8Yj5FdXJvcGEgRGVwbyAtIEd1dmVubGkgRXN5YSBEZXBvbGFtYTwvYj4KCjAwOjAwOjEwLjAwMCAtLT4gMDA6MDA6MjAuMDAwCk1vZGVybiBkZXBvbGFtYSB0ZXNpc2xlcmltaXpkZSBlc3lhbGFyaW5peiBndXZlbmRlCgowMDowMDoyMC4wMDAgLS0+IDAwOjAwOjMwLjAwMApQcm9mZXN5b25lbCBla2liaW1peiBpbGUgZXN5YWxhcmluaXogZGVwb2xheWlwIGFsaXlvcnV6"
            srclang="tr" label="Türkçe Altyazı" default>
    </video>
    <div class="hero-overlay"></div>

    <div class="container">
        <div class="row align-items-center">
            <div class="hero-box">
                <!-- Hero Content Start -->
                <div class="hero-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <span class="hero-subtitle wow fadeInUp">Premium Ev Eşyası Depolama Hizmetleri</span>
                        <h1 class="text-anime-style-3" data-cursor="-opaque"><?php echo $static->title ?: 'Ankara Eşya Depolama Hizmeti'; ?></h1>
                        <p class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $static->body ?: 'Europa Depo olarak, ev eşyalarınızı en güvenli şekilde depoluyoruz. Modern tesislerimiz, 7/24 güvenlik sistemi ve profesyonel ekibimizle eşyalarınız tam güvende. Kısa ve uzun vadeli depolama çözümleri için bize güvenin.'; ?></p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Hero Button Start -->
                    <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                        <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başlayın</a>
                    </div>
                    <!-- Hero Button End -->
                </div>
                <!-- Hero Content End -->

                <!-- Hero Counter Box Start -->
                <div class="hero-counter-box">
                    <!-- Hero Review Box Start -->
                    <div class="hero-review-box">
                        <div class="hero-review-content">
                            <p><span class="counter">99</span>% Müşteri Memnuniyeti</p>
                        </div>
                        <!-- Satisfy Client Images Start -->

                        <!-- Satisfy Client Images End -->
                    </div>
                    <!-- Hero Review Box End -->

                    <!-- Hero Counter Item Start -->
                    <div class="hero-counter-item">
                        <span class="counter-title"><span class="counter">15</span>+</span>
                        <p>Yıllık deneyimimiz ve güvenilir depolama hizmetlerimizle binlerce müşteriye hizmet verdik
                        </p>
                    </div>
                    <!-- Hero Counter Item End -->
                </div>
                <!-- Hero Counter Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->

<!-- About Us Section Start -->
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="about-businesses-client-content">
                    <!-- Section Sub Title Start -->
                    <div class="section-sub-title wow fadeInUp">
                        <span class="about-subtitle wow fadeInUp">Premium Depolama Çözümleri</span>
                    </div>
                    <!-- Section Sub Title End -->

                    <!-- About Client Box Start -->
                    <div class="about-client-box wow fadeInUp" data-wow-delay="0.2s">

                        <!-- About Client Box Content Start -->
                        <div class="about-client-box-content">
                            <div class="about-video-container expanded">
                                <video controls autoplay muted loop width="100%" height="auto"
                                    poster="<?php echo theme_path();?>images/depo/video-poster.jpg">
                                    <source src="<?php echo theme_path();?>images/depo/v1.mp4" type="video/mp4">
                                    <track kind="captions"
                                        src="data:text/vtt;base64,V0VCVlRUCgowMDowMDowMC4wMDAgLS0+IDAwOjAwOjEwLjAwMAo8Yj5FdXJvcGEgRGVwbyAtIE11c3RlcmkgTWVtbnVuaXlldGk8L2I+CgowMDowMDoxMC4wMDAgLS0+IDAwOjAwOjIwLjAwMApCaW5sZXJjZSBtdXN0ZXJpbWl6bGUga3VyZHVndW11eiBndXZlbiBpbGlza2lzaW5kZW4gZ3VydXIgZHV5dXlvcnV6"
                                        srclang="tr" label="Türkçe Altyazı">
                                    <p>Tarayıcınız video oynatmayı desteklemiyor. <a
                                            href="<?php echo theme_path();?>images/depo/v1.mp4">Videoyu indirin</a>.</p>
                                </video>
                            </div>
                        </div>
                        <!-- About Client Box Content End -->
                    </div>
                    <!-- About Client Box End -->
                </div>
            </div>

            <div class="col-xl-8">
                <!-- About Us Content Start -->
                <div class="about-us-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-effect" data-cursor="-opaque">Müşteri odaklı yaklaşımımızla eşyalarınız
                            için premium depolama hizmetleri sunuyoruz</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Yılların deneyimi ve müşteri geri
                            bildirimlerini bir araya getirerek özel olarak tasarladığımız premium eşya depolama
                            tesislerimiz, modern ve güvenlik standartları en üst düzeyde hazırlanmıştır.
                            Depolarımızda yangın, sel, böcek ve benzeri tüm risklere karşı profesyonel önlemler
                            alınmış olup, eşyalarınız 7/24 güvence altındadır.</p>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Depolama sürecinden sonra müşterilerimiz,
                            kendilerine özel hazırlanmış online müşteri paneli üzerinden tüm ödemelerini kolayca
                            takip edebilir. Kredi kartı veya havale/EFT ile güvenli ödeme imkânı sunan sistemimiz,
                            aynı zamanda otomatik ödeme hatırlatma özelliğiyle kullanıcı dostu bir deneyim
                            sağlar. Ankara eşya depolama hizmetlerimizde, teknolojiyi ve profesyonelliği
                            birleştirerek
                            müşterilerimize güvenilir, modern ve uzun vadeli çözümler sunuyoruz.</p>


                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            Ankara'da güvenli depo kiralama ihtiyacı olan müşterilerimiz için özel olarak
                            hazırladığımız odalar, hem bireysel hem de kurumsal eşya depolama taleplerine uygundur.
                            Ev eşyalarınızdan ticari ürünlerinize kadar her türlü eşya için ideal çözümler sunan
                            tesislerimiz, uzun vadeli saklama ve kısa süreli depolama ihtiyaçlarında profesyonel
                            destek sağlar. Ankara eşya depolama fiyatları ise şeffaf ve ihtiyaca göre belirlenerek
                            bütçe dostu seçenekler sunar.</p>
                    </div>
                    <!-- Section Title End -->


                    <!-- About Us Button Start -->
                    <div class="about-us-btn wow fadeInUp" data-wow-delay="0.6s">
                        <a href="<?php echo site_url();?>hakkimizda" class="btn-default">Hakkımızda Daha Fazla</a>
                    </div>
                    <!-- About Us Button End -->
                </div>
                <!-- About Us Content End -->
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->

<!-- Our Services Section Start -->
<div class="our-services bg-section">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-12">
                <!-- Section Title Start -->
                <div class="section-title section-title-center">
                    <h3 class="wow fadeInUp">Hizmetlerimiz</h3>
                    <h2 class="text-effect" data-cursor="-opaque">Ankara'da Premium ve Kurumsal Eşya Depolama
                        Hizmeti</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row services-item-list">
            <div class="col-xl-3 col-md-6">
                <!-- Service Item Start -->
                <div class="services-item active wow fadeInUp">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-1.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>ev-esyasi-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>ev-esyasi-depolama">Ev Eşyası Depolama</a></h3>
                        <p>Ev eşyalarınız için güvenli ve profesyonel depolama hizmeti</p>
                        <ul>
                            <li>7/24 güvenlik sistemi</li>
                            <li>Klima kontrollü ortam</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-3 col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-2.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>ticari-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>ticari-depolama">Ticari Depolama</a></h3>
                        <p>İşletmenizin ürünleri için güvenli ticari depolama çözümleri</p>
                        <ul>
                            <li>Esnek depolama alanları</li>
                            <li>Lojistik destek hizmeti</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-3 col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-3.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>self-storage" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>self-storage">Self-Storage</a></h3>
                        <p>Kendi eşyalarınıza istediğiniz zaman erişebileceğiniz özel alanlar</p>
                        <ul>
                            <li>24 saat erişim imkanı</li>
                            <li>Kişisel güvenlik kodları</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-3 col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="0.6s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-4.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>arsiv-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>arsiv-depolama">Arşiv Depolama</a></h3>
                        <p>Önemli belgeleriniz ve arşiv malzemeleriniz için özel depolama</p>
                        <ul>
                            <li>Nem ve sıcaklık kontrolü</li>
                            <li>Dijital kataloglama sistemi</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-5th col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="0.8s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-1.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>kisisel-esya-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>kisisel-esya-depolama">Kişisel Eşya Depolama</a></h3>
                        <p>Kişisel eşyalarınız için güvenli ve özel depolama alanları</p>
                        <ul>
                            <li>Kişiye özel depo bölümleri</li>
                            <li>Esnek kiralama süreleri</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-5th col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="1.0s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-2.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>paletli-urun-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>paletli-urun-depolama">Paletli Ürün Depolama</a></h3>
                        <p>Endüstriyel ürünleriniz için paletli depolama sistemi</p>
                        <ul>
                            <li>Forklift erişimi</li>
                            <li>Yüksek kapasiteli raflar</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-5th col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="1.2s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-3.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>e-ticaret-urun-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>e-ticaret-urun-depolama">E-ticaret Ürün Depolama</a></h3>
                        <p>E-ticaret işletmeniz için özel depolama ve lojistik çözümleri</p>
                        <ul>
                            <li>Hızlı kargo entegrasyonu</li>
                            <li>Stok yönetim sistemi</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-5th col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="1.4s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-4.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>medikal-urun-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>medikal-urun-depolama">Medikal Ürün Depolama</a></h3>
                        <p>Tıbbi malzemeler için özel şartlarda güvenli depolama</p>
                        <ul>
                            <li>Steril ortam koşulları</li>
                            <li>Sıcaklık kontrollü alanlar</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-xl-5th col-md-6">
                <!-- Service Item Start -->
                <div class="services-item wow fadeInUp" data-wow-delay="1.6s">
                    <div class="services-item-header">
                        <div class="icon-box">
                            <img src="<?php echo theme_path();?>images/icon-services-1.svg" alt="Hizmet İkonu">
                        </div>
                        <div class="services-btn">
                            <a href="<?php echo site_url();?>sanat-antika-depolama" aria-label="Hizmet detaylarını görüntüle"><img
                                    src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Detaylar"></a>
                        </div>
                    </div>
                    <div class="services-item-content">
                        <h3><a href="<?php echo site_url();?>sanat-antika-depolama">Sanat ve Antika Depolama</a></h3>
                        <p>Değerli sanat eserleri ve antikalar için özel koruma</p>
                        <ul>
                            <li>Nem ve ışık kontrolü</li>
                            <li>Özel ambalajlama hizmeti</li>
                        </ul>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>

            <div class="col-lg-12">
                <!-- Section Footer Text Start -->
                <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                    <p><span>Ücretsiz</span>Keşif ziyaretinden kuruluma kadar - <a
                            href="<?php echo site_url();?>iletisim">ihtiyaçlarınıza uygun Ankara eşya depolama çözümlerini keşfedin.</a>
                    </p>
                </div>
                <!-- Section Footer Text End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Services Section End -->

<!-- Why Choose Us Section Start -->
<div class="why-choose-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <!-- Why Choose Image Box Start -->
                <div class="why-choose-image-box">
                    <div class="why-choose-box-1">
                        <!-- Why Choose Image Start -->
                        <div class="why-choose-img image-1">
                            <figure class="image-anime reveal">
                                <img src="<?php echo theme_path();?>images/depo/1.jpeg" alt="Europa Depo Modern Depolama Tesisi">
                            </figure>
                        </div>
                        <!-- Why Choose Image End -->

                        <!-- Why Choose Image Start -->
                        <div class="why-choose-img image-2">
                            <figure class="image-anime reveal">
                                <img src="<?php echo theme_path();?>images/depo/2.jpeg" alt="Europa Depo Güvenli Depolama Alanı">
                            </figure>
                        </div>
                        <!-- Why Choose Image End -->
                    </div>

                    <div class="why-choose-box-2">
                        <!-- Why Choose Image Start -->
                        <div class="why-choose-img image-3">
                            <figure class="image-anime reveal">
                                <img src="<?php echo theme_path();?>images/depo/4.jpeg" alt="Europa Depo Profesyonel Depolama">
                            </figure>
                        </div>
                        <!-- Why Choose Image End -->

                        <!-- Why Choose Image Start -->
                        <div class="why-choose-img image-4">
                            <figure class="image-anime reveal">
                                <img src="<?php echo theme_path();?>images/depo/7.jpeg" alt="Europa Depo Temiz Depolama Ortamı">
                            </figure>
                        </div>
                        <!-- Why Choose Image End -->
                    </div>

                    <!-- Contact Us Circle Start -->
                    <div class="contact-us-circle">
                        <a href="<?php echo site_url();?>iletisim" aria-label="İletişim sayfasına git"><img
                                src="<?php echo theme_path();?>images/contact-us-circle.svg" alt="İletişim"></a>
                    </div>
                    <!-- Contact Us Circle End -->
                </div>
                <!-- Why Choose Image Box End -->
            </div>

            <div class="col-xl-6">
                <!-- Why Choose Item Box Start -->
                <div class="why-choose-us-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Neden Bizi Seçmelisiniz</h3>
                        <h2 class="text-effect" data-cursor="-opaque">Ankara eşya depolama alanında
                            müşterilerimizin ihtiyaçlarına odaklanıyoruz</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Ekibimiz onlarca yıllık Ankara eşya depolama
                            deneyimi, gelişmiş güvenlik teknolojileri ve müşteri odaklı yaklaşımımızla eşyalarınızın
                            güvenliğini sürekli değişen koşullarda da garanti altına alır.</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Why Choose Body Start -->
                    <div class="why-choose-body">
                        <!-- Why Choose List Start -->
                        <div class="why-choose-list wow fadeInUp" data-wow-delay="0.4s">
                            <ul>
                                <li>Ankara'da Kanıtlanmış Deneyimli Uzman Ekip</li>
                                <li>7/24 Proaktif Güvenlik ve İzleme Sistemi</li>
                                <li>Kurumsal Düzeyde Güvenlik ve Uyumluluk</li>
                                <li>Şeffaf İletişim ve Özel Ankara Eşya Depolama Danışmanlığı</li>
                            </ul>
                        </div>
                        <!-- Why Choose List End -->

                        <!-- Why Choose Counter Box Start -->
                        <div class="why-choose-counter-box">
                            <div class="icon-box">
                                <img src="<?php echo theme_path();?>images/icon-why-choose-counter.svg" alt="İkon">
                            </div>
                            <div class="why-choose-counter-content">
                                <span class="counter-title"><span class="counter">15</span>+</span>
                                <p>Yıllık Ankara Eşya Depolama Deneyimi</p>
                            </div>
                        </div>
                        <!-- Why Choose Counter Box End -->
                    </div>
                    <!-- Why Choose Body End -->

                    <!-- Why Choose Button Start -->
                    <div class="why-choose-btn wow fadeInUp" data-wow-delay="0.6s">
                        <a href="<?php echo site_url();?>iletisim" class="btn-default">İletişime Geçin</a>
                    </div>
                    <!-- Why Choose Button End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Why Choose Us Section End -->

<!-- Our Pricing Section Start -->
<div class="our-pricing bg-section">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-12">
                <!-- Section Title Start -->
                <div class="section-title section-title-center">
                    <h3 class="wow fadeInUp">Ankara Eşya Depo Fiyatları</h3>
                    <h2 class="text-effect" data-cursor="-opaque">Her bütçeye uygun esnek Ankara eşya depolama
                        hizmet planları</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Our Pricing Box Start -->
                <div class="our-pricing-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="our-pricing-swich form-check form-switch">
                        <label class="form-check-label" for="planToggle" id="toggleLabelMonthly">Aylık</label>
                        <span><input class="form-check-input" type="checkbox" id="planToggle"></span>
                        <label class="form-check-label" for="planToggle" id="toggleLabelAnnually">Yıllık</label>
                    </div>
                    <!-- Sidebar Our Pricing Nav End -->

                    <!-- Pricing Tab Item Start -->
                    <div class="pricing-tab-item" id="monthly">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Pricing Items List Start -->
                                <div class="pricing-items-list">
                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-1.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">₺4.000<sub>/Aylık</sub></span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Ortalama 1+0 ve küçük evler için ideal Ankara eşya depolama
                                                    çözümü.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>11-14 m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->

                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-2.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">₺7.000<sub>/Aylık</sub></span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Ortalama 2+1 ve 3+1 evler için geniş Ankara eşya depolama alanı.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>30-35 m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->

                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-3.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">₺8.000<sub>/Aylık</sub></span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Ortalama 3+1 ve 4+1 büyük evler için maksimum kapasiteli premium
                                                    hizmet.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>35-40 m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->

                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-4.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">Özel<sub>/Fiyat</sub></span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Ürün depolama ve özel depolama ihtiyaçları için kişiye özel
                                                    fiyatlandırma.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>Belirlediğiniz m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->
                                </div>
                                <!-- Pricing Items List End -->
                            </div>
                        </div>
                    </div>
                    <!-- Pricing Tab Item End -->

                    <!-- Pricing Tab Item Start -->
                    <div class="pricing-tab-item d-none" id="annually">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Pricing Items List Start -->
                                <div class="pricing-items-list">
                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-1.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">₺40.000<sub>/Yıllık</sub></span>
                                                <span class="discount-badge">2 Ay Ücretsiz!</span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Ortalama 1+0 ve küçük evler için ideal Ankara eşya depolama
                                                    çözümü.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>11-14 m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                                <li>%17 Yıllık İndirim</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->

                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-2.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">₺70.000<sub>/Yıllık</sub></span>
                                                <span class="discount-badge">2 Ay Ücretsiz!</span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Ortalama 2+1 ve 3+1 evler için geniş Ankara eşya depolama alanı.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>30-35 m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                                <li>%17 Yıllık İndirim</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->

                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-3.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">₺80.000<sub>/Yıllık</sub></span>
                                                <span class="discount-badge">2 Ay Ücretsiz!</span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Ortalama 3+1 ve 4+1 büyük evler için maksimum kapasiteli premium
                                                    hizmet.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>35-40 m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                                <li>%17 Yıllık İndirim</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->

                                    <!-- Pricing Item Start -->
                                    <div class="pricing-item">
                                        <!-- Pricing Item Header Start -->
                                        <div class="pricing-item-header">
                                            <!-- Pricing Header Start -->
                                            <div class="icon-box">
                                                <img src="<?php echo theme_path();?>images/icon-pricing-4.svg" alt="İkon">
                                            </div>
                                            <!-- Pricing Header End -->

                                            <!-- Pricing Price Start -->
                                            <div class="pricing-price">
                                                <span class="pricing-amount">Özel<sub>/Yıllık</sub></span>
                                                <span class="discount-badge">2 Ay Ücretsiz!</span>
                                            </div>
                                            <!-- Pricing Price End -->

                                            <!-- Pricing Item Content Start -->
                                            <div class="pricing-item-content">
                                                <p>Medikal ürün depolama ve özel depolama ihtiyaçları için yıllık
                                                    özel paket.
                                                </p>
                                            </div>
                                            <!-- Pricing Item Content End -->
                                        </div>
                                        <!-- Pricing Item Header End -->

                                        <!-- Pricing body Start -->
                                        <div class="pricing-body">
                                            <span class="pricing-features-title">Dahil Olanlar:</span>
                                            <ul>
                                                <li>Belirlediğiniz m³ depolama alanı</li>
                                                <li>Online ödeme sistemi</li>
                                                <li>Müşteri paneli erişimi</li>
                                                <li>Depo giriş-çıkış kayıtları</li>
                                                <li>Canlı kamera izleme</li>
                                            </ul>

                                            <!-- Pricing Button Start -->
                                            <div class="pricing-btn">
                                                <a href="<?php echo site_url();?>iletisim" class="btn-default">Hemen Başla</a>
                                            </div>
                                            <!-- Pricing Button End -->
                                        </div>
                                        <!-- Pricing body End -->
                                    </div>
                                    <!-- Pricing Item End -->
                                </div>
                                <!-- Pricing Items List End -->
                            </div>
                        </div>
                    </div>
                    <!-- Pricing Tab Item End -->

                    <!-- Pricing Benifit List Start -->
                    <div class="pricing-benefit-list wow fadeInUp" data-wow-delay="0.2s">
                        <ul>
                            <li><img src="<?php echo theme_path();?>images/icon-pricing-benefit-1.svg" alt="İkon">Ücretsiz keşif ve danışmanlık
                                hizmeti</li>
                            <li><img src="<?php echo theme_path();?>images/icon-pricing-benefit-2.svg" alt="İkon">Gizli ücret yok, şeffaf
                                fiyatlandırma</li>
                            <li><img src="<?php echo theme_path();?>images/icon-pricing-benefit-3.svg" alt="İkon">Esnek sözleşme koşulları </li>
                        </ul>
                    </div>
                    <!-- Pricing Benifit List End -->
                </div>
                <!-- Our Pricing Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Pricing Section End -->

<!-- How It Work Section Start -->
<div class="how-it-work">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-4">
                <!-- Section Sub Title Start -->
                <div class="section-sub-title">
                    <h3 class="wow fadeInUp">Depolama Süreci</h3>
                </div>
                <!-- Section Sub Title End -->
            </div>

            <div class="col-lg-8">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="text-effect" data-cursor="-opaque">Ankara eşya depolama sürecimizde güvenli, kolay ve
                        sorunsuz hizmet garantisi</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- How Work Step Box Start -->
                <div class="how-work-step-box">
                    <!-- How Work Item Start -->
                    <div class="how-work-item wow fadeInUp">
                        <div class="how-work-body">
                            <div class="how-work-header">
                                <div class="icon-box">
                                    <img src="<?php echo theme_path();?>images/icon-how-work-1.svg" alt="İkon">
                                </div>
                                <div class="how-work-stpe-no">
                                    <span class="step-number">Step 01</span>
                                </div>
                            </div>
                            <div class="how-work-item-content">
                                <h3>Ücretsiz Keşif ve Sözleşme</h3>
                                <p>Uzman ekibimiz evinize gelerek ücretsiz keşif yapar ve dijital sözleşmelerinizi
                                    hazırlar.</p>
                                <ul>
                                    <li>Detaylı ev ve eşya keşfi</li>
                                    <li>Nakliye ve depolama sözleşmeleri</li>
                                </ul>
                            </div>
                        </div>
                        <div class="how-work-item-list">
                            <ul>
                                <li>Dijital İmza</li>
                                <li>Tablet Üzerinden Sözleşme</li>
                            </ul>
                        </div>
                    </div>
                    <!-- How Work Item End -->

                    <!-- How Work Item Start -->
                    <div class="how-work-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="how-work-body">
                            <div class="how-work-header">
                                <div class="icon-box">
                                    <img src="<?php echo theme_path();?>images/icon-how-work-2.svg" alt="İkon">
                                </div>
                                <div class="how-work-stpe-no">
                                    <span class="step-number">Step 02</span>
                                </div>
                            </div>
                            <div class="how-work-item-content">
                                <h3>Profesyonel Taşıma Hizmeti</h3>
                                <p>Uzman ekibimiz sabah işe başlayarak eşyalarınızı güvenle taşır ve kontrol eder.
                                </p>
                                <ul>
                                    <li>Sabah erken başlangıç</li>
                                    <li>Ekip şefi eşliğinde kontrol</li>
                                </ul>
                            </div>
                        </div>
                        <div class="how-work-item-list">
                            <ul>
                                <li>Güvenli Paketleme</li>
                                <li>Ankara Eşya Taşıma</li>
                            </ul>
                        </div>
                    </div>
                    <!-- How Work Item End -->

                    <!-- How Work Item Start -->
                    <div class="how-work-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="how-work-body">
                            <div class="how-work-header">
                                <div class="icon-box">
                                    <img src="<?php echo theme_path();?>images/icon-how-work-3.svg" alt="İkon">
                                </div>
                                <div class="how-work-stpe-no">
                                    <span class="step-number">Step 03</span>
                                </div>
                            </div>
                            <div class="how-work-item-content">
                                <h3>Depo Teslimi ve Yerleştirme</h3>
                                <p>Eşyalarınız depoya ulaştığında size özel odaya düzenli şekilde yerleştirilir.</p>
                                <ul>
                                    <li>Müşteriye özel depo odası</li>
                                    <li>Düzenli istifleme sistemi</li>
                                </ul>
                            </div>
                        </div>
                        <div class="how-work-item-list">
                            <ul>
                                <li>Güvenli Depolama</li>
                                <li>Ankara Depo Hizmeti</li>
                            </ul>
                        </div>
                    </div>
                    <!-- How Work Item End -->

                    <!-- How Work Item Start -->
                    <div class="how-work-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="how-work-body">
                            <div class="how-work-header">
                                <div class="icon-box">
                                    <img src="<?php echo theme_path();?>images/icon-how-work-4.svg" alt="İkon">
                                </div>
                                <div class="how-work-stpe-no">
                                    <span class="step-number">Step 04</span>
                                </div>
                            </div>
                            <div class="how-work-item-content">
                                <h3>Müşteri Paneli ve Kilit Teslimi</h3>
                                <p>Müşteri panel bilgileriniz ve depo kilit bilgileriniz size teslim edilir.</p>
                                <ul>
                                    <li>Online müşteri paneli</li>
                                    <li>Kişisel güvenlik kilidi</li>
                                </ul>
                            </div>
                        </div>
                        <div class="how-work-item-list">
                            <ul>
                                <li>7/24 Erişim</li>
                                <li>Dijital Takip</li>
                            </ul>
                        </div>
                    </div>
                    <!-- How Work Item End -->
                </div>
                <!-- How Work Step Box End -->
            </div>

            <div class="col-lg-12">
                <!-- Section Footer Text Start -->
                <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                    <p><span>Ücretsiz</span> Keşiften teslime kadar - <a href="<?php echo site_url();?>iletisim">Ankara eşya depolama
                            sürecimizi keşfedin ve güvenli hizmeti deneyimleyin.</a></p>
                </div>
                <!-- Section Footer Text End -->
            </div>
        </div>
    </div>
</div>
<!-- How It Work Section End -->

<!-- Our FAQs Section Start -->
<div class="our-faqs bg-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <!-- Faq Image Box Start -->
                <div class="faq-image-box wow fadeInUp" data-wow-delay="0.2s">
                    <!-- Faq Image 1 Start -->
                    <div class="faq-img-1">
                        <!-- Faq Image Start -->
                        <div class="faq-image">
                            <figure class="image-anime">
                                <img src="<?php echo theme_path();?>images/depo/1.jpeg"
                                    alt="Europa Depo Hakkımızda Görseli">
                            </figure>
                        </div>
                        <!-- Faq Image End -->

                        <!-- Contact Us Circle Start -->
                        <div class="contact-us-circle">
                            <a href="<?php echo site_url();?>iletisim" aria-label="İletişim sayfasına git"><img
                                    src="<?php echo theme_path();?>images/contact-us-circle.svg" alt="İletişim"></a>
                        </div>
                        <!-- Contact Us Circle End -->
                    </div>
                    <!-- Faq Image 1 End -->

                    <!-- Faq Image 2 Start -->
                    <div class="faq-img-2">
                        <!-- Faq CTA Box Start -->
                        <div class="faq-cta-box">
                            <div class="icon-box">
                                <img src="<?php echo theme_path();?>images/icon-headphone.svg" alt="İkon">
                            </div>
                            <div class="faq-cta-content">
                                <p>Yardıma mı ihtiyacınız var? Bize ulaşın</p>
                                <h3><a href="tel:4446995">444 6 995</a></h3>
                            </div>
                        </div>
                        <!-- Faq CTA Box End -->

                        <!-- Faq Image Start -->
                        <div class="faq-image">
                            <figure class="image-anime">
                                <img src="<?php echo theme_path();?>images/depo/1.jpeg"
                                    alt="Europa Depo Hakkımızda Görseli">
                            </figure>
                        </div>
                        <!-- Faq Image End -->
                    </div>
                    <!-- Faq Image 2 End -->
                </div>
                <!-- Faq Image Box End -->
            </div>

            <div class="col-xl-6">
                <!-- FAQs Content Start -->
                <div class="faqs-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="wow fadeInUp">Sık Sorulan Sorular</h2>
                        <h3 class="text-effect" data-cursor="-opaque">Ankara eşya depolama hizmetlerimiz hakkında
                            bilmeniz gereken her şey</h3>
                    </div>
                    <!-- Section Title End -->

                    <!-- FAQ Accordion Start -->
                    <div class="faq-accordion" id="accordion">
                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h3 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    S1. Ankara eşya depolama hizmeti nedir?
                                </button>
                            </h3>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Ankara eşya depolama, ev veya iş yerinizde yer kaplayan fazla eşyalarınızı
                                        güvenli, modern ve özel olarak tasarlanmış depolama alanlarında koruma
                                        hizmetidir. Eşyalarınız yangın, sel, böcek ve benzeri risklere karşı
                                        profesyonel önlemler alınmış tesislerde saklanır.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                            <h3 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    S2. Depolama alanlarınız güvenli mi?
                                </button>
                            </h3>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Evet. Tüm depolarımız yangın sensörleri, nem kontrol sistemleri, 7/24 kamera
                                        güvenliği ve haşere önlemleriyle donatılmıştır. Ayrıca giriş-çıkışlar kayıt
                                        altında tutulur ve depolar sadece yetkili personel tarafından açılabilir.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                            <h3 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    S3. Ankara'da eşya depolama fiyatları nasıl belirleniyor?
                                </button>
                            </h3>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Depolama fiyatları; eşya miktarı, depo süresi ve seçilen oda büyüklüğüne göre
                                        değişiklik göstermektedir. İhtiyacınıza en uygun fiyat teklifini almak için
                                        online teklif formumuzu doldurabilir veya müşteri temsilcimizle iletişime
                                        geçebilirsiniz.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                            <h3 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    S4. Depolama sırasında eşyalarıma nasıl ulaşabilirim?
                                </button>
                            </h3>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Müşterilerimiz için özel hazırlanmış online müşteri paneli sayesinde depolama
                                        sürecini anlık takip edebilir, ödeme durumunu görebilir ve talep halinde
                                        depoya erişim sağlayabilirsiniz.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                            <h3 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    S5. Depo ödemelerini nasıl yapabilirim?
                                </button>
                            </h3>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Ödemelerinizi kredi kartı veya havale/EFT ile kolayca yapabilirsiniz. Online
                                        panelimizde ödeme hatırlatma sistemi de bulunmaktadır, böylece ödemelerinizi
                                        aksatma riski ortadan kalkar.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.7s">
                            <h3 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    S6. Kısa süreli eşya depolama yapabilir miyim?
                                </button>
                            </h3>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Evet. Ankara eşya depolama hizmetlerimiz hem kısa süreli hem de uzun süreli
                                        depolama ihtiyaçlarınıza uygundur. Taşınma, tadilat veya geçici şehir dışı
                                        durumlarında kısa vadeli çözümler de sunuyoruz.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                            <h3 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    S7. Hangi tür eşyaları depolayabilirim?
                                </button>
                            </h3>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Ev eşyaları, ofis mobilyaları, arşiv dosyaları, ticari ürünler, paletli
                                        malzemeler ve kişisel eşyalar güvenle depolanabilir. Ancak tehlikeli
                                        kimyasal maddeler, yanıcı ürünler ve yasa dışı eşyalar kabul edilmemektedir.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.9s">
                            <h3 class="accordion-header" id="heading8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                    S8. Depolarınız Ankara'nın neresinde bulunuyor?
                                </button>
                            </h3>
                            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Depolarımız Ankara'nın Çankaya ve Kazan bölgelerinde yer almaktadır. Her iki
                                        tesisimiz de merkezi konumları ve kolay ulaşım imkânları ile
                                        müşterilerimizin depolama ihtiyaçlarını en pratik şekilde karşılamaktadır.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->
                    </div>
                    <!-- FAQ Accordion End -->
                </div>
                <!-- FAQs Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Our FAQs Section End -->

<?php
try {
    $posts = recent_posts(true);
} catch (Exception $e) {
    $posts = array();
}
?>
<?php if (!empty($posts)): ?>
<!-- Our Blog Section Start -->
<div class="our-blog">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-xl-6 col-lg-8">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="wow fadeInUp">Blog Yazılarımız</h2>
                    <h3 class="text-effect" data-cursor="-opaque">Ankara eşya depolama konusunda faydalı bilgiler ve
                        ipuçları</h3>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-xl-6 col-lg-4">
                <!-- Section Button Start -->
                <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                    <a href="<?php echo site_url() . blog_path(); ?>" class="btn-default">Tüm Blog Yazıları</a>
                </div>
                <!-- Section Button End -->
            </div>
        </div>

        <div class="row">
            <!-- Post Item List Start -->
            <div class="post-item-list">
                <?php foreach (array_slice($posts, 0, 4) as $index => $post): ?>
                <!-- Post Item Start -->
                <div class="post-item wow fadeInUp" data-wow-delay="<?php echo $index * 0.2; ?>s">
                    <!-- Post Featured Image Start-->
                    <div class="post-featured-image">
                        <a href="<?php echo $post->url; ?>" data-cursor-text="View">
                            <figure class="image-anime">
                                <?php if (!empty($post->image)): ?>
                                <img src="<?php echo $post->image; ?>" alt="<?php echo $post->title; ?>">
                                <?php else: ?>
                                <img src="<?php echo theme_path(); ?>images/post-<?php echo ($index % 4) + 1; ?>.jpg" alt="<?php echo $post->title; ?>">
                                <?php endif; ?>
                            </figure>
                        </a>
                        <div class="post-item-tags">
                            <a href="<?php echo site_url(); ?>">Europa Depo</a>
                        </div>
                    </div>
                    <!-- Post Featured Image End -->

                    <!-- Post Item Body Start -->
                    <div class="post-item-body">
                        <!-- Post Item Content Start -->
                        <div class="post-item-content">
                            <h3><a href="<?php echo $post->url; ?>"><?php echo $post->title; ?></a></h3>
                        </div>
                        <!-- Post Item Content End -->

                    </div>
                    <!-- Post Item Body End -->
                </div>
                <!-- Post Item End -->
                <?php endforeach; ?>
            </div>
            <!-- Post Item List End -->
        </div>
    </div>
</div>
<!-- Our Blog Section End -->
<?php endif; ?>

<!-- Pricing JSON-LD Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Ankara Eşya Depolama Hizmetleri",
    "description": "Ankara'da güvenli ve uygun fiyatlı eşya depolama hizmetleri. Ev eşyası, ticari ürün ve arşiv depolama çözümleri.",
    "provider": {
        "@type": "Organization",
        "name": "Europa Depo",
        "url": "<?php echo site_url(); ?>"
    },
    "areaServed": {
        "@type": "Place",
        "name": "Ankara, Turkey"
    },
    "offers": [
        {
            "@type": "Offer",
            "name": "Temel Depolama Paketi",
            "description": "1+0 ve küçük evler için ideal depolama çözümü",
            "price": "4000",
            "priceCurrency": "TRY",
            "priceSpecification": {
                "@type": "UnitPriceSpecification",
                "price": "4000",
                "priceCurrency": "TRY",
                "unitCode": "MON",
                "unitText": "Aylık"
            },
            "itemOffered": {
                "@type": "Service",
                "name": "Temel Eşya Depolama",
                "description": "11-14 m³ depolama alanı, güvenlik kamerası, yangın ve sel önlemleri"
            }
        },
        {
            "@type": "Offer",
            "name": "Standart Depolama Paketi",
            "description": "2+1 ve 3+1 evler için geniş depolama alanı",
            "price": "7000",
            "priceCurrency": "TRY",
            "priceSpecification": {
                "@type": "UnitPriceSpecification",
                "price": "7000",
                "priceCurrency": "TRY",
                "unitCode": "MON",
                "unitText": "Aylık"
            },
            "itemOffered": {
                "@type": "Service",
                "name": "Standart Eşya Depolama",
                "description": "30-35 m³ depolama alanı, ileri ambalajlama, nakliye desteği"
            }
        },
        {
            "@type": "Offer",
            "name": "Premium Depolama Paketi",
            "description": "3+1 ve 4+1 büyük evler için maksimum kapasiteli premium hizmet",
            "price": "8000",
            "priceCurrency": "TRY",
            "priceSpecification": {
                "@type": "UnitPriceSpecification",
                "price": "8000",
                "priceCurrency": "TRY",
                "unitCode": "MON",
                "unitText": "Aylık"
            },
            "itemOffered": {
                "@type": "Service",
                "name": "Premium Eşya Depolama",
                "description": "50+ m³ depolama alanı, tam ambalaj, demontaj-montaj, geniş sigorta"
            }
        }
    ]
}
</script>

<!-- FAQ JSON-LD Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "Neden Ev Eşyası Depolama?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Ev eşyası depolama, taşınma, tadilat, seyahat veya alan sıkıntısı durumlarında eşyalarınızı güvenli bir şekilde saklamanızı sağlar. Europa Depo olarak 7/24 güvenlik, yangın ve sel önlemleri ile eşyalarınızı koruyoruz."
            }
        },
        {
            "@type": "Question",
            "name": "Depolama Süreci Nasıl İşler?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Önce ihtiyacınızı değerlendiriyoruz, ardından uygun depolama alanını belirliyoruz. Eşyalarınızı profesyonel ekibimizle paketleyip güvenli tesisimize taşıyoruz. İstediğiniz zaman eşyalarınıza erişebilirsiniz."
            }
        },
        {
            "@type": "Question",
            "name": "Fiyatlandırma ve m³ Hesabı",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Fiyatlandırmamız depolama alanının büyüklüğüne göre belirlenir. Temel paket 11-14 m³ için ₺4.000/ay, standart paket 30-35 m³ için ₺7.000/ay, premium paket 50+ m³ için ₺8.000/ay'dır."
            }
        },
        {
            "@type": "Question",
            "name": "Güvenlik & Sigorta",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Tesislerimizde 7/24 güvenlik kamerası sistemi, yangın ve sel önlemleri bulunmaktadır. Tüm paketlerimizde sigorta dahildir ve eşyalarınız tam güvence altındadır."
            }
        }
    ]
}
</script>
