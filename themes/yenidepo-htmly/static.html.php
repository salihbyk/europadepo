<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php
// X-Robots-Tag HTTP Header for Static Pages
header('X-Robots-Tag: index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
?>

<!-- Page Header Start -->
<div class="page-header bg-section parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-3" data-cursor="-opaque"><?php echo $static->title; ?></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $static->title; ?></li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Page Service Single Start -->
<div class="page-service-single">
    <div class="container">
        <div class="row">


            <div class="col-lg-8">
                <!-- Service Single Content Start -->
                <div class="service-single-content">
                    <?php if (!empty($static->image)): ?>
                    <!-- Page Single Image Start -->
                    <div class="page-single-image data-item-hover">
                        <figure class="data-img-hover" data-intensity="0.4" data-speedin="1.5" data-speedout="1.5">
                            <img src="<?php echo $static->image; ?>" alt="<?php echo $static->title; ?>">
                        </figure>
                    </div>
                    <!-- Page Single Image End -->
                    <?php endif; ?>

                    <!-- Service Entry Start -->
                    <div class="service-entry">
                        <?php echo $static->body; ?>
                    </div>
                    <!-- Service Entry End -->
                </div>
                <!-- Service Single Content End -->
            </div>

            <div class="col-lg-4">
                <!-- Page Single Sidebar Start -->
                <div class="page-single-sidebar">
                    <!-- Services Widget Start -->
                    <div class="page-category-list wow fadeInUp" data-wow-delay="0.2s">
                        <h3>Hizmetlerimiz</h3>
                        <ul>
                            <li><a href="<?php echo site_url(); ?>ev-esyasi-depolama">Ev Eşyası Depolama</a></li>
                            <li><a href="<?php echo site_url(); ?>kisisel-esya-depolama">Kişisel Eşya Depolama</a></li>
                            <li><a href="<?php echo site_url(); ?>ticari-depolama">Ticari Depolama</a></li>
                            <li><a href="<?php echo site_url(); ?>arsiv-depolama">Arşiv Depolama</a></li>
                            <li><a href="<?php echo site_url(); ?>self-storage">Self-Storage</a></li>
                            <li><a href="<?php echo site_url(); ?>e-ticaret-urun-depolama">E-ticaret Ürün Depolama</a></li>
                            <li><a href="<?php echo site_url(); ?>medikal-urun-depolama">Medikal Ürün Depolama</a></li>
                            <li><a href="<?php echo site_url(); ?>sanat-antika-depolama">Sanat ve Antika Depolama</a></li>
                            <li><a href="<?php echo site_url(); ?>paletli-urun-depolama">Paletli Ürün Depolama</a></li>
                        </ul>
                    </div>
                    <!-- Services Widget End -->

                    <!-- WhatsApp Contact Widget Start -->
                    <div class="sidebar-widget wow fadeInUp" data-wow-delay="0.4s" style="background: linear-gradient(135deg, #25d366, #128c7e); padding: 25px; border-radius: 15px; text-align: center; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(37, 211, 102, 0.3);">
                        <div style="margin-bottom: 20px;">
                            <i class="fab fa-whatsapp" style="font-size: 48px; color: white;"></i>
                        </div>
                        <h3 style="color: white; margin-bottom: 10px; font-size: 20px;">WhatsApp İletişim</h3>
                        <p style="color: rgba(255,255,255,0.9); margin-bottom: 20px; font-size: 14px;">Hızlı destek için WhatsApp'tan bize ulaşın</p>
                        <a href="https://wa.me/905324801392?text=Merhaba, Europa Depo hizmetleriniz hakkında bilgi almak istiyorum." target="_blank" class="btn" style="background: white; color: #25d366; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-block; transition: all 0.3s ease;">
                            <i class="fab fa-whatsapp" style="margin-right: 8px;"></i>Mesaj Gönder
                        </a>
                    </div>
                    <!-- WhatsApp Contact Widget End -->

                    <!-- Phone Contact Widget Start -->
                    <div class="sidebar-widget wow fadeInUp" data-wow-delay="0.6s" style="background: linear-gradient(135deg, #007bff, #0056b3); padding: 25px; border-radius: 15px; text-align: center; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(0, 123, 255, 0.3);">
                        <div style="margin-bottom: 20px;">
                            <i class="fas fa-phone" style="font-size: 48px; color: white;"></i>
                        </div>
                        <h3 style="color: white; margin-bottom: 10px; font-size: 20px;">Telefon İletişim</h3>
                        <p style="color: rgba(255,255,255,0.9); margin-bottom: 20px; font-size: 14px;">7/24 müşteri hizmetlerimiz</p>
                        <a href="tel:4446995" class="btn" style="background: white; color: #007bff; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-block; transition: all 0.3s ease;">
                            <i class="fas fa-phone" style="margin-right: 8px;"></i>444 6 995
                        </a>
                    </div>
                    <!-- Phone Contact Widget End -->
                </div>
                <!-- Page Single Sidebar End -->
            </div>


        </div>
    </div>
</div>
<!-- Page Service Single End -->