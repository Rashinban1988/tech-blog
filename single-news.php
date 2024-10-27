<?php
  global $subtitle, $title, $secondLayer, $secondLayerUrl;
  $title = get_the_title();
  $secondLayer = 'お知らせ';
  $secondLayerUrl = '/news';
  get_header();
?>
  <main class="lower-page__main">
    <div class="lower-page__contents-wrapper article single">
      <?php get_template_part('components/lowerPage/breadcrumbTrail'); ?>
      <div class="article-page__inner news">
        <article class="article-page__contents">
          <div class="article-page__single">
            <h1 class="article-page__single__title"><?php the_title();?></h1>
            <p class="date"><?php echo get_the_date(); ?></p>

            <div class="article-page__single__content">
              <?php the_content();?>
            </div>

          </div>

          <div class="article-page__single__btn-wrapper">
            <a class="lower-page-btn" href="<?php echo home_url('/news'); ?>">お知らせ一覧へ戻る</a>
          </div>
        </article>

        <aside class="article-page__sidebar">
          <?php get_template_part('components/sidebar/sidebarLinks'); ?>
        </aside>
      </div>
    </div>
  </main>
  <?php get_template_part('components/ctaBanner'); ?>
<?php get_footer();?>