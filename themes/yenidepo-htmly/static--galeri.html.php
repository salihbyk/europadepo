<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php
// X-Robots-Tag HTTP Header for Gallery Page
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

<!-- Photo Gallery Start -->
<div class="page-gallery">
    <div class="container">
        <!-- Gallery Section Start -->
        <div class="row gallery-items page-gallery-box">

            <?php
            // Depo klasöründeki tüm görselleri otomatik olarak yükle
            $theme_dir = dirname(__FILE__);
            $depo_directory = $theme_dir . '/images/depo/';
            $all_images = [];

            // Depo klasörünü tara
            if (is_dir($depo_directory)) {
                $files = scandir($depo_directory);
                foreach ($files as $file) {
                    // Sadece resim dosyalarını al (.htaccess, .DS_Store vb. dosyaları hariç tut)
                    if ($file !== '.' && $file !== '..' &&
                        in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        $all_images[] = [
                            'src' => theme_path() . 'images/depo/' . $file,
                            'alt' => 'Europa Depo - ' . pathinfo($file, PATHINFO_FILENAME),
                            'filename' => $file
                        ];
                    }
                }
            }

            // Görselleri dosya adına göre sırala
            if (!empty($all_images)) {
                usort($all_images, function($a, $b) {
                    return strcmp($a['filename'], $b['filename']);
                });
            }

            // Görselleri göster
            if (!empty($all_images)):
                $delay = 0;
                foreach ($all_images as $index => $image):
                    $delay += 0.2;
                    // Delay'i makul bir seviyede tut (maksimum 3 saniye)
                    if ($delay > 3.0) $delay = 0.2;
            ?>

            <div class="col-lg-3 col-md-4 col-6">
                <!-- Image Gallery start -->
                <div class="photo-gallery wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                    <a href="<?php echo $image['src']; ?>" data-cursor-text="Görüntüle">
                        <figure class="image-anime">
                            <img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>" loading="lazy">
                        </figure>
                    </a>
                </div>
                <!-- Image Gallery end -->
            </div>

            <?php
                endforeach;
            else:
            ?>

            <div class="col-12">
                <div class="no-gallery-images text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <h4>Henüz galeri görseli bulunmuyor</h4>
                    <p class="text-muted">Depo klasörüne resim ekleyerek galeriyi oluşturabilirsiniz.</p>
                </div>
            </div>

            <?php endif; ?>

        </div>
        <!-- Gallery Section End -->
    </div>
</div>
<!-- Photo Gallery End -->



<!-- Magnific Popup için JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Magnific Popup için jQuery kontrolü
    if (typeof jQuery !== 'undefined' && jQuery.fn.magnificPopup) {
        jQuery('.photo-gallery a').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]
            },
            image: {
                titleSrc: function(item) {
                    return item.el.find('img').attr('alt');
                }
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    }
});
</script>
