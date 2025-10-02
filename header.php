<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if (is_404()): ?>
        <meta http-equiv="refresh" content=" 3 url=<?php echo esc_url(home_url("")); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div class="side-banners">
        <?php 
        // サイドバナー1の設定を取得
        $banner1_settings = get_side_banner_settings(1);
        if ($banner1_settings['enabled'] && (!empty($banner1_settings['image_pc_url']) || !empty($banner1_settings['image_sp_url']))) : 
        ?>
        <div class="side-banners__item">
            <a href="<?php echo esc_url($banner1_settings['url']); ?>" 
               class="side-banners__link"
               target="<?php echo esc_attr($banner1_settings['target']); ?>">
                <picture>
                    <?php if (!empty($banner1_settings['image_pc_url'])) : ?>
                        <source srcset="<?php echo esc_url($banner1_settings['image_pc_url']); ?>" media="(min-width: 768px)">
                    <?php endif; ?>
                    <img src="<?php echo esc_url($banner1_settings['image_sp_url'] ?: $banner1_settings['image_pc_url']); ?>" 
                         alt="<?php echo esc_attr($banner1_settings['alt_text'] ?: 'サイドバナー1'); ?>"
                         class="side-banners__image" width="300" height="150" loading="lazy">
                </picture>
            </a>
        </div>
        <?php endif; ?>
        
        <?php 
        // サイドバナー2の設定を取得
        $banner2_settings = get_side_banner_settings(2);
        if ($banner2_settings['enabled'] && (!empty($banner2_settings['image_pc_url']) || !empty($banner2_settings['image_sp_url']))) : 
        ?>
        <div class="side-banners__item">
            <a href="<?php echo esc_url($banner2_settings['url']); ?>" 
               class="side-banners__link"
               target="<?php echo esc_attr($banner2_settings['target']); ?>">
                <picture>
                    <?php if (!empty($banner2_settings['image_pc_url'])) : ?>
                        <source srcset="<?php echo esc_url($banner2_settings['image_pc_url']); ?>" media="(min-width: 768px)">
                    <?php endif; ?>
                    <img src="<?php echo esc_url($banner2_settings['image_sp_url'] ?: $banner2_settings['image_pc_url']); ?>" 
                         alt="<?php echo esc_attr($banner2_settings['alt_text'] ?: 'サイドバナー2'); ?>"
                         class="side-banners__image" width="300" height="150" loading="lazy">
                </picture>
            </a>
        </div>
        <?php endif; ?>
    </div>

    <!-- PC用サイドバーナビゲーション -->
    <header class="site-header">
        <div class="midnightHeader default">
            <nav class="header-nav">
                <ul class="header-nav__list">
                    <li class="header-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo__link">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/header/header-logo-img.svg')); ?>"
                                alt="さくら事務所" class="header-logo__image" width="180" height="48" loading="lazy">
                        </a>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">さくら事務所グループ事業</span>
                            <span class="header-nav__text-en">Business</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="https://www.sakurajimusyo.com/" target="_blank"
                                    class="header-nav__submenu-link">ホームインスペクション</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.s-mankan.com/" target="_blank"
                                    class="header-nav__submenu-link">マンション管理組合<br>コンサルティング</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.rakuda-f.com/" target="_blank"
                                    class="header-nav__submenu-link">らくだ不動産</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.daichi-risk.com/" target="_blank"
                                    class="header-nav__submenu-link">だいち災害リスク研究所</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">さくら事務所グループとは</span>
                            <span class="header-nav__text-en">About</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("about/philosophy")); ?>"
                                    class="header-nav__submenu-link">理念・五方良し</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("about")); ?>"
                                    class="header-nav__submenu-link">会社情報・沿革</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.sakurajimusyo.com/company/story.php" target="_blank"
                                    class="header-nav__submenu-link">創業ものがたり</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">メンバー</span>
                            <span class="header-nav__text-en">Members</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(get_post_type_archive_link('staff')); ?>"
                                    class="header-nav__submenu-link">メンバー紹介</a>
                            </li>

                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">採用情報</span>
                            <span class="header-nav__text-en">Recruitment</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("recruit")); ?>"
                                    class="header-nav__submenu-link">採用情報</a>
                            </li>
               
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">コミュニティ</span>
                            <span class="header-nav__text-en">Join Sakura</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("community")); ?>"
                                    class="header-nav__submenu-link">SJGコミュニティ</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">ニュース・プレスリリース</span>
                            <span class="header-nav__text-en">News & Press</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("news")); ?>"
                                    class="header-nav__submenu-link">ニュース一覧</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("press_release")); ?>"
                                    class="header-nav__submenu-link">プレスリリース一覧</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.sakurajimusyo.com/press/toiawase.php" target="_blank"
                                    class="header-nav__submenu-link">取材お申込み</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">SNS</span>
                            <span class="header-nav__text-en">SNS</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("sns")); ?>"
                                    class="header-nav__submenu-link">SNS情報</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">お問い合わせ・無料相談</span>
                            <span class="header-nav__text-en">Contact</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("contact")); ?>"
                                    class="header-nav__submenu-link">お問い合わせ・無料相談</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="midnightHeader white">

            <nav class="header-nav">
                <ul class="header-nav__list">
                    <li class="header-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo__link">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/header/header-logo-img.svg')); ?>"
                                alt="さくら事務所" class="header-logo__image" width="180" height="48" loading="lazy">
                        </a>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">さくら事務所グループ事業</span>
                            <span class="header-nav__text-en">Business</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="https://www.sakurajimusyo.com/" target="_blank"
                                    class="header-nav__submenu-link">ホームインスペクション</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.s-mankan.com/" target="_blank"
                                    class="header-nav__submenu-link">マンション管理組合<br>コンサルティング</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.rakuda-f.com/" target="_blank"
                                    class="header-nav__submenu-link">らくだ不動産</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.daichi-risk.com/" target="_blank"
                                    class="header-nav__submenu-link">だいち災害リスク研究所</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">さくら事務所グループとは</span>
                            <span class="header-nav__text-en">About</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("about/philosophy")); ?>"
                                    class="header-nav__submenu-link">理念・五方良し</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("about")); ?>"
                                    class="header-nav__submenu-link">会社情報・沿革</a>
                            </li>
                            <li class="header-nav__submenu-item">
                                <a href="https://www.sakurajimusyo.com/company/story.php" target="_blank"
                                    class="header-nav__submenu-link">創業ものがたり</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">メンバー</span>
                            <span class="header-nav__text-en">Members</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(get_post_type_archive_link('staff')); ?>"
                                    class="header-nav__submenu-link">メンバー紹介</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">採用情報</span>
                            <span class="header-nav__text-en">Recruitment</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("recruit")); ?>"
                                    class="header-nav__submenu-link">採用情報</a>
                            </li>
                       
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">コミュニティ</span>
                            <span class="header-nav__text-en">Join Sakura</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("community")); ?>"
                                    class="header-nav__submenu-link">SJGコミュニティ</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div class="header-nav__link">
                            <span class="header-nav__text-ja">ニュース・プレスリリース</span>
                            <span class="header-nav__text-en">News & Press</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("news")); ?>"
                                    class="header-nav__submenu-link">ニュース一覧</a>
                            </li>
                                <li class="header-nav__submenu-item">
                                    <a href="<?php echo esc_url(home_url("press_release")); ?>"
                                        class="header-nav__submenu-link">プレスリリース一覧</a>
                                </li>
                                <li class="header-nav__submenu-item">
                                    <a href="https://www.sakurajimusyo.com/press/toiawase.php" target="_blank"
                                        class="header-nav__submenu-link">取材お申込み</a>
                                </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div href="<?php echo esc_url(home_url("sns")); ?>" class="header-nav__link">
                            <span class="header-nav__text-ja">SNS</span>
                            <span class="header-nav__text-en">SNS</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("sns")); ?>"
                                    class="header-nav__submenu-link">SNS情報</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-nav__item header-nav__item--has-submenu">
                        <div href="<?php echo esc_url(home_url("contact")); ?>" class="header-nav__link">
                            <span class="header-nav__text-ja">お問い合わせ・無料相談</span>
                            <span class="header-nav__text-en">Contact</span>
                        </div>
                        <ul class="header-nav__submenu">
                            <li class="header-nav__submenu-item">
                                <a href="<?php echo esc_url(home_url("contact")); ?>"
                                    class="header-nav__submenu-link">お問い合わせ・無料相談</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- white2 -->
        <div class="midnightHeader white2">
