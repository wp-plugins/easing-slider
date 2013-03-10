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

        /** Get the extension */
        $ext = ( apply_filters( 'easingsliderlite_style_debug', __return_false() ) === true ) ? '.css' : '.min.css';

        /** Load styling */
        wp_enqueue_style( 'esl-slideshow', plugins_url( dirname( plugin_basename( EasingSliderLite::get_file() ) ) . DIRECTORY_SEPARATOR .'css'. DIRECTORY_SEPARATOR .'slideshow'. $ext ), false, EasingSliderLite::$version  );

        /** Trigger actions */
        do_action( 'easingsliderlite_enqueue_styles' );

    }

    /**
     * Loads slideshow scripts
     *
     * @since 2.0
     */
    public static function enqueue_scripts() {

        /** Get the extension */
        $ext = ( apply_filters( 'easingsliderlite_script_debug', __return_false() ) === true ) ? '.js' : '.min.js';

        /** Get plugin settings */
        $settings = get_option( 'easingsliderlite_settings' );

        /** Load scripts */
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'esl-slideshow', plugins_url( dirname( plugin_basename( EasingSliderLite::get_file() ) ) . DIRECTORY_SEPARATOR .'js'. DIRECTORY_SEPARATOR .'slideshow'. $ext ), false, EasingSliderLite::$version  );

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