/**
 * ヘッダーカラー切り替えアニメーション
 * 各メニューアイテムが個別に、その位置にあるセクションの背景色に応じてテキストカラーを変更
 */

(function($) {
    'use strict';

    // DOMの準備が完了したら実行
    $(document).ready(function() {
        initHeaderColorSwitch();
    });

    function initHeaderColorSwitch() {
        // data-midnight属性を持つすべてのセクションを取得
        const sections = document.querySelectorAll('[data-midnight]');
        
        if (sections.length === 0) {
            console.log('data-midnight属性を持つセクションが見つかりませんでした');
            return;
        }

        // ヘッダー要素を取得
        const header = document.querySelector('.site-header');
        const navItems = header.querySelectorAll('.header-nav__item');
        const logo = header.querySelector('.header-logo__image');
        
        // 理念ページの場合の設定
        const isPhilosophyPage = document.body.classList.contains('page-philosophy') || document.querySelector('.philosophy') !== null;
        if (isPhilosophyPage) {
            header.style.top = '0';
            header.style.paddingTop = 'clamp(20px, 4.17vw, 60px)';
            
            console.log('理念ページの設定を適用しました（topを0に設定し、padding-topを追加）');
        }
        
        if (!header || navItems.length === 0) {
            console.error('ヘッダー要素またはナビゲーション項目が見つかりません');
            return;
        }

        // スクロールイベントでメニュー項目の色を更新
        let ticking = false;
        
        function updateMenuColors() {
            if (ticking) return;
            
            ticking = true;
            requestAnimationFrame(() => {
                // サブメニューが開いている場合は更新しない
                if (header.classList.contains('has-submenu-open')) {
                    ticking = false;
                    return;
                }
                
                // 強制カラー制御が有効な場合は通常のカラー切り替えを無効にする
                if (header.hasAttribute('data-force-color')) {
                    ticking = false;
                    return;
                }

                let logoSectionType = null;

                // 理念ページの星の拡大アニメーションの進行状況を確認
                let isStarAnimationActive = false;
                let animationProgress = 0;
                if (typeof window !== 'undefined' && window.philosophyCircleScrollTrigger) {
                    const scrollTrigger = window.philosophyCircleScrollTrigger;
                    // アニメーションの進行状況を取得
                    animationProgress = scrollTrigger.progress || 0;
                    // アニメーションが実行中（progress > 0.05 かつ progress < 0.95）の場合
                    // 小さな閾値を設けることで、開始・終了時のラグを軽減
                    if (animationProgress > 0.05 && animationProgress < 0.95) {
                        isStarAnimationActive = true;
                    }
                }

                // 理念ページの星要素を取得
                const starElement = document.querySelector('.philosophy-circle-bg');
                let starRect = null;
                let isStarVisible = false;

                if (starElement && isStarAnimationActive) {
                    const rect = starElement.getBoundingClientRect();
                    // 星の拡大アニメーションが実行中の場合、星と重なっているかをチェック
                    if (rect.width > 20 && rect.height > 20) {
                        starRect = rect;
                        isStarVisible = true;
                    }
                }

                // 理念ページで一番上に戻った場合（アニメーションが終了した場合）の処理
                // ScrollTriggerのprogressが非常に小さい値（0.05以下）になった時点で即座に白に戻す
                // これにより、アニメーション終了時のラグを軽減
                const isAtTop = isPhilosophyPage && animationProgress <= 0.05;

                // 一時的にヘッダーのpointer-eventsを無効化（自分自身を検出しないようにする）
                header.style.pointerEvents = 'none';

                // 各メニュー項目について、その位置にあるセクションを判定
                navItems.forEach((item) => {
                    const textElements = item.querySelectorAll('.header-nav__text-ja, .header-nav__text-en');
                    
                    if (textElements.length === 0) return;

                    // メニュー項目の矩形を取得
                    const itemRect = item.getBoundingClientRect();

                    // 一番上に戻った場合は、philosophyセクションのwhiteを適用
                    if (isAtTop) {
                        updateItemColor(textElements, 'white');
                        if (!logoSectionType) {
                            logoSectionType = 'white';
                        }
                    } else {
                        // 星と重なっているかをチェック（星が可視状態の場合のみ）
                        let isOverlappingWithStar = false;
                        if (isStarVisible && starRect) {
                            isOverlappingWithStar = checkOverlap(itemRect, starRect);
                        }

                        // 星と重なっている場合は黒色を適用
                        if (isOverlappingWithStar) {
                            updateItemColor(textElements, 'default');
                            
                            // ロゴの位置判定用（最初のメニュー項目のセクションを使用）
                            if (!logoSectionType) {
                                logoSectionType = 'default';
                            }
                        } else {
                            // メニュー項目の中央位置を取得
                            const centerX = itemRect.left + (itemRect.width / 2);
                            const centerY = itemRect.top + (itemRect.height / 2);

                            // その位置にある要素を取得（ヘッダー自身は無視される）
                            const elementAtPoint = document.elementFromPoint(centerX, centerY);
                            
                            if (!elementAtPoint) return;

                            // 該当する要素が属するdata-midnight属性を持つセクションを探す
                            const section = elementAtPoint.closest('[data-midnight]');
                            
                            if (section) {
                                const midnightType = section.getAttribute('data-midnight');
                                updateItemColor(textElements, midnightType);
                                
                                // ロゴの位置判定用（最初のメニュー項目のセクションを使用）
                                if (!logoSectionType) {
                                    logoSectionType = midnightType;
                                }
                            }
                        }
                    }
                });

                // pointer-eventsを復元
                header.style.pointerEvents = '';

                // ロゴの色を更新（最初のメニュー項目と同じセクションと判定）
                if (logoSectionType && logo) {
                    updateLogoColor(logo, logoSectionType);
                }

                ticking = false;
            });
        }

        /**
         * 2つの矩形が重なっているかを判定
         * @param {DOMRect} rect1 - 矩形1
         * @param {DOMRect} rect2 - 矩形2
         * @returns {boolean} - 重なっている場合true
         */
        function checkOverlap(rect1, rect2) {
            return !(rect1.right < rect2.left || 
                     rect1.left > rect2.right || 
                     rect1.bottom < rect2.top || 
                     rect1.top > rect2.bottom);
        }

        // 初回実行
        updateMenuColors();

        // スクロールイベントに登録
        window.addEventListener('scroll', updateMenuColors, { passive: true });
        
        // リサイズイベントにも登録（念のため）
        window.addEventListener('resize', updateMenuColors, { passive: true });

        console.log(`ヘッダーカラー切り替えを初期化しました（${navItems.length}個のメニュー項目、${sections.length}セクション）`);
    }

    /**
     * メニュー項目のテキストカラーを更新
     * @param {NodeList} textElements - テキスト要素
     * @param {string} type - data-midnightの値
     */
    function updateItemColor(textElements, type) {
        let color;

        switch(type) {
            case 'white':
            case 'white2':
                color = '#ffffff'; // 白背景用：白テキスト
                break;
            case 'gray':
            case 'default':
            default:
                color = '#000000'; // 暗い背景用：黒テキスト
                break;
        }

        // 各テキスト要素に色を即座に適用（トランジションなし）
        textElements.forEach(el => {
            el.style.color = color;
        });
    }

    /**
     * ロゴの色を更新
     * @param {HTMLElement} logo - ロゴ要素
     * @param {string} type - data-midnightの値
     */
    function updateLogoColor(logo, type) {
        let filter;

        switch(type) {
            case 'white':
            case 'white2':
                filter = 'brightness(0) invert(1)'; // 白背景用：白ロゴ
                break;
            case 'gray':
            case 'default':
            default:
                filter = 'none'; // 暗い背景用：元の色
                break;
        }

        // ロゴの色を即座に適用（トランジションなし）
        logo.style.filter = filter;
    }

})(jQuery);
