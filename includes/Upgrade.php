<?php

/**
 * Plugin upgrade class. This will become more populated over time.
 *
 * @author Matthew Ruddy
 * @since 2.0
 */
class ESL_Upgrade {

    /**
     * Upgrade from Easing Slider
     *
     * @since 2.0
     */
    public static final function do_upgrades() {

        /** Get current plugin version */
        $version = get_option( 'easingsliderlite_version' );

        /** Let the upgrades begin! */
        if ( self::should_do_major_upgrade() )
            self::do_major_upgrade();

        /** Bail if we are already up to date */
        if ( $version == EasingSliderLite::$version )
            return;

        /** Do 2.0 to 2.0.1 upgrade */
        if ( get_option( 'rivasliderlite_version') )
            self::do_201_upgrade();

        /** Custom hooks */
        do_action( 'easingsliderlite_upgrades', EasingSliderLite::$version, $version );

        /** Update plugin version */
        update_option( 'easingsliderlite_version', EasingSliderLite::$version );

    }

    /**
     * Do 2.0.1 upgrades
     *
     * @since 2.0.1
     */
    public static final function do_201_upgrade() {

        global $wp_roles;

        /** Transfer old options for plugin name revert */
        update_option( 'easingsliderlite_version', get_option( 'rivasliderlite_version' ) );
        update_option( 'easingsliderlite_slideshow', get_option( 'rivasliderlite_slideshow' ) );
        update_option( 'easingsliderlite_settings', get_option( 'rivasliderlite_settings' ) );
        update_option( 'easingsliderlite_major_upgrade', get_option( 'rivasliderlite_easingslider_upgrade' ) );
        update_option( 'easingsliderlite_disable_welcome_panel', get_option( 'rivasliderlite_disable_welcome_panel' ) );
        delete_option( 'rivasliderlite_version' );
        delete_option( 'rivasliderlite_slideshow' );
        delete_option( 'rivasliderlite_settings' );
        delete_option( 'rivasliderlite_easingslider_upgrade' );
        delete_option( 'rivasliderlite_disable_welcome_panel' );

        /** Remove old permissions and add new ones */
        foreach ( $wp_roles->roles as $role => $info ) {
            $user_role = get_role( $role );
            EasingSliderLite::get_instance()->remove_capability( 'rivasliderlite_edit_slideshow', $user_role );
            EasingSliderLite::get_instance()->remove_capability( 'rivasliderlite_edit_settings', $user_role );
        }
        EasingSliderLite::get_instance()->manage_capabilities( 'add' );
    }


    /**
     * Checks if we should do an Easing Slider upgrade procedure
     *
     * @since 2.0
     */
    public static final function should_do_major_upgrade() {

        if ( get_option( 'easingslider_version' ) !== false || get_option( 'activation' ) !== false || get_option( 'sImg1' ) !== false ) {
            if ( get_option( 'easingsliderlite_major_upgrade' ) === false )
                return true;
        }
        return false;

    }

    /**
     * Upgrade settings from the old Easing Slider plugin
     *
     * @since 2.0
     */
    public static final function do_major_upgrade() {

        /** Fire plugin activation (won't have been fired by upgrade) */
        EasingSliderLite::get_instance()->activate();

        /** Get current slideshow settings */
        $slideshow = EasingSliderLite::get_instance()->defaults();

        /** Transfer the settings */
        $slideshow->dimensions->width = get_option( 'width' );
        $slideshow->dimensions->height = get_option( 'height' );
        $slideshow->dimensions->responsive = false;
        $slideshow->transitions->effect = ( get_option( 'transition' ) == 'fade' ) ? 'fade' : 'slide';
        $slideshow->transitions->duration = get_option( 'transpeed' );
        $slideshow->navigation->arrows = ( get_option( 'buttons' ) == '' ) ? 'false' : 'true';
        $slideshow->navigation->pagination = ( get_option( 'sPagination' ) == '' ) ? 'false' : 'true';
        $slideshow->playback->pause = get_option( 'interval' );

        /** Add the slides */
        $slideshow->slides = array();
        for ( $i = 1; $i <= 10; $i++ ) {

            /** Check if the slide has an image. Bail if not. */
            $image = get_option( "sImg{$i}" );
            if ( empty( $image ) )
                continue;

            /** Resize the image and get its thumbnail */
            $resize = ESL_Resize::resize( $image, 150, 150, true );
            $sizes = (object) array(
                'thumbnail' => (object) array(
                    'url' => $resize['url']
                )
            );

            /** Add the slide image & link */
            $slideshow->slides[] = (object) array(
                'id' => $i,
                'url' => $image,
                'alt' => null,
                'title' => null,
                'link' => get_option( "sImgLink{$i}" ),
                'linkTarget' => '_blank',
                'sizes' => $sizes
            );

        }

        /** Update the slideshow settings */
        update_option( 'easingsliderlite_slideshow', $slideshow );

        /** Make some settings changes */
        $settings = get_option( 'easingsliderlite_settings' );
        $settings['resizing'] = false;
        update_option( 'easingsliderlite_settings', $settings );

        /** Flag upgrade */
        update_option( 'easingsliderlite_major_upgrade', 1 );

    }
}