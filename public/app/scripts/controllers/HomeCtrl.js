'use strict';

/*global app: false */

/**
 * The home controller.
 */
app.controller('HomeCtrl', ['$rootScope', '$scope', '$alert', '$auth', '$location','$window','UserFactory',
    function($rootScope, $scope, $alert, $auth, $location,$window,UserFactory) {

    /**
     * Initializes the controller.
     */
    $scope.isAuthenticated = function() {
        return $auth.isAuthenticated();
    };
    if(!$scope.isAuthenticated()){
        $rootScope.user = null;
    }

    $scope.init = function(){
        if($scope.isAuthenticated()&&$rootScope.user==null){
            UserFactory.getAllUserData().then(function (response){
                $window.localStorage.setItem('user', JSON.stringify(response.data));
                $rootScope.user = response.data;
            });
        }
    };
}]);