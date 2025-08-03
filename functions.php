<?php
function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( // HTML5による出力
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');

/* CSSとJavaScriptの読み込み */
function my_script_init()
{ 
    // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    
    // jQueryの読み込み
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.js', "", "1.0.1");
    wp_enqueue_script('midnight-js', 'https://cdn.jsdelivr.net/npm/midnight.js@1.1.1/dist/midnight.jquery.min.js', array('jquery'), '1.1.1', true);
    // Swiperの読み込み
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', "", "1.0.1", true);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), 'false', 'all');
    
    // GSAPの読み込み
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true);
    wp_enqueue_script('gsap-scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true);
    
    // Google Fontsの読み込み
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), null);
    
    wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css', array(), '1.0.0');
    wp_enqueue_script('anime-js', get_template_directory_uri() . '/js/animetions.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('script-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    
    // テーマディレクトリのURLをJavaScriptに渡す
    wp_localize_script('script-js', 'themeData', array(
        'themeUrl' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'my_script_init');

/* Google Fontsのpreconnect追加 */
function add_google_fonts_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'add_google_fonts_preconnect', 1);

/* Staff検索機能の追加 */
function staff_search_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿タイプが'staff'で、カテゴリが選択されている場合
        if (isset($_GET['post_type']) && $_GET['post_type'] == 'staff') {
            // カテゴリが選択されている場合
            if (isset($_GET['category']) && !empty($_GET['category'])) {
                $query->set('tax_query', array(
                    array(
                        'taxonomy' => 'staff_category',
                        'field'    => 'slug',
                        'terms'    => sanitize_text_field($_GET['category']),
                    )
                ));
                $query->set('post_type', 'staff');
            }
        }
    }
    return $query;
}
add_action('pre_get_posts', 'staff_search_query');

/* News検索機能の追加（通常の投稿用） */
function news_search_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        // 通常の投稿で、ニュース検索のパラメータが指定されている場合
        if ((is_home() || is_front_page()) && isset($_GET['news-category'])) {
            // カテゴリが選択されている場合
            if (!empty($_GET['news-category'])) {
                $query->set('tax_query', array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => sanitize_text_field($_GET['news-category']),
                    )
                ));
                $query->set('post_type', 'post');
            }
        }
    }
    return $query;
}
add_action('pre_get_posts', 'news_search_query');

/* Press Release検索機能の追加（プレスリリース投稿用） */
function press_release_search_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        // プレスリリースのアーカイブページで検索パラメータが指定されている場合
        if (is_post_type_archive('press_release') && isset($_GET['press-release-category'])) {
            // カテゴリが選択されている場合
            if (!empty($_GET['press-release-category'])) {
                $query->set('tax_query', array(
                    array(
                        'taxonomy' => 'press-release-category',
                        'field'    => 'slug',
                        'terms'    => sanitize_text_field($_GET['press-release-category']),
                    )
                ));
                $query->set('post_type', 'press_release');
            }
        }
    }
    return $query;
}
add_action('pre_get_posts', 'press_release_search_query');

/**
 * Staffカスタム投稿タイプの登録
 */
function register_staff_post_type() {
    $labels = array(
        'name'               => 'スタッフ',
        'singular_name'      => 'スタッフ',
        'menu_name'          => 'スタッフ',
        'add_new'            => '新規追加',
        'add_new_item'       => '新規スタッフを追加',
        'edit_item'          => 'スタッフを編集',
        'new_item'           => '新規スタッフ',
        'view_item'          => 'スタッフを表示',
        'search_items'       => 'スタッフを検索',
        'not_found'          => 'スタッフが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱にスタッフはありません',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'staff'),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail'),
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-groups',
        'show_in_rest'        => true,
    );
    
    register_post_type('staff', $args);

    // スタッフのカテゴリタクソノミーを登録
    register_taxonomy(
        'category-staff',
        'staff',
        array(
            'label' => 'スタッフカテゴリー',
            'hierarchical' => true,
            'public' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'category-staff')
        )
    );
}
add_action('init', 'register_staff_post_type');



/**
 * スタッフ用のカスタムフィールドを追加
 */
function add_staff_meta_boxes() {
    add_meta_box(
        'staff_details',
        'スタッフ詳細情報',
        'staff_details_callback',
        'staff',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_staff_meta_boxes');

/**
 * スタッフ投稿タイプの管理画面でメディアスクリプトを読み込み
 */
function enqueue_staff_admin_scripts($hook) {
    global $post_type;
    
    if ($hook == 'post.php' || $hook == 'post-new.php') {
        if ($post_type == 'staff') {
            wp_enqueue_media();
            wp_enqueue_script('jquery');
        }
    }
}
add_action('admin_enqueue_scripts', 'enqueue_staff_admin_scripts');

// スタッフ詳細情報のコールバック関数
function staff_details_callback($post) {
    wp_nonce_field(basename(__FILE__), 'staff_nonce');
    
    // WordPressのメディアアップローダーを読み込み
    wp_enqueue_media();
    
    // 保存されている値を取得
    $furigana = get_post_meta($post->ID, 'staff_furigana', true);
    $subtitle = get_post_meta($post->ID, 'staff_subtitle', true);
    $description = get_post_meta($post->ID, 'staff_description', true);
    $history = get_post_meta($post->ID, 'staff_history', true);
    if (!is_array($history)) {
        $history = array();
    }
    $story = get_post_meta($post->ID, 'staff_story', true);
    $story_image = get_post_meta($post->ID, 'staff_story_image', true);
    $reason = get_post_meta($post->ID, 'staff_reason', true);
    $sns_links = get_post_meta($post->ID, 'staff_sns_links', true);
    if (!is_array($sns_links)) {
        $sns_links = array();
    }
    
    // フォームを表示
    ?>
    <p>
        <label for="staff_furigana">ふりがな:</label><br>
        <input type="text" id="staff_furigana" name="staff_furigana" value="<?php echo esc_attr($furigana); ?>" style="width: 100%;" placeholder="例: たなか たろう">
    </p>
    
    <p>
        <label for="staff_subtitle">サブタイトル:</label><br>
        <input type="text" id="staff_subtitle" name="staff_subtitle" value="<?php echo esc_attr($subtitle); ?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="staff_description">自己紹介文:</label><br>
        <textarea id="staff_description" name="staff_description" rows="5" style="width: 100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    
    <div class="staff-history-fields">
        <h4>経歴（3項目）</h4>
        <div id="staff_history_items">
            <?php
            // 3つの固定フィールドを表示
            for ($i = 0; $i < 3; $i++) {
                $value = isset($history[$i]) ? $history[$i] : '';
                echo '<p><label>経歴 ' . ($i + 1) . ':</label><br>';
                echo '<input type="text" name="staff_history[]" value="' . esc_attr($value) . '" style="width: 100%;"></p>';
            }
            ?>
        </div>
    </div>
    
    <p>
        <label for="staff_story">ストーリー:</label><br>
        <textarea id="staff_story" name="staff_story" rows="5" style="width: 100%;"><?php echo esc_textarea($story); ?></textarea>
    </p>
    
    <p>
        <label for="staff_story_image">ストーリー画像:</label><br>
        <input type="hidden" id="staff_story_image" name="staff_story_image" value="<?php echo esc_attr($story_image); ?>">
        <div class="story-image-preview-container" style="margin: 10px 0;">
            <?php if (!empty($story_image)) : ?>
                <?php echo wp_get_attachment_image($story_image, 'medium', false, array('style' => 'max-width: 300px; height: auto;')); ?>
            <?php else : ?>
                <p>画像が選択されていません</p>
            <?php endif; ?>
        </div>
        <button type="button" class="button upload-story-image">画像を選択</button>
        <button type="button" class="button remove-story-image" <?php echo empty($story_image) ? 'style="display:none;"' : ''; ?>>画像を削除</button>
    </p>
    
    <script>
    jQuery(document).ready(function($) {
        // WordPressのメディアアップローダーを初期化
        var mediaUploader;
        
        // 画像選択ボタンのクリックイベント
        $('.upload-story-image').on('click', function(e) {
            e.preventDefault();
            
            // メディアアップローダーがすでに存在する場合は開く
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            
            // メディアアップローダーを新規作成
            mediaUploader = wp.media({
                title: 'ストーリー画像を選択',
                button: {
                    text: '選択した画像を使用'
                },
                multiple: false // 複数選択を無効化
            });
            
            // 画像が選択されたときのイベント
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                
                // 画像IDを隠しフィールドに設定
                $('#staff_story_image').val(attachment.id);
                
                // プレビュー画像を更新
                var previewContainer = $('.story-image-preview-container');
                previewContainer.html('<img src="' + attachment.url + '" style="max-width: 300px; height: auto;" />');
                
                // 削除ボタンを表示
                $('.remove-story-image').show();
            });
            
            // メディアアップローダーを開く
            mediaUploader.open();
        });
        
        // 画像削除ボタンのクリックイベント
        $('.remove-story-image').on('click', function(e) {
            e.preventDefault();
            
            // 画像IDをクリア
            $('#staff_story_image').val('');
            
            // プレビュー画像を削除
            $('.story-image-preview-container').html('<p>画像が選択されていません</p>');
            
            // 削除ボタンを非表示
            $(this).hide();
        });
    });
    </script>
    
    <p>
        <label for="staff_reason">さくら事務所グループで働く理由:</label><br>
        <textarea id="staff_reason" name="staff_reason" rows="5" style="width: 100%;"><?php echo esc_textarea($reason); ?></textarea>
    </p>
    
    <h4>SNSリンク</h4>
    
    <?php
    // SNSリンクデータを取得
    $sns_links = get_post_meta($post->ID, 'staff_sns_links', true);
    if (!is_array($sns_links)) {
        $sns_links = array();
    }
    ?>
    
    <div id="staff-sns-container" style="margin-bottom: 20px;">
        <?php if (!empty($sns_links)) : ?>
            <?php foreach ($sns_links as $index => $sns_link) : ?>
                <div class="staff-sns-item" style="margin-bottom: 15px; padding: 15px; border: 1px solid #ddd; background: #f9f9f9;">
                    <h5>SNS項目 #<?php echo ($index + 1); ?> 
                        <span class="remove-staff-sns-btn" onclick="removeStaffSnsItem(this)" style="color: #bc0b0b; cursor: pointer; text-decoration: underline; margin-left: 10px;">削除</span>
                    </h5>
                    
                    <p>
                        <label>SNS画像:</label><br>
                        <input type="hidden" id="sns_image_<?php echo $index; ?>" name="staff_sns_links[<?php echo $index; ?>][image_id]" value="<?php echo esc_attr($sns_link['image_id'] ?? ''); ?>">
                        <div class="sns-image-preview-container-<?php echo $index; ?>" style="margin: 10px 0;">
                            <?php if (!empty($sns_link['image_id'])) : ?>
                                <?php echo wp_get_attachment_image($sns_link['image_id'], 'medium', false, array('style' => 'max-width: 300px; height: auto;')); ?>
                            <?php else : ?>
                                <p>画像が選択されていません</p>
                            <?php endif; ?>
                        </div>
                        <button type="button" class="button upload-sns-image-<?php echo $index; ?>">画像を選択</button>
                        <button type="button" class="button remove-sns-image-<?php echo $index; ?>" <?php echo empty($sns_link['image_id']) ? 'style="display:none;"' : ''; ?>>画像を削除</button>
                    </p>
                    
                    <p>
                        <label>SNSテキスト:</label><br>
                        <input type="text" name="staff_sns_links[<?php echo $index; ?>][text]" value="<?php echo esc_attr($sns_link['text'] ?? ''); ?>" style="width: 100%;" placeholder="例: Instagram">
                    </p>
                    
                    <p>
                        <label>リンクURL:</label><br>
                        <input type="url" name="staff_sns_links[<?php echo $index; ?>][url]" value="<?php echo esc_url($sns_link['url'] ?? ''); ?>" style="width: 100%;" placeholder="https://...">
                    </p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <button type="button" class="button button-primary" onclick="addStaffSnsItem()">SNS項目を追加</button>
    
    <script>
    jQuery(document).ready(function($) {
        // 各SNS項目の画像アップロード機能をストーリー画像と同じ方式で実装
        <?php if (!empty($sns_links)) : ?>
            <?php foreach ($sns_links as $index => $sns_link) : ?>
                // SNS項目 <?php echo $index; ?> の画像アップローダー
                var snsMediaUploader<?php echo $index; ?>;
                
                // 画像選択ボタンのクリックイベント
                $('.upload-sns-image-<?php echo $index; ?>').on('click', function(e) {
                e.preventDefault();
                
                    // メディアアップローダーがすでに存在する場合は開く
                    if (snsMediaUploader<?php echo $index; ?>) {
                        snsMediaUploader<?php echo $index; ?>.open();
                        return;
                    }
                    
                    // メディアアップローダーを新規作成
                    snsMediaUploader<?php echo $index; ?> = wp.media({
                    title: 'SNS画像を選択',
                    button: {
                        text: '選択した画像を使用'
                    },
                    multiple: false
                });
                
                    // 画像が選択されたときのイベント
                    snsMediaUploader<?php echo $index; ?>.on('select', function() {
                        var attachment = snsMediaUploader<?php echo $index; ?>.state().get('selection').first().toJSON();
                    
                        // 画像IDを隠しフィールドに設定
                        $('#sns_image_<?php echo $index; ?>').val(attachment.id);
                        
                        // プレビュー画像を更新
                        var previewContainer = $('.sns-image-preview-container-<?php echo $index; ?>');
                        previewContainer.html('<img src="' + attachment.url + '" style="max-width: 300px; height: auto;" />');
                        
                        // 削除ボタンを表示
                        $('.remove-sns-image-<?php echo $index; ?>').show();
                });
                
                    // メディアアップローダーを開く
                    snsMediaUploader<?php echo $index; ?>.open();
            });
            
                // 画像削除ボタンのクリックイベント
                $('.remove-sns-image-<?php echo $index; ?>').on('click', function(e) {
                e.preventDefault();
                
                    // 画像IDをクリア
                    $('#sns_image_<?php echo $index; ?>').val('');
                    
                    // プレビュー画像を削除
                    $('.sns-image-preview-container-<?php echo $index; ?>').html('<p>画像が選択されていません</p>');
                    
                    // 削除ボタンを非表示
                    $(this).hide();
            });
            <?php endforeach; ?>
        <?php endif; ?>
        
        // グローバル関数として追加
        window.addStaffSnsItem = function() {
            const container = $('#staff-sns-container');
            const items = container.find('.staff-sns-item');
            const newIndex = items.length;
            
            const newItem = $(`
                <div class="staff-sns-item" style="margin-bottom: 15px; padding: 15px; border: 1px solid #ddd; background: #f9f9f9;">
                    <h5>SNS項目 #${newIndex + 1} 
                        <span class="remove-staff-sns-btn" onclick="removeStaffSnsItem(this)" style="color: #bc0b0b; cursor: pointer; text-decoration: underline; margin-left: 10px;">削除</span>
                    </h5>
                    
                    <p>
                        <label>SNS画像:</label><br>
                        <input type="hidden" id="sns_image_${newIndex}" name="staff_sns_links[${newIndex}][image_id]" value="">
                        <div class="sns-image-preview-container-${newIndex}" style="margin: 10px 0;">
                            <p>画像が選択されていません</p>
                        </div>
                        <button type="button" class="button upload-sns-image-${newIndex}">画像を選択</button>
                        <button type="button" class="button remove-sns-image-${newIndex}" style="display:none;">画像を削除</button>
                    </p>
                    
                    <p>
                        <label>SNSテキスト:</label><br>
                        <input type="text" name="staff_sns_links[${newIndex}][text]" value="" style="width: 100%;" placeholder="例: Instagram">
                    </p>
                    
                    <p>
                        <label>リンクURL:</label><br>
                        <input type="url" name="staff_sns_links[${newIndex}][url]" value="" style="width: 100%;" placeholder="https://...">
                    </p>
                </div>
            `);
            
            container.append(newItem);
            
            // 新しく追加されたアイテムの画像アップロード機能を初期化（ストーリー画像と同じ方式）
            var newSnsMediaUploader;
            
            // 画像選択ボタンのクリックイベント
            $(`.upload-sns-image-${newIndex}`).on('click', function(e) {
                e.preventDefault();
                
                // メディアアップローダーがすでに存在する場合は開く
                if (newSnsMediaUploader) {
                    newSnsMediaUploader.open();
                    return;
                }
                
                // メディアアップローダーを新規作成
                newSnsMediaUploader = wp.media({
                    title: 'SNS画像を選択',
                    button: {
                        text: '選択した画像を使用'
                    },
                    multiple: false
                });
                
                // 画像が選択されたときのイベント
                newSnsMediaUploader.on('select', function() {
                    var attachment = newSnsMediaUploader.state().get('selection').first().toJSON();
                    
                    // 画像IDを隠しフィールドに設定
                    $(`#sns_image_${newIndex}`).val(attachment.id);
                    
                    // プレビュー画像を更新
                    var previewContainer = $(`.sns-image-preview-container-${newIndex}`);
                    previewContainer.html('<img src="' + attachment.url + '" style="max-width: 300px; height: auto;" />');
                    
                    // 削除ボタンを表示
                    $(`.remove-sns-image-${newIndex}`).show();
                });
                
                // メディアアップローダーを開く
                newSnsMediaUploader.open();
            });
            
            // 画像削除ボタンのクリックイベント
            $(`.remove-sns-image-${newIndex}`).on('click', function(e) {
                e.preventDefault();
                
                // 画像IDをクリア
                $(`#sns_image_${newIndex}`).val('');
                
                // プレビュー画像を削除
                $(`.sns-image-preview-container-${newIndex}`).html('<p>画像が選択されていません</p>');
                
                // 削除ボタンを非表示
                $(this).hide();
            });
        };
        
        window.removeStaffSnsItem = function(button) {
            if (confirm('このSNS項目を削除してもよろしいですか？')) {
                $(button).closest('.staff-sns-item').remove();
                updateStaffSnsNumbers();
            }
        };
        
        function updateStaffSnsNumbers() {
            $('#staff-sns-container .staff-sns-item').each(function(index) {
                $(this).find('h5').html(`SNS項目 #${index + 1} <span class="remove-staff-sns-btn" onclick="removeStaffSnsItem(this)" style="color: #bc0b0b; cursor: pointer; text-decoration: underline; margin-left: 10px;">削除</span>`);
                
                // フィールド名を更新
                $(this).find('input[name*="[image_id]"]').attr('name', `staff_sns_links[${index}][image_id]`);
                $(this).find('input[name*="[text]"]').attr('name', `staff_sns_links[${index}][text]`);
                $(this).find('input[name*="[url]"]').attr('name', `staff_sns_links[${index}][url]`);
            });
        }
    });
    </script>
    <?php
}