<nav class="header-nav">
    <ul class="header-nav__list">
        <li class="header-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo__link">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/header/header-logo-img.svg')); ?>"
                    alt="さくら事務所" class="header-logo__image" width="180" height="48" loading="lazy">
            </a>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">さくら事務所グループ事業</span>
                <span class="header-nav__text-en">Business</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="https://www.sakurajimusyo.com/" target="_blank"
                        class="header-nav__submenu-link">ホームインスペクション</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.s-mankan.com/" target="_blank"
                        class="header-nav__submenu-link">マンション管理組合<br>コンサルティング</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.rakuda-f.com/" target="_blank"
                        class="header-nav__submenu-link">らくだ不動産</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.daichi-risk.com/" target="_blank"
                        class="header-nav__submenu-link">だいち災害リスク研究所</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">さくら事務所グループとは</span>
                <span class="header-nav__text-en">About</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("about/philosophy")); ?>"
                        class="header-nav__submenu-link">理念・五方良し</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("about")); ?>"
                        class="header-nav__submenu-link">会社情報・沿革</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.sakurajimusyo.com/company/story.php" target="_blank"
                        class="header-nav__submenu-link">創業ものがたり</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">メンバー</span>
                <span class="header-nav__text-en">Members</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(get_post_type_archive_link('staff')); ?>"
                        class="header-nav__submenu-link">メンバー紹介</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">採用情報</span>
                <span class="header-nav__text-en">Recruitment</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("recruit")); ?>"
                        class="header-nav__submenu-link">採用情報</a>
                </li>
         
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">コミュニティ</span>
                <span class="header-nav__text-en">Join Sakura</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                        <a href="<?php echo esc_url(home_url("community")); ?>"
                        class="header-nav__submenu-link">SJGコミュニティ</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">ニュース・プレスリリース</span>
                <span class="header-nav__text-en">News & Press</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("news")); ?>"
                        class="header-nav__submenu-link">ニュース一覧</a>
                </li>
                        <li class="header-nav__submenu-item">
                            <a href="<?php echo esc_url(home_url("press_release")); ?>"
                                class="header-nav__submenu-link">プレスリリース一覧</a>
                        </li>
                        <li class="header-nav__submenu-item">
                            <a href="https://www.sakurajimusyo.com/press/toiawase.php" target="_blank"
                                class="header-nav__submenu-link">取材お申込み</a>
                        </li>

            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div href="<?php echo esc_url(home_url("sns")); ?>" class="header-nav__link">
                <span class="header-nav__text-ja">SNS</span>
                <span class="header-nav__text-en">SNS</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("sns")); ?>"
                        class="header-nav__submenu-link">SNS情報</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div href="<?php echo esc_url(home_url("contact")); ?>" class="header-nav__link">
                <span class="header-nav__text-ja">お問い合わせ・無料相談</span>
                <span class="header-nav__text-en">Contact</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("contact")); ?>"
                        class="header-nav__submenu-link">お問い合わせ・無料相談</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
