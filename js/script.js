

// メディアクエリ判定関数
function isMobileSize() {
    return window.innerWidth <= 768; // md3ブレークポイント
}

// カウントアップアニメーション
const countUpTargets = document.querySelectorAll('.js-countUp-target');

// Swiperの初期化
document.addEventListener('DOMContentLoaded', function() {
    // サービススライダーの初期化
    const servicesSwiper = new Swiper('.front-page__services-swiper', {
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 10,
      loopAdditionalSlides: 1,
        
      autoplay: {
          delay: 3000,
          disableOnInteraction: false,
      },
      breakpoints: {
        // 768px以上の場合
      }
    });
    
    // ニュースセクションのスライダー初期化
    const newsSwiper = new Swiper('.front-page__news-swiper', {
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 10,
      loopAdditionalSlides: 1,

      
      autoplay: {
          delay: 3000,
          disableOnInteraction: false,
      },

    });
    // ユニーク採用スライダーの初期化
    const recruitUniqueRecruitSwiper = new Swiper('.recruit-unique-recruit-swiper', {
        loop: true,
        slidesPerView: "auto",
        spaceBetween: 10,
        loopAdditionalSlides: 1,
  
        
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
  
      });
  
    // サービススライダーの初期化
    const aboutSwiper = new Swiper('.about__contents-swiper', {
      loop: true,
      slidesPerView: "auto",
      loopAdditionalSlides: 1,
      spaceBetween: 10,
          
      autoplay: {
          delay: 3000,
          disableOnInteraction: false,
      },
    });
    // サービススライダーの初期化
    const aboutAwardsSwiper = new Swiper('.about__awards-swiper', {
        loop: true,
        slidesPerView: "auto",
        loopAdditionalSlides: 1,
        spaceBetween: 10,
                
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
          });

    // 経営チームスライダーの初期化（採用ページ）
    const recruitTeamSwiper = new Swiper('.recruit-team-sp__swiper', {
        loop: true, // 単一スライドの場合はループ無効
        slidesPerView: 1,
        spaceBetween: 20,
        centeredSlides: true,
        
      
        
        // 自動再生は無効（静的コンテンツのため）
        autoplay: {
            delay: 3000,
        
        },
        
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            }
        }
    });

    // ギャラリースライダーの初期化
    const gallerySwiperA = new Swiper('.gallery-swiper-a', {
      loop: true,
      slidesPerView: "auto",
      speed: 8000, // ループの時間を長くして滑らかに
      allowTouchMove: false, // スワイプ無効
      autoplay: {
        delay: 0, // 途切れなくループ
        disableOnInteraction: false, // ユーザーの操作後も自動再生を継続
      },
      watchSlidesProgress: true, // スライドの進行状況を監視
      loopPreventsSlide: false, // ループ中でもスライドを許可
      loopAdditionalSlides: 4, // クローンスライドを増やしてスムーズなループを実現
    });
    
    // ギャラリースライダーの初期化
    const gallerySwiperB = new Swiper('.gallery-swiper-b', {
        loop: true,
        slidesPerView: "auto",
        speed: 8000, // ループの時間を長くして滑らかに
        allowTouchMove: false, // スワイプ無効
        autoplay: {
          delay: 0, // 途切れなくループ
          disableOnInteraction: false, // ユーザーの操作後も自動再生を継続
          reverseDirection: true, // 逆方向に自動再生
        },
        watchSlidesProgress: true, // スライドの進行状況を監視
        loopPreventsSlide: false, // ループ中でもスライドを許可
        loopAdditionalSlides: 4, // クローンスライドを増やしてスムーズなループを実現
      });

    // ギャラリースライドのホバーエフェクト
    // const setupGalleryHoverEffects = () => {
    //   const gallerySlides = document.querySelectorAll('.gallery-swiper__slide');
      
    //   gallerySlides.forEach(slide => {
    //     // ホバー開始時の処理
    //     slide.addEventListener('mouseenter', function() {
    //       // 自動再生を一時停止
    //       if (this.closest('.gallery-swiper-a')) {
    //         gallerySwiperA.autoplay.stop();
    //       } else if (this.closest('.gallery-swiper-b')) {
    //         gallerySwiperB.autoplay.stop();
    //       }
          
    //       // ホバーエフェクトのためにクラスを追加
    //       this.classList.add('hover-active');
    //     });
        
    //     // ホバー終了時の処理
    //     slide.addEventListener('mouseleave', function() {
    //       // 自動再生を再開
    //       if (this.closest('.gallery-swiper-a')) {
    //         gallerySwiperA.autoplay.start();
    //       } else if (this.closest('.gallery-swiper-b')) {
    //         gallerySwiperB.autoplay.start();
    //       }
          
    //       // ホバーエフェクトのためのクラスを削除
    //       this.classList.remove('hover-active');
    //     });
    //   });
    // };
    
    // // ギャラリーホバーエフェクトの初期化
    // setupGalleryHoverEffects();

    // ナビゲーションメニューの動作（モバイルサイズのみ）
    // SP用下部メニューボタン
    const menuButton = document.getElementById('menu-button');
    const globalNav = document.getElementById('global-nav');
    const body = document.body;
    
    // 下部メニューボタンの処理（SP表示用、モバイルサイズのみ）
    if (menuButton && globalNav) {
        const menuText = menuButton.querySelector('.bottom-nav__text');
        
        menuButton.addEventListener('click', function(e) {
            // PCサイズでは処理を実行しない
            if (!isMobileSize()) {
                return;
            }
            
            e.preventDefault();
            console.log('メニューボタンがクリックされました');
            
            // メニューが開いている場合は閉じる、閉じている場合は開く
            if (menuButton.classList.contains('active')) {
                // 閉じる処理
                menuButton.classList.remove('active');
                globalNav.classList.remove('active');
                body.classList.remove('no-scroll');
                
                // テキストをMENUに戻す
                if (menuText) {
                    menuText.textContent = 'MENU';
                }
            } else {
                // 開く処理
                menuButton.classList.add('active');
                globalNav.classList.add('active');
                body.classList.add('no-scroll');
                
                // テキストをバツに変更
                if (menuText) {
                    menuText.textContent = '×';
                }
            }
        });
    }

    // グローバルナビのサブメニュー制御（モバイルサイズのみ）
    const globalNavLinks = document.querySelectorAll('.global-nav__link');
    globalNavLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            // PCサイズでは処理を実行しない
            if (!isMobileSize()) {
                return;
            }
            
            e.preventDefault(); // デフォルトの動作を防ぐ
            
            const parentItem = this.closest('.global-nav__item');
            const submenu = parentItem.querySelector('.global-nav__submenu');
            
            console.log('クリックされました:', parentItem); // デバッグ用
            console.log('サブメニュー:', submenu); // デバッグ用
            
            if (submenu) {
                // 他のサブメニューを閉じる
                const allItems = document.querySelectorAll('.global-nav__item');
                allItems.forEach(item => {
                    if (item !== parentItem) {
                        item.classList.remove('is-open');
                    }
                });
                
                // クリックされたアイテムのサブメニューを表示/非表示
                if (parentItem.classList.contains('is-open')) {
                    // サブメニューが開いている場合は、メインメニューに戻る
                    parentItem.classList.remove('is-open');
                    console.log('サブメニューを閉じました'); // デバッグ用
                    
                    // 強制的にサブメニューを非表示
                    const submenuElement = parentItem.querySelector('.global-nav__submenu');
                    if (submenuElement) {
                        submenuElement.style.display = 'none';
                        console.log('サブメニューを非表示にしました'); // デバッグ用
                    }
                } else {
                    // サブメニューを表示
                    parentItem.classList.add('is-open');
                    console.log('サブメニューを開きました'); // デバッグ用
                    
                    // 強制的にサブメニューを表示（下から出現）
                    const submenuElement = parentItem.querySelector('.global-nav__submenu');
                    if (submenuElement) {
                        submenuElement.style.display = 'flex';
                        submenuElement.style.position = 'fixed';
                        submenuElement.style.bottom = '60px';
                        submenuElement.style.left = '0';
                        submenuElement.style.width = '100vw';
                        submenuElement.style.height = 'calc(100vh - 80px)';
                        submenuElement.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                        submenuElement.style.zIndex = '9999';
                        submenuElement.style.padding = '20px 20px';
                        submenuElement.style.overflowY = 'auto';
                        submenuElement.style.flexDirection = 'column';
                        submenuElement.style.justifyContent = 'center';
                        submenuElement.style.alignItems = 'center';
                        submenuElement.style.boxSizing = 'border-box';
                        
                        // サブメニュー全体を中央配置のコンテナとして設定
                        submenuElement.style.display = 'flex';
                        submenuElement.style.flexDirection = 'column';
                        submenuElement.style.justifyContent = 'center';
                        submenuElement.style.alignItems = 'center';
                        
                        // サブメニュー内のすべての要素を確実に表示
                        const submenuItems = submenuElement.querySelectorAll('.global-nav__submenu-item');
                        submenuItems.forEach(item => {
                            item.style.display = 'block';
                            item.style.width = '100%';
                            item.style.maxWidth = '400px';
                            item.style.textAlign = 'center';
                        });
                        
                        // 戻るボタンを確実に表示
                        const backButton = submenuElement.querySelector('.global-nav__back-button');
                        if (backButton) {
                            backButton.style.display = 'flex';
                            backButton.style.color = '#000000';
                            backButton.style.fontSize = '16px';
                            backButton.style.fontWeight = '600';
                            backButton.style.padding = '15px 0';
                            backButton.style.marginBottom = '15px';
                            backButton.style.borderBottom = '1px solid rgba(0, 0, 0, 0.2)';
                            backButton.style.width = '100%';
                            backButton.style.maxWidth = '400px';
                            backButton.style.textAlign = 'center';
                            backButton.style.cursor = 'pointer';
                            backButton.style.alignItems = 'center';
                            backButton.style.justifyContent = 'center';
                        }
                        submenuElement.style.transform = 'translateY(0)';
                        submenuElement.style.transition = 'transform 0.4s ease';
                        console.log('サブメニューのスタイルを直接設定しました'); // デバッグ用
                    }
                }
            }
        });
    });
    
    // 戻るボタンの処理（モバイルサイズのみ）
    const backButtons = document.querySelectorAll('.global-nav__back-button');
    backButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // PCサイズでは処理を実行しない
            if (!isMobileSize()) {
                return;
            }
            
            const parentItem = this.closest('.global-nav__item');
            parentItem.classList.remove('is-open');
            
            // 強制的にサブメニューを非表示
            const submenuElement = parentItem.querySelector('.global-nav__submenu');
            if (submenuElement) {
                submenuElement.style.display = 'none';
                console.log('戻るボタンでサブメニューを非表示にしました'); // デバッグ用
            }
        });
    });
    
    // タブメニューの初期化と実装
    const tabTitles = document.querySelectorAll('.tab-title');
    
    // 初期状態ですべてのタブコンテンツを非表示にする
    const tabContents = document.querySelectorAll('.business-history__tab-main');
    tabContents.forEach(content => {
        content.style.display = 'none';
        content.style.height = '0';
        content.style.overflow = 'hidden';
        content.style.opacity = '0';
        content.style.transition = 'height 0.5s ease, opacity 0.5s ease';
    });
    
    // タブタイトルのクリックイベント設定
    tabTitles.forEach(title => {
        title.addEventListener('click', function() {
            // クリックされたタイトルの次の要素（タブコンテンツ）を取得
            const tabContent = this.nextElementSibling;
            
            // タブタイトルのアクティブ状態を切り替え
            this.classList.toggle('active');
            
            // アロー画像の回転
            if (this.classList.contains('active')) {
                this.style.borderRadius = '30px 30px 0 0';
            } else {
                this.style.borderRadius = '30px';
            }
            
            // タブコンテンツの表示/非表示を切り替え
            if (tabContent.style.display === 'none' || tabContent.style.height === '0px') {
                // 一時的に表示してコンテンツの高さを取得
                tabContent.style.display = 'block';
                tabContent.style.position = 'absolute';
                tabContent.style.visibility = 'hidden';
                const height = tabContent.scrollHeight;
                tabContent.style.position = '';
                tabContent.style.visibility = '';
                
                // アニメーションで開く
                tabContent.style.height = '0';
                tabContent.style.opacity = '0';
                setTimeout(() => {
                    tabContent.style.height = height + 'px';
                    tabContent.style.opacity = '1';
                }, 10);
                
                // アニメーション完了後に高さを自動に戻す
                setTimeout(() => {
                    tabContent.style.height = 'auto';
                }, 500);
            } else {
                // 現在の高さを設定してからアニメーションで閉じる
                const height = tabContent.scrollHeight;
                tabContent.style.height = height + 'px';
                
                setTimeout(() => {
                    tabContent.style.height = '0';
                    tabContent.style.opacity = '0';
                }, 10);
                
                // アニメーション完了後に非表示にする
                setTimeout(() => {
                    tabContent.style.display = 'none';
                }, 500);
            }
        });
    });
    
    // サイドバナーのスクロールアニメーション
    const sideBanners = document.querySelector('.side-banners');
    const mainView = document.querySelector('.front-page__hero'); // メインビューのセレクタを変更
    let lastScrollY = 0;
    let scrollDirection = '';
    
    // メインビューの表示状態を監視
    if (mainView) {
        const mainViewObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting && sideBanners) {
                    // メインビューが見えなくなったらバナーを非表示
                    sideBanners.classList.remove('is-visible');
                    sideBanners.classList.add('is-hidden');
                }
            });
        }, {
            threshold: 0
        });
        
        mainViewObserver.observe(mainView);
    }
    
    // スクロールイベントを監視
    window.addEventListener('scroll', function() {
        const scrollY = window.scrollY;
        
        // スクロール方向を判定
        scrollDirection = scrollY > lastScrollY ? 'down' : 'up';
        lastScrollY = scrollY;
        
        // 30px以上スクロールしたらバナーを表示
        if (scrollY >= 30 && sideBanners && mainView) {
            const mainViewRect = mainView.getBoundingClientRect();
            
            // メインビューが画面内にあるときのみバナーを表示
            if (mainViewRect.bottom > 0) {
                sideBanners.classList.add('is-visible');
                sideBanners.classList.remove('is-hidden');
            } else {
                sideBanners.classList.remove('is-visible');
                sideBanners.classList.add('is-hidden');
            }
        } else if (sideBanners) {
            // 30px未満の場合はバナーを非表示
            sideBanners.classList.remove('is-visible');
            sideBanners.classList.add('is-hidden');
        }
    });

    // バナーボタンの処理
    const bannerButton = document.getElementById('banner-button');
    if (bannerButton && sideBanners) {
        // バナーが設定されている場合はサイドバナーの表示は行わない
        // デフォルトのリンク動作を許可
        // バナーが設定されていない場合はそもそもDOM要素が存在しないため、
        // この処理は実行されない
    }

    // ウィンドウリサイズ時の処理
    window.addEventListener('resize', function() {
        // PCサイズに変更された場合、SP用ナビゲーションを閉じる
        if (!isMobileSize()) {
            if (menuButton) {
                menuButton.classList.remove('active');
                const menuText = menuButton.querySelector('.bottom-nav__text');
                if (menuText) {
                    menuText.textContent = 'MENU';
                }
            }
            if (globalNav) {
                globalNav.classList.remove('active');
            }
            body.classList.remove('no-scroll');
            
            // すべてのサブメニューを閉じる
            const allItems = document.querySelectorAll('.global-nav__item');
            allItems.forEach(item => {
                item.classList.remove('is-open');
                const submenuElement = item.querySelector('.global-nav__submenu');
                if (submenuElement) {
                    submenuElement.style.display = 'none';
                }
            });
        }
    });

});

