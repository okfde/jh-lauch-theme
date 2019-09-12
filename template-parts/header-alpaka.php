<div class="c-page-alpaca-header">
  <div class="c-page-alpaca-featured addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka" >
  </div>
  <div class="c-page-alpaca-title">
    <?php the_title('<h1 class="c-page-title">', '</h1>')?>
    <div class="c-page-excerpt"><?php the_content(); ?></div>
  </div>

  <?php if (get_field('illustration_right')) : ?>
  <div class="c-page-header-illustration right-top">
    <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="200">
  </div>
  <?php endif ?>
</div>
