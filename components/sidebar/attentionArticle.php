<section class="sidebar-attention-article">
  <h2 class="sidebar-attention-article__title">注目の記事</h2>
    <div class="sidebar-attention-article__contents">
    <?php
      $args = array(
          'post_type' => 'tech-blog',
          'posts_per_page' => -1, // 一旦全ての投稿を取得
          'orderby' => 'rand' // ランダムに並び替え
      );
      $query = new WP_Query($args);

      $filtered_posts = array();

      if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
              $attention_flag = get_field('column__attention_flag');
              if (is_array($attention_flag) && in_array('注目の記事に設定', $attention_flag)) {
                  $filtered_posts[] = get_the_ID();
              }
          endwhile;
          wp_reset_postdata();
      endif;

      if (!empty($filtered_posts)) :
          $args = array(
              'post_type' => 'tech-blog',
              'posts_per_page' => 3, // ランダムに3件取得
              'orderby' => 'rand',
              'post__in' => $filtered_posts
          );
          $query = new WP_Query($args);

          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post();
      ?>
          <a href="<?php the_permalink();?>" class="link">
            <?php if (has_post_thumbnail()) : ?>
              <div class="thumbnail">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
              </div>
            <?php endif; ?>
            <div class="text-wrapper">
              <p><?php the_title();?></p>
            </div>
          </a>
      <?php
              endwhile;
              wp_reset_postdata();
          endif;
      endif;
      ?>
    </div>
</section>