countUpTargets.forEach(target => {
    const from = parseInt(target.dataset.from);
    const to = parseInt(target.dataset.to);
    
    // 単位要素を保存
    const unitElement = target.querySelector('.front-page__achievements-item-value-unit, .front-page__achievements-item-value-unit__book');
    let unitText = '';
    let isBookUnit = false;
    
    if (unitElement) {
        // 単位のテキストを取得
        unitText = unitElement.textContent;
        // 書籍用の単位かどうかを判定
        isBookUnit = unitElement.classList.contains('front-page__achievements-item-value-unit__book');
        // 一旦単位要素を削除
        unitElement.remove();
    }
    
    // Intersection Observerを使用して要素が画面内に入ったときにアニメーションを開始
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // アニメーション開始
                gsap.fromTo(target, {
                    textContent: from
                }, {
                    textContent: to,
                    duration: 2,
                    ease: "power1.out",
                    snap: { textContent: 1 },
                    onUpdate: function() {
                        // カンマ区切りでフォーマット
                        target.textContent = Number(target.textContent).toLocaleString();
                    },
                    onComplete: function() {
                        // アニメーション完了後に単位を追加
                        if (unitText) {
                            const span = document.createElement('span');
                            // 書籍用の単位の場合は書籍用のクラスを使用
                            span.className = isBookUnit ? 'front-page__achievements-item-value-unit__book' : 'front-page__achievements-item-value-unit';
                            span.textContent = unitText;
                            target.appendChild(span);
                        }
                    }
                });
                
                // 一度アニメーションを開始したら監視を解除
                observer.unobserve(target);
            }
        });
    }, {
        threshold: 0.5
    });
    
    observer.observe(target);
});

