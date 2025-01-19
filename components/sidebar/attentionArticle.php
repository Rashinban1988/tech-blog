<?php use App\Service\TechBlogService; ?>
<section class="sidebar-attention-article">
  <h2 class="sidebar-attention-article__title">注目の記事</h2>
    <div class="sidebar-attention-article__contents">
    <?php
      $query = TechBlogService::get_attention_tech_blogs();

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
      ?>
    </div>
</section>