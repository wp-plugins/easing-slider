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

        /** Trigger activation if needed */
        if ( !$version )
            EasingSliderLite::get_instance()->activate();

        /**
         * Check and do upgrade for v2.0.1.
         * Bug fix included here incase upgrade from v2.0 - v2.0.1.3 didn't go smoothly and plugin wasn't activated correctly.
         * A name change occurred in this version, so we check for the old database option before execution (because the user may never have upgraded to v2.0!)
         */
        if ( get_option( 'rivasliderlite_version' ) && ( version_compare( $version, '2.0.1', '<' ) || version_compare( $version, '2.0.1.3', '=' ) ) )
            self::do_201_upgrade();
        if ( get_option( 'rivasliderlite_version' ) && ( version_compare( $version, '2.0.1', '=' ) ) )
            self::do_201_cleanup();

        /** Custom hooks */
        do_action( 'easingsliderlite_upgrades', EasingSliderLite::$version, $version );

        /** Update plugin version number if needed */
        if ( !version_compare( $version, EasingSliderLite::$version, '=' ) )
            update_option( 'easingsliderlite_version', EasingSliderLite::$version );

    }

    /**
     * Upgrade settings from the old Easing Slider plugin
     * We don't do this automatically. Instead, we give the user the choice through the 'Edit Slideshow' panel.
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

        /** Flag upgrade */
        update_option( 'easingsliderlite_major_upgrade', 1 );

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
        /**
         * If we've upgraded to v2.0, regardless if our major upgrade fired successfully or not
         * we don't want to fire it again and destroy up any changes we've made since
         */
        update_option( 'easingsliderlite_major_upgrade', 1 );
        update_option( 'easingsliderlite_disable_welcome_panel', get_option( 'rivasliderlite_disable_welcome_panel' ) );

        /** Cleanup the old settings */
        self::do_201_cleanup();

        /** Remove old permissions and add new ones */
        foreach ( $wp_roles->roles as $role => $info ) {
            $user_role = get_role( $role );
            EasingSliderLite::get_instance()->remove_capability( 'rivasliderlite_edit_slideshow', $user_role );
            EasingSliderLite::get_instance()->remove_capability( 'rivasliderlite_edit_settings', $user_role );
        }
        EasingSliderLite::get_instance()->manage_capabilities( 'add' );

    }

    /**
     * Clean's up setting after v2.0.1 upgrade
     *
     * @since 2.0.1.3
     */
    public static final function do_201_cleanup() {
        delete_option( 'rivasliderlite_version' );
        delete_option( 'rivasliderlite_slideshow' );
        delete_option( 'rivasliderlite_settings' );
        delete_option( 'rivasliderlite_easingslider_upgrade' );
        delete_option( 'rivasliderlite_disable_welcome_panel' );
    }

}