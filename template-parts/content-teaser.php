<li>
  <article class="c-compact-teaser">
    <a href="<?php the_permalink(); ?>" title="Lies den ganzen Artikel zu <?php the_title(); ?>">
      <div class="teaser-image">
        <picture>
          <?php echo get_the_post_thumbnail(get_the_ID(), 'blog-large'); ?>
        </picture>

        <?php if (get_field('illustration')): ?><img src="<?php echo the_field('illustration') ?>" alt=""><?php endif; ?>
      </div>
      <h2 class="teaser-title"><?php the_title(); ?></h2>
      <div>
        <div class="teaser-summary"><?php the_excerpt(); ?></div>
        <div class="teaser-date">
          <time datetime="<?php echo get_the_date( 'Y-m-j'); ?>">
            <?php echo get_the_date('j. F Y'); ?></time>
        </div>
      </div>
    </a>
  </article>
</li>
