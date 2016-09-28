'use strict';
/**
 * The book controller.
 */

app.controller('BookCtrl', ['$rootScope', '$location', '$scope', '$auth','$alert', '$stateParams', 'BookFactory',
    function($rootScope, $location, $scope, $auth, $alert, $stateParams, BookFactory){

    $scope.getAllBooks = function () {
        BookFactory.getAllBooks().then(function (response) {
            $scope.books = response.data;
        }).catch(function (resp) {
            $alert({
                content: "Nema podataka",
                animation: 'fadeZoomFadeDown',
                type: 'material',
                duration: 3
            });
        })
    };

    $scope.getBook = function () {
        BookFactory.getBook($stateParams.id).then(function (response) {
            $scope.selected_book = response.data;
        }).catch(function (resp) {
            $alert({
                content: "Nema podataka",
                animation: 'fadeZoomFadeDown',
                type: 'material',
                duration: 3
            });
        })
    };

        $scope.updateBook = function(){
            BookFactory.updateBook($scope.selected_book).then(function(response){
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

        $scope.createBook = function(){
            BookFactory.createBook($scope.book_create).then(function(response){
                $alert({
                    content: response.data.message,
                    animation: 'fadeZoomFadeDown',
                    type: 'material',
                    duration: 3
                });
                $scope.edit=false;
                $scope.user_create = {}
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

        $scope.sort = function(keyname){
            $scope.sortKey = keyname;
            $scope.reverse = !$scope.reverse;
        }

        $scope.setEdit = function (){
            $scope.edit=true;
        };

    $scope.resetForm = function () {
        $scope.form.$setPristine();
        $scope.form.$setUntouched();
    };

}]);
