<?php
/**
 * The template for displaying all single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();
while ( have_posts() ) :
the_post(); ?>

  <section class="">
    <header class="c-page-offcenter-header">
      <h1 class="c-page-title"><?php the_title(); ?></h1>
      <div class="c-page-excerpt"><?php the_content(); ?></div>
    </header>

    <?php if (have_rows('videos')):
    while( have_rows('videos') ): the_row(); $post = get_sub_field('video')[0]; ?>

        <div class="c-page-section jc-sb c-page-2col c-project">
          <div class="col-l fg needs-js">
            <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php the_field('youtubeid', $post) ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <noscript>Kein JavaScript? <a href="https://youtube.com/watch?v=<?php $post ?>">Sie dir das Video hier an!</a></noscript>
          </div>
          <div class="col-s c-project-profile">
            <dl>
              <dt>von</dt>
              <dd><?php the_field('attendees', $post) ?></dd>

              <?php if (wp_get_post_terms($post, 'location')): ?>
              <dt>Ort</dt>
              <dd><?php echo wp_get_post_terms($post, 'location')[0]->name; ?></dd>
              <?php endif ?>

              <?php if (wp_get_post_terms($post, 'year')): ?>
              <dt>Jahr</dt>
              <dd><?php echo wp_get_post_terms($post, 'year')[0]->name; ?></dd>
              <?php endif ?>

              <?php if (wp_get_post_terms($post, 'topics')): ?>
              <dt>Thema</dt>
              <dd><?php echo wp_get_post_terms($post, 'topics')[0]->name; ?></dd>
              <?php endif ?>

              <?php if (wp_get_post_terms($post, 'tech')): ?>
              <dt>Technik</dt>
              <dd><?php echo wp_get_post_terms($post, 'tech')[0]->name; ?></dd>
              <?php endif ?>

              <dt>Links</dt>
              <dd>
                <?php if (get_field('github', $post)): ?>
                  <a href="<?php the_field('github', $post); ?>">Git-Repository <?php echo render_svg('/images/arrow-external-white.svg'); ?></a>
                <?php endif ?>
                <?php if (get_field('mediaccc', $post)): ?>
                  <a href="<?php the_field('mediaccc', $post)?>">Media.CCC <?php echo render_svg('/images/arrow-external-white.svg'); ?></a>
                <?php endif ?>
                <?php if (get_field('hackdashurl', $post)): ?>
                  <a href="<?php the_field('hackdashurl', $post)?>">HackDash <?php echo render_svg('/images/arrow-external-white.svg'); ?></a>
                <?php endif ?>
              </dd>
            </dl>
          </div>
        </div>

        <?php
        //get_template_part( 'template-parts/children', 'exchange' )
        ?>

        <?php endwhile; ?>
    <?php endif; ?>

  </section>


  <section class="c-catnav c-catnav--slider p-r">
  <h2 class="c-catnav-title--rot">Weiter geht's</h2>
  <nav>
    <ul>
      <li class="c-catnav-slide">
        <a href="#" class="c-page-2col ai-c">
          <img src="//placekitten.com/300/200" alt="" width="400" height="200">
          <div class="">
            <p class="c-catnav-meta">Rostock 2019</p>
            <h3><span>Unterwegs mit</span></h3>
            <p>Lorem ipsum dolor sit amet ipsum dolor sit amet.</p>
          </div>
        </a>
      </li>
      <li class="c-catnav-slide">
        <a href="#" class="c-page-2col ai-c">
          <img src="//placekitten.com/300/200" alt="" width="400" height="200">
          <div class="">
            <p class="c-catnav-meta">Rostock 2019</p>
            <h3><span>Unterwegs mit</span></h3>
            <p>Lorem ipsum dolor sit amet ipsum dolor sit amet.</p>
          </div>
        </a>
      </li>
      <li class="c-catnav-slide">
        <a href="#" class="c-page-2col ai-c">
          <img src="//placekitten.com/300/200" alt="" width="400" height="200">
          <div class="">
            <p>Rostock 2019</p>
            <h3><span>Unterwegs mit</span></h3>
            <p>Lorem ipsum dolor sit amet ipsum dolor sit amet.</p>
          </div>
        </a>
      </li>
    </ul>
    <!-- <div class="c-catnav-nav p-a">
         <button type="button">back</button>
         <button type="button">next</button>
         </div> -->
  </nav>
</section>

<?php
endwhile; ?>

<?php
get_footer();
