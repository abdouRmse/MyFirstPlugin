<?php

    /**
     * @package MyFirstPlugin
    */

    namespace Inc\Base;

    class SettingLinks 
    {
        protected $basename;

        function __construct()
        {
            $this->basename = PLUGIN_BASE_NAME;
        }
        public function register()
        {
            add_filter( "plugin_action_links_$this->basename", array( $this, 'settings_link' ) );

        }

        public function settings_link( $links ){
            $settings = '<a href="admin.php?page=menu_my_first_plugin_id">Settings</a>';
            array_push( $links, $settings );
            return $links;
        }
    }