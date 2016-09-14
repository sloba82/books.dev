'use strict';

/*global app: false */

/**
 * The sign out controller.
 */
app.controller('SignOutCtrl', ['$rootScope','$auth', '$alert',
    function($rootScope,$auth, $alert) {
    if (!$auth.isAuthenticated()) {
        return;
    }

    $auth.logout()
        .then(function() {
            $rootScope.user = null;

            $alert({
                content: 'Uspešno ste se izlogovali.',
                animation: 'fadeZoomFadeDown',
                type: 'material',
                duration: 3
            });
        });
}]);
