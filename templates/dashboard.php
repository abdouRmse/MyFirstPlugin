<div class="wrap">
    <h1>Dashboard</h1>
    <?php settings_errors() ?>

    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab1">Manage Settings</a>
        </li>
    </ul>
    <!-- The options.php is handled by wordpress -->
    <form action="options.php" method="post">
        <?php 
            settings_fields( "plugin_option_group" );
            do_settings_sections( 'menu_my_first_plugin_id' );
            submit_button();
        ?>
    </form>
</div>