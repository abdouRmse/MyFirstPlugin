<?php

    /**
        * 
        * @package MyFirstPlugin
        *
    */

    // if the hacker try to access from an external path
    if( ! defined( ' WP_UNINSTALL_PLUGIN ' )){
        die;
    }

    // clear db stored data 

    /** First method: good if there is a little bit datas */
    
    $books = get_posts( array( ' post_type ' => ' book ', ' numberposts ' => -1) ); //-1 means all the posts of that type

    foreach ( $books as $book )
    {
        wp_delete_post( $book->ID, true ); // force delete even the post in the trush
    }

    /** Second method: access to db via sql */

    global $wpdb;
    $wpdb->query( " DELETE FROM wp_posts WHERE post_type = 'book' ");    // we delete all the book
    $wpdb->query( " DELETE FROM wp_postmeta WHERE post_id NOT IN ( SELECT id FROM wp_posts ) ");    // delete all the meta of the books deleted before
    $wpdb->query( " DELETE FROM wp_term_relationships WHERE object_id NOT IN ( SELECT id FROM wp_posts ) ");    // delete all the meta of the books deleted before