<?php if (!defined('HTMLY')) die('HTMLy'); ?>

<!-- Page Header Section Start -->
<div class="page-header bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Content Start -->
                <div class="page-header-content">
                    <h1 class="text-anime-style-3" data-cursor="-opaque"><?php echo $author->title; ?></h1>
                    <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
                            <?php if (config('blog.enable') === 'true'): ?>
                            <li class="breadcrumb-item"><a href="<?php echo site_url() . blog_path(); ?>">Blog</a></li>
                            <?php endif; ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $author->title; ?></li>
                        </ol>
                    </nav>
                    <?php if (!empty($author->body)): ?>
                    <div class="page-description">
                        <p><?php echo $author->body; ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- Page Header Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section End -->

<!-- Author Profile Section Start -->
<div class="author-profile-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Author Posts Start -->
                <div class="author-posts">
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
                    <div class="author-posts-header">
                        <h3><?php echo $author->title; ?> Tarafından Yazılan Yazılar</h3>
                    </div>

                    <div class="row">
                        <?php foreach ($posts as $p): ?>
                        <?php $img = get_image($p->body); ?>
                        <div class="col-lg-6 col-md-6">
                            <!-- Blog Item Start -->
                            <div class="blog-item wow fadeInUp">
                                <?php if (!empty($p->image)): ?>
                                <div class="blog-item-image">
                                    <figure class="image-anime">
                                        <a href="<?php echo $p->url; ?>">
                                            <img src="<?php echo $p->image; ?>" alt="<?php echo $p->title; ?>">
                                        </a>
                                    </figure>
                                </div>
                                <?php elseif (!empty($p->video)): ?>
                                <div class="blog-item-image">
                                    <figure class="image-anime">
                                        <a href="<?php echo $p->url; ?>">
                                            <img src="//img.youtube.com/vi/<?php echo get_video_id($p->video); ?>/sddefault.jpg" alt="<?php echo $p->title; ?>">
                                            <div class="video-play-btn">
                                                <i class="fas fa-play"></i>
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                <?php elseif (!empty($p->audio)): ?>
                                <div class="blog-item-image">
                                    <figure class="image-anime">
                                        <a href="<?php echo $p->url; ?>">
                                            <img src="<?php echo theme_path(); ?>images/audio-placeholder.jpg" alt="<?php echo $p->title; ?>">
                                            <div class="audio-play-btn">
                                                <i class="fas fa-volume-up"></i>
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                <?php elseif (!empty($img)): ?>
                                <div class="blog-item-image">
                                    <figure class="image-anime">
                                        <a href="<?php echo $p->url; ?>">
                                            <img src="<?php echo $img; ?>" alt="<?php echo $p->title; ?>">
                                        </a>
                                    </figure>
                                </div>
                                <?php endif; ?>

                                <div class="blog-item-content">
                                    <div class="blog-item-meta">
                                        <span><i class="fa-regular fa-calendar"></i><?php echo format_date($p->date); ?></span>
                                        <span><i class="fa-solid fa-folder"></i><?php echo $p->category; ?></span>
                                        <?php if (authorized($p)): ?>
                                        <span><i class="fa-solid fa-edit"></i><a href="<?php echo $p->url; ?>/edit?destination=post"><?php echo i18n('edit'); ?></a></span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($p->link)): ?>
                                    <h3><a href="<?php echo $p->link; ?>" target="_blank"><?php echo $p->title; ?> <i class="fas fa-external-link-alt"></i></a></h3>
                                    <?php else: ?>
                                    <h3><a href="<?php echo $p->url; ?>"><?php echo $p->title; ?></a></h3>
                                    <?php endif; ?>

                                    <?php if (!empty($p->quote)): ?>
                                    <blockquote>
                                        <p><?php echo $p->quote; ?></p>
                                    </blockquote>
                                    <?php endif; ?>

                                    <p><?php echo get_teaser($p->body, $p->url); ?></p>

                                    <?php if (!empty($p->tag)): ?>
                                    <div class="blog-item-tags">
                                        <?php echo $p->tag; ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="blog-btn">
                                        <a href="<?php echo $p->url; ?>" class="btn-default">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Blog Item End -->
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination Start -->
                    <?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
                    <div class="pagination-wrapper">
                        <nav class="pagination-nav">
                            <?php if (!empty($pagination['prev'])): ?>
                            <a href="?page=<?php echo $page - 1 ?>" class="pagination-btn pagination-prev">
                                <i class="fas fa-arrow-left"></i> <?php echo i18n('prev'); ?>
                            </a>
                            <?php endif; ?>

                            <span class="pagination-info"><?php echo $pagination['pagenum']; ?></span>

                            <?php if (!empty($pagination['next'])): ?>
                            <a href="?page=<?php echo $page + 1 ?>" class="pagination-btn pagination-next">
                                <?php echo i18n('next'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                            <?php endif; ?>
                        </nav>
                    </div>
                    <?php endif; ?>
                    <!-- Pagination End -->

                    <?php else: ?>
                    <!-- No Posts Message Start -->
                    <div class="no-posts-message">
                        <div class="no-posts-content">
                            <i class="fas fa-file-alt"></i>
                            <h3>Henüz yazı bulunamadı</h3>
                            <p>Bu yazar henüz bir yazı paylaşmamış.</p>
                            <?php if (config('blog.enable') === 'true'): ?>
                            <a href="<?php echo site_url() . blog_path(); ?>" class="btn-default">Blog'a Dön</a>
                            <?php else: ?>
                            <a href="<?php echo site_url(); ?>" class="btn-default">Anasayfa'ya Dön</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- No Posts Message End -->
                    <?php endif; ?>
                </div>
                <!-- Author Posts End -->
            </div>

            <div class="col-lg-4">
                <!-- Author Sidebar Start -->
                <div class="author-sidebar">
                    <!-- Author Info Widget Start -->
                    <div class="sidebar-widget author-info-widget">
                        <h3>Yazar Hakkında</h3>
                        <div class="author-info-content">
                            <div class="author-avatar">
                                <img src="<?php echo $author->avatar; ?>" alt="<?php echo $author->title; ?>">
                            </div>
                            <div class="author-details">
                                <h4><?php echo $author->title; ?></h4>
                                <?php if (!empty($author->body)): ?>
                                <p><?php echo $author->body; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Author Info Widget End -->

                    <!-- RSS Feed Widget Start -->
                    <div class="sidebar-widget rss-widget">
                        <h3>RSS Feed</h3>
                        <div class="rss-content">
                            <a href="<?php echo $author->rss; ?>" class="rss-link">
                                <i class="fas fa-rss"></i> <?php echo $author->title; ?> RSS
                            </a>
                        </div>
                    </div>
                    <!-- RSS Feed Widget End -->

                    <!-- Back to Blog Widget Start -->
                    <div class="sidebar-widget back-to-blog-widget">
                        <?php if (config('blog.enable') === 'true'): ?>
                        <a href="<?php echo site_url() . blog_path(); ?>" class="btn-default">
                            <i class="fas fa-arrow-left"></i> Blog'a Geri Dön
                        </a>
                        <?php else: ?>
                        <a href="<?php echo site_url(); ?>" class="btn-default">
                            <i class="fas fa-arrow-left"></i> Anasayfa'ya Geri Dön
                        </a>
                        <?php endif; ?>
                    </div>
                    <!-- Back to Blog Widget End -->
                </div>
                <!-- Author Sidebar End -->
            </div>
        </div>
    </div>
</div>
<!-- Author Profile Section End -->
