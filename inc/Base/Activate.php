<?php

    /**
     * @package MyFirstPlugin
     */

    namespace Inc\Base;

    class Activate
    {
        public static function activate(){
            // Flush rewrite rules ( Refresh the db to read the new stuffs during the activation )
            flush_rewrite_rules();
        }
    }