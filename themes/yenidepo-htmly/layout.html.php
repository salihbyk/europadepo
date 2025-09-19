<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php
// X-Robots-Tag HTTP Header
header('X-Robots-Tag: index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
?>
<!DOCTYPE html>
<html lang="<?php echo blog_language();?>">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="keywords" content="eşya depolama, ankara depolama, güvenli depolama, self storage, ev eşyası depolama, ticari depolama, arşiv depolama, paletli ürün depolama, medikal ürün depolama, europa depo">
    <meta name="publisher" content="Europa Depo - Güvenli Eşya Depolama Hizmetleri">
    <meta name="author" content="Europa Depo">
    <meta name="copyright" content="© 2025 Europa Depo. Tüm hakları saklıdır.">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">
    <meta name="revisit-after" content="7 days">
    <?php echo head_contents();?>
    <?php echo $metatags;?>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo theme_path();?>images/favicon.png">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <!-- Bootstrap Css -->
    <link href="<?php echo theme_path();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="<?php echo theme_path();?>css/slicknav.min.css" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="<?php echo theme_path();?>css/swiper-bundle.min.css">
    <!-- Font Awesome Icon Css-->
    <link href="<?php echo theme_path();?>css/all.min.css" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="<?php echo theme_path();?>css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="<?php echo theme_path();?>css/magnific-popup.css">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="<?php echo theme_path();?>css/mousecursor.css">
    <!-- Main Custom Css -->
    <link href="<?php echo theme_path();?>css/custom.css" rel="stylesheet" media="screen">

    <!-- Preload Critical Resources -->
    <link rel="preload" href="<?php echo theme_path();?>logo.webp" as="image" type="image/webp" fetchpriority="high">
    <link rel="preload" href="<?php echo theme_path();?>logo.png" as="image" fetchpriority="high">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Europa Depo",
        "alternateName": "Europa Depo - Güvenli Eşya Depolama",
        "url": "<?php echo site_url(); ?>",
        "logo": "<?php echo theme_path(); ?>logo.png",
        "description": "Ankara'da güvenli eşya depolama hizmetleri. Ev eşyası, ticari ürün, arşiv ve self-storage çözümleri.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Ankara",
            "addressLocality": "Ankara",
            "addressRegion": "Ankara",
            "addressCountry": "TR"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+90-444-6995",
            "contactType": "customer service",
            "availableLanguage": "Turkish"
        },
        "sameAs": [
            "https://instagram.com/europatransnakliyat",
            "https://facebook.com/europatransturkey",
            "https://twitter.com/europatranstr"
        ],
        "serviceArea": {
            "@type": "Place",
            "name": "Ankara, Turkey"
        },
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Depolama Hizmetleri",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Ev Eşyası Depolama",
                        "description": "Güvenli ev eşyası depolama hizmetleri"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Ticari Depolama",
                        "description": "İşletmeler için ticari ürün depolama"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Self Storage",
                        "description": "Kendi anahtarınızla erişim sağlayabileceğiniz depolama"
                    }
                }
            ]
        }
    }
    </script>
</head>

<body>

