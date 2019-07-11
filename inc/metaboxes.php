<?php
/**
 * Add Relationship metaboxes
 * https://wordpress.stackexchange.com/questions/128622/how-do-i-create-a-relationship-between-two-custom-post-types
 */

add_action( 'admin_init', 'lauch_add_video_project_meta_boxes' );
function lauch_add_video_project_meta_boxes() {
    add_meta_box( 'video_project_metabox', 'Video Relationship', 'videos_field', 'project' );
}

function videos_field() {
    global $post;
    $selected_videos = get_post_meta( $post->ID, '_video', true );
    $all_videos = get_posts( array(
        'post_type' => 'video',
        'numberposts' => -1,
        'orderby' => 'post_title',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'type',
                'field' => 'slug',
                'terms' => 'project-presentation',
            )
        ),
    ) );
    ?>
    <input type="hidden" name="video_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" />
    <table class="form-table">
    <tr valign="top"><th scope="row">
    <label for="video">Videos</label></th>
    <td><select name="video">
    <?php foreach ( $all_videos as $video ) : ?>
        <option value="<?php echo $video->ID; ?>"<?php echo (in_array( $video->ID, $selected_videos )) ? ' selected="selected"' : ''; ?>><?php echo $video->post_title; ?></option>
    <?php endforeach; ?>
    </select></td></tr>
    </table>
    <?php
}

add_action( 'save_post', 'lauch_save_video_project_field' );
function lauch_save_video_project_field( $post_id ) {

    // only run this for project
    if ( 'project' != get_post_type( $post_id ) )
        return $post_id;

    // verify nonce
    if ( empty( $_POST['video_nonce'] ) || !wp_verify_nonce( $_POST['video_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    // save
    update_post_meta( $post_id, '_video', intval($_POST['video'], 10) );
}
