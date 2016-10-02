'use strict';
/**
 * The order controller.
 */

app.controller('OrderCtrl', ['$rootScope', '$location', '$scope', '$auth','$alert', '$stateParams', 'OrderFactory', 'BookFactory', 'UserFactory',
    function($rootScope, $location, $scope, $auth, $alert, $stateParams, OrderFactory, BookFactory, UserFactory) {

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
                $scope.selected_order = response.data;
            }).catch(function (resp) {
                $alert({
                    content: "Nema podataka",
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            })
        };

        $scope.updateOrder = function () {
            OrderFactory.updateOrder($stateParams.id, $scope.selected_order).then(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
                $scope.edit=false;
            }).catch(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });

            });
        };

        $scope.createOrder = function () {
            OrderFactory.createOrder($scope.new_order).then(function (response) {
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
                $scope.new_order = {};
                $scope.resetForm();
            }).catch(function (response) {
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
            });
        };

        $scope.getAllBooks = function () {
            BookFactory.getAllBooks().then(function (response) {
                $scope.all_books = response.data;
                jQuery("#book_id").select2();
            })
        };

        $scope.getAllUsers = function () {
            UserFactory.getAllUsers().then(function (response) {
                $scope.users = response.data;
                jQuery("#username").select2();
            })
        };

        $scope.resetForm = function () {
            $scope.form.$setPristine();
            $scope.form.$setUntouched();
        };

        $scope.setEdit = function (){
            $scope.edit=true;
        };

        $scope.sort = function (keyname) {
            $scope.sortKey = keyname;
            $scope.reverse = !$scope.reverse;
        };

    }]);





