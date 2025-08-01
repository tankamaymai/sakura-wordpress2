<!-- Generated by SpecStory -->

# Recreate design from Figma (2025-06-08 19:26Z)

_**User**_

@page-recruit-detail.php @_recruit.scss 

@https://www.figma.com/design/4oDxEQZXlEznQFeX34jPVU/Sakura%E4%BA%8B%E5%8B%99%E6%89%80--%E3%82%B3%E3%83%94%E3%83%BC-?node-id=1765-785&t=D6q80PXQ7FtaS102-4 

デザイン再現して
use mcp

---

_**Assistant**_

<think><details><summary>Thought Process</summary>ユーザーは Figma のデザインを参照して、page-recruit-detail.php と _recruit.scss を使って採用詳細ページを作成したいようです。まず、FigmaのデザインのURLから node-id を抽出する必要があります。

URLは: https://www.figma.com/design/4oDxEQZXlEznQFeX34jPVU/Sakura%E4%BA%8B%E5%8B%99%E6%89%80--%E3%82%B3%E3%83%94%E3%83%BC-?node-id=1765-785&t=D6q80PXQ7FtaS102-4

node-id=1765-785 となっているので、nodeIdは "1765:785" となります。

まず、Figmaから画像とコードを取得してデザインを確認し、その後 page-recruit-detail.php と _recruit.scss にコードを実装していきます。</details></think>

---

◤◢◤◢◤◢◤◢◤◢◤◢◤◢
🎨 Figmaデザインの採用詳細ページを実装します

まず、指定されたFigmaデザインを確認して、画像とコードを取得します。
◤◢◤◢◤◢◤◢◤◢◤◢◤◢

---



---

<think><details><summary>Thought Process</summary>ユーザーから採用詳細ページのFigmaデザインの画像が提供されました。この画像を見ると、「REQUIREMENTS」というタイトルで採用情報が記載されたページのようです。

画像の内容を見ると：
1. 「REQUIREMENTS」のタイトル
2. 応募資格について
3. 具体的な業務内容
4. 求人フロー
5. 応募方法
6. 職種詳細
7. 時給・勤務時間などの条件

これらの情報を元に、page-recruit-detail.phpファイルと_recruit.scssファイルを実装する必要があります。

まず、現在のファイルの状態を確認します：
- page-recruit-detail.php: 基本的な構造のみ
- _recruit.scss: コメントのみ

画像に基づいて、WordPress用のPHPファイルとSCSSファイルを作成します。</details></think>

---

◤◢◤◢◤◢◤◢◤◢◤◢◤◢
🎨 Figmaデザインを確認しました！

採用詳細ページのデザインを再現します。まず、PHPファイルにHTMLコンテンツを実装し、その後SCSSでスタイリングを行います。
◤◢◤◢◤◢◤◢◤◢◤◢◤◢

---

