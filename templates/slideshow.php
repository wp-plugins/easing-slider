<?php

    /** Get the slideshow */
    $slideshow = $s = EasingSliderLite::get_instance()->validate( get_option( 'easingsliderlite_slideshow' ) );

    /** Return WordPress error if slideshow doesn't exist */
    if ( $s === false )
        return printf( __( 'The slideshow does not appear to exist. Oh dear! Please try contacting support.', 'easingsliderlite' ), $id );

    /** Get plugin settings */
    $settings = get_option( 'easingsliderlite_settings' );

    /** Load slideshow scripts and styles in foooter (if set to do so) */
    if ( isset( $settings['load_styles'] ) && $settings['load_styles'] == 'footer' )
        add_action( 'wp_footer', array( $this, 'enqueue_styles' ) ); 
    if ( isset( $settings['load_scripts'] ) && $settings['load_scripts'] == 'footer' )
        add_action( 'wp_footer', array( $this, 'enqueue_scripts' ) );

    /** Bail if there are no slides to display */
    if ( count( $slideshow->slides ) == 0 ) {
        if ( current_user_can( 'easingsliderlite_edit_slideshow' ) )
            _e( '<p>This slideshow contains no slides. Uh oh!', 'easingsliderlite' );
        return;
    }

    /** Inline slideshow styles */
    if ( $s->dimensions->responsive )
        $slideshow_styles = "max-width: {$s->dimensions->width}px; max-height: {$s->dimensions->height}px";
    else
        $slideshow_styles = "width: {$s->dimensions->width}px; height: {$s->dimensions->height}px";
    $slideshow_styles = apply_filters( 'easingsliderlite_slideshow_styles', $slideshow_styles, $s );
    $slideshow_options = json_encode(
        array(
            'dimensions' => $s->dimensions,
            'transitions' => $s->transitions,
            'navigation' => $s->navigation,
            'playback' => $s->playback
        )
    );

    /** Dynamically calculcated viewport height */
    $viewport_height = ( 100 * ( $s->dimensions->height / $s->dimensions->width ) );
    $viewport_styles = "padding-top: {$viewport_height}% !important;";
    $viewport_styles = apply_filters( 'easingsliderlite_viewport_styles', $viewport_styles, $s );

    /** Slide container styles */
    $container_width = ( $s->transitions->effect == 'slide' ) ? ( 100 * ( count( $s->slides )+2 ) ) : '100';
    $container_styles = "display: none; width: {$container_width}%;";
    $container_styles = apply_filters( 'easingsliderlite_container_styles', $container_styles, $s );

    /** Add viewport height when using 'fade' transition */
    if ( $s->transitions->effect == 'fade' )
        $container_styles .= " padding-top: {$viewport_height}% !important;";

?>
<div class="easingsliderlite use-<?php echo $s->transitions->effect; ?>" data-options="<?php echo esc_attr( $slideshow_options ); ?>" style="<?php echo esc_attr( $slideshow_styles ); ?>">
    <div class="easingsliderlite-viewport" style="<?php echo esc_attr( $viewport_styles ); ?>">
        <div class="easingsliderlite-slides-container" style="<?php echo esc_attr( $container_styles ); ?>">
            <?php
                /** Randomize the slides if set to do so */
                if ( $s->general->randomize )
                    shuffle( $s->slides );
            ?>
            <?php foreach ( $s->slides as $index => $slide ) : ?>
            <?php

                /** Get slide styles */
                $slide_styles = $slideshow_styles;
                if ( $s->transitions->effect == 'fade' && $index > 0 )
                    $slide_styles .= " display: none; opacity: 0;";

                /** Apply filter for custom styles */
                $slide_styles = apply_filters( 'easingsliderlite_slide_styles', $slide_styles, $slide, $s );

                /** Resized image */
                if ( $settings['resizing'] )
                    $image = ESL_Resize::resize( $slide->url, $s->dimensions->width, $s->dimensions->height, true, true );
                else
                    $image = array( 'url' => $slide->url, 'width' => $s->dimensions->width, 'height' => $s->dimensions->height );

            ?>
                <div class="easingsliderlite-slide" style="<?php echo $slide_styles; ?>">
                    <?php if ( !empty( $slide->link ) ) { ?><a href="<?php echo esc_attr( $slide->link ); ?>" target="<?php echo esc_attr( $slide->linkTarget ); ?>"><?php } ?>
                        <img src="<?php echo esc_attr( $image['url'] ); ?>" class="easingsliderlite-image" alt="<?php echo esc_attr( $slide->alt ); ?>" />
                    <?php if ( !empty( $slide->link ) ) { ?></a><?php } ?>
                    <?php if ( !empty( $slide->content ) ) { ?>
                        <div class="easingsliderlite-slide-content">
                            <?php echo do_shortcode( html_entity_decode( $slide->content ) ) ?>
                        </div>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="easingsliderlite-preload"></div>

    <?php if ( $s->navigation->arrows && !has_action( 'easingsliderlite_arrows' ) ) : ?>
        <div class="easingsliderlite-arrows easingsliderlite-next <?php echo esc_attr( $s->navigation->arrows_position ); ?>"></div>
        <div class="easingsliderlite-arrows easingsliderlite-prev <?php echo esc_attr( $s->navigation->arrows_position ); ?>"></div>
    <?php else : do_action( 'easingsliderlite_arrows', $s ); endif; ?>

    <?php if ( $s->navigation->pagination && !has_action( 'easingsliderlite_pagination' ) ) : ?>
        <div class="easingsliderlite-pagination <?php echo esc_attr( $s->navigation->pagination_position ) .' '. esc_attr( $s->navigation->pagination_location ); ?>">
            <?php foreach ( $s->slides as $index => $slide ) : ?>
                <div class="easingsliderlite-icon"></div>
            <?php endforeach; ?>
        </div>
    <?php else : do_action( 'easingsliderlite_pagination', $s ); endif; ?>

    <?php /** Edit slideshow link, don't remove this! Won't show if user isn't logged in or doesn't have permission to edit slideshows */ ?>
    <?php if ( current_user_can( 'easingsliderlite_edit_slideshow' ) && apply_filters( 'easingsliderlite_edit_slideshow_icon', __return_true() ) ) : ?>
        <a href="<?php echo admin_url( "admin.php?page=easingsliderlite_edit_slideshow" ); ?>" style="position: absolute; top: -15px; left: -15px; z-index: 50;">
            <img src="<?php echo plugins_url( dirname( plugin_basename( EasingSliderLite::get_file() ) ) ) . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'edit_icon.png'; ?>" style="box-shadow: none; border-radius: none;" />
        </a>
    <?php endif; ?>
</div>