// モバイル用グローバルナビゲーションのサブメニュー制御
document.addEventListener('DOMContentLoaded', function() {
    const submenuParents = document.querySelectorAll('.global-nav__item--has-submenu');
    
    submenuParents.forEach(parent => {
        const link = parent.querySelector('.global-nav__link');
        const submenu = parent.querySelector('.global-nav__submenu');
        
        if (link && submenu) {
            // メインリンクをクリックしたときの処理
            link.addEventListener('click', function(e) {
                // PCサイズでは処理を実行しない
                if (!isMobileSize()) {
                    return;
                }
                
                e.preventDefault();
                
                // 他のサブメニューを閉じる
                submenuParents.forEach(otherParent => {
                    if (otherParent !== parent) {
                        otherParent.classList.remove('is-open');
                    }
                });
                
                // 現在のサブメニューをトグル
                parent.classList.toggle('is-open');
            });
        }
    });
    
    // サブメニューアイテムをクリックしたときはナビゲーションを閉じる
    const submenuLinks = document.querySelectorAll('.global-nav__submenu-link');
    submenuLinks.forEach(submenuLink => {
        submenuLink.addEventListener('click', function() {
            // PCサイズでは処理を実行しない
            if (!isMobileSize()) {
                return;
            }
            
            const menuButton = document.getElementById('menu-button');
            const globalNav = document.getElementById('global-nav');
            const body = document.body;
            
            if (menuButton) {
                menuButton.classList.remove('active');
                
                // テキストをMENUに戻す
                const menuText = menuButton.querySelector('.bottom-nav__text');
                if (menuText) {
                    menuText.textContent = 'MENU';
                }
            }
            if (globalNav) globalNav.classList.remove('active');
            body.classList.remove('no-scroll');
        });
    });
});