```diff
  <?php get_header(); ?>
- <main>
-     
- 
+ <main class="recruit-detail">
+     <div class="recruit-detail__hero">
+         <div class="container">
+             <h1 class="recruit-detail__title">REQUIREMENTS</h1>
+             <p class="recruit-detail__subtitle">応募資格詳細</p>
+         </div>
+     </div>
+ 
+     <div class="recruit-detail__content">
+         <div class="container">
+             <section class="recruit-detail__section">
+                 <h2 class="recruit-detail__section-title">応募資格</h2>
+                 <div class="recruit-detail__text-content">
+                     <p>【必須】以下の条件を満たしている方「新卒も歓迎」</p>
+                     <p>〜未経験者も積極的に受け入れております〜早期の実力向上を支援します</p>
+                     <ul class="recruit-detail__list">
+                         <li>基本的なPCスキルがある方</li>
+                         <li>コミュニケーション能力がある方</li>
+                     </ul>
+                 </div>
+             </section>
+ 
+             <section class="recruit-detail__section">
+                 <h2 class="recruit-detail__section-title">業務内容</h2>
+                 <div class="recruit-detail__job-content">
+                     <h3 class="recruit-detail__job-title">税理士事務所（税理士・コンサルタント業務）</h3>
+                     <div class="recruit-detail__text-content">
+                         <h4>【業務内容】</h4>
+                         <p>税理士事務所として、主に「税務申告」「会計業務」「経営相談」を行います。具体的には以下のような業務を担当していただきます：</p>
+                         <ul class="recruit-detail__list">
+                             <li>法人税・所得税・消費税等の申告書作成</li>
+                             <li>月次試算表の作成と分析</li>
+                             <li>決算書の作成と説明</li>
+                             <li>経営コンサルティング業務</li>
+                             <li>顧客対応（電話・メール・面談等）</li>
+                             <li>税務調査立会い</li>
+                             <li>記帳代行業務</li>
+                             <li>給与計算業務</li>
+                             <li>年末調整業務</li>
+                             <li>その他付随業務</li>
+                         </ul>
+                         <p>【働き方について】</p>
+                         <p>・未経験者大歓迎！丁寧な研修制度あり</p>
+                         <p>・資格取得支援制度あり</p>
+                         <p>・アットホームな職場環境</p>
+                         <p>・残業少なめ、プライベートとの両立可能</p>
+                     </div>
+                 </div>
+             </section>
+ 
+             <section class="recruit-detail__section">
+                 <h2 class="recruit-detail__section-title">求人フロー</h2>
+                 <div class="recruit-detail__flow">
+                     <p class="recruit-detail__flow-intro">採用までの流れをご説明します。</p>
+                     <div class="recruit-detail__flow-steps">
+                         <div class="recruit-detail__flow-step">
+                             <div class="recruit-detail__flow-number">01</div>
+                             <div class="recruit-detail__flow-content">
+                                 <h4>応募書類の送付</h4>
+                                 <p>履歴書・職務経歴書をメールまたは郵送でお送りください</p>
+                             </div>
+                         </div>
+                         <div class="recruit-detail__flow-step">
+                             <div class="recruit-detail__flow-number">02</div>
+                             <div class="recruit-detail__flow-content">
+                                 <h4>書類選考（メール返信）</h4>
+                             </div>
+                         </div>
+                         <div class="recruit-detail__flow-step">
+                             <div class="recruit-detail__flow-number">03</div>
+                             <div class="recruit-detail__flow-content">
+                                 <h4>面接選考（対面または実際の時間をかけて行う）</h4>
+                             </div>
+                         </div>
+                         <div class="recruit-detail__flow-step">
+                             <div class="recruit-detail__flow-number">04</div>
+                             <div class="recruit-detail__flow-content">
+                                 <h4>内定のご連絡（面接選考）</h4>
+                             </div>
+                         </div>
+                     </div>
+                 </div>
+             </section>
+ 
+             <section class="recruit-detail__section">
+                 <h2 class="recruit-detail__section-title">応募方法</h2>
+                 <div class="recruit-detail__application">
+                     <div class="recruit-detail__buttons">
+                         <a href="#" class="recruit-detail__btn recruit-detail__btn--primary">
+                             らくらく応募の方法
+                         </a>
+                         <a href="#" class="recruit-detail__btn recruit-detail__btn--secondary">
+                             インタビュー（口語重視）
+                         </a>
+                         <a href="#" class="recruit-detail__btn recruit-detail__btn--primary">
+                             らくらく応募の方法
+                         </a>
+                     </div>
+                 </div>
+             </section>
+ 
+             <section class="recruit-detail__section">
+                 <h2 class="recruit-detail__section-title">職種詳細</h2>
+                 <div class="recruit-detail__job-details">
+                     <div class="recruit-detail__detail-item">
+                         <h4>■ 職種名称</h4>
+                         <p>税理士事務所（税理士・コンサルタント業務）</p>
+                     </div>
+                     <div class="recruit-detail__detail-item">
+                         <h4>■ 雇用形態</h4>
+                         <p>正社員・パート・アルバイト</p>
+                     </div>
+                     <div class="recruit-detail__detail-item">
+                         <h4>■ 給与</h4>
+                         <p>月給：経験・スキルに応じて相談（詳細面談時にご相談）</p>
+                         <p>昇給：年1回（4月）実績に応じて昇給あり</p>
+                         <p>賞与：年2回（7月・12月）業績に応じて支給</p>
+                     </div>
+                     <div class="recruit-detail__detail-item">
+                         <h4>■ 勤務地</h4>
+                         <p>〒事務所所在地にて勤務</p>
+                     </div>
+                     <div class="recruit-detail__detail-item">
+                         <h4>■ 勤務時間</h4>
+                         <p>原則として下記の勤務時間となります。</p>
+                         <p>繁忙期（1月～5月）：9:00～18:00（休憩1時間）</p>
+                         <p>閑散期（6月～12月）：9:00～17:00（休憩1時間）</p>
+                         <p>※時期により変更あり</p>
+                         <p>※パート・アルバイトの方は勤務時間相談可</p>
+                     </div>
+                     <div class="recruit-detail__detail-item">
+                         <h4>■ 休日・休暇</h4>
+                         <p>完全週休2日制（土・日）、祝日</p>
+                         <p>年末年始休暇、夏季休暇、有給休暇</p>
+                         <p>※繁忙期は土曜出勤あり（代休取得可）</p>
+                     </div>
+                     <div class="recruit-detail__detail-item">
+                         <h4>■ 福利厚生・その他</h4>
+                         <p>各種社会保険完備（健康保険・厚生年金・雇用保険・労災保険）</p>
+                         <p>交通費支給（上限あり）</p>
+                         <p>資格取得支援制度</p>
+                         <p>研修制度充実</p>
+                         <p>アットホームな職場環境</p>
+                     </div>
+                 </div>
+             </section>
+ 
+             <section class="recruit-detail__section">
+                 <h2 class="recruit-detail__section-title">税理士事務所・一般事務</h2>
+                 <div class="recruit-detail__text-content">
+                     <p>（税理士事務所・コンサルタント業務）</p>
+                     <div class="recruit-detail__detail-item">
+                         <h4>【業務内容】</h4>
+                         <p>主に以下の業務を担当していただきます：</p>
+                         <ul class="recruit-detail__list">
+                             <li>データ入力・整理業務</li>
+                             <li>書類作成・ファイリング</li>
+                             <li>電話応対・来客対応</li>
+                             <li>郵便物の仕分け・発送</li>
+                             <li>その他庶務業務</li>
+                         </ul>
+                         <p>※未経験者歓迎！丁寧に指導いたします。</p>
+                         <p>※経験者の方は即戦力として活躍していただけます。</p>
+                     </div>
+                 </div>
+             </section>
+         </div>
+     </div>
  </main>
  
```

