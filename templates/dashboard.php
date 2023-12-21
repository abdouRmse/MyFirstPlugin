<div class="wrap">
    <h1>Dashboard</h1>
    <?php settings_errors() ?>

    <ul class="nav nav-tabs row">
        <li class="active setting col-4">
            <a href="#setting">Manage Settings</a>
        </li>
        <li class="update col-4">
            <a href="#update">updates</a>
        </li>
        <li class="taxonomy col-4">
            <a href="#taxonomy">Taxonomies</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="setting" class="tab-pane active">
             <!-- The options.php is handled by wordpress -->
            <form action="options.php" method="post">
                <?php 
                    settings_fields( "plugin_option_group" );
                    do_settings_sections( 'menu_my_first_plugin_id' );
                    submit_button();
                ?>
            </form>
        </div>

        <div id="update" class="tab-pane">
            <h1>updates</h1>
        </div>

        <div id="taxonomy" class="tab-pane">
            <h1>taxonomies</h1>
        </div>
    </div>
</div>