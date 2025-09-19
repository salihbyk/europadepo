<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php
// X-Robots-Tag HTTP Header for Contact Page
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

<!-- Page Contact Us Start -->
<div class="page-contact-us">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <!-- Contact Us Heading Start -->
                <div class="contact-us-heading">
                    <!-- Section Sub Title Start -->
                    <div class="section-sub-title wow fadeInUp">
                        <h3 class="wow fadeInUp">İletişim Bilgilerimiz</h3>
                    </div>
                    <!-- Section Sub Title End -->
                </div>
                <!-- Contact Us Heading End -->
            </div>

            <div class="col-xl-8">
                <!-- Contact Us Content Start -->
                <div class="contact-us-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Bugün bizimle iletişime geçin ve güvenli depolama çözümlerinizi keşfedin</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Info List Start -->
                    <div class="contact-info-list">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp">
                            <div class="icon-box">
                                <img src="<?php echo theme_path(); ?>images/icon-phone-primary.svg" alt="İletişim İkonu">
                            </div>
                            <div class="contact-item-content">
                                <h3>Telefon</h3>
                                <p>Uzun vadeli stratejilere odaklanarak işletmenizi güçlendiriyoruz.</p>
                                <h4><a href="tel:4446995">444 6 995</a></h4>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->

                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="<?php echo theme_path(); ?>images/icon-mail-primary.svg" alt="İletişim İkonu">
                            </div>
                            <div class="contact-item-content">
                                <h3>E-posta</h3>
                                <p>Profesyonel depolama hizmetlerimiz hakkında bilgi alın.</p>
                                <h4><a href="mailto:info@europadepo.com">info@europadepo.com</a></h4>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->

                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="<?php echo theme_path(); ?>images/icon-location-primary.svg" alt="İletişim İkonu">
                            </div>
                            <div class="contact-item-content">
                                <h3>Adres</h3>
                                <p>Modern depolama tesislerimizi ziyaret edebilirsiniz.</p>
                                <h4>Kayı mahallesi 3241 cadde<br>06980 Kahramankazan/Ankara</h4>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>
                    <!-- Contact Info List End -->
                </div>
                <!-- Contact Us Content End -->
            </div>

            <div class="col-lg-12">
                <!-- Contact Form Box Start -->
                <div class="contact-form-box">
                    <!-- Contact Us Form Start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-cursor="-opaque">Bize mesaj gönderin</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Adınız" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Soyadınız" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="E-posta Adresiniz" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefon Numaranız" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-4">
                                        <select name="service" class="form-control" id="service">
                                            <option value="">İlgilendiğiniz Hizmet</option>
                                            <option value="ev-esyasi">Ev Eşyası Depolama</option>
                                            <option value="ticari">Ticari Depolama</option>
                                            <option value="self-storage">Self-Storage</option>
                                            <option value="arsiv">Arşiv Depolama</option>
                                            <option value="e-ticaret">E-ticaret Ürün Depolama</option>
                                            <option value="diger">Diğer</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="message" class="form-control" id="message" rows="4" placeholder="Mesajınız..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default">Mesaj Gönder</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                    <!-- Contact Us Form End -->

                    <!-- Google Map Start -->
                    <div class="google-map-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d6078.656318544111!2d32.69586141204782!3d40.20820744568434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDDCsDEyJzI4LjAiTiAzMsKwNDInMTQuMCJF!5e1!3m2!1str!2str!4v1758267931559!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map End -->
                </div>
                <!-- Contact Form Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Contact Us End -->
