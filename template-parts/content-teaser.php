<?php
$s = get_option( 'sticky_posts' ); ?>
<article class="c-compact-teaser <?php if (get_the_ID() == $s[0]) { echo 'js-sticky'; }  ?>">
  <a href="<?php the_permalink(); ?>"
     title="Lies den ganzen Artikel zu <?php the_title(); ?>"
     class="hover-line-trigger">
    <div class="teaser-image">
      <picture>
        <?php if (get_the_post_thumbnail(get_the_ID(), 'blog-large')) : ?>
          <?php echo get_the_post_thumbnail(get_the_ID(), 'blog-large'); ?>
        <?php else : ?>
          <img src="https://jugendhackt.org/wp-content/uploads/2019/10/ueber-jh-760x500.jpg" alt="">
          <?php endif ?>
      </picture>

      <?php if (get_field('illustration')): ?><img src="<?php echo the_field('illustration') ?>" alt="" loading="lazy"><?php endif; ?>
    </div>
    <h2 class="teaser-title"><span class="hover-line"><?php the_title(); ?></span></h2>
    <div>
      <div class="teaser-summary"><?php the_excerpt(); ?></div>
      <div class="teaser-date">
        <time datetime="<?php echo get_the_date( 'Y-m-j'); ?>">
          <?php echo get_the_date('j. F Y'); ?></time>
      </div>
    </div>
  </a>
</article>
