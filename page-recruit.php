<?php get_header(); ?>

<!-- 採用ページ専用の縦ハンバーガーメニュー -->
<div class="recruit-hamburger" id="recruit-hamburger">
    <div class="recruit-hamburger__icon">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<main class="recruit">
    <!-- ヒーローセクション -->
    <section class="recruit-hero">
        <video class="recruit-hero-video" id="hero-video" autoplay muted loop playsinline>
            <source src="<?php echo esc_url(get_theme_file_uri('/video/recruit-mv.mp4')); ?>" type="video/mp4">
        </video>

        <h2 class="recruit-hero__title">
            <div class="recruit-hero-text-img">
                <img src="<?php echo get_template_directory_uri(); ?>/images/sakura-recruit-text.webp" alt="さくら事務所グループ">
            </div>
            <div class="recruit-hero-title-img">
                <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-motto.webp" alt="さくら事務所グループ">
            </div>
        </h2>
    </section>
    <section class="recruit-hero__content">
        <div class="recruit-hero__content-inner">
            <p class="recruit-hero__subtitle">ここまでの<br class="md-show">あらすじ</p>
            <div class="recruit-hero__text">
                <p>1999年――人と不動産のより幸せな関係を求め、長嶋修は霧深い業界の海へ小舟を漕ぎ出した。中立の旗を掲げたさくら事務所はホームインスペクションの光で暗礁を照らし、仲間を増やしながら内紛という嵐に傷つきつつも乗り越える。バトンを受け継いだ大西倫加は航路をマンション管理・防災・不動産仲介へと広げ、らくだ不動産、BORDER5、だいち災害リスク研究所など新たな船を束ね船団を編成。大西から若手の経営チームにバトンを引継ぎながら、理念の追求と五方良しが体現され続ける"100年企業"へ――。"豊かで美しい社会"を次世代に届けるため、さくら事務所グループの冒険はさらに加速する。次の時代の大海原へ。さくら事務所グループ第四章、ここに開幕。
                </p>
            </div>
        </div>
    </section>

    <section class="recruit-history">
        <div class="recruit-history__inner">
            <div class="recruit-history__content">
                <h2 class="recruit-history__title">さくら事務所グループ　<br class="md-show">第一章〜第四章
                </h2>
                    <div class="recruit-history__content-item">
                        <h3 class="recruit-history__content-title">第一章 1999~</h3>
                        <p class="recruit-history__content-text">
                            創業者：長嶋修が一人で国内初の個人向け不動産コンサルティングを開始。
                        </p>
                    </div>
                    <div class="recruit-history__content-item">
                        <h3 class="recruit-history__content-title">第二章 2003~</h3>
                        <p class="recruit-history__content-text">
                            長嶋修に共鳴した仲間がジョインし躍進。しかし長く続かず、組織が崩壊。
                        </p>
                    </div>
                    <div class="recruit-history__content-item">
                        <h3 class="recruit-history__content-title">第三章 2013~</h3>
                        <p class="recruit-history__content-text">
                            長嶋修からバトンを受け取った大西倫加が企業カルチャーの大改革を実行。
                            <br>
                            事業も成長し、さくら事務所さくら事務所グループという船団へ。
                        </p>
                    </div>
                    <div class="recruit-history__content-item">
                        <h3 class="recruit-history__content-title">第四章 2025~</h3>
                        <p class="recruit-history__content-text">
                         大西の一人社長体制から、CXO体制へ移行、若手運営チームの育成と事業継承を開始。
                         <br>
                         新たな冒険のため、将来のCXOを含めた仲間募集中。
                        </p>
                    </div>
            </div>
        </div>
        </div>
    </section>

    <!-- 経営チームセクション -->
    <section class="recruit-team md-none">
        <div class="recruit-team-bg">
            <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-team.webp" alt="チーム背景">
        </div>
        <div class="recruit-team__inner">
            <div class="container">
                <h2 class="recruit-team__title">経営チーム</h2>
            </div>
        </div>
    </section>
    <section class="recruit-team-sp md-show">
        <div class="recruit-team-sp__inner">
            <h2 class="recruit-team-sp__title">経営チーム</h2>

            <div class="recruit-team-sp__swiper swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="recruit-team-sp__content-item">
                            <div class="recruit-team-sp__content-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-team-sp.webp" alt="経営チーム">
                            </div>
                            <div class="recruit-team-sp__content-text">
                                <p class="recruit-team-sp__content-text-title">船長：大西 倫加</p>
                                <p class="recruit-team-sp__content-text-text">船長：大西 倫加</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- 募集CTA -->
    <section class="recruit-cta">
        <div class="recruit-cta__inner">
            <h2 class="recruit-cta__title">
                第四章のCXO,リーダー候補<br>
                募集中
            </h2>
            <a href="#positions" class="recruit-cta__button">応募する</a>
        </div>
    </section>

    <!-- 組織構造（船団）セクション -->
    <section class="recruit-fleet">
        <div class="container">
            <h2 class="recruit-fleet__title">さくら事務所グループ"船団"</h2>
            <div class="recruit-fleet__diagram">
                <div class="recruit-fleet__ship recruit-fleet__ship--management">
                    <h3>経営チーム</h3>
                    <p>船長：大西 倫加</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--hr">
                    <h3>H＆R Co-creation：<br>人と資源の共創部</h3>
                    <p>船長：田村啓</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--marketing">
                    <h3>マーケティング・<br>コミュニケーション部</h3>
                    <p>船長：友田 雄俊</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--backoffice">
                    <h3>バックオフィス</h3>
                    <p>船長：辻優子</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--ai">
                    <h3>AIタスクフォース：AI:BOU</h3>
                    <p>船長：田村啓</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--youtube">
                    <h3>YouTube・SNSマーケティング</h3>
                    <p>船長：中山 夏美</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--daichi">
                    <h3>だいち災害リスク研究所</h3>
                    <p>船長：横山 芳春</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--rakuda">
                    <h3>らくだ不動産</h3>
                    <p>船長：大西 倫加</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--home">
                    <h3>住まいと暮らし事業部</h3>
                    <p>ホームインスペクション</p>
                    <p>船長：友田 雄俊</p>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--mansion">
                    <h3>住まいと暮らし事業部</h3>
                    <p>マンション管理コンサルティング</p>
                    <p>船長：山本 直彌</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 事業部詳細 -->
    <section class="recruit-department">
        <div class="container">
            <div class="recruit-department__card">
                <h3 class="recruit-department__title">住まいと暮らし事業部</h3>
                <p class="recruit-department__subtitle">ホームインスペクション</p>
                <p class="recruit-department__captain">船長：友田 雄俊</p>
            </div>
        </div>
    </section>

    <!-- データセクション -->
    <section class="recruit-data">
        <div class="container">
            <h2 class="recruit-data__title">男女比・平均年齢</h2>

            <div class="recruit-data__grid">
                <!-- メンバー構成 -->
                <div class="recruit-data__item">
                    <h3>さくら事務所グループメンバーと組織体制</h3>
                    <div class="recruit-data__chart">
                        <p class="recruit-data__number"><span>27</span> / <span>134</span></p>
                    </div>
                </div>

                <!-- 正社員/業務委託比率 -->
                <div class="recruit-data__item">
                    <h3>正社員/業務委託&emsp;比率</h3>
                    <div class="recruit-data__employment-chart">
                        <div class="recruit-data__pie-chart" data-employee="83" data-contractor="17">
                            <svg class="recruit-data__pie-svg" viewBox="0 0 64 64">
                                <!-- 業務委託17%（背景全体） -->
                                <circle class="recruit-data__pie-bg" cx="50%" cy="50%" r="15.9154"/>
                                <!-- 正社員83%（アニメーション対象） -->
                                <circle class="recruit-data__pie-progress" cx="50%" cy="50%" r="15.9154"/>
                            </svg>
                            <div class="recruit-data__pie-labels">
                                <div class="recruit-data__pie-label-left">
                                    <span class="recruit-data__pie-label-text">業務委託</span>
                                    <span class="recruit-data__pie-percentage">17%</span>
                                </div>
                                <div class="recruit-data__pie-label-right">
                                    <span class="recruit-data__pie-label-text">正社員</span>
                                    <span class="recruit-data__pie-percentage">83%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 勤務形態 -->
                <div class="recruit-data__item recruit-data__item--workstyle">
                    <h3>フルリモート・ハイブリッド勤務 比率</h3>
                    <div class="recruit-data__employment-chart">
                        <div class="recruit-data__pie-chart recruit-data__pie-chart--workstyle" data-employee="90" data-contractor="10">
                            <svg class="recruit-data__pie-svg" viewBox="0 0 64 64">
                                <defs>
                                    <!-- ハイブリッド用グラデーション（濃い赤 → 透明） -->
                                    <linearGradient id="workstyle-bg-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#BA0149;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#BA0149;stop-opacity:0" />
                                    </linearGradient>
                                    <!-- フルリモート用グラデーション（ダークグレー → シアン） -->
                                    <linearGradient id="workstyle-progress-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#061F28;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#00D4FF;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <!-- ハイブリッド10%（背景全体） -->
                                <circle class="recruit-data__pie-bg recruit-data__pie-bg--workstyle" cx="50%" cy="50%" r="15.9154"/>
                                <!-- フルリモート90%（アニメーション対象） -->
                                <circle class="recruit-data__pie-progress recruit-data__pie-progress--workstyle" cx="50%" cy="50%" r="15.9154"/>
                            </svg>
                            <div class="recruit-data__pie-labels">
                                <div class="recruit-data__pie-label-left">
                                    <span class="recruit-data__pie-label-text">ハイブリッド</span>
                                    <span class="recruit-data__pie-percentage">10%</span>
                                </div>
                                <div class="recruit-data__pie-label-right">
                                    <span class="recruit-data__pie-label-text">フルリモート</span>
                                    <span class="recruit-data__pie-percentage">90%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 男女比 -->
                <div class="recruit-data__item">
                    <h3>事業運営メンバーの男女比</h3>
                    <div class="recruit-data__gender-chart">
                        <div class="recruit-data__gender-pie" data-male="60" data-female="40">
                            <svg class="recruit-data__gender-svg" viewBox="0 0 64 64">
                                <!-- 女性40%（背景全体） -->
                                <circle class="recruit-data__gender-bg" cx="50%" cy="50%" r="20"/>
                                <!-- 男性60%（アニメーション対象） -->
                                <circle class="recruit-data__gender-progress" cx="50%" cy="50%" r="20"/>
                            </svg>
                            <div class="recruit-data__gender-ratio">
                                <span class="recruit-data__gender-male">6</span>
                                <span class="recruit-data__gender-separator">:</span>
                                <span class="recruit-data__gender-female">4</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 年齢構成グラフ -->
            <div class="recruit-data__age">
                <div class="recruit-data__age-chart">
                    <h3>さくら事務所グループ事業運営メンバーの年齢構成</h3>
                    <div class="recruit-data__age-graph">
                        <div class="recruit-data__bar-chart" data-chart="business">
                            <div class="recruit-data__chart-container">
                                <!-- Y軸（縦軸）のラベル -->
                                <div class="recruit-data__y-axis">
                                    <span class="recruit-data__y-label">25</span>
                                    <span class="recruit-data__y-label">20</span>
                                    <span class="recruit-data__y-label">15</span>
                                    <span class="recruit-data__y-label">10</span>
                                    <span class="recruit-data__y-label">5</span>
                                    <span class="recruit-data__y-label">0</span>
                                </div>
                                <!-- 棒グラフエリア -->
                                <div class="recruit-data__bars-area">
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="3" data-max="25"></div>
                                        <span class="recruit-data__bar-label">20</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="18" data-max="25"></div>
                                        <span class="recruit-data__bar-label">30</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="23" data-max="25"></div>
                                        <span class="recruit-data__bar-label">40</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="4" data-max="25"></div>
                                        <span class="recruit-data__bar-label">50</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="3" data-max="25"></div>
                                        <span class="recruit-data__bar-label">60</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="1" data-max="25"></div>
                                        <span class="recruit-data__bar-label">70</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recruit-data__age-chart">
                    <h3>さくら事務所グループ住まいと暮らしの専門家年齢構成</h3>
                    <div class="recruit-data__age-graph">
                        <div class="recruit-data__bar-chart" data-chart="expert">
                            <div class="recruit-data__chart-container">
                                <!-- Y軸（縦軸）のラベル -->
                                <div class="recruit-data__y-axis">
                                    <span class="recruit-data__y-label">60</span>
                                    <span class="recruit-data__y-label">50</span>
                                    <span class="recruit-data__y-label">40</span>
                                    <span class="recruit-data__y-label">30</span>
                                    <span class="recruit-data__y-label">20</span>
                                    <span class="recruit-data__y-label">10</span>
                                    <span class="recruit-data__y-label">0</span>
                                </div>
                                <!-- 棒グラフエリア -->
                                <div class="recruit-data__bars-area">
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="2" data-max="60"></div>
                                        <span class="recruit-data__bar-label">20</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="5" data-max="60"></div>
                                        <span class="recruit-data__bar-label">30</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="15" data-max="60"></div>
                                        <span class="recruit-data__bar-label">40</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="25" data-max="60"></div>
                                        <span class="recruit-data__bar-label">50</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="35" data-max="60"></div>
                                        <span class="recruit-data__bar-label">60</span>
                                    </div>
                                    <div class="recruit-data__bar-wrapper">
                                        <div class="recruit-data__bar" data-value="40" data-max="60"></div>
                                        <span class="recruit-data__bar-label">70</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 求める人物像 -->
    <section class="recruit-ideal md-none">
        <div class="recruit-ideal-bg">
            <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-ideal.webp" alt="チーム背景">
        </div>
        <div class="recruit-ideal__inner">
            <div class="container">
                <h2 class="recruit-ideal__title">求める人物像</h2>
            </div>
        </div>
    </section>

    <!-- 多様な働き方 -->
    <section class="recruit-workstyle">

            <h2 class="recruit-workstyle__title">多様な働き方</h2>
            <div class="recruit-workstyle__cases">
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-work1.webp" alt="多様な働き方">
                    </div>
                    <div class="recruit-workstyle__case-text-top">
                        <p>地方在住・週3でも、</p>
                        <p>現場の主力として活躍</p>
                    </div>
                  
                </div>
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-work2.webp" alt="多様な働き方">
                    </div>
                    <div class="recruit-workstyle__case-text-top recruit-c-white">
                        <p>子育てと仕事を両立しながら、</p>
                        <p>キャリアを更新</p>
                    </div>  
                   
                </div>
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-work3.webp" alt="多様な働き方">
                    </div>
                    <div class="recruit-workstyle__case-text">
                        <p>副業スタートから、</p>
                        <p>いまや中核メンナーに</p>
                    </div>
                   
                </div>
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-work3.webp" alt="多様な働き方">
                    </div>
                    <div class="recruit-workstyle__case-text">
                        <p>リモートで全国の現場を</p>
                        <p>支える縁の下の力持ち</p>
                        
                    </div>
           
                    
                </div>
            </div>
    </section>

    <!-- 募集職種一覧 -->
    <section class="recruit-positions" id="positions">
        <div class="container">
            <h2 class="recruit-positions__title">募集職種一覧</h2>
            <div class="recruit-positions__list">
                <div class="recruit-positions__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sakura-home-inspection.webp"
                        alt="さくら事務所" class="recruit-positions__logo">
                    <div class="recruit-positions__content">
                        <h3>ホームインスペクター（全国）</h3>
                        <p>さくら事務所</p>
                    </div>
                    <span class="recruit-positions__type">業務委託</span>
                    <a href="#" class="recruit-positions__arrow">→</a>
                </div>
                <div class="recruit-positions__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sakura-home-inspection.webp"
                        alt="さくら事務所" class="recruit-positions__logo">
                    <div class="recruit-positions__content">
                        <h3>ホームインスペクター（本部）</h3>
                        <p>さくら事務所</p>
                    </div>
                    <span class="recruit-positions__type">正社員</span>
                    <a href="#" class="recruit-positions__arrow">→</a>
                </div>
                <div class="recruit-positions__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sakura-home-inspection.webp"
                        alt="さくら事務所" class="recruit-positions__logo">
                    <div class="recruit-positions__content">
                        <h3>バックオフィス・業務設計</h3>
                        <p>さくら事務所</p>
                    </div>
                    <span class="recruit-positions__type">正社員／業務委託</span>
                    <a href="#" class="recruit-positions__arrow">→</a>
                </div>
                <div class="recruit-positions__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sakura-home-inspection.webp"
                        alt="さくら事務所" class="recruit-positions__logo">
                    <div class="recruit-positions__content">
                        <h3>広報・採用・発信ポジション</h3>
                        <p>さくら事務所</p>
                    </div>
                    <span class="recruit-positions__type">正社員／業務委託</span>
                    <a href="#" class="recruit-positions__arrow">→</a>
                </div>
                <div class="recruit-positions__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sakura-home-inspection.webp"
                        alt="さくら事務所" class="recruit-positions__logo">
                    <div class="recruit-positions__content">
                        <h3>新規事業・プロジェクト推進</h3>
                        <p>さくら事務所</p>
                    </div>
                    <span class="recruit-positions__type">正社員／業務委託</span>
                    <a href="#" class="recruit-positions__arrow">→</a>
                </div>
                <div class="recruit-positions__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sakura-home-inspection.webp"
                        alt="さくら事務所" class="recruit-positions__logo">
                    <div class="recruit-positions__content">
                        <h3>まかない採用</h3>
                        <p>さくら事務所</p>
                    </div>
                    <span class="recruit-positions__type">正社員／業務委託</span>
                    <a href="#" class="recruit-positions__arrow">→</a>
                </div>
                <div class="recruit-positions__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/rakuda-yoko.webp" alt="らくだ不動産"
                        class="recruit-positions__logo">
                    <div class="recruit-positions__content">
                        <h3>不動産エージェント</h3>
                        <p>らくだ不動産</p>
                    </div>
                    <span class="recruit-positions__type">正社員／業務委託</span>
                    <a href="#" class="recruit-positions__arrow">→</a>
                </div>
            </div>
        </div>
    </section>

    <!-- SNS情報 -->
    <section class="recruit-sns">
        <div class="container">
            <h2 class="recruit-sns__title">SNS情報</h2>
            <div class="recruit-sns__list">
                <div class="recruit-sns__item">
                    <a href="#" class="recruit-sns__link">
                        <span class="recruit-sns__icon recruit-sns__icon--x"></span>
                        <p>@sakura_press</p>
                    </a>
                </div>
                <div class="recruit-sns__item">
                    <a href="#" class="recruit-sns__link">
                        <span class="recruit-sns__icon recruit-sns__icon--youtube"></span>
                        <p>採用チャンネル<br>@sakura-group</p>
                    </a>
                </div>
                <div class="recruit-sns__item">
                    <a href="#" class="recruit-sns__link">
                        <span class="recruit-sns__icon recruit-sns__icon--instagram"></span>
                        <p>Sakurajimusyo.group</p>
                    </a>
                </div>
                <div class="recruit-sns__item">
                    <a href="#" class="recruit-sns__link">
                        <span class="recruit-sns__icon recruit-sns__icon--facebook"></span>
                        <p>sakurajimusyo</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>