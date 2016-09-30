'use strict';

/*global app: false */

/**
 * The home factory.
 */
app.factory('HomeFactory', function($http) {
    return {
        getAllBooks : function(){
            return $http.get('/home');
        },
    };
});