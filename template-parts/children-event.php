<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */

$children = get_pages( array(
  'title_li'    => '',
  'child_of'    => $post->ID,
  'show_date'   => 'modified',
  'parent'      => $post->ID,
) );

if ($children) : ?>
  <ul>
    <?php
    foreach($children as $child): the_row(); ?>
      <li class="c-page-2col ai-c">
        <?php
        if (get_the_post_thumbnail($child->ID, array(300, 200))) :
        echo get_the_post_thumbnail($child->ID, 'thumbnail');
        else : ?>
          <img src="https://placehold.it/300x200" alt="default">
        <?php
        endif; ?>
        <div>
          <h2><?php echo $child->post_title ?></h2>

          <a href="<?php echo $child->post_name; ?>" title="Mehr Infos zu <?php echo $child->post_title ?>">Mehr Infos</a>
        </div>
        <div>
          <?php
          if (get_field('is_active', $child->ID)) :
          if (get_field('next_event', $child->ID)) :
          $event = get_field('next_event', $child->ID)[0]; ?>
            <p><?php the_field('datum', $event->ID); ?></p>
            <p><a href="<?php the_field('anmeldungslink', $event->ID); ?>">Anmelden</a></p>
        <?php
        endif;

        endif; ?>
        </div>
      </li>
    <?php
    endforeach; ?>
  </ul>
<?php
endif;
