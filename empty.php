<?php
/**
 * Template Name: Leer (Videos)
 */
?>
<!doctype html>
<html lang="de">
    <head>
        <title>Jugend hackt</title>
        <script src="https://play.workadventu.re/iframe_api.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
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
