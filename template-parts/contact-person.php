<aside>
  <?php $contact = get_field('contact_person'); ?>
  <div class="c-contact">
    <h4 class="c-contact-title"><?php echo __("Du hast Fragen?", 'lauch') ?></h4>
    <div class="c-contact-body">
      <img src="<?php echo get_the_post_thumbnail_url( $contact->ID, array(139, 106) ); ?>" alt="" class="c-contact-image">
      <div class="c-contact-text">
        <p><strong><?php echo $contact->post_title; ?></strong>,<br>
          <?php echo $contact->person_description; ?></p>
        <p><a href="mailto:<?php echo $contact->person_email ?>">
          <?php printf( __( 'Schreib %s eine Mail', 'lauch' ), explode(' ', $contact->post_title)[0] ); ?></a></p>
      </div>
    </div>
  </div>
</aside>
