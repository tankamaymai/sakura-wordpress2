<?php get_header(); ?>
<main class="recruit-detail">
    <div class="recruit-detail__hero">
        <div class="recruit-detail__hero-inner inner">
            <div class="container">
                <p class="recruit-detail__title">REQUIREMENTS</p>
                <h2 class="recruit-detail__subtitle">応募資格詳細</h2>
                <div class="recruit-detail__hero-text">
                    <p>【正社員・営業職】「売る」のではなく「届ける」<br>
                    ――不動産業界経験者がたどり着く、"正直な営業"。</p>
                    <p class="recruit-detail__hero-text-sub">＜渋谷・在宅可／フレックス勤務＞</p>
                </div>
            </div>
        </div>
    </div>

    <div class="recruit-detail__content">
        <div class="recruit-detail__content-inner inner">
            <div class="recruit-detail__content-container">
            <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <?php
        endwhile;
    endif;
    ?>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?> 