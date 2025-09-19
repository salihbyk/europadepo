<?php if (!defined('HTMLY')) die('HTMLy'); ?>

<!-- Page Header Section Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Content Start -->
                <div class="page-header-content">
                    <h1 class="text-anime-style-3" data-cursor="-opaque">Yazı Bulunamadı</h1>
                    <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <?php if (config('blog.enable') === 'true'): ?>
                            <li class="breadcrumb-item"><a href="<?php echo site_url() . blog_path(); ?>">Blog</a></li>
                            <?php endif; ?>
                            <li class="breadcrumb-item active" aria-current="page">Yazı Bulunamadı</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section End -->

<!-- No Posts Section Start -->
<div class="no-posts-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- No Posts Content Start -->
                <div class="no-posts-content text-center">
                    <div class="no-posts-image">
                        <figure class="image-anime">
                            <img src="<?php echo theme_path(); ?>images/no-posts.svg" alt="Yazı Bulunamadı">
                        </figure>
                    </div>
                    <div class="no-posts-text">
                        <h2>Henüz Yazı Paylaşılmamış</h2>
                        <p>Bu bölümde henüz bir yazı paylaşılmamış. Yakında yeni içerikler için takipte kalın.</p>
                    </div>

                    <!-- No Posts Actions Start -->
                    <div class="no-posts-actions">
                        <a href="<?php echo site_url(); ?>" class="btn-default">
                            <i class="fas fa-home"></i> Anasayfa'ya Dön
                        </a>
                        <?php if (config('blog.enable') === 'true'): ?>
                        <a href="<?php echo site_url() . blog_path(); ?>" class="btn-default btn-outline">
                            <i class="fas fa-blog"></i> Blog'a Git
                        </a>
                        <?php endif; ?>
                    </div>
                    <!-- No Posts Actions End -->
                </div>
                <!-- No Posts Content End -->
            </div>
        </div>
    </div>
</div>
<!-- No Posts Section End -->
