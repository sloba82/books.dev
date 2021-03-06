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
        checkEmail: function(email){
            return $http.post('/check-email',{email:email});
        },
        updateUser: function(data){
            return $http.put('/user/' + data.id, data);
        },
        createUser: function(data){
            return $http.post('/user', data);
        },
        getRoles:function(){
            return $http.get('/role');
        },
    };
});
