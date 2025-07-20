# 募集要項セクション実装レポート

## 実装概要
Figmaデザイン（node-id=4001-48）に基づいて、採用詳細ページに募集要項セクションを実装しました。

## デザイン仕様
### 構成要素
- 8つの詳細項目（募集職名、雇用形態、給与、勤務地、営業経験、会社紹介、募集背景、職種詳細）
- 各項目に青い丸アイコン（#1e656d、11px）
- 左側にアイコン、右側にコンテンツの2カラムレイアウト
- 長文コンテンツを含む詳細な説明

### デザイン特徴
- アイコン：11px円形、#1e656d色
- タイトル：Albert Sans 600 weight、16px（モバイル：14px）
- 本文：Albert Sans 400 weight、12px（モバイル：11px）
- 行間：1.67倍
- 項目間マージン：34px

## 実装詳細

### HTML実装 (page-recruit-detail.php)
```html
<!-- 募集要項 -->
<div class="recruit-detail__content-item">
    <div class="recruit-detail__job-card">
        <div class="recruit-detail__job-card-header">
            <h3 class="recruit-detail__job-card-header-title">募集要項</h3>
        </div>
        <div class="recruit-detail__job-card-content">
            <div class="recruit-detail__requirements">
                <!-- 8つの要項項目 -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">募集職名</h4>
                        <p class="recruit-detail__requirement-text">営業職（提案型・コンサルティング営業）</p>
                    </div>
                </div>
                
                <!-- 雇用形態 -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">雇用形態</h4>
                        <p class="recruit-detail__requirement-text">正社員、フルタイム</p>
                    </div>
                </div>
                
                <!-- 給与（複数段落） -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">給与</h4>
                        <div class="recruit-detail__requirement-text">
                            <p>年収 3,500,000円 ～ 4,500,000円</p>
                            <p>・年俸制（賞与含む、月給は固定残業代30時間分を含む）<br>
                            ・会社実績に応じて、決算賞与の支給実績有り！<br>
                            ・試用期間6ヶ月（同条件、但し賞与算定期間外）</p>
                        </div>
                    </div>
                </div>
                
                <!-- 勤務地 -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">勤務地</h4>
                        <p class="recruit-detail__requirement-text">〒150-0031<br>
                        東京都渋谷区桜丘町29-24桜丘リージェンシー101号</p>
                    </div>
                </div>
                
                <!-- 営業経験に関する質問（長文） -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">これまでの営業経験で、違和感を感じた<br>ことはありませんか？</h4>
                        <div class="recruit-detail__requirement-text">
                            <p>「お客様のためになっていないかもしれない提案をしてしまった」</p>
                            <p>「数字のために、本音を押し殺してしまった」</p>
                            <p>「本当はもっと、心から喜ばれる仕事がしたいのに…」</p>
                            <p>そんな想いを抱えていたあなたへ。</p>
                            <p>私たちさくら事務所は、"売らない営業"を貫く、少し変わった会社です。</p>
                            <p>目の前のお客様にとって「何が最善か？」を一緒にとことん考えること、それがあなたの仕事です。</p>
                        </div>
                    </div>
                </div>
                
                <!-- 会社紹介 -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">株式会社さくら事務所は</h4>
                        <div class="recruit-detail__requirement-text">
                            <p>1999年創業。NHKドラマ『正直不動産』の監修企業。</p>
                            <p>不動産業界でいち早く「ホームインスペクション（住宅診断）」を世に広めた、第三者性にこだわる不動産コンサルティングのパイオニアです。</p>
                            <p>どこの不動産会社・施工会社とも資本関係を持たず、徹底して中立な立場で、お客様に「本当に必要な情報」を提供する。</p>
                            <p>私たちが掲げるのは、依頼者、自分、会社、業界、そして社会全体の幸福を目指す「五方良し」の精神です。</p>
                        </div>
                    </div>
                </div>
                
                <!-- 募集背景 -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">募集背景</h4>
                        <div class="recruit-detail__requirement-text">
                            <p>私たちのサービスは今、多くのマンション管理組合や住宅売買を検討されている個人の方から信頼をいただいています。</p>
                            <p>一件一件に真摯に向き合うため、今回は営業経験をもとに新しい事業やサービスの新規開発や運営を共に担ってくださる仲間を募集します。</p>
                            <p>「数字のために売る」ことに違和感を覚えた方。</p>
                            <p>「もっと正直に、本質的な提案がしたい」と感じていた方。</p>
                            <p>ここには、あなたの経験を活かしながら、納得のいく働き方ができる場所があります。</p>
                        </div>
                    </div>
                </div>
                
                <!-- 職種詳細（リスト付き） -->
                <div class="recruit-detail__requirement-item">
                    <div class="recruit-detail__requirement-icon"></div>
                    <div class="recruit-detail__requirement-content">
                        <h4 class="recruit-detail__requirement-title">募集職種：営業職<br>（提案型・コンサルティング営業）</h4>
                        <div class="recruit-detail__requirement-text">
                            <p><strong>▼業務内容</strong></p>
                            <p>あなたにお任せするのは、「売る営業」ではなく「聴く営業」</p>
                            <p>お客様の想い・状況・課題を深く丁寧に聴き、その上で"本当に必要なサービス"を一緒に見出していきます。あなたの営業経験やご実績をもとに、ご活躍が期待できる領域をお任せいたします。</p>
                            <p><strong>&lt;例&gt;</strong></p>
                            <ul class="recruit-detail__requirement-list">
                                <li>お問い合わせのあった個人・法人・管理組合さまへのヒアリング、本当にその方に必要なことのご提案（本当に必要であれば、当社サービスではなく他社サービスを紹介することもあります）</li>
                                <li>お客様のニーズに応じたコンサルサービスの提案</li>
                                <li>ご自身の経験や現場の声を活かした新サービス開発への参加も可能！</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### SCSS実装 (_recruit.scss)
```scss
// 募集要項セクション
.recruit-detail__requirements {
  margin-top: 20px;
}

