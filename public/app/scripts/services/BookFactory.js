'use strict';

/*global app: false */

/**
 * The book factory.
 */
app.factory('BookFactory', function($http) {
    return {
        getAllBooks : function(){
            return $http.get('/book');
        },
        getBook : function(id){
            return $http.get('/book/' + id);
        },
    };
});