<?php

/**
 * 
 * 
 * @package MyFirstPlugin
 * 
 * 
 */

    namespace Inc\Base;

    class Enqueue 
    {
        public function register()
        {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' )); // styles and scripts files
        }

        // Enqueue all the files that i need
        function enqueue() 
        {
            wp_enqueue_style( ' my_custom_style ', PLUGIN_URL. 'assets/custom_style.css');
            wp_enqueue_script( ' my_custom_js ', PLUGIN_URL. 'assets/custom_js.js', array(), true);
        }
    }

