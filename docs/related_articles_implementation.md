# 関連記事セクション実装レポート

## 実装概要
Figmaデザイン（node-id=4001-37）に基づいて、採用詳細ページに関連記事セクションを実装しました。

## デザイン仕様
### 構成要素
- 3つのリンクボタンが縦に配置
- 各ボタンは角丸のボーダー付きデザイン（#1e656d）
- 右側に矢印アイコン付き
- 中央の特別なインタビュー記事ボタン（高さ90px）

### デザイン特徴
- 通常のボタン：50px高、30px角丸
- インタビューボタン：90px高、40px角丸
- ホバーエフェクト：矢印の移動、背景色変更、影の追加

## 実装詳細

### HTML実装 (page-recruit-detail.php)
```html
<!-- 関連記事 -->
<div class="recruit-detail__content-item">
    <div class="recruit-detail__job-card">
        <div class="recruit-detail__job-card-header">
            <h2 class="recruit-detail__job-card-header-title">関連記事</h2>
        </div>
        <div class="recruit-detail__job-card-content">
            <div class="recruit-detail__related-articles">
                <!-- 3つの記事リンク -->
                <div class="recruit-detail__article-item">
                    <a href="#" class="recruit-detail__article-link">
                        <span class="recruit-detail__article-title">らくだ不動産の在り方</span>
                        <div class="recruit-detail__article-arrow">
                            <!-- SVG矢印アイコン -->
                        </div>
                    </a>
                </div>
                
                <div class="recruit-detail__article-item recruit-detail__article-item--interview">
                    <a href="#" class="recruit-detail__article-link">
                        <div class="recruit-detail__interview-content">
                            <span class="recruit-detail__article-title">【インタビュー｜山本 直彌】</span>
                            <p class="recruit-detail__interview-subtitle">正しいと信じることをやって、一人でも多くの人を救いたい</p>
                        </div>
                        <div class="recruit-detail__article-arrow">
                            <!-- SVG矢印アイコン -->
                        </div>
                    </a>
                </div>
                
                <div class="recruit-detail__article-item">
                    <a href="#" class="recruit-detail__article-link">
                        <span class="recruit-detail__article-title">らくだ不動産の在り方</span>
                        <div class="recruit-detail__article-arrow">
                            <!-- SVG矢印アイコン -->
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
```

### SCSS実装 (_recruit.scss)
```scss
// 関連記事セクション
.recruit-detail__related-articles {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-top: 20px;
}

.recruit-detail__article-item {
  position: relative;
  
  &--interview {
    height: 90px;
  }
}

.recruit-detail__article-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px 22px;
  border: 2px solid #1e656d;
  border-radius: 30px;
  text-decoration: none;
  background: #ffffff;
  transition: all 0.3s ease;
  height: 50px;
  min-height: 50px;
  
  &:hover {
    background-color: #f8f9fa;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(30, 101, 109, 0.1);
  }
}

.recruit-detail__article-item--interview .recruit-detail__article-link {
  height: 90px;
  min-height: 90px;
  border-radius: 40px;
  align-items: flex-start;
  padding-top: 20px;
}

.recruit-detail__article-title {
  font-family: 'Albert Sans', sans-serif;
  font-weight: 600;
  font-size: 16px;
  color: #00293c;
  line-height: 1.2;
  flex: 1;
  @include mq("md") {
    font-size: 14px;
  }
}

.recruit-detail__interview-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.recruit-detail__interview-subtitle {
  font-family: 'Albert Sans', sans-serif;
  font-weight: 400;
  font-size: 10.5px;
  color: #00293c;
  line-height: 1.4;
  margin: 0;
  @include mq("md") {
    font-size: 9px;
  }
}

.recruit-detail__article-arrow {
  flex-shrink: 0;
  margin-left: 16px;
  
  svg {
    display: block;
    transition: transform 0.3s ease;
  }
}

.recruit-detail__article-link:hover .recruit-detail__article-arrow svg {
  transform: translateX(2px);
}
```

## 技術仕様

### フォント
- タイトル：Albert Sans, 600 weight, 16px（モバイル：14px）
- サブタイトル：Albert Sans, 400 weight, 10.5px（モバイル：9px）

### カラーパレット
- ボーダー色：#1e656d
- テキスト色：#00293c
- 背景色：#ffffff
- ホバー背景色：#f8f9fa

### レスポンシブ対応
- mdブレークポイント以下でフォントサイズを調整
- アイコンサイズとレイアウトは維持

### インタラクション
- ホバー時の矢印移動エフェクト
- 背景色変更
- 上向き移動（1px）
- 影の追加

## ファイル変更履歴
1. `page-recruit-detail.php`: 関連記事セクションのHTML追加（159行目から）
2. `sass/base/_recruit.scss`: 関連記事用のSCSSスタイル追加（716行目から）

## 完成状況
✅ HTML構造の実装完了
✅ SCSS スタイルの実装完了
✅ レスポンシブ対応完了
✅ ホバーエフェクト実装完了
✅ SVGアイコン実装完了
✅ Figmaデザインとの完全一致確認

## 実装日時
2025年1月13日

## 備考
- リンク先は現在プレースホルダー（#）に設定
- 実際の記事URLは後で設定が必要
- アイコンはFigmaから抽出した正確なSVGを使用 