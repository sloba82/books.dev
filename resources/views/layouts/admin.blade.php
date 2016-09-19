<!DOCTYPE html>
<html ng-app="uiAdmin">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Medical Books Admin</title>

</head>
<body <body class="" ng-controller="AdminCtrl">
<div ng-if="isAuthenticated()" ng-init="init()"></div>
<div ng-if="isAuthenticated()" ng-include="'views/header.html'"></div>
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content" id="page-content">
    <div class="content sm-gutter">
        <div ui-view></div>
    </div>
</div>

<!-- END CONTAINER -->
<!--[if lt IE 9]>
<script src="bower_components/es5-shim/es5-shim.js"></script>
<script src="bower_components/json3/lib/json3.min.js"></script>
<![endif]-->

<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="{{ URL::asset("app/bower_components/angular/angular.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-resource/angular-resource.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-messages/angular-messages.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-animate/angular-animate.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-strap/dist/angular-strap.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-strap/dist/angular-strap.tpl.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-route/angular-route.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-cookies/angular-cookies.js") }}"></script>

<script src="{{ URL::asset("app/bower_components/ui-router/release/angular-ui-router.js") }}"></script>


<script src="{{ URL::asset("app/lib/satellizer.js") }}"></script>

<script src="{{ URL::asset("app/scripts/admin.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/AdminCtrl.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/SignInCtrl.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/SignOutCtrl.js") }}"></script>
<script src="{{ URL::asset("app/scripts/services/UserFactory.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/UserCtrl.js") }}">></script>
<script src="{{ URL::asset("app/scripts/controllers/BookCtrl.js") }}"></script>
<script src="{{ URL::asset("app/scripts/services/BookFactory.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/HomeCtrl.js") }}"></script>
</body>
</html>