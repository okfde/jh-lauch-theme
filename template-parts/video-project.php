<div class="c-page-section jc-sb c-page-2col c-project">
  <div class="col-l fg needs-js">
    <?php if (get_field('mediaccc')): ?>
    <iframe width="560" height="315" src="<?php the_field('mediaccc')?>/oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <noscript>Kein JavaScript? <a href="<?php the_field('mediaccc')?>">Sie dir das Video hier an!</a></noscript>
    <?php else ?>
    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php the_field('youtubeid', $post) ?>?controls=1&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <noscript>Kein JavaScript? <a href="https://youtube.com/watch?v=<?php the_field('youtubeid', $post) ?>">Sie dir das Video hier an!</a></noscript>
    <? endif ?>
  </div>
  <div class="col-s c-project-profile">
    <dl>
      <dt>von</dt>
      <dd><?php the_field('attendees') ?></dd>

      <?php if (wp_get_post_terms(get_the_ID(), 'location')): ?>
        <dt>Ort</dt>
        <dd><?php echo wp_get_post_terms(get_the_ID(), 'location')[0]->name; ?></dd>
      <?php endif ?>

      <?php if (wp_get_post_terms(get_the_ID(), 'year')): ?>
        <dt>Jahr</dt>
        <dd><?php echo wp_get_post_terms(get_the_ID(), 'year')[0]->name; ?></dd>
      <?php endif ?>

      <?php if (wp_get_post_terms(get_the_ID(), 'topics')): ?>
        <dt>Thema</dt>
        <dd><?php echo wp_get_post_terms(get_the_ID(), 'topics')[0]->name; ?></dd>
      <?php endif ?>

      <?php if (wp_get_post_terms(get_the_ID(), 'tech')): ?>
        <dt>Technik</dt>
        <dd><?php echo wp_get_post_terms(get_the_ID(), 'tech')[0]->name; ?></dd>
      <?php endif ?>

      <dt>Links</dt>
      <dd>
        <?php if (get_field('github')): ?>
          <a href="<?php the_field('github'); ?>">Git-Repository <?php echo render_svg('/images/arrow-external-white.svg'); ?></a>
        <?php endif ?>
        <?php if (get_field('mediaccc')): ?>
          <a href="<?php the_field('mediaccc')?>">Media.CCC.de <?php echo render_svg('/images/arrow-external-white.svg'); ?></a>
        <?php endif ?>
        <?php if (get_field('youtubeid')): ?>
          <a href="https://youtube.com/watch?v=<?php the_field('youtubeid', $post) ?>">YouTube <?php echo render_svg('/images/arrow-external-white.svg'); ?></a>
        <?php endif ?>
        <?php if (get_field('hackdashurl')): ?>
          <a href="<?php the_field('hackdashurl')?>">HackDash <?php echo render_svg('/images/arrow-external-white.svg'); ?></a>
        <?php endif ?>
      </dd>
    </dl>
  </div>
</div>