// スタッフメタデータの保存
function save_staff_meta($post_id) {
    // 自動保存の場合は何もしない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // nonceチェック
    if (!isset($_POST['staff_nonce']) || !wp_verify_nonce($_POST['staff_nonce'], basename(__FILE__))) {
        return;
    }
    
    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // ふりがなの保存
    if (isset($_POST['staff_furigana'])) {
        update_post_meta($post_id, 'staff_furigana', sanitize_text_field($_POST['staff_furigana']));
    }
    
    // サブタイトルの保存
    if (isset($_POST['staff_subtitle'])) {
        update_post_meta($post_id, 'staff_subtitle', sanitize_text_field($_POST['staff_subtitle']));
    }
    
    // 自己紹介文の保存
    if (isset($_POST['staff_description'])) {
        update_post_meta($post_id, 'staff_description', wp_kses_post($_POST['staff_description']));
    }
    
    // 経歴の保存（3つの固定項目）
    if (isset($_POST['staff_history'])) {
        $history = array_map('sanitize_text_field', $_POST['staff_history']);
        // 最大3項目までを保存
        $history = array_slice($history, 0, 3);
        update_post_meta($post_id, 'staff_history', $history);
    }
    
    // ストーリーの保存
    if (isset($_POST['staff_story'])) {
        update_post_meta($post_id, 'staff_story', wp_kses_post($_POST['staff_story']));
    }
    
    // ストーリー画像IDの保存
    if (isset($_POST['staff_story_image'])) {
        update_post_meta($post_id, 'staff_story_image', absint($_POST['staff_story_image']));
    }
    
    // 理由の保存
    if (isset($_POST['staff_reason'])) {
        update_post_meta($post_id, 'staff_reason', wp_kses_post($_POST['staff_reason']));
    }
    
    // 新しいSNSリンクの保存
    if (isset($_POST['staff_sns_links'])) {
        $sns_links = $_POST['staff_sns_links'];
        $sanitized_links = array();
        
        foreach ($sns_links as $index => $link) {
            // 少なくとも一つのフィールドに値が入っている場合のみ保存
            if (!empty($link['url']) || !empty($link['text']) || !empty($link['image_id'])) {
                $image_id = absint($link['image_id'] ?? 0);
                $text = sanitize_text_field($link['text'] ?? '');
                $url = esc_url_raw($link['url'] ?? '');
                
                $sanitized_links[] = array(
                    'image_id' => $image_id,
                    'text' => $text,
                    'url' => $url
                );
            }
        }
        
        update_post_meta($post_id, 'staff_sns_links', $sanitized_links);
    }
}
add_action('save_post_staff', 'save_staff_meta');

/**
 * SNSセクション用のカスタムフィールド設定（統合されたため無効化）
 * 注意: この関数は register_sns_settings() に統合されました
 */
/*
function register_front_page_sns_settings() {
    // この関数は register_sns_settings() に統合されました
}
add_action('admin_init', 'register_front_page_sns_settings');
*/

/**
 * SNS設定用の管理メニューを追加
 */
function add_front_page_sns_menu() {
    add_menu_page(
        'SNS・バナー設定', // ページタイトル
        'SNS・バナー設定', // メニュータイトル
        'manage_options', // 権限
        'sns_settings', // メニュースラッグ
        'sns_settings_page', // 表示関数
        'dashicons-share', // アイコン
        10 // 位置
    );
    
    // サブメニューとして「SNS設定」を明示的に追加
    add_submenu_page(
        'sns_settings', // 親メニューのスラッグ
        'SNS設定', // ページタイトル
        'SNS設定', // メニュータイトル
        'manage_options', // 権限
        'sns_settings', // メニュースラッグ（同じスラッグで上書き）
        'sns_settings_page' // 表示関数
    );
}
add_action('admin_menu', 'add_front_page_sns_menu');

/**
 * SNSセクション設定を登録
 */
function register_sns_settings() {
    // フロントページSNS設定
    register_setting('sns_settings', 'front_page_sns_items', 'sanitize_sns_items');
    
    // SNSページ用設定
    register_setting('sns_settings', 'page_sns_items', 'sanitize_sns_items');
    
    // 採用ページSNS設定
    register_setting('sns_settings', 'recruit_page_sns_items', 'sanitize_sns_items');
    
    // フロントページSNSセクション
    add_settings_section(
        'front_page_sns_section',
        'フロントページSNS設定',
        'front_page_sns_section_callback',
        'sns_settings'
    );
    
    // SNSページセクション
    add_settings_section(
        'page_sns_section',
        'SNSページ設定',
        'page_sns_section_callback',
        'sns_settings'
    );
    
    // 採用ページSNSセクション
    add_settings_section(
        'recruit_page_sns_section',
        '採用ページSNS設定',
        'recruit_page_sns_section_callback',
        'sns_settings'
    );
    
    // フロントページSNS設定フィールド
    add_settings_field(
        'front_page_sns_items_field',
        'SNS項目の設定',
        'front_page_sns_items_callback',
        'sns_settings',
        'front_page_sns_section'
    );
    
    // SNSページ設定フィールド
    add_settings_field(
        'page_sns_items_field',
        'SNS項目の設定',
        'page_sns_items_callback',
        'sns_settings',
        'page_sns_section'
    );
    
    // 採用ページSNS設定フィールド
    add_settings_field(
        'recruit_page_sns_items_field',
        'SNS項目の設定',
        'recruit_page_sns_items_callback',
        'sns_settings',
        'recruit_page_sns_section'
    );
}
add_action('admin_init', 'register_sns_settings');

/**
 * SNS設定ページの表示
 */
function sns_settings_page() {
    ?>
    <div class="wrap">
        <h1>SNS設定</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('sns_settings');
            ?>
            
            <div class="metabox-holder">
                <!-- フロントページ設定 -->
                <div class="postbox">
                    <div class="postbox-header">
                        <h2 class="hndle ui-sortable-handle">フロントページSNS設定</h2>
                        <div class="handle-actions hide-if-no-js">
                            <button type="button" class="handlediv" aria-expanded="true">
                                <span class="screen-reader-text">パネルの切り替え</span>
                                <span class="toggle-indicator" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <div class="inside">
                        <table class="form-table" role="presentation">
                            <tbody>
                                <tr>
                                    <th scope="row">SNS項目の設定</th>
                                    <td><?php front_page_sns_items_callback(); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- SNSページ設定 -->
                <div class="postbox">
                    <div class="postbox-header">
                        <h2 class="hndle ui-sortable-handle">SNSページ設定</h2>
                        <div class="handle-actions hide-if-no-js">
                            <button type="button" class="handlediv" aria-expanded="true">
                                <span class="screen-reader-text">パネルの切り替え</span>
                                <span class="toggle-indicator" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <div class="inside">
                        <table class="form-table" role="presentation">
                            <tbody>
                                <tr>
                                    <th scope="row">SNS項目の設定</th>
                                    <td><?php page_sns_items_callback(); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- 採用ページ設定 -->
                <div class="postbox">
                    <div class="postbox-header">
                        <h2 class="hndle ui-sortable-handle">採用ページSNS設定</h2>
                        <div class="handle-actions hide-if-no-js">
                            <button type="button" class="handlediv" aria-expanded="true">
                                <span class="screen-reader-text">パネルの切り替え</span>
                                <span class="toggle-indicator" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <div class="inside">
                        <table class="form-table" role="presentation">
                            <tbody>
                                <tr>
                                    <th scope="row">SNS項目の設定</th>
                                    <td><?php recruit_page_sns_items_callback(); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <?php submit_button(); ?>
        </form>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // 折りたたみ機能の実装
        $('.postbox .handlediv, .postbox .hndle').on('click', function(e) {
            e.preventDefault();
            var $postbox = $(this).closest('.postbox');
            $postbox.toggleClass('closed');
            
            // アクセシビリティのために aria-expanded 属性を更新
            var $button = $postbox.find('.handlediv');
            var isExpanded = !$postbox.hasClass('closed');
            $button.attr('aria-expanded', isExpanded);
            
            // WordPress 管理画面との一貫性のために設定を保存
            if (typeof postboxes !== 'undefined') {
                postboxes.save_state();
            }
        });
        
        // 初期状態設定 - デフォルトですべてのパネルを閉じた状態にする
        $('.postbox').addClass('closed');
        $('.postbox .handlediv').attr('aria-expanded', 'false');
    });
    </script>
    <?php
}

// フロントページSNSセクションの説明コールバック
function front_page_sns_section_callback() {
    echo '<p>フロントページのSNSセクションの設定を行います。</p>';
}

// SNSページセクションの説明コールバック
function page_sns_section_callback() {
    echo '<p>SNSページ（page-sns.php）の設定を行います。</p>';
}

