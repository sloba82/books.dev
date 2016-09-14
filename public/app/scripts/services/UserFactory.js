'use strict';

/*global app: false */

/**
 * The user factory.
 */
app.factory('UserFactory', function($http,$rootScope) {
    return {
        getAllUserData : function(){
            return $http.get('/user/profile');
        },
    };
});
