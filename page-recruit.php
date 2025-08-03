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
        <div class="recruit-history__inner container">
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
            <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-all-img.webp" alt="チーム背景">
        </div>
        <div class="recruit-team__inner">
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


    <!-- 組織構造（船団）セクション -->
    <section class="recruit-fleet">
        <div class="recruit-fleet__inner container">
            <h2 class="recruit-fleet__title">さくら事務所グループ"船団"</h2>
            <div class="recruit-fleet__diagram">
                <div class="recruit-fleet__ship recruit-fleet__ship--management" data-member="oonishi">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/oonishi.webp" alt="大西 倫加">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>経営チーム</h3>
                        <p>船長：大西 倫加</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--hr" data-member="tamura">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/tamura.webp" alt="田村 啓">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>H＆R Co-creation：<br>人と資源の共創部</h3>
                        <p>船長：田村 啓</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--marketing" data-member="tomoda">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/tomoda.webp" alt="友田 雄俊">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>マーケティング・<br>コミュニケーション部</h3>
                        <p>船長：友田 雄俊</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--backoffice" data-member="tsuji">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/tsuji.webp" alt="辻 優子">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>バックオフィス</h3>
                        <p>船長：辻 優子</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--ai" data-member="tamura-ai">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/tamura.webp" alt="田村 啓">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>AIタスクフォース：AI:BOU</h3>
                        <p>船長：田村 啓</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--youtube" data-member="nakayama">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/nakayama.webp" alt="中山 夏美">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>YouTube・SNSマーケティング</h3>
                        <p>船長：中山 夏美</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--daichi" data-member="yokoyama">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/yokoyama.webp" alt="横山 芳春">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>だいち災害リスク研究所</h3>
                        <p>船長：横山 芳春</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--rakuda" data-member="yamamoto-rakuda">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/yamamoto.webp" alt="山本 直彌">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>らくだ不動産</h3>
                        <p>船長：山本 直彌</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--home" data-member="tomoda-home">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/tomoda.webp" alt="友田 雄俊">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>住まいと暮らし事業部</h3>
                        <p>ホームインスペクション</p>
                        <p>船長：友田 雄俊</p>
                    </div>
                </div>
                <div class="recruit-fleet__ship recruit-fleet__ship--mansion" data-member="yamamoto">
                    <div class="recruit-fleet__ship-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/yamamoto.webp" alt="山本 直彌">
                    </div>
                    <div class="recruit-fleet__ship-content">
                        <h3>住まいと暮らし事業部</h3>
                        <p>マンション管理コンサルティング</p>
                        <p>船長：山本 直彌</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- データセクション -->
    <section class="recruit-data">
        <div class="recruit-data-container">
            <h2 class="recruit-data__title">男女比・平均年齢</h2>

            <div class="recruit-data__grid">
                <!-- メンバー構成 -->
                <div class="recruit-data__item recruit-data__item--member-count">
                    <h3>さくら事務所グループ所属メンバー</h3>
                    <div class="recruit-data__member-display">
                        <div class="recruit-data__member-number">195</div>
                        <div class="recruit-data__member-unit">名</div>
                    </div>
                </div>

                <!-- 正社員/業務委託比率 -->
                <div class="recruit-data__item">
                    <h3>正社員／業務委託　比率</h3>
                    <div class="recruit-data__employment-chart">
                        <div class="recruit-data__pie-chart" data-employee="83" data-contractor="17">
                            <svg class="recruit-data__pie-svg" viewBox="0 0 40 40">
                                <!-- 正社員17%（背景全体） -->
                                <circle class="recruit-data__pie-bg" cx="50%" cy="50%" r="15.9154"/>
                                <!-- 業務委託83%（アニメーション対象） -->
                                <circle class="recruit-data__pie-progress" cx="50%" cy="50%" r="15.9154"/>
                            </svg>
                            <div class="recruit-data__pie-labels">
                                <div class="recruit-data__pie-label-left">
                                    <span class="recruit-data__pie-label-text">正社員</span>
                                    <span class="recruit-data__pie-percentage">17%</span>
                                </div>
                                <div class="recruit-data__pie-label-right">
                                    <span class="recruit-data__pie-label-text">業務委託</span>
                                    <span class="recruit-data__pie-percentage">83%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 勤務形態 -->
                <div class="recruit-data__item recruit-data__item--workstyle">
                    <h3>フルリモート・ハイブリッド勤務比率</h3>
                    <div class="recruit-data__employment-chart">
                        <div class="recruit-data__pie-chart" data-employee="90" data-contractor="10">
                            <svg class="recruit-data__pie-svg" viewBox="0 0 40 40">
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
                <div class="recruit-data__item recruit-data__item--gender">
                    <h3>事業運営メンバーの男女比</h3>
                    <div class="recruit-data__gender-chart">
                        <!-- 女性画像（左側） -->
                        <div class="recruit-data__gender-image recruit-data__gender-image--female">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-g-women.webp" alt="女性メンバー">
                        </div>
                        
                        <!-- 円グラフ（中央） -->
                        <div class="recruit-data__gender-pie" data-male="40" data-female="60">
                            <svg class="recruit-data__gender-svg" viewBox="0 0 40 40">
                                <!-- 女性60%（背景全体） -->
                                <circle class="recruit-data__gender-bg" cx="50%" cy="50%" r="15.9154"/>
                                <!-- 男性40%（アニメーション対象） -->
                                <circle class="recruit-data__gender-progress" cx="50%" cy="50%" r="15.9154"/>
                            </svg>
                            <div class="recruit-data__gender-ratio">
                                <span class="recruit-data__gender-male">6</span>
                                <span class="recruit-data__gender-separator">:</span>
                                <span class="recruit-data__gender-female">4</span>
                            </div>
                        </div>
                        
                        <!-- 男性画像（右側） -->
                        <div class="recruit-data__gender-image recruit-data__gender-image--male">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-g-man.webp" alt="男性メンバー">
                        </div>
                    </div>
                </div>
                <div class="recruit-data__age-chart recruit-data__age-chart--donut">
                    <h3>さくら事務所グループ事業運営メンバーの年齢構成</h3>
                    <div class="recruit-data__age-donut-container">
                        <div class="recruit-data__age-donut">
                            <svg class="recruit-data__age-donut-svg" viewBox="0 0 277 277">
                                <!-- 65歳以上 (1人) - 最小セグメント -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--5" 
                                      d="M122.947 0.876065C128.048 0.29961 133.177 0.00718003 138.31 0.000130598L138.363 38.7801C134.667 38.7852 130.974 38.9957 127.302 39.4108L122.947 0.876065Z"/>
                                
                                <!-- 55-64歳 (4人) -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--4" 
                                      d="M62.0147 23.0347C80.3372 10.8976 101.285 3.29526 123.127 0.855811L127.431 39.3962C111.705 41.1526 96.6228 46.6263 83.4306 55.365L62.0147 23.0347Z"/>
                                
                                <!-- 35-44歳 (19人) - 最大セグメント -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--2" 
                                      d="M138.5 0C173.6 4.18567e-07 207.391 13.3271 233.042 37.2871C258.693 61.2471 274.289 94.0525 276.679 129.071L237.989 131.711C236.268 106.498 225.039 82.8779 206.57 65.6267C188.102 48.3755 163.772 38.78 138.5 38.78L138.5 0Z"/>
                                
                                <!-- 45-54歳 (18人) -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--3" 
                                      d="M276.68 129.093C278.373 153.963 273.323 178.83 262.061 201.069C250.799 223.309 233.744 242.096 212.695 255.45C191.645 268.804 167.382 276.23 142.464 276.943C117.546 277.657 92.8973 271.632 71.1182 259.504L89.9851 225.623C105.666 234.355 123.413 238.693 141.354 238.179C159.295 237.665 176.765 232.319 191.92 222.704C207.076 213.089 219.356 199.562 227.464 183.55C235.572 167.538 239.209 149.634 237.99 131.727L276.68 129.093Z"/>
                                
                                <!-- 20-34歳 (13人) -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--1" 
                                      d="M71.1258 259.508C50.3679 247.951 32.9322 231.248 20.4946 211.005C8.05702 190.762 1.03588 167.66 0.106099 143.92C-0.823679 120.18 4.36918 96.5997 15.1855 75.4462C26.0018 54.2927 42.0778 36.2773 61.8682 23.1318L83.3251 55.4349C69.076 64.8997 57.5013 77.8708 49.7135 93.1013C41.9258 108.332 38.1869 125.31 38.8564 142.403C39.5258 159.495 44.5811 176.129 53.5361 190.704C62.4912 205.278 75.0449 217.304 89.9905 225.626L71.1258 259.508Z"/>
                            </svg>
                        </div>
                        
                        <div class="recruit-data__age-legend">
                            <div class="recruit-data__age-legend-header">
                                <span class="recruit-data__age-legend-title">年代分布</span>
                                <span class="recruit-data__age-legend-count">人数</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--1"></div>
                                <span class="recruit-data__age-legend-age">20-34歳</span>
                                <span class="recruit-data__age-legend-number">13</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--2"></div>
                                <span class="recruit-data__age-legend-age">35-44歳</span>
                                <span class="recruit-data__age-legend-number">19</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--3"></div>
                                <span class="recruit-data__age-legend-age">45-54歳</span>
                                <span class="recruit-data__age-legend-number">18</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--4"></div>
                                <span class="recruit-data__age-legend-age">55-64歳</span>
                                <span class="recruit-data__age-legend-number">4</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--5"></div>
                                <span class="recruit-data__age-legend-age">65歳以上</span>
                                <span class="recruit-data__age-legend-number">1</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recruit-data__age-chart recruit-data__age-chart--donut">
                    <h3>さくら事務所グループ住まいと暮らしの専門家年齢構成</h3>
                    <div class="recruit-data__age-donut-container">
                        <div class="recruit-data__age-donut">
                            <svg class="recruit-data__age-donut-svg" viewBox="0 0 277 277">
                                <!-- 20-34歳 (8人) - 小さいセグメント -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--expert-1" 
                                      d="M138.5 0C158.362 2.36857e-07 177.993 4.27219 196.059 12.5267L179.942 47.7992C166.935 41.856 152.801 38.78 138.5 38.78L138.5 0Z"/>
                                
                                <!-- 35-44歳 (23人) -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--expert-2" 
                                      d="M196.177 12.5811C222.016 24.4165 243.588 43.9143 257.967 68.4289C272.345 92.9436 278.834 121.288 276.553 149.617L237.898 146.504C239.541 126.107 234.869 105.699 224.516 88.0488C214.163 70.3983 198.631 56.3599 180.028 47.8384L196.177 12.5811Z"/>
                                
                                <!-- 45-54歳 (38人) - 最大セグメント -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--expert-3" 
                                      d="M276.555 149.593C274.68 172.933 266.918 195.416 253.994 214.942C241.07 234.468 223.407 250.399 202.655 261.245C181.904 272.091 158.741 277.499 135.332 276.964C111.922 276.428 89.0311 269.966 68.7972 258.182L88.314 224.671C102.882 233.156 119.364 237.808 136.219 238.194C153.073 238.58 169.751 234.686 184.692 226.876C199.633 219.067 212.351 207.597 221.656 193.538C230.961 179.48 236.549 163.292 237.9 146.487L276.555 149.593Z"/>
                                
                                <!-- 55-64歳 (36人) -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--expert-4" 
                                      d="M68.859 258.218C49.6319 247.033 33.3816 231.382 21.4826 212.589C9.5837 193.796 2.38629 172.413 0.499281 150.25C-1.38773 128.086 2.09117 105.794 10.6417 85.26C19.1922 64.7255 32.5628 46.5526 49.6223 32.2786L74.508 62.0206C62.2252 72.2979 52.5984 85.3824 46.442 100.167C40.2856 114.952 37.7808 131.002 39.1395 146.96C40.4981 162.917 45.6803 178.313 54.2475 191.844C62.8147 205.375 74.515 216.644 88.3585 224.697L68.859 258.218Z"/>
                                
                                <!-- 65歳以上 (13人) -->
                                <path class="recruit-data__age-segment recruit-data__age-segment--expert-5" 
                                      d="M49.5996 32.2975C74.527 11.4312 106 -0.00190678 138.508 2.38312e-07L138.506 38.78C115.1 38.7786 92.4394 47.0105 74.4917 62.0342L49.5996 32.2975Z"/>
                            </svg>
                        </div>
                        
                        <div class="recruit-data__age-legend">
                            <div class="recruit-data__age-legend-header">
                                <span class="recruit-data__age-legend-title">年代分布</span>
                                <span class="recruit-data__age-legend-count">人数</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--expert-1"></div>
                                <span class="recruit-data__age-legend-age">20-34歳</span>
                                <span class="recruit-data__age-legend-number">8</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--expert-2"></div>
                                <span class="recruit-data__age-legend-age">35-44歳</span>
                                <span class="recruit-data__age-legend-number">23</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--expert-3"></div>
                                <span class="recruit-data__age-legend-age">45-54歳</span>
                                <span class="recruit-data__age-legend-number">38</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--expert-4"></div>
                                <span class="recruit-data__age-legend-age">55-64歳</span>
                                <span class="recruit-data__age-legend-number">36</span>
                            </div>
                            <div class="recruit-data__age-legend-item">
                                <div class="recruit-data__age-legend-indicator recruit-data__age-legend-indicator--expert-5"></div>
                                <span class="recruit-data__age-legend-age">65歳以上</span>
                                <span class="recruit-data__age-legend-number">13</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 求める人物像 -->
    <section class="recruit-ideal">
        <div class="container">
            <div class="recruit-ideal__video">
                <div class="recruit-ideal__video-container">
                    <iframe 
                        src="https://www.youtube.com/embed/aBrXy9Vpyow" 
                        title="求める人物像 - さくら事務所グループ採用動画" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- 多様な働き方 -->
    <section class="recruit-workstyle">

            <h2 class="recruit-workstyle__title">さくら事務所グループの働き方</h2>
            <div class="recruit-workstyle__cases">
                <!-- 1 -->
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-sakura-img1.webp" alt="多様な働き方">
                    </div>
                    <div class="recruit-workstyle__case-text-top">
                        <p>【業務委託】</p>
                        <p>業務委託でコアメンバーに</p>
                    </div>
                  
                </div>
                <!-- 2 -->
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-sakura-img2.webp" alt="多様な働き方">
                    </div>
                    <div class="recruit-workstyle__case-text-top">
                        <p>【正社員】</p>
                        <p>いまの私に必要なことを、</p>
                        <p>想いのままに</p>
                    </div>
                  
                </div>
                <!-- 3 -->
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-sakura-img3.webp" alt="多様な働き方">
                    </div>
                    <div class="recruit-workstyle__case-text-top">
                        <p>【業務委託】</p>
                        <p>自分の会社とホームインスペクター、</p>
                        <p>両方の経験が相互に活きる</p>
                    </div>
                  
                </div>
                <!-- 4 -->
                <div class="recruit-workstyle__case">
                    <div class="recruit-workstyle__case-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-sakura-img4.webp" alt="多様な働き方">
                    </div>
                            <div class="recruit-workstyle__case-text-top">
                                <p>【業務委託】独立して、</p>
                                <p>本音で顧客と向き合える</p>
                                <p>マンションの専門家へ</p>
                            </div>
                  
                </div>
            </div>
    </section>

    <!-- 募集職種一覧 -->
    <section class="recruit-positions" id="positions">
        <div class="container">
            <h2 class="recruit-positions__title">募集職種一覧</h2>
            
            <!-- メイングリッド -->
            <div class="recruit-positions__grid">
                <!-- さくら事務所セクション -->
                <div class="recruit-positions__section">
                    <!-- ヘッダー -->
                    <div class="recruit-positions__header">
                        <div class="recruit-positions__company-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-logo-img-fudousan.webp" alt="さくら事務所">
                        </div>
                        <div class="recruit-positions__company-header">
                            <span class="recruit-positions__company-name">さくら事務所の採用</span>
                        </div>
                    </div>
                    
                    <!-- 正社員募集 -->
                    <div class="recruit-positions__category">
                        <h3 class="recruit-positions__category-title">正社員募集</h3>
                        <div class="recruit-positions__separator"></div>
                        
                        <?php
                        $sakura_fulltime_positions = get_recruit_positions('sakura', 'fulltime');
                        if (!empty($sakura_fulltime_positions)) :
                            foreach ($sakura_fulltime_positions as $position) :
                        ?>
                        <a href="<?php echo esc_url($position['url']); ?>" class="recruit-positions__item">
                            <div class="recruit-positions__item-content">
                                <span class="recruit-positions__item-title"><?php echo esc_html($position['title']); ?></span>
                            </div>
                            <span class="recruit-positions__arrow">></span>
                        </a>
                        <?php 
                            endforeach;
                        else :
                        ?>
                        <p>現在募集中の正社員職種はありません。</p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- 複業・業務委託募集 -->
                    <div class="recruit-positions__category">
                        <h3 class="recruit-positions__category-title">複業・業務委託募集</h3>
                        <div class="recruit-positions__separator"></div>
                        
                        <?php
                        $sakura_contract_positions = get_recruit_positions('sakura', 'contract');
                        if (!empty($sakura_contract_positions)) :
                            foreach ($sakura_contract_positions as $position) :
                        ?>
                        <a href="<?php echo esc_url($position['url']); ?>" class="recruit-positions__item">
                            <div class="recruit-positions__item-content">
                                <span class="recruit-positions__item-title"><?php echo esc_html($position['title']); ?></span>
                            </div>
                            <span class="recruit-positions__arrow">></span>
                        </a>
                        <?php 
                            endforeach;
                        else :
                        ?>
                        <p>現在募集中の複業・業務委託職種はありません。</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- らくだ不動産セクション -->
                <div class="recruit-positions__section">
                    <!-- ヘッダー -->
                    <div class="recruit-positions__header ">
                        <div class="recruit-positions__company-logo--rakuda">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/recruit-logo-img-rakuda.webp" alt="らくだ不動産">
                        </div>
                        <div class="recruit-positions__company-header">
                            <span class="recruit-positions__company-name">らくだ不動産の採用</span>
                        </div>
                    </div>
                    
                    <!-- 正社員募集 -->
                    <div class="recruit-positions__category">
                        <h3 class="recruit-positions__category-title">正社員募集</h3>
                        <div class="recruit-positions__separator"></div>
                        
                        <?php
                        $rakuda_fulltime_positions = get_recruit_positions('rakuda', 'fulltime');
                        if (!empty($rakuda_fulltime_positions)) :
                            foreach ($rakuda_fulltime_positions as $position) :
                        ?>
                        <a href="<?php echo esc_url($position['url']); ?>" class="recruit-positions__item">
                            <div class="recruit-positions__item-content">
                                <span class="recruit-positions__item-title"><?php echo esc_html($position['title']); ?></span>
                            </div>
                            <span class="recruit-positions__arrow">></span>
                        </a>
                        <?php 
                            endforeach;
                        else :
                        ?>
                        <p>現在募集中の正社員職種はありません。</p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- 複業・業務委託募集 -->
                    <div class="recruit-positions__category">
                        <h3 class="recruit-positions__category-title">複業・業務委託募集</h3>
                        <div class="recruit-positions__separator"></div>
                        
                        <?php
                        $rakuda_contract_positions = get_recruit_positions('rakuda', 'contract');
                        if (!empty($rakuda_contract_positions)) :
                            foreach ($rakuda_contract_positions as $position) :
                        ?>
                        <a href="<?php echo esc_url($position['url']); ?>" class="recruit-positions__item">
                            <div class="recruit-positions__item-content">
                                <span class="recruit-positions__item-title"><?php echo esc_html($position['title']); ?></span>
                            </div>
                            <span class="recruit-positions__arrow">></span>
                        </a>
                        <?php 
                            endforeach;
                        else :
                        ?>
                        <p>現在募集中の複業・業務委託職種はありません。</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ユニークな独自採用 -->
