<?php
/**
 * Register the Admin Sticky Note metabox
 *
 * @todo add text domain for plugin
 * @todo limit the display of metabox to post types with 'POST' capability
 */

add_action( 'add_meta_boxes', 'asn_render_metabox' );

function asn_render_metabox() {
    add_meta_box( 'asn_metabox', __( 'Admin Sticky Note', 'asn-textdomain' ), 'asn_metabox_fields', null, 'normal', 'high' );
}

/**
 * @param $post object
 *
 * @todo remove superfluous options from wysiwyg
 * @todo $content should be the meta_value
 */
function asn_metabox_fields() {
    wp_nonce_field( basename( __FILE__ ), 'asn_nonce' );

    $content = get_post_meta( get_the_ID(), 'admin_sticky_note', true );
    $editor_id = 'admin_sticky_note';
	$settings = array(
		'media_buttons' => false,
		'textarea_rows' => '10',
		'editor_height' => '300px',
	);

    wp_editor( $content, $editor_id, $settings );
}

add_action( 'save_post', 'asn_metabox_fields_save' );
/**
 * Saves the custom meta input
 *
 * @param int $post_id  ID of the current post
 */
function asn_metabox_fields_save() {
    $post_id = get_the_ID();

    $is_valid_nonce = ( isset( $_POST[ 'asn_nonce' ] ) && wp_verify_nonce( $_POST[ 'asn_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) || ! $is_valid_nonce )
        return;

    // Checks for input and sanitizes/saves if needed
    if ( isset( $_POST[ 'admin_sticky_note' ] ) ) {
        update_post_meta( $post_id, 'admin_sticky_note', wp_kses_post( $_POST[ 'admin_sticky_note' ] ) );
    }
}
