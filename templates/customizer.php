<?php

    /** Get current customization settings */
    $customizations = $c = json_decode( get_option( 'easingsliderlite_customizations' ) );

    /** Load required extra scripts and styling */
    wp_enqueue_script( 'customize-controls' );
    wp_enqueue_style( 'customize-controls' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'esl-customizer' );
    wp_enqueue_script( 'esl-slideshow' );
    wp_enqueue_style( 'esl-slideshow' );

    /** Prevent slideshow from showing edit icon */
    add_filter( 'easingsliderlite_edit_slideshow_icon', '__return_false' );

?>
<div id="customize-container" class="customize-container" style="display: block;">
    <div class="wp-full-overlay expanded" style="opacity: 0;">
        <form id="customize-controls" action="admin.php?page=<?php echo esc_attr( $_GET['page'] ); ?>" method="post" class="wrap wp-full-overlay-sidebar">
            <?php
                /** Security nonce field */
                wp_nonce_field( "easingsliderlite-save_{$_GET['page']}", "easingsliderlite-save_{$_GET['page']}", false );
            ?>

            <div id="customize-header-actions" class="wp-full-overlay-header">
                <input type="submit" name="save" id="save" class="button button-primary save" value="<?php _e( 'Save', 'easingsliderlite' ); ?>">
                <span class="spinner"></span>
                <a class="back button" href="admin.php?page=easingsliderlite_edit_slideshow"><?php _e( 'Close', 'easingsliderlite' ); ?></a>
            </div>

            <div class="wp-full-overlay-sidebar-content" tabindex="-1">
                <div id="customize-info" class="customize-section">
                    <div class="customize-section-title" aria-label="Theme Customizer Options" tabindex="0">
                        <span class="preview-notice"><?php _e( 'You are customizing <strong class="theme-name">Easing Slider "Lite"</strong>', 'easingsliderlite' ); ?></span>
                    </div>
                </div>
                <div id="customize-theme-controls">
                    <ul>
                        <li class="control-section customize-section">
                            <h3 class="customize-section-title" tabindex="0" title=""><?php _e( 'Next & Previous Arrows', 'easingsliderlite' ); ?></h3>
                            <ul class="customize-section-content">
                                <li class="customize-control customize-control-text">
                                    <label>
                                        <span class="customize-control-title"><?php _e( '"Next" Arrow Image', 'easingsliderlite' ); ?></span>
                                        <input type="text" value="<?php echo esc_attr( $c->arrows->next ); ?>">
                                    </label>
                                </li>
                                <li class="customize-control customize-control-text">
                                    <label>
                                        <span class="customize-control-title"><?php _e( '"Previous" Arrow Image', 'easingsliderlite' ); ?></span>
                                        <input type="text" value="<?php echo esc_attr( $c->arrows->previous ); ?>">
                                    </label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="customize-footer-actions" class="wp-full-overlay-footer">
                <a href="#" class="collapse-sidebar button-secondary" title="<?php _e( 'Collapse Sidebar', 'easingsliderlite' ); ?>">
                    <span class="collapse-sidebar-arrow"></span>
                    <span class="collapse-sidebar-label"><?php _e( 'Collapse', 'easingsliderlite' ); ?></span>
                </a>
            </div>

            <input type="hidden" name="customizations" id="customizations" value="">
            <?php /** This ensures that the JSON is encoded correctly. Using PHP JSON encode can cause magic quote issues */ ?>
            <script type="text/javascript">document.getElementById('customizations').value = '<?php echo json_encode( $customizations ); ?>';</script>
        </form>

        <div id="customize-preview" class="wp-full-overlay-main">
            <?php

                /** Get the settings for our generic slideshow */
                $slideshow = EasingSliderLite::get_instance()->defaults();
                $slideshow->slides = array(
                    (object) array( 'url' => 'http://easingslider.com/wp-content/uploads/2011/12/Desert.jpg' ),
                    (object) array( 'url' => 'http://easingslider.com/wp-content/uploads/2011/12/Hydrangeas.jpg' ),
                    (object) array( 'url' => 'http://easingslider.com/wp-content/uploads/2011/12/Tulips.jpg' ),
                    (object) array( 'url' => 'http://easingslider.com/wp-content/uploads/2011/12/Jellyfish.jpg' )
                );

                /** Display the generic slideshow */
                echo ESL_Slideshow::get_instance()->display_slideshow( $slideshow );

            ?>
        </div>
    </div>
</div>