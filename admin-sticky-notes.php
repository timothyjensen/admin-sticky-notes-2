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
