<!-- Generated by SpecStory -->

# Wrap SNS Account in Anchor Tag (2025-05-17 00:14:16)

_**User**_

@_sns.scss @page-sns.php 
sns-accountはaタグで囲ってください

---

_**Assistant**_



---

```diff
  					<h2 class="sns-card__title">Sakura Group公式SNS</h2>
  					<div class="sns-accounts">
- 						<div class="sns-account">
+ 						<a href="https://twitter.com/Sakura_xx" class="sns-account">
  							<div class="sns-account__icon twitter">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/x-sns.webp" alt="X (Twitter)">
  							</div>
  							<p class="sns-account__name">Sakura_xx</p>
- 						</div>
- 						<div class="sns-account">
+ 						</a>
+ 						<a href="https://youtube.com/@Sakura_youtube" class="sns-account">
  							<div class="sns-account__icon youtube">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/youtube-sns.webp" alt="YouTube">
  							</div>
  							<p class="sns-account__name">Sakura_youtube</p>
- 						</div>
- 						<div class="sns-account">
+ 						</a>
+ 						<a href="https://instagram.com/Sakura_insta" class="sns-account">
  							<div class="sns-account__icon instagram">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/insta-sns2.webp" alt="Instagram">
  							</div>
  							<p class="sns-account__name">Sakura_insta</p>
- 						</div>
+ 						</a>
  					</div>
  				</div>
```

```diff
  					<h2 class="sns-card__title">らくだ公式SNS</h2>
  					<div class="sns-accounts">
- 						<div class="sns-account">
+ 						<a href="https://twitter.com/Rakuda_xx" class="sns-account">
  							<div class="sns-account__icon twitter">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/x-sns.webp" alt="X (Twitter)">
  							</div>
  							<p class="sns-account__name">Rakuda_xx</p>
- 						</div>
- 						<div class="sns-account">
+ 						</a>
+ 						<a href="https://youtube.com/@Rakuda_youtube" class="sns-account">
  							<div class="sns-account__icon youtube">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/youtube-sns.webp" alt="YouTube">
  							</div>
  							<p class="sns-account__name">Rakuda_youtube</p>
- 						</div>
- 						<div class="sns-account">
+ 						</a>
+ 						<a href="https://instagram.com/Rakuda_insta" class="sns-account">
  							<div class="sns-account__icon instagram">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/insta-sns2.webp" alt="Instagram">
  							</div>
  							<p class="sns-account__name">Rakuda_insta</p>
- 						</div>
+ 						</a>
  					</div>
  				</div>
```

```diff
  					<h2 class="sns-card__title">マン買うYouTube</h2>
  					<div class="sns-accounts">
- 						<div class="sns-account">
+ 						<a href="https://youtube.com/@Mansion_youtube" class="sns-account">
  							<div class="sns-account__icon youtube">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/youtube-sns.webp" alt="YouTube">
  							</div>
  							<p class="sns-account__name">Mansion_youtube</p>
- 						</div>
+ 						</a>
  					</div>
  				</div>
```

```diff
  					<h2 class="sns-card__title">さくら事務所</h2>
  					<div class="sns-accounts">
- 						<div class="sns-account note">
+ 						<a href="https://note.com/sakurajimusyo" class="sns-account note">
  							<div class="sns-account__icon note">
  								<img src="<?php echo get_template_directory_uri(); ?>/images/sns/sns2-note.png" alt="note">
  							</div>
  							<p class="sns-account__name note-account">note.com/sakurajimusyo</p>
- 						</div>
+ 						</a>
  					</div>
  				</div>
```

---

```diff
      align-items: center;
      width: calc(33.33% - 20px);
+     text-decoration: none;
+     transition: transform 0.3s ease, opacity 0.3s ease;
+ 
+     &:hover {
+         transform: translateY(-5px);
+         opacity: 0.9;
+     }
  }
  
```

---

SNSアカウントリンクを実装しました。変更内容：

1. page-sns.php:
   - すべての `<div class="sns-account">` を `<a>` タグに変換
   - 各SNSプラットフォームに適切なURLを設定（Twitter、YouTube、Instagram、noteなど）

2. _sns.scss:
   - リンクとして機能するようスタイルを追加
   - text-decorationを削除して下線を非表示に
   - ホバー効果を追加（軽く浮き上がる効果と透明度の変化）

これにより、SNSアイコンがリンクとして機能し、ユーザーが各SNSアカウントに簡単にアクセスできるようになりました。

---

