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

        $scope.getAllBooks = function () {
            BookFactory.getAllBooks().then(function (response) {
                $scope.all_books = response.data;
                jQuery("#book_id").select2();
            })
        };

        $scope.getAllUsers = function () {
            UserFactory.getAllUsers().then(function (response) {
                $scope.users = response.data;
            })
        };

        $scope.setEdit = function (){
            $scope.edit=true;
        };

        $scope.sort = function (keyname) {
            $scope.sortKey = keyname;
            $scope.reverse = !$scope.reverse;
        }

        $scope.resetForm = function () {
            $scope.form.$setPristine();
            $scope.form.$setUntouched();
        };

    }]);





