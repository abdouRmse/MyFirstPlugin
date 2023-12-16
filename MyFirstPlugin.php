<?php 

    /*
    * Plugin Name: My First Plugin
    * Plugin URI: https://Abdenoursite.com/plugins/My-first-plugin
    * Description: This plugin is made by Abdenour Koudache it is a learning plugin.
    * Version: 1.0.0
    * Requires at least: 5.2
    * Requires PHP: 7.2
    * Author: Koudache Abdenour
    * Author URI: https://Abdenoursite.com
    * License: 
    * License URI: 
    */

    /*if( !defined('ABSPATH') ){
        die('The access is Refused');
    }*/

    // the autoload include to enable the namespace:
    require_once dirname(__FILE__). '/required_autoload.php';
    Required_autoload::required_autoload_composer();

    //use Inc\Activate;
    //use Inc\Deactivate;

    class MyFirstPlugin
    {
        public $baseName;
        
        // The construct is where we initialize the arguments
        function __construct()
        {
            $this->baseName = plugin_basename( __FILE__ );
        }

        // This function will add all my enqueues files that i need in the same time
        public function register()
        {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' )); // styles and scripts files

            add_action( 'admin_menu', array( $this, 'add_admin_pages')); // add the menu pages

            add_filter( "plugin_action_links_$this->baseName", array( $this, 'settings_link' ) );
        }

        public function settings_link( $links ){
            $settings = '<a href="admin.php?page=menu_my_first_plugin_id">Settings</a>';
            array_push( $links, $settings );
            return $links;
        }

        public function add_admin_pages()
        {
            add_menu_page( 'My Plugin','Abdou Plugin', 'manage_options', 'menu_my_first_plugin_id', array( $this, 'admin_index' ),'dashicons-book-alt', 20 ); // in the place of the icon i can make a custom icon: /* plugins_url( '/assets/icons/book-solid.svg', __FILE__ )*/
        }

        public function admin_index(){
           require_once( plugin_dir_path( __FILE__ ).'/templates/admin_plugin_page.php');
        }

        // Method to generate our custom post, this custom_post_type will show Books in wp dashboard
        public function custom_post_type()
        {
            register_post_type( 'book', [ 'public' => true , 'label' => 'Books' ]);
        }

        // Enqueue all the files that i need
        function enqueue() 
        {
            wp_enqueue_style( ' my_custom_style ', plugins_url( '/assets/custom_style.css', __FILE__ ));
            wp_enqueue_script( ' my_custom_js ', plugins_url( '/assets/custom_js.js', __FILE__ ), array(), true);
        }

        public static function activate(){
            // Flush rewrite rules ( Refresh the db to read the new stuffs during the activation )
            flush_rewrite_rules();
        }

        public static function deactivate(){
            // Flush rewrite rules ( Refresh the db to read the new stuffs during the activation )
            flush_rewrite_rules();
        }
    }



    if( class_exists('MyFirstPlugin') ){
        $myFirstPlugin = new MyFirstPlugin();
        $myFirstPlugin -> register(); // call to the function that initialize the files style and scripts
    }

    require_once(dirname(__FILE__).'/inc/Activate.php');
    require_once(dirname(__FILE__).'/inc/Deactivate.php');
    //  activation:
    register_activation_hook( __FILE__, array( $myFirstPlugin , 'activate') ) ;
    
    //  deactivation:
    register_deactivation_hook( __FILE__, array( $myFirstPlugin , 'deactivate') ) ;    