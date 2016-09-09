<?php
/**
 * Plugin Name: Admin Sticky Notes 2
 *
 * Plugin URI: https://github.com/timothyjensen/admin-sticky-notes
 * Description: Adds a metabox for Admin Notes that appear on the front end when an admin is logged in.  This is helpful for keeping track of edits that need to be made on each post/page.
 *
 * Version: 2.0.0
 *
 * Author: Tim Jensen
 * Author URI: http://www.timjensen.us
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */


if ( ! defined( 'WPINC' ) ) {
    die;
}

// Plugin Directory
define( 'ASN_DIR', __DIR__ );

// Plugin URL
define( 'ASN_URL', plugin_dir_url(__FILE__) );

// Register Admin Sticky Notes metabox
include_once ( ASN_DIR . '/includes/metabox.php' );

// Register Admin Sticky Notes metabox
include_once ( ASN_DIR . '/includes/shortcode.php' );

// Render notes on the front end
include_once ( ASN_DIR . '/includes/front_end.php' );


///**
// * Retrieve a metabox form
// * @since  2.0.0
// * @param  mixed   $meta_box  Metabox config array or Metabox ID
// * @param  int     $object_id Object ID
// * @param  array   $args      Optional arguments array
// * @return string             CMB2 html form markup
// */
//function asn_cmb2_get_metabox_form( $meta_box, $object_id = 0, $args = array() ) {
//
//    $object_id = $object_id ? $object_id : get_the_ID();
//    $cmb       = cmb2_get_metabox( $meta_box, $object_id );
//
//    ob_start();
//    // Get cmb form
//    asn_cmb2_print_metabox_form( $cmb, $object_id, $args );
//    $form = ob_get_contents();
//    ob_end_clean();
//
//    return apply_filters( 'cmb2_get_metabox_form', $form, $object_id, $cmb );
//}
//
///**
// * Display a metabox form & save it on submission
// * @since  1.0.0
// * @param  mixed   $meta_box  Metabox config array or Metabox ID
// * @param  int     $object_id Object ID
// * @param  array   $args      Optional arguments array
// */
//function asn_cmb2_print_metabox_form( $meta_box, $object_id = 0, $args = array() ) {
//
//    $object_id = $object_id ? $object_id : get_the_ID();
//    $cmb = cmb2_get_metabox( $meta_box, $object_id );
//
//    // if passing a metabox ID, and that ID was not found
//    if ( ! $cmb ) {
//        return;
//    }
//
//    $args = wp_parse_args( $args, array(
//        'form_format' => '<form class="cmb-form" method="post" id="%1$s" enctype="multipart/form-data" encoding="multipart/form-data"><input type="hidden" name="object_id" value="%2$s">%3$s<input type="submit" name="submit-cmb" value="%4$s" class="button-primary"></form>',
//        'save_button' => __( 'Save Note', 'cmb2' ),
//        'object_type' => $cmb->mb_object_type(),
//        'cmb_styles'  => $cmb->prop( 'cmb_styles' ),
//        'enqueue_js'  => $cmb->prop( 'enqueue_js' ),
//    ) );
//
//    // Set object type explicitly (rather than trying to guess from context)
//    $cmb->object_type( $args['object_type'] );
//
//    // Save the metabox if it's been submitted
//    // check permissions
//    // @todo more hardening?
//    if (
//        $cmb->prop( 'save_fields' )
//        // check nonce
//        && isset( $_POST['submit-cmb'], $_POST['object_id'], $_POST[ $cmb->nonce() ] )
//        && wp_verify_nonce( $_POST[ $cmb->nonce() ], $cmb->nonce() )
//        && $object_id && $_POST['object_id'] == $object_id
//    ) {
//        $cmb->save_fields( $object_id, $cmb->object_type(), $_POST );
//    }
//
//    // Enqueue JS/CSS
//    if ( $args['cmb_styles'] ) {
//        CMB2_hookup::enqueue_cmb_css();
//    }
//
//    if ( $args['enqueue_js'] ) {
//        CMB2_hookup::enqueue_cmb_js();
//    }
//
//    $form_format = apply_filters( 'cmb2_get_metabox_form_format', $args['form_format'], $object_id, $cmb );
//
//    $format_parts = explode( '%3$s', $form_format );
//
//    // Show cmb form
//    printf( $format_parts[0], $cmb->cmb_id, $object_id );
//    $cmb->show_form();
//
//    if ( isset( $format_parts[1] ) && $format_parts[1] ) {
//        printf( str_ireplace( '%4$s', '%1$s', $format_parts[1] ), $args['save_button'] );
//    }
//
//}



