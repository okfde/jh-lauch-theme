<?php
/**
* Template part for pproject teasers
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Lauch
 */


$all_tech = wp_get_post_terms(get_the_ID(), 'tech');
$tech_class = [];
foreach ($all_tech as $t) {
  array_push($tech_class, $t->taxonomy. '-'. $t->slug);
}

$all_topics = wp_get_post_terms(get_the_ID(), 'topics');
$topic_class = [];
foreach ($all_topics as $t) {
  array_push($topic_class, $t->taxonomy. '-'. $t->slug);
}

$all_years = wp_get_post_terms(get_the_ID(), 'year');
$year_class = [];
foreach ($all_years as $t) {
  array_push($year_class, $t->taxonomy. '-'. $t->slug);
}

$all_location = wp_get_post_terms(get_the_ID(), 'location');
$location_class = [];
foreach ($all_location as $t) {
  array_push($location_class, $t->taxonomy. '-'. $t->slug);
}
?>
<li class="<?php echo join(" ", $location_class); ?>
           <?php echo join(" ", $year_class); ?>
           <?php echo join(" ", $tech_class); ?>
           <?php echo join(" ", $topic_class); ?>  c-project-listitem">
  <article class="c-compact-teaser">
    <a href="<?php the_permalink() ?>" class="hover-line-trigger">
      <div class="teaser-image">
        <picture>
          <?php if (get_the_post_thumbnail_url($post->ID, 'events-teaser-highdpi')):  ?>
            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'events-teaser-highdpi'); ?>" alt="" loading="lazy">
          <?php else : ?>
            <source srcset="https://img.youtube.com/vi/<?php echo the_field('youtubeid') ?>/maxresdefault.jpg" media="(min-width: 960px)">
            <img src="https://img.youtube.com/vi/<?php echo the_field('youtubeid') ?>/default.jpg" loading="lazy">
          <?php endif; ?>
        </picture>
      </div>
      <?php if(wp_get_post_terms(get_the_ID(), 'location') &&
               wp_get_post_terms(get_the_ID(), 'year')) : ?>
      <div class="teaser-meta">
        <?php echo wp_get_post_terms(get_the_ID(), 'location')[0]->name; ?>
        <?php echo wp_get_post_terms(get_the_ID(), 'year')[0]->name; ?>
      </div>
      <?php endif; ?>
      <h2 class="teaser-title"><span class="hover-line"><?php the_title() ?></span></h2>
      <div class="teaser-summary"><?php the_excerpt() ?></div>
    </a>
  </article>
</li>
