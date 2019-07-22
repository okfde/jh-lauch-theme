<?php

if ((get_field('next_event'))) {
  $next = get_field('next_event')[0];
  echo "NEXT EVENT:";
?>
  <h2><?php echo $next->post_title; ?></h2>

  <p><?php echo $next->post_content; ?></p>
  <p><?php the_field('anmeldungslink', $next->ID); ?></p>
  <p><?php the_field('datum', $next->ID); ?></p>

  <h3>Facts</h3>
  <p><?php the_field('event_facts', $next->ID); ?></p>

  <p>Hier kommt ein Video oder so</p>

  <h3>Programm</h3>
  <p><?php the_field('event_programm', $next->ID); ?></p>
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
