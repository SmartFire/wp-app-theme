<?php

class WPAPP_THEME {
	
	function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'wpApp_baseScripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'angularScripts' ) );
	}
	
	function wpApp_baseScripts() {
		// The App Script
		wp_enqueue_script( 'wpApp', '/assets/js/wp-app/wp-app.js', array( 'AngularCore' ), null, true );
		wp_localize_script( 'wpApp', 'APIdata', array( 'api_url' => esc_url_raw( get_json_url() ), 'api_nonce' => wp_create_nonce( 'wp_json' ), 'templateUrl' => get_bloginfo( 'template_directory' ) ) );
		
		// Misc Scripts
		wp_enqueue_script( 'wpAppScripts', '/assets/js/wp-app/wp-app-scripts.js', array( 'jquery' ), null, true );
		
		// Routes
		wp_enqueue_script( 'wpAppRoutes', '/assets/js/wp-app/wp-app-routes.js', array( 'wpApp' ), null, true );
		
		// Factories
		wp_enqueue_script( 'wpAppFactories', '/assets/js/wp-app/wp-app-factories.js', array( 'wpApp' ), null, true );
		
		// Controllers - Signup
		wp_enqueue_script( 'wpAppSignup', '/assets/js/wp-app/controllers/wp-app-signup.js', array( 'wpAppFactories' ), null, true );
	}
	
	
	// Making this a plublic function so AngularJS scripts don't load on every page by default
	public function angularScripts() {
		// USING GOOGLE CDN
		wp_enqueue_script( 
			'AngularCore', 
			'//ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js', 
			array( 'jquery' ), 
			null, 
			false 
		);
		wp_enqueue_script( 
			'AngularRoute', 
			'//ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular-route.min.js', 
			array('AngularCore'), 
			null, 
			false
		);
		wp_enqueue_script( 
			'AngularRes', 
			'//ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular-resource.min.js', 
			array('AngularRoute'), 
			null, 
			false
		);
	}
}


new WPAPP_THEME();

?>