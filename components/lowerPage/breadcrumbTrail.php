<?php global $subtitle, $title, $secondLayer, $secondLayerUrl, $breadTitle; ?>

<section class="breadcrumb-trail">
  <a href="<?php echo home_url();?>">トップページ</a>
  <span> > </span>
  <?php if($secondLayer != '') : ?>
    <a href="<?php echo home_url($secondLayerUrl);?>"><?php echo $secondLayer;?></a>
    <span> > </span>
  <?php endif;?>

  <?php if($breadTitle && $breadTitle !== '') : ?>
    <span><?php echo $breadTitle;?></span>
  <?php else : ?>
    <span><?php echo $title;?></span>
  <?php endif; ?>
</section>