<?php

    /**
     * @package MyFirstPlugin
    */

    namespace Inc\Base;

    use Inc\Base\Construct;

    class SettingLinks extends Construct
    {
        public function register()
        {
            add_filter( "plugin_action_links_$this->plugin_basename", array( $this, 'settings_link' ) );
        }

        public function settings_link( $links ){
            $settings = '<a href="admin.php?page=menu_my_first_plugin_id">Settings</a>';
            array_push( $links, $settings );
            return $links;
        }
    }