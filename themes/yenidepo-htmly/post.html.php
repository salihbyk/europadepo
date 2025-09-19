<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php
// X-Robots-Tag HTTP Header for Blog Posts
header('X-Robots-Tag: index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
?>

<!-- Page Header Start -->
<div class="page-header bg-section parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-3" data-cursor="-opaque"><?php echo $p->title; ?></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <?php if (config('blog.enable') === 'true'): ?>
                            <li class="breadcrumb-item"><a href="<?php echo site_url() . blog_path(); ?>">Blog</a></li>
                            <?php endif; ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $p->title; ?></li>
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


                    <!-- Service Entry Start -->
                    <div class="service-entry">
                        <?php if (!empty($p->video)): ?>
                        <div class="blog-single-video">
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <?php elseif (!empty($p->audio)): ?>
                        <div class="blog-single-audio">
                            <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio; ?>&amp;auto_play=false&amp;visual=true"></iframe>
                        </div>
                        <?php elseif (!empty($p->quote)): ?>
                        <div class="blog-single-quote">
                            <blockquote>
                                <p><?php echo $p->quote; ?></p>
                            </blockquote>
                        </div>
                        <?php endif; ?>

                        <?php if (authorized($p)): ?>
                        <div class="blog-single-meta">
                            <div class="blog-single-meta-item">
                                <i class="fa-solid fa-edit"></i>
                                <span><a href="<?php echo $p->url; ?>/edit?destination=post"><?php echo i18n('edit'); ?></a></span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="blog-single-content-body">
                            <?php echo $p->body; ?>
                        </div>

                    </div>
                    <!-- Blog Single Item End -->


                    <!-- Service Solution Box Start -->
                    <div class="service-solution-box">
                        <h2 class="text-anime-style-3">İlgili Blog Yazıları</h2>
                        <p class="wow fadeInUp">Bu konuyla ilgili diğer faydalı yazılarımızı da okuyarak depolama hizmetlerimiz hakkında daha fazla bilgi edinebilirsiniz.</p>

                        <!-- Service Solution Item List Start -->
                        <div class="service-solution-item-list">
                            <?php
                            // Son 3 blog yazısını çek (mevcut yazı hariç)
                            $recent_posts = get_posts(null, 1, 4); // 4 yazı çek, 1'ini hariç tutacağız
                            $delay = 0.2;
                            $count = 0;

                            foreach($recent_posts as $related_post):
                                if($related_post->url != $p->url && $count < 3): // Mevcut yazı değilse ve 3'ten azsa
                                    $count++;
                            ?>
                            <!-- Service Solution Item Start -->
                            <div class="service-solution-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                <a href="<?php echo $related_post->url; ?>" style="text-decoration: none; color: inherit;">
                                    <div class="service-solution-image">
                                        <figure class="image-anime">
                                            <?php if (!empty($related_post->image)): ?>
                                                <img src="<?php echo $related_post->image; ?>" alt="<?php echo $related_post->title; ?>">
                                            <?php else: ?>
                                                <?php
                                                // İçerikten ilk resmi bul
                                                $first_image = get_thumbnail($related_post->body, true);
                                                if (!empty($first_image)): ?>
                                                    <img src="<?php echo $first_image; ?>" alt="<?php echo $related_post->title; ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo theme_path(); ?>images/depo/<?php echo ($count % 7) + 1; ?>.jpeg" alt="<?php echo $related_post->title; ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </figure>
                                    </div>
                                    <div class="service-solution-content">
                                        <h3><?php echo $related_post->title; ?></h3>
                                        <p><?php echo mb_substr(strip_tags($related_post->body), 0, 80) . '...'; ?></p>
                                    </div>
                                </a>
                            </div>
                            <!-- Service Solution Item End -->
                            <?php
                                $delay += 0.2;
                                endif;
                            endforeach;

                            // Eğer yeterli yazı yoksa, statik içerik ekle
                            while($count < 3):
                                $count++;
                                $static_titles = [
                                    'Ev Eşyası Depolama Hizmetleri',
                                    'Ticari Depolama Çözümleri',
                                    'Self-Storage Avantajları'
                                ];
                                $static_descriptions = [
                                    'Ev eşyalarınızı güvenli ve temiz ortamda saklayın.',
                                    'İşletmenizin ürünleri için profesyonel çözümler.',
                                    'Kendi eşyalarınıza istediğiniz zaman erişin.'
                                ];
                                $static_links = [
                                    site_url() . 'ev-esyasi-depolama',
                                    site_url() . 'ticari-depolama',
                                    site_url() . 'self-storage'
                                ];
                            ?>
                            <!-- Service Solution Item Start -->
                            <div class="service-solution-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                <a href="<?php echo $static_links[$count-1]; ?>" style="text-decoration: none; color: inherit;">
                                    <div class="service-solution-image">
                                        <figure class="image-anime">
                                            <img src="<?php echo theme_path(); ?>images/depo/<?php echo $count + 1; ?>.jpeg" alt="<?php echo $static_titles[$count-1]; ?>">
                                        </figure>
                                    </div>
                                    <div class="service-solution-content">
                                        <h3><?php echo $static_titles[$count-1]; ?></h3>
                                        <p><?php echo $static_descriptions[$count-1]; ?></p>
                                    </div>
                                </a>
                            </div>
                            <!-- Service Solution Item End -->
                            <?php
                                $delay += 0.2;
                            endwhile;
                            ?>
                        </div>
                        <!-- Service Solution Item List End -->
                    </div>
                    <!-- Service Solution Box End -->

                    <!-- Comments Section Start -->
                    <?php if (facebook() || disqus()): ?>
                    <div class="comments-section">
                        <h3>Yorumlar</h3>
                        <?php if (facebook()): ?>
                        <div class="fb-comments" data-href="<?php echo $p->url ?>" data-numposts="<?php echo config('fb.num') ?>" data-colorscheme="<?php echo config('fb.color') ?>"></div>
                        <?php endif; ?>
                        <?php if (disqus()): ?>
                        <?php echo disqus($p->title, $p->url) ?>
                        <div id="disqus_thread"></div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <!-- Comments Section End -->
                    </div>
                    <!-- Service Entry End -->
                </div>
                <!-- Service Single Content End -->


            <div class="col-lg-4">
                <!-- Page Single Sidebar Start -->
                <div class="page-single-sidebar">
                    <!-- WhatsApp Contact Widget Start -->
                    <div class="sidebar-widget whatsapp-widget wow fadeInUp" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%); padding: 25px; border-radius: 15px; margin-bottom: 30px; text-align: center;">
                        <div style="color: white;">
                            <div style="margin-bottom: 15px;">
                                <i class="fab fa-whatsapp" style="font-size: 48px; color: white;"></i>
                            </div>
                            <h3 style="color: white; margin-bottom: 10px; font-size: 20px;">WhatsApp İletişim</h3>
                            <p style="color: rgba(255,255,255,0.9); margin-bottom: 20px; font-size: 14px;">Hızlı destek için WhatsApp'tan bize ulaşın</p>
                            <a href="https://wa.me/905324801392?text=Merhaba, Europa Depo hizmetleriniz hakkında bilgi almak istiyorum." target="_blank" class="btn" style="background: white; color: #25d366; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-block; transition: all 0.3s ease;">
                                <i class="fab fa-whatsapp" style="margin-right: 8px;"></i>Mesaj Gönder
                            </a>
                        </div>
                    </div>
                    <!-- WhatsApp Contact Widget End -->



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


                       <!-- Phone Contact Widget Start -->
                       <div class="sidebar-widget phone-widget wow fadeInUp" data-wow-delay="0.1s" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); padding: 25px; border-radius: 15px; margin-bottom: 30px; text-align: center;">
                        <div style="color: white;">
                            <div style="margin-bottom: 15px;">
                                <i class="fas fa-phone" style="font-size: 48px; color: white;"></i>
                            </div>
                            <h3 style="color: white; margin-bottom: 10px; font-size: 20px;">Telefon İletişim</h3>
                            <p style="color: rgba(255,255,255,0.9); margin-bottom: 20px; font-size: 14px;">7/24 müşteri hizmetleri için arayın</p>
                            <a href="tel:4446995" class="btn" style="background: white; color: #3498db; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-block; transition: all 0.3s ease;">
                                <i class="fas fa-phone" style="margin-right: 8px;"></i>444 6 995
                            </a>
                        </div>
                    </div>
                    <!-- Phone Contact Widget End -->
                    <!-- Back to Blog Button Start -->
                    <div class="sidebar-widget back-to-blog-widget">
                        <?php if (config('blog.enable') === 'true'): ?>
                        <a href="<?php echo site_url() . blog_path(); ?>" class="btn-default" style="width: 100%; text-align: center;">
                            <i class="fas fa-arrow-left"></i> Blog'a Geri Dön
                        </a>
                        <?php else: ?>
                        <a href="<?php echo site_url(); ?>" class="btn-default" style="width: 100%; text-align: center;">
                            <i class="fas fa-arrow-left"></i> Anasayfa'ya Geri Dön
                        </a>
                        <?php endif; ?>
                    </div>
                    <!-- Back to Blog Button End -->
                </div>
                <!-- Page Single Sidebar End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Service Single End -->

