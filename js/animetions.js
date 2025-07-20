document.addEventListener('DOMContentLoaded', function() {
    // GSAP と ScrollTrigger を登録
    gsap.registerPlugin(ScrollTrigger);
    
    // front-page__heroセクションをピン留め
    ScrollTrigger.create({
        trigger: ".front-page__hero",
        start: "top top",
        end: "bottom top",
        pin: true,
        pinSpacing: false,
        id: "hero-pin"
    });
    
    // recruit-heroセクションをピン留め（採用ページ用）
    const recruitHero = document.querySelector('.recruit-hero');
    if (recruitHero) {
        ScrollTrigger.create({
            trigger: ".recruit-hero",
            start: "top top",
            end: "bottom top",
            pin: true,
            pinSpacing: false,
            id: "recruit-hero-pin"
        });
    }
    
    // 実績セクションのピン留め設定関数
    function setupAchievementsPin() {
        // 既存のピン設定を削除（もし存在すれば）
        const existingPin = ScrollTrigger.getById("achievements-pin");
        if (existingPin) {
            existingPin.kill();
        }
    }
    
    // 初期設定を適用
    setupAchievementsPin();
    
    // リサイズイベントの監視
    window.addEventListener('resize', function() {
        // リサイズ時にピン設定を再適用
        setupAchievementsPin();
    });

    // ギャラリースワイパーのスライドが一瞬止まる問題を修正
    // スワイパーインスタンスが作成された後に実行
    setTimeout(() => {
        // すべてのスライドのCSS遷移を直接上書き
        const slides = document.querySelectorAll('.gallery-swiper__slide');
        slides.forEach(slide => {
            slide.style.transition = 'none';
        });
        
        // スワイパーラッパーの遷移タイミング関数を強制的にリニアに
        const wrappers = document.querySelectorAll('.gallery-swiper__wrapper');
        wrappers.forEach(wrapper => {
            wrapper.style.transitionTimingFunction = 'linear';
        });
    }, 100);

    // 1. 対象コンテナを取得
// ギャラリーコンテナ取得
// const gallery = document.querySelector('.front-page__gallery');
// セクション幅・高さから対角距離を取得
// const dist = Math.hypot(gallery.offsetWidth, gallery.offsetHeight);
// セクションのページトップ位置
// const galleryTop = gallery.getBoundingClientRect().top + window.pageYOffset;

// 1) メインScrollTrigger：セクション全体をピンして動作領域を確保
// ScrollTrigger.create({
//   trigger: gallery,
//   start: 'top top',        // セクション到達でピン開始
//   end: `+=${dist + 1000}`, 
//   scrub: true,             // スクロール同期
//   pin: true,               // ピン留め
//   pinSpacing: true         // ピン中にスペースを確保
// });

// 2) ステップ1：最初の50pxでY方向に上移動
// ScrollTrigger.create({
//   animation: gsap.to('.gallery__side--left, .gallery__side--right', {
//     y: -1000,
//     ease: 'power2.inOut'
//   }),
//   start: galleryTop + ' top',            // セクション開始位置
//   end: galleryTop + 1000 + ' top',         // 開始位置+50px
//   scrub: true,
// });

// 3) ステップ2：続く対角距離で斜め移動
// ScrollTrigger.create({
//   animation: gsap.timeline()
//     .to('.gallery__side--left', {
//       xPercent: -50,
//       yPercent: -50,
//       ease: 'none'
//     }, 0)
//     .to('.gallery__side-left-wrapper', {
//         xPercent: -50,
//         ease: 'none'
//       }, 0)
//     .to('.gallery__side--right', {
//       xPercent: 50,
//       yPercent: -50,
//       ease: 'none'
//     }, 0)
//     .to('.gallery__side-right-wrapper', {
//         xPercent: 50,
//         ease: 'none'
//       }, 0),
//   start: galleryTop + 1000 + ' top',       // 初期50px移動後の位置
//   end: galleryTop + 1000 + dist + ' top',  // +対角距離分
//   scrub: true
// });

    
    // ヒーロータイトルのアニメーション（デバイス対応版）
    function animateHeroTitle() {
        const heroTitle = document.querySelector('.front-page__hero-title');
        if (!heroTitle) return;
        
        console.log('Hero title found, starting animation');
        
        // 初期状態を設定
        gsap.set(heroTitle, { 
            opacity: 0,
            scale: 0.8,
            y: 20
        });
        
        // デバイスによってアニメーションの内容を調整
        const isMobile = window.innerWidth <= 768;
        
        // メインアニメーション
        gsap.to(heroTitle, {
            opacity: 1,
            scale: 1,
            y: 0,
            duration: isMobile ? 1 : 1.5,
            ease: "power3.out",
            delay: 0.3,
            onStart: function() {
                console.log('Hero title animation started');
            },
            onComplete: function() {
                console.log('Hero title animation completed');
                heroTitle.style.opacity = 1; // 確実に表示状態にする
            }
        });
        
        // スクロールトリガーでフェードアウト - 削除
        // タイトルは一度表示されたら常に表示される
    }

    // 画像とビデオの読み込み完了を確認してからアニメーションを開始
    window.addEventListener('load', function() {
        // ヒーローアニメーションを実行
        animateHeroTitle();
    });

    // 念のため、DOMContentLoaded後にも少し遅延させてアニメーションを実行
    setTimeout(animateHeroTitle, 500);

    // =====================================================
    // Philosophy 画像拡大アニメーション制御
    // =====================================================
    
    function initPhilosophyCircleAnimation() {
        const circleElement = document.querySelector('.philosophy-circle-bg');
        const philosophySection = document.querySelector('.philosophy');
        const philosophyMvBottom = document.querySelector('.philosophy-mv-bottom');
        const philosophyContent = document.querySelector('.philosophy-content');
        
        if (!circleElement || !philosophySection) {
            console.log('Philosophy circle elements not found');
            return;
        }

        console.log('Philosophy image animation elements found!');
        console.log('Circle element:', circleElement);
        console.log('Philosophy section:', philosophySection);

        // GSAPのScrollTriggerを使用して画像拡大アニメーションを設定
        gsap.registerPlugin(ScrollTrigger);

        // 画像の最終サイズを計算（画面の対角線の6倍で圧倒的な拡大効果）
        const maxSize = Math.max(window.innerWidth, window.innerHeight) * 6;

        // philosophy-mv-bottomの初期状態を設定
        if (philosophyMvBottom) {
            gsap.set(philosophyMvBottom, {
                opacity: 0,
                y: 30
            });
        }

        // philosophy-contentの初期状態を設定
        if (philosophyContent) {
            gsap.set(philosophyContent, {
                opacity: 0,
                y: 30
            });
        }

        // メインタイムライン（画像拡大 + セクションpin留め）
        const mainTimeline = gsap.timeline({
            scrollTrigger: {
                trigger: philosophySection,
                start: "top top",
                end: "+=100%",
                scrub: 1.5,
                pin: true,
                pinSpacing: true,
                anticipatePin: 1,
                onStart: function() {
                    console.log('Philosophy image expansion animation started with pin');
                },
                onComplete: function() {
                    console.log('Philosophy image expansion animation completed, pin released');
                }
            }
        });

        // 画像拡大アニメーション
        mainTimeline
            .fromTo(circleElement, 
                {
                    opacity: 1,
                    width: "20px",
                    height: "20px"
                },
                {
                    opacity: 1,
                    duration: 0.1,
                    ease: "none"
                }, 0)
            .to(circleElement, {
                width: maxSize + "px",
                height: maxSize + "px",
                duration: 1,
                ease: "power2.out"
            }, 0.1);

        // philosophy-mv-bottomのスクラブアニメーション（別のScrollTrigger）
        if (philosophyMvBottom) {
            gsap.timeline({
                scrollTrigger: {
                    trigger: philosophySection,
                    start: "top top",
                    end: "+=50%", // アニメーション期間を延長してゆっくりに
                    scrub: true, // スクロール同期アニメーション
                    onStart: function() {
                        console.log('Philosophy mv-bottom scrub animation started');
                    },
                    onUpdate: function(self) {
                        console.log('Philosophy mv-bottom scrub progress:', self.progress);
                    }
                }
            })
            .to(philosophyMvBottom, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out"
            });
        }

        // philosophy-contentのスクラブアニメーション（別のScrollTrigger）
        if (philosophyContent) {
            gsap.timeline({
                scrollTrigger: {
                    trigger: philosophySection,
                    start: "+=10%", // 出現タイミングを早める（20%→10%）
                    end: "+=70%", // アニメーション期間を延長してゆっくりに
                    scrub: true, // スクロール同期アニメーション
                    onStart: function() {
                        console.log('Philosophy content scrub animation started');
                    },
                    onUpdate: function(self) {
                        console.log('Philosophy content scrub progress:', self.progress);
                    }
                }
            })
            .to(philosophyContent, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out"
            });
        }

        console.log('Philosophy scrub animations initialized');
    }

    // アニメーションの初期化
    console.log('Starting philosophy animations initialization...');
    initPhilosophyCircleAnimation(); // 画像拡大アニメーション
});

