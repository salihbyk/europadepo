<?php if (!defined('HTMLY')) die('HTMLy'); ?>

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

<!-- About Us Section Start -->
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="about-businesses-client-content">
                    <!-- Section Sub Title Start -->
                    <div class="section-sub-title wow fadeInUp">
                        <span class="about-subtitle wow fadeInUp">Europa Depo</span>
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
                        <h2 class="text-effect" data-cursor="-opaque">Biz Kimiz ?</h2>
                        <?php echo $static->body; ?>
                    </div>
                    <!-- Section Title End -->

                    <!-- About Us Button Start -->
                    <div class="about-us-btn wow fadeInUp" data-wow-delay="0.6s">
                        <a href="<?php echo site_url();?>iletisim" class="btn-default">İletişime Geçin</a>
                    </div>
                    <!-- About Us Button End -->
                </div>
                <!-- About Us Content End -->
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->

