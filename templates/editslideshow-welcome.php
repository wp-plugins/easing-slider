<?php

/** Display the panel */
if ( get_option( 'rivasliderlite_disable_welcome_panel' ) == false ) :

    /** URL references */
    $links = array(
        'get-started' => 'http://wordpress.org/extend/plugins/easing-slider/installation/',
        'display-slideshow' => 'http://wordpress.org/extend/plugins/easing-slider/installation/#display',
        'faqs' => 'http://wordpress.org/extend/plugins/easing-slider/faq/',
        'support-forums' => 'http://wordpress.org/support/plugin/easing-slider',
    );

?>
<div id="rivasliderlite-welcome-message" class="welcome-panel">
    <a href="admin.php?page=rivasliderlite_edit_slideshow&amp;disable_welcome_panel=true" class="welcome-panel-close"><?php _e( 'Dismiss', 'rivasliderlite' ); ?></a>
    <div class="welcome-panel-content">
        <h3><?php _e( 'Welcome to Riva Slider "Lite"', 'rivasliderlite' ); ?></h3>
        <p class="about-description">
            <?php
                if ( get_option( 'rivasliderlite_easingslider_upgrade' ) )
                    _e( 'Thanks for upgrading to Riva Slider "Lite". Here are some links to get you clued up on the new plugin.', 'rivasliderlite' );
                else
                    _e( 'Thanks for installing Riva Slider "Lite". Here are some links to help get you started.', 'rivasliderlite' );
            ?>
        </p>

        <div class="welcome-panel-column-container">
            <div class="welcome-panel-column">
                <h4><?php _e( 'Get Started', 'rivasliderlite' ); ?></h4>
                <a class="button button-primary button-hero" href="<?php echo $links['get-started']; ?>"><?php _e( 'View the Documentation', 'rivasliderlite' ); ?></a>
            </div>

            <div class="welcome-panel-column">
                <h4><?php _e( 'Need some help?', 'rivasliderlite' ); ?></h4>
                <ul>
                    <li><a href='<?php echo $links['display-slideshow']; ?>'><?php _e( 'Displaying a Slideshow', 'rivasliderlite' ); ?></a></li>
                    <li><a href='<?php echo $links['faqs']; ?>'><?php _e( 'Frequently Asked Questions', 'rivasliderlite' ); ?></a></li>
                    <li><a href='<?php echo $links['support-forums']; ?>'><?php _e( 'Support Forums', 'rivasliderlite' ); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>