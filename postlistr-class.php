<?php
/*
Plugin Name: PostListr Plugin
Description: Simple backbone plugin example that integrates the PostListr app demo by @kadamwhite.
Author: Devin Price
Author URI: http://www.wptheming.com
Version: 0.1
License: GPLv3+ - http://www.gnu.org/licenses/gpl.html

This plugin is a basic example of how to display JSON data with an underscore template.  Check out @kadamwhite's talk on WordPress.tv for a more complete picture of how this all works.

Watch: http://wordpress.tv/2013/09/05/k-adam-white-evolving-your-javascript-with-backbone-js/
Slides: http://kadamwhite.github.io/talks/2013/backbone-wordpress/
GitHub Repo: https://github.com/kadamwhite/wordbone-pressback/tree/master/PostListr

*/

if ( ! class_exists( 'PostListr_Plugin' ) ) :

class Postlistr_Plugin {

	/**
	 * Unique identifier
	 *
	 * @since 0.1
	 * @var string
	 */
	protected $slug = 'postlistr';

	/**
	 * Slug of the plugin screen.
	 *
	 * @since 0.1
	 * @var string
	 */
	protected $hook = null;

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 0.1
	 * @var string
	 */
	protected $version = '0.1';

	/**
	 * Initialize the plugin
	 *
	 * @since 0.1
	 */
	public function __construct() {

		// Add the menu item
		add_action( 'admin_menu', array( $this, 'add_menu_item' ) );

		// Load CSS and JS for admin
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * link: http://codex.wordpress.org/Function_Reference/add_menu_page
	 * @since 0.1
	 */
	public function add_menu_item() {

		$this->hook = add_menu_page(
			__( 'PostListr', $this->slug ),			// page_title
			__( 'PostListr', $this->slug ),			// menu_title
			'activate_plugins',						// capability
			'postlistr',							// menu_slug
			array( $this, 'display_page' ),			// function
			'',										// icon_url
			70										// position
		);

	}

	/**
	 * Render the page for this plugin
	 *
	 * @since 0.1
	 */
	public function display_page() {
		include_once( 'postlistr-page.php' );
	}

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since  0.1
	 */
	public function enqueue_admin_styles() {

		$screen = get_current_screen();

		// Only load js for our example page
		if ( $screen->id != $this->hook )
			return;

		wp_enqueue_style( $this->slug .'-admin-styles', plugins_url( 'css/postlistr.css', __FILE__ ), array(), $this->version );

	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since 0.1
	 * @return null Return early if we're not on the right page
	 */
	public function enqueue_admin_scripts() {

		$screen = get_current_screen();

		// Only load js for our example page
		if ( $screen->id != $this->hook )
			return;

		// Load our custom app.js and require backbone
		wp_enqueue_script( $this->hook . '-app-script', plugins_url( 'js/postlistr-app.js', __FILE__ ), array( 'wp-backbone' ), $this->version, true );

	}

}

new PostListr_Plugin;

endif;