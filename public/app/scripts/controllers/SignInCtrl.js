'use strict';

/*global app: false */

/**
 * The sign in controller.
 */
app.controller('SignInCtrl', ['$scope', '$alert', '$auth', function($scope, $alert, $auth) {

    /**
     * Submits the login form.
     */
    $scope.submit = function() {
        $auth.setStorage('sessionStorage');
        $auth.login({ username: $scope.email, password: $scope.password})
            .then(function() {

                $alert({
                    content: 'Uspešno ste se logovali.',
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
            .catch(function(response) {
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            });
    };

    /**
     * Authenticate with a social provider.
     *
     * @param provider The name of the provider to authenticate.
     */
    $scope.authenticate = function(provider) {
        $auth.authenticate(provider)
            .then(function() {
                $alert({
                    content: 'Uspešno ste se logovali.',
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
            .catch(function(response) {
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            });
    };
}]);