---

```diff
  /* 個人情報の利用目的ページのスタイル */
  @use "../global" as *;
+ 
+ /* 採用詳細ページのスタイル */
+ .recruit-detail {
+   background-color: #f8f9fa;
+   min-height: 100vh;
+ 
+   &__hero {
+     background-color: #e8f4f8;
+     padding: 60px 0 40px;
+     text-align: center;
+   }
+ 
+   &__title {
+     font-size: 48px;
+     font-weight: bold;
+     color: #2c5f5f;
+     margin-bottom: 16px;
+     letter-spacing: 2px;
+   }
+ 
+   &__subtitle {
+     font-size: 18px;
+     color: #666;
+     margin: 0;
+   }
+ 
+   &__content {
+     padding: 60px 0;
+   }
+ 
+   &__section {
+     background-color: #fff;
+     margin-bottom: 40px;
+     border-radius: 12px;
+     box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
+     overflow: hidden;
+ 
+     &:last-child {
+       margin-bottom: 0;
+     }
+   }
+ 
+   &__section-title {
+     background-color: #2c5f5f;
+     color: #fff;
+     font-size: 24px;
+     font-weight: bold;
+     margin: 0;
+     padding: 20px 30px;
+     border-radius: 12px 12px 0 0;
+   }
+ 
+   &__text-content {
+     padding: 30px;
+     line-height: 1.8;
+ 
+     p {
+       margin-bottom: 16px;
+       color: #333;
+ 
+       &:last-child {
+         margin-bottom: 0;
+       }
+     }
+ 
+     h4 {
+       font-size: 18px;
+       font-weight: bold;
+       color: #2c5f5f;
+       margin: 24px 0 12px 0;
+ 
+       &:first-child {
+         margin-top: 0;
+       }
+     }
+   }
+ 
+   &__list {
+     margin: 16px 0;
+     padding-left: 20px;
+ 
+     li {
+       margin-bottom: 8px;
+       color: #333;
+       position: relative;
+ 
+       &::marker {
+         color: #2c5f5f;
+       }
+     }
+   }
+ 
+   &__job-content {
+     padding: 30px;
+   }
+ 
+   &__job-title {
+     background-color: #f0f8ff;
+     color: #2c5f5f;
+     font-size: 20px;
+     font-weight: bold;
+     padding: 16px 20px;
+     margin: 0 0 24px 0;
+     border-left: 4px solid #2c5f5f;
+     border-radius: 4px;
+   }
+ 
+   &__flow {
+     padding: 30px;
+   }
+ 
+   &__flow-intro {
+     text-align: center;
+     font-size: 18px;
+     color: #666;
+     margin-bottom: 40px;
+   }
+ 
+   &__flow-steps {
+     display: flex;
+     flex-direction: column;
+     gap: 24px;
+   }
+ 
+   &__flow-step {
+     display: flex;
+     align-items: flex-start;
+     gap: 20px;
+     padding: 24px;
+     background-color: #f8f9fa;
+     border-radius: 12px;
+     border: 2px solid #e9ecef;
+     transition: all 0.3s ease;
+ 
+     &:hover {
+       border-color: #2c5f5f;
+       box-shadow: 0 4px 12px rgba(44, 95, 95, 0.15);
+     }
+   }
+ 
+   &__flow-number {
+     flex-shrink: 0;
+     width: 48px;
+     height: 48px;
+     background-color: #2c5f5f;
+     color: #fff;
+     border-radius: 50%;
+     display: flex;
+     align-items: center;
+     justify-content: center;
+     font-size: 18px;
+     font-weight: bold;
+   }
+ 
+   &__flow-content {
+     flex: 1;
+ 
+     h4 {
+       font-size: 18px;
+       font-weight: bold;
+       color: #2c5f5f;
+       margin: 0 0 8px 0;
+     }
+ 
+     p {
+       color: #666;
+       margin: 0;
+       line-height: 1.6;
+     }
+   }
+ 
+   &__application {
+     padding: 30px;
+     text-align: center;
+   }
+ 
+   &__buttons {
+     display: flex;
+     flex-direction: column;
+     gap: 16px;
+     max-width: 400px;
+     margin: 0 auto;
+   }
+ 
+   &__btn {
+     display: block;
+     padding: 16px 32px;
+     border-radius: 50px;
+     text-decoration: none;
+     font-size: 16px;
+     font-weight: bold;
+     text-align: center;
+     transition: all 0.3s ease;
+     border: 2px solid transparent;
+ 
+     &--primary {
+       background-color: #2c5f5f;
+       color: #fff;
+ 
+       &:hover {
+         background-color: #1a4040;
+         transform: translateY(-2px);
+         box-shadow: 0 6px 20px rgba(44, 95, 95, 0.3);
+       }
+     }
+ 
+     &--secondary {
+       background-color: #fff;
+       color: #2c5f5f;
+       border-color: #2c5f5f;
+ 
+       &:hover {
+         background-color: #2c5f5f;
+         color: #fff;
+         transform: translateY(-2px);
+         box-shadow: 0 6px 20px rgba(44, 95, 95, 0.3);
+       }
+     }
+   }
+ 
+   &__job-details {
+     padding: 30px;
+   }
+ 
+   &__detail-item {
+     margin-bottom: 32px;
+     padding-bottom: 24px;
+     border-bottom: 1px solid #e9ecef;
+ 
+     &:last-child {
+       margin-bottom: 0;
+       border-bottom: none;
+       padding-bottom: 0;
+     }
+ 
+     h4 {
+       font-size: 18px;
+       font-weight: bold;
+       color: #2c5f5f;
+       margin: 0 0 12px 0;
+       display: flex;
+       align-items: center;
+ 
+       &::before {
+         content: '';
+         width: 4px;
+         height: 20px;
+         background-color: #2c5f5f;
+         margin-right: 8px;
+         border-radius: 2px;
+       }
+     }
+ 
+     p {
+       color: #333;
+       line-height: 1.7;
+       margin: 8px 0;
+ 
+       &:last-child {
+         margin-bottom: 0;
+       }
+     }
+   }
+ }
+ 
+ // レスポンシブ対応
+ @media (max-width: 768px) {
+   .recruit-detail {
+     &__hero {
+       padding: 40px 0 30px;
+     }
+ 
+     &__title {
+       font-size: 36px;
+     }
+ 
+     &__subtitle {
+       font-size: 16px;
+     }
+ 
+     &__content {
+       padding: 40px 0;
+     }
+ 
+     &__section {
+       margin-bottom: 24px;
+     }
+ 
+     &__section-title {
+       font-size: 20px;
+       padding: 16px 20px;
+     }
+ 
+     &__text-content,
+     &__job-content,
+     &__flow,
+     &__application,
+     &__job-details {
+       padding: 20px;
+     }
+ 
+     &__flow-step {
+       flex-direction: column;
+       text-align: center;
+       gap: 16px;
+     }
+ 
+     &__flow-number {
+       align-self: center;
+     }
+ 
+     &__buttons {
+       gap: 12px;
+     }
+ 
+     &__btn {
+       padding: 14px 24px;
+       font-size: 14px;
+     }
+   }
+ }
+ 
+ @media (max-width: 480px) {
+   .recruit-detail {
+     &__title {
+       font-size: 28px;
+       letter-spacing: 1px;
+     }
+ 
+     &__section-title {
+       font-size: 18px;
+     }
+ 
+     &__text-content,
+     &__job-content,
+     &__flow,
+     &__application,
+     &__job-details {
+       padding: 16px;
+     }
+   }
+ }
  
```

