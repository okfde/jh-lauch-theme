<?php
/**
 * EVENT META BOXES
 */

/**
 * Event facts
 */
add_action( 'admin_init', 'lauch_add_event_fact_meta_box' );
function lauch_add_event_fact_meta_box() {
    add_meta_box( 'event_fact_metabox', 'Event facts', 'lauch_event_fact_field', 'event' );
}

function lauch_event_fact_field() {
    global $post;
    $text= get_post_meta($post, '_event_facts' , true );
    wp_editor( htmlspecialchars_decode($text), 'events_fact_box', $settings = array('textarea_name'=> 'Facts') );
}

add_action( 'save_post', 'lauch_save_event_fact_field' );
function lauch_save_event_fact_field() {
    if ( 'event' != get_post_type( $post_id ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    $datta=htmlspecialchars($_POST['events_fact_box']); //make sanitization more strict !!
    update_post_meta($post_id, '_event_facts', $datta );
}

/**
 * Event programm
 */
add_action( 'admin_init', 'lauch_add_event_programm_box' );
function lauch_add_event_programm_box() {
    add_meta_box( 'event_programm_metabox', 'Event Programm', 'lauch_event_programm_field', 'event' );
}

function lauch_event_programm_field() {
    global $post;
    $text= get_post_meta($post, '_event_programm' , true );
    wp_editor( htmlspecialchars_decode($text), 'events_programm_box', $settings = array('textarea_name'=> 'Programm') );
    ?><input type="hidden" name="event_programm_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" /><?php
}

add_action( 'save_post', 'lauch_save_event_programm_field' );
function lauch_save_event_programm_field() {
    if ( 'event' != get_post_type( $post_id ) )
        return $post_id;

    if ( empty( $_POST['event_programm_nonce'] ) || !wp_verify_nonce( $_POST['event_programm_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    $datta=htmlspecialchars($_POST['events_programm_box']);
    update_post_meta($post_id, '_event_programm', $datta );
}
