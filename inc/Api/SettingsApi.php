<?php

    /**
     * 
     * 
     * @package MyFirstPlugin
     * 
     * 
    */

    namespace Inc\Api;

    class SettingsApi 
    {

        private $admin_pages = array();
        private $sub_menu_pages = array();
        private $settings = array();
        private $sections = array();
        private $fields = array();

        public function register()
        {
            if( !empty( $this->admin_pages )){
                add_action( 'admin_menu', array( $this, 'addAdminMenu')); // add the menu pages
            }

            if( !empty($this->settings) ){
                add_action( 'admin_init', array( $this, 'registerCustomFields')); // add the menu pages
            }
        }


        /** Add the Dashboard menu and submunus */
        public function addAdminMenu()
        {
            foreach( $this->admin_pages as $page ){
                add_menu_page( $page['page_title'],$page['menu_title'], $page['capability'], $page['menu_id'], $page['callback'],$page['icon'], $page['position'] ); 
            }

            foreach ( $this->sub_menu_pages as $sub_menu_page )
            {
                add_submenu_page( $sub_menu_page['parent'], $sub_menu_page['page_title'], $sub_menu_page['menu_title'], $sub_menu_page['capability'], $sub_menu_page['menu_id'], $sub_menu_page['callback'], $sub_menu_page['position'] );
            }

        }


        public function registerCustomFields()
        {
            foreach( $this->settings as $setting )
            {
                register_setting(
                    $setting['option_group'],
                    $setting['option_name'],
                    ( isset($setting['callback']) ) ? $setting['callback'] : ''
                );            
            }

            foreach( $this->sections as $section )
            {
                add_settings_section(
                    $section['id'],
                    $section['title'],
                    $section['callback'],
                    $section['page'],
                    ( isset($section['args']) ) ? $section['args'] : ''
                );            
            }

            foreach( $this->fields as $field )
            {
                add_settings_field(
                    $field['id'],
                    $field['title'],
                    $field['callback'],
                    $field['page'],
                    ( isset( $field['section'] ) ) ? $field['section'] : 'default',
                    ( isset( $field['args'] ) ) ? $field['args'] : '',
                );            
            }
        }

        /** set my variables */

        public function setPages( array $pages )
        {
            $this->admin_pages = $pages;

            return $this;
        }

        public function setSubMenuPages( array $pages )
        {
            $this->sub_menu_pages = array_merge( $this->sub_menu_pages, $pages );

            return $this;
        }

        public function setSettings( array $settings ){
            $this->settings = $settings;

            return $this->settings;
        }

        public function setSections( array $sections ){
            $this->sections = $sections;

            return $this->sections;
        }

        public function setFields( array $fields ){
            $this->fields = $fields;

            return $this->fields;
        }
    }