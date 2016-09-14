var adminControllers = angular.module('adminControllers', ['tableService']);

adminControllers.controller('tableController', function ($scope, backendTableService) {
    $scope.active = 'any';
    $scope.dataTable = [];
    $scope.search = "";
    $scope.defaultSort = 'desc';
    $scope.pageNumber = 1;
    $scope.currentConfig = {
        active:$scope.active
    };
    $scope.perPage = 10;
    $scope.numberOfPages = 0;

    var url = document.getElementById('tableCtrl').dataset.url;
    var data = backendTableService.getData(url, $scope.currentConfig).then(function (data) {

        $scope.dataTable = data;
        var numberOfpages = parseInt(data.data.count) / $scope.perPage;
        if(isNaN(numberOfpages) || numberOfpages < 1){
            $scope.numberOfPages = 1;
        }
    });
    $scope.makesort = function (sortField, ordering) {
        $scope.currentConfig.sortFieldName = sortField;
        $scope.currentConfig.orderingDirection = ordering;
        if(ordering == 'desc'){
            $scope.defaultSort = 'asc';
        }else{
            $scope.defaultSort = 'desc';
        }
    };
    $scope.resolvePage = function(pageNumber){
        $scope.pageNumber = pageNumber;
    };
    $scope.$watch('pageNumber', function(newValue){
        if(newValue > 0){
            $scope.currentConfig.page = newValue;
        }else{
            $scope.pageNumber = 1;
        }
    });
    $scope.$watch('search', function(newValue){
        if(newValue.length > 3){
            $scope.currentConfig.searchFor = newValue;
        }else{
            delete $scope.currentConfig.searchFor;
        }
    });
    $scope.$watch('perPage', function(newValue){
        if(newValue >= 1){
            $scope.currentConfig.perPage = newValue;
        }
    });
    $scope.$watch('currentConfig', function(newValue){
        data = backendTableService.getData(url, newValue).then(function (data) {
            $scope.dataTable = data;
            var numberOfpages = parseInt(data.data.count) / $scope.perPage;
            if(isNaN(numberOfpages) || numberOfpages < 1){
                $scope.numberOfPages = 1;
            }
        });
    }, true);
    $scope.setParams=function(newValue){
        $scope.active = newValue;
        $scope.currentConfig.active = $scope.active;
    };


});

