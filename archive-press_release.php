<?php get_header(); ?>
<main class="home-news">
    <section class="press-release" data-midnight="default">
        <div class="news__inner inner">
        <div class="news__english-title ">PRESS RELEASE</div>
            <h2 class="news__title">プレスリリース</h2>
            <p class="news-header-text text">
                さくら事務所の最新のプレスリリースをお届けします。事業展開や新サービス、メディア掲載情報などの重要なお知らせをご確認いただけます。
            </p>
            <div class="news__search">
                <form action="<?php echo get_post_type_archive_link('press_release'); ?>" method="get" class="news__search-form">
                    <div class="news__search-category">
                        <select name="press-release-category" class="news__search-select">
                            <option value="">全件表示（カテゴリー）</option>
                            <?php 
                            // デバッグ用：タクソノミーの存在確認
                            $taxonomy_exists = taxonomy_exists('press-release-category');
                            
                            $categories = get_terms([
                                'taxonomy' => 'press-release-category',
                                'hide_empty' => false,
                            ]);
                            
                            // デバッグ情報をコメントとして出力（本番環境では削除推奨）
                            echo '<!-- Taxonomy exists: ' . ($taxonomy_exists ? 'Yes' : 'No') . ' -->';
                            echo '<!-- Categories result: ' . (is_wp_error($categories) ? $categories->get_error_message() : (is_array($categories) ? count($categories) . ' items' : 'Empty')) . ' -->';
                            
                            if (!empty($categories) && !is_wp_error($categories)) {
                                foreach ($categories as $category) {
                                    $selected = (isset($_GET['press-release-category']) && $_GET['press-release-category'] === $category->slug) ? 'selected' : '';
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
                            const categorySelect = document.querySelector('select[name="press-release-category"]');
                            
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
                    // プレスリリースのピックアップ投稿を取得
                    $pickup_posts = get_press_release_pickup_posts();
                    
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
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="<?php echo get_the_title($pickup_post->ID); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="news-contents-pickup-item-content">
                                    <div class="news-contents-pickup-item-meta">
                                        <time class="news-contents-pickup-item-date" datetime="<?php echo get_the_date('c', $pickup_post->ID); ?>">
                                            <?php echo get_the_date('Y.m.d', $pickup_post->ID); ?>
                                        </time>
                                                                <?php
                        $categories = get_the_terms($pickup_post->ID, 'press-release-category');
                        if ($categories && !is_wp_error($categories) && !empty($categories)) :
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
                // プレスリリース用のカスタム˜エリを作成
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                
                $args = array(
                    'post_type' => 'press_release',
                    'posts_per_page' => 12,
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                // 検索パラメータがある場合は tax_query を追加
                if (isset($_GET['press-release-category']) && !empty($_GET['press-release-category'])) {
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'press-release-category',
                            'field'    => 'slug',
                            'terms'    => sanitize_text_field($_GET['press-release-category']),
                        )
                    );
                }
                
                $press_release_query = new WP_Query($args);
                
                if ($press_release_query->have_posts()) :
                ?>
                <div class="news-items">
                    <?php while ($press_release_query->have_posts()) : $press_release_query->the_post(); ?>
                    <div class="news-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="news-item-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="news-item-content">
                                <div class="news-item-meta">
                                    <time class="news-item-date" datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date('Y.m.d'); ?>
                                    </time>
                                    <?php
                                    $categories = get_the_terms(get_the_ID(), 'press-release-category');
                                    if ($categories && !is_wp_error($categories) && !empty($categories)) :
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
                                <?php else : ?>
                                <p class="news-item-excerpt">
                                    <?php echo wp_trim_words(get_the_content(), 50, '...'); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
                
                <?php if ($press_release_query->max_num_pages > 1) : ?>
                <div class="news-pagination">
                    <?php
                    $current_url = get_post_type_archive_link('press_release');
                    $query_params = '';
                    
                    // 検索パラメータを保持
                    if (isset($_GET['press-release-category']) && !empty($_GET['press-release-category'])) {
                        $query_params .= '&press-release-category=' . urlencode($_GET['press-release-category']);
                    }
                    
                    echo paginate_links(array(
                        'total' => $press_release_query->max_num_pages,
                        'current' => $paged,
                        'base' => $current_url . '%_%',
                        'format' => '?paged=%#%' . $query_params,
                        'prev_text' => '&laquo; 前へ',
                        'next_text' => '次へ &raquo;',
                        'mid_size' => 2,
                        'end_size' => 1,
                    ));
                    ?>
                </div>
                <?php endif; ?>
                
                <?php else : ?>
                <div class="news-no-posts">
                    <p>現在、表示できるプレスリリースがありません。</p>
                </div>
                <?php endif; ?>
                
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>