// PC用ヘッダーのサブメニュー制御
document.addEventListener('DOMContentLoaded', function() {
    const headerSubmenuParents = document.querySelectorAll('.header-nav__item--has-submenu');
    const siteHeader = document.querySelector('.site-header');
    
    headerSubmenuParents.forEach(parent => {
        const link = parent.querySelector('.header-nav__link');
        const submenu = parent.querySelector('.header-nav__submenu');
        
        if (link && submenu) {
            // メインリンクをクリックしたときの処理
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // 他のサブメニューを閉じる
                headerSubmenuParents.forEach(otherParent => {
                    if (otherParent !== parent) {
                        const otherLink = otherParent.querySelector('.header-nav__link');
                        const otherSubmenu = otherParent.querySelector('.header-nav__submenu');
                        if (otherLink) otherLink.classList.remove('is-active');
                        if (otherSubmenu) otherSubmenu.classList.remove('is-active');
                    }
                });
                
                // 現在のサブメニューをトグル
                const isActive = submenu.classList.contains('is-active');
                
                if (isActive) {
                    // 閉じる
                    link.classList.remove('is-active');
                    submenu.classList.remove('is-active');
                } else {
                    // 開く
                    link.classList.add('is-active');
                    submenu.classList.add('is-active');
                }
                
                // .site-headerの幅を動的に変更
                updateSiteHeaderWidth();
            });
            
            // サブメニューのリンクをクリックしたときの処理
            const submenuLinks = submenu.querySelectorAll('.header-nav__submenu-link');
            submenuLinks.forEach(submenuLink => {
                submenuLink.addEventListener('click', function() {
                    // サブメニューを閉じる
                    link.classList.remove('is-active');
                    submenu.classList.remove('is-active');
                    
                    // .site-headerの幅を元に戻す
                    updateSiteHeaderWidth();
                });
            });
        }
    });
    
    // サブメニュー外をクリックしたときに閉じる
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.header-nav__item--has-submenu')) {
            headerSubmenuParents.forEach(parent => {
                const link = parent.querySelector('.header-nav__link');
                const submenu = parent.querySelector('.header-nav__submenu');
                if (link) link.classList.remove('is-active');
                if (submenu) submenu.classList.remove('is-active');
            });
            
            // .site-headerの幅を元に戻す
            updateSiteHeaderWidth();
        }
    });
    
    // .site-headerの幅を更新する関数
    function updateSiteHeaderWidth() {
        const activeSubmenu = document.querySelector('.header-nav__submenu.is-active');
        
        if (activeSubmenu && siteHeader) {
            // サブメニューが開いている場合
            siteHeader.classList.add('has-submenu-open');
        } else if (siteHeader) {
            // サブメニューが閉じている場合
            siteHeader.classList.remove('has-submenu-open');
        }
    }
});

