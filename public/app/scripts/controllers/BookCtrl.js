'use strict';
/**
 * The book controller.
 */

app.controller('BookCtrl', ['$rootScope', '$location', '$scope', '$auth','$alert', '$stateParams', 'BookFactory',
    function($rootScope, $location, $scope, $auth, $alert, $stateParams, BookFactory){

    $scope.getAllBooks = function () {
        BookFactory.getAllBooks().then(function response() {
            $scope.books = $response.data;
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
            $scope.book = response.data;
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





