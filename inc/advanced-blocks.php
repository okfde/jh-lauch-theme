<?php

    /**
     * advanced/ custom gutenberg blocks
     */


    // Gutenberg block styles: keep frontend layout CSS off the editor canvas.
    function advanced_block_frontend_style() {
        wp_enqueue_style(
            'advanced_block_style',
            get_template_directory_uri() . '/styles/advanced_block_style.css',
            array(),
            wp_get_theme()->get( 'Version' )
        );
    }
    add_action( 'wp_enqueue_scripts', 'advanced_block_frontend_style' );

    function advanced_block_editor_assets() {
        wp_enqueue_style(
            'advanced_block_editor',
            get_template_directory_uri() . '/styles/advanced_block_editor.css',
            array(),
            wp_get_theme()->get( 'Version' )
        );

        wp_enqueue_script(
            'advanced_block_script',
            get_template_directory_uri() . '/js/advanced_block_script.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-data', 'wp-block-editor' ),
            wp_get_theme()->get( 'Version' ),
            true
        );
    }
    add_action( 'enqueue_block_editor_assets', 'advanced_block_editor_assets' );

    function advanced_blocks_render_callback($type, $block_attributes, $content ) {
        global $community_id;
        $links = '';
        if ($type == 'event') {
            $terms = get_terms( array(
                'taxonomy' => 'location',
                'hide_empty' => true,
            ) );
            $terms = array_filter($terms, function($item) {
                return $item->parent !== 0;
            });
            $links = join(array_map(function($item) {
                return '<a class="c-info-block__link" href="/events/' . $item->slug .'">' . $item->name . '</a>';
            }, $terms));
        } else {
            $labs = get_posts(array(
                'post_type' => 'lab',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy'  => 'lab-location',
                        'field'     => 'slug',
                        'terms'     => $community_id, // set in functions.php
                        'operator'  => 'NOT IN', // this line excludes the community
                    ),
                )
            ));
            $links = join(array_map(function($item) {
                return '<a class="c-info-block__link" href="/lab/' . $item->post_name .'">' . $item->post_title . '</a>';
            }, $labs));
        }
        return "
<div class=\"c-info-block " . ($type == 'event' ? 'wp-block-advancedblock-event' : 'wp-block-advancedblock-lab') . "\">
  <div class=\"c-info-block__top\">
    <h2>". ($type == 'event' ? 'Events' : 'Labs') . "</h2>
    $content
  </div>
  <div class=\"c-info-block__bottom\">
    $links
  </div>
</div>
    ";
    }

    function advanced_blocks() {

        register_block_type( 'advancedblock/event', array(
            'render_callback' => function($a, $b) {
                return advanced_blocks_render_callback('event', $a, $b);
            }
        ) );

        register_block_type( 'advancedblock/lab', array(
            'render_callback' => function($a, $b) {
                return advanced_blocks_render_callback('lab', $a, $b);
            }
        ) );

    }
    add_action( 'init', 'advanced_blocks' );

    add_filter( 'render_block', 'wrap_classic_block', 10, 2 );
    function wrap_classic_block( $block_content, $block ) {
        if ($block['blockName'] == 'core/paragraph') {
            $type = substr($block['blockName'], strpos($block['blockName'], "/") + 1);
            $block_content = '<div class="block-' . $type . ' ' . ($block['attrs']['className'] ?? '') . '">' . $block_content . '</div>';
        }
        return $block_content;
    }
