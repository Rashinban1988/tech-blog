<?php use App\Service\TechBlogService; ?>
<?php
  global $subtitle, $title;
  $subtitle = 'TECH BLOG';
  $title = '技術ブログ';

  $search_query = get_search_query();

  if(is_search()) {
    $title = $search_query . 'の検索結果';
  }

  get_header();
?>
  <main class="lower-page__main">
    <?php if(!is_search()) {
      get_template_part('components/lowerPage/lowerPageHeader');
    }
    ?>

    <div class="lower-page__contents-wrapper article <?php if(is_search()) echo 'search';?>">
      <?php get_template_part('components/lowerPage/breadcrumbTrail'); ?>

      <div class="article-page__inner news">
        <article class="article-page__contents">
        <?php
            if(wp_is_mobile()) {
              get_template_part('components/search/searchForm-tech-blog-category');
            }
          ?>

          <?php if(is_search()) : ?>
            <h2 class="article-page__search-title"><?php echo esc_html($search_query);?>の検索結果</h2>
          <?php else: ?>
            <div class="column-archive__category__wrapper">
              <p class="title">カテゴリー</p>
              <div class="contents-wrapper">
                <?php $categories = TechBlogService::get_categories(); ?>
                <a href="<?php echo home_url('/tech-blog'); ?>">すべて</a>
                <?php $current_category = get_queried_object(); ?>
                <?php foreach($categories as $category): ?>
                  <?php if($category->slug === $current_category->slug): ?>
                    <a href="<?php echo get_term_link($category); ?>" class="current"><?php echo $category->name; ?></a>
                  <?php else: ?>
                    <a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif;?>

          <div class="column-archive__article-list">
            <?php
            $techBlogs = TechBlogService::get_tech_blogs_by_category();

            // 投稿のループ
            if ($techBlogs->have_posts()) :
              $loopIndex = 1;
              while ($techBlogs->have_posts()) : $techBlogs->the_post();
                $techBlog = TechBlogService::create_object(get_the_ID());
              ?>
              <a href="<?php echo $techBlog->permalink;?>" class="link index<?php echo $loopIndex;?> <?php if(is_search()) echo 'search' ?>">
                <div class="thumbnail">
                  <img src="<?php echo $techBlog->thumbnail_url;?>" alt="<?php echo $techBlog->title;?>">
                </div>
                <div class="top-text">
                  <p class="date"><?php echo $techBlog->date;?></p>
                  <p class="tag index<?php echo $loopIndex;?>"><?php echo $techBlog->tech_blog_category;?></p>
                  <?php foreach($techBlog->tech_blog_tags as $tag): ?>
                    <p class="tag index<?php echo $loopIndex;?>"><?php echo $tag->name; ?></p>
                  <?php endforeach; ?>
                </div>
                <p class="title index<?php echo $loopIndex;?>"><?php echo $techBlog->title;?></p>
              </a>
            <?php
              endwhile;
            else :
            ?>
              <?php if(is_search()) : ?>
                <p>記事が見つかりませんでした。</p>
              <?php else: ?>
                <p>投稿が見つかりませんでした。</p>
              <?php endif;?>
            <?php
            endif;
            ?>
          </div>

          <!-- ページネーションを表示 -->
          <div class="pagination">
            <?php echo TechBlogService::get_pagination($techBlogs); ?>
          </div>

          <?php
          // クエリをリセット
          wp_reset_postdata();
          ?>

          <div class="news-archive__btn-wrapper column">
            <a class="lower-page-btn" href="<?php echo home_url(); ?>">TOPへ戻る</a>
          </div>
        </article>

        <aside class="article-page__sidebar">
          <?php
            if(!wp_is_mobile()) {
              get_template_part('components/search/searchForm', 'tech-blog-category');
            }
          ?>
          <?php get_template_part('components/sidebar/sidebarLinks'); ?>
        </aside>
      </div>
    </div>
  </main>
  <?php get_template_part('components/ctaBanner'); ?>
<?php get_footer();?>