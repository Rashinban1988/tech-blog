<form role="search" method="get" class="search-form" action="<?php echo home_url('/tech-blog'); ?>">
  <p class="search-form__title">記事を探す</p>
  <div class="search-form__input-wrapper">
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="キーワードで検索" class="search-form__input" required oninvalid="this.setCustomValidity('キーワードが入力されていません')" oninput="setCustomValidity('')">
    <button class="search-form__btn" type="submit"></button>
  </div>
</form>