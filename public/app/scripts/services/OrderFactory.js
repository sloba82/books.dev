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
        updateOrder : function (id, data) {
            return $http.put('/order/' + id, data);
        },
        createOrder : function (data) {
            return $http.post('/order', + data);
        }
    };
});