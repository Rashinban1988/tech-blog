<?php
  global $subtitle, $title;
  $subtitle = 'NEWS';
  $title = 'お知らせ';
  get_header();
?>
  <main class="lower-page__main">
    <?php get_template_part('components/lowerPage/lowerPageHeader'); ?>

    <div class="lower-page__contents-wrapper article">
      <?php get_template_part('components/lowerPage/breadcrumbTrail'); ?>
      <div class="article-page__inner news">
        <article class="article-page__contents">
          <?php
          // カスタムクエリを作成
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
            'post_type' => 'news', // 投稿タイプを指定
            'posts_per_page' => 5, // 出力する投稿数を5件に設定
            'paged' => $paged
          );
          $custom_query = new WP_Query($args);

          // 投稿のループ
          if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) : $custom_query->the_post();
          ?>
            <a href="<?php the_permalink();?>" class="news-archive__content">
              <p class="date"><?php echo get_the_date(); ?></p>
              <p class="title"><?php the_title();?></p>
            </a>
          <?php
            endwhile;
          else :
          ?>
            <p>投稿が見つかりませんでした。</p>
          <?php
          endif;
          ?>

          <!-- ページネーションを表示 -->
          <div class="pagination">
            <?php
            echo paginate_links(array(
              'total' => $custom_query->max_num_pages,
              'current' => max(1, get_query_var('paged')),
              'format' => '?paged=%#%',
              'show_all' => false,
              'type' => 'plain',
              'end_size' => 2,
              'mid_size' => 1,
              'prev_text' => '<img src="' . get_template_directory_uri() . '/images/btn_arrow_green.svg" alt="Previous">',
              'next_text' => '<img src="' . get_template_directory_uri() . '/images/btn_arrow_green.svg" alt="Next">',
            ));
            ?>
          </div>

          <?php
          // クエリをリセット
          wp_reset_postdata();
          ?>

          <div class="news-archive__btn-wrapper pc">
            <a class="lower-page-btn" href="<?php echo home_url(); ?>">TOPへ戻る</a>
          </div>
        </article>

        <aside class="article-page__sidebar">
          <?php get_template_part('components/sidebar/sidebarLinks'); ?>
        </aside>

        <div class="news-archive__btn-wrapper sp">
          <a class="lower-page-btn" href="<?php echo home_url(); ?>">TOPへ戻る</a>
        </div>
      </div>
    </div>
  </main>