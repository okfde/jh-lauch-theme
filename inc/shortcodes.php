<?php
    /**
     * all shortcodes
     */


    function floatbox_handle_shortcode($atts = "") {
        $value = shortcode_atts( array(
            'color' => 'softblue',
            'text' => null,
            'title' => null,
            'button' => null,
            'link' => null,
            'image' => null,
        ), $atts );

        $out = '<div class="float-box float-box--'. $value['color'] .' float-box--right">';
        $out .= '<img src="'. get_template_directory_uri() .'/images/alpaca-'. $value['color'] .'.svg" alt="" class="float-box-head">';
        if ($value['image']) {
            $out .= '<img src="'. $value['image']  .'" alt="">';
        }
        $out .= '<h2 class="float-box-title">'. $value['title'] .'</h2>';
        $out .= '<p>'. $value['text'] .'</p>';
        $out .= '<a href="'. $value['link'] .'" class="button button--simple button--'. $value['color'] .'">'. $value['button'] .'</a></div>';
        return $out;
    }
    add_shortcode('floatbox', 'floatbox_handle_shortcode');



    function buttonbox_handle_shortcode($atts = "") {
        $value = shortcode_atts( array(
            'text' => null,
            'button' => null,
            'link' => null,
        ), $atts );

        $out = '<div class="c-breakbox c-breakbox--grey">';
        $out .= '<p class="c-breakbox-head">'. $value['text'] .'</p>';
        $out .= '<a href="'. $value['link'] .'" class="button button--simple button--blue">'. $value['button'] .'</a></div> ';
        return $out;
    }
    add_shortcode('buttonbox', 'buttonbox_handle_shortcode');


    function frkr_handle_shortcode($atts = "") {
        $value = shortcode_atts( array(
            'text' => null,
            'button' => 'Jetzt unterstützen',
            'link' => 'https://jugendhackt.org/spenden/',
        ), $atts );

        $out = '<div class="c-breakbox c-breakbox--bg">';
        $out .= '<p class="c-breakbox-head">'. $value['text'] .'</p>';
        $out .= '<a href="'. $value['link'] .'" class="button button--simple button--red">'. $value['button'] .'</a></div> ';
        return $out;
    }
    add_shortcode('frkr', 'frkr_handle_shortcode');


    function contactperson_handle_shortcode($atts = '') {
        $value = shortcode_atts( array(
            'person' => null,
            'title' => null,
        ), $atts );

        $person_id = $value['person'];

        $img = get_the_post_thumbnail_url( $person_id, array(139, 106) );
        $description = get_field('person_description', $person_id);
        $twitter = get_field('person_twitter', $person_id);
        $mastodon = get_field('person_mastodon', $person_id);
        $instagram = get_field('person_instagram', $person_id);
        $email = get_field('person_email', $person_id);

        $out = '<div class="c-contact">';
        if ($value['title']) {
            $out .= '<h4 class="c-contact-title">'. $value['title'] .'</h4>';
        }
        $out .= '<div class="c-contact-body">';
        $out .= '<img src="'. $img .'" alt="" class="c-contact-image" width="100">';
        $out .= '<div class="c-contact-text"><p><strong>'. get_the_title($person_id) .'</strong><br>'. $description.'</p><p>';

        if ($twitter != "") {
            $out .= '<a href="'. $twitter .'" title="'. __('Bei Twitter', 'lauch') .'">'. get_svg('/images/icons/contact-twitter.svg') .'</a>';
        }
        if ($instagram != "") {
            $out .= '<a href="'. $instagram .'" title="'. __('Bei Instagram', 'lauch') .'">'. get_svg('/images/icons/contact-instagram.svg') .'</a>';
        }
        if ($mastodon != "") {
            $out .= '<a href="'. $mastodon .'" title="'. __('Bei Mastodon', 'lauch') .'">'. get_svg('/images/icons/contact-mastodon.svg') .'</a>';
        }
        if ($email != "") {
            $out .= '<a href="mailto:'. $email .'" title="'. __('Schreib eine Mail', 'lauch') .'">'. get_svg('/images/icons/contact-mail.svg') .'</a>';
        }

        $out .= '</p></div></div></div>';

        return $out;

    }
    add_shortcode('contactperson', 'contactperson_handle_shortcode');


    function vuevideo_handle_shortcode($atts = '') {
        $value = shortcode_atts( array(
            'color' => null,
            'location' => null,
            'year' => null,
            'type' => null,
            'topics' => null,
            'tech' => null,
        ), $atts );

        $data_str = 'window.v = {}; window.v.location = "'. $value['location'] .'"; ';
        $data_str .= 'window.v.color = "'. $value['color'] .'"; ';
        $data_str .= 'window.v.year = "'. $value['year'] .'"; ';
        $data_str .= 'window.v.type = "'. $value['type'] .'";';
        $data_str .= 'window.v.tech = "'. $value['tech'] .'";';
        $data_str .= 'window.v.topics = "'. $value['topics'] .'";';

        return '<div class="js"><script>'. $data_str .'</script><div id="vuevideo"></div></div><noscript>Aktiviere JavaScript um den Videoplayer zu benutzen</noscript>';
    }
    add_shortcode('vuevideo', 'vuevideo_handle_shortcode');
