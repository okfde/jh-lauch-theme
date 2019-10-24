<?php
if ((get_field('next_event'))) {
  $next = get_field('next_event')[0];
?>

<div class="c-page-alpaca-header">
  <div class="c-page-alpaca-featured as-s addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka" >
  </div>
  <div class="c-page-alpaca-title">
    <nav class="c-breadcrumb" aria-label="breadcrumb">
      <ol>
        <?php $ancestors = get_post_ancestors( $post );
        foreach ($ancestors as $a): ?>
          <li>
            <a href="<?php echo get_post_permalink($a); ?>"><?php echo get_the_title($a); ?></a>
          </li>
        <?php endforeach; ?>
      </ol>
    </nav>
    <?php the_title('<h1 class="c-page-title pt-1">', '</h1>')?>
    <div class="c-page-excerpt">
      <?php the_content(); ?>

      <?php if (get_field('anmeldungslink', $next->ID)): ?>
        <a href="<?php the_field('anmeldungslink', $next->ID); ?>"
           class="mt-1 button event-button"><?php echo __("Jetzt Anmelden", "lauch"); ?></a>
        <?php endif; ?>
    </div>
    <div class="pt-1">
      <?php the_field('event_longform', $next->ID); ?>
    </div>

    <?php get_template_part( 'template-parts/contact-person', get_post_type() ); ?>
  </div>

  <?php if (get_field('illustration_right')) : ?>
    <div class="c-page-header-illustration right-top">
      <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="200">
    </div>
  <?php endif ?>
</div>

<section class="c-page-section c-page-center">
  <h2 class="ta-c c-event-title"><?php echo __("Facts zum Event", "lauch"); ?></h2>
  <div class="c-page-2col ai-c c-event-info">
    <div class="col-m fg c-event-overview">
      <?php the_field('event_facts', $next->ID); ?>
    </div>
    <div class="col-m c-event-map" id="map"><noscript>Kein JavaScript? Hier sollte eine Karte mit der Event Location dargestellt werden.</noscript></div>
  </div>
</section>

<div>
  <div class="c-planebanner">
    <a href="<?php the_field('anmeldungslink', $next->ID); ?>"
       title="<?php echo __("Jetzt Anmelden", "lauch"); ?>">
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
    </a>
  </div>
</div>


<section class="c-page-section">
  <div class="">
    <div class="c-program-title">
      <h2><?php echo __("Das Program", "lauch"); ?></h2>
      <?php the_field('event_programm', $next->ID); ?>
    </div>
  </div>
  <div class="c-page-3col c-program jc-sb mt-1">
    <div class="col-s">
      <h3><?php render_svg("/images/events/_freitag.svg"); ?></h3>
      <ol class="">
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
      </ol>
    </div>
    <div class="col-s">
      <h3><?php render_svg("/images/events/_samstag.svg"); ?></h3>
      <ol>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise dfuhdslf sdilufgh lidsufhg idflhglidfuhg lisduhg ilsh</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
      </ol>
    </div>
    <div class="col-s">
      <h3><?php render_svg("/images/events/_sonntag.svg"); ?></h3>
      <ol>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
        <li><img src="https://placehold.it/40x40" class="" alt=""><time>16:00</time><div>Anreise</div></li>
      </ol>
    </div>
  </div>
</section>


  <h3>Sponsor*innen</h3>
  <ul>
  <?php if( have_rows('supporter', $next->ID) ):

  while( have_rows('supporter', $next->ID) ): the_row();

  $image = get_sub_field('supporter_img');
  $link = get_sub_field('supporter_link');
  $name = get_sub_field('supporter_name');
  ?>
  <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
  <?php endwhile;
  endif; ?>
  </ul>
  <h3>Partner*innen</h3>
  <ul>
  <?php if( have_rows('partner', $next->ID) ):

  while( have_rows('partner', $next->ID) ): the_row();
  $image = get_sub_field('partner_img');
  $link = get_sub_field('partner_link');
  $name = get_sub_field('partner_name');
  ?>
  <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>

  <?php endwhile;
  endif; ?>
  </ul>

<?php
} else {
  echo "Es wird ein Event geben, aber noch nichts konkretes!";
}
?>

<?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
