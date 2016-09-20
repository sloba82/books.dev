'use strict';

/*global app: false */

/**
 * The order factory.
 */
app.factory('OrderFactory', function($http) {
    return {
        getAllOrders : function(){
            return $http.get('/order');
        },
        getOrder : function(id){
            return $http.get('/order/' + id);
        },
    };
});