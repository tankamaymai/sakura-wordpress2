<?php get_header(); ?>
<main class="home-news">
    <section class="news" data-midnight="default">
        <div class="news__inner inner">
        <div class="news__english-title ">NEWS</div>
            <h2 class="news__title">ニュース</h2>
            <p class="news-header-text text">
                この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています
            </p>
            <div class="news__search">
                <form action="" method="get" class="news__search-form">
                    <div class="news__search-category">
                        <select name="news-category" class="news__search-select">
                            <option value="">全件表示（カテゴリー）</option>
                            <?php 
                            $categories = get_categories([
                                'hide_empty' => false,
                            ]);
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    $selected = (isset($_GET['news-category']) && $_GET['news-category'] === $category->slug) ? 'selected' : '';
                                    echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="staff__search-button">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/search-icon.webp" alt="検索">
                    </button>
                </form>
                
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.querySelector('.news__search-form');
                    if (form) {
                        form.addEventListener('submit', function(e) {
                            // 検索パラメータがない場合は現在のページにリダイレクト
                            const categorySelect = document.querySelector('select[name="news-category"]');
                            
                            const categoryValue = categorySelect ? categorySelect.value : '';
                            
                            // カテゴリーが空の場合はリロード
                            if (!categoryValue) {
                                e.preventDefault();
                                window.location.href = window.location.pathname;
                                return false;
                            }
                        });
                    }
                });
                </script>
            </div>
            <div class="news-contents-pickup">
                <h4 class="news-contents-title">
                    PICK UP
                </h4>
                <div class="news-contents-pickup-items">
                    <?php
                    // ピックアップ投稿を取得
                    $pickup_posts = get_news_pickup_posts();
                    
                    if (!empty($pickup_posts)) :
                        foreach ($pickup_posts as $pickup_post) :
                            setup_postdata($pickup_post);
                    ?>
                        <div class="news-contents-pickup-item">
                            <a href="<?php echo get_permalink($pickup_post->ID); ?>">
                                <div class="news-contents-pickup-item-image">
                                    <?php if (has_post_thumbnail($pickup_post->ID)) : ?>
                                        <?php echo get_the_post_thumbnail($pickup_post->ID, 'medium', array('alt' => get_the_title($pickup_post->ID))); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/news-default.webp" alt="<?php echo get_the_title($pickup_post->ID); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="news-contents-pickup-item-content">
                                    <div class="news-contents-pickup-item-meta">
                                        <time class="news-contents-pickup-item-date" datetime="<?php echo get_the_date('c', $pickup_post->ID); ?>">
                                            <?php echo get_the_date('Y.m.d', $pickup_post->ID); ?>
                                        </time>
                                        <?php
                                        $categories = get_the_category($pickup_post->ID);
                                        if ($categories && !empty($categories)) :
                                        ?>
                                        <span class="news-contents-pickup-item-category">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <h5 class="news-contents-pickup-item-title">
                                        <?php echo get_the_title($pickup_post->ID); ?>
                                    </h5>
                                    <?php if (has_excerpt($pickup_post->ID)) : ?>
                                    <p class="news-contents-pickup-item-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt($pickup_post->ID), 30, '...'); ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    <?php
                        endforeach;
                        wp_reset_postdata();
                    else :
                    ?>
                        <div class="news-contents-pickup-item-empty">
                            <p>ピックアップ投稿がありません。管理画面で設定してください。</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="news-contents">

                <?php
                // カスタムクエリを作成
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 12,
                    'paged' => $paged,
                    'meta_key' => '_thumbnail_id'
                );
                
                // 検索パラメータがある場合は tax_query を追加
                if (isset($_GET['news-category']) && !empty($_GET['news-category'])) {
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => sanitize_text_field($_GET['news-category']),
                        )
                    );
                }
                
                $news_query = new WP_Query($args);
                
                if ($news_query->have_posts()) :
                ?>
                <div class="news-items">
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    <div class="news-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="news-item-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/news-default.webp" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="news-item-content">
                                <div class="news-item-meta">
                                    <time class="news-item-date" datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date('Y.m.d'); ?>
                                    </time>
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories && !empty($categories)) :
                                    ?>
                                    <span class="news-item-category">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <h3 class="news-item-title">
                                    <?php the_title(); ?>
                                </h3>
                                <?php if (has_excerpt()) : ?>
                                <p class="news-item-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
                
                <?php if ($news_query->max_num_pages > 1) : ?>
                <div class="news-pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $news_query->max_num_pages,
                        'current' => $paged,
                        'format' => '?paged=%#%',
                        'prev_text' => '&laquo; 前へ',
                        'next_text' => '次へ &raquo;',
                    ));
                    ?>
                </div>
                <?php endif; ?>
                
                <?php else : ?>
                <div class="news-no-posts">
                    <p>現在、表示できるニュースがありません。</p>
                </div>
                <?php endif; ?>
                
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>