<?php if (facebook()) { echo facebook(); } ?>
<?php if (login()) { toolbar(); } ?>

    <!-- Topbar Section Start -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <!-- Topbar Contact Information Start -->
                    <div class="topbar-contact-info">
                        <ul>
                            <li>Ankara Eşya Depolama</li>
                            <li>Premium Depolama Çözümleri</li>
                        </ul>
                    </div>
                    <!-- Topbar Contact Information End -->
                </div>

                <div class="col-lg-5 col-md-6">
                    <!-- Topbar Social Links Start -->
                    <div class="topbar-social-links">
                        <ul>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#customerLoginModal"
                                    aria-label="Müşteri Paneli Girişi"><i class="fa-solid fa-user"></i>Müşteri
                                    Paneli</a></li>

                        </ul>
                    </div>
                    <!-- Topbar Social Links End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Section End -->

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="<?php echo site_url();?>">
                        <picture>
                            <source srcset="<?php echo theme_path();?>logo.webp" type="image/webp">
                            <img src="<?php echo theme_path();?>logo.png" alt="<?php echo blog_title();?>" fetchpriority="high" loading="eager" width="200" height="60">
                        </picture>
                    </a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>">Anasayfa</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>hakkimizda">Kurumsal</a></li>
                                <li class="nav-item submenu"><a class="nav-link" href="#">Hizmetler</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>ev-esyasi-depolama">Ev Eşyası Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>kisisel-esya-depolama">Kişisel Eşya Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>ticari-depolama">Ticari Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>paletli-urun-depolama">Paletli Ürün Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>arsiv-depolama">Arşiv Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>e-ticaret-urun-depolama">E-ticaret Ürün Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>medikal-urun-depolama">Medikal Ürün Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>sanat-antika-depolama">Sanat ve Antika Depolama</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>self-storage">Self-Storage</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="https://www.europatrans.com.tr/">Nakliyat</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>galeri">Galeri</a></li>
                                <?php if (config('blog.enable') === 'true'): ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url() . blog_path();?>">Blog</a></li>
                                <?php endif; ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url();?>iletisim">İletişim</a></li>
                            </ul>
                        </div>

                        <!-- Header Btn Start -->
                        <div class="header-btn">
                            <a href="tel:4446995" class="btn-default call-center-btn">
                                <i class="fas fa-headset"></i>
                                <span>444 6 995</span>
                            </a>
                        </div>
                        <!-- Header Btn End -->
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle" role="button" aria-label="Menüyü aç/kapat" tabindex="0"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Main Content Start -->
    <main>
        <?php echo content();?>
    </main>
    <!-- Main Content End -->

    <!-- Main Footer Start -->
    <footer class="main-footer bg-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <!-- About Footer Start -->
                    <div class="about-footer">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <picture>
                                <source srcset="<?php echo theme_path();?>logo.webp" type="image/webp">
                                <img src="<?php echo theme_path();?>logo.png" alt="Europa Depo Logo" loading="lazy">
                            </picture>
                        </div>
                        <!-- Footer Logo End -->

                        <!-- About Footer Content Start -->
                        <div class="about-footer-content">
                            <p>Ankara'da güvenilir eşya depolama hizmetleri sunan lider firma. Premium depolama
                                çözümleriyle eşyalarınız güvende.</p>
                        </div>
                        <!-- About Footer Content End -->

                        <!-- Footer Social Link Start -->
                        <div class="footer-social-links">
                            <ul>
                                <li><a href="https://instagram.com/europatransnakliyat" target="_blank" rel="noopener"
                                        aria-label="Instagram'da bizi takip edin"><i
                                            class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="https://facebook.com/europatransturkey" target="_blank" rel="noopener"
                                        aria-label="Facebook'ta bizi takip edin"><i
                                            class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="https://x.com/europatranstr" target="_blank" rel="noopener"
                                        aria-label="Twitter'da bizi takip edin"><i
                                            class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="https://pinterest.com/europatransnak/" target="_blank" rel="noopener"
                                        aria-label="Pinterest'te bizi takip edin"><i
                                            class="fa-brands fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                        <!-- Footer Social Link End -->
                    </div>
                    <!-- About Footer End -->
                </div>

                <div class="col-xl-3">
                    <!-- Hızlı Erişim Start -->
                    <div class="footer-links">
                        <h3>Hızlı Erişim</h3>
                        <ul class="footer-menu">
                            <li><a href="<?php echo site_url();?>">Ankara Eşya Depolama</a></li>
                            <li><a href="<?php echo site_url();?>">Premium Depolama</a></li>
                            <li><a href="<?php echo site_url();?>">Güvenli Depolama</a></li>
                            <li><a href="<?php echo site_url();?>ev-esyasi-depolama">Ev Eşyası Depolama</a></li>
                            <li><a href="<?php echo site_url();?>ticari-depolama">Ticari Depolama</a></li>
                            <li><a href="<?php echo site_url();?>self-storage">Self Storage</a></li>
                        </ul>
                    </div>
                    <!-- Hızlı Erişim End -->
                </div>

                <div class="col-xl-3">
                    <!-- Hizmetlerimiz Start -->
                    <div class="footer-links">
                        <h3>Hizmetlerimiz</h3>
                        <ul class="footer-menu">
                            <li><a href="<?php echo site_url();?>ev-esyasi-depolama">Ev Eşyası Depolama</a></li>
                            <li><a href="<?php echo site_url();?>kisisel-esya-depolama">Kişisel Eşya Depolama</a></li>
                            <li><a href="<?php echo site_url();?>ticari-depolama">Ticari Depolama</a></li>
                            <li><a href="<?php echo site_url();?>arsiv-depolama">Arşiv Depolama</a></li>
                            <li><a href="<?php echo site_url();?>e-ticaret-urun-depolama">E-ticaret Depolama</a></li>
                            <li><a href="<?php echo site_url();?>medikal-urun-depolama">Medikal Depolama</a></li>
                        </ul>
                    </div>
                    <!-- Hizmetlerimiz End -->
                </div>

                <div class="col-xl-3">
                    <!-- İletişim Bilgileri Start -->
                    <div class="footer-links">
                        <h3>İletişim Bilgileri</h3>

                        <!-- Telefon -->
                        <div class="footer-contact-item">
                            <div class="contact-info">
                                <i class="fas fa-phone"></i>
                                <div class="contact-details">
                                    <h4><a href="tel:4446995">444 6 995</a></h4>
                                    <p>7/24 Müşteri Hizmetleri</p>
                                </div>
                            </div>
                        </div>

                        <!-- Adres -->
                        <div class="footer-contact-item">
                            <div class="contact-info">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="contact-details">
                                    <h4>Adresimiz</h4>
                                    <p>Kayı mahallesi 3241 cadde<br>06980 Kahramankazan/Ankara</p>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="footer-contact-item">
                            <div class="contact-info">
                                <i class="fas fa-envelope"></i>
                                <div class="contact-details">
                                    <h4><a href="mailto:info@europadepo.com">info@europadepo.com</a></h4>
                                    <p>Bilgi ve Destek</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- İletişim Bilgileri End -->
                </div>

                <div class="col-lg-12">
                    <!-- Footer Copyright Start -->
                    <div class="footer-copyright">
                        <!-- Footer Top Button Start -->
                        <div class="footer-top-button">
                            <a href="#top" aria-label="Sayfanın başına git">
                                <img src="<?php echo theme_path();?>images/arrow-primary.svg" alt="Yukarı">
                            </a>
                        </div>
                        <!-- Footer Top Button End -->

                        <!-- Footer Copyright Text Start -->
                        <div class="footer-copyright-text">
                            <p>Copyright © 2025 All Rights Reserved.</p>
                        </div>
                        <!-- Footer Copyright Text End -->

                        <!-- Footer Menu Start -->
                        <div class="footer-menu">
                            <ul>
                                <li><a href="<?php echo site_url();?>">Ankara Eşya Depolama</a></li>
                                <li><a href="<?php echo site_url();?>hakkimizda">Kurumsal</a></li>
                                <li><a href="<?php echo site_url();?>#">Hizmetler</a></li>
                                <li><a href="https://www.europatrans.com.tr/">Nakliyat</a></li>
                                <?php if (config('blog.enable') === 'true'): ?>
                                <li><a href="<?php echo site_url() . blog_path();?>">Blog</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo site_url();?>iletisim">İletişim</a></li>
                            </ul>
                        </div>
                        <!-- Footer Menu End -->
                    </div>
                    <!-- Footer Copyright End -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Main Footer End -->

    <!-- Mobile Footer Bar Start (Only Mobile) -->
    <div class="mobile-footer-bar d-block d-lg-none">
        <div class="mobile-footer-container">
            <a href="https://wa.me/905324801392?text=Merhaba, Europa Depo hizmetleriniz hakkında bilgi almak istiyorum." class="mobile-footer-item whatsapp-item" target="_blank">
                <div class="mobile-footer-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <span class="mobile-footer-text">WhatsApp</span>
            </a>

            <a href="tel:4446995" class="mobile-footer-item call-item">
                <div class="mobile-footer-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <span class="mobile-footer-text">Ara</span>
            </a>

            <a href="<?php echo site_url(); ?>iletisim" class="mobile-footer-item quote-item">
                <div class="mobile-footer-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <span class="mobile-footer-text">Teklif Al</span>
            </a>
        </div>
    </div>
    <!-- Mobile Footer Bar End -->

    <!-- Customer Login Modal Start -->
    <div class="modal fade" id="customerLoginModal" tabindex="-1" aria-labelledby="customerLoginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerLoginModalLabel">
                        <i class="fas fa-user-circle me-2"></i>
                        Müşteri Paneli Girişi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                </div>
                <div class="modal-body">
                    <div class="customer-login-form">
                        <div class="login-header">
                            <div class="login-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h6>Güvenli Giriş</h6>
                            <p>Sözleşme numaranızı girerek depolama hesabınıza erişin</p>
                        </div>

                        <form id="customerLoginForm">
                            <div class="form-group mb-4">
                                <label for="contractNumber" class="form-label">
                                    <i class="fas fa-file-contract me-2"></i>
                                    Sözleşme Numarası
                                </label>
                                <input type="text" class="form-control" id="contractNumber"
                                    placeholder="Sözleşme numaranızı giriniz" required>
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Sözleşme numaranızı sözleşme belgenizde bulabilirsiniz
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 login-btn">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Giriş Yap
                            </button>
                        </form>

                        <!-- Loading Section -->
                        <div class="login-loading" id="loginLoading">
                            <div class="loading-text">Müşteri Paneline Giriş Yapıyor...</div>
                            <div class="loading-bar-container">
                                <div class="loading-bar" id="loadingBar"></div>
                            </div>
                            <div class="loading-steps">
                                <div class="loading-step" id="step1">
                                    <i class="fas fa-check-circle"></i>
                                    Doğrulama
                                </div>
                                <div class="loading-step" id="step2">
                                    <i class="fas fa-key"></i>
                                    Yetkilendirme
                                </div>
                                <div class="loading-step" id="step3">
                                    <i class="fas fa-door-open"></i>
                                    Yönlendirme
                                </div>
                            </div>
                        </div>

                        <div class="login-footer">
                            <div class="help-links">
                                <p class="mb-2">
                                    <i class="fas fa-question-circle me-1"></i>
                                    Yardıma mı ihtiyacınız var?
                                </p>
                                <a href="tel:4446995" class="help-link">
                                    <i class="fas fa-phone me-1"></i>
                                    444 6 995
                                </a>
                                <span class="mx-2">|</span>
                                <a href="mailto:info@europadepo.com" class="help-link">
                                    <i class="fas fa-envelope me-1"></i>
                                    Destek
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Customer Login Modal End -->

    <!-- Jquery Library File -->
    <script src="<?php echo theme_path();?>js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="<?php echo theme_path();?>js/bootstrap.min.js"></script>
    <!-- Validator js file -->
    <script src="<?php echo theme_path();?>js/validator.min.js"></script>
    <!-- SlickNav js file -->
    <script src="<?php echo theme_path();?>js/jquery.slicknav.js"></script>
    <!-- Swiper js file -->
    <script src="<?php echo theme_path();?>js/swiper-bundle.min.js"></script>
    <!-- Counter js file -->
    <script src="<?php echo theme_path();?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo theme_path();?>js/jquery.counterup.min.js"></script>
    <!-- Magnific js file -->
    <script src="<?php echo theme_path();?>js/jquery.magnific-popup.min.js"></script>
    <!-- SmoothScroll -->
    <script src="<?php echo theme_path();?>js/SmoothScroll.js"></script>
    <!-- Parallax js -->
    <script src="<?php echo theme_path();?>js/parallaxie.js"></script>
    <!-- MagicCursor js file -->
    <script src="<?php echo theme_path();?>js/gsap.min.js"></script>
    <script src="<?php echo theme_path();?>js/magiccursor.js"></script>
    <!-- Text Effect js file -->
    <script src="<?php echo theme_path();?>js/SplitText.min.js"></script>
    <script src="<?php echo theme_path();?>js/ScrollTrigger.min.js"></script>
    <!-- YTPlayer js File -->
    <script src="<?php echo theme_path();?>js/jquery.mb.YTPlayer.min.js"></script>
    <!-- Image Effect js File -->
    <script src="<?php echo theme_path();?>js/three.min.js"></script>
    <script src="<?php echo theme_path();?>js/hover.js"></script>
    <!-- Wow js file -->
    <script src="<?php echo theme_path();?>js/wow.min.js"></script>
    <!-- Main Custom js file -->
    <script src="<?php echo theme_path();?>js/function.js"></script>

    <!-- Pricing Switch Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const planToggle = document.getElementById('planToggle');
            const monthlyPlan = document.getElementById('monthly');
            const annuallyPlan = document.getElementById('annually');

            if (planToggle && monthlyPlan && annuallyPlan) {
                planToggle.addEventListener('change', function() {
                    if (this.checked) {
                        monthlyPlan.classList.add('d-none');
                        annuallyPlan.classList.remove('d-none');
                    } else {
                        monthlyPlan.classList.remove('d-none');
                        annuallyPlan.classList.add('d-none');
                    }
                });
            }
        });
    </script>

    <!-- Customer Login Modal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const customerLoginForm = document.getElementById('customerLoginForm');
            const loginLoading = document.getElementById('loginLoading');
            const loadingBar = document.getElementById('loadingBar');
            const loginBtn = customerLoginForm?.querySelector('.login-btn');

            // Loading animation function
            function showLoadingAnimation(contractNumber) {
                // Hide form and show loading
                customerLoginForm.style.display = 'none';
                loginLoading.classList.add('active');

                const steps = ['step1', 'step2', 'step3'];
                let currentStep = 0;
                let progress = 0;

                const progressInterval = setInterval(() => {
                    progress += Math.random() * 15 + 5; // Random progress increment
                    if (progress > 100) progress = 100;

                    loadingBar.style.width = progress + '%';

                    // Update steps
                    if (progress > 30 && currentStep === 0) {
                        document.getElementById(steps[0]).classList.add('active');
                        setTimeout(() => {
                            document.getElementById(steps[0]).classList.remove('active');
                            document.getElementById(steps[0]).classList.add('completed');
                        }, 500);
                        currentStep++;
                    } else if (progress > 60 && currentStep === 1) {
                        document.getElementById(steps[1]).classList.add('active');
                        setTimeout(() => {
                            document.getElementById(steps[1]).classList.remove('active');
                            document.getElementById(steps[1]).classList.add('completed');
                        }, 500);
                        currentStep++;
                    } else if (progress > 90 && currentStep === 2) {
                        document.getElementById(steps[2]).classList.add('active');
                        setTimeout(() => {
                            document.getElementById(steps[2]).classList.remove('active');
                            document.getElementById(steps[2]).classList.add('completed');
                        }, 500);
                        currentStep++;
                    }

                    if (progress >= 100) {
                        clearInterval(progressInterval);

                        // Complete loading and redirect
                        setTimeout(() => {
                            const loginUrl = `https://www.europagroup.com.tr/depo/musteri/${encodeURIComponent(contractNumber)}`;
                            window.open(loginUrl, '_blank');

                            // Reset modal
                            resetModal();
                        }, 800);
                    }
                }, 100);
            }

            // Reset modal function
            function resetModal() {
                const modal = bootstrap.Modal.getInstance(document.getElementById('customerLoginModal'));
                if (modal) {
                    modal.hide();
                }

                // Reset form and loading states
                setTimeout(() => {
                    customerLoginForm.style.display = 'block';
                    loginLoading.classList.remove('active');
                    loadingBar.style.width = '0%';

                    // Reset steps
                    ['step1', 'step2', 'step3'].forEach(stepId => {
                        const step = document.getElementById(stepId);
                        step.classList.remove('active', 'completed');
                    });

                    // Reset form
                    customerLoginForm.reset();
                    loginBtn.disabled = false;
                }, 500);
            }

            if (customerLoginForm) {
                customerLoginForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const contractNumber = document.getElementById('contractNumber').value.trim();

                    if (contractNumber) {
                        // Disable button and show loading
                        loginBtn.disabled = true;
                        showLoadingAnimation(contractNumber);
                    } else {
                        // Show error
                        const contractInput = document.getElementById('contractNumber');
                        contractInput.classList.add('is-invalid');

                        setTimeout(() => {
                            contractInput.classList.remove('is-invalid');
                        }, 3000);
                    }
                });
            }

            // Input focus olduğunda hata stilini kaldır
            const contractInput = document.getElementById('contractNumber');
            if (contractInput) {
                contractInput.addEventListener('focus', function () {
                    this.classList.remove('is-invalid');
                });
            }
        });
    </script>

    <?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</body>

</html>
