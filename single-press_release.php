<?php get_header(); ?>

<main class="press-release-single">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <!-- パンくずナビゲーション -->
        <section class="press-release-breadcrumb">
            <div class="l-container inner">
                <nav class="breadcrumb-nav">
                    <a href="<?php echo home_url(); ?>">HOME</a>
                    <span class="breadcrumb-separator">></span>
                    <a href="<?php echo get_post_type_archive_link('press_release'); ?>">プレスリリース</a>
                    <span class="breadcrumb-separator">></span>
                    <span class="breadcrumb-current"><?php the_title(); ?></span>
                </nav>
            </div>
        </section>

        <!-- ヒーローセクション -->
        <section class="press-release-hero">
            <div class="l-container inner">
                <div class="press-release-hero__content">
                    <div class="press-release-meta">
                        <time class="press-release-date" datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date('Y.m.d'); ?>
                        </time>
                        <?php 
                        $categories = get_the_terms(get_the_ID(), 'press-release-category');
                        if ($categories && !is_wp_error($categories)) :
                            foreach ($categories as $category) :
                        ?>
                            <span class="press-release-category"><?php echo esc_html($category->name); ?></span>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <h1 class="press-release-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </section>

        <!-- アイキャッチ画像 -->
        <?php if (has_post_thumbnail()) : ?>
        <section class="press-release-featured-image">
            <div class="l-container inner">
                <div class="press-release-image">
                    <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- メインコンテンツ -->
        <section class="press-release-content">
            <div class="l-container inner">
                <article class="press-release-article">
                    <div class="press-release-body">
                        <?php the_content(); ?>
                    </div>
                    
                    <!-- 記事情報 -->
                    <div class="press-release-info">
                        <div class="press-release-info__item">
                            <span class="press-release-info__label">公開日:</span>
                            <time class="press-release-info__value" datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date('Y年m月d日'); ?>
                            </time>
                        </div>
                        <?php if (get_the_modified_date() !== get_the_date()) : ?>
                        <div class="press-release-info__item">
                            <span class="press-release-info__label">更新日:</span>
                            <time class="press-release-info__value" datetime="<?php echo get_the_modified_date('c'); ?>">
                                <?php echo get_the_modified_date('Y年m月d日'); ?>
                            </time>
                        </div>
                        <?php endif; ?>
                    </div>
                </article>
            </div>
        </section>

        <!-- 関連記事 -->
        <section class="press-release-related">
            <div class="l-container inner">
                <h2 class="press-release-related__title">関連するプレスリリース</h2>
                <div class="press-release-related__items">
                    <?php
                    $current_post_id = get_the_ID();
                    $related_posts = new WP_Query(array(
                        'post_type' => 'press_release',
                        'posts_per_page' => 3,
                        'post__not_in' => array($current_post_id),
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                    
                    if ($related_posts->have_posts()) :
                        while ($related_posts->have_posts()) : $related_posts->the_post();
                    ?>
                        <article class="press-release-related__item">
                            <a href="<?php the_permalink(); ?>" class="press-release-related__link">
                                <div class="press-release-related__image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="press-release-related__content">
                                    <div class="press-release-related__meta">
                                        <time class="press-release-related__date" datetime="<?php echo get_the_date('c'); ?>">
                                            <?php echo get_the_date('Y.m.d'); ?>
                                        </time>
                                        <?php 
                                        $categories = get_the_terms(get_the_ID(), 'press-release-category');
                                        if ($categories && !is_wp_error($categories)) :
                                            foreach ($categories as $category) :
                                        ?>
                                            <span class="press-release-related__category"><?php echo esc_html($category->name); ?></span>
                                        <?php 
                                            break; // 最初のカテゴリのみ表示
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                    <h3 class="press-release-related__title"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </article>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                
                <!-- 一覧へ戻るボタン -->
                <div class="press-release-back">
                    <a href="<?php echo get_post_type_archive_link('press_release'); ?>" class="press-release-back__button">
                        <span class="press-release-back__text">プレスリリース一覧へ戻る</span>
                        <span class="press-release-back__arrow">→</span>
                    </a>
                </div>
            </div>
        </section>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>