<section class="front-page__section recruit-unique-recruit" data-midnight="default">
        <div class="container">
            <h2 class="recruit-unique-recruit-title">ユニークな独自採用</h2>

            <div class="recruit-unique-recruit-text">
            文字の大きさ、量、字間、行間等を確認するために入れています。
            </div>

            <!-- Swiperコンテナ -->
            <div class="recruit-unique-recruit-swiper swiper">
                <div class="swiper-wrapper recruit-unique-recruit-items">
                    <?php
                    // 最新の投稿を10件取得
                    $news_query = new WP_Query(array(
                        'post_type' => 'unique-recruit',
                        'posts_per_page' => 10,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                    
                    $news_posts = array(); // 投稿データを格納する配列
                    
                    if ($news_query->have_posts()) :
                        // 投稿データを配列に格納
                        while ($news_query->have_posts()) : $news_query->the_post();
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            if (!$thumbnail_url) {
                                $thumbnail_url = get_theme_file_uri('/images/no-image.png');
                            }
                            
                            $news_posts[] = array(
                                'id' => get_the_ID(),
                                'title' => get_the_title(),
                                'permalink' => get_permalink(),
                                'thumbnail' => $thumbnail_url
                            );
                        endwhile;
                        wp_reset_postdata();
                        
                        // 投稿数が少ない場合（5件未満）は複製してSwiperが正常に動作するようにする
                        $original_count = count($news_posts);
                        if ($original_count > 0 && $original_count < 5) {
                            // 元の投稿を2回複製して最低15件にする
                            for ($i = 0; $i < 2; $i++) {
                                $news_posts = array_merge($news_posts, $news_posts);
                                if (count($news_posts) >= 15) break;
                            }
                        } elseif ($original_count > 10) {
                            // 投稿数が10件を超える場合は10件に制限
                            $news_posts = array_slice($news_posts, 0, 10);
                        }
                        
                        // 投稿を表示
                        foreach ($news_posts as $post_data) :
                    ?>
                    <!-- ニュースアイテム -->
                    <div class="swiper-slide recruit-unique-recruit-item">
                        <div class="recruit-unique-recruit-item-image-wrapper">
                            <img src="<?php echo esc_url($post_data['thumbnail']); ?>"
                                alt="<?php echo esc_attr($post_data['title']); ?>" class="recruit-unique-recruit-item-image">
                        </div>
                        <div class="recruit-unique-recruit-item-content">
                            <h4 class="recruit-unique-recruit-item-title"><?php echo esc_html($post_data['title']); ?></h4>
                            <a href="<?php echo esc_url($post_data['permalink']); ?>" class="recruit-unique-recruit-item-more">
                                <span>詳しく見る</span>
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.180664 9.11267C0.180664 4.19206 4.1696 0.203125 9.09021 0.203125C14.0108 0.203125 17.9998 4.19206 17.9998 9.11267C17.9998 14.0333 14.0108 18.0222 9.09021 18.0222C4.1696 18.0222 0.180664 14.0333 0.180664 9.11267Z"
                                        fill="#F62A00" />
                                    <path
                                        d="M11.7556 9.48734C11.9509 9.29208 11.9509 8.9755 11.7556 8.78024L8.57361 5.59826C8.37835 5.40299 8.06177 5.40299 7.86651 5.59826C7.67124 5.79352 7.67124 6.1101 7.86651 6.30536L10.6949 9.13379L7.86651 11.9622C7.67124 12.1575 7.67124 12.4741 7.86651 12.6693C8.06177 12.8646 8.37835 12.8646 8.57361 12.6693L11.7556 9.48734ZM4 9.63379H11.402V8.63379H4V9.63379Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    else: 
                    ?>
                    <!-- 投稿が見つからない場合のデフォルト表示（複製してSwiperが動作するように） -->
                    <?php for ($i = 0; $i < 6; $i++) : ?>
                    <div class="swiper-slide recruit-unique-recruit-item">
                        <div class="recruit-unique-recruit-item-image-wrapper">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/no-image.png')); ?>"
                                alt="ニュースはまだありません" class="recruit-unique-recruit-item-image">
                        </div>
                        <div class="recruit-unique-recruit-item-content">
                            <h4 class="recruit-unique-recruit-item-title">ニュースはまだありません</h4>
                
                        </div>
                    </div>
                    <?php endfor; ?>
                    <?php endif; ?>
                        </div>

                <!-- ナビゲーション -->
                <div class="swiper-button-next recruit-unique-recruit-next"></div>
                <div class="swiper-button-prev recruit-unique-recruit-prev"></div>
            </div>


        </div>
    </section>
<!-- SNSセクション -->
<section class="recruit-official-sns" data-midnight="default">
    <div class="container">
        <h2 class="recruit-official-sns-title">SNS情報</h2>

        <div class="recruit-official-sns-items">
            <?php 
            // 採用ページ専用のSNS項目データを取得
            $sns_items = get_recruit_page_sns_items();
            
            if (!empty($sns_items) && is_array($sns_items)) :
                // SNSアイテムを表示
                foreach ($sns_items as $item) :
                    // 必要なデータが存在するかチェック
                    if (!isset($item['title']) || !isset($item['accounts']) || !is_array($item['accounts'])) {
                        continue;
                    }
                    
                    // 特殊なケース: テキストが2つある場合（さくら事務所グループで採用関連）
                    $has_text_wrapper = (
                        isset($item['title']) && 
                        $item['title'] === 'さくら事務所グループ' && 
                        isset($item['text']) && 
                        strpos($item['text'], '採用') !== false
                    );
            ?>
            <div class="recruit-official-sns-item">
                <h4 class="recruit-official-sns-item-title"><?php echo esc_html($item['title']); ?></h4>
                
                <?php if ($has_text_wrapper) : ?>
                <div class="recruit-official-sns-item-text-wrapper">
                    <p class="recruit-official-sns-item-text"><?php echo esc_html($item['text']); ?></p>
                    <p class="recruit-official-sns-item-text p-20">NOTE</p>
                </div>
                <?php elseif (!empty($item['text'])) : ?>
                <p class="recruit-official-sns-item-text"><?php echo esc_html($item['text']); ?></p>
                <?php endif; ?>

                <div class="recruit-official-sns-item-accounts">
                    <?php if (!empty($item['accounts'])) : ?>
                        <?php foreach ($item['accounts'] as $account) : ?>
                            <?php 
                            // アカウントデータの検証
                            if (!isset($account['url']) || !isset($account['icon']) || !isset($account['name'])) {
                                continue;
                            }
                            ?>
                            <a href="<?php echo esc_url($account['url']); ?>" class="recruit-official-sns-item-account" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo esc_url($account['icon']); ?>"
                                    alt="<?php echo esc_attr($account['name']); ?>" class="recruit-official-sns-item-account-icon">
                                <span class="recruit-official-sns-item-account-name"><?php echo esc_html($account['name']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php 
                endforeach;
            else :
            ?>
            <!-- SNS項目が設定されていない場合のメッセージ -->
            <div class="recruit-official-sns-item">
                <h4 class="recruit-official-sns-item-title">SNS情報</h4>
                <p class="recruit-official-sns-item-text">SNS情報は管理画面で設定してください。</p>
                <p><small>WordPressダッシュボード → SNS・バナー設定 → 採用ページSNS設定</small></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
</main>

<!-- メンバー詳細ポップアップ -->
<div class="member-popup" id="member-popup">
    <div class="member-popup__overlay" id="member-popup-overlay"></div>
    <div class="member-popup__content">
        <button class="member-popup__close" id="member-popup-close">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30 10L10 30M10 10L30 30" stroke="#032130" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
        <div class="member-popup__body">
            <div class="member-popup__image">
                <img id="member-popup-image" src="" alt="">
            </div>
            <div class="member-popup__info">
                <h2 id="member-popup-department" class="member-popup__department"></h2>
                <h3 id="member-popup-section" class="member-popup__section"></h3>
                <p id="member-popup-captain" class="member-popup__captain"></p>
                <a href="#" class="member-popup__profile-btn" id="member-popup-profile-btn" target="_blank" rel="noopener noreferrer" aria-label="船長プロフィールを新しいタブで開く"><span class="member-popup__profile-btn-icon" aria-hidden="true"></span>船長プロフィールはこちら</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
