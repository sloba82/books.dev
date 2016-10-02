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
        getBook : function(id){
            return $http.get('home/book/' + id);
        },
        createUser: function(data){
            return $http.post('home/user', data);
        },
    };
});