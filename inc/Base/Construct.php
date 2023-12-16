<?php

    /**
     * @package MyFirstPlugin
     */

    namespace Inc\Base;

    class Construct 
    {

        public $plugin_path;
        public $plugin_url;
        public $plugin_basename;

        public function __construct()
        {
            $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) ); // get the path of the direname but get out with 2 levels
            $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) ); 
            $this->plugin_basename = plugin_basename( dirname( __FILE__, 3 ) ).'/MyFirstPlugin.php';
        }
    }
