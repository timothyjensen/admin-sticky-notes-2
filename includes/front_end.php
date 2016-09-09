<?php
/**
 * @todo change the hook on which this is executed
 */
// Renders notes on the front end only when an Admin is logged in
add_action('wp', 'asn_admin_notes');


/**
 * Adds notes on the front end when Admin is logged in
 * Helps with the revisions process
 *
 */
function asn_admin_notes()
{

    if (!current_user_can('edit_dashboard'))
        return;

    // Enqueue required Javascript
    add_action('wp_enqueue_scripts', 'asn_enqueue_admin_scripts');

    // Add Admin Notes to front end
    add_action('wp_head', 'asn_metabox_fields_save', 13);

    // Add Admin Notes to front end
    add_action('wp_head', 'asn_render_admin_notes', 13);

}

/**
 * Enqueue necessary scripts and styles
 *
 */
function asn_enqueue_admin_scripts()
{

    wp_enqueue_script('admin-sticky-notes', ASN_URL . 'js/admin-sticky-notes.js', array('jquery', 'jquery-ui-draggable'), '1.0.0', false);

    wp_enqueue_style('admin-notes', ASN_URL . 'css/admin-notes-style.css', array(), '1.0.0', false);

}

/**
 * Renders Admin Notes on the appropriate pages.
 *
 */
function asn_render_admin_notes()
{

    wp_reset_postdata();

    $post_ID = get_the_ID();

    // Get the note content
    $admin_notes = get_post_meta($post_ID, 'admin_sticky_note', true);

    // Return if there are no notes
    if (empty ($admin_notes))
        return;

    // Render the note
    echo '<div id="admin-notes" class="entry-content"><div id="tj-admin-note">';

    echo apply_filters('the_content', $admin_notes);

    echo '</div>'; // End #tj-admin-note

    asn_render_front_end_note_editor();
}

function asn_render_front_end_note_editor()
{

    wp_reset_postdata();

    // Button toggles the note editor
    echo '<button id="toggle-editor">edit note</button>';

    echo '<div id="tj-admin-note-editor" class="hidden">';
    echo '<form action="" method="post" target="_self">';
    asn_metabox_fields();
    echo '<input type="submit" value="Submit" /></form>';

    echo '</div>';

    echo '</div>'; // End #admin-notes

}