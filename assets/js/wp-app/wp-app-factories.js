wpApp.factory('Users', function($resource) {
	return $resource(APIdata.api_url + '/users/:id?_wp_json_nonce=' + APIdata.api_nonce, {
		id: '@id'
	}, {
		update: {
			method: 'PUT'
		}
	});
});

wpApp.factory('StyleGuides', function($resource) {
	return $resource(APIdata.api_url + '/posts/:id?_wp_json_nonce=' + APIdata.api_nonce + '&type[]=style-guides', {
		id: '@id'
	}, {
		update: {
			method: 'PUT'
		}
	});
});