<?php

    /**
     * @package MyFirstPlugin
    */

    namespace Inc\Api\Callbacks;

    class ManagerCallbacks
    {
        public function checkboxSanitize( $input )
        {
            //return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
            return ( isset($input) ? true : false);
        }

        public function adminSectionManager(){
            echo 'manage the sections and features of this plugin';
        }           
        

        public function checkboxField( $args ) 
        {
            $name = $args[ 'label_for' ];
            $classes = $args[ 'class' ];
            $checkbox = get_option( $name );
            echo '
                    <div class="form-check form-switch">
                        <input type="checkbox" value="1" name='.$name.' class="'.$classes.'" '. ($checkbox ? 'checked' : ''). '>
                    </div>
                ';
        }
    }