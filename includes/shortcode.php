<?php

add_shortcode( 'list-admin-sticky-notes', 'asn_list_admin_sticky_notes' );
/**
 * Creates shortcode to list all pages that have a sticky note as well as the content of the note
 *
 * @return string, the list of pages along with their note
 */
function asn_list_admin_sticky_notes() {

    $args = array(
        'posts_per_page' 	=> -1,
        'order' 		    => 'ASC',
        'orderby' 		    => 'title',
        'post_type'         => 'any',
        'meta_query'        => array(
                array(
                    'key'       => 'admin_sticky_note',
                    'value'     => '',
                    'compare'   => '!=',
                )
        ),
    );

    $wp_query = new WP_Query( $args );

    $list_sticky_notes = '<ol>';

    if ( $wp_query->have_posts() ) :

        while ( $wp_query->have_posts() ) : $wp_query->the_post();

            $list_sticky_notes .= sprintf( '<li><a href=%s>%s</a>', get_the_permalink(), get_the_title() );
            $list_sticky_notes .= sprintf( '%s</li>', apply_filters( 'the_content', get_post_meta( get_the_ID(), 'admin_sticky_note', true ) ) );

        endwhile; // end of one post

    endif; // end loop

    $list_sticky_notes .= '</ol>';

    return $list_sticky_notes;

}