// SNSページの項目設定用コールバック
function page_sns_items_callback() {
    $sns_items = get_option('page_sns_items');
    
    if (!is_array($sns_items) || empty($sns_items)) {
        // デフォルト値の設定
        $sns_items = array(
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'ホームインスペクション',
                'accounts' => array(
                    array(
                        'url' => 'https://twitter.com/Sakura_xx',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Sakura_xx'
                    ),
                    array(
                        'url' => 'https://youtube.com/@Sakura_youtube',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Sakura_youtube'
                    ),
                    array(
                        'url' => 'https://instagram.com/Sakura_insta',
                        'icon' => get_theme_file_uri('/images/sns/insta-sns2.webp'),
                        'name' => 'Sakura_insta'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'マンション管理コンサルティング',
                'accounts' => array(
                    array(
                        'url' => 'https://twitter.com/kanri_joujou',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'kanri_joujou'
                    ),
                    array(
                        'url' => 'https://youtube.com/@Mansion_youtube',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Mansion_youtube'
                    )
                )
            ),
            array(
                'title' => 'らくだ不動産公式SNS',
                'text' => '',
                'accounts' => array(
                    array(
                        'url' => 'https://twitter.com/Rakuda_xx',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    ),
                    array(
                        'url' => 'https://youtube.com/@Rakuda_youtube',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Rakuda_youtube'
                    ),
                    array(
                        'url' => 'https://instagram.com/Rakuda_insta',
                        'icon' => get_theme_file_uri('/images/sns/insta-sns2.webp'),
                        'name' => 'Rakuda_insta'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所グループ',
                'text' => '採用チャンネル',
                'accounts' => array(
                    array(
                        'url' => 'https://youtube.com/@sakura-group',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'sakura-group'
                    ),
                    array(
                        'url' => 'https://instagram.com/sakura-group',
                        'icon' => get_theme_file_uri('/images/sns/insta-sns2.webp'),
                        'name' => 'sakura-group'
                    ),
                    array(
                        'url' => 'https://note.com/sakurajimusyo',
                        'icon' => get_theme_file_uri('/images/sns/sns-note.svg'),
                        'name' => 'sakura-group'
                    )
                )
            )
        );
        update_option('page_sns_items', $sns_items);
    }
    
    // 管理画面用のスタイルを追加
    echo '<style>
        .sns-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .sns-accounts {
            margin-top: 10px;
        }
        .sns-account {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px dashed #ddd;
            background: #fff;
        }
        .add-account-btn, .add-item-btn {
            margin-top: 10px;
        }
        .remove-btn {
            color: #bc0b0b;
            cursor: pointer;
            text-decoration: underline;
        }
        .media-preview {
            max-width: 100px;
            max-height: 100px;
            margin-top: 5px;
            border: 1px solid #ddd;
            padding: 3px;
            background: #fff;
        }
        .media-buttons {
            margin-top: 5px;
            display: flex;
            gap: 5px;
        }
    </style>';
    
    // SNS項目コンテナ
    echo '<div id="page-sns-items-container">';
    
    // 各SNS項目のフィールドを表示
    foreach ($sns_items as $index => $item) {
        echo '<div class="sns-item">';
        echo '<h4>SNS項目 #' . ($index + 1) . ' <span class="remove-btn" onclick="removePageSnsItem(this)">削除</span></h4>';
        
        // タイトルフィールド
        echo '<div>';
        echo '<label>タイトル：</label>';
        echo '<input type="text" name="page_sns_items[' . $index . '][title]" value="' . esc_attr($item['title']) . '" style="width: 100%;" />';
        echo '</div>';
        
        // テキストフィールド
        echo '<div>';
        echo '<label>説明テキスト：</label>';
        echo '<input type="text" name="page_sns_items[' . $index . '][text]" value="' . esc_attr($item['text']) . '" style="width: 100%;" />';
        echo '</div>';
        
        // アカウント情報フィールド
        echo '<div class="sns-accounts">';
        echo '<h5>アカウント</h5>';
        
        if (isset($item['accounts']) && is_array($item['accounts'])) {
            foreach ($item['accounts'] as $acct_index => $account) {
                echo '<div class="sns-account">';
                echo '<h6>アカウント #' . ($acct_index + 1) . ' <span class="remove-btn" onclick="removePageAccount(this)">削除</span></h6>';
                
                // URLフィールド
                echo '<div>';
                echo '<label>リンクURL：</label>';
                echo '<input type="text" name="page_sns_items[' . $index . '][accounts][' . $acct_index . '][url]" value="' . esc_attr($account['url']) . '" style="width: 100%;" />';
                echo '</div>';
                
                // アイコンURLフィールド（メディアアップローダー付き）
                echo '<div>';
                echo '<label>アイコン画像：</label>';
                echo '<input type="text" name="page_sns_items[' . $index . '][accounts][' . $acct_index . '][icon]" class="icon-url-input" value="' . esc_attr($account['icon']) . '" style="width: 100%;" />';
                
                // 画像プレビュー
                echo '<div class="media-preview-container">';
                if (!empty($account['icon'])) {
                    echo '<img src="' . esc_url($account['icon']) . '" class="media-preview" />';
                }
                echo '</div>';
                
                // メディア選択ボタン
                echo '<div class="media-buttons">';
                echo '<button type="button" class="button upload-page-icon-button" data-item="' . $index . '" data-account="' . $acct_index . '">メディアから選択</button>';
                echo '<button type="button" class="button remove-page-icon-button" data-item="' . $index . '" data-account="' . $acct_index . '">画像を削除</button>';
                echo '</div>';
                echo '</div>';
                
                // アカウント名フィールド
                echo '<div>';
                echo '<label>アカウント名：</label>';
                echo '<input type="text" name="page_sns_items[' . $index . '][accounts][' . $acct_index . '][name]" value="' . esc_attr($account['name']) . '" style="width: 100%;" />';
                echo '</div>';
                
                echo '</div>'; // .sns-account
            }
        }
        
        // アカウント追加ボタン
        echo '<button type="button" class="button add-account-btn" onclick="addPageAccount(this, ' . $index . ')">アカウントを追加</button>';
        
        echo '</div>'; // .sns-accounts
        echo '</div>'; // .sns-item
    }
    
    echo '</div>'; // #page-sns-items-container
    
    // SNS項目追加ボタン
    echo '<button type="button" class="button button-primary add-item-btn" onclick="addPageSnsItem()">新しいSNS項目を追加</button>';
    
    // JavaScript for dynamic fields
    ?>
    <script>
        // 新しいアカウントの追加
        function addPageAccount(button, itemIndex) {
            const accountsContainer = button.parentNode;
            const accountItems = accountsContainer.querySelectorAll('.sns-account');
            const newIndex = accountItems.length;
            
            const newAccount = document.createElement('div');
            newAccount.className = 'sns-account';
            newAccount.innerHTML = `
                <h6>アカウント #${newIndex + 1} <span class="remove-btn" onclick="removePageAccount(this)">削除</span></h6>
                <div>
                    <label>リンクURL：</label>
                    <input type="text" name="page_sns_items[${itemIndex}][accounts][${newIndex}][url]" value="#" style="width: 100%;" />
                </div>
                <div>
                    <label>アイコン画像：</label>
                    <input type="text" name="page_sns_items[${itemIndex}][accounts][${newIndex}][icon]" class="icon-url-input" value="" style="width: 100%;" />
                    <div class="media-preview-container"></div>
                    <div class="media-buttons">
                        <button type="button" class="button upload-page-icon-button" data-item="${itemIndex}" data-account="${newIndex}">メディアから選択</button>
                        <button type="button" class="button remove-page-icon-button" data-item="${itemIndex}" data-account="${newIndex}">画像を削除</button>
                    </div>
                </div>
                <div>
                    <label>アカウント名：</label>
                    <input type="text" name="page_sns_items[${itemIndex}][accounts][${newIndex}][name]" value="" style="width: 100%;" />
                </div>
            `;
            
            accountsContainer.insertBefore(newAccount, button);
            
            // 新しく追加されたメディアボタンのイベントリスナーを追加
            setupPageMediaButtons();
        }
        
        // アカウントの削除
        function removePageAccount(button) {
            if (confirm('このアカウントを削除してもよろしいですか？')) {
                const accountDiv = button.closest('.sns-account');
                accountDiv.parentNode.removeChild(accountDiv);
                updatePageAccountNumbers();
            }
        }
        
        // 新しいSNS項目の追加
        function addPageSnsItem() {
            const container = document.getElementById('page-sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            const newIndex = items.length;
            
            const newItem = document.createElement('div');
            newItem.className = 'sns-item';
            newItem.innerHTML = `
                <h4>SNS項目 #${newIndex + 1} <span class="remove-btn" onclick="removePageSnsItem(this)">削除</span></h4>
                <div>
                    <label>タイトル：</label>
                    <input type="text" name="page_sns_items[${newIndex}][title]" value="" style="width: 100%;" />
                </div>
                <div>
                    <label>説明テキスト：</label>
                    <input type="text" name="page_sns_items[${newIndex}][text]" value="" style="width: 100%;" />
                </div>
                <div class="sns-accounts">
                    <h5>アカウント</h5>
                    <div class="sns-account">
                        <h6>アカウント #1 <span class="remove-btn" onclick="removePageAccount(this)">削除</span></h6>
                        <div>
                            <label>リンクURL：</label>
                            <input type="text" name="page_sns_items[${newIndex}][accounts][0][url]" value="#" style="width: 100%;" />
                        </div>
                        <div>
                            <label>アイコン画像：</label>
                            <input type="text" name="page_sns_items[${newIndex}][accounts][0][icon]" class="icon-url-input" value="" style="width: 100%;" />
                            <div class="media-preview-container"></div>
                            <div class="media-buttons">
                                <button type="button" class="button upload-page-icon-button" data-item="${newIndex}" data-account="0">メディアから選択</button>
                                <button type="button" class="button remove-page-icon-button" data-item="${newIndex}" data-account="0">画像を削除</button>
                            </div>
                        </div>
                        <div>
                            <label>アカウント名：</label>
                            <input type="text" name="page_sns_items[${newIndex}][accounts][0][name]" value="" style="width: 100%;" />
                        </div>
                    </div>
                    <button type="button" class="button add-account-btn" onclick="addPageAccount(this, ${newIndex})">アカウントを追加</button>
                </div>
            `;
            
            container.appendChild(newItem);
            
            // 新しく追加された項目のメディアボタンのイベントリスナーを追加
            setupPageMediaButtons();
        }
        
        // SNS項目の削除
        function removePageSnsItem(button) {
            if (confirm('このSNS項目を削除してもよろしいですか？')) {
                const itemDiv = button.closest('.sns-item');
                itemDiv.parentNode.removeChild(itemDiv);
                updatePageItemNumbers();
            }
        }
        
        // SNS項目番号の更新
        function updatePageItemNumbers() {
            const container = document.getElementById('page-sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            
            items.forEach((item, index) => {
                const titleH4 = item.querySelector('h4');
                titleH4.innerHTML = `SNS項目 #${index + 1} <span class="remove-btn" onclick="removePageSnsItem(this)">削除</span>`;
                
                // 入力フィールド名も更新
                updatePageFieldNames(item, index);
            });
        }
        
        // アカウント番号の更新
        function updatePageAccountNumbers() {
            const container = document.getElementById('page-sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            
            items.forEach((item, itemIndex) => {
                const accounts = item.querySelectorAll('.sns-account');
                accounts.forEach((account, acctIndex) => {
                    const titleH6 = account.querySelector('h6');
                    titleH6.innerHTML = `アカウント #${acctIndex + 1} <span class="remove-btn" onclick="removePageAccount(this)">削除</span>`;
                    
                    // アカウントフィールド名も更新
                    updatePageAccountFieldNames(account, itemIndex, acctIndex);
                });
            });
        }
        
        // 項目のフィールド名を更新
        function updatePageFieldNames(item, itemIndex) {
            const titleInput = item.querySelector('input[name*="[title]"]');
            const textInput = item.querySelector('input[name*="[text]"]');
            
            titleInput.name = `page_sns_items[${itemIndex}][title]`;
            textInput.name = `page_sns_items[${itemIndex}][text]`;
            
            // アカウントボタンの関数パラメータも更新
            const addBtn = item.querySelector('.add-account-btn');
            addBtn.setAttribute('onclick', `addPageAccount(this, ${itemIndex})`);
            
            // 各アカウントのフィールド名も更新
            const accounts = item.querySelectorAll('.sns-account');
            accounts.forEach((account, acctIndex) => {
                updatePageAccountFieldNames(account, itemIndex, acctIndex);
            });
        }
        
        // アカウントのフィールド名を更新
        function updatePageAccountFieldNames(account, itemIndex, acctIndex) {
            const urlInput = account.querySelector('input[name*="[url]"]');
            const iconInput = account.querySelector('input[name*="[icon]"]');
            const nameInput = account.querySelector('input[name*="[name]"]');
            
            urlInput.name = `page_sns_items[${itemIndex}][accounts][${acctIndex}][url]`;
            iconInput.name = `page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]`;
            nameInput.name = `page_sns_items[${itemIndex}][accounts][${acctIndex}][name]`;
            
            // メディアボタンのdata属性も更新
            const uploadBtn = account.querySelector('.upload-page-icon-button');
            const removeBtn = account.querySelector('.remove-page-icon-button');
            
            if (uploadBtn) {
                uploadBtn.dataset.item = itemIndex;
                uploadBtn.dataset.account = acctIndex;
            }
            
            if (removeBtn) {
                removeBtn.dataset.item = itemIndex;
                removeBtn.dataset.account = acctIndex;
            }
        }
        
        // WordPressメディアアップローダーのセットアップ
        function setupPageMediaButtons() {
            // メディア選択ボタンのイベントリスナー
            document.querySelectorAll('.upload-page-icon-button').forEach(button => {
                if (!button.hasAttribute('data-initialized')) {
                    button.addEventListener('click', function() {
                        const itemIndex = this.getAttribute('data-item');
                        const acctIndex = this.getAttribute('data-account');
                        const inputField = document.querySelector(`input[name="page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]"]`);
                        const previewContainer = this.closest('div').previousElementSibling;
                        
                        // メディアアップローダーの設定
                        const mediaUploader = wp.media({
                            title: 'SNSアイコン画像の選択',
                            button: {
                                text: '画像を選択'
                            },
                            multiple: false
                        });
                        
                        // 選択時の処理
                        mediaUploader.on('select', function() {
                            const attachment = mediaUploader.state().get('selection').first().toJSON();
                            inputField.value = attachment.url;
                            
                            // プレビュー画像を更新
                            previewContainer.innerHTML = `<img src="${attachment.url}" class="media-preview" />`;
                        });
                        
                        // メディアアップローダーを開く
                        mediaUploader.open();
                    });
                    
                    button.setAttribute('data-initialized', 'true');
                }
            });
            
            // 画像削除ボタンのイベントリスナー
            document.querySelectorAll('.remove-page-icon-button').forEach(button => {
                if (!button.hasAttribute('data-initialized')) {
                    button.addEventListener('click', function() {
                        const itemIndex = this.getAttribute('data-item');
                        const acctIndex = this.getAttribute('data-account');
                        const inputField = document.querySelector(`input[name="page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]"]`);
                        const previewContainer = this.closest('div').previousElementSibling;
                        
                        // 入力フィールドとプレビューをクリア
                        inputField.value = '';
                        previewContainer.innerHTML = '';
                    });
                    
                    button.setAttribute('data-initialized', 'true');
                }
            });
        }
        
        // ページ読み込み時にメディアボタンのイベントリスナーを設定
        document.addEventListener('DOMContentLoaded', function() {
            setupPageMediaButtons();
        });
    </script>
    <?php
}

/**
 * SNSページのSNS項目データを取得
 * 
 * @return array SNS項目のデータ配列
 */
function get_page_sns_items() {
    $sns_items = get_option('page_sns_items');
    
    if (!is_array($sns_items) || empty($sns_items)) {
        // デフォルト値
        $sns_items = array(
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'ホームインスペクション',
                'accounts' => array(
                    array(
                        'url' => 'https://twitter.com/Sakura_xx',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Sakura_xx'
                    ),
                    array(
                        'url' => 'https://youtube.com/@Sakura_youtube',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Sakura_youtube'
                    ),
                    array(
                        'url' => 'https://instagram.com/Sakura_insta',
                        'icon' => get_theme_file_uri('/images/sns/insta-sns2.webp'),
                        'name' => 'Sakura_insta'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'マンション管理コンサルティング',
                'accounts' => array(
                    array(
                        'url' => 'https://twitter.com/kanri_joujou',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'kanri_joujou'
                    ),
                    array(
                        'url' => 'https://youtube.com/@Mansion_youtube',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Mansion_youtube'
                    )
                )
            ),
            array(
                'title' => 'らくだ不動産公式SNS',
                'text' => '',
                'accounts' => array(
                    array(
                        'url' => 'https://twitter.com/Rakuda_xx',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    ),
                    array(
                        'url' => 'https://youtube.com/@Rakuda_youtube',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Rakuda_youtube'
                    ),
                    array(
                        'url' => 'https://instagram.com/Rakuda_insta',
                        'icon' => get_theme_file_uri('/images/sns/insta-sns2.webp'),
                        'name' => 'Rakuda_insta'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所グループ',
                'text' => '採用チャンネル',
                'accounts' => array(
                    array(
                        'url' => 'https://youtube.com/@sakura-group',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'sakura-group'
                    ),
                    array(
                        'url' => 'https://instagram.com/sakura-group',
                        'icon' => get_theme_file_uri('/images/sns/insta-sns2.webp'),
                        'name' => 'sakura-group'
                    ),
                    array(
                        'url' => 'https://note.com/sakurajimusyo',
                        'icon' => get_theme_file_uri('/images/sns/sns-note.svg'),
                        'name' => 'sakura-group'
                    )
                )
            )
        );
        update_option('page_sns_items', $sns_items);
    }
    
    return $sns_items;
}

// SNS項目設定のコールバック関数
function front_page_sns_items_callback() {
    $sns_items = get_option('front_page_sns_items');
    
    if (!is_array($sns_items) || empty($sns_items)) {
        // デフォルト値の設定
        $sns_items = array(
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'ホームインスペクション',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'sakura_press'
                    ),
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Sakura_youtube'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'マンション管理コンサルティング',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'らくだ不動産公式SNS',
                'text' => '',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所グループ',
                'text' => '採用チャンネル',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => '@sakura-group'
                    )
                )
            )
        );
        update_option('front_page_sns_items', $sns_items);
    }
    
    // 管理画面用のスタイルを追加
    echo '<style>
        .sns-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .sns-accounts {
            margin-top: 10px;
        }
        .sns-account {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px dashed #ddd;
            background: #fff;
        }
        .add-account-btn, .add-item-btn {
            margin-top: 10px;
        }
        .remove-btn {
            color: #bc0b0b;
            cursor: pointer;
            text-decoration: underline;
        }
        .media-preview {
            max-width: 100px;
            max-height: 100px;
            margin-top: 5px;
            border: 1px solid #ddd;
            padding: 3px;
            background: #fff;
        }
        .media-buttons {
            margin-top: 5px;
            display: flex;
            gap: 5px;
        }
    </style>';
    
    // WordPressのメディアアップローダーを読み込み
    wp_enqueue_media();
    
    // SNS項目コンテナ
    echo '<div id="sns-items-container">';
    
    // 各SNS項目のフィールドを表示
    foreach ($sns_items as $index => $item) {
        echo '<div class="sns-item">';
        echo '<h4>SNS項目 #' . ($index + 1) . ' <span class="remove-btn" onclick="removeSnsItem(this)">削除</span></h4>';
        
        // タイトルフィールド
        echo '<div>';
        echo '<label>タイトル：</label>';
        echo '<input type="text" name="front_page_sns_items[' . $index . '][title]" value="' . esc_attr($item['title']) . '" style="width: 100%;" />';
        echo '</div>';
        
        // テキストフィールド
        echo '<div>';
        echo '<label>説明テキスト：</label>';
        echo '<input type="text" name="front_page_sns_items[' . $index . '][text]" value="' . esc_attr($item['text']) . '" style="width: 100%;" />';
        echo '</div>';
        
        // アカウント情報フィールド
        echo '<div class="sns-accounts">';
        echo '<h5>アカウント</h5>';
        
        if (isset($item['accounts']) && is_array($item['accounts'])) {
            foreach ($item['accounts'] as $acct_index => $account) {
                echo '<div class="sns-account">';
                echo '<h6>アカウント #' . ($acct_index + 1) . ' <span class="remove-btn" onclick="removeAccount(this)">削除</span></h6>';
                
                // URLフィールド
                echo '<div>';
                echo '<label>リンクURL：</label>';
                echo '<input type="text" name="front_page_sns_items[' . $index . '][accounts][' . $acct_index . '][url]" value="' . esc_attr($account['url']) . '" style="width: 100%;" />';
                echo '</div>';
                
                // アイコンURLフィールド（メディアアップローダー付き）
                echo '<div>';
                echo '<label>アイコン画像：</label>';
                echo '<input type="text" name="front_page_sns_items[' . $index . '][accounts][' . $acct_index . '][icon]" class="icon-url-input" value="' . esc_attr($account['icon']) . '" style="width: 100%;" />';
                
                // 画像プレビュー
                echo '<div class="media-preview-container">';
                if (!empty($account['icon'])) {
                    echo '<img src="' . esc_url($account['icon']) . '" class="media-preview" />';
                }
                echo '</div>';
                
                // メディア選択ボタン
                echo '<div class="media-buttons">';
                echo '<button type="button" class="button upload-icon-button" data-item="' . $index . '" data-account="' . $acct_index . '">メディアから選択</button>';
                echo '<button type="button" class="button remove-icon-button" data-item="' . $index . '" data-account="' . $acct_index . '">画像を削除</button>';
                echo '</div>';
                echo '</div>';
                
                // アカウント名フィールド
                echo '<div>';
                echo '<label>アカウント名：</label>';
                echo '<input type="text" name="front_page_sns_items[' . $index . '][accounts][' . $acct_index . '][name]" value="' . esc_attr($account['name']) . '" style="width: 100%;" />';
                echo '</div>';
                
                echo '</div>'; // .sns-account
            }
        }
        
        // アカウント追加ボタン
        echo '<button type="button" class="button add-account-btn" onclick="addAccount(this, ' . $index . ')">アカウントを追加</button>';
        
        echo '</div>'; // .sns-accounts
        echo '</div>'; // .sns-item
    }
    
    echo '</div>'; // #sns-items-container
    
    // SNS項目追加ボタン
    echo '<button type="button" class="button button-primary add-item-btn" onclick="addSnsItem()">新しいSNS項目を追加</button>';
    
    // JavaScript for dynamic fields
    ?>
    <script>
        // 新しいアカウントの追加
        function addAccount(button, itemIndex) {
            const accountsContainer = button.parentNode;
            const accountItems = accountsContainer.querySelectorAll('.sns-account');
            const newIndex = accountItems.length;
            
            const newAccount = document.createElement('div');
            newAccount.className = 'sns-account';
            newAccount.innerHTML = `
                <h6>アカウント #${newIndex + 1} <span class="remove-btn" onclick="removeAccount(this)">削除</span></h6>
                <div>
                    <label>リンクURL：</label>
                    <input type="text" name="front_page_sns_items[${itemIndex}][accounts][${newIndex}][url]" value="#" style="width: 100%;" />
                </div>
                <div>
                    <label>アイコン画像：</label>
                    <input type="text" name="front_page_sns_items[${itemIndex}][accounts][${newIndex}][icon]" class="icon-url-input" value="" style="width: 100%;" />
                    <div class="media-preview-container"></div>
                    <div class="media-buttons">
                        <button type="button" class="button upload-icon-button" data-item="${itemIndex}" data-account="${newIndex}">メディアから選択</button>
                        <button type="button" class="button remove-icon-button" data-item="${itemIndex}" data-account="${newIndex}">画像を削除</button>
                    </div>
                </div>
                <div>
                    <label>アカウント名：</label>
                    <input type="text" name="front_page_sns_items[${itemIndex}][accounts][${newIndex}][name]" value="" style="width: 100%;" />
                </div>
            `;
            
            accountsContainer.insertBefore(newAccount, button);
            
            // 新しく追加されたメディアボタンのイベントリスナーを追加
            setupMediaButtons();
        }
        
        // アカウントの削除
        function removeAccount(button) {
            if (confirm('このアカウントを削除してもよろしいですか？')) {
                const accountDiv = button.closest('.sns-account');
                accountDiv.parentNode.removeChild(accountDiv);
                updateAccountNumbers();
            }
        }
        
        // 新しいSNS項目の追加
        function addSnsItem() {
            const container = document.getElementById('sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            const newIndex = items.length;
            
            const newItem = document.createElement('div');
            newItem.className = 'sns-item';
            newItem.innerHTML = `
                <h4>SNS項目 #${newIndex + 1} <span class="remove-btn" onclick="removeSnsItem(this)">削除</span></h4>
                <div>
                    <label>タイトル：</label>
                    <input type="text" name="front_page_sns_items[${newIndex}][title]" value="" style="width: 100%;" />
                </div>
                <div>
                    <label>説明テキスト：</label>
                    <input type="text" name="front_page_sns_items[${newIndex}][text]" value="" style="width: 100%;" />
                </div>
                <div class="sns-accounts">
                    <h5>アカウント</h5>
                    <div class="sns-account">
                        <h6>アカウント #1 <span class="remove-btn" onclick="removeAccount(this)">削除</span></h6>
                        <div>
                            <label>リンクURL：</label>
                            <input type="text" name="front_page_sns_items[${newIndex}][accounts][0][url]" value="#" style="width: 100%;" />
                        </div>
                        <div>
                            <label>アイコン画像：</label>
                            <input type="text" name="front_page_sns_items[${newIndex}][accounts][0][icon]" class="icon-url-input" value="" style="width: 100%;" />
                            <div class="media-preview-container"></div>
                            <div class="media-buttons">
                                <button type="button" class="button upload-icon-button" data-item="${newIndex}" data-account="0">メディアから選択</button>
                                <button type="button" class="button remove-icon-button" data-item="${newIndex}" data-account="0">画像を削除</button>
                            </div>
                        </div>
                        <div>
                            <label>アカウント名：</label>
                            <input type="text" name="front_page_sns_items[${newIndex}][accounts][0][name]" value="" style="width: 100%;" />
                        </div>
                    </div>
                    <button type="button" class="button add-account-btn" onclick="addAccount(this, ${newIndex})">アカウントを追加</button>
                </div>
            `;
            
            container.appendChild(newItem);
            
            // 新しく追加された項目のメディアボタンのイベントリスナーを追加
            setupMediaButtons();
        }
        
        // SNS項目の削除
        function removeSnsItem(button) {
            if (confirm('このSNS項目を削除してもよろしいですか？')) {
                const itemDiv = button.closest('.sns-item');
                itemDiv.parentNode.removeChild(itemDiv);
                updateItemNumbers();
            }
        }
        
        // SNS項目番号の更新
        function updateItemNumbers() {
            const container = document.getElementById('sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            
            items.forEach((item, index) => {
                const titleH4 = item.querySelector('h4');
                titleH4.innerHTML = `SNS項目 #${index + 1} <span class="remove-btn" onclick="removeSnsItem(this)">削除</span>`;
                
                // 入力フィールド名も更新
                updateFieldNames(item, index);
            });
        }
        
        // アカウント番号の更新
        function updateAccountNumbers() {
            const container = document.getElementById('sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            
            items.forEach((item, itemIndex) => {
                const accounts = item.querySelectorAll('.sns-account');
                accounts.forEach((account, acctIndex) => {
                    const titleH6 = account.querySelector('h6');
                    titleH6.innerHTML = `アカウント #${acctIndex + 1} <span class="remove-btn" onclick="removeAccount(this)">削除</span>`;
                    
                    // アカウントフィールド名も更新
                    updateAccountFieldNames(account, itemIndex, acctIndex);
                });
            });
        }
        
        // 項目のフィールド名を更新
        function updateFieldNames(item, itemIndex) {
            const titleInput = item.querySelector('input[name*="[title]"]');
            const textInput = item.querySelector('input[name*="[text]"]');
            
            titleInput.name = `front_page_sns_items[${itemIndex}][title]`;
            textInput.name = `front_page_sns_items[${itemIndex}][text]`;
            
            // アカウントボタンの関数パラメータも更新
            const addBtn = item.querySelector('.add-account-btn');
            addBtn.setAttribute('onclick', `addAccount(this, ${itemIndex})`);
            
            // 各アカウントのフィールド名も更新
            const accounts = item.querySelectorAll('.sns-account');
            accounts.forEach((account, acctIndex) => {
                updateAccountFieldNames(account, itemIndex, acctIndex);
            });
        }
        
        // アカウントのフィールド名を更新
        function updateAccountFieldNames(account, itemIndex, acctIndex) {
            const urlInput = account.querySelector('input[name*="[url]"]');
            const iconInput = account.querySelector('input[name*="[icon]"]');
            const nameInput = account.querySelector('input[name*="[name]"]');
            
            urlInput.name = `front_page_sns_items[${itemIndex}][accounts][${acctIndex}][url]`;
            iconInput.name = `front_page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]`;
            nameInput.name = `front_page_sns_items[${itemIndex}][accounts][${acctIndex}][name]`;
            
            // メディアボタンのdata属性も更新
            const uploadBtn = account.querySelector('.upload-icon-button');
            const removeBtn = account.querySelector('.remove-icon-button');
            
            if (uploadBtn) {
                uploadBtn.dataset.item = itemIndex;
                uploadBtn.dataset.account = acctIndex;
            }
            
            if (removeBtn) {
                removeBtn.dataset.item = itemIndex;
                removeBtn.dataset.account = acctIndex;
            }
        }
        
        // WordPressメディアアップローダーのセットアップ
        function setupMediaButtons() {
            // メディア選択ボタンのイベントリスナー
            document.querySelectorAll('.upload-icon-button').forEach(button => {
                if (!button.hasAttribute('data-initialized')) {
                    button.addEventListener('click', function() {
                        const itemIndex = this.getAttribute('data-item');
                        const acctIndex = this.getAttribute('data-account');
                        const inputField = document.querySelector(`input[name="front_page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]"]`);
                        const previewContainer = this.closest('div').previousElementSibling;
                        
                        // メディアアップローダーの設定
                        const mediaUploader = wp.media({
                            title: 'SNSアイコン画像の選択',
                            button: {
                                text: '画像を選択'
                            },
                            multiple: false
                        });
                        
                        // 選択時の処理
                        mediaUploader.on('select', function() {
                            const attachment = mediaUploader.state().get('selection').first().toJSON();
                            inputField.value = attachment.url;
                            
                            // プレビュー画像を更新
                            previewContainer.innerHTML = `<img src="${attachment.url}" class="media-preview" />`;
                        });
                        
                        // メディアアップローダーを開く
                        mediaUploader.open();
                    });
                    
                    button.setAttribute('data-initialized', 'true');
                }
            });
            
            // 画像削除ボタンのイベントリスナー
            document.querySelectorAll('.remove-icon-button').forEach(button => {
                if (!button.hasAttribute('data-initialized')) {
                    button.addEventListener('click', function() {
                        const itemIndex = this.getAttribute('data-item');
                        const acctIndex = this.getAttribute('data-account');
                        const inputField = document.querySelector(`input[name="front_page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]"]`);
                        const previewContainer = this.closest('div').previousElementSibling;
                        
                        // 入力フィールドとプレビューをクリア
                        inputField.value = '';
                        previewContainer.innerHTML = '';
                    });
                    
                    button.setAttribute('data-initialized', 'true');
                }
            });
        }
        
        // ページ読み込み時にメディアボタンのイベントリスナーを設定
        document.addEventListener('DOMContentLoaded', function() {
            setupMediaButtons();
        });
    </script>
    <?php
}

/**
 * フロントページのSNS項目データを取得
 * 
 * @return array SNS項目のデータ配列
 */
function get_front_page_sns_items() {
    $sns_items = get_option('front_page_sns_items');
    
    if (!is_array($sns_items) || empty($sns_items)) {
        // デフォルト値
        $sns_items = array(
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'ホームインスペクション',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'sakura_press'
                    ),
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Sakura_youtube'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'マンション管理コンサルティング',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'らくだ不動産公式SNS',
                'text' => '',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所グループ',
                'text' => '採用チャンネル',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => '@sakura-group'
                    )
                )
            )
        );
        update_option('front_page_sns_items', $sns_items);
    }
    
    return $sns_items;
}

// サニタイズ関数
function sanitize_sns_items($input) {
    if (!is_array($input)) {
        return array();
    }
    
    $new_input = array();
    
    foreach ($input as $key => $item) {
        if (is_array($item)) {
            $new_input[$key] = array();
            
            // タイトルと説明テキストのサニタイズ
            if (isset($item['title'])) {
                $new_input[$key]['title'] = sanitize_text_field($item['title']);
            }
            
            if (isset($item['text'])) {
                $new_input[$key]['text'] = sanitize_text_field($item['text']);
            }
            
            // アカウント情報のサニタイズ
            if (isset($item['accounts']) && is_array($item['accounts'])) {
                $new_input[$key]['accounts'] = array();
                
                foreach ($item['accounts'] as $acct_key => $account) {
                    if (is_array($account)) {
                        $new_input[$key]['accounts'][$acct_key] = array();
                        
                        if (isset($account['url'])) {
                            $new_input[$key]['accounts'][$acct_key]['url'] = esc_url_raw($account['url']);
                        }
                        
                        if (isset($account['icon'])) {
                            $new_input[$key]['accounts'][$acct_key]['icon'] = esc_url_raw($account['icon']);
                        }
                        
                        if (isset($account['name'])) {
                            $new_input[$key]['accounts'][$acct_key]['name'] = sanitize_text_field($account['name']);
                        }
                    }
                }
            }
        }
    }
    
    return $new_input;
}

/**
 * ニュースピックアップ設定の登録
 */
function register_news_pickup_settings() {
    // ニュースピックアップ設定を登録
    register_setting('news_pickup_settings', 'news_pickup_type', 'sanitize_text_field');
    register_setting('news_pickup_settings', 'news_pickup_category', 'sanitize_text_field');
    register_setting('news_pickup_settings', 'news_pickup_posts', 'sanitize_pickup_posts');
    
    // 設定セクションを追加
    add_settings_section(
        'news_pickup_section',
        'ニュースピックアップ設定',
        'news_pickup_section_callback',
        'news_pickup_settings'
    );
    
    // 設定フィールドを追加
    add_settings_field(
        'news_pickup_type_field',
        'ピックアップタイプ',
        'news_pickup_type_callback',
        'news_pickup_settings',
        'news_pickup_section'
    );
    
    add_settings_field(
        'news_pickup_category_field',
        'カテゴリー選択（パターン2用）',
        'news_pickup_category_callback',
        'news_pickup_settings',
        'news_pickup_section'
    );
    
    add_settings_field(
        'news_pickup_posts_field',
        '任意投稿選択（パターン4用）',
        'news_pickup_posts_callback',
        'news_pickup_settings',
        'news_pickup_section'
    );
}
add_action('admin_init', 'register_news_pickup_settings');

/**
 * ニュースピックアップ設定メニューを追加
 */
function add_news_pickup_menu() {
    add_submenu_page(
        'edit.php', // 親メニュー（投稿メニュー）
        'ニュースピックアップ設定', // ページタイトル
        'ニュースピックアップ', // メニュータイトル
        'manage_options', // 権限
        'news_pickup_settings', // メニュースラッグ
        'news_pickup_settings_page' // 表示関数
    );
}
add_action('admin_menu', 'add_news_pickup_menu');

/**
 * ニュースピックアップ設定ページの表示
 */
function news_pickup_settings_page() {
    ?>
    <div class="wrap">
        <h1>ニュースピックアップ設定</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('news_pickup_settings');
            do_settings_sections('news_pickup_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// セクション説明コールバック
function news_pickup_section_callback() {
    echo '<p>ニュース一覧ページのピックアップ投稿の表示設定を行います。</p>';
}

// ピックアップタイプ選択コールバック
function news_pickup_type_callback() {
    $pickup_type = get_option('news_pickup_type', '1');
    ?>
    <select name="news_pickup_type" id="news_pickup_type" onchange="togglePickupOptions()">
        <option value="1" <?php selected($pickup_type, '1'); ?>>1. 上から3つ</option>
        <option value="2" <?php selected($pickup_type, '2'); ?>>2. カテゴリー別で上から3つ</option>
        <option value="3" <?php selected($pickup_type, '3'); ?>>3. ランダムで3つ</option>
        <option value="4" <?php selected($pickup_type, '4'); ?>>4. 任意の投稿3つ</option>
    </select>
    <p class="description">ピックアップ投稿の表示パターンを選択してください。</p>
    
    <script>
    function togglePickupOptions() {
        const type = document.getElementById('news_pickup_type').value;
        const categoryRow = document.querySelector('tr:has(#news_pickup_category)');
        const postsRow = document.querySelector('tr:has(.news-pickup-posts-container)');
        
        if (categoryRow) {
            categoryRow.style.display = (type === '2') ? 'table-row' : 'none';
        }
        if (postsRow) {
            postsRow.style.display = (type === '4') ? 'table-row' : 'none';
        }
    }
    
    // ページ読み込み時に実行
    document.addEventListener('DOMContentLoaded', togglePickupOptions);
    </script>
    <?php
}

// カテゴリー選択コールバック
function news_pickup_category_callback() {
    $pickup_category = get_option('news_pickup_category', '');
    $categories = get_categories(['hide_empty' => false]);
    ?>
    <select name="news_pickup_category" id="news_pickup_category">
        <option value="">カテゴリーを選択</option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo esc_attr($category->slug); ?>" <?php selected($pickup_category, $category->slug); ?>>
                <?php echo esc_html($category->name); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <p class="description">パターン2で使用するカテゴリーを選択してください。</p>
    <?php
}

// 任意投稿選択コールバック
function news_pickup_posts_callback() {
    $pickup_posts = get_option('news_pickup_posts', []);
    if (!is_array($pickup_posts)) {
        $pickup_posts = [];
    }
    
    // 投稿一覧を取得
    $posts = get_posts([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_key' => '_thumbnail_id'
    ]);
    
    wp_enqueue_media();
    
    echo '<div class="news-pickup-posts-container">';
    echo '<p class="description">パターン4で表示する投稿を3つ選択してください。</p>';
    
    // 3つの選択ボックス
    for ($i = 0; $i < 3; $i++) {
        $selected_post = isset($pickup_posts[$i]) ? $pickup_posts[$i] : '';
        echo '<div style="margin-bottom: 10px;">';
        echo '<label>ピックアップ投稿 ' . ($i + 1) . ':</label><br>';
        echo '<select name="news_pickup_posts[' . $i . ']" style="min-width: 300px;">';
        echo '<option value="">投稿を選択</option>';
        
        foreach ($posts as $post) {
            $selected = selected($selected_post, $post->ID, false);
            echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>';
            echo esc_html($post->post_title) . ' (' . get_the_date('Y/m/d', $post->ID) . ')';
            echo '</option>';
        }
        
        echo '</select>';
        echo '</div>';
    }
    
    echo '</div>';
}

// ピックアップ投稿のサニタイズ関数
function sanitize_pickup_posts($input) {
    if (!is_array($input)) {
        return [];
    }
    
    $sanitized = [];
    foreach ($input as $post_id) {
        if (!empty($post_id) && is_numeric($post_id)) {
            $sanitized[] = absint($post_id);
        }
    }
    
    return $sanitized;
}

/**
 * ピックアップ投稿を取得する関数
 */
function get_news_pickup_posts() {
    $pickup_type = get_option('news_pickup_type', '1');
    $posts = [];
    
    switch ($pickup_type) {
        case '1': // 上から3つ
            $posts = get_posts([
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'meta_key' => '_thumbnail_id'
            ]);
            break;
            
        case '2': // カテゴリー別で上から3つ
            $pickup_category = get_option('news_pickup_category', '');
            if (!empty($pickup_category)) {
                $posts = get_posts([
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'meta_key' => '_thumbnail_id',
                    'category_name' => $pickup_category
                ]);
            }
            break;
            
        case '3': // ランダムで3つ
            $posts = get_posts([
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'meta_key' => '_thumbnail_id',
                'orderby' => 'rand'
            ]);
            break;
            
        case '4': // 任意の投稿3つ
            $pickup_posts = get_option('news_pickup_posts', []);
            if (!empty($pickup_posts)) {
                $posts = get_posts([
                    'post_type' => 'post',
                    'post__in' => $pickup_posts,
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'post__in'
                ]);
            }
            break;
    }
    
    return $posts;
}

/**
 * スタッフピックアップ設定の登録
 */
function register_staff_pickup_settings() {
    // スタッフピックアップ設定を登録
    register_setting('staff_pickup_settings', 'staff_pickup_type', 'sanitize_text_field');
    register_setting('staff_pickup_settings', 'staff_pickup_category', 'sanitize_text_field');
    register_setting('staff_pickup_settings', 'staff_pickup_posts', 'sanitize_staff_pickup_posts');
    
    // 設定セクションを追加
    add_settings_section(
        'staff_pickup_section',
        'スタッフピックアップ設定',
        'staff_pickup_section_callback',
        'staff_pickup_settings'
    );
    
    // 設定フィールドを追加
    add_settings_field(
        'staff_pickup_type_field',
        'ピックアップタイプ',
        'staff_pickup_type_callback',
        'staff_pickup_settings',
        'staff_pickup_section'
    );
    
    add_settings_field(
        'staff_pickup_category_field',
        'カテゴリー選択（パターン2用）',
        'staff_pickup_category_callback',
        'staff_pickup_settings',
        'staff_pickup_section'
    );
    
    add_settings_field(
        'staff_pickup_posts_field',
        '任意スタッフ選択（パターン4用）',
        'staff_pickup_posts_callback',
        'staff_pickup_settings',
        'staff_pickup_section'
    );
}
add_action('admin_init', 'register_staff_pickup_settings');

/**
 * スタッフピックアップ設定メニューを追加
 */
function add_staff_pickup_menu() {
    add_submenu_page(
        'edit.php?post_type=staff', // 親メニュー（スタッフメニュー）
        'スタッフピックアップ設定', // ページタイトル
        'スタッフピックアップ', // メニュータイトル
        'manage_options', // 権限
        'staff_pickup_settings', // メニュースラッグ
        'staff_pickup_settings_page' // 表示関数
    );
}
add_action('admin_menu', 'add_staff_pickup_menu');

/**
 * スタッフピックアップ設定ページの表示
 */
function staff_pickup_settings_page() {
    ?>
    <div class="wrap">
        <h1>スタッフピックアップ設定</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('staff_pickup_settings');
            do_settings_sections('staff_pickup_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// スタッフピックアップセクション説明コールバック
function staff_pickup_section_callback() {
    echo '<p>スタッフ詳細ページのピックアップスタッフの表示設定を行います。</p>';
}

// スタッフピックアップタイプ選択コールバック
function staff_pickup_type_callback() {
    $pickup_type = get_option('staff_pickup_type', '1');
    ?>
    <select name="staff_pickup_type" id="staff_pickup_type" onchange="toggleStaffPickupOptions()">
        <option value="1" <?php selected($pickup_type, '1'); ?>>1. 上から3つ</option>
        <option value="2" <?php selected($pickup_type, '2'); ?>>2. カテゴリー別で上から3つ</option>
        <option value="3" <?php selected($pickup_type, '3'); ?>>3. ランダムで3つ</option>
        <option value="4" <?php selected($pickup_type, '4'); ?>>4. 任意のスタッフ3つ</option>
    </select>
    <p class="description">ピックアップスタッフの表示パターンを選択してください。</p>
    
    <script>
    function toggleStaffPickupOptions() {
        const type = document.getElementById('staff_pickup_type').value;
        const categoryRow = document.querySelector('tr:has(#staff_pickup_category)');
        const postsRow = document.querySelector('tr:has(.staff-pickup-posts-container)');
        
        if (categoryRow) {
            categoryRow.style.display = (type === '2') ? 'table-row' : 'none';
        }
        if (postsRow) {
            postsRow.style.display = (type === '4') ? 'table-row' : 'none';
        }
    }
    
    // ページ読み込み時に実行
    document.addEventListener('DOMContentLoaded', toggleStaffPickupOptions);
    </script>
    <?php
}

// スタッフカテゴリー選択コールバック
function staff_pickup_category_callback() {
    $pickup_category = get_option('staff_pickup_category', '');
    $categories = get_terms([
        'taxonomy' => 'category-staff',
        'hide_empty' => false
    ]);
    ?>
    <select name="staff_pickup_category" id="staff_pickup_category">
        <option value="">カテゴリーを選択</option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo esc_attr($category->slug); ?>" <?php selected($pickup_category, $category->slug); ?>>
                <?php echo esc_html($category->name); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <p class="description">パターン2で使用するスタッフカテゴリーを選択してください。</p>
    <?php
}

// 任意スタッフ選択コールバック
function staff_pickup_posts_callback() {
    $pickup_posts = get_option('staff_pickup_posts', []);
    if (!is_array($pickup_posts)) {
        $pickup_posts = [];
    }
    
    // スタッフ一覧を取得
    $staffs = get_posts([
        'post_type' => 'staff',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_key' => '_thumbnail_id'
    ]);
    
    wp_enqueue_media();
    
    echo '<div class="staff-pickup-posts-container">';
    echo '<p class="description">パターン4で表示するスタッフを3つ選択してください。</p>';
    
    // 3つの選択ボックス
    for ($i = 0; $i < 3; $i++) {
        $selected_post = isset($pickup_posts[$i]) ? $pickup_posts[$i] : '';
        echo '<div style="margin-bottom: 10px;">';
        echo '<label>ピックアップスタッフ ' . ($i + 1) . ':</label><br>';
        echo '<select name="staff_pickup_posts[' . $i . ']" style="min-width: 300px;">';
        echo '<option value="">スタッフを選択</option>';
        
        foreach ($staffs as $staff) {
            $selected = selected($selected_post, $staff->ID, false);
            echo '<option value="' . esc_attr($staff->ID) . '" ' . $selected . '>';
            echo esc_html($staff->post_title);
            
            // スタッフカテゴリーも表示
            $staff_terms = get_the_terms($staff->ID, 'category-staff');
            if ($staff_terms && !is_wp_error($staff_terms)) {
                echo ' (' . esc_html($staff_terms[0]->name) . ')';
            }
            
            echo '</option>';
        }
        
        echo '</select>';
        echo '</div>';
    }
    
    echo '</div>';
}

// スタッフピックアップ投稿のサニタイズ関数
function sanitize_staff_pickup_posts($input) {
    if (!is_array($input)) {
        return [];
    }
    
    $sanitized = [];
    foreach ($input as $post_id) {
        if (!empty($post_id) && is_numeric($post_id)) {
            $sanitized[] = absint($post_id);
        }
    }
    
    return $sanitized;
}

/**
 * ピックアップスタッフを取得する関数
 */
function get_staff_pickup_posts($current_staff_id = null) {
    $pickup_type = get_option('staff_pickup_type', '1');
    $posts = [];
    
    // 除外する投稿IDを設定
    $exclude_ids = [];
    if ($current_staff_id) {
        $exclude_ids[] = $current_staff_id;
    }
    
    switch ($pickup_type) {
        case '1': // 上から3つ
            $posts = get_posts([
                'post_type' => 'staff',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'meta_key' => '_thumbnail_id',
                'post__not_in' => $exclude_ids
            ]);
            break;
            
        case '2': // カテゴリー別で上から3つ
            $pickup_category = get_option('staff_pickup_category', '');
            if (!empty($pickup_category)) {
                $posts = get_posts([
                    'post_type' => 'staff',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'meta_key' => '_thumbnail_id',
                    'post__not_in' => $exclude_ids,
                    'tax_query' => [
                        [
                            'taxonomy' => 'category-staff',
                            'field' => 'slug',
                            'terms' => $pickup_category
                        ]
                    ]
                ]);
            }
            break;
            
        case '3': // ランダムで3つ
            $posts = get_posts([
                'post_type' => 'staff',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'meta_key' => '_thumbnail_id',
                'post__not_in' => $exclude_ids,
                'orderby' => 'rand'
            ]);
            break;
            
        case '4': // 任意のスタッフ3つ
            $pickup_posts = get_option('staff_pickup_posts', []);
            if (!empty($pickup_posts)) {
                // 現在のスタッフIDを除外
                $pickup_posts = array_diff($pickup_posts, $exclude_ids);
                
                if (!empty($pickup_posts)) {
                    $posts = get_posts([
                        'post_type' => 'staff',
                        'post__in' => $pickup_posts,
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'orderby' => 'post__in'
                    ]);
                }
            }
            break;
    }
    
    return $posts;
}


/**
 * プレスリリースピックアップ設定の登録
 */
function register_press_release_pickup_settings() {
    // プレスリリースピックアップ設定を登録
    register_setting('press_release_pickup_settings', 'press_release_pickup_type', 'sanitize_text_field');
    register_setting('press_release_pickup_settings', 'press_release_pickup_category', 'sanitize_text_field');
    register_setting('press_release_pickup_settings', 'press_release_pickup_posts', 'sanitize_press_release_pickup_posts');
    
    // 設定セクションを追加
    add_settings_section(
        'press_release_pickup_section',
        'プレスリリースピックアップ設定',
        'press_release_pickup_section_callback',
        'press_release_pickup_settings'
    );
    
    // 設定フィールドを追加
    add_settings_field(
        'press_release_pickup_type_field',
        'ピックアップタイプ',
        'press_release_pickup_type_callback',
        'press_release_pickup_settings',
        'press_release_pickup_section'
    );
    
    add_settings_field(
        'press_release_pickup_category_field',
        'カテゴリー選択（パターン2用）',
        'press_release_pickup_category_callback',
        'press_release_pickup_settings',
        'press_release_pickup_section'
    );
    
    add_settings_field(
        'press_release_pickup_posts_field',
        '任意投稿選択（パターン4用）',
        'press_release_pickup_posts_callback',
        'press_release_pickup_settings',
        'press_release_pickup_section'
    );
}
add_action('admin_init', 'register_press_release_pickup_settings');

/**
 * プレスリリースピックアップ設定メニューを追加
 */
function add_press_release_pickup_menu() {
    add_submenu_page(
        'edit.php?post_type=press_release', // 親メニュー（プレスリリースメニュー）
        'プレスリリースピックアップ設定', // ページタイトル
        'ピックアップ設定', // メニュータイトル
        'manage_options', // 権限
        'press_release_pickup_settings', // メニュースラッグ
        'press_release_pickup_settings_page' // 表示関数
    );
}
add_action('admin_menu', 'add_press_release_pickup_menu');

/**
 * プレスリリースピックアップ設定ページの表示
 */
function press_release_pickup_settings_page() {
    ?>
    <div class="wrap">
        <h1>プレスリリースピックアップ設定</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('press_release_pickup_settings');
            do_settings_sections('press_release_pickup_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// プレスリリースピックアップセクション説明コールバック
function press_release_pickup_section_callback() {
    echo '<p>プレスリリース一覧ページのピックアップ投稿の表示設定を行います。</p>';
}

// プレスリリースピックアップタイプ選択コールバック
function press_release_pickup_type_callback() {
    $pickup_type = get_option('press_release_pickup_type', '1');
    ?>
    <select name="press_release_pickup_type" id="press_release_pickup_type" onchange="togglePressReleasePickupOptions()">
        <option value="1" <?php selected($pickup_type, '1'); ?>>1. 上から3つ</option>
        <option value="2" <?php selected($pickup_type, '2'); ?>>2. カテゴリー別で上から3つ</option>
        <option value="3" <?php selected($pickup_type, '3'); ?>>3. ランダムで3つ</option>
        <option value="4" <?php selected($pickup_type, '4'); ?>>4. 任意の投稿3つ</option>
    </select>
    <p class="description">ピックアップ投稿の表示パターンを選択してください。</p>
    
    <script>
    function togglePressReleasePickupOptions() {
        const type = document.getElementById('press_release_pickup_type').value;
        const categoryRow = document.querySelector('tr:has(#press_release_pickup_category)');
        const postsRow = document.querySelector('tr:has(.press-release-pickup-posts-container)');
        
        if (categoryRow) {
            categoryRow.style.display = (type === '2') ? 'table-row' : 'none';
        }
        if (postsRow) {
            postsRow.style.display = (type === '4') ? 'table-row' : 'none';
        }
    }
    
    // ページ読み込み時に実行
    document.addEventListener('DOMContentLoaded', togglePressReleasePickupOptions);
    </script>
    <?php
}

// プレスリリースカテゴリー選択コールバック
function press_release_pickup_category_callback() {
    $pickup_category = get_option('press_release_pickup_category', '');
    $categories = get_terms([
        'taxonomy' => 'press_release_category',
        'hide_empty' => false
    ]);
    ?>
    <select name="press_release_pickup_category" id="press_release_pickup_category">
        <option value="">カテゴリーを選択</option>
        <?php if (!is_wp_error($categories) && !empty($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo esc_attr($category->slug); ?>" <?php selected($pickup_category, $category->slug); ?>>
                    <?php echo esc_html($category->name); ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <p class="description">パターン2で使用するプレスリリースカテゴリーを選択してください。</p>
    <?php
}

// 任意プレスリリース選択コールバック
function press_release_pickup_posts_callback() {
    $pickup_posts = get_option('press_release_pickup_posts', []);
    if (!is_array($pickup_posts)) {
        $pickup_posts = [];
    }
    
    // プレスリリース一覧を取得
    $press_releases = get_posts([
        'post_type' => 'press_release',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ]);
    
    wp_enqueue_media();
    
    echo '<div class="press-release-pickup-posts-container">';
    echo '<p class="description">パターン4で表示するプレスリリースを3つ選択してください。</p>';
    
    // 3つの選択ボックス
    for ($i = 0; $i < 3; $i++) {
        $selected_post = isset($pickup_posts[$i]) ? $pickup_posts[$i] : '';
        echo '<div style="margin-bottom: 10px;">';
        echo '<label>ピックアップ投稿 ' . ($i + 1) . ':</label><br>';
        echo '<select name="press_release_pickup_posts[' . $i . ']" style="min-width: 300px;">';
        echo '<option value="">プレスリリースを選択</option>';
        
        foreach ($press_releases as $press_release) {
            $selected = selected($selected_post, $press_release->ID, false);
            echo '<option value="' . esc_attr($press_release->ID) . '" ' . $selected . '>';
            echo esc_html($press_release->post_title) . ' (' . get_the_date('Y/m/d', $press_release->ID) . ')';
            echo '</option>';
        }
        
        echo '</select>';
        echo '</div>';
    }
    
    echo '</div>';
}

// プレスリリースピックアップ投稿のサニタイズ関数
function sanitize_press_release_pickup_posts($input) {
    if (!is_array($input)) {
        return [];
    }
    
    $sanitized = [];
    foreach ($input as $post_id) {
        if (!empty($post_id) && is_numeric($post_id)) {
            $sanitized[] = absint($post_id);
        }
    }
    
    return $sanitized;
}

/**
 * プレスリリースピックアップ投稿を取得する関数
 */
function get_press_release_pickup_posts() {
    $pickup_type = get_option('press_release_pickup_type', '1');
    $posts = [];
    
    switch ($pickup_type) {
        case '1': // 上から3つ
            $posts = get_posts([
                'post_type' => 'press_release',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            ]);
            break;
            
        case '2': // カテゴリー別で上から3つ
            $pickup_category = get_option('press_release_pickup_category', '');
            if (!empty($pickup_category)) {
                $posts = get_posts([
                    'post_type' => 'press_release',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => [
                        [
                            'taxonomy' => 'press_release_category',
                            'field' => 'slug',
                            'terms' => $pickup_category
                        ]
                    ]
                ]);
            }
            break;
            
        case '3': // ランダムで3つ
            $posts = get_posts([
                'post_type' => 'press_release',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'orderby' => 'rand'
            ]);
            break;
            
        case '4': // 任意の投稿3つ
            $pickup_posts = get_option('press_release_pickup_posts', []);
            if (!empty($pickup_posts)) {
                $posts = get_posts([
                    'post_type' => 'press_release',
                    'post__in' => $pickup_posts,
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'post__in'
                ]);
            }
            break;
    }
    
    return $posts;
}

/**
 * 下部ナビゲーションバナー設定の登録
 */
function register_bottom_nav_banner_settings() {
    // バナー設定を登録
    register_setting('bottom_nav_banner_settings', 'bottom_nav_banner_enabled', 'sanitize_boolean');
    register_setting('bottom_nav_banner_settings', 'bottom_nav_banner_url', 'esc_url_raw');
    register_setting('bottom_nav_banner_settings', 'bottom_nav_banner_image', 'absint');
    register_setting('bottom_nav_banner_settings', 'bottom_nav_banner_target', 'sanitize_text_field');
    
    // 設定セクションを追加
    add_settings_section(
        'bottom_nav_banner_section',
        '下部ナビゲーションバナー設定',
        'bottom_nav_banner_section_callback',
        'bottom_nav_banner_settings'
    );
    
    // 設定フィールドを追加
    add_settings_field(
        'bottom_nav_banner_enabled_field',
        'バナー表示',
        'bottom_nav_banner_enabled_callback',
        'bottom_nav_banner_settings',
        'bottom_nav_banner_section'
    );
    

    
    add_settings_field(
        'bottom_nav_banner_url_field',
        'リンクURL',
        'bottom_nav_banner_url_callback',
        'bottom_nav_banner_settings',
        'bottom_nav_banner_section'
    );
    
    add_settings_field(
        'bottom_nav_banner_target_field',
        'リンクターゲット',
        'bottom_nav_banner_target_callback',
        'bottom_nav_banner_settings',
        'bottom_nav_banner_section'
    );
    
    add_settings_field(
        'bottom_nav_banner_image_field',
        'バナー画像',
        'bottom_nav_banner_image_callback',
        'bottom_nav_banner_settings',
        'bottom_nav_banner_section'
    );
}
add_action('admin_init', 'register_bottom_nav_banner_settings');

/**
 * 下部ナビゲーションバナー設定メニューを追加（SNS設定のサブメニューとして）
 */
function add_bottom_nav_banner_menu() {
    add_submenu_page(
        'sns_settings', // 親メニューのスラッグ（SNS設定）
        '下部ナビゲーションバナー設定', // ページタイトル
        'バナー設定', // メニュータイトル
        'manage_options', // 権限
        'bottom_nav_banner_settings', // メニュースラッグ
        'bottom_nav_banner_settings_page' // 表示関数
    );
}
add_action('admin_menu', 'add_bottom_nav_banner_menu');

/**
 * 下部ナビゲーションバナー設定ページの表示
 */
function bottom_nav_banner_settings_page() {
    ?>
    <div class="wrap">
        <h1>下部ナビゲーションバナー設定</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('bottom_nav_banner_settings');
            do_settings_sections('bottom_nav_banner_settings');
            submit_button();
            ?>
        </form>
    </div>
    
    <style>
        .banner-preview {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9;
            max-width: 300px;
        }
        .banner-preview img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 5px;
        }
        .banner-preview-text {
            font-size: 12px;
            color: #666;
        }
        .media-buttons {
            margin-top: 5px;
            display: flex;
            gap: 5px;
        }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        // メディアアップローダーの設定
        var mediaUploader;
        
        // 画像選択ボタンのクリックイベント
        $('#upload-banner-image').on('click', function(e) {
            e.preventDefault();
            
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            
            mediaUploader = wp.media({
                title: 'バナー画像を選択',
                button: {
                    text: '選択した画像を使用'
                },
                multiple: false
            });
            
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                
                $('#bottom_nav_banner_image').val(attachment.id);
                updateBannerPreview();
            });
            
            mediaUploader.open();
        });
        
        // 画像削除ボタンのクリックイベント
        $('#remove-banner-image').on('click', function(e) {
            e.preventDefault();
            
            $('#bottom_nav_banner_image').val('');
            updateBannerPreview();
        });
        
        // プレビュー更新関数
        function updateBannerPreview() {
            var imageId = $('#bottom_nav_banner_image').val();
            var url = $('#bottom_nav_banner_url').val() || '#';
            var enabled = $('#bottom_nav_banner_enabled').is(':checked');
            
            if (imageId) {
                // 画像IDから画像URLを取得するためのAJAX呼び出し
                $.post(ajaxurl, {
                    action: 'get_attachment_url',
                    attachment_id: imageId
                }, function(response) {
                    if (response.success) {
                        var previewHtml = '<div class="banner-preview">';
                        previewHtml += '<img src="' + response.data.url + '" alt="バナー">';
                        previewHtml += '<div class="banner-preview-text">';
                        previewHtml += '<strong>リンク:</strong> ' + url + '<br>';
                        previewHtml += '<strong>表示:</strong> ' + (enabled ? '有効' : '無効');
                        previewHtml += '</div></div>';
                        
                        $('#banner-preview-container').html(previewHtml);
                    }
                });
            } else {
                $('#banner-preview-container').html('<div class="banner-preview"><p>画像が選択されていません</p></div>');
            }
        }
        
        // 設定変更時にプレビューを更新
        $('#bottom_nav_banner_url, #bottom_nav_banner_enabled').on('change keyup', function() {
            updateBannerPreview();
        });
        
        // 初期プレビュー表示
        updateBannerPreview();
    });
    </script>
    <?php
}

// バナー設定セクション説明コールバック
function bottom_nav_banner_section_callback() {
    echo '<p>下部ナビゲーションバーに表示するバナーの設定を行います。</p>';
    echo '<p><strong>推奨画像サイズ：</strong>幅200px以下、高さ60px以下</p>';
    echo '<p style="color: #d54e21;"><strong>注意：</strong>推奨サイズを超える画像はレイアウトが崩れる可能性があります。</p>';
}

// バナー表示有効/無効コールバック
function bottom_nav_banner_enabled_callback() {
    $enabled = get_option('bottom_nav_banner_enabled', false);
    ?>
    <label for="bottom_nav_banner_enabled">
        <input type="checkbox" id="bottom_nav_banner_enabled" name="bottom_nav_banner_enabled" value="1" <?php checked($enabled, true); ?>>
        バナーを表示する
    </label>
    <p class="description">チェックを入れるとバナーが下部ナビゲーションに表示されます。</p>
    <?php
}



// バナーURLコールバック
function bottom_nav_banner_url_callback() {
    $url = get_option('bottom_nav_banner_url', '');
    ?>
    <input type="url" id="bottom_nav_banner_url" name="bottom_nav_banner_url" value="<?php echo esc_url($url); ?>" style="width: 400px;" placeholder="https://...">
    <p class="description">バナーをクリックした際のリンク先URLを入力してください。</p>
    <?php
}

// バナーターゲットコールバック
function bottom_nav_banner_target_callback() {
    $target = get_option('bottom_nav_banner_target', '_self');
    ?>
    <select id="bottom_nav_banner_target" name="bottom_nav_banner_target">
        <option value="_self" <?php selected($target, '_self'); ?>>同じウィンドウで開く</option>
        <option value="_blank" <?php selected($target, '_blank'); ?>>新しいウィンドウで開く</option>
    </select>
    <p class="description">リンクを開く方法を選択してください。</p>
    <?php
}

// バナー画像コールバック
function bottom_nav_banner_image_callback() {
    $image_id = get_option('bottom_nav_banner_image', '');
    
    // WordPressのメディアアップローダーを読み込み
    wp_enqueue_media();
    ?>
    <input type="hidden" id="bottom_nav_banner_image" name="bottom_nav_banner_image" value="<?php echo esc_attr($image_id); ?>">
    
    <div class="media-buttons">
        <button type="button" id="upload-banner-image" class="button">画像を選択</button>
        <button type="button" id="remove-banner-image" class="button">画像を削除</button>
    </div>
    
    <div id="banner-preview-container"></div>
    
    <p class="description">バナーに使用する画像を選択してください。推奨サイズ: 幅200px以下</p>
    <?php
}

// 画像URL取得用のAJAXハンドラー
function get_attachment_url_ajax() {
    if (!current_user_can('manage_options')) {
        wp_die();
    }
    
    $attachment_id = absint($_POST['attachment_id']);
    $image_url = wp_get_attachment_image_url($attachment_id, 'medium');
    
    if ($image_url) {
        wp_send_json_success(['url' => $image_url]);
    } else {
        wp_send_json_error();
    }
}
add_action('wp_ajax_get_attachment_url', 'get_attachment_url_ajax');

// Boolean値のサニタイズ関数
function sanitize_boolean($input) {
    return !empty($input);
}

/**
 * 下部ナビゲーションバナー設定を取得する関数
 */
function get_bottom_nav_banner_settings() {
    $image_id = get_option('bottom_nav_banner_image', '');
    $image_url = '';
    
    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'medium');
    }
    
    return array(
        'enabled' => get_option('bottom_nav_banner_enabled', false),
        'url' => get_option('bottom_nav_banner_url', ''),
        'target' => get_option('bottom_nav_banner_target', '_self'),
        'image_id' => $image_id,
        'image_url' => $image_url
    );
}

// 採用情報固定ページのカスタムフィールド
function add_recruit_positions_meta_box($post_type, $post) {
    if ($post_type === 'page' && $post && $post->post_name === 'recruit') {
        add_meta_box(
            'recruit_positions_meta_box',
            '採用職種管理',
            'recruit_positions_meta_box_callback',
            'page',
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'add_recruit_positions_meta_box', 10, 2);

function recruit_positions_meta_box_callback($post) {
    wp_nonce_field('recruit_positions_meta_box', 'recruit_positions_meta_box_nonce');
    
    // メタデータから現在の職種情報を取得
    $sakura_fulltime = get_post_meta($post->ID, '_recruit_positions_sakura_fulltime', true) ?: array();
    $sakura_contract = get_post_meta($post->ID, '_recruit_positions_sakura_contract', true) ?: array();
    $rakuda_fulltime = get_post_meta($post->ID, '_recruit_positions_rakuda_fulltime', true) ?: array();
    $rakuda_contract = get_post_meta($post->ID, '_recruit_positions_rakuda_contract', true) ?: array();
    ?>
    
    <div class="recruit-positions-admin">
        <style>
        .recruit-positions-admin .section-title {
            font-size: 18px;
            font-weight: bold;
            margin: 30px 0 15px 0;
            padding: 10px 0;
            border-bottom: 2px solid #0073aa;
        }
        .recruit-positions-admin .company-section {
            background: #f9f9f9;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }
        .recruit-positions-admin .category-section {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .recruit-positions-admin .position-item {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }
        .recruit-positions-admin .position-title {
            flex: 1;
        }
        .recruit-positions-admin .position-url {
            flex: 1;
        }
        .recruit-positions-admin .remove-position {
            background: #dc3232;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .recruit-positions-admin .add-position {
            background: #0073aa;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }
        </style>
        
        <!-- さくら事務所セクション -->
        <div class="company-section">
            <h2 class="section-title">さくら事務所の採用</h2>
            
            <div class="category-section">
                <h3>正社員募集</h3>
                <div id="sakura-fulltime-positions">
                    <?php
                    if (!empty($sakura_fulltime)) {
                        foreach ($sakura_fulltime as $index => $position) {
                            echo '<div class="position-item">';
                            echo '<input type="text" name="recruit_positions_sakura_fulltime[' . $index . '][title]" value="' . esc_attr($position['title']) . '" placeholder="職種名" class="position-title">';
                            echo '<input type="url" name="recruit_positions_sakura_fulltime[' . $index . '][url]" value="' . esc_attr($position['url']) . '" placeholder="リンクURL" class="position-url">';
                            echo '<button type="button" class="remove-position" onclick="this.parentElement.remove()">削除</button>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <button type="button" class="add-position" onclick="addPosition('sakura-fulltime')">職種を追加</button>
            </div>
            
            <div class="category-section">
                <h3>複業・業務委託募集</h3>
                <div id="sakura-contract-positions">
                    <?php
                    if (!empty($sakura_contract)) {
                        foreach ($sakura_contract as $index => $position) {
                            echo '<div class="position-item">';
                            echo '<input type="text" name="recruit_positions_sakura_contract[' . $index . '][title]" value="' . esc_attr($position['title']) . '" placeholder="職種名" class="position-title">';
                            echo '<input type="url" name="recruit_positions_sakura_contract[' . $index . '][url]" value="' . esc_attr($position['url']) . '" placeholder="リンクURL" class="position-url">';
                            echo '<button type="button" class="remove-position" onclick="this.parentElement.remove()">削除</button>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <button type="button" class="add-position" onclick="addPosition('sakura-contract')">職種を追加</button>
            </div>
        </div>
        
        <!-- らくだ不動産セクション -->
        <div class="company-section">
            <h2 class="section-title">らくだ不動産の採用</h2>
            
            <div class="category-section">
                <h3>正社員募集</h3>
                <div id="rakuda-fulltime-positions">
                    <?php
                    if (!empty($rakuda_fulltime)) {
                        foreach ($rakuda_fulltime as $index => $position) {
                            echo '<div class="position-item">';
                            echo '<input type="text" name="recruit_positions_rakuda_fulltime[' . $index . '][title]" value="' . esc_attr($position['title']) . '" placeholder="職種名" class="position-title">';
                            echo '<input type="url" name="recruit_positions_rakuda_fulltime[' . $index . '][url]" value="' . esc_attr($position['url']) . '" placeholder="リンクURL" class="position-url">';
                            echo '<button type="button" class="remove-position" onclick="this.parentElement.remove()">削除</button>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <button type="button" class="add-position" onclick="addPosition('rakuda-fulltime')">職種を追加</button>
            </div>
            
            <div class="category-section">
                <h3>複業・業務委託募集</h3>
                <div id="rakuda-contract-positions">
                    <?php
                    if (!empty($rakuda_contract)) {
                        foreach ($rakuda_contract as $index => $position) {
                            echo '<div class="position-item">';
                            echo '<input type="text" name="recruit_positions_rakuda_contract[' . $index . '][title]" value="' . esc_attr($position['title']) . '" placeholder="職種名" class="position-title">';
                            echo '<input type="url" name="recruit_positions_rakuda_contract[' . $index . '][url]" value="' . esc_attr($position['url']) . '" placeholder="リンクURL" class="position-url">';
                            echo '<button type="button" class="remove-position" onclick="this.parentElement.remove()">削除</button>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <button type="button" class="add-position" onclick="addPosition('rakuda-contract')">職種を追加</button>
            </div>
        </div>
    </div>
    
    <script>
    function addPosition(category) {
        const container = document.getElementById(category + '-positions');
        const existingItems = container.querySelectorAll('.position-item');
        const index = existingItems.length;
        
        const fieldPrefix = 'recruit_positions_' + category.replace('-', '_');
        
        const positionItem = document.createElement('div');
        positionItem.className = 'position-item';
        positionItem.innerHTML = `
            <input type="text" name="${fieldPrefix}[${index}][title]" value="" placeholder="職種名" class="position-title">
            <input type="url" name="${fieldPrefix}[${index}][url]" value="" placeholder="リンクURL" class="position-url">
            <button type="button" class="remove-position" onclick="this.parentElement.remove()">削除</button>
        `;
        
        container.appendChild(positionItem);
    }
    </script>
    <?php
}

// 採用職種メタデータを保存する関数
function save_recruit_positions_meta($post_id) {
    // nonce確認
    if (!isset($_POST['recruit_positions_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['recruit_positions_meta_box_nonce'], 'recruit_positions_meta_box')) {
        return;
    }

    // 自動保存の場合は実行しない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // 権限確認
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // 採用情報ページかどうか確認
    $post = get_post($post_id);
    if (!$post || $post->post_name !== 'recruit' || $post->post_type !== 'page') {
        return;
    }

    // メタデータを保存
    $fields = array(
        'recruit_positions_sakura_fulltime',
        'recruit_positions_sakura_contract', 
        'recruit_positions_rakuda_fulltime',
        'recruit_positions_rakuda_contract'
    );

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $sanitized_data = sanitize_recruit_positions($_POST[$field]);
            update_post_meta($post_id, '_' . $field, $sanitized_data);
        } else {
            update_post_meta($post_id, '_' . $field, array());
        }
    }
}
add_action('save_post', 'save_recruit_positions_meta');

function sanitize_recruit_positions($input) {
    if (!is_array($input)) {
        return array();
    }
    
    $sanitized = array();
    foreach ($input as $position) {
        if (isset($position['title']) && isset($position['url']) && 
            !empty(trim($position['title'])) && !empty(trim($position['url']))) {
            $sanitized[] = array(
                'title' => sanitize_text_field($position['title']),
                'url' => esc_url_raw($position['url'])
            );
        }
    }
    
    return $sanitized;
}

// 採用職種データを取得する関数（ページメタデータから）
function get_recruit_positions($company, $type) {
    // 採用情報ページを取得
    $recruit_page = get_page_by_path('recruit');
    if (!$recruit_page) {
        return array();
    }
    
    $meta_key = '_recruit_positions_' . $company . '_' . $type;
    return get_post_meta($recruit_page->ID, $meta_key, true) ?: array();
}

/**
 * 採用ページSNS設定を登録（統合されたため無効化）
 * 注意: この関数は register_sns_settings() に統合されました
 */
/*
function register_recruit_page_sns_settings() {
    // この関数は register_sns_settings() に統合されました
}
add_action('admin_init', 'register_recruit_page_sns_settings');
*/

/**
 * 採用ページのSNS項目データを取得
 * 
 * @return array SNS項目のデータ配列
 */
function get_recruit_page_sns_items() {
    $sns_items = get_option('recruit_page_sns_items');
    
    if (!is_array($sns_items) || empty($sns_items)) {
        // デフォルト値
        $sns_items = array(
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'ホームインスペクション',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'sakura_press'
                    ),
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Sakura_youtube'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'マンション管理コンサルティング',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'らくだ不動産公式SNS',
                'text' => '',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所グループ',
                'text' => '採用チャンネル',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => '@sakura-group'
                    )
                )
            )
        );
        update_option('recruit_page_sns_items', $sns_items);
    }
    
    return $sns_items;
}

/**
 * 採用ページSNS設定セクションの説明コールバック
 */
function recruit_page_sns_section_callback() {
    echo '<p>採用ページに表示するSNS情報を設定してください。</p>';
}

/**
 * 採用ページSNS項目設定フィールドのコールバック
 */
function recruit_page_sns_items_callback() {
    $sns_items = get_option('recruit_page_sns_items');
    
    if (!is_array($sns_items) || empty($sns_items)) {
        // デフォルト値の設定
        $sns_items = array(
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'ホームインスペクション',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'sakura_press'
                    ),
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => 'Sakura_youtube'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所公式SNS',
                'text' => 'マンション管理コンサルティング',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'らくだ不動産公式SNS',
                'text' => '',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/x-sns.webp'),
                        'name' => 'Rakuda_xx'
                    )
                )
            ),
            array(
                'title' => 'さくら事務所グループ',
                'text' => '採用チャンネル',
                'accounts' => array(
                    array(
                        'url' => '#',
                        'icon' => get_theme_file_uri('/images/sns/youtube-sns.webp'),
                        'name' => '@sakura-group'
                    )
                )
            )
        );
        update_option('recruit_page_sns_items', $sns_items);
    }
    
    // 管理画面用のスタイルを追加
    echo '<style>
        .sns-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .sns-accounts {
            margin-top: 10px;
        }
        .sns-account {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px dashed #ddd;
            background: #fff;
        }
        .add-account-btn, .add-item-btn {
            margin-top: 10px;
        }
        .remove-btn {
            color: #bc0b0b;
            cursor: pointer;
            text-decoration: underline;
        }
        .media-preview {
            max-width: 100px;
            max-height: 100px;
            margin-top: 5px;
            border: 1px solid #ddd;
            padding: 3px;
            background: #fff;
        }
        .media-buttons {
            margin-top: 5px;
            display: flex;
            gap: 5px;
        }
    </style>';
    
    // WordPressのメディアアップローダーを読み込み
    wp_enqueue_media();
    
    // SNS項目コンテナ
    echo '<div id="recruit-sns-items-container">';
    
    // 各SNS項目のフィールドを表示
    foreach ($sns_items as $index => $item) {
        echo '<div class="sns-item">';
        echo '<h4>SNS項目 #' . ($index + 1) . ' <span class="remove-btn" onclick="removeRecruitSnsItem(this)">削除</span></h4>';
        
        // タイトルフィールド
        echo '<div>';
        echo '<label>タイトル：</label>';
        echo '<input type="text" name="recruit_page_sns_items[' . $index . '][title]" value="' . esc_attr($item['title']) . '" style="width: 100%;" />';
        echo '</div>';
        
        // テキストフィールド
        echo '<div>';
        echo '<label>説明テキスト：</label>';
        echo '<input type="text" name="recruit_page_sns_items[' . $index . '][text]" value="' . esc_attr($item['text']) . '" style="width: 100%;" />';
        echo '</div>';
        
        // アカウント情報フィールド
        echo '<div class="sns-accounts">';
        echo '<h5>アカウント</h5>';
        
        if (isset($item['accounts']) && is_array($item['accounts'])) {
            foreach ($item['accounts'] as $acct_index => $account) {
                echo '<div class="sns-account">';
                echo '<h6>アカウント #' . ($acct_index + 1) . ' <span class="remove-btn" onclick="removeRecruitAccount(this)">削除</span></h6>';
                
                // URLフィールド
                echo '<div>';
                echo '<label>リンクURL：</label>';
                echo '<input type="text" name="recruit_page_sns_items[' . $index . '][accounts][' . $acct_index . '][url]" value="' . esc_attr($account['url']) . '" style="width: 100%;" />';
                echo '</div>';
                
                // アイコンURLフィールド（メディアアップローダー付き）
                echo '<div>';
                echo '<label>アイコン画像：</label>';
                echo '<input type="text" name="recruit_page_sns_items[' . $index . '][accounts][' . $acct_index . '][icon]" class="icon-url-input" value="' . esc_attr($account['icon']) . '" style="width: 100%;" />';
                
                // 画像プレビュー
                echo '<div class="media-preview-container">';
                if (!empty($account['icon'])) {
                    echo '<img src="' . esc_url($account['icon']) . '" class="media-preview" />';
                }
                echo '</div>';
                
                // メディア選択ボタン
                echo '<div class="media-buttons">';
                echo '<button type="button" class="button upload-recruit-icon-button" data-item="' . $index . '" data-account="' . $acct_index . '">メディアから選択</button>';
                echo '<button type="button" class="button remove-recruit-icon-button" data-item="' . $index . '" data-account="' . $acct_index . '">画像を削除</button>';
                echo '</div>';
                echo '</div>';
                
                // アカウント名フィールド
                echo '<div>';
                echo '<label>アカウント名：</label>';
                echo '<input type="text" name="recruit_page_sns_items[' . $index . '][accounts][' . $acct_index . '][name]" value="' . esc_attr($account['name']) . '" style="width: 100%;" />';
                echo '</div>';
                
                echo '</div>'; // .sns-account
            }
        }
        
        // アカウント追加ボタン
        echo '<button type="button" class="button add-account-btn" onclick="addRecruitAccount(this, ' . $index . ')">アカウントを追加</button>';
        
        echo '</div>'; // .sns-accounts
        echo '</div>'; // .sns-item
    }
    
    echo '</div>'; // #recruit-sns-items-container
    
    // SNS項目追加ボタン
    echo '<button type="button" class="button button-primary add-item-btn" onclick="addRecruitSnsItem()">新しいSNS項目を追加</button>';
    
    // JavaScript for dynamic fields
    ?>
    <script>
        // 新しいアカウントの追加
        function addRecruitAccount(button, itemIndex) {
            const accountsContainer = button.parentNode;
            const accountItems = accountsContainer.querySelectorAll('.sns-account');
            const newIndex = accountItems.length;
            
            const newAccount = document.createElement('div');
            newAccount.className = 'sns-account';
            newAccount.innerHTML = `
                <h6>アカウント #${newIndex + 1} <span class="remove-btn" onclick="removeRecruitAccount(this)">削除</span></h6>
                <div>
                    <label>リンクURL：</label>
                    <input type="text" name="recruit_page_sns_items[${itemIndex}][accounts][${newIndex}][url]" value="#" style="width: 100%;" />
                </div>
                <div>
                    <label>アイコン画像：</label>
                    <input type="text" name="recruit_page_sns_items[${itemIndex}][accounts][${newIndex}][icon]" class="icon-url-input" value="" style="width: 100%;" />
                    <div class="media-preview-container"></div>
                    <div class="media-buttons">
                        <button type="button" class="button upload-recruit-icon-button" data-item="${itemIndex}" data-account="${newIndex}">メディアから選択</button>
                        <button type="button" class="button remove-recruit-icon-button" data-item="${itemIndex}" data-account="${newIndex}">画像を削除</button>
                    </div>
                </div>
                <div>
                    <label>アカウント名：</label>
                    <input type="text" name="recruit_page_sns_items[${itemIndex}][accounts][${newIndex}][name]" value="" style="width: 100%;" />
                </div>
            `;
            
            accountsContainer.insertBefore(newAccount, button);
            
            // 新しく追加されたメディアボタンのイベントリスナーを追加
            setupRecruitMediaButtons();
        }
        
        // アカウントの削除
        function removeRecruitAccount(button) {
            if (confirm('このアカウントを削除してもよろしいですか？')) {
                const accountDiv = button.closest('.sns-account');
                accountDiv.parentNode.removeChild(accountDiv);
                updateRecruitAccountNumbers();
            }
        }
        
        // 新しいSNS項目の追加
        function addRecruitSnsItem() {
            const container = document.getElementById('recruit-sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            const newIndex = items.length;
            
            const newItem = document.createElement('div');
            newItem.className = 'sns-item';
            newItem.innerHTML = `
                <h4>SNS項目 #${newIndex + 1} <span class="remove-btn" onclick="removeRecruitSnsItem(this)">削除</span></h4>
                <div>
                    <label>タイトル：</label>
                    <input type="text" name="recruit_page_sns_items[${newIndex}][title]" value="" style="width: 100%;" />
                </div>
                <div>
                    <label>説明テキスト：</label>
                    <input type="text" name="recruit_page_sns_items[${newIndex}][text]" value="" style="width: 100%;" />
                </div>
                <div class="sns-accounts">
                    <h5>アカウント</h5>
                    <div class="sns-account">
                        <h6>アカウント #1 <span class="remove-btn" onclick="removeRecruitAccount(this)">削除</span></h6>
                        <div>
                            <label>リンクURL：</label>
                            <input type="text" name="recruit_page_sns_items[${newIndex}][accounts][0][url]" value="#" style="width: 100%;" />
                        </div>
                        <div>
                            <label>アイコン画像：</label>
                            <input type="text" name="recruit_page_sns_items[${newIndex}][accounts][0][icon]" class="icon-url-input" value="" style="width: 100%;" />
                            <div class="media-preview-container"></div>
                            <div class="media-buttons">
                                <button type="button" class="button upload-recruit-icon-button" data-item="${newIndex}" data-account="0">メディアから選択</button>
                                <button type="button" class="button remove-recruit-icon-button" data-item="${newIndex}" data-account="0">画像を削除</button>
                            </div>
                        </div>
                        <div>
                            <label>アカウント名：</label>
                            <input type="text" name="recruit_page_sns_items[${newIndex}][accounts][0][name]" value="" style="width: 100%;" />
                        </div>
                    </div>
                    <button type="button" class="button add-account-btn" onclick="addRecruitAccount(this, ${newIndex})">アカウントを追加</button>
                </div>
            `;
            
            container.appendChild(newItem);
            
            // 新しく追加された項目のメディアボタンのイベントリスナーを追加
            setupRecruitMediaButtons();
        }
        
        // SNS項目の削除
        function removeRecruitSnsItem(button) {
            if (confirm('このSNS項目を削除してもよろしいですか？')) {
                const itemDiv = button.closest('.sns-item');
                itemDiv.parentNode.removeChild(itemDiv);
                updateRecruitItemNumbers();
            }
        }
        
        // SNS項目番号の更新
        function updateRecruitItemNumbers() {
            const container = document.getElementById('recruit-sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            
            items.forEach((item, index) => {
                const titleH4 = item.querySelector('h4');
                titleH4.innerHTML = `SNS項目 #${index + 1} <span class="remove-btn" onclick="removeRecruitSnsItem(this)">削除</span>`;
                
                // 入力フィールド名も更新
                updateRecruitFieldNames(item, index);
            });
        }
        
        // アカウント番号の更新
        function updateRecruitAccountNumbers() {
            const container = document.getElementById('recruit-sns-items-container');
            const items = container.querySelectorAll('.sns-item');
            
            items.forEach((item, itemIndex) => {
                const accounts = item.querySelectorAll('.sns-account');
                accounts.forEach((account, acctIndex) => {
                    const titleH6 = account.querySelector('h6');
                    titleH6.innerHTML = `アカウント #${acctIndex + 1} <span class="remove-btn" onclick="removeRecruitAccount(this)">削除</span>`;
                    
                    // アカウントフィールド名も更新
                    updateRecruitAccountFieldNames(account, itemIndex, acctIndex);
                });
            });
        }
        
        // 項目のフィールド名を更新
        function updateRecruitFieldNames(item, itemIndex) {
            const titleInput = item.querySelector('input[name*="[title]"]');
            const textInput = item.querySelector('input[name*="[text]"]');
            
            titleInput.name = `recruit_page_sns_items[${itemIndex}][title]`;
            textInput.name = `recruit_page_sns_items[${itemIndex}][text]`;
            
            // アカウントボタンの関数パラメータも更新
            const addBtn = item.querySelector('.add-account-btn');
            addBtn.setAttribute('onclick', `addRecruitAccount(this, ${itemIndex})`);
            
            // 各アカウントのフィールド名も更新
            const accounts = item.querySelectorAll('.sns-account');
            accounts.forEach((account, acctIndex) => {
                updateRecruitAccountFieldNames(account, itemIndex, acctIndex);
            });
        }
        
        // アカウントのフィールド名を更新
        function updateRecruitAccountFieldNames(account, itemIndex, acctIndex) {
            const urlInput = account.querySelector('input[name*="[url]"]');
            const iconInput = account.querySelector('input[name*="[icon]"]');
            const nameInput = account.querySelector('input[name*="[name]"]');
            
            urlInput.name = `recruit_page_sns_items[${itemIndex}][accounts][${acctIndex}][url]`;
            iconInput.name = `recruit_page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]`;
            nameInput.name = `recruit_page_sns_items[${itemIndex}][accounts][${acctIndex}][name]`;
            
            // メディアボタンのdata属性も更新
            const uploadBtn = account.querySelector('.upload-recruit-icon-button');
            const removeBtn = account.querySelector('.remove-recruit-icon-button');
            
            if (uploadBtn) {
                uploadBtn.dataset.item = itemIndex;
                uploadBtn.dataset.account = acctIndex;
            }
            
            if (removeBtn) {
                removeBtn.dataset.item = itemIndex;
                removeBtn.dataset.account = acctIndex;
            }
        }
        
        // WordPressメディアアップローダーのセットアップ
        function setupRecruitMediaButtons() {
            // メディア選択ボタンのイベントリスナー
            document.querySelectorAll('.upload-recruit-icon-button').forEach(button => {
                if (!button.hasAttribute('data-initialized')) {
                    button.addEventListener('click', function() {
                        const itemIndex = this.getAttribute('data-item');
                        const acctIndex = this.getAttribute('data-account');
                        const inputField = document.querySelector(`input[name="recruit_page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]"]`);
                        const previewContainer = this.closest('div').previousElementSibling;
                        
                        // メディアアップローダーの設定
                        const mediaUploader = wp.media({
                            title: 'SNSアイコン画像の選択',
                            button: {
                                text: '画像を選択'
                            },
                            multiple: false
                        });
                        
                        // 選択時の処理
                        mediaUploader.on('select', function() {
                            const attachment = mediaUploader.state().get('selection').first().toJSON();
                            inputField.value = attachment.url;
                            
                            // プレビュー画像を更新
                            previewContainer.innerHTML = `<img src="${attachment.url}" class="media-preview" />`;
                        });
                        
                        // メディアアップローダーを開く
                        mediaUploader.open();
                    });
                    
                    button.setAttribute('data-initialized', 'true');
                }
            });
            
            // 画像削除ボタンのイベントリスナー
            document.querySelectorAll('.remove-recruit-icon-button').forEach(button => {
                if (!button.hasAttribute('data-initialized')) {
                    button.addEventListener('click', function() {
                        const itemIndex = this.getAttribute('data-item');
                        const acctIndex = this.getAttribute('data-account');
                        const inputField = document.querySelector(`input[name="recruit_page_sns_items[${itemIndex}][accounts][${acctIndex}][icon]"]`);
                        const previewContainer = this.closest('div').previousElementSibling;
                        
                        // 入力フィールドとプレビューをクリア
                        inputField.value = '';
                        previewContainer.innerHTML = '';
                    });
                    
                    button.setAttribute('data-initialized', 'true');
                }
            });
        }
        
        // ページ読み込み時にメディアボタンのイベントリスナーを設定
        document.addEventListener('DOMContentLoaded', function() {
            setupRecruitMediaButtons();
        });
    </script>
    <?php
}

