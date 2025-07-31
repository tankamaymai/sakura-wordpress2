<?php get_header(); ?>


<main class="front-page">
    <!-- ヘッダー -->
    <!-- <div class="hero-header">
        <div class="hero-header__logo">
            <a href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/header/header-logo.svg')); ?>" alt="さくら事務所">
            </a>
        </div>
    </div> -->

    <!-- ヒーローセクション -->
    <section class="front-page__hero" data-midnight="default">
        <div class="front-page__hero-container">
            <!-- ビデオ -->
            <video class="front-page__hero-video" id="hero-video" autoplay muted loop playsinline>
                <source src="<?php echo esc_url(get_theme_file_uri('/video/top-video.mp4')); ?>" type="video/mp4">
            </video>

            <div class="front-page__hero-overlay"></div>

            <div class="front-page__hero-content">
                <div class="front-page__hero-content-inner">
                    <h1 class="front-page__hero-title">地図の無い時代に、<br>未来の旗を立てる。</h1>

                </div>
            </div>


        </div>
    </section>

    <!-- 会社メッセージセクション -->
    <section class="front-page__section front-page__message" data-midnight="default">
        <div class="front-page__message-inner inner">

            <p class="front-page__section-large-title">Company&nbsp;<br class="md3-show">Message</p>
            <h2 class="front-page__section-title">未完成のフィールドで、心震える冒険を。</h2>
            <div class="front-page__message-text">
                <p>私たちは、未知に満ちたこの時代に、人生の豊かさを育む"原石"を探し、未来の"宝物"へと磨き上げる冒険をしています。<br>
                    人生に深くかかわるのに、少しオールドで、ときにブラックな香りすら漂う不動産業界。<br>
                    けれど、だからこそ伸びしろに満ちた、未完成の舞台。<br>
                    このすばらしきフィールドで、唯一無二の仲間と、心震える冒険に挑み続けています。
                </p>

            </div>
            <div class="front-page__message-asset">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/asset-front-message.png')); ?>"
                    alt="企業メッセージアセット" loading="lazy">
            </div>

        </div>
    </section>

    <!-- 事業内容セクション -->
    <section class="front-page__section front-page__services" data-midnight="white">
        <div class="front-page__services-inner inner">
            <p class="services-large-title front-page__section-large-title ">Sakura jimusyo <br class="md3-show">Group
            </p>
            <h2 class="services-title front-page__section-title">さくら事務所グループ事業内容</h2>
            <!-- Swiperコンテナ -->
            <div class="front-page__services-swiper swiper">
                <div class="swiper-wrapper front-page__services-items">
                    <!-- スライド1 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Sakura-Home.webp')); ?>"
                                alt="ホームインスペクション">
                        </div>
                        <h4 class="front-page__services-item-title">ホームインスペクション</h4>
                        <p class="front-page__services-item-text">
                        専門家が第三者の立場から住宅の劣化や不具合を見きわめ、改修時期や費用の目安を提示。住まいに関する幅広い相談にも対応します。</p>
                    </div>
                    <!-- スライド2 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Sakura-Mansion.webp')); ?>"
                                alt="マンション管理">
                        </div>
                        <h4 class="front-page__services-item-title">マンション管理組合<br>コンサルティング</h4>
                        <p class="front-page__services-item-text">
                       
