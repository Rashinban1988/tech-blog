<?php
  include_once 'variables.php';
  global $tel, $businessHours, $requestBtnLink, $contactLink;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- SlickのCSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <!-- SlickのCSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <!-- lottie -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
  <link rel="icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" sizes="any">
</head>
<body>
  <header class="header pc">
    <!-- <div class="header-top"> -->
      <!-- <h1> -->
        <!-- <a href="<?php echo home_url(); ?>">技術ブログ</a> -->
      <!-- </h1> -->

      <!-- <div class="header-top-right"> -->
        <!-- <a href="tel:<?php // echo $tel; ?>" class="header-top-right__tel-wrapper">
          <img src="<?php // echo get_template_directory_uri(); ?>/images/tel_icon.svg" alt="電話アイコン">
          <div class="text-area">
            <p class="tel"><?php // echo $tel; ?></p>
            <p class="time"><?php // echo $businessHours; ?></p>
          </div>
        </a> -->
        <!-- <div class="btn-wrapper">
          <a href="<?php echo home_url('/'.$requestBtnLink); ?>" class="btn request header">資料請求</a>
          <a href="<?php echo home_url('/'.$contactLink); ?>" class="btn contact header">お問い合わせ</a>
        </div> -->
      <!-- </div> -->
    <!-- </div> -->

    <div class="header-bottom">
      <nav class="header-bottom__nav">
        <a href="<?php echo home_url('/tech-blog'); ?>">TECH BLOG</a>
        <a href="<?php echo home_url('/news'); ?>">NEWS</a>
      </nav>
    </div>
  </header>



  <header class="header__sp sp">
    <h1>
      <a href="<?php echo home_url(); ?>">技術ブログ</a>
    </h1>
    <div class="header__sp__inner">
      <button id="js-hamburger" type="button" class="hamburger" aria-controls="navigation" aria-expanded="false" aria-label="メニューを開く">
          <span class="hamburger__line"></span>
        </button>
      <div class="header__sp__nav-area js-nav-area" id="navigation">
        <nav id="js-global-navigation" class="global-navigation">

          <ul class="global-navigation__list">
          <!-- <div class="toggle_wrap sp-menu__item">
            <div class="toggle_switch">
              <li class="menu-child">
              <a class="global-navigation__link__a" href="<?php echo home_url('/service'); ?>">サービス</a>
              </li>
            </div>
            <div class="toggle_contents">

              <li class="">
                <a href="<?php echo home_url('/first-time-industrial-physician'); ?>" class="accordion__link"> 
                <span>- </span>
                  初めて産業医の導入を検討されている企業の方へ
                </a>
              </li>
              <li class="">
                <a href="<?php echo home_url('/change-industrial-physician'); ?>" class="accordion__link"> 
                <span>- </span>
                  産業医の変更を検討されている企業の方へ
                </a>
              </li>
              <li class="">
                <a href="<?php echo home_url('/introduce-labor-attorney'); ?>" class="accordion__link"> 
                <span>- </span>
                  社労士の導入を検討されている企業の方へ
                </a>
              </li>
            </div>
          </div> -->

            <li class="noChild">
              <a href="<?php echo home_url('/tech-blog'); ?>" class="global-navigation__link">
              技術ブログ
              </a>
            </li>
            <li class="noChild">
              <a href="<?php echo home_url('/news'); ?>" class="global-navigation__link">
              お知らせ
              </a>
            </li>
          </ul>

          <!-- <div class="cta_contents">
          <a href="<?php echo home_url($requestBtnLink); ?>" class="nav-ctaButton btn request">資料請求</a>
          <a href="<?php echo home_url($contactLink); ?>" class="nav-ctaButton btn contact">お問い合わせ</a>
          </div> -->
        </nav>
      </div>
    </div>
  </header>


