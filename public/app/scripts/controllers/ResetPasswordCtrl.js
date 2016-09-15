app.controller('ResetPasswordCtrl', ['$rootScope', '$scope','$alert', '$location','$http',  
    function($rootScope, $scope,$alert, $location,$http) {

    $scope.passwordRecovery = function(resopnse){

        var data  = {username:$scope.reset_email};
        UserFactory.resetPassword(data)
            .then(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 15
                });
            }).catch(function(response){
            $alert({
                content: response.data.message+"<br/>",
                animation: 'fadeZoomFadeDown',
                type: 'material',
                duration: 15
            });
        });
    }
}]);