// 円グラフアニメーション
function initPieChartAnimation() {
    const pieCharts = document.querySelectorAll('.recruit-data__pie-chart');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const chart = entry.target;
                const employeeValue = parseInt(chart.dataset.employee);
                const contractorValue = parseInt(chart.dataset.contractor);
                const progressCircle = chart.querySelector('.recruit-data__pie-progress');
                
                // 円グラフアニメーション（stroke-dasharrayを使用）
                if (progressCircle) {
                    setTimeout(() => {
                        progressCircle.style.strokeDasharray = `${employeeValue} ${contractorValue}`;
                    }, 500);
                }
                
                // パーセンテージ表示を更新（左：業務委託、右：正社員）
                const leftPercentage = chart.querySelector('.recruit-data__pie-label-left .recruit-data__pie-percentage');
                const rightPercentage = chart.querySelector('.recruit-data__pie-label-right .recruit-data__pie-percentage');
                
                if (leftPercentage && rightPercentage) {
                    let currentContractor = 0;
                    let currentEmployee = 0;
                    const incrementContractor = contractorValue / 60;
                    const incrementEmployee = employeeValue / 60;
                    
                    const countAnimation = setInterval(() => {
                        currentContractor += incrementContractor;
                        currentEmployee += incrementEmployee;
                        
                        if (currentContractor >= contractorValue && currentEmployee >= employeeValue) {
                            currentContractor = contractorValue;
                            currentEmployee = employeeValue;
                            clearInterval(countAnimation);
                        }
                        
                        leftPercentage.textContent = Math.round(currentContractor) + '%';
                        rightPercentage.textContent = Math.round(currentEmployee) + '%';
                    }, 33);
                }
                
                observer.unobserve(chart);
            }
        });
    }, {
        threshold: 0.5
    });
    
    pieCharts.forEach(chart => {
        observer.observe(chart);
    });
}



// 男女比円グラフアニメーション
function initGenderChartAnimation() {
    const genderCharts = document.querySelectorAll('.recruit-data__gender-pie');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const chart = entry.target;
                const maleValue = parseInt(chart.dataset.male);
                const femaleValue = parseInt(chart.dataset.female);
                const progressCircle = chart.querySelector('.recruit-data__gender-progress');
                
                // 円周長の計算（半径20の場合：2 * π * 20 ≈ 125.66）
                // 100に正規化するため、実際の値をスケール
                const circumference = 125.66;
                const scaledMale = (maleValue / 100) * circumference;
                const scaledFemale = (femaleValue / 100) * circumference;
                
                // 円グラフアニメーション（stroke-dasharrayを使用）
                if (progressCircle) {
                    setTimeout(() => {
                        progressCircle.style.strokeDasharray = `${scaledMale} ${scaledFemale}`;
                    }, 500);
                }
                
                observer.unobserve(chart);
            }
        });
    }, {
        threshold: 0.5
    });
    
    genderCharts.forEach(chart => {
        observer.observe(chart);
    });
}

