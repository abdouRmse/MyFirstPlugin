<?php

    /**
     * @package MyFirstPlugin
     */

    namespace Inc\Base;

    class Deactivate
    {
        public static function deactivate(){
            // Flush rewrite rules ( Refresh the db to read the new stuffs during the activation )
            flush_rewrite_rules();
        }
    }