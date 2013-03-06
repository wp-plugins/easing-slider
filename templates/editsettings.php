<?php
    /** Get the plugin settings */
    $settings = $s = get_option( 'rivasliderlite_settings' );
?>
<div class="wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
    <h2><?php _e( 'Edit Settings', 'rivasliderlite' ); ?></h2>
    <form name="post" action="admin.php?page=rivasliderlite_edit_settings" method="post">
        <?php
            /** Security nonce field */
            wp_nonce_field( "rivasliderlite-save_{$_GET['page']}", "rivasliderlite-save_{$_GET['page']}", false );
        ?>
        <div class="main-panel">
            <div class="messages-container">
                <?php do_action( 'rivasliderlite_admin_messages' ); ?>
            </div>

            <h3><?php _e( 'General Settings', 'rivasliderlite' ); ?></h3>
            <table class="form-table settings">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><label for="resizing"><?php _e( 'Image Resizing', 'rivasliderlite' ); ?></label></th>
                        <td>
                            <label for="resizing_true">
                                <input type="radio" name="settings[resizing]" id="resizing_true" value="true" <?php checked( $s['resizing'], true ); ?>><span><?php _e( 'Enable', 'rivasliderlite' ); ?></span>
                            </label>
                            <label for="resizing_false">
                                <input type="radio" name="settings[resizing]" id="resizing_false" value="false" <?php checked( $s['resizing'], false ); ?>><span><?php _e( 'Disable', 'rivasliderlite' ); ?></span>
                            </label>
                            <p class="description"><?php _e( 'Enable or disable the plugins image resizing functionality. Disable this if you do not want the slide images to be resized.', 'rivasliderlite' ); ?></p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="load_scripts"><?php _e( 'Output JS', 'rivasliderlite' ); ?></label></th>
                        <td>
                            <label for="load_scripts_header">
                                <input type="radio" name="settings[load_scripts]" id="load_scripts_header" value="header" <?php checked( $s['load_scripts'], 'header' ); ?>><span><?php _e( 'Header', 'rivasliderlite' ); ?></span>
                            </label>
                            <label for="load_scripts_footer">
                                <input type="radio" name="settings[load_scripts]" id="load_scripts_footer" value="footer" <?php checked( $s['load_scripts'], 'footer' ); ?>><span><?php _e( 'Footer', 'rivasliderlite' ); ?></span>
                            </label>
                            <label for="load_scripts_off">
                                <input type="radio" name="settings[load_scripts]" id="load_scripts_off" value="false" <?php checked( $s['load_scripts'], false ); ?>><span><?php _e( 'Off', 'rivasliderlite' ); ?></span>
                            </label>
                            <p class="description"><?php _e( 'Settings for Javascript output. Scripts loaded in the "Footer" are only when they are needed. This decreases page loading times but is prone to errors.', 'rivasliderlite' ); ?></p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="load_styles"><?php _e( 'Output CSS', 'rivasliderlite' ); ?></label></th>
                        <td>
                            <label for="load_styles_header">
                                <input type="radio" name="settings[load_styles]" id="load_styles_header" value="header" <?php checked( $s['load_styles'], 'header' ); ?>><span><?php _e( 'Header', 'rivasliderlite' ); ?></span>
                            </label>
                            <label for="load_styles_footer">
                                <input type="radio" name="settings[load_styles]" id="load_styles_footer" value="footer" <?php checked( $s['load_styles'], 'footer' ); ?>><span><?php _e( 'Footer', 'rivasliderlite' ); ?></span>
                            </label>
                            <label for="load_styles_off">
                                <input type="radio" name="settings[load_styles]" id="load_styles_off" value="false" <?php checked( $s['load_styles'], false ); ?>><span><?php _e( 'Off', 'rivasliderlite' ); ?></span>
                            </label>
                            <p class="description"><?php _e( 'Settings for CSS output. Styles loaded in the "Footer" will invalidate the HTML, but will prevent them from loading when not needed.', 'rivasliderlite' ); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php if ( get_option( 'easingslider_version' ) ) : ?>
            <div class="divider"></div>

            <h3><?php _e( 'Legacy Settings', 'rivasliderlite' ); ?></h3>
            <table class="form-table settings">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><label for="load_scripts"><?php _e( 'Easing Slider', 'rivasliderlite' ); ?></label></th>
                        <td>
                            <input type="submit" name="easingslider" class="button button-secondary" value="<?php _e( 'Remove Easing Slider Settings', 'rivasliderlite' ); ?>">
                            <p class="description"><?php _e( 'Clicking this button will permanently delete your Easing Slider settings from the database. Only do this if you are sure you will not be using it again.', 'rivasliderlite' ); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>

            <div class="divider"></div>

            <h3><?php _e( 'Installation Settings', 'rivasliderlite' ); ?></h3>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'PHP Version', 'rivasliderlite' ); ?></th>
                        <td><?php echo phpversion(); ?></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e( 'MySQL Version', 'rivasliderlite' ); ?></th>
                        <td><?php echo mysql_get_server_info(); ?></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e( 'WordPress Version', 'rivasliderlite' ); ?></th>
                        <td><?php global $wp_version; echo $wp_version; ?></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e( 'Plugin Version', 'rivasliderlite' ); ?></th>
                        <td><?php echo RivaSliderLite::$version; ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="divider"></div>

            <p class="submit">
                <input type="submit" name="save" class="button button-primary button-large" id="save" accesskey="p" value="<?php _e( 'Save Settings', 'rivasliderlite' ); ?>">
            </p>
        </div>
    </form>
</div>