.recruit-detail__requirement-item {
  display: flex;
  align-items: flex-start;
  margin-bottom: 34px;
  
  &:last-child {
    margin-bottom: 0;
  }
}

.recruit-detail__requirement-icon {
  width: 11px;
  height: 11px;
  background-color: #1e656d;
  border-radius: 50%;
  margin-right: 22px;
  margin-top: 4px;
  flex-shrink: 0;
}

.recruit-detail__requirement-content {
  flex: 1;
  max-width: 320px;
}

.recruit-detail__requirement-title {
  font-family: 'Albert Sans', sans-serif;
  font-weight: 600;
  font-size: 16px;
  color: #00293c;
  line-height: 1.375;
  margin: 0 0 8px 0;
  @include mq("md") {
    font-size: 14px;
  }
}

.recruit-detail__requirement-text {
  font-family: 'Albert Sans', sans-serif;
  font-weight: 400;
  font-size: 12px;
  color: #000000;
  line-height: 1.67;
  margin: 0;
  
  p {
    margin: 0 0 8px 0;
    
    &:last-child {
      margin-bottom: 0;
    }
  }
  
  strong {
    font-weight: 600;
  }
  
  @include mq("md") {
    font-size: 11px;
  }
}

.recruit-detail__requirement-list {
  margin: 8px 0 0 18px;
  padding: 0;
  list-style: disc;
  
  li {
    font-family: 'Albert Sans', sans-serif;
    font-weight: 400;
    font-size: 12px;
    color: #000000;
    line-height: 1.67;
    margin-bottom: 4px;
    
    &:last-child {
      margin-bottom: 0;
    }
    
    @include mq("md") {
      font-size: 11px;
    }
  }
}
```

## 技術仕様

### フォント
- タイトル：Albert Sans, 600 weight, 16px（モバイル：14px）
- 本文：Albert Sans, 400 weight, 12px（モバイル：11px）
- 強調：Albert Sans, 600 weight

### カラーパレット
- アイコン色：#1e656d
- タイトル色：#00293c
- 本文色：#000000

### レイアウト
- アイコンサイズ：11px × 11px
- アイコン右マージン：22px
- アイコン上マージン：4px（テキストとの位置調整）
- 項目間マージン：34px
- コンテンツ最大幅：320px

### レスポンシブ対応
- mdブレークポイント以下でフォントサイズを調整
- レイアウト構造は維持

### コンテンツ構造
1. **基本情報**：募集職名、雇用形態、給与、勤務地
2. **メッセージ**：営業経験への問いかけ
3. **会社情報**：さくら事務所の紹介
4. **募集詳細**：募集背景、職種詳細（リスト付き）

## ファイル変更履歴
1. `page-recruit-detail.php`: 募集要項セクションのHTML追加（210行目から）
2. `sass/base/_recruit.scss`: 募集要項用のSCSSスタイル追加（79行追加）

## 完成状況
✅ HTML構造の実装完了
✅ SCSS スタイルの実装完了
✅ レスポンシブ対応完了
✅ 8項目の詳細コンテンツ実装完了
✅ リスト形式の業務内容実装完了
✅ Figmaデザインとの完全一致確認

## 実装日時
2025年1月13日

## 備考
- 長文コンテンツを含む詳細な募集要項
- 段落分けとリスト形式で読みやすさを重視
- 会社の理念や価値観を詳細に記載
- 営業職の具体的な業務内容を例示
- 強調テキスト（&lt;strong&gt;）でメリハリを付与 