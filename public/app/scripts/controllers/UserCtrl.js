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

        $scope.resetForm = function () {
            $scope.form.$setPristine();
            $scope.form.$setUntouched();
        };
}]);