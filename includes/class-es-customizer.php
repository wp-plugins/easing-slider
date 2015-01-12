<?php

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Defines our "Customizer"
 *
 * @author Matthew Ruddy
 */
class ES_Customizer {

	/**
	 * Adds our "customizer" user capabilities
	 *
	 * @return void
	 */
	public function add_capabilities() {

		// Get user role
		$role = get_role( 'administrator' );

		// Add the capability
		$role->add_cap( 'easingslider_manage_customizations' );

	}

	/**
	 * Removes our "customizer" user capabilities
	 *
	 * @return void
	 */
	public function remove_capabilities() {

		// Get user role
		$role = get_role( 'administrator' );

		// Remove the capability
		$role->remove_cap( 'easingslider_manage_customizations' );

	}


	/**
	 * Adds our page to the "Sliders" menu
	 *
	 * @return void
	 */
	public function add_submenu_page() {

		// "Customize" page
		$hook = add_submenu_page(
			'easingslider_edit_sliders',
			__( 'Customize', 'easingslider' ),
			__( 'Customize', 'easingslider' ),
			'easingslider_manage_customizations',
			'easingslider_manage_customizations',
			array( $this, 'display_view' )
		);

		// Page-specific hooks
		add_action( "load-{$hook}", array( $this, 'do_actions' ) );
		add_action( "admin_print_scripts-{$hook}", array( $this, 'enqueue_assets' ) );

	}

	/**
	 * Registers our assets
	 *
	 * @return void
	 */
	public function register_assets() {

		// Get our directories
		$css_dir = plugins_url( plugin_basename( dirname( __DIR__ ) ) ) . '/css';
		$js_dir  = plugins_url( plugin_basename( dirname( __DIR__ ) ) ) . '/js';

		// Get file suffix
		$suffix  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		// Dependancies
		$dependancies = array( 'jquery', 'backbone' );

		// Register our stylesheets
		wp_register_style( 'easingslider-customizer', "{$css_dir}/customizer{$suffix}.css", false, Easing_Slider::$version );

		// Register our javascripts
		wp_register_script( 'easingslider-customizer', "{$js_dir}/customizer{$suffix}.js", $dependancies, Easing_Slider::$version, true );

	}

	/**
	 * Enqueues all of our admin assets
	 *
	 * @return void
	 */
	public function enqueue_assets() {

		// Enqueue our stylesheets
		wp_enqueue_style( 'customize-controls' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'easingslider' );
		wp_enqueue_style( 'easingslider-customizer' );

		// Enqueue our javascripts
		wp_enqueue_script( 'customize-controls');
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'easingslider' );
		wp_enqueue_script( 'easingslider-customizer' );

	}

	/**
	 * Gets the "customizer" form fields
	 *
	 * @return array
	 */
	public function get_form_fields() {

		$data = apply_filters( 'easingslider-customizer_form_fields', array() );

		// Form fields
		$fields = array( 'arrows', 'pagination', 'border', 'shadow' );

		// Set form fields
		foreach ( $fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				$data[ $field ] = (object) $_POST[ $field ];
			}
		}

		// If data validation functionality exists, use it.
		if ( function_exists( 'easingslider_validate_data' ) ) {
			foreach ( $data as &$value ) {
				$value = easingslider_validate_data( $value );
			}
		}

		return $data;

	}

	/**
	 * Does our "customizer" actions
	 *
	 * @return void
	 */
	public function do_actions() {

		// Bail if not on the customizer page
		if ( isset( $_POST['save'] ) && isset( $_POST['slider_id'] ) ) {

			// Get our slider
			$slider = Easing_Slider::find( $_POST['slider_id'] );

			// Set the customizations
			$slider->customizations = (object) $this->get_form_fields();

			// Save the slider
			$slider->save();

			// Redirect back to the customizer
			wp_redirect( "admin.php?page=easingslider_manage_customizations&edit={$slider->ID}" );

		}

	}

	/**
	 * Displays the view
	 *
	 * @return void
	 */
	public function display_view() {

		// Get the current page
		$page = $_GET['page'];

		// We need Easing Slider to be loaded by now, so continue if it has.
		if ( class_exists( 'Easing_Slider' ) ) {

			// Get all sliders
			$sliders = Easing_Slider::all();
		
			// If we have no sliders, tell the user.
			if ( empty( $sliders ) ) {
				wp_die( __( 'You need to create some sliders to use the customizer.', 'easingslider' ) );
				exit();
			}

			// Get the specified slider, or pick the first one.
			if ( isset( $_GET['edit'] ) ) {
				$slider = Easing_Slider::find( $_GET['edit'] );
			}
			else {
				$slider = array_shift( array_values( $sliders ) );
			}

			// Display the view
			require plugin_dir_path( dirname( __FILE__ ) ) . 'partials/customizer.php';

		}
		
	}

}