// 年齢構成ドーナツチャートのモーショングラフィック風アニメーション
function initAgeDonutChartAnimation() {
    const ageDonutCharts = document.querySelectorAll('.recruit-data__age-donut-svg');
    console.log('年齢構成ドーナツチャート要素数:', ageDonutCharts.length);
    
    if (ageDonutCharts.length === 0) {
        console.warn('年齢構成ドーナツチャート要素が見つかりません');
        return;
    }
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log('年齢構成ドーナツチャートが画面に表示されました');
                const svg = entry.target;
                const segments = svg.querySelectorAll('.recruit-data__age-segment');
                console.log('セグメント数:', segments.length);
                
                // SVGにアニメーション準備クラスを追加
                svg.classList.add('motion-ready');
                
                // セグメントを右回り（時計回り）の順序でソート
                const sortedSegments = Array.from(segments).sort((a, b) => {
                    const getSegmentOrder = (seg) => {
                        // HTMLでの配置順序に基づいて右回り（時計回り）で並べ替え
                        if (seg.classList.contains('recruit-data__age-segment--5')) return 1; // 65歳以上（12時方向）
                        if (seg.classList.contains('recruit-data__age-segment--4')) return 2; // 55-64歳（2時方向）
                        if (seg.classList.contains('recruit-data__age-segment--2')) return 3; // 35-44歳（4時方向）
                        if (seg.classList.contains('recruit-data__age-segment--3')) return 4; // 45-54歳（8時方向）
                        if (seg.classList.contains('recruit-data__age-segment--1')) return 5; // 20-34歳（10時方向）
                        // 専門家用のセグメント
                        if (seg.classList.contains('recruit-data__age-segment--expert-1')) return 1;
                        if (seg.classList.contains('recruit-data__age-segment--expert-2')) return 2;
                        if (seg.classList.contains('recruit-data__age-segment--expert-3')) return 3;
                        if (seg.classList.contains('recruit-data__age-segment--expert-4')) return 4;
                        if (seg.classList.contains('recruit-data__age-segment--expert-5')) return 5;
                        return 6;
                    };
                    return getSegmentOrder(a) - getSegmentOrder(b);
                });
                
                // 各セグメントに個別のアニメーションを適用
                sortedSegments.forEach((segment, index) => {
                    console.log(`セグメント ${index + 1} のアニメーション準備中`, segment.className);
                    
                    // 初期状態：透明度0に設定（スケールは使用せず）
                    segment.style.opacity = '0';
                    segment.style.transition = 'all 0.8s ease-out';
                    
                    // 段階的にアニメーション開始（各セグメントを200msずつ遅延）
                    setTimeout(() => {
                        console.log(`セグメント ${index + 1} のアニメーション開始`);
                        // フェードインアニメーション
                        segment.style.opacity = '1';
                        
                        // エフェクト追加
                        setTimeout(() => {
                            segment.style.filter = 'brightness(1.3)';
                            setTimeout(() => {
                                segment.style.filter = 'brightness(1)';
                            }, 300);
                        }, 100);
                        
                        // ホバーエフェクトは削除（不要）
                        
                        // パルスエフェクトは削除（不要）
                        
                    }, index * 200 + 300); // 初期遅延300ms + インデックス別遅延
                });
                
                // グローバルアニメーション（削除済み）
                // SVG全体の回転・スケールアニメーションは不要のため削除
                
                observer.unobserve(svg);
            }
        });
    }, {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    });
    
    ageDonutCharts.forEach(chart => {
        observer.observe(chart);
    });
}


// パルスエフェクト（削除済み）
// function addPulseEffect(segment) {
//     // パルスエフェクトは不要のため削除
// }

// メンバー数カウントアップアニメーション
function initMemberCountAnimation() {
    const memberCountElement = document.querySelector('.recruit-data__member-number');
    
    if (!memberCountElement) {
        console.log('メンバー数要素が見つかりません');
        return;
    }
    
    // 現在の数値を取得
    const targetNumber = parseInt(memberCountElement.textContent) || 195;
    console.log('カウントアップ対象数値:', targetNumber);
    
    // IntersectionObserverでスクロール検知
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log('メンバー数カウントアップ開始');
                animateCountUp(memberCountElement, targetNumber);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // メンバー数セクション全体を監視
    const memberCountSection = document.querySelector('.recruit-data__item--member-count');
    if (memberCountSection) {
        observer.observe(memberCountSection);
    }
}

// カウントアップアニメーション実行
function animateCountUp(element, targetNumber) {
    const startNumber = 0;
    const duration = 2000; // 2秒間
    const startTime = performance.now();
    
    // 初期値を0に設定
    element.textContent = '0';
    
    function updateCount(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // イージング関数（ease-out）
        const easedProgress = 1 - Math.pow(1 - progress, 3);
        
        // 現在の数値を計算
        const currentNumber = Math.floor(startNumber + (targetNumber - startNumber) * easedProgress);
        
        // 数値を更新
        element.textContent = currentNumber.toString();
        
        // アニメーション継続
        if (progress < 1) {
            requestAnimationFrame(updateCount);
        } else {
            // 最終値を確実に設定
            element.textContent = targetNumber.toString();
            console.log('メンバー数カウントアップ完了:', targetNumber);
        }
    }
    
    requestAnimationFrame(updateCount);
}

// DOMContentLoaded時に初期化
document.addEventListener('DOMContentLoaded', function() {
    // 円グラフアニメーションを初期化
    initPieChartAnimation();
    // 男女比円グラフアニメーションを初期化
    initGenderChartAnimation();
    // 年齢構成ドーナツチャートアニメーションを初期化
    initAgeDonutChartAnimation();
    // メンバー数カウントアップアニメーションを初期化
    initMemberCountAnimation();
    // メンバーポップアップを初期化
    initMemberPopup();
});

