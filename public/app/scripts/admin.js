'use strict';
var appName = 'Medical Books Admin'
/**
 * The application.
 */
var app = angular.module('uiAdmin', [
    'ngResource',
    'ngMessages',
    'ngCookies',
    'ui.router',
    'mgcrea.ngStrap',
    'satellizer',
    'angularUtils.directives.dirPagination'
]);

/**
 * The run configuration.
 */
app.run(function($rootScope) {

    /**
     * The user data.
     *
     * @type {{}}
     */
    $rootScope.user = {};
});

var authCheck = {
    authenticated: function($q, $location, $auth) {
        var deferred = $q.defer();

        if (!$auth.isAuthenticated()) {
            $location.path('/signIn');
        } else {
            deferred.resolve();
        }

        return deferred.promise;
    }
};

var loginCheck = {
    authenticated: function($q, $location, $auth) {
        var deferred = $q.defer();

        if ($auth.isAuthenticated()) {
            !$location.path('/signIn');
        } else {
            deferred.resolve();
        }

        return deferred.promise;
    }
};

/**
 * The application routing.
 */
app.config(function ($urlRouterProvider, $stateProvider, $httpProvider, $authProvider, $interpolateProvider) {

    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

    $urlRouterProvider.otherwise('/signIn');

    $stateProvider
        .state('signIn', { url: '/signIn', templateUrl: '/views/signInAdmin.html', resolve: loginCheck })
        .state('signOut', { url: '/signOut', template: null,  controller: 'SignOutCtrl', resolve: authCheck })
        .state('home-admin', {url: '/home-admin', templateUrl: '/views/home-admin.html', resolve: authCheck })
        .state('users', {url: '/users', templateUrl: '/views/users.html', resolve: authCheck })
        .state('user-edit', {url: '/user/{id}/edit', templateUrl: '/views/user-edit.html', resolve: authCheck })
        .state('user-create', {url: '/user', templateUrl: '/views/user-create.html', resolve: authCheck })
        .state('books', {url: '/books', templateUrl: '/views/books.html', resolve: authCheck })
        .state('book-edit', {url: '/book/{id}/edit', templateUrl: '/views/book-edit.html', resolve: authCheck })
        .state('book-create', {url: '/book', templateUrl: '/views/book-create.html', resolve: authCheck })
        .state('orders', {url: '/orders', templateUrl: '/views/orders.html', resolve: authCheck })
        .state('order-edit', {url: '/order/{id}/edit', templateUrl: '/views/order-edit.html', resolve: authCheck })
        .state('order-create', {url: '/order', templateUrl: '/views/order-create.html', resolve: authCheck })
        .state('order-view', {url: '/order/{id}', templateUrl: '/views/order-view.html', resolve: authCheck })

    $httpProvider.interceptors.push(function($q, $injector) {
        return {
            request: function(request) {
                // Add auth token for Silhouette if user is authenticated
                var $auth = $injector.get('$auth');
                var $cookies = $injector.get('$cookies');
                if ($auth.isAuthenticated()) {
                    request.headers['Authorization'] = 'Bearer ' + $auth.getToken();
                }

                // Add CSRF token for the Play CSRF filter

                var token = $cookies.get('token');
                if (token) {
                    // Play looks for a token with the name Csrf-Token
                    // https://www.playframework.com/documentation/2.4.x/ScalaCsrf
                    request.headers['Authorization'] = 'Bearer ' + $auth.getToken();
                }

                return request;
            },

            responseError: function(rejection) {
                if (rejection.status === 401) {
                    var $auth = $injector.get('$auth');
                    $auth.logout();
                    $injector.get('$state').go('signIn');
                }
                return $q.reject(rejection);
            }
        };
    });



    // Auth config
    $authProvider.httpInterceptor = true; // Add Authorization header to HTTP request
    $authProvider.loginOnSignup = true;
    $authProvider.loginRedirect = '/home-admin';
    $authProvider.logoutRedirect = '/';
    $authProvider.signupRedirect = '/signIn';
    $authProvider.loginUrl = '/authenticate';
    $authProvider.signupUrl = '/signUp';
    $authProvider.loginRoute = '/signIn';
    $authProvider.signupRoute = '/signUp';
    $authProvider.tokenName = 'token';
    $authProvider.tokenPrefix = 'satellizer'; // Local Storage name prefix
    $authProvider.authHeader = 'Authorization';
    $authProvider.platform = 'browser';
    $authProvider.storage = 'sessionStorage';

    // Facebook
    $authProvider.facebook({
        clientId: '1503078423241610',
        url: '/authenticate/facebook',
        scope: 'email',
        scopeDelimiter: ',',
        requiredUrlParams: ['display', 'scope'],
        display: 'popup',
        type: '2.0',
        popupOptions: { width: 481, height: 269 }
    });

    // Google
    $authProvider.google({
        clientId: '526391676642-nbnoavs078shhti3ruk8jhl4nenv0g04.apps.googleusercontent.com',
        url: '/authenticate/google',
        scope: ['profile', 'email'],
        scopePrefix: 'openid',
        scopeDelimiter: ' ',
        requiredUrlParams: ['scope'],
        optionalUrlParams: ['display'],
        display: 'popup',
        type: '2.0',
        popupOptions: { width: 580, height: 400 }
    });

    // VK
    $authProvider.oauth2({
        clientId: '4782746',
        url: '/authenticate/vk',
        authorizationEndpoint: 'http://oauth.vk.com/authorize',
        redirectUri: window.location.origin || window.location.protocol + '//' + window.location.host,
        name: 'vk',
        scope: 'email',
        scopeDelimiter: ' ',
        requiredUrlParams: ['display', 'scope'],
        display: 'popup',
        popupOptions: { width: 495, height: 400 }
    });

    // Twitter
    $authProvider.twitter({
        url: '/authenticate/twitter',
        type: '1.0',
        popupOptions: { width: 495, height: 645 }
    });

    // Xing
    $authProvider.oauth1({
        url: '/authenticate/xing',
        name: 'xing',
        popupOptions: { width: 495, height: 500 }
    });
});
