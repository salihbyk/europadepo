<?php if (!defined('HTMLY')) die('HTMLy'); ?>

<!-- Page Header Section Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Content Start -->
                <div class="page-header-content">
                    <h1 class="text-anime-style-3" data-cursor="-opaque">404 - Sayfa Bulunamadı</h1>
                    <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">404</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section End -->

<!-- 404 Error Section Start -->
<div class="error-404-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- 404 Error Content Start -->
                <div class="error-404-content text-center">
                    <div class="error-404-image">
                        <figure class="image-anime">
                            <img src="<?php echo theme_path(); ?>images/404-error.svg" alt="404 Error">
                        </figure>
                    </div>
                    <div class="error-404-text">
                        <h2><?php echo i18n('this_page_doesnt_exist'); ?></h2>
                        <p>Aradığınız sayfa bulunamadı. Sayfa taşınmış, silinmiş veya hiç var olmamış olabilir.</p>
                    </div>

                    <!-- Search Form Start -->
                    <div class="error-search-form">
                        <form role="search" method="get">
                            <div class="search-form-group">
                                <input type="text" name="search" placeholder="<?php echo i18n('type_to_search'); ?>" class="search-input" required>
                                <button type="submit" class="search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Search Form End -->

                    <!-- 404 Actions Start -->
                    <div class="error-404-actions">
                        <a href="<?php echo site_url(); ?>" class="btn-default">
                            <i class="fas fa-home"></i> <?php echo i18n('back_to'); ?> <?php echo i18n('homepage'); ?>
                        </a>
                        <?php if (config('blog.enable') === 'true'): ?>
                        <a href="<?php echo site_url() . blog_path(); ?>" class="btn-default btn-outline">
                            <i class="fas fa-blog"></i> Blog'a Git
                        </a>
                        <?php endif; ?>
                    </div>
                    <!-- 404 Actions End -->
                </div>
                <!-- 404 Error Content End -->
            </div>
        </div>
    </div>
</div>
<!-- 404 Error Section End -->