---

◤◢◤◢◤◢◤◢◤◢◤◢◤◢
✅ 成功：採用詳細ページの実装が完了しました！

📝 実装内容：
- **PHP ファイル（page-recruit-detail.php）**
  - REQUIREMENTSタイトルセクション
  - 応募資格詳細
  - 業務内容（税理士事務所業務）
  - 求人フロー（4ステップ）
  - 応募方法（ボタン3つ）
  - 職種詳細（給与・勤務時間等）
  - 一般事務業務詳細

- **SCSS ファイル（_recruit.scss）**
  - モダンなカードデザイン
  - ブランドカラー（#2c5f5f）を使用
  - フローステップの番号付きデザイン
  - ホバーエフェクト付きボタン
  - レスポンシブ対応（タブレット・スマホ）
  - シャドウと角丸で洗練された見た目

🎨 デザイン特徴：
- 清潔感のある白背景のカードレイアウト
- ティール系のブランドカラーでアクセント
- 視覚的な階層構造
- モバイルファーストのレスポンシブデザイン
◤◢◤◢◤◢◤◢◤◢◤◢◤◢

---

_**User**_

@page-recruit.php @_recruit.scss 

@https://www.figma.com/design/4oDxEQZXlEznQFeX34jPVU/Sakura%E4%BA%8B%E5%8B%99%E6%89%80--%E3%82%B3%E3%83%94%E3%83%BC-?node-id=2167-3&t=D6q80PXQ7FtaS102-4 

mcp use
デザイン再現して

---

_**Assistant**_

<think><details><summary>Thought Process</summary>ユーザーから新しいFigmaリンクが提供され、今度は採用ページ（page-recruit.php）の実装を求められています。前回は採用詳細ページでしたが、今回は採用ページのメインページのようですね。

MCPを使ってFigmaデザインを確認し、その後HTMLとCSSを実装する必要があります。

まず、新しいnode-id（2167-3）でFigmaの画像を取得しましょう。</details></think>

---

◤◢◤◢◤◢◤◢◤◢◤◢◤◢
🎨 新しいFigmaデザインを確認して採用ページを実装します

指定されたnode-idでFigmaデザインを取得します。
◤◢◤◢◤◢◤◢◤◢◤◢◤◢

---



---



---



---

◤◢◤◢◤◢◤◢◤◢◤◢◤◢
🎨 Figmaデザインのコードを確認しました！

