'use strict';

/*global app: false */

/**
 * The admin controller.
 */
app.controller('AdminCtrl', ['$rootScope', '$scope', '$alert', '$auth', '$location', 'UserFactory',
	function($rootScope, $scope, $alert, $auth, $location, UserFactory) {

  /**
   * Initializes the controller.
   */
  $scope.isAuthenticated = function() {
    return $auth.isAuthenticated();
  };
  if(!$scope.isAuthenticated()){
	  $rootScope.user = {};
  }

  $scope.init = function(){
	  UserFactory.getAllUserData().then(function (response){
		  $rootScope.user = response.data;
		  if($rootScope.user.role != 1){

			  $rootScope.user = {};
			  $auth.logout();
		  }
	  });
  };

}]);
