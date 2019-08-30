<?php
/**
 * Template Name: FAQ
 */
get_header();
?>

<?php
  while ( have_posts() ) :
  the_post();
  ?>
  <div class="c-page-header">

   <?php
    get_template_part( 'template-parts/header-simple', get_post_type() ); ?>

  </div>
  <div class="c-page-section white">
    <div class="c-toc">
      <ul class="c-toc-nav">
        <?php
        $aud = get_terms('audience');

        foreach ($aud as $audience) : ?>
          <li><a href="#<?php echo $audience->slug; ?>"><?php echo $audience->name; ?></a></li>
        <?php
        endforeach ?>
      </ul>

      <div class="c-toc-content">
        <?php
        foreach ($aud as $audience) : ?>
          <section id="<?php echo $audience->slug; ?>">
            <?php
            echo $audience->name;
            $posts = get_posts(array('post_type' => 'faq'));


            foreach ($posts as $post) {

              echo  $post->slug;
            }
            ?>
          </section>
        <?php
        endforeach ?>
      </div>
    </div>
  </div>

  <?php
  endwhile; // End of the loop. ?>

<?php
get_sidebar();
get_footer();
