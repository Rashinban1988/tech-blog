<?php get_header();?>
  <main>
    <div class="page-404__contents-wrapper">
      <div class="page-404__contents">

        <div class="left">
          <h2 class="subtitle">NOT FOUND</h2>
          <h1 class="title">404</h1>
          <h3 class="text">
            お探しのページは<br>
            見つかりませんでした
          </h3>
        </div>

        <div class="right">
          <p>お探しのページは以下のいずれかの理由により、<br class="sp">見つかりませんでした。</p>

          <ul>
            <li>・URLが間違っている</li>
            <li>・ページのURLが変更されている</li>
            <li>・こちらの都合により、ページの掲載を中止した</li>
          </ul>

          <p>
            直接アドレスを入力された場合は、アドレスが正しく入力されているかもう一度ご確認ください。<br>
            ブラウザの再読込みを行ってもこのページが表示される場合は、トップページに戻り目的のページをお探しください。
          </p>

        </div>

      </div>

      <div class="page-404__btn-wrapper">
        <a class="lower-page-btn" href="<?php echo home_url();?>">TOPへ戻る</a>
      </div>
    </div>
  </main>
<?php get_footer();?>