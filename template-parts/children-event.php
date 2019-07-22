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
    'date_format' => $date_format,
    'parent'      => $post->ID,
) );

if ($children) { ?>
    <ul>
<?php
    foreach($children as $child) { ?>
        <li>
          <?php
          if (get_the_post_thumbnail($child->ID, array(300, 200))) {
          echo get_the_post_thumbnail($child->ID, array(300, 200));
          } else {
            ?><img src="https://placehold.it/300x200" alt="default"><?php
          }
          ?>
            <h2><?php echo $child->post_title ?></h2>

            <a href="<?php echo $child->post_name; ?>" title="Mehr über <?php echo $child->post_title ?>">Mehr lesen</a>
        </li>
<?php
    } ?>
    </ul>
<?php
}
