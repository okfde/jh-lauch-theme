<?php
/**
 * Template Name: Leer-Credits (Videos)
 */
?>
<!doctype html>
<html lang="de">
    <head>
        <title>Credits</title>
        <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
        <link href='<?php echo get_template_directory_uri() ?>/styles/empty-credits.css' rel='stylesheet'>
    </head>
    <body style="background-color:black;">

  <?php
  while ( have_posts() ) :
  the_post();
  the_content();
  endwhile; // End of the loop.
  ?>
    </body>
</html>
