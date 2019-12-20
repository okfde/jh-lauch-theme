<aside>
  <?php
  if (get_field('contact_person', $post) && get_field('contact_person', $post) != '') :
    echo do_shortcode('[contactperson person="'. get_field('contact_person', $post) .'" title="'. _("Du hast Fragen?", 'lauch') .'"]');
  endif; ?>
</aside>