// メンバー詳細ポップアップ機能
function initMemberPopup() {
    // カスタムフィールドからメンバーデータを取得（フォールバック付き）
    let memberData = {};
    
    // WordPress から渡されたデータがあるかチェック
    if (typeof window.shipMemberData !== 'undefined' && window.shipMemberData) {
        memberData = window.shipMemberData;
        console.log('カスタムフィールドからメンバーデータを取得しました:', memberData);
    } else {
        // フォールバックデータ（従来のハードコードされたデータ）
        console.log('カスタムフィールドが見つからないため、フォールバックデータを使用します');
        memberData = {
            'oonishi': {
                department: '経営チーム',
                section: '',
                image: 'recruit-oonishi-pc-pop.webp',
                captain: {
                    name: '大西 倫加',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: []
            },
            'tamura': {
                department: 'H＆R Co-creation：',
                section: '人と資源の共創部',
                image: 'recruit-tamura-pc-pop.webp',
                captain: {
                    name: '田村 啓',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: [
                    {
                        name: '乗組員 太郎',
                        profileUrl: '#'
                    },
                    {
                        name: '乗組員 花子',
                        profileUrl: '#'
                    }
                ]
            },
            'tamura-ai': {
                department: 'AIタスクフォース：',
                section: 'AI:BOU',
                image: 'recruit-tamura-pc-pop.webp',
                captain: {
                    name: '田村 啓',
                    profileUrl: '#'
                },
                subcaptain: {
                    name: '副船長 次郎',
                    profileUrl: '#'
                },
                crew: []
            },
            'tomoda': {
                department: 'マーケティング・',
                section: 'コミュニケーション部',
                image: 'recruit-tomoda-pc-pop.webp',
                captain: {
                    name: '友田 雄俊',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: [
                    {
                        name: '乗組員 一郎',
                        profileUrl: '#'
                    }
                ]
            },
            'tsuji': {
                department: 'バックオフィス',
                section: '',
                image: 'recruit-tsuji-pc-pop.webp',
                captain: {
                    name: '辻 優子',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: []
            },
            'nakayama': {
                department: 'YouTube・SNS',
                section: 'マーケティング',
                image: 'recruit-nakayama-pc-pop.webp',
                captain: {
                    name: '中山 夏美',
                    profileUrl: '#'
                },
                subcaptain: {
                    name: '副船長 三郎',
                    profileUrl: '#'
                },
                crew: [
                    {
                        name: '乗組員 四郎',
                        profileUrl: '#'
                    },
                    {
                        name: '乗組員 五郎',
                        profileUrl: '#'
                    }
                ]
            },
            'yokoyama': {
                department: 'だいち災害リスク',
                section: '研究所',
                image: 'recruit-yokoyama-pc-pop.webp',
                captain: {
                    name: '横山 芳春',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: []
            },
            'yamamoto': {
                department: '住まいと暮らし事業部',
                section: 'マンション管理コンサルティング',
                image: 'recruit-yamamoto-pc-pop.webp',
                captain: {
                    name: '山本 直彌',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: []
            },
            'yamamoto-rakuda': {
                department: 'らくだ不動産',
                section: '',
                image: 'recruit-yamamoto-pc-pop.webp',
                captain: {
                    name: '山本 直彌',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: []
            },
            'tomoda-home': {
                department: '住まいと暮らし事業部',
                section: 'ホームインスペクション',
                image: 'recruit-tomoda-pc-pop.webp',
                captain: {
                    name: '友田 雄俊',
                    profileUrl: '#'
                },
                subcaptain: null,
                crew: []
            }
        };
    }

    // DOM要素の取得
    const popup = document.getElementById('member-popup');
    const overlay = document.getElementById('member-popup-overlay');
    const closeBtn = document.getElementById('member-popup-close');
    const popupImage = document.getElementById('member-popup-image');
    const popupDepartment = document.getElementById('member-popup-department');
    const popupSection = document.getElementById('member-popup-section');
    
    // 船長・副船長・乗組員の要素
    const captainWrapper = document.getElementById('member-popup-captain-wrapper');
    const captainName = document.getElementById('member-popup-captain');
    const captainProfileBtn = document.getElementById('member-popup-captain-profile-btn');
    
    const subcaptainWrapper = document.getElementById('member-popup-subcaptain-wrapper');
    const subcaptainName = document.getElementById('member-popup-subcaptain');
    const subcaptainProfileBtn = document.getElementById('member-popup-subcaptain-profile-btn');
    
    const crewWrapper = document.getElementById('member-popup-crew-wrapper');
    const crewList = document.getElementById('member-popup-crew-list');
    
    const ships = document.querySelectorAll('.recruit-fleet__ship[data-member]');

    if (!popup || !ships.length) return;

    // 船カードクリック時の処理
    ships.forEach(ship => {
        ship.addEventListener('click', function() {
            const memberId = this.dataset.member;
            const member = memberData[memberId];
            
            if (member) {
                // ポップアップにデータを設定
                const templateDir = window.themeData?.themeUrl || 
                                 window.location.origin + '/wp-content/themes/sakura-wordpress2';
                
                popupImage.src = `${templateDir}/images/${member.image}`;
                popupImage.alt = member.captain?.name || '船員';
                popupDepartment.textContent = member.department;
                popupSection.textContent = member.section || '';
                
                // 船長情報の設定
                if (member.captain && captainWrapper && captainName && captainProfileBtn) {
                    captainName.textContent = member.captain.name;
                    captainProfileBtn.href = member.captain.profileUrl;
                    captainWrapper.style.display = 'block';
                } else if (captainWrapper) {
                    captainWrapper.style.display = 'none';
                }
                
                // 副船長情報の設定
                if (member.subcaptain && subcaptainWrapper && subcaptainName && subcaptainProfileBtn) {
                    subcaptainName.textContent = member.subcaptain.name;
                    subcaptainProfileBtn.href = member.subcaptain.profileUrl;
                    subcaptainWrapper.style.display = 'block';
                } else if (subcaptainWrapper) {
                    subcaptainWrapper.style.display = 'none';
                }
                
                // 乗組員情報の設定
                if (member.crew && member.crew.length > 0 && crewWrapper && crewList) {
                    crewList.innerHTML = ''; // リストをクリア
                    
                    member.crew.forEach(crewMember => {
                        const crewItem = document.createElement('div');
                        crewItem.className = 'member-popup__crew-item';
                        
                        const crewNameEl = document.createElement('p');
                        crewNameEl.className = 'member-popup__member-name';
                        crewNameEl.textContent = crewMember.name;
                        
                        crewItem.appendChild(crewNameEl);
                        crewList.appendChild(crewItem);
                    });
                    
                    crewWrapper.style.display = 'block';
                } else if (crewWrapper) {
                    crewWrapper.style.display = 'none';
                }
                
                // ポップアップを表示
                showPopup();
            }
        });
    });

    // ポップアップを表示する関数
    function showPopup() {
        popup.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        // フェードインアニメーション
        popup.style.opacity = '0';
        popup.style.display = 'flex';
        
        requestAnimationFrame(() => {
            popup.style.transition = 'opacity 0.3s ease';
            popup.style.opacity = '1';
        });
    }

    // ポップアップを非表示にする関数
    function hidePopup() {
        popup.style.transition = 'opacity 0.3s ease';
        popup.style.opacity = '0';
        
        setTimeout(() => {
            popup.classList.remove('show');
            popup.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }

    // 閉じるボタンクリック時の処理
    if (closeBtn) {
        closeBtn.addEventListener('click', hidePopup);
    }

    // オーバーレイクリック時の処理
    if (overlay) {
        overlay.addEventListener('click', hidePopup);
    }

    // ESCキーで閉じる
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && popup.classList.contains('show')) {
            hidePopup();
        }
    });

    // ポップアップ内容部分をクリックしても閉じないようにする
    const popupContent = popup.querySelector('.member-popup__content');
    if (popupContent) {
        popupContent.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
}


// DOM完全読み込み後に実行
document.addEventListener('DOMContentLoaded', function() {
    // 採用ページの判定とクラス追加
    const isRecruitPage = document.querySelector('.recruit'); // main要素にrecruitクラスがあるかチェック
    if (isRecruitPage) {
        document.body.classList.add('recruit-page');
        console.log('採用ページとして認識されました');
    }
    
    // 縦ハンバーガーメニューの処理
    const recruitHamburger = document.getElementById('recruit-hamburger');
    const siteHeader = document.querySelector('.site-header');
    
    if (recruitHamburger && siteHeader && isRecruitPage) {
        let isHeaderVisible = false;
        
        recruitHamburger.addEventListener('click', function() {
            console.log('縦ハンバーガーメニューがクリックされました');
            
            if (isHeaderVisible) {
                // ヘッダーを非表示
                siteHeader.classList.remove('is-visible');
                recruitHamburger.classList.remove('is-active');
                isHeaderVisible = false;
                console.log('ヘッダーを非表示にしました');
            } else {
                // ヘッダーを表示
                siteHeader.classList.add('is-visible');
                recruitHamburger.classList.add('is-active');
                isHeaderVisible = true;
                console.log('ヘッダーを表示しました');
            }
        });
        
        // ヘッダー以外をクリックしたときにヘッダーを非表示
        document.addEventListener('click', function(e) {
            // ヘッダーまたはハンバーガーメニューをクリックした場合は何もしない
            if (e.target.closest('.site-header') || e.target.closest('.recruit-hamburger')) {
                return;
            }
            
            // ヘッダーが表示されている場合は非表示にする
            if (isHeaderVisible) {
                siteHeader.classList.remove('is-visible');
                recruitHamburger.classList.remove('is-active');
                isHeaderVisible = false;
                console.log('外部クリックによりヘッダーを非表示にしました');
            }
        });
        
        // ESCキーでヘッダーを非表示
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isHeaderVisible) {
                siteHeader.classList.remove('is-visible');
                recruitHamburger.classList.remove('is-active');
                isHeaderVisible = false;
                console.log('ESCキーによりヘッダーを非表示にしました');
            }
        });
    }

    // midnightjsの初期化
    // セクションごとに異なるヘッダー色を設定
    $('.site-header').midnight({
      // セクションのdata属性とヘッダースタイルの対応を設定
      headerClass: 'midnightHeader',
      innerClass: 'midnightInner',
      defaultClass: 'default',
      sectionSelector: 'midnight-section', // data-midnight属性を持つ要素を選択
    });   
});