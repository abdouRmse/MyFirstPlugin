<?php

    class Required_autoload
    {
        public static function required_autoload_composer()
        {
            if( file_exists( dirname( __FILE__ ). '/vendor/autoload.php') ){
                require_once( plugins_url( '/vendor/autoload.php', __FILE__ ) );
            }
        }
    }