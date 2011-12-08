<?php
// Создать пользовательское меню
add_action('admin_menu', 'omr_create_menu');

function omr_create_menu()
{


    //создать новое меню верхнего уровня
    add_menu_page('Build Internet Settings', 'Build Internet', 'administrator',
                  __FILE__, 'omr_settings_page', 'favicon.ico');

    //вызвать функцию register settings
    add_action('admin_init', 'register_mysettings');

    function register_mysettings()
    {
        //регистрируем наши настройки
        register_setting('omr-settings-group', 'omr_tracking_code');
         register_setting('omr-settings-group', 'ICQ');
         register_setting('omr-settings-group', 'Skype');
         register_setting('omr-settings-group', 'Email');
    }

    function omr_settings_page()
    {
        ?>
    <div class="wrap">
        <h2>Build Internet Options</h2>

        <form method="post" action="options.php">

            <?php settings_fields('omr-settings-group'); ?>
            <table class="form-table">

                <tr valign="top">
                    <th scope="row">Tracking Code</th>
                    <td><textarea name="omr_tracking_code"><?php echo get_option('omr_tracking_code');?></textarea>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">ICQ</th>
                    <td><textarea name="ICQ"><?php echo get_option('ICQ'); ?></textarea>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Skype</th>
                    <td><textarea name="Skype"><?php echo get_option('Skype'); ?></textarea>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Email</th>
                    <td><textarea name="Email"><?php echo get_option('Email'); ?></textarea>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"
                        />
            </p>


        </form>
    </div>
    <?php
    }
}