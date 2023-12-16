<?php

    /**
     * @package MyFirstPlugin
    */

    namespace Inc\Pages;

    class Admin 
    {
        public function register()
        {
            add_action( 'admin_menu', array( $this, 'add_admin_pages')); // add the menu pages

        }

        public function add_admin_pages()
        {
            add_menu_page( 'My Plugin','Myy First Plugin', 'manage_options', 'menu_my_first_plugin_id', array( $this, 'admin_index' ),'dashicons-book-alt', 20 ); // in the place of the icon i can make a custom icon: /* plugins_url( '/assets/icons/book-solid.svg', __FILE__ )*/
        }

        public function admin_index(){
            require_once PLUGIN_PATH.'/templates/admin_plugin_page.php';
        }
        
    }