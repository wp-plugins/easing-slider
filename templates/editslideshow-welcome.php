<?php

/** Display the panel */
if ( get_option( 'easingsliderlite_disable_welcome_panel' ) == false ) :

    /** URL references */
    $links = array(
        'get-started' => 'http://wordpress.org/extend/plugins/easing-slider/installation/',
        'display-slideshow' => 'http://wordpress.org/extend/plugins/easing-slider/installation/#display',
        'faqs' => 'http://wordpress.org/extend/plugins/easing-slider/faq/',
        'support-forums' => 'http://wordpress.org/support/plugin/easing-slider',
    );

?>
<div id="easingsliderlite-welcome-message" class="welcome-panel">
    <?php
    /** Display import legacy settings panel */
    if ( !get_option( 'easingsliderlite_major_upgrade' ) && ( get_option( 'easingslider_version' ) || get_option( 'activation' ) || get_option( 'sImg1' ) ) ) :
        ?>
        <div class="welcome-panel-content">
            <?php
                /** Security field */
                wp_nonce_field( "easingsliderlite-legacy-import_{$_GET['page']}", "easingsliderlite-legacy-import_{$_GET['page']}", false );
            ?>
            <h2><?php _e( 'Legacy Settings Detected', 'easingsliderlite' ); ?></h2>
            <p class="about-description">
                <?php _e( 'Click the button below to import your settings from Easing Slider v1.x', 'easingsliderlite' ); ?>
            </p>
            <div class="welcome-panel-column-container">
                <div class="welcome-panel-column">
                    <h4><?php _e( 'Import your old settings', 'easingsliderlite' ); ?></h4>
                    <input type="submit" name="legacy-import" class="button button-primary button-hero" value="<?php _e( 'Import my v1.x Easing Slider settings.', 'easingsliderlite' ); ?>">
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <?php
    endif;
    ?>
    
    <a href="admin.php?page=easingsliderlite_edit_slideshow&amp;disable_welcome_panel=true" class="welcome-panel-close"><?php _e( 'Dismiss', 'easingsliderlite' ); ?></a>
    <div class="welcome-panel-content">
        <h3><?php _e( 'Welcome to Easing Slider "Lite"', 'easingsliderlite' ); ?></h3>
        <p class="about-description">
            <?php _e( 'Thanks for upgrading to Easing Slider "Lite". Here are some links to get you clued up on the new plugin.', 'easingsliderlite' ); ?>
        </p>
        <div class="welcome-panel-column-container">
            <div class="welcome-panel-column">
                <h4><?php _e( 'Get Started', 'easingsliderlite' ); ?></h4>
                <a class="button button-primary button-hero" href="<?php echo $links['get-started']; ?>"><?php _e( 'View the Documentation', 'easingsliderlite' ); ?></a>
            </div>

            <div class="welcome-panel-column">
                <h4><?php _e( 'Need some help?', 'easingsliderlite' ); ?></h4>
                <ul>
                    <li><a href='<?php echo $links['display-slideshow']; ?>'><?php _e( 'Displaying a Slideshow', 'easingsliderlite' ); ?></a></li>
                    <li><a href='<?php echo $links['faqs']; ?>'><?php _e( 'Frequently Asked Questions', 'easingsliderlite' ); ?></a></li>
                    <li><a href='<?php echo $links['support-forums']; ?>'><?php _e( 'Support Forums', 'easingsliderlite' ); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>