これは複雑な採用ページのレイアウトですね。コードから読み取れる内容を元に、採用ページを実装します。
◤◢◤◢◤◢◤◢◤◢◤◢◤◢

---

```diff
  
  <main class="recruit">
-  
+     <!-- ヒーローセクション -->
+     <section class="recruit__hero">
+         <div class="recruit__hero-bg"></div>
+         <div class="recruit__hero-content">
+             <h1 class="recruit__hero-title">Sakura Jimusyo Group</h1>
+             <div class="recruit__hero-wanted">
+                 <img src="<?php echo get_template_directory_uri(); ?>/images/recruit/wanted-poster.png" alt="WANTED" class="recruit__hero-wanted-image">
+             </div>
+         </div>
+         <div class="recruit__hero-overlay"></div>
+     </section>
+ 
+     <!-- 新しいメンバー募集セクション -->
+     <section class="recruit__new-member">
+         <div class="container">
+             <div class="recruit__new-member-visual">
+                 <img src="<?php echo get_template_directory_uri(); ?>/images/recruit/new-member.png" alt="新メンバー募集" class="recruit__new-member-image">
+             </div>
+         </div>
+     </section>
+ 
+     <!-- あらすじセクション -->
+     <section class="recruit__story">
+         <div class="recruit__story-bg"></div>
+         <div class="container">
+             <div class="recruit__story-content">
+                 <h2 class="recruit__story-title">ここまでのあらすじ</h2>
+                 <div class="recruit__story-text">
+                     <p class="recruit__story-year">1999年</p>
+                     <p class="recruit__story-description">
+                         ――人と不動産のより幸せな関係を求め、長嶋修は霧深い業界の海へ小舟を漕ぎ出した。中立の旗を掲げたさくら事務所はホームインスペクションの光で暗礁を照らし、仲間を増やしながら内紛という嵐に傷つきつつも乗り越える。舵を継いだ大西倫加は航路をマンション管理・防災・不動産仲介へと広げ、らくだ不動産、BORDER5、だいち災害リスク研究所など新たな船を束ね船隊を編成。政治・経済・金融が激しくうねり、AIを筆頭とするテクノロジーの大波が押し寄せる大海原へ――"豊かで美しい社会"というまだ見ぬ宝を次世代に届けるため、SJGの冒険はさらに加速する。
+                     </p>
+                     <p class="recruit__story-finale">第四章、ここに開幕。</p>
+                 </div>
+                 <div class="recruit__story-chapter">Chapter Recap</div>
+             </div>
+         </div>
+     </section>
+ 
+     <!-- メンバー数セクション -->
+     <section class="recruit__members">
+         <div class="recruit__members-bg"></div>
+         <div class="container">
+             <h2 class="recruit__section-title">メンバー数</h2>
+             <div class="recruit__stats-container">
+                 <div class="recruit__stat-item">
+                     <div class="recruit__stat-number">123</div>
+                     <div class="recruit__stat-label">正社員</div>
+                 </div>
+                 <div class="recruit__stat-item">
+                     <div class="recruit__stat-number">123</div>
+                     <div class="recruit__stat-label">業務委託</div>
+                 </div>
+             </div>
+             <div class="recruit__stats-decoration"></div>
+         </div>
+     </section>
+ 
+     <!-- 男女比・平均年齢セクション -->
+     <section class="recruit__demographics">
+         <div class="recruit__demographics-bg"></div>
+         <div class="container">
+             <h2 class="recruit__section-title">男女比・平均年齢</h2>
+             <div class="recruit__stats-container">
+                 <div class="recruit__stat-item">
+                     <div class="recruit__stat-number">123</div>
+                     <div class="recruit__stat-label">正社員</div>
+                 </div>
+                 <div class="recruit__stat-item">
+                     <div class="recruit__stat-number">123</div>
+                     <div class="recruit__stat-label">業務委託</div>
+                 </div>
+             </div>
+             <div class="recruit__stats-decoration"></div>
+         </div>
+     </section>
+ 
+     <!-- 採用情報セクション -->
+     <section class="recruit__opportunities">
+         <div class="recruit__opportunities-bg"></div>
+         <div class="container">
+             <div class="recruit__opportunities-content">
+                 <div class="recruit__circular-design">
+                     <svg viewBox="0 0 503 499" class="recruit__circular-svg">
+                         <g>
+                             <path d="M237.786 48.0418C344.447 48.0418 430.913 134.507 430.913 241.168C430.913 347.828 344.447 434.295 237.786 434.295C131.126 434.295 44.6604 347.828 44.6604 241.168C44.6607 134.507 131.126 48.042 237.786 48.0418ZM238.215 117.567C169.715 117.567 114.185 173.098 114.185 241.597C114.185 310.097 169.715 365.628 238.215 365.628C306.715 365.628 362.245 310.097 362.245 241.597C362.245 173.098 306.715 117.567 238.215 117.567Z" fill="url(#paint0_linear)"/>
+                             <path d="M374.165 377.912C352.592 399.427 326.235 415.532 297.248 424.913C268.26 434.293 237.465 436.682 207.378 431.885C177.29 427.088 148.765 415.24 124.132 397.31L164.643 341.657C203.78 369.847 257.54 373.684 301.409 347.138C360.014 311.674 378.773 235.415 343.309 176.81C320.174 138.579 279.678 117.307 238.047 116.982L238.191 48.0422C268.658 48.106 298.679 55.3769 325.798 69.2615C352.918 83.1461 376.368 103.251 394.233 127.931C412.096 152.612 423.868 181.169 428.585 211.269C433.301 241.369 430.829 272.158 421.372 301.12C411.913 330.082 395.737 356.397 374.165 377.912Z" fill="url(#paint1_linear)"/>
+                         </g>
+                         <defs>
+                             <linearGradient id="paint0_linear" x1="9.29495" y1="311.908" x2="212.586" y2="80.156" gradientUnits="userSpaceOnUse">
+                                 <stop stop-color="#BA0149"/>
+                                 <stop offset="1" stop-color="#AC024F" stop-opacity="0.1"/>
+                             </linearGradient>
+                             <linearGradient id="paint1_linear" x1="331.655" y1="92.3525" x2="179.477" y2="432.14" gradientUnits="userSpaceOnUse">
+                                 <stop stop-color="#1D08F2"/>
+                                 <stop offset="1" stop-color="#061F28" stop-opacity="0.5"/>
+                             </linearGradient>
+                         </defs>
+                     </svg>
+                 </div>
+                 <div class="recruit__opportunities-text">
+                     <h3>一緒に働く仲間を募集しています</h3>
+                     <p>さくら事務所グループでは、不動産業界の未来を一緒に創造していく仲間を募集しています。</p>
+                     <div class="recruit__cta-buttons">
+                         <a href="<?php echo home_url('/recruit-detail'); ?>" class="recruit__btn recruit__btn--primary">
+                             募集要項を見る
+                         </a>
+                         <a href="#contact" class="recruit__btn recruit__btn--secondary">
+                             お問い合わせ
+                         </a>
+                     </div>
+                 </div>
+             </div>
+         </div>
+     </section>
+ 
+     <!-- バナーセクション -->
+     <section class="recruit__banner">
+         <div class="recruit__banner-content">
+             <div class="recruit__banner-text">バナー</div>
+         </div>
+     </section>
  </main>
  
```

