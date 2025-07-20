<?php get_header(); ?>



<!-- メインコンテンツ -->
<main class="staff-archive">

    <section id="section1" class="staff-hero" data-midnight="white">
        <div class="staff-hero__inner inner">
            <div class="staff-hero__content">
                <div class="staff-hero__title-wrapper">
                    <h3 class="staff-hero__title">OUR MEMBERS</h3>
                    <h2 class="staff-hero__subtitle">メンバー紹介</h2>
                </div>  
            </div>
        </div>
    </section>

    <section id="section2" class="staff-list" data-midnight="default">
        <div class="staff-list__inner inner">
            <div class="staff-list__text-wrapper">
                <p class="staff-list__text">さくら事務所グループで冒険を共にするメンバーたちです</p>
            </div>
            <div class="staff__search">
                <form action="<?php echo esc_url(get_post_type_archive_link('staff')); ?>" method="get" class="staff__search-form">
                    <div class="staff__search-category">
                        <select name="staff-category" class="staff__search-select">
                            <option value="">全件表示（カテゴリー）</option>
                            <?php 
                            $categories = get_terms([
                                'taxonomy' => 'category-staff',
                                'hide_empty' => true,
                            ]);
                            foreach ($categories as $category) {
                                $selected = (isset($_GET['staff-category']) && $_GET['staff-category'] === $category->slug) ? 'selected' : '';
                                echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="staff__search-button">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/search-icon.webp" alt="検索">
                    </button>
                </form>
            </div>
            <div class="staff-list__container">
                <div class="staff-list__items">
                    <?php
                    // カスタム投稿タイプ「staff」の投稿を取得
                    $args = array(
                        'post_type' => 'staff',
                        'posts_per_page' => -1, // すべての投稿を表示
                    );
                    
                    // カテゴリーフィルターが設定されている場合
                    if (isset($_GET['staff-category']) && !empty($_GET['staff-category'])) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'category-staff',
                                'field' => 'slug',
                                'terms' => sanitize_text_field($_GET['staff-category']),
                            )
                        );
                    }
                    
                    $staff_query = new WP_Query($args);
                    
                    if ($staff_query->have_posts()) :
                        while ($staff_query->have_posts()) : $staff_query->the_post();
                            // アイキャッチ画像を取得
                            $thumbnail = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_theme_file_uri('/images/sakura-staff-img.jpg');
                            
                            // タクソノミーからポジション情報を取得（子→親の順で表示）
                            $position_terms = get_the_terms(get_the_ID(), 'category-staff');
                            $position = 'ありません';
                            if ($position_terms && !is_wp_error($position_terms)) {
                                $parent_terms = array();
                                $child_terms = array();
                                
                                // 親子関係で分類
                                foreach ($position_terms as $term) {
                                    if ($term->parent == 0) {
                                        $parent_terms[] = $term->name;
                                    } else {
                                        $child_terms[] = $term->name;
                                    }
                                }
                                
                                // 親カテゴリー、子カテゴリーの順で結合
                                $position_names = array_merge($parent_terms, $child_terms);
                                $position = implode(' / ', $position_names);
                            }
                    ?>
                    <div class="staff-list__item">
                        <div class="staff-list__item-img">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>">
                            </a>
                        </div>
                        <div class="staff-list__item-text-wrap">
                            <p class="staff-list__item-text"><?php echo esc_html($position); ?></p>
                            <?php 
                            $furigana = get_post_meta(get_the_ID(), 'staff_furigana', true);
                            if ($furigana) : ?>
                                <p class="staff-list__item-furigana"><?php echo esc_html($furigana); ?></p>
                            <?php endif; ?>
                            <h3 class="staff-list__item-name">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                    ?>
                    <div class="staff-list__no-results">
                        <p>該当するスタッフが見つかりませんでした。</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.querySelector('.staff__search-category select');
    const form = document.querySelector('.staff__search-form');
    
    // URLから現在のパラメータを取得
    const urlParams = new URLSearchParams(window.location.search);
    
    // 初期選択状態を設定
    if (urlParams.has('staff-category')) {
        categorySelect.value = urlParams.get('staff-category');
    }
    
    // フォーム送信前の処理
    form.addEventListener('submit', function(e) {
        // 空の値のパラメータを削除
        if (!categorySelect.value) {
            categorySelect.disabled = true;
        }
    });
});
</script>

<?php get_footer(); ?>