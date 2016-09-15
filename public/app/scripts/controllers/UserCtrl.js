app.controller('UserCtrl', ['$rootScope', '$scope', '$alert','$auth','$location', '$stateParams', 'UserFactory',
    function($rootScope, $scope, $alert, $auth, $location, $stateParams, UserFactory) {

    $scope.resetPassword = function(){
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

    $scope.passwordRecovery = function(resopnse){
        consloe.log(document.getElementById("token").value);
        // response.data.token = document.getElementById("token").value;
        //     UserFactory.passwordRecovery(resopnse.data)
        //         .then(function(response){
        //             $alert({
        //                 content: response.data.message,
        //                 animation: 'fadeZoomFadeDown',
        //                 type: 'material',
        //                 duration: 15
        //             });
        //         }).catch(function(response){
        //         $alert({
        //             content: response.data.message+"<br/>",
        //             animation: 'fadeZoomFadeDown',
        //             type: 'material',
        //             duration: 15
        //         });
        //     });
        }

    $scope.resetForm = function () {
        $scope.form.$setPristine();
        $scope.form.$setUntouched();
    };
}]);