'use strict';

var appName = 'Medical Books - Reset Password'
/**
 * The application.
 */
var app = angular.module('uiResetPassword', [
    'ngResource',
    'ngMessages',
    'ngCookies',
    'ui.router',
    'mgcrea.ngStrap',
]);

/**
 * The application routing.
 */
app.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

});

app.controller('ResetPasswordCtrl', ['$rootScope', '$scope', '$alert', '$location', '$http',
    function ($rootScope, $scope, $alert, $location, $http) {

        $scope.resetPasswordRecovery = function () {
            var data = {
                "token": document.getElementById("secret_token").value,
                "password": $scope.password,
                "confirm_password": $scope.confirm_password
            };
            $http.post("/resetpassword", data).then(function (response) {
                $alert({
                    content: response.data.message + "<br/>",
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
    }]);
