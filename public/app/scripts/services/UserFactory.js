'use strict';

/*global app: false */

/**
 * The user factory.
 */
app.factory('UserFactory', function($http) {
    return {
        getAllUserData : function(){
            return $http.get('/profile');
        },
        resetPassword:function(data){
            return $http.post('/requestresetpassword',data);
        },
        passwordRecovery:function(data){
            return $http.post('/password-recovery',data);
        },
        getAllUsers : function(){
            return $http.get('/user');
        },
        getUser : function(id){
            return $http.get('/user/' + id);
        },
    };
});
