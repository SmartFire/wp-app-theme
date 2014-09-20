wpApp.config(function($routeProvider) {

	// Sign Up
	$routeProvider.when('/signup/', {
		controller: SignUpCtrl,
		templateUrl: APIdata.templateUrl + '/wp-app-templates/signup.html'
	});

});