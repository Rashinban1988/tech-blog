<main>
  <?php
    // tech-blogにリダイレクト
    wp_redirect(home_url('/tech-blog'));
    exit;
    // archive-tech-blog.phpの内容を表示
    get_template_part('archive-tech-blog');
  ?>
</main>