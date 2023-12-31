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

    // For the Security if the hacker try to access from an external place 
    if( !defined('ABSPATH') ){
        die('The access is Refused');
    }

    function PluginActivate()
    {
        Inc\Base\Activate::activate();
    }

    function PluginDeactivate()
    {
        Inc\Base\Deactivate::deactivate();
    }

    register_activation_hook( __FILE__, 'PluginActivate') ;
    register_deactivation_hook( __FILE__, 'PluginDeactivate') ;    


    if( file_exists( dirname( __FILE__ ). '/vendor/autoload.php') ){
        require_once dirname(__FILE__). '/vendor/autoload.php';     // or: require_once __DIR__. '/vendor/autoload.php';
    }

    if( class_exists( 'Inc\\Init')){
        Inc\Init::register_services();
    }