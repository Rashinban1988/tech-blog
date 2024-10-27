jQuery(document).ready(function($) {
  $('#hamburger').on('click', function() {
    $(this).toggleClass('open');
    $('#drawerMenu').toggleClass('open');
    $('body').toggleClass('no-scroll');
  });

  $('.drawer-menu__nav__link').on('click', function() {
    $('#drawerMenu').removeClass('open');
    $('#hamburger').removeClass('open');
    $('body').removeClass('no-scroll');
  });

  // 要素が画面内に入ったかをチェックする関数
  // クラス名を引数として受け取る
  function checkVisibility(className) {
    $(className).each(function() {
      const $element = $(this)
      const elementTop = $element.offset().top
      const elementBottom = elementTop + $element.outerHeight()

      const viewportTop = $(window).scrollTop()
      const viewportBottom = viewportTop + $(window).height()

      // 要素がビューポートの下端から100px内に入ったか判定
      // この値を増やすことで、より下で反応させることができる
      const threshold = 100; // 反応させたい距離（px）

      // 要素が画面内に入ったか判定
      if (elementBottom > viewportTop && elementTop < (viewportBottom - threshold)) {
        $element.addClass('visible')
      } else {
        // スクロールアウトした要素を再度非表示にする場合は以下を有効化
        // $element.removeClass('visible')
      }
    });
  }

  // スクロールとリサイズイベントに関数をバインドし、引数としてクラス名を渡す
  $(window).on('scroll resize', function() {
    checkVisibility('.fadeIn')
    checkVisibility('.fadeBg')
  })

  // 初期ロード時にも実行し、引数としてクラス名を渡す
  checkVisibility('.fadeIn')
  checkVisibility('.fadeBg')

  $('.faq__contents__box').on('click', function() {
    $(this).toggleClass('open');
  });

  $('.fv-bottom').slick({
    // オプションをここに追加
    autoplaySpeed: 0,
    autoplay: true,
    speed: 5000,
    dots: false,
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    cssEase: 'linear',
    slidesToShow: 10,
    slidesToScroll: 1,
    arrows: false,
    variableWidth: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        variableWidth: true,
        centerPadding: 0,
      }
    }]
  });

  $('.about-bottom-text__wrapper').slick({
    // オプションをここに追加
    autoplaySpeed: 0,
    autoplay: true,
    speed: 15000,
    dots: false,
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    cssEase: 'linear',
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    variableWidth: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        variableWidth: true,
        centerPadding: 0,
      }
    }]
  });
});