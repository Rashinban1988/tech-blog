<?php
  include_once 'variables.php';
  global  $tel, $businessHours, $bannerLink1, $bannerLink2, $bannerLink3, $contactLink, $requestBtnLink;
?>

  <footer>
    <div class="footer-top">

      <div class="footer-top__inner">
        <div class="footer-left">
          技術ブログ
          <p class="address">
            その他<br>
            ウェブサービスもご用意しております
          </p>
          <!-- <p class="tel">
            TEL <?php echo $tel; ?><br>
            <span class="business-hours">営業時間：<?php echo $businessHours; ?></span>
          </p> -->
        </div>

        <div class="footer-center">
          <nav>
            <a class="right" href="<?php echo home_url('/tech-blog'); ?>">技術ブログ</a>
            <a class="left" href="<?php echo home_url('/news'); ?>">お知らせ</a>
            <a class="left" href="https://otomamay.vercel.app/voice-picker'); ?>">VoicePicker AI</a>
          </nav>

        </div>

        <div class="footer-sp-text">
          <p class="address">
            その他<br>
            ウェブサービスもご用意しております
          </p>
          <!-- <p class="tel">
            TEL <?php echo $tel; ?><br>
            <span class="business-hours">営業時間：<?php echo $businessHours; ?></span>
          </p> -->
        </div>

        <!-- <div class="footer-right">
          <a href="<?php echo home_url($requestBtnLink); ?>" class="btn request footer">資料請求<span class="sp_inline">はこちら</span></a>
          <a href="<?php echo home_url($contactLink); ?>" class="btn contact footer">お問い合わせ<span class="sp_inline">はこちら</span></a>
        </div> -->
      </div>
    </div>


    <div class="footer-bottom">
      <div class="footer-bottom__inner">
        <div class="left">
          <a href="<?php echo home_url(); ?>/sitemap">サイトマップ</a>
          <a href="<?php echo home_url(); ?>/privacy-policy">プライバシーポリシー</a>
        </div>

        <div class="right">
          <p>Copyright ©︎ コピーライトが入ります</p>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // メニュー展開時に背景を固定
    const backgroundFix = (bool) => {
      const scrollingElement = () => {
        const browser = window.navigator.userAgent.toLowerCase();
        if ("scrollingElement" in document) return document.scrollingElement;
        return document.documentElement;
      };

      const scrollY = bool
        ? scrollingElement().scrollTop
        : parseInt(document.body.style.top || "0");

      const fixedStyles = {
        height: "100vh",
        position: "fixed",
        top: `${scrollY * -1}px`,
        left: "0",
        width: "100vw"
      };

      Object.keys(fixedStyles).forEach((key) => {
        document.body.style[key] = bool ? fixedStyles[key] : "";
      });

      if (!bool) {
        window.scrollTo( 0, scrollpos );
      }
    };

    // 変数定義
    const CLASS = "-active";
    let flg = false;
    let accordionFlg = false;

    let hamburger = document.getElementById("js-hamburger");
    let focusTrap = document.getElementById("js-focus-trap");
    let menu = document.querySelector(".js-nav-area");
    let accordionTrigger = document.querySelectorAll(".js-sp-accordion-trigger");
    let accordion = document.querySelectorAll(".js-sp-accordion");

    // メニュー開閉制御
    hamburger.addEventListener("click", (e) => { //ハンバーガーボタンが選択されたら
      e.currentTarget.classList.toggle(CLASS);
      menu.classList.toggle(CLASS);
      if (flg) {// flgの状態で制御内容を切り替え
        backgroundFix(false);
        hamburger.setAttribute("aria-expanded", "false");
        hamburger.focus();
        flg = false;
      } else {
        backgroundFix(true);
        hamburger.setAttribute("aria-expanded", "true");
        flg = true;
      }
    });
    window.addEventListener("keydown", () => {　//escキー押下でメニューを閉じられるように
      if (event.key === "Escape") {
        hamburger.classList.remove(CLASS);
        menu.classList.remove(CLASS);

        backgroundFix(false);
        hamburger.focus();
        hamburger.setAttribute("aria-expanded", "false");
        flg = false;
      }
    });

    // メニュー内アコーディオン制御
    accordionTrigger.forEach((item) => {
      item.addEventListener("click", (e) => {
        e.currentTarget.classList.toggle(CLASS);
        e.currentTarget.nextElementSibling.classList.toggle(CLASS);
        if (accordionFlg) {
          e.currentTarget.setAttribute("aria-expanded", "false");
          accordionFlg = false;
        } else {
          e.currentTarget.setAttribute("aria-expanded", "true");
          accordionFlg = true;
        }
      });

    });

    // フォーカストラップ制御
    focusTrap.addEventListener("focus", (e) => {
      hamburger.focus();
    });
  </script>

  <script>
    jQuery(document).ready(function($) {
      $('.toggle_switch').on('click', function () {
        $(this).toggleClass('open');
        $(this).next('.toggle_contents').slideToggle();
      });
    })
  </script>
  <?php wp_footer(); ?>
</body>
</html>