<div class="c-page-section jc-sb c-page-2col c-project">
  <div class="col-l fg needs-js">
    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php the_field('youtubeid', $post) ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <noscript>Kein JavaScript? <a href="https://youtube.com/watch?v=<?php the_field('youtubeid', $post) ?>">Sie dir das Video hier an!</a></noscript>
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
