<?php get_header(); ?>

<main class="search-results">
    <div class="search-header">
        <div class="search-header__inner inner">
            <h1 class="search-header__title">
                <?php if (isset($_GET['post_type']) && $_GET['post_type'] === 'staff'): ?>
                    「<?php echo esc_html(get_search_query()); ?>」のスタッフ検索結果
                <?php else: ?>
                    「<?php echo esc_html(get_search_query()); ?>」の検索結果
                <?php endif; ?>
            </h1>
        </div>
    </div>

    <div class="search-container">
        <div class="search-container__inner inner">
            <?php if (have_posts()): ?>
                <?php if (isset($_GET['post_type']) && $_GET['post_type'] === 'staff'): ?>
                    <!-- スタッフ検索結果の表示 -->
                    <div class="staff-list__container">
                        <?php while (have_posts()): the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="staff-card">
                                <div class="staff-card__image">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium_large', array('class' => 'staff-card__img')); ?>
                                    <?php else: ?>
                                        <img src="<?php echo esc_url(get_theme_file_uri('/images/dummy.jpg')); ?>"
                                            alt="<?php the_title(); ?>" class="staff-card__img">
                                    <?php endif; ?>

                                    <div class="staff-card__name-overlay">
                                        <h2 class="staff-card__name--overlay"><?php the_title(); ?></h2>
                                    </div>
                                </div>

                                <div class="staff-card__content">
                                    <?php if (get_post_meta(get_the_ID(), 'staff_position', true)): ?>
                                        <span
                                            class="staff-card__position-tag"><?php echo esc_html(get_post_meta(get_the_ID(), 'staff_position', true)); ?></span>
                                    <?php endif; ?>

                                    <h2 class="staff-card__name"><?php the_title(); ?></h2>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <!-- 通常の検索結果の表示 -->
                    <div class="search-results__list">
                        <?php while (have_posts()): the_post(); ?>
                            <article class="search-item">
                                <h2 class="search-item__title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="search-item__meta">
                                    <span class="search-item__date"><?php echo get_the_date(); ?></span>
                                    <?php if (get_post_type() !== 'page'): ?>
                                        <span class="search-item__type"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="search-item__excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="search-item__link">詳細を見る</a>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <!-- ページネーション -->
                <div class="search-pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '&laquo; 前へ',
                        'next_text' => '次へ &raquo;',
                        'mid_size'  => 2,
                    ));
                    ?>
                </div>

            <?php else: ?>
                <div class="search-no-results">
                    <p>検索キーワードに一致するコンテンツが見つかりませんでした。</p>
                    <div class="search-no-results__form">
                        <h3>別のキーワードで検索する</h3>
                        <?php get_search_form(); ?>
                    </div>

                    <?php if (isset($_GET['post_type']) && $_GET['post_type'] === 'staff'): ?>
                        <div class="search-no-results__staff-link">
                            <a href="<?php echo esc_url(get_post_type_archive_link('staff')); ?>" class="btn">スタッフ一覧に戻る</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?> 