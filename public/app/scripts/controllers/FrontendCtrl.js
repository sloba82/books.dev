'use strict';

/*global app: false */

/**
 * The home controller.
 */
app.controller('FrontendCtrl', ['$rootScope', '$scope', '$alert', '$auth',
    function($rootScope, $scope, $alert, $auth) {

        /**
         * Initializes the controller.
         */
        $scope.isAuthenticated = function() {
            return $auth.isAuthenticated();
        };
        if(!$scope.isAuthenticated()){
            $rootScope.user = {};
        }

    }]);