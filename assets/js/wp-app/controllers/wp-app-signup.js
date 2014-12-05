function SignUpCtrl( $rootScope, $scope, Users ){

	$scope.newUser = {};
	
	// New User
	$scope.newUserSubmit = function(){
		console.log( $scope.newUser );
		Users.save( $scope.newUser, function(res) {
			if( res.ID ) {
				$scope.newUser = {};
				
				$scope.newUserConf = res;
				$scope.newUserConf.success = true;
				console.log( $scope.newUserConf );
				
				// TEMP - Delete newly created user
				Users.delete( {id: res.ID, force: true }, function( res ) {
					console.log( 'deleted' );
					console.log( res );
				});
			}
			
		});
	};

}