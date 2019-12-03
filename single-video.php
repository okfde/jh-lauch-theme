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

    <?php get_template_part('template-parts/video', 'project'); ?>
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
