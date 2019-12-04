<aside>
  <?php
  if (get_field('contact_person')) :
    echo do_shortcode('[contactperson person="'. get_field('contact_person') .'", title="'. _("Du hast Fragen?", 'lauch') .'"]');
  endif; ?>
</aside>