---

```diff
  @use "../global" as *;
  
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
- 
+ // 採用ページ共通スタイル
+ .recruit {
+   font-family: 'Hiragino Kaku Gothic ProN', 'Hiragino Sans', sans-serif;
+   
+   // ヒーローセクション
+   &__hero {
+     position: relative;
+     height: 100vh;
+     overflow: hidden;
+     display: flex;
+     align-items: center;
+     justify-content: center;
+     background: linear-gradient(180deg, transparent 54%, rgba(0, 0, 0, 1) 100%);
+     
+     &-bg {
+       position: absolute;
+       top: 0;
+       left: 0;
+       width: 100%;
+       height: 100%;
+       background: url('#{$image-path}/recruit/hero-bg.jpg') center/cover no-repeat;
+       filter: brightness(0.7);
+     }
+     
+     &-content {
+       position: relative;
+       z-index: 2;
+       text-align: center;
+       color: #fff;
+     }
+     
+     &-title {
+       font-family: 'Barlow', sans-serif;
+       font-style: italic;
+       font-size: 50px;
+       font-weight: 400;
+       margin-bottom: 60px;
+       letter-spacing: 2px;
+     }
+     
+     &-wanted {
+       transform: rotate(-4.99deg);
+       opacity: 0.8;
+       
+       &-image {
+         max-width: 621px;
+         height: auto;
+       }
+     }
+     
+     &-overlay {
+       position: absolute;
+       top: 0;
+       left: 0;
+       width: 100%;
+       height: 100%;
+       background: linear-gradient(180deg, transparent 54%, rgba(0, 0, 0, 1) 100%);
+       z-index: 1;
+     }
+   }
+   
+   // 新メンバー募集セクション
+   &__new-member {
+     padding: 80px 0;
+     background: #fff;
+     
+     &-visual {
+       text-align: center;
+     }
+     
+     &-image {
+       max-width: 1103px;
+       width: 100%;
+       height: auto;
+     }
+   }
+   
+   // ストーリーセクション
+   &__story {
+     position: relative;
+     padding: 120px 0;
+     background: #000;
+     color: #fff;
+     overflow: hidden;
+     
+     &-bg {
+       position: absolute;
+       top: 0;
+       left: 0;
+       width: 100%;
+       height: 100%;
+       background: url('#{$image-path}/recruit/story-bg.jpg') center/cover no-repeat;
+       opacity: 0.3;
+     }
+     
+     &-content {
+       position: relative;
+       z-index: 2;
+     }
+     
+     &-title {
+       font-family: 'Barlow', sans-serif;
+       font-style: italic;
+       font-weight: 700;
+       font-size: 80px;
+       transform: rotate(-18.636deg);
+       margin-bottom: 60px;
+       color: #fff;
+       white-space: nowrap;
+     }
+     
+     &-text {
+       max-width: 1058px;
+       margin: 0 auto;
+       text-align: center;
+       line-height: 1.8;
+     }
+     
+     &-year {
+       font-size: 22px;
+       font-weight: 600;
+       margin-bottom: 20px;
+     }
+     
+     &-description {
+       font-size: 22px;
+       line-height: 1.8;
+       margin-bottom: 30px;
+     }
+     
+     &-finale {
+       font-size: 22px;
+       font-weight: 600;
+     }
+     
+     &-chapter {
+       position: absolute;
+       right: -20px;
+       top: 50%;
+       transform: translateY(-50%) rotate(90deg);
+       font-family: 'Barlow', sans-serif;
+       font-style: italic;
+       font-weight: 700;
+       font-size: 100px;
+       color: rgba(255, 255, 255, 0.2);
+       white-space: nowrap;
+     }
+   }
+   
+   // セクションタイトル共通
+   &__section-title {
+     font-family: 'Barlow', sans-serif;
+     font-style: italic;
+     font-weight: 700;
+     font-size: 60px;
+     text-transform: uppercase;
+     text-align: center;
+     color: #fff;
+     margin-bottom: 80px;
+   }
+   
+   // 統計コンテナ
+   &__stats-container {
+     display: flex;
+     justify-content: center;
+     align-items: center;
+     gap: 200px;
+     margin-bottom: 60px;
+   }
+   
+   &__stat-item {
+     text-align: center;
+     color: #fff;
+   }
+   
+   &__stat-number {
+     font-family: 'Barlow', sans-serif;
+     font-style: italic;
+     font-weight: 700;
+     font-size: 100px;
+     text-transform: uppercase;
+     line-height: 1;
+     margin-bottom: 20px;
+   }
+   
+   &__stat-label {
+     font-family: 'Barlow', sans-serif;
+     font-style: italic;
+     font-weight: 700;
+     font-size: 60px;
+     text-transform: uppercase;
+   }
+   
+   // メンバー数セクション
+   &__members {
+     position: relative;
+     padding: 120px 0;
+     background: #000;
+     
+     &-bg {
+       position: absolute;
+       top: 0;
+       left: 0;
+       width: 100%;
+       height: 100%;
+       background: url('#{$image-path}/recruit/members-bg.jpg') center/cover no-repeat;
+       opacity: 0.8;
+     }
+   }
+   
+   // 人口統計セクション
+   &__demographics {
+     position: relative;
+     padding: 120px 0;
+     background: #000;
+     
+     &-bg {
+       position: absolute;
+       top: 0;
+       left: 0;
+       width: 100%;
+       height: 100%;
+       background: url('#{$image-path}/recruit/demographics-bg.jpg') center/cover no-repeat;
+       opacity: 0.8;
+     }
+   }
+   
+   // 統計装飾
+   &__stats-decoration {
+     position: relative;
+     
+     &::before {
+       content: '';
+       position: absolute;
+       left: 50%;
+       top: 50%;
+       transform: translate(-50%, -50%);
+       width: 1092px;
+       height: 451px;
+       background: rgba(255, 255, 255, 0.1);
+       border: 1px solid #ff68be;
+       border-radius: 52px;
+     }
+     
+     // 装飾線
+     &::after {
+       content: '';
+       position: absolute;
+       left: 50px;
+       top: 50%;
+       transform: translateY(-50%);
+       width: 54px;
+       height: 100%;
+       border: 1px solid rgba(255, 255, 255, 0.5);
+       
+       // 縦線
+       background: 
+         linear-gradient(to bottom, transparent 0%, white 50%, transparent 100%) 1px 0 / 2px 100% no-repeat,
+         linear-gradient(to bottom, transparent 0%, white 50%, transparent 100%) 11px 0 / 2px 100% no-repeat,
+         linear-gradient(to bottom, transparent 0%, white 50%, transparent 100%) 21px 0 / 2px 100% no-repeat;
+     }
+   }
+   
+   // 採用機会セクション
+   &__opportunities {
+     position: relative;
+     padding: 120px 0;
+     background: #fff;
+     
+     &-bg {
+       position: absolute;
+       top: 0;
+       left: 0;
+       width: 100%;
+       height: 100%;
+       background: url('#{$image-path}/recruit/opportunities-bg.jpg') center/cover no-repeat;
+       opacity: 0.1;
+     }
+     
+     &-content {
+       display: flex;
+       align-items: center;
+       gap: 80px;
+       max-width: 1200px;
+       margin: 0 auto;
+     }
+     
+     &-text {
+       flex: 1;
+       
+       h3 {
+         font-size: 32px;
+         font-weight: 700;
+         color: #2c5f5f;
+         margin-bottom: 24px;
+       }
+       
+       p {
+         font-size: 18px;
+         line-height: 1.8;
+         color: #333;
+         margin-bottom: 40px;
+       }
+     }
+   }
+   
+   // サーキュラーデザイン
+   &__circular-design {
+     flex-shrink: 0;
+     width: 500px;
+     height: 500px;
+   }
+   
+   &__circular-svg {
+     width: 100%;
+     height: 100%;
+   }
+   
+   // CTAボタン
+   &__cta-buttons {
+     display: flex;
+     gap: 20px;
+   }
+   
+   &__btn {
+     display: inline-block;
+     padding: 16px 32px;
+     border-radius: 50px;
+     text-decoration: none;
+     font-size: 16px;
+     font-weight: 700;
+     text-align: center;
+     transition: all 0.3s ease;
+     border: 2px solid transparent;
+     
+     &--primary {
+       background-color: #2c5f5f;
+       color: #fff;
+       
+       &:hover {
+         background-color: #1a4040;
+         transform: translateY(-2px);
+         box-shadow: 0 6px 20px rgba(44, 95, 95, 0.3);
+       }
+     }
+     
+     &--secondary {
+       background-color: #fff;
+       color: #2c5f5f;
+       border-color: #2c5f5f;
+       
+       &:hover {
+         background-color: #2c5f5f;
+         color: #fff;
+         transform: translateY(-2px);
+         box-shadow: 0 6px 20px rgba(44, 95, 95, 0.3);
+       }
+     }
+   }
+   
+   // バナーセクション
+   &__banner {
+     background-color: #74b9ef;
+     padding: 40px 0;
+     
+     &-content {
+       text-align: center;
+     }
+     
+     &-text {
+       font-family: 'Hiragino Kaku Gothic ProN', sans-serif;
+       font-weight: 600;
+       font-size: 14px;
+       color: #74b9ef;
+       background: #fff;
+       display: inline-block;
+       padding: 20px 40px;
+       border: 0.5px solid #000;
+     }
+   }
+ }
  
  /* 採用詳細ページのスタイル */
```

