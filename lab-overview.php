<?php
/**
 * Template Name: Lab Übersicht
 */
get_header();
?>

<?php
while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/header-alpaka', get_post_type() );
?>

<section class="c-blog-list is-grid pt-10">
  <?php
  $args = array('post_type' => 'lab',
                'posts_per_page' => -1);
  $the_query = new WP_Query( $args ); ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <ul class="">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'lab' ); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>
</section>

<section class="c-page-section ta-c">
  <div class="mw-64ex mb-1">
    <h2 class="mb-1"><?php the_field('event_support_title'); ?></h2>
    <p><?php the_field('event_support_text'); ?></p>
  </div>

  <?php if( have_rows('partner')): ?>
  <ul class="d-f jc-c fw-w mt-3">
    <?php
    while( have_rows('partner')): the_row(); ?>
      <li class="ml-3">
        <a href="<?php the_sub_field('partner_link'); ?>"
           title="Zur Website von <?php the_sub_field('partner_name'); ?>">
          <?php
          $image = wp_get_attachment_image_src(get_sub_field('partner_img'), 'events-teaser-highdpi'); ?>
          <img src="<?php echo $image[0] ?>"
               alt="Logo von <?php the_sub_field('partner_name'); ?>"
               height="50">
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
  <?php
  endif; ?>
</section>


<?php
endwhile;


get_footer();
