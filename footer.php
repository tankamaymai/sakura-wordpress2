<footer class="footer" data-midnight="white">
  <div class="footer__inner inner">
    <!-- フッター上部: ロゴとキャッチフレーズ -->
    <div class="footer__top">
      <div class="footer__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/footer/footer-logo.svg" alt="さくら事務所ロゴ">
      </div>
      <div class="footer__catchphrase">
      地図の無い時代に、<br class="md3-show">未来の旗を立てる。
      </div>
    </div>

    <!-- フッターナビゲーション -->
    <nav class="footer__nav">
    <div class="footer__nav-category md-show">
        <a href="<?php echo home_url('/'); ?>">
          <h5 class="footer__nav-title ">toppage</h5>
        </a>
      
      </div>
      <!-- Social Business セクション -->
      <div class="footer__nav-category">
    
          <h5 class="footer__nav-title">Social Business</h5>
  
        <div class="footer__nav-links">
          <a href="https://www.sakurajimusyo.com/" target="_blank" class="footer__nav-link">ホームインスペクション</a>
          <a href="https://www.s-mankan.com/" target="_blank" class="footer__nav-link">マンション管理組合コンサルティング</a>
          <a href="https://www.rakuda-f.com/" target="_blank" class="footer__nav-link">らくだ不動産株式会社 </a>
          <a href="https://www.daichi-risk.com/" target="_blank" class="footer__nav-link">だいち災害リスク研究所</a>
        </div>
      </div>

      <!-- About セクション -->
      <div class="footer__nav-category">

          <h5 class="footer__nav-title">About</h5>
        
        <div class="footer__nav-links">
          <a href="<?php echo home_url('/philosophy/'); ?>" class="footer__nav-link">理念、五方良し</a>
          <a href="<?php echo home_url('/company/'); ?>" class="footer__nav-link">会社情報、沿革</a>
          <a href="<?php echo home_url('/about/'); ?>" class="footer__nav-link">さくら事務所グループ</a>
        </div>
      </div>

      <!-- Press セクション -->
      <div class="footer__nav-category">

          <h5 class="footer__nav-title">Press</h5>

        <div class="footer__nav-links">
          <a href="<?php echo home_url('/press/'); ?>" class="footer__nav-link">プレスルーム</a>
          <a href="<?php echo home_url('/press/'); ?>" class="footer__nav-link">プレスキット</a>
          <a href="<?php echo home_url('/press_release/'); ?>" class="footer__nav-link">プレスリリース一覧</a>
          <a href="<?php echo home_url('/sns/'); ?>" class="footer__nav-link">SNS</a>
        </div>
      </div>

      <!-- Members セクション -->
      <div class="footer__nav-category">
          <h5 class="footer__nav-title">Members</h5>
        <div class="footer__nav-links">
          <a href="<?php echo home_url('/staff/'); ?>" class="footer__nav-link">メンバー一覧</a>
        </div>
        <!-- Recruit セクション -->
        <a href="<?php echo home_url('/recruit/'); ?>" class="footer__nav-title">Recruit</a>
        <div class="footer__nav-links">
          <a href="<?php echo home_url('/recruit/'); ?>" class="footer__nav-link">採用TOPページ</a>
        </div>
        <h3 class="footer__nav-title">Join Sakura team</h3>
        <div class="footer__nav-links">
          <a href="<?php echo home_url('/sakura-yells/'); ?>" class="footer__nav-link">さくらクルー</a>
        </div>
        <a href="<?php echo home_url('/contact/'); ?>" class="footer__nav-title">Contact</a>
      </div>
      <!-- フッター下部: リンク -->
    </nav>
    <div class="footer__bottom">
      <div class="footer__bottom-nav">
        <a href="<?php echo home_url('/personal/'); ?>" class="footer__bottom-link">個人情報の利用目的</a>
        <a href="<?php echo home_url('/privacy/'); ?>" class="footer__bottom-link">プライバシーポリシー</a>
      </div>
    </div>

  </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>