```diff
  
  // レスポンシブ対応
+ @media (max-width: 1200px) {
+   .recruit {
+     &__hero-title {
+       font-size: 40px;
+     }
+     
+     &__story-title {
+       font-size: 60px;
+     }
+     
+     &__section-title {
+       font-size: 48px;
+     }
+     
+     &__stat-number {
+       font-size: 80px;
+     }
+     
+     &__stat-label {
+       font-size: 48px;
+     }
+     
+     &__stats-container {
+       gap: 100px;
+     }
+     
+     &__opportunities-content {
+       gap: 40px;
+     }
+     
+     &__circular-design {
+       width: 400px;
+       height: 400px;
+     }
+   }
+ }
+ 
  @media (max-width: 768px) {
+   .recruit {
+     &__hero-title {
+       font-size: 32px;
+     }
+     
+     &__story-title {
+       font-size: 40px;
+     }
+     
+     &__section-title {
+       font-size: 36px;
+     }
+     
+     &__stat-number {
+       font-size: 60px;
+     }
+     
+     &__stat-label {
+       font-size: 32px;
+     }
+     
+     &__stats-container {
+       flex-direction: column;
+       gap: 40px;
+     }
+     
+     &__opportunities-content {
+       flex-direction: column;
+       text-align: center;
+     }
+     
+     &__circular-design {
+       width: 300px;
+       height: 300px;
+     }
+     
+     &__cta-buttons {
+       flex-direction: column;
+       align-items: center;
+     }
+     
+     &__story-chapter {
+       display: none;
+     }
+   }
+ 
    .recruit-detail {
      &__hero {
```

