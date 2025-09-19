<?php if (!defined('HTMLY')) die('HTMLy'); ?>

<!-- Page Header Section Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Content Start -->
                <div class="page-header-content">
                    <h1 class="text-anime-style-3" data-cursor="-opaque"><?php echo i18n('search_results_not_found'); ?></h1>
                    <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Arama Sonuçları</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section End -->

<!-- Search Results Section Start -->
<div class="search-results-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Search Results Content Start -->
                <div class="search-results-content text-center">
                    <div class="search-results-image">
                        <figure class="image-anime">
                            <img src="<?php echo theme_path(); ?>images/search-not-found.svg" alt="Arama Sonucu Bulunamadı">
                        </figure>
                    </div>
                    <div class="search-results-text">
                        <h2>Arama Sonucu Bulunamadı</h2>
                        <p>Aradığınız terimle ilgili sonuç bulunamadı. Lütfen farklı anahtar kelimeler deneyin.</p>
                    </div>

                    <!-- Search Form Start -->
                    <div class="search-form-wrapper">
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

                    <!-- Search Actions Start -->
                    <div class="search-actions">
                        <a href="<?php echo site_url(); ?>" class="btn-default">
                            <i class="fas fa-home"></i> <?php echo i18n('back_to'); ?> <?php echo i18n('homepage'); ?>
                        </a>
                        <?php if (config('blog.enable') === 'true'): ?>
                        <a href="<?php echo site_url() . blog_path(); ?>" class="btn-default btn-outline">
                            <i class="fas fa-blog"></i> Blog'a Git
                        </a>
                        <?php endif; ?>
                    </div>
                    <!-- Search Actions End -->
                </div>
                <!-- Search Results Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Search Results Section End -->
