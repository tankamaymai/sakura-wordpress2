<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<main class="recruit-detail">
    <div class="recruit-detail__hero">
        <div class="recruit-detail__hero-inner inner">
            <div class="container">
                <p class="recruit-detail__title">REQUIREMENTS</p>
                <h2 class="recruit-detail__subtitle">応募資格詳細</h2>
                <div class="recruit-detail__hero-text">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="recruit-detail__content">
        <div class="recruit-detail__content-inner inner">
            <div class="recruit-detail__content-container">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