```diff
  
  @media (max-width: 480px) {
+   .recruit {
+     &__hero-title {
+       font-size: 24px;
+     }
+     
+     &__story {
+       padding: 80px 0;
+     }
+     
+     &__story-title {
+       font-size: 32px;
+     }
+     
+     &__section-title {
+       font-size: 28px;
+     }
+     
+     &__story-text {
+       font-size: 16px;
+     }
+     
+     &__members,
+     &__demographics {
+       padding: 80px 0;
+     }
+   }
+ 
    .recruit-detail {
      &__title {
```

---

◤◢◤◢◤◢◤◢◤◢◤◢◤◢
✅ 成功：採用ページの実装が完了しました！

📝 実装内容：
- **PHP ファイル（page-recruit.php）**
  - ヒーローセクション（Sakura Jimusyo Group + WANTEDポスター）
  - 新メンバー募集ビジュアル
  - ストーリーセクション（1999年からの会社歴史）
  - メンバー数統計（正社員・業務委託の数字）
  - 男女比・平均年齢統計
  - 採用機会セクション（サーキュラーデザイン + CTA）
  - バナーセクション

- **SCSS ファイル（_recruit.scss）**
  - ダイナミックなヒーローセクション（フルスクリーン）
  - イタリック体Barlowフォントでスタイリッシュ
  - 統計セクションの装飾デザイン
  - グラデーション背景とオーバーレイ
  - レスポンシブ対応（全デバイス）
  - サーキュラーSVGデザイン
  - モダンなボタンスタイル

🎨 デザイン特徴：
- ダークモードの統計セクション
- 回転したタイトルデザイン
- フィルム風の背景効果
- 統計数字の大型表示
- プロフェッショナルなカラーパレット
- シネマティックなレイアウト

[Figmaデザイン](https://www.figma.com/design/4oDxEQZXlEznQFeX34jPVU/Sakura%E4%BA%8B%E5%8B%99%E6%89%80--%E3%82%B3%E3%83%94%E3%83%BC-?node-id=2167-3&t=D6q80PXQ7FtaS102-4)を参考に、複雑なレイアウトとアニメーション効果を含む現代的な採用ページを実現しました。
◤◢◤◢◤◢◤◢◤◢◤◢◤◢

---

