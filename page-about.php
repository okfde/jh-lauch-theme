<?php
/**
 * Template Name: About
 */
get_header();
?>

<?php
while ( have_posts() ) :
the_post();
?>

  <?php
  get_template_part( 'template-parts/header-alpaka', get_post_type() ); ?>


  <section class="c-page-section white pt-5 pb-2">
    <div class="c-page-2col">
      <div class="col-s">
        <h2><?php the_field('section1_title'); ?></h2>
      </div>
      <div class="col-m c-page-copy">
        <?php the_field('section1_text'); ?>
      </div>
    </div>
    <div class="c-page-2col pt-5">
      <div class="col-s">
        <h2><?php the_field('publication_title'); ?></h2>
      </div>
      <div class="col-l">
        <?php if( have_rows('publications') ): ?>
        <ul class="c-list-flagitems">
          <?php while ( have_rows('publications') ): the_row(); ?>
          <li class="c-flagitem c-flag points-bottom">
            <h3 class="c-flagitem-title"><?php the_sub_field('pub_title'); ?></h3>
            <p>
              <?php if (get_sub_field('pub_pdf')) : ?><a href="<?php the_sub_field('pub_pdf'); ?>" download>Download [PDF]</a><?php endif ?>
              <?php if (get_sub_field('pub_link')) : ?><a href="<?php the_sub_field('pub_link'); ?>" target="_blank">Onlineversion</a><?php endif ?>
            </p>
          </li>
          <?php endwhile ?>
        </ul>
        <?php endif ?>
      </div>
    </div>
  </section>

  <section class="">
    <div class="c-page-video needs-js">
      <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php the_field('about_video_id') ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <noscript>Kein JavaScript? <a href="https://www.youtube.com/watch?v=<?php the_field('about_video_id') ?>">Sie dir das Video hier an!</a></noscript>
    </div>

    <div class="c-page-video-bottom">
      <h2 class="c-page-video-banner c-flag orange points-top"><img src="" alt="Unterwegs mit Jugend hackt"></h2>
      <div class="c-page-video-meta">
        <p><?php the_field('about_video_meta') ?></p>
      </div>
    </div>
  </section>

  <section class="c-page-section pt-10 pb-2">
    <div class="c-page-2col">
      <h2 class="col-s"><?php the_field('price_title'); ?></h2>
    </div>
    <div class="white c-page-section pb-2">
      <?php if( have_rows('prices') ): ?>
        <ul class="c-list-displayitems">
          <?php while ( have_rows('prices') ): the_row(); ?>
            <li class="c-displayitem">
              <img src="<?php print_r(get_sub_field('price_image')['sizes']['medium']); ?>" alt="Bild von <?php the_sub_field('price_title'); ?>">

              <p class="c-displayitem-title"><?php the_sub_field('price_title'); ?></p>
            </li>
          <?php endwhile ?>
        </ul>
      <?php endif ?>
    </div>
  </section>

  <section class="c-page-section pt-1">
    <h2 class="c-flag mini softblue points-bottom upper">Aus dem Blog</h2>
    <div class="c-page-2col col-break-small jc-sb pt-1">
      <article class="col-l c-page-blog fg fs">
        <div class="p-r addon addon--alpaka addon--bottom addon--left">
          <img src="https://placekitten.com/720/420" alt="alpaka">
        </div>
        <div class="c-page-2col ai-b">
          <h3 class="col-s">Lorkem IPsum dolor sit amet</h3>
          <div class="col-m">
            <p>Lorem ipsum dolor sit amet</p>
          </div>
        </div>
      </article>

      <article class="col-s c-page-blog fg">
        <div class="p-r addon addon--octopus addon--top addon--right">
          <img src="https://placekitten.com/300/200" alt="alpaka">
        </div>
        <div class="">
          <h3>Lorkem IPsum dolor sit amet</h3>
          <div>
            <p>Lorem ipsum dolor sit a</p>
          </div>
      </article>
  </section>

  <section class="c-page-section c-page-2col c-support col-break-small">
    <div class="c-page-2col col-m fs">
      {{ readFile "/static/images/pixel-wave.svg" | safeHTML  }}
      {{ readFile "/static/images/alpaka-red.svg" | safeHTML  }}
    </div>
    <div class="col-m ml-10 fs">
      <h2>Unterstütze unsere Arbeit</h2>
      <div>
        <p>Werde Mitglied im Jugend hackt-Freundes und unterstütze junge Menschen dabei, mit Code die Welt zu verbessern. Der Jugend hackt Freundeskreis ist deine Möglichkeit, die Arbeit unseres Programms langfristig zu sichern. Als Fördermitglied wirst du Teil von Jugend hackt: Du erfährst Inside-Stories und bekommst spezielle Dankeschöns. Auch für engagierte Unternehmen ist etwas dabei!</p>
        <p><a href="#" class="link-cta">ein link</a></p>
      </div>
    </div>
  </section>

  <section class="c-page-section white">
    <h2>Partner*innen & Unterstützer*innen</h2>
    <div class="c-toc ai-s">
      <ul class="c-toc-nav fs">
        <li><a href="#netzwerk">Netzwerk</a></li>
        <li><a href="#foerderer">Förderer</a></li>
      </ul>

      <div class="c-toc-content fg">
        <section id="netzwerk">
          <ul class="c-grid-displayitems">
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Netz</p>
            </li>
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Netz</p>
            </li>
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Netz</p>
            </li>
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Netz</p>
            </li>
          </ul>
        </section>
        <section id="foerderer">
          <ul class="c-grid-displayitems">
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Foerder</p>
            </li>
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Foerder</p>
            </li>
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Foerder</p>
            </li>
            <li class="c-displayitem">
              <img src="https://placekitten.com/200/106" alt="">
              <p class="c-displayitem-text">Foerder</p>
            </li>
          </ul>
        </section>
  </section>
<?php
endwhile;

get_sidebar();
get_footer();
