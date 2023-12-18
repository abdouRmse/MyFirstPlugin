<?php

    /**
     * @package MyFirstPlugin
    */

    namespace Inc\Pages;

    use \Inc\Base\Construct; // to initialize all the variables that i need
    use \Inc\Api\SettingsApi;
    use \Inc\Api\Callbacks\AdminCallbacks;
    use \Inc\Api\Callbacks\optionsGroup;

    class Admin extends Construct  // the extends let the Admine to construct all the variables.
    {
        public $admin_pages;     // ARRAY receive all the admin pages that i need
        public $setting;        // INSTANCE of a SettingApi class that make my admin mages automaticaly
        public $admin_sub_menu_pages; // ARRAY of the submenus
        public $dashboard_callbacks; // INSTANCE of  all the dashboard callbacks
        public $fields_callbacks;

        public function register()
        {

            $this->setting = new SettingsApi();

            $this-> setSettings();
            $this-> setSections();
            $this-> setFields();

            $this-> setPages();
            $this-> setSubPages();

            $this->setting->setPages($this->adminPages)->setSubMenuPages($this->admin_sub_menu_pages)->register();
        }

        public function setPages()
        {
            $this->dashboard_callbacks = new AdminCallbacks();

            $this->adminPages = array(
                [
                    'page_title'      =>  'My Plugin',
                    'menu_title'      =>  'Myy First Plugin', 
                    'capability'      =>  'manage_options', 
                    'menu_id'         =>  'menu_my_first_plugin_id', 
                    'callback'        =>  array( $this->dashboard_callbacks, 'adminDashboard'),
                    'icon'            =>  'dashicons-store', 
                    'position'        =>  20
                ]
            );
        }

        public function setSubPages()
        {
            $this->admin_sub_menu_pages = array(
                [
                    'parent'          =>  'menu_my_first_plugin_id',
                    'page_title'      =>  'My Plugin',
                    'menu_title'      =>  'CPT Manager', 
                    'capability'      =>  'manage_options', 
                    'menu_id'         =>  'sub_menu_admin', 
                    'callback'        =>  array( $this->dashboard_callbacks, 'CptManager'),/*array( $this, 'admin_index' )*/
                    'position'        =>  10
                ],
                [
                    'parent'          =>  'menu_my_first_plugin_id',
                    'page_title'      =>  'My Plugin',
                    'menu_title'      =>  'Widget', 
                    'capability'      =>  'manage_options', 
                    'menu_id'         =>  'widgets', 
                    'callback'        =>  array( $this->dashboard_callbacks, 'Widget'),/*array( $this, 'admin_index' )*/
                    'position'        =>  20
                ],
                [
                    'parent'          =>  'menu_my_first_plugin_id',
                    'page_title'      =>  'My Plugin',
                    'menu_title'      =>  'Taxonomies', 
                    'capability'      =>  'manage_options', 
                    'menu_id'         =>  'taxonomy', 
                    'callback'        =>  array( $this->dashboard_callbacks, 'taxonomy'),/*array( $this, 'admin_index' )*/
                    'position'        =>  30
                ]
            );
        }

        /**
         * 
         * set the Sections of the custom field this is the second method with this name.
         * The primary method with this name is in the SettingsApi class.
         * I made this secondary method to just initialize the array 
         * will be use as an argument in the primary method.
         * 
         */ 
        public function setSections()
        {
            $args = array(
                [
                    'id'         => 'section_id',
                    'title'      => 'SECTION',
                    'callback'   => function(){ echo 'check this section';},
                    'page'       => 'menu_my_first_plugin_id',
                    'args'       => ''
                ]
                
            );

            $this->setting->setSections( $args ); 
        }

        /**
         * 
         * set the settings of the custom field this is the second method with this name.
         * The primary method with this name is in the SettingsApi class.
         * I made this secondary method to just initialize the array 
         * will be use as an argument in the primary method.
         * 
         */ 
        public function setSettings()
        {
            $args = array(
                [
                    'option_group'  =>  'plugin_option_group',
                    'option_name'   =>  'text_exemple',
                    'callback'      =>  function(){ echo 'hi hi hi';}
                ],
                [
                    'option_group'  =>  'plugin_option_group',
                    'option_name'   =>  'first_name',
                    'callback'      =>  function(){ echo 'hi hi hi';}
                ]
            );

            $this->setting->setSettings( $args );
        }

        /**
         * 
         * set the Fields of the custom field this is the second method with this name.
         * The primary method with this name is in the SettingsApi class.
         * I made this secondary method to just initialize the array 
         * will be use as an argument in the primary method.
         * 
         * @param id : must be the same with the option_name of getSettings, even in the
         * input field the @arg name of the field id
         * 
         */ 
        public function setFields()
        {
            $this->fields_callbacks = new optionsGroup;
            $args = array(
                [
                    'id'         => 'text_exemple', 
                    'title'      => 'Text Exemple',
                    'callback'   => array( $this->fields_callbacks, 'idCustomField'),
                    'page'       => 'menu_my_first_plugin_id',
                    'section'       => 'section_id',
                    'args'       => array(
                        'label_for'         =>  'text_exemple',
                    )
                ],
                [
                    'id'         => 'first_name', 
                    'title'      => 'First Name',
                    'callback'   => array( $this->fields_callbacks, 'idCustomField'),
                    'page'       => 'menu_my_first_plugin_id',
                    'section'       => 'section_id',
                    'args'       => array(
                        'label_for'         =>  'text_exemple',
                    )
                ]
            );

            $this->setting->setFields( $args ); 
        }
    }