利害関係のない第三者として、公平な調査・アドバイスを提供。居住者視点と専門性で、愛され続けるマンションになる支援をいたします。</p>
                    </div>
                    <!-- スライド3 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="不動産売買">
                        </div>
                        <h4 class="front-page__services-item-title">らくだ不動産</h4>
                        <p class="front-page__services-item-text">
                        物件の「売る・買う」前提とせず、「今本当に取引をすべきなのか？」から考えるエージェント制の不動産パートナーです。</p>
                    </div>
                    <!-- スライド4 -->
                    <!-- <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="リノベーション">
                        </div>
                        <h4 class="front-page__services-item-title">リノベーション</h4>
                        <p class="front-page__services-item-text">
                        自然災害が頻発する今、防災視点からの土地選びと住宅づくり、そして暮らしづくりを支援し、一人ひとりに合った具体的な対策を提案します。
                            </p>
                    </div> -->
                    <!-- スライド5 -->
                    <!-- <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="賃貸管理">
                        </div>
                        <h4 class="front-page__services-item-title">賃貸管理</h4>
                        <p class="front-page__services-item-text">
                            第三者的な立場からまた専門家の見地から、住宅の劣化状況、欠陥の有無、改修すべき箇所やその時期、おおよその費用などを見きわめ、アドバイスを行います。</p>
                    </div> -->
                    <!-- スライド6 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Daichi.webp')); ?>"
                                alt="だいち災害リスク研究所">
                        </div>
                        <h4 class="front-page__services-item-title">だいち災害リスク研究所</h4>
                        <p class="front-page__services-item-text">
                        </p>
                    </div>
    <!-- スライド1 -->
    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Sakura-Home.webp')); ?>"
                                alt="ホームインスペクション">
                        </div>
                        <h4 class="front-page__services-item-title">ホームインスペクション</h4>
                        <p class="front-page__services-item-text">
                        専門家が第三者の立場から住宅の劣化や不具合を見きわめ、改修時期や費用の目安を提示。住まいに関する幅広い相談にも対応します。</p>
                    </div>
                    <!-- スライド2 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Sakura-Mansion.webp')); ?>"
                                alt="マンション管理">
                        </div>
                        <h4 class="front-page__services-item-title">マンション管理組合<br>コンサルティング</h4>
                        <p class="front-page__services-item-text">
                      
利害関係のない第三者として、公平な調査・アドバイスを提供。居住者視点と専門性で、愛され続けるマンションになる支援をいたします。</p>
                    </div>
                    <!-- スライド3 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="不動産売買">
                        </div>
                        <h4 class="front-page__services-item-title">らくだ不動産</h4>
                        <p class="front-page__services-item-text">
                        物件の「売る・買う」前提とせず、「今本当に取引をすべきなのか？」から考えるエージェント制の不動産パートナーです。</p>
                    </div>
                    <!-- スライド4 -->
                    <!-- <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="リノベーション">
                        </div>
                        <h4 class="front-page__services-item-title">リノベーション</h4>
                        <p class="front-page__services-item-text">
                        自然災害が頻発する今、防災視点からの土地選びと住宅づくり、そして暮らしづくりを支援し、一人ひとりに合った具体的な対策を提案します。
                            </p>
                    </div> -->
                    <!-- スライド5 -->
                    <!-- <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="賃貸管理">
                        </div>
                        <h4 class="front-page__services-item-title">賃貸管理</h4>
                        <p class="front-page__services-item-text">
                            第三者的な立場からまた専門家の見地から、住宅の劣化状況、欠陥の有無、改修すべき箇所やその時期、おおよその費用などを見きわめ、アドバイスを行います。</p>
                    </div> -->
                    <!-- スライド6 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Daichi.webp')); ?>"
                                alt="だいち災害リスク研究所">
                        </div>
                        <h4 class="front-page__services-item-title">だいち災害リスク研究所</h4>
                        <p class="front-page__services-item-text">
                        自然災害が頻発する今、防災視点からの土地選びと住宅づくり、そして暮らしづくりを支援し、一人ひとりに合った具体的な対策を提案します。</p>
                    </div>
                     <!-- スライド1 -->
                     <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Sakura-Home.webp')); ?>"
                                alt="ホームインスペクション">
                        </div>
                        <h4 class="front-page__services-item-title">ホームインスペクション</h4>
                        <p class="front-page__services-item-text">
                        専門家が第三者の立場から住宅の劣化や不具合を見きわめ、改修時期や費用の目安を提示。住まいに関する幅広い相談にも対応します。</p>
                    </div>
                    <!-- スライド2 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Sakura-Mansion.webp')); ?>"
                                alt="マンション管理">
                        </div>
                        <h4 class="front-page__services-item-title">マンション管理組合<br>コンサルティング</h4>
                        <p class="front-page__services-item-text">
                        
