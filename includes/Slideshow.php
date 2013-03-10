<?php

/**
 * Main Slideshow Class
 *
 * @author Matthew Ruddy
 * @since 2.0
 */
class ESL_Slideshow {

    /**
     * Class instance
     *
     * @since 2.0
     */
    private static $instance;

    /**
     * Getter method for retrieving the class instance.
     *
     * @since 2.0
     */
    public static function get_instance() {
    
        if ( !self::$instance instanceof self )
            self::$instance = new self;
        return self::$instance;
    
    }

    /**
     * Loads slideshow styles
     *
     * @since 2.0
     */
    public static function enqueue_styles() {

        /** Load styling */
        wp_enqueue_style( 'rsd-slideshow' );

        /** Trigger actions */
        do_action( 'easingsliderlite_enqueue_styles' );

    }

    /**
     * Loads slideshow scripts
     *
     * @since 2.0
     */
    public static function enqueue_scripts() {

        /** Get plugin settings */
        $settings = get_option( 'easingsliderlite_settings' );

        /** Load jQuery */
        wp_enqueue_script( 'jquery' );

        /** Load slideshow script */
        wp_enqueue_script( 'rsd-slideshow' );

        /** Trigger actions */
        do_action( 'easingsliderlite_enqueue_scripts' );

    }

    /**
     * Displays a slideshow
     *
     * @since 2.0
     */
    public function display_slideshow() {

        /** Display the slideshow */
        ob_start();
        require dirname( EasingSliderLite::get_file() ) . DIRECTORY_SEPARATOR .'templates'. DIRECTORY_SEPARATOR .'slideshow.php';
        return ob_get_clean();

    }

}