<div class="c-search">
  <div class="c-search-inner">
    <form role="search" method="get" action="<?php echo home_url('/'); ?>" class="c-search-bottomline">
      <input type="text"
             id="search-input"
             placeholder="Was suchst du?"
             class="c-search-input"
             name="s"
             value="<?php the_search_query(); ?>">
      <label for="search-input"
             class="a11y-visuallyhidden">Suche</label>
      <input type="submit"
             value="Suche"
             class="c-search-submit">

      <div class="c-search-illustration">
        <?php get_template_part('images/illustrations', 'search.svg' ); ?>
      </div>
    </form>
  </div>
</div>
