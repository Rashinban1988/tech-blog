<?php

  use App\Service\TechBlogService;

  global $subtitle, $title, $secondLayer, $secondLayerUrl;
  $techBlog = TechBlogService::create_object(get_the_ID());
  $title = $techBlog->title;
  $secondLayer = '技術ブログ';
  $secondLayerUrl = '/tech-blog';
  get_header();
?>
  <main class="lower-page__main">
    <div class="lower-page__contents-wrapper article single">
      <?php get_template_part('components/lowerPage/breadcrumbTrail'); ?>
      <div class="article-page__inner news">
        <article class="article-page__contents">
          <div class="column-single__wrapper">
            <h1 class="column-single__title"><?php echo $techBlog->title;?></h1>
            <div class="column-single__meta">
              <p class="date"><?php echo $techBlog->date; ?></p>
              <p class="category">
                <?php
                  $categories = get_the_terms($postId, 'tech-blog-category');
                  echo $categories[0]->name;
                  ?>
              </p>
            </div>

            <?php if (has_post_thumbnail()) : ?>
              <div class="column-single__thumbnail">
                <img src="<?php echo $techBlog->thumbnail_url; ?>" alt="<?php echo $techBlog->title; ?>">
              </div>
            <?php endif; ?>

            <div class="article-page__single__content column-single__content">
              <?php echo $techBlog->content;?>
            </div>

          </div>

          <div class="article-page__single__btn-wrapper">
            <a class="lower-page-btn" href="<?php echo home_url('/tech-blog'); ?>">技術ブログ一覧へ戻る</a>
          </div>
        </article>

        <aside class="article-page__sidebar">
          <?php
            if(!wp_is_mobile()) {
              get_template_part('components/search/searchForm', 'column');
            }
          ?>
          <?php get_template_part('components/sidebar/attentionArticle'); ?>
          <?php get_template_part('components/sidebar/sidebarLinks'); ?>
        </aside>
      </div>
    </div>

    <div class="column-single__related-articles">
      <div class="column-single__related-articles__inner">
        <h2 class="title">よく読まれている記事</h2>
        <div class="column-archive__article-list">
          <?php
          $the_view_query = TechBlogService::get_frequently_tech_blogs();
          if ($the_view_query->have_posts()) :
              while ($the_view_query->have_posts()) : $the_view_query->the_post();
          ?>
          <a href="<?php the_permalink(); ?>" class="link index<?php echo $loopIndex;?>">
            <div class="thumbnail">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
            </div>
            <div class="top-text">
              <p class="date"><?php echo get_the_date(); ?></p>
              <p class="tag"><?php echo  get_the_terms($postId, 'tech-blog-category')[0]->name; ?></p>
              <p class="title sp"><?php the_title(); ?></p>
            </div>
            <p class="title pc"><?php the_title(); ?></p>
          </a>
          <?php
            endwhile;
          endif;
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
  </main>
  <?php get_template_part('components/ctaBanner'); ?>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var strongElements = document.querySelectorAll('table strong');
    strongElements.forEach(function(strong) {
      strong.parentElement.classList.add('has-strong');
    });
  });
</script>