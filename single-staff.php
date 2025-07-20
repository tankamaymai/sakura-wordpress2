<?php get_header(); ?>

<main class="staff-single">


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="staff-single__hero" data-midnight="default">
        <div class="staff-single__hero-inner inner">
            <div class="staff-single__wrapper">
                <div class="staff-single__hero-title-wrapper">
                    <p class="staff-single__hero-title-position"><?php 
                        $staff_terms = get_the_terms(get_the_ID(), 'category-staff'); 
                        if ($staff_terms && !is_wp_error($staff_terms)) {
                            echo esc_html($staff_terms[0]->name);
                        }
                    ?></p>
                    <?php 
                    $furigana = get_post_meta(get_the_ID(), 'staff_furigana', true);
                    if ($furigana) : ?>
                        <p class="staff-single__hero-title-furigana"><?php echo esc_html($furigana); ?></p>
                    <?php endif; ?>
                    <h2 class="staff-single__hero-title"><?php the_title(); ?></h2>
                    <div class="staff-single__hero-img">
                        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                    </div>
                </div>

                <div class="staff-single__hero-text-wrapper">
                    <h3 class="staff-single__hero-text-title"><?php echo get_post_meta(get_the_ID(), 'staff_subtitle', true); ?></h3>
                    <div class="staff-single__hero-text-text">
                        <?php echo wpautop(get_post_meta(get_the_ID(), 'staff_description', true)); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="staff-single__history" data-midnight="white">
        <div class="staff-single__history-inner inner">
            <h2 class="staff-single__history-large-title">MY&nbsp;HISTORY</h2>
            <h3 class="staff-single__history-title">その方のヒストリー</h3>
            <div class="staff-single__history-wrapper">
                <?php
                $history_items = get_post_meta(get_the_ID(), 'staff_history', true);
                if (!empty($history_items) && is_array($history_items)) :
                    foreach ($history_items as $item) :
                ?>
                    <div class="staff-single__history-item">
                        <div class="staff-single__history-item-img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/staff-single-arrow.svg')); ?>" alt="">
                        </div>
                        <div class="staff-single__history-item-text">
                            <?php echo esc_html($item); ?>
                        </div>
                    </div>
                <?php
                    endforeach;
                else :
                    // Fallback if no custom history items are set
                    $default_history = array(
                        '経歴がありません',
                        '経歴がありません',
                        '経歴がありません'
                    );
                    foreach ($default_history as $item) :
                ?>
                    <div class="staff-single__history-item">
                        <div class="staff-single__history-item-img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/staff-single-arrow.svg')); ?>" alt="">
                        </div>
                        <div class="staff-single__history-item-text">
                            <?php echo esc_html($item); ?>
                        </div>
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <section class="staff-single__story" data-midnight="default">
        <div class="staff-single__story-inner inner">
            <h3 class="staff-single__story-large-title">MY&nbsp;STORY</h3>
            <h2 class="staff-single__story-subtitle">さくら事務所グループで働く理由</h2>
            <div class="staff-single__story-wrapper">
                <div class="staff-single__story-item">
                    <p class="staff-single__story-item-text">
                        <?php echo get_post_meta(get_the_ID(), 'staff_story', true); ?>
                    </p>
                    <div class="staff-single__story-item-img">
                        <?php 
                        $story_image_id = get_post_meta(get_the_ID(), 'staff_story_image', true);
                        if ($story_image_id) :
                            echo wp_get_attachment_image($story_image_id, 'full', false, array('alt' => get_the_title()));
                        else :
                        ?>
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/no-image.png')); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <h3 class="staff-single__story-large-title staff-single__story-large-title--reason">MY REASON</h3>
            <h2 class="staff-single__story-subtitle">さくら事務所グループで働く理由</h2>
            <div class="staff-single__story-wrapper">
                <div class="staff-single__story-item">
                    <p class="staff-single__story-item-text">
                        <?php echo get_post_meta(get_the_ID(), 'staff_reason', true); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="staff-single__sns" data-midnight="default">
        <div class="staff-single__sns-inner inner">
            <h2 class="staff-single__large-title">SNS</h2>
            <div class="staff-single__sns-wrapper">
                <?php
                $sns_links = get_post_meta(get_the_ID(), 'staff_sns_links', true);
                
                if (!empty($sns_links) && is_array($sns_links)) :
                    foreach ($sns_links as $sns_link) :
                        // URLまたはテキストまたは画像のいずれかが設定されている場合に表示
                        if (!empty($sns_link['url']) || !empty($sns_link['text']) || !empty($sns_link['image_id'])) :
                ?>
                <div class="staff-single__sns-item">
                    <?php if (!empty($sns_link['url'])) : ?>
                    <a href="<?php echo esc_url($sns_link['url']); ?>" target="_blank" rel="noopener noreferrer">
                    <?php endif; ?>
                        <div class="staff-single__sns-item-img">
                            <?php 
                            $image_displayed = false;
                            if (!empty($sns_link['image_id'])) : 
                                $image_id = absint($sns_link['image_id']);
                                if ($image_id > 0) :
                                    // まずwp_get_attachment_image()を試す
                                    $image_html = wp_get_attachment_image($image_id, 'thumbnail', false, array('alt' => esc_attr($sns_link['text'] ?? 'SNS')));
                                    if ($image_html) :
                                        echo $image_html;
                                        $image_displayed = true;
                                    else :
                                        // 次にwp_get_attachment_image_url()を試す
                                        $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                                if ($image_url) : ?>
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($sns_link['text'] ?? 'SNS'); ?>">
                                            <?php $image_displayed = true;
                                        endif;
                                    endif;
                                endif;
                            endif;
                            
                            if (!$image_displayed) : ?>
                                <img src="<?php echo esc_url(get_theme_file_uri('/images/no-image.png')); ?>" alt="<?php echo esc_attr($sns_link['text'] ?? 'SNS'); ?>">
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($sns_link['text'])) : ?>
                        <p class="staff-single__sns-item-text"><?php echo esc_html($sns_link['text']); ?></p>
                        <?php endif; ?>
                    <?php if (!empty($sns_link['url'])) : ?>
                    </a>
                    <?php endif; ?>
                </div>
                <?php 
                        endif;
                    endforeach;
                else : ?>
                    <div class="staff-single__sns-no-items">
                        <p class="staff-single__sns-no-items-text">SNS情報は登録されていません。</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php
    // ピックアップスタッフを取得（現在表示中のスタッフを除外）
    $pickup_staffs = get_staff_pickup_posts(get_the_ID());
    
    if (!empty($pickup_staffs)) :
    ?>
    <section class="staff-single__interview" data-midnight="white">
        <div class="staff-single__interview-inner inner">
            <h2 class="staff-single__large-title">INTERVIEW</h2>
            <div class="staff-single__interview-wrapper">
                <?php foreach ($pickup_staffs as $pickup_staff) : 
                    setup_postdata($pickup_staff); ?>
                <a href="<?php echo get_permalink($pickup_staff->ID); ?>" class="staff-single__interview-item">
                    <div class="staff-single__interview-item-img">
                        <?php if (has_post_thumbnail($pickup_staff->ID)) : ?>
                            <?php echo get_the_post_thumbnail($pickup_staff->ID, 'medium', array('alt' => get_the_title($pickup_staff->ID))); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/interview-img.png')); ?>" alt="<?php echo get_the_title($pickup_staff->ID); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="staff-single__interview-item-texts">
                        <h3 class="staff-single__interview-item-text-title"><?php echo get_the_title($pickup_staff->ID); ?></h3>
                        <p class="staff-single__interview-item-text-date"><?php echo get_the_date('Y.m.d', $pickup_staff->ID); ?></p>
                    </div>
                </a>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>