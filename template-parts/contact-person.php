<aside>
  <?php if (get_field('contact_person')): ?>
    <?php $contact = get_field('contact_person'); ?>
    <div class="c-contact">
      <h4 class="c-contact-title"><?php echo __("Du hast Fragen?", 'lauch') ?></h4>
      <div class="c-contact-body">
        <img src="<?php echo get_the_post_thumbnail_url( $contact->ID, array(139, 106) ); ?>" alt="" class="c-contact-image">
        <div class="c-contact-text">
          <p><strong><?php echo $contact->post_title; ?></strong>,<br>
            <?php echo $contact->person_description; ?></p>

          <p>
            <?php if ($contact->person_twitter != ""): ?>
              <a href="<?php echo $contact->person_twitter ?>"
                 title="<?php echo _('Bei Twitter', 'lauch'); ?>">
                <?php render_svg('/images/icons/contact-twitter.svg'); ?></a>
            <?php endif; ?>
            <?php if ($contact->person_instagram != ""): ?>
              <a href="<?php echo $contact->person_instagram ?>"
                 title="<?php echo _('Bei Instagram', 'lauch'); ?>">
                <?php render_svg('/images/icons/contact-instagram.svg'); ?></a>
            <?php endif; ?>
            <?php if ($contact->person_mastodon != ""): ?>
            <a href="<?php echo $contact->person_mastodon ?>"
               title="<?php echo _('Bei Mastodon', 'lauch'); ?>">
              <?php render_svg('/images/icons/contact-mastodon.svg'); ?></a>
            <?php endif; ?>
            <?php if ($contact->person_email != ""): ?>
            <a href="mailto:<?php echo $contact->person_email ?>"
               title="<?php echo _('Schreib eine Mail', 'lauch'); ?>">
              <?php render_svg('/images/icons/contact-mail.svg'); ?></a>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </div>
  <?php endif; ?>
</aside>
