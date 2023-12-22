<?php

    /**
     * @package MyFirstPlugin
    */

    namespace Inc\Api\Callbacks;

    class optionsGroup
    {

        public function idCustomField()
        { 
            //$value = esc_attr( get_option( $option:string, $default:mixed ) )
            echo ' <input type="text" name="text_exemple" value="" placeholder="write the id of the div"';
        }

    }