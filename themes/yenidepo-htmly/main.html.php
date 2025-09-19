<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php
// X-Robots-Tag HTTP Header for Blog List
header('X-Robots-Tag: index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
?>

<!-- Page Header Start -->
<div class="page-header bg-section parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <?php if (isset($is_taxonomy)): ?>
                    <h1 class="text-anime-style-3" data-cursor="-opaque"><?php echo $taxonomy->title; ?></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url() . blog_path(); ?>">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $taxonomy->title; ?></li>
                        </ol>
                    </nav>
                    <?php else: ?>
                    <h1 class="text-anime-style-3" data-cursor="-opaque">Blog Yazılarımız</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                    <?php endif; ?>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Page Blog Start -->
<div class="page-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Post Item List Start -->
                <div class="post-item-list">
                    <?php
                    try {
                        if (!isset($posts)) {
                            $posts = array();
                        }
                    } catch (Exception $e) {
                        $posts = array();
                    }
                    ?>
                    <?php if (!empty($posts)): ?>
                        <?php
                        $delay = 0;
                        foreach ($posts as $p):
                            $img = get_image($p->body);
                            $delay += 0.2;
                        ?>
                        <!-- Post Item Start -->
                        <div class="post-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="<?php echo $p->url; ?>" data-cursor-text="Görüntüle">
                                    <figure class="image-anime">
                                        <?php if (!empty($p->image)): ?>
                                            <img src="<?php echo $p->image; ?>" alt="<?php echo $p->title; ?>">
                                        <?php elseif (!empty($p->video)): ?>
                                            <img src="//img.youtube.com/vi/<?php echo get_video_id($p->video); ?>/sddefault.jpg" alt="<?php echo $p->title; ?>">
                                        <?php elseif (!empty($img)): ?>
                                            <img src="<?php echo $img; ?>" alt="<?php echo $p->title; ?>">
                                        <?php else: ?>
                                            <img src="<?php echo theme_path(); ?>images/post-1.jpg" alt="<?php echo $p->title; ?>">
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
                                    <?php if (!empty($p->link)): ?>
                                    <h2><a href="<?php echo $p->link; ?>" target="_blank"><?php echo $p->title; ?> <i class="fas fa-external-link-alt"></i></a></h2>
                                    <?php else: ?>
                                    <h2><a href="<?php echo $p->url; ?>"><?php echo $p->title; ?></a></h2>
                                    <?php endif; ?>

                                    <?php if (!empty($p->quote)): ?>
                                    <blockquote class="post-quote">
                                        <p><?php echo $p->quote; ?></p>
                                    </blockquote>
                                    <?php endif; ?>
                                </div>
                                <!-- Post Item Content End -->

                                <!-- Post Item Meta Start -->
                                <div class="post-item-meta">
                                    <span class="post-date">
                                        <i class="fa-regular fa-calendar"></i>
                                        <?php echo format_date($p->date); ?>
                                    </span>
                                    <?php if (authorized($p)): ?>
                                    <span class="post-edit">
                                        <i class="fa-solid fa-edit"></i>
                                        <a href="<?php echo $p->url; ?>/edit?destination=post"><?php echo i18n('edit'); ?></a>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <!-- Post Item Meta End -->
                            </div>
                            <!-- Post Item Body End -->
                        </div>
                        <!-- Post Item End -->
                        <?php endforeach; ?>

                    <?php else: ?>
                    <!-- No Posts Message Start -->
                    <div class="no-posts-message text-center py-5">
                        <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                        <h3>Henüz blog yazısı bulunmuyor</h3>
                        <p class="text-muted">Yakında ilginç içeriklerle burada olacağız.</p>
                        <a href="<?php echo site_url(); ?>" class="btn-default mt-3">Anasayfa'ya Dön</a>
                    </div>
                    <!-- No Posts Message End -->
                    <?php endif; ?>
                </div>
                <!-- Post Item List End -->
            </div>

            <?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
            <div class="col-lg-12">
                <!-- Page Pagination Start -->
                <div class="page-pagination wow fadeInUp" data-wow-delay="1s">
                    <ul class="pagination">
                        <?php if (!empty($pagination['prev'])): ?>
                        <li><a href="?page=<?php echo $page - 1 ?>"><i class="fa-solid fa-angle-left"></i></a></li>
                        <?php endif; ?>

                        <li class="active"><a href="#"><?php echo isset($page) ? $page : 1; ?></a></li>

                        <?php if (!empty($pagination['next'])): ?>
                        <li><a href="?page=<?php echo $page + 1 ?>"><i class="fa-solid fa-angle-right"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- Page Pagination End -->
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Page Blog End -->
