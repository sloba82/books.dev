'use strict';

/*global app: false */

/**
 * The home controller.
 */
app.controller('HomeCtrl', ['$rootScope', '$scope', '$alert', '$auth', '$location', '$window', 'UserFactory', 'HomeFactory', '$stateParams',
    function ($rootScope, $scope, $alert, $auth, $location, $window, UserFactory, HomeFactory, $stateParams) {

        /**
         * Initializes the controller.
         */
        $scope.isAuthenticated = function () {
            return $auth.isAuthenticated();
        };
        if (!$scope.isAuthenticated()) {
            $rootScope.user = null;
        }

        $scope.init = function () {
            if ($scope.isAuthenticated() && $rootScope.user == null) {
                UserFactory.getAllUserData().then(function (response) {
                    $window.localStorage.setItem('user', JSON.stringify(response.data));
                    $rootScope.user = response.data;
                });
            }
        };

        $scope.getAllBooks = function () {
            HomeFactory.getAllBooks().then(function (response) {
                $scope.books = response.data;
            })
        };

        $scope.getBook = function () {
            HomeFactory.getBook($stateParams.id).then(function (response) {
                $scope.book = response.data;
            })
        };

        $scope.createUser = function(){
            HomeFactory.createUser($scope.user_create).then(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
                $scope.edit=false;
                $scope.user_create = {}
                $scope.resetForm();
            }).catch(function (response) {
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
        };
    }]);