</div>
<div class="midnightHeader gray">
<nav class="header-nav">
    <ul class="header-nav__list">
        <li class="header-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo__link">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/header/header-logo-img.svg')); ?>"
                    alt="さくら事務所" class="header-logo__image" width="180" height="48" loading="lazy">
            </a>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">さくら事務所グループ事業</span>
                <span class="header-nav__text-en">Business</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="https://www.sakurajimusyo.com/" target="_blank"
                        class="header-nav__submenu-link">ホームインスペクション</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.s-mankan.com/" target="_blank"
                        class="header-nav__submenu-link">マンション管理組合<br>コンサルティング</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.rakuda-f.com/" target="_blank"
                        class="header-nav__submenu-link">らくだ不動産</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.daichi-risk.com/" target="_blank"
                        class="header-nav__submenu-link">だいち災害リスク研究所</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">さくら事務所グループとは</span>
                <span class="header-nav__text-en">About</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("about/philosophy")); ?>"
                        class="header-nav__submenu-link">理念・五方良し</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("about")); ?>"
                        class="header-nav__submenu-link">会社情報・沿革</a>
                </li>
                <li class="header-nav__submenu-item">
                    <a href="https://www.sakurajimusyo.com/company/story.php" target="_blank"
                        class="header-nav__submenu-link">創業ものがたり</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">メンバー</span>
                <span class="header-nav__text-en">Members</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(get_post_type_archive_link('staff')); ?>"
                        class="header-nav__submenu-link">メンバー紹介</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">採用情報</span>
                <span class="header-nav__text-en">Recruitment</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("recruit")); ?>"
                        class="header-nav__submenu-link">採用情報</a>
                </li>
        
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">コミュニティ</span>
                <span class="header-nav__text-en">Join Sakura</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("community")); ?>"
                        class="header-nav__submenu-link">SJGコミュニティ</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div class="header-nav__link">
                <span class="header-nav__text-ja">ニュース・プレスリリース</span>
                <span class="header-nav__text-en">News & Press</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("news")); ?>"
                        class="header-nav__submenu-link">ニュース一覧</a>
                </li>
                        <li class="header-nav__submenu-item">
                            <a href="<?php echo esc_url(home_url("press_release")); ?>"
                                class="header-nav__submenu-link">プレスリリース一覧</a>
                        </li>
                        <li class="header-nav__submenu-item">
                            <a href="https://www.sakurajimusyo.com/press/toiawase.php" target="_blank"
                                class="header-nav__submenu-link">取材お申込み</a>
                        </li>

            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div href="<?php echo esc_url(home_url("sns")); ?>" class="header-nav__link">
                <span class="header-nav__text-ja">SNS</span>
                <span class="header-nav__text-en">SNS</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("sns")); ?>"
                        class="header-nav__submenu-link">SNS情報</a>
                </li>
            </ul>
        </li>
        <li class="header-nav__item header-nav__item--has-submenu">
            <div href="<?php echo esc_url(home_url("contact")); ?>" class="header-nav__link">
                <span class="header-nav__text-ja">お問い合わせ・無料相談</span>
                <span class="header-nav__text-en">Contact</span>
            </div>
            <ul class="header-nav__submenu">
                <li class="header-nav__submenu-item">
                    <a href="<?php echo esc_url(home_url("contact")); ?>"
                        class="header-nav__submenu-link">お問い合わせ・無料相談</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
</div>
    </header>


<!-- グローバルナビゲーション（SP表示用） -->
<nav class="global-nav md3-none" id="global-nav">
  <div class="global-nav__inner">
    <div class="global-nav__header">
      <div class="global-nav__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="global-nav__logo-link">
          <img src="<?php echo esc_url(get_theme_file_uri('/images/header/header-logo-img.svg')); ?>"
               alt="さくら事務所" width="180" height="48" loading="lazy">
        </a>
      </div>
    </div>
    <div class="global-nav__menu">
      <ul class="global-nav__list">
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">さくら事務所グループ事業</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="https://www.sakurajimusyo.com/" target="_blank"
                 class="global-nav__submenu-link">ホームインスペクション</a>
            </li>
            <li class="global-nav__submenu-item">
              <a href="https://www.s-mankan.com/" target="_blank"
                 class="global-nav__submenu-link">マンション管理組合コンサルティング</a>
            </li>
            <li class="global-nav__submenu-item">
              <a href="https://www.rakuda-f.com/" target="_blank"
                 class="global-nav__submenu-link">らくだ不動産</a>
            </li>
            <li class="global-nav__submenu-item">
              <a href="https://www.daichi-risk.com/" target="_blank"
                 class="global-nav__submenu-link">だいち災害リスク研究所</a>
            </li>
          </ul>
        </li>
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">さくら事務所グループとは</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("about/philosophy")); ?>"
                 class="global-nav__submenu-link">理念・五方良し</a>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("about")); ?>"
                 class="global-nav__submenu-link">会社情報・沿革</a>
            </li>
            <li class="global-nav__submenu-item">
              <a href="https://www.sakurajimusyo.com/company/story.php" target="_blank"
                 class="global-nav__submenu-link">創業ものがたり</a>
            </li>
          </ul>
        </li>
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">メンバー</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(get_post_type_archive_link('staff')); ?>"
                 class="global-nav__submenu-link">メンバー紹介</a>
            </li>
          </ul>
        </li>
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">採用情報</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("recruit")); ?>"
                 class="global-nav__submenu-link">採用情報</a>
            </li>
          </ul>
        </li>
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">コミュニティ</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("community")); ?>"
                 class="global-nav__submenu-link">SJGコミュニティ</a>
            </li>
          </ul>
        </li>
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">ニュース・プレスリリース</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("news")); ?>"
                 class="global-nav__submenu-link">ニュース一覧</a>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("press_release")); ?>"
                 class="global-nav__submenu-link">プレスリリース一覧</a>
            </li>
            <li class="global-nav__submenu-item">
              <a href="https://www.sakurajimusyo.com/press/toiawase.php" target="_blank"
                 class="global-nav__submenu-link">取材お申込み</a>
            </li>
          </ul>
        </li>
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">SNS</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("sns")); ?>"
                 class="global-nav__submenu-link">SNS情報</a>
            </li>
          </ul>
        </li>
        <li class="global-nav__item global-nav__item--has-submenu">
          <div class="global-nav__link">
            <div>
              <span class="global-nav__text-ja">お問い合わせ・無料相談</span>
            </div>
            <span class="global-nav__arrow">></span>
          </div>
          <ul class="global-nav__submenu">
            <li class="global-nav__submenu-item">
              <div class="global-nav__back-button">戻る</div>
            </li>
            <li class="global-nav__submenu-item">
              <a href="<?php echo esc_url(home_url("contact")); ?>"
                 class="global-nav__submenu-link">お問い合わせ</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- 下部ナビゲーションバー（SPサイズ表示用） -->
<nav class="bottom-nav">
  <ul class="bottom-nav__list">
    <?php 
    $banner_settings = get_bottom_nav_banner_settings();
    if ($banner_settings['enabled'] && !empty($banner_settings['url']) && !empty($banner_settings['image_url'])) : 
    ?>
    <li class="bottom-nav__item">
      <a href="<?php echo esc_url($banner_settings['url']); ?>" 
         class="bottom-nav__link banner-button" 
         id="banner-button"
         target="<?php echo esc_attr($banner_settings['target']); ?>">
        <div class="bottom-nav__img">
          <img src="<?php echo esc_url($banner_settings['image_url']); ?>" 
               alt="バナー">
        </div>
      </a>
    </li>
    <?php endif; ?>
    <li class="bottom-nav__item">
      <a href="<?php echo esc_url(home_url('recruit')); ?>" class="bottom-nav__link apply-button" id="apply-button">
        <div class="bottom-nav__text">
         採用応募
        </div>
      </a>
    </li>
    <li class="bottom-nav__item">
      <a href="javascript:void(0)" class="bottom-nav__link menu-button" id="menu-button">
        <div class="bottom-nav__text">MENU</div>
      </a>
    </li>
  </ul>
</nav>