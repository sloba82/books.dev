'use strict';
/**
 * The user controller.
 */
app.controller('UserCtrl', ['$rootScope', '$scope', '$alert','$auth','$location', '$stateParams', 'UserFactory',
    function($rootScope, $scope, $alert, $auth, $location, $stateParams, UserFactory) {

        $scope.resetPassword = function () {
            var data = {username: $scope.reset_email};
            UserFactory.resetPassword(data)
                .then(function (response) {
                    $alert({
                        content: response.data.message,
                        animation: 'fadeZoomFadeDown',
                        type: 'material',
                        duration: 15
                    });
                }).catch(function (response) {
                $alert({
                    content: response.data.message + "<br/>",
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 15
                });
            });
        }

        $scope.passwordRecovery = function (resopnse) {
            var data = {
                token: $scope.secret_token,
                "password": $scope.password,
                "confirm_password": $scope.confirm_password
            };
            UserFactory.passwordRecovery(data)
                .then(function (response) {
                    $alert({
                        content: response.data.message,
                        animation: 'fadeZoomFadeDown',
                        type: 'material',
                        duration: 15
                    });
                }).catch(function (response) {
                $alert({
                    content: response.data.message + "<br/>",
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 15
                });
            });
        }

        $scope.getAllUsers = function () {
            UserFactory.getAllUsers().then(function (response) {
                $scope.users = response.data;
            }).catch(function (resp) {
                $alert({
                    content: "Nema podataka",
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
        };

        $scope.getUser = function () {
            UserFactory.getUser($stateParams.id).then(function (response) {
                $scope.selected_user = response.data;
                $scope.oldusername = $scope.selected_user.username;
            }).catch(function (resp) {
                $alert({
                    content: "Nema podataka",
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
        };

        $scope.setEdit = function (){
            $scope.edit=true;
        };

        $scope.$watch('selected_user.username', function(newValue, oldValue) {
            $scope.exist = false;
            oldValue = $scope.oldusername;
            if(typeof newValue != 'undefined' && newValue !== oldValue){
                UserFactory.checkEmail($scope.selected_user.username).then(function (response){
                    $scope.exist = response.data.exist;
                })
            }
        });

        $scope.createUserAdmin = function(){
            UserFactory.createUser($scope.user).then(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
                $scope.edit=false;
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

        $scope.updateUserAdmin = function(){
            UserFactory.updateUser($scope.selected_user).then(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
                $scope.edit=false;
                $scope.getUser();
            }).catch(function (response) {
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
        };

        $scope.getRoles = function(){
            UserFactory.getRoles().then(function(response){
                $scope.roles = response.data;
            });
        };

        $scope.resetForm = function () {
            $scope.form.$setPristine();
            $scope.form.$setUntouched();
        };
}]);