'use strict';
/**
 * The order controller.
 */

app.controller('OrderCtrl', ['$rootScope', '$location', '$scope', '$auth','$alert', '$stateParams', 'OrderFactory',
    function($rootScope, $location, $scope, $auth, $alert, $stateParams, OrderFactory){

        $scope.getAllOrders = function () {
            OrderFactory.getAllOrders().then(function (response) {
                $scope.orders = response.data;
            }).catch(function (resp) {
                $alert({
                    content: "Nema podataka",
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
        };

        $scope.getOrder = function () {
            OrderFactory.getOrder($stateParams.id).then(function (response) {
                $scope.order = response.data;
            }).catch(function (resp) {
                $alert({
                    content: "Nema podataka",
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





