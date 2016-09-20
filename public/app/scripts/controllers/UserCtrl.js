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

        $scope.updateUserAdmin = function(){
            $scope.update = {
                id:$scope.selected_user.id,
                username:$scope.selected_user.username,
                first_name:$scope.selected_user.first_name,
                last_name:$scope.selected_user.last_name,
                address:$scope.selected_user.address,
                city:$scope.selected_user.city,
                medical_institution:$scope.selected_user.medical_institution,
                role:$scope.selected_user.role,
                active:$scope.selected_user.active,
            };
            UserFactory.updateUser($scope.update).then(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
                $scope.edit=false;
                $scope.getUserForAdmin();
            }).catch(function (response) {
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
        };

        $scope.resetForm = function () {
            $scope.form.$setPristine();
            $scope.form.$setUntouched();
        };
}]);