<?php

    /**
     * @package MyFirstPlugin
    */

    namespace Inc\Api\Callbacks;

    use \Inc\Base\Construct; // to initialize all the variables that i need

    class AdminCallbacks extends Construct  // the extends let the Admine to construct all the variables.
    {
        public function adminDashboard()
        {
            return require_once ( $this->plugin_path.'/templates/dashboard.php' );
        }

        /**
         * The sub Menu Callback
         * @return HTML/PHP file
        */
        public function CptManager()
        {
            return require_once ( $this->plugin_path.'/templates/cptManager.php' );
        }

        /**
         * The Widget page Callback of the widget sub menu 
         * @return HTML/PHP file
        */
        public function Widget()
        {
            return require_once ( $this->plugin_path.'/templates/widget.php' );
        }

        /**
         * The Widget page Callback of the Taxonomies sub menu 
         * @return HTML/PHP file
        */
        public function taxonomy()
        {
            return require_once ( $this->plugin_path.'/templates/taxonomy.php' );
        }


    }