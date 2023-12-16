<?php

    /**
     * @package MyFirstPlugin
     */

    namespace Inc;

    /** final: this class will never be extends */
    final class Init
    {
        /**
         * 
         * store all the classes that i want initialize in an array
         * @return array of all the classes
         * 
         */
        public static function get_services()
        {
            return [
                Pages\Admin::class,
                Base\enqueue::class,
                Base\SettingLinks::class
            ];
        }

        /**
         * Loop through the classes, initialize them and call the register method if existds
         * @return
         */
        public static function register_services()
        {
            foreach ( self::get_services() as $class )
            {
                $service = self::instantiate( $class );
                if ( method_exists($service, 'register')){
                    $service->register();
                }
            }
        }

        /**
         * 
         * initialize the classes
         * @param class $class from the services array
         * @return class $instence new instence of a class
         * 
         */
        private static function instantiate( $class )
        {
            return new $class();
        }
    }

   
    //     // Method to generate our custom post, this custom_post_type will show Books in wp dashboard
    //     public function custom_post_type()
    //     {
    //         register_post_type( 'book', [ 'public' => true , 'label' => 'Books' ]);
    //     }

    //     
    //     public static function activate(){
    //         // Flush rewrite rules ( Refresh the db to read the new stuffs during the activation )
    //         flush_rewrite_rules();
    //     }

    //     public static function deactivate(){
    //         // Flush rewrite rules ( Refresh the db to read the new stuffs during the activation )
    //         flush_rewrite_rules();
    //     }
    // }

   