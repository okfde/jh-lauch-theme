<div class="c-page-alpaca-header mt-2">
  <div class="c-page-alpaca-featured addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka" >
  </div>
  <div class="c-page-alpaca-title">
    <?php the_title('<h1 class="c-page-title">', '</h1>')?>
    <div class="c-page-excerpt c-page-standard"><?php the_content(); ?></div>
  </div>
</div>