利害関係のない第三者として、公平な調査・アドバイスを提供。居住者視点と専門性で、愛され続けるマンションになる支援をいたします。</p>
                    </div>
                    <!-- スライド3 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="不動産売買">
                        </div>
                        <h4 class="front-page__services-item-title">らくだ不動産</h4>
                        <p class="front-page__services-item-text">
                        物件の「売る・買う」前提とせず、「今本当に取引をすべきなのか？」から考えるエージェント制の不動産パートナーです。</p>
                    </div>
                    <!-- スライド4 -->
                    <!-- <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="リノベーション">
                        </div>
                        <h4 class="front-page__services-item-title">リノベーション</h4>
                        <p class="front-page__services-item-text">
                        自然災害が頻発する今、防災視点からの土地選びと住宅づくり、そして暮らしづくりを支援し、一人ひとりに合った具体的な対策を提案します。
                            </p>
                    </div> -->
                    <!-- スライド5 -->
                    <!-- <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Rakuda.webp')); ?>"
                                alt="賃貸管理">
                        </div>
                        <h4 class="front-page__services-item-title">賃貸管理</h4>
                        <p class="front-page__services-item-text">
                            第三者的な立場からまた専門家の見地から、住宅の劣化状況、欠陥の有無、改修すべき箇所やその時期、おおよその費用などを見きわめ、アドバイスを行います。</p>
                    </div> -->
                    <!-- スライド6 -->
                    <div class="swiper-slide front-page__services-item">
                        <div class="front-page__services-item-image">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/Daichi.webp')); ?>"
                                alt="だいち災害リスク研究所">
                        </div>
                        <h4 class="front-page__services-item-title">だいち災害リスク研究所</h4>
                        <p class="front-page__services-item-text">
                        自然災害が頻発する今、防災視点からの土地選びと住宅づくり、そして暮らしづくりを支援し、一人ひとりに合った具体的な対策を提案します。</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 実績セクション -->
    <section class="front-page__section front-page__achievements" data-midnight="white">
        <div class="front-page__achievements-inner inner">
            <p class="front-page__section-large-title front-page__achievements-large-title">
                Sakura jimusyo <br class="md3-show">Group<br>
                Achievements
            </p>
            <h2 class="front-page__section-title front-page__achievements-title">さくら事務所グループの実績</h2>

            <p class="front-page__achievements-subtitle">人と不動産の幸せな関係を築いてきた実績</p>
            <div class="front-page__achievements-items">
                <!-- item -->
                <div class="front-page__achievements-item">
                    <div class="front-page__achievements-item-content">
                        <h4 class="front-page__achievements-item-title">さくら事務所</h4>
                        <p class="front-page__achievements-item-text">ホームインスペクションご利用者様</p>
                        <p class="front-page__achievements-item-value js-countUp-target" data-from="0" data-to="70762">
                            70,762<br class="sp2-none"><span class="front-page__achievements-item-value-unit">組</span>
                        </p>
                    </div>
                    <div class="front-page__achievements-item-icon-wrapper">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/achievements-item1.svg')); ?>"
                            alt="HI利用者数" class="front-page__achievements-item-icon">
                    </div>
                </div>
                <!-- item2 -->
                <div class="front-page__achievements-item">
                    <div class="front-page__achievements-item-content">
                        <h4 class="front-page__achievements-item-title">さくら事務所</h4>
                        <p class="front-page__achievements-item-text">マンション管理コンサルティング<br>
                            ご利用組合様</p>
                        <p class="front-page__achievements-item-value js-countUp-target" data-from="0" data-to="950">
                            950<br class="sp2-none"><span class="front-page__achievements-item-value-unit">件以上</span>
                        </p>
                    </div>
                    <div class="front-page__achievements-item-icon-wrapper">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/achievements-item2.svg')); ?>"
                            alt="マンション管理利用組合数" class="front-page__achievements-item-icon">
                    </div>

                </div>
                <!-- item3 -->
                <div class="front-page__achievements-item">
                    <div class="front-page__achievements-item-content">
                        <h4 class="front-page__achievements-item-title">らくだ不動産</h4>
                        <p class="front-page__achievements-item-text">不動産ご相談件数</p>
                        <p class="front-page__achievements-item-value js-countUp-target" data-from="0" data-to="15000">
                            15,000<br class="sp2-none"><span class="front-page__achievements-item-value-unit">件以上</span>
                        </p>
                    </div>
                    <div class="front-page__achievements-item-icon-wrapper">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/achievements-item3.svg')); ?>"
                            alt="メディア掲載数" class="front-page__achievements-item-icon">
                    </div>
                </div>
                <!-- item4 -->
                <div class="front-page__achievements-item">
                    <div class="front-page__achievements-item-content">
                        <h4 class="front-page__achievements-item-title">だいち災害リスク<br>
                            研究所</h4>
                        <p class="front-page__achievements-item-text">防災コンサルティングご利用者様数</p>
                        <p class="front-page__achievements-item-value js-countUp-target" data-from="0" data-to="750">
                            750<br class="sp2-none"><span class="front-page__achievements-item-value-unit">件以上</span>
                        </p>
                    </div>
                    <div class="front-page__achievements-item-icon-wrapper">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/achievements-item4-1.svg')); ?>"
                            alt="らくだ成約数" class="front-page__achievements-item-icon">
                    </div>
                </div>
                <!-- item5 -->
                <div class="front-page__achievements-item">
                    <div class="front-page__achievements-item-content">
                        <h4 class="front-page__achievements-item-title">さくら事務所</h4>
                        <p class="front-page__achievements-item-text">メディア&出版実績</p>
                        <p class="front-page__achievements-item-value js-countUp-target" data-from="0" data-to="220">
                            220<br class="sp2-none"><span class="front-page__achievements-item-value-unit">件/年以上</span>
                        </p>
                    </div>
                    <div class="front-page__achievements-item-icon-wrapper">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/achievements-item4.svg')); ?>"
                            alt="らくだ成約数" class="front-page__achievements-item-icon">
                    </div>
                </div>
                <!-- item6 -->
                <div class="front-page__achievements-item">
                    <div class="front-page__achievements-item-content">
                        <h4 class="front-page__achievements-item-title">さくら事務所グループ</h4>
                        <p class="front-page__achievements-item-text">出版書籍数</p>
                        <p class="front-page__achievements-item-value js-countUp-target" data-from="0" data-to="35">
                            35<br class="sp2-none"><span class="front-page__achievements-item-value-unit__book">冊</span>
                        </p>
                    </div>
                    <div class="front-page__achievements-item-icon-wrapper">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/achievements-item6.svg')); ?>"
                            alt="らくだ成約数" class="front-page__achievements-item-icon">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ギャラリーセクション -->
    <section class="front-page__section front-page__gallery-sp" data-midnight="default">
        <div class="gallery-swiper-a swiper">
            <div class="gallery-swiper__wrapper swiper-wrapper">
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--1">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img1.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 01</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--2">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img2.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 02</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--3">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img3.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 03</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--4">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img4.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 04</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--5">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img5.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 05</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--6">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img6.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 06</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--7">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img7.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 07</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--8">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img8.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 08</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <!-- 追加のクローンスライド -->
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--1">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img1.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 01</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--2">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img2.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 02</h4>
                            <p>さくらグループの取り組み</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-swiper-b swiper">
            <div class="gallery-swiper__wrapper swiper-wrapper">
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--1">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img1.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 01</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--2">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img2.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 02</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--3">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img3.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 03</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--4">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img4.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 04</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--5">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img5.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 05</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--6">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img6.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 06</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--7">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img7.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 07</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--8">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img8.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 08</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <!-- 追加のクローンスライド -->
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--1">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img1.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 01</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-swiper__slide swiper-slide">
                    <div class="gallery-swiper__item gallery-swiper__item--2">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/gallery-img2.webp')); ?>"
                            alt="" />
                        <div class="gallery-swiper__text">
                            <h4>ギャラリー写真 02</h4>
                            <p>さくら事務所グループの取り組み</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="gallery-sp-img md-show">
        <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/garallry-back.webp')); ?>" alt="ギャラリー写真">
    </div> -->

    <!-- サイト訪問者の属性別リンク -->
    <section class="site-links" data-midnight="white">
        <div class="inner">
            <div class="site-links__title-wrapper">
                <p class="site-links__main-title">Sakura jimusyo <br class="md3-show">Group<br>
                    site links</p>
                <h2 class="site-links__sub-title">さくら事務所グループサイトリンク</h2>

            </div>

            <!-- カード -->
            <div class="site-links__cards">
                <!-- カード1: さくら事務所グループとは -->
                <div class="site-links__card">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/site-links-img1.webp')); ?>"
                        alt="さくら事務所グループとは" class="site-links__card-img">
                    <div class="site-links__card-overlay">
                        <div class="site-links__card-content">
                            <h4 class="site-links__card-subtitle">ABOUT</h4>
                            <p class="site-links__card-title">さくら事務所グループとは</p>

                        </div>
                        <a href="<?php echo esc_url(home_url('about')); ?>" class="site-links__card-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- カード2: さくら事務所グループの仲間になる -->
                <div class="site-links__card">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/site-links-img2.webp')); ?>"
                        alt="さくら事務所グループの仲間になる" class="site-links__card-img">
                    <div class="site-links__card-overlay">
                        <div class="site-links__card-content">
                            <h4 class="site-links__card-subtitle">RECRUIT</h4>
                            <p class="site-links__card-title">さくら事務所グループではたらく</p>
                        </div>
                        <a href="#" class="site-links__card-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- カード3: さくら事務所グループではたらく -->
                <div class="site-links__card">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/front-page/site-links-img3.webp')); ?>"
                        alt="さくら事務所グループではたらく" class="site-links__card-img">
                    <div class="site-links__card-overlay">
                        <div class="site-links__card-content">
                            <h4 class="site-links__card-subtitle">JOIN OUR TEAM</h4>
                            <p class="site-links__card-title">さくら事務所グループの仲間になる</p>
                        </div>
                        <a href="<?php echo esc_url(home_url('recruit')); ?>" class="site-links__card-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- リンクリスト -->
            <div class="site-links__links">
                <a href="#" class="site-links__link">
                    ご自宅を購入・建築されるみなさま
                    <div class="site-links__link-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="14.5" stroke="#F1F3CE" />
                            <path
                                d="M20.8797 14.5645C21.0749 14.3692 21.0749 14.0526 20.8797 13.8574L17.6977 10.6754C17.5024 10.4801 17.1858 10.4801 16.9906 10.6754C16.7953 10.8707 16.7953 11.1872 16.9906 11.3825L19.819 14.2109L16.9906 17.0394C16.7953 17.2346 16.7953 17.5512 16.9906 17.7465C17.1858 17.9417 17.5024 17.9417 17.6977 17.7465L20.8797 14.5645ZM7.89453 14.2109V14.7109H20.5261V14.2109V13.7109H7.89453V14.2109Z"
                                fill="#F1F3CE" />
                        </svg>
                    </div>
                </a>
                <a href="#" class="site-links__link">
                    メディアのみなさま
                    <div class="site-links__link-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="14.5" stroke="#F1F3CE" />
                            <path
                                d="M20.8797 14.5645C21.0749 14.3692 21.0749 14.0526 20.8797 13.8574L17.6977 10.6754C17.5024 10.4801 17.1858 10.4801 16.9906 10.6754C16.7953 10.8707 16.7953 11.1872 16.9906 11.3825L19.819 14.2109L16.9906 17.0394C16.7953 17.2346 16.7953 17.5512 16.9906 17.7465C17.1858 17.9417 17.5024 17.9417 17.6977 17.7465L20.8797 14.5645ZM7.89453 14.2109V14.7109H20.5261V14.2109V13.7109H7.89453V14.2109Z"
                                fill="#F1F3CE" />
                        </svg>
                    </div>
                </a>
                <a href="#" class="site-links__link">
                    マンション管理組合様向けサービス
                    <div class="site-links__link-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="14.5" stroke="#F1F3CE" />
                            <path
                                d="M20.8797 14.5645C21.0749 14.3692 21.0749 14.0526 20.8797 13.8574L17.6977 10.6754C17.5024 10.4801 17.1858 10.4801 16.9906 10.6754C16.7953 10.8707 16.7953 11.1872 16.9906 11.3825L19.819 14.2109L16.9906 17.0394C16.7953 17.2346 16.7953 17.5512 16.9906 17.7465C17.1858 17.9417 17.5024 17.9417 17.6977 17.7465L20.8797 14.5645ZM7.89453 14.2109V14.7109H20.5261V14.2109V13.7109H7.89453V14.2109Z"
                                fill="#F1F3CE" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- ニュースセクション -->
    <section class="front-page__section front-page__news" data-midnight="default">
        <div class="front-page__news-inner inner">
            <p class="front-page__section-large-title news-large-title">NEWS</p>
            <h2 class="front-page__section-title news-title">ニュース</h2>

            <div class="news-text">
            さくら事務所グループに関する情報をお届けします。
            </div>

            <!-- Swiperコンテナ -->
            <div class="front-page__news-swiper swiper">
                <div class="swiper-wrapper front-page__news-items">
                    <?php
                    // 最新の投稿を10件取得
                    $news_query = new WP_Query(array(
                        'post_type' => 'post',
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
                    <div class="swiper-slide front-page__news-item">
                        <div class="front-page__news-item-image-wrapper">
                            <img src="<?php echo esc_url($post_data['thumbnail']); ?>"
                                alt="<?php echo esc_attr($post_data['title']); ?>" class="front-page__news-item-image">
                        </div>
                        <div class="front-page__news-item-content">
                            <h4 class="front-page__news-item-title"><?php echo esc_html($post_data['title']); ?></h4>
                            <a href="<?php echo esc_url($post_data['permalink']); ?>" class="front-page__news-item-more">
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
                    <div class="swiper-slide front-page__news-item">
                        <div class="front-page__news-item-image-wrapper">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/no-image.png')); ?>"
                                alt="ニュースはまだありません" class="front-page__news-item-image">
                        </div>
                        <div class="front-page__news-item-content">
                            <h4 class="front-page__news-item-title">ニュースはまだありません</h4>
                            <a href="#" class="front-page__news-item-more">
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
                    <?php endfor; ?>
                    <?php endif; ?>
                        </div>

                <!-- ナビゲーション -->
                <div class="swiper-button-next front-page__news-next"></div>
                <div class="swiper-button-prev front-page__news-prev"></div>
            </div>

            <!-- ニュース一覧へのリンク -->
            <div class="front-page__news-more">
                <a href="<?php echo esc_url(home_url('news')); ?>" class="front-page__news-more-button">ニュース一覧</a>
            </div>

        </div>
    </section>

    <!-- SNSセクション -->
    <section class="front-page__section front-page__sns" data-midnight="white2">
        <div class="front-page__sns-inner inner">
            <p class="front-page__section-large-title front-page__sns-large-title">OFFICIAL SNS</p>
            <h2 class="front-page__section-title front-page__sns-title">公式SNS</h2>

            <div class="front-page__sns-items">
                <?php 
                // カスタムフィールドからSNSアイテムを取得
                $sns_items = get_front_page_sns_items();
                
                // SNSアイテムを表示
                foreach ($sns_items as $item) :
                    // 特殊なケース: テキストが2つある場合（アイテム4など）
                    $has_text_wrapper = $item['title'] === 'さくら事務所グループ' && strpos($item['text'], '採用') !== false;
                ?>
                <div class="front-page__sns-item">
                    <h4 class="front-page__sns-item-title"><?php echo esc_html($item['title']); ?></h4>
                    
                    <?php if ($has_text_wrapper) : ?>
                    <div class="front-page__sns-item-text-wrapper">
                        <p class="front-page__sns-item-text"><?php echo esc_html($item['text']); ?></p>
                        <p class="front-page__sns-item-text p-20">NOTE</p>
                    </div>
                    <?php elseif (!empty($item['text'])) : ?>
                    <p class="front-page__sns-item-text"><?php echo esc_html($item['text']); ?></p>
                    <?php endif; ?>

                    <div class="front-page__sns-item-accounts">
                        <?php foreach ($item['accounts'] as $account) : ?>
                        <a href="<?php echo esc_url($account['url']); ?>" class="front-page__sns-item-account">
                            <img src="<?php echo esc_url($account['icon']); ?>"
                                alt="<?php echo esc_attr($account['name']); ?>" class="front-page__sns-item-account-icon">
                            <span class="front-page__sns-item-account-name"><?php echo esc_html($account['name']); ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>