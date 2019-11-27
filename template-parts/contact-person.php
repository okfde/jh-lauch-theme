<aside>
  <?php
  $contact = get_field('contact_person');
  if ($contact) :
    echo do_shortcode('[contactperson person="'. $contact .'", title="'. _("Du hast Fragen?", 'lauch') .'"]');
  endif; ?>
</aside>
