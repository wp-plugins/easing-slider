<?php

/**
 * Plugin upgrade class. This will become more populated over time.
 *
 * @author Matthew Ruddy
 * @since 2.0
 */
class RSL_Upgrade {

    /**
     * Upgrade from Easing Slider
     *
     * @since 2.0
     */
    public static final function do_upgrades() {

        /** Get current plugin version */
        $version = get_option( 'rivasliderlite_version' );

        /** Let the upgrades begin! */
        if ( self::should_do_easingslider_upgrade() )
            self::easingslider_upgrade();

        /** Custom hooks */
        do_action( 'rivasliderlite_upgrades', RivaSliderLite::$version, $version );

        /** Bail if we are already up to date */
        if ( $version == RivaSliderLite::$version )
            return;

        /** Update plugin version */
        update_option( 'rivasliderlite_version', RivaSliderLite::$version );

    }

    /**
     * Checks if we should do an Easing Slider upgrade procedure
     *
     * @since 2.0
     */
    public static final function should_do_easingslider_upgrade() {

        if ( get_option( 'easingslider_version' ) !== false || get_option( 'activation' ) !== false ) {
            if ( !!get_option( 'rivasliderlite_easingslider_upgrade' ) === false )
                return true;
        }
        return false;

    }

    /**
     * Upgrade settings from Easing Slider
     *
     * @since 2.0
     */
    public static final function easingslider_upgrade() {

        /** Fire plugin activation (won't have been fired by upgrade) */
        RivaSliderLite::get_instance()->activate();

        /** Get current slideshow settings */
        $slideshow = RivaSliderLite::get_instance()->defaults();

        /** Transfer the settings */
        $slideshow->dimensions->width = get_option( 'width' );
        $slideshow->dimensions->height = get_option( 'height' );
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
            $resize = RSL_Resize::resize( $image, 150, 150, true );
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
        update_option( 'rivasliderlite_slideshow', $slideshow );

        /** Flag upgrade */
        update_option( 'rivasliderlite_easingslider_upgrade', 1 );

    }
}