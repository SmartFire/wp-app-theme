<?php

class WPAPP_THEME {
	
	function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'wpApp_baseScripts' ) );
		
	}
	
	function wpApp_baseScripts() {
		wp_enqueue_script( 'wpAppBaseJS', '/assets/js/wp-app/base.js', array( 'jquery' ), null, true );
		wp_localize_script( 'wpAppBaseJS', 'APIdata', array( 'api_url' => json_url(), 'api_nonce' => wp_create_nonce( 'wp_json' ) ) );
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
		
		// App Definition & Route Config
		wp_enqueue_script( 
			'AngularApp', 
			'/assets/js/wp-app/angular-app-routes.js', 
			array('AngularRoute'), 
			null, 
			false
		);
	}
}


new WPAPP_THEME();

?>