<?php

if ((get_field('next_event'))) {
  $next = get_field('next_event')[0];
  echo "LAST EVENT:";
?>
  <h2><?php echo $next->post_title; ?></h2>

  <p><?php echo apply_filters( 'the_content', $next->post_content); ?></p>
  <p><?php the_field('datum', $next->ID); ?></p>

  <p><?php the_field('summary_video', $next->ID); ?></p>

  <?php //echo do_shortcode("[vuevideo type='project-presentation' location='rostock' year='2019']");

  $loc_term = wp_get_post_terms($next->ID, 'location');
  $year_term = wp_get_post_terms($next->ID, 'year');
  if ($loc_term && $year_term) {
    echo do_shortcode("[vuevideo type='project-presentation' location='". $loc_term[0]->slug ."' year='". $year_term[0]->slug ."']");
  }
  ?>


  <h3>Bilder</h3>
  <ul>
    <?php if( have_rows('image_gallery', $next->ID) ):

    while( have_rows('image_gallery', $next->ID) ): the_row();
    $image = get_sub_field('image');
    ?>
      <li><img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['description'] ?>"></li>

    <?php endwhile;
    endif; ?>
  </ul>

  <h3>Mentor*innen</h3>
  <p>Hier stehen die Mentor*innen</p>

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
  echo "Bisher ist hier noch kein neues Event geplant!";
}
