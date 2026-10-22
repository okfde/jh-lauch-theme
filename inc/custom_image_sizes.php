<?php
    /**
     * custom image sizes
     */

    // project teaser medium 240x135
    // project teaser small 290x162
    add_image_size( 'lab-event-teaser', 182, 224, true );
    add_image_size( 'learning-teaser', 620, 304, true );

    add_image_size( 'blog-alpaka-small', 300, 300, true );
    add_image_size( 'blog-alpaka', 560, 560, true );
    add_image_size( 'blog-alpaka-highdpi', 1120, 1120, true );
    add_image_size( 'blog-large', 760, 500, true );
    //add_image_size( 'blog-small', 320, 200, true );
    add_image_size( 'blog-large-highdpi', 1430, 1180, true );
    //add_image_size( 'blog-small-highdpi', 640, 400, true);
    add_image_size( 'partner-teaser', 340, 240);
    add_image_size( 'events-teaser-s', 180, 120, true);
    add_image_size( 'events-teaser-m', 170, 120, true);
    add_image_size( 'events-teaser-highdpi', 340, 240, true);


    add_filter( 'image_size_names_choose', 'lauch_custom_sizes' );
    function lauch_custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            'blog-alpaka' => __( 'Alpaka' ),
            'blog-alpaka-small' => __( 'Alpaka klein' ),
        ) );
    }
