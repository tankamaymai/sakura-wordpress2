<?php get_header(); ?>

<main class="sns2-main" >
	  <!-- ヘッダー -->

	<section class="sns2-mv" data-midnight="white">
		<picture>
			<source srcset="<?php echo get_template_directory_uri(); ?>/images/sns-mv-pc.webp" media="(min-width: 768px)">
			<img src="<?php echo get_template_directory_uri(); ?>/images/sns-mv-sp.webp" alt="さくら事務所グループSNS">
		</picture>
		<div class="sns2-header">
			<p class="sns2-title-en">Sakura Group OFFICIAL SNS</p>
			<h1 class="sns2-title">さくら事務所グループSNS</h1>
		</div>
	</section>


	<div class="sns-container" data-midnight="white">
		<div class="sns-container-inner inner">
            <?php 
            // カスタムフィールドからSNSアイテムを取得
            $sns_items = get_page_sns_items();
            
            // SNSアイテムを表示
            foreach ($sns_items as $item) :
            ?>
			<section class="sns-section">
				<div class="sns-card">
					<h2 class="sns-card__title"><?php echo esc_html($item['title']); ?></h2>
                    <?php if (!empty($item['text'])) : ?>
					<p class="sns-card__text"><?php echo esc_html($item['text']); ?></p>
                    <?php endif; ?>
					<div class="sns-accounts">
                        <?php foreach ($item['accounts'] as $account) : 
                            // アイコンの拡張子から推測するクラス名
                            $icon_class = 'twitter'; // デフォルト
                            if (strpos($account['icon'], 'youtube') !== false) {
                                $icon_class = 'youtube';
                            } elseif (strpos($account['icon'], 'insta') !== false) {
                                $icon_class = 'instagram';
                            } elseif (strpos($account['icon'], 'note') !== false) {
                                $icon_class = 'note';
                            } elseif (strpos($account['icon'], 'facebook') !== false) {
                                $icon_class = 'facebook';
                            }
                        ?>
						<a href="<?php echo esc_url($account['url']); ?>" class="sns-account">
							<div class="sns-account__icon <?php echo esc_attr($icon_class); ?>">
								<img src="<?php echo esc_url($account['icon']); ?>" alt="<?php echo esc_attr($account['name']); ?>">
							</div>
							<p class="sns-account__name"><?php echo esc_html($account['name']); ?></p>
						</a>
                        <?php endforeach; ?>
					</div>
				</div>
			</section>
            <?php endforeach; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>