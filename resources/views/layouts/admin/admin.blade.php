<!DOCTYPE html>
<html ng-app="uiAdmin">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Medical Books Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/main.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon"
          href="{{ URL::asset('app/bower_components/bootstrap/dist/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{ URL::asset('app/bower_components/bootstrap/dist/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{ URL::asset('app/bower_components/bootstrap/dist/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{ URL::asset('app/bower_components/bootstrap/dist/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head>
<body
<body class="" ng-controller="AdminCtrl">


<div ng-if="isAuthenticated()" ng-init="init()"></div>
<div ng-if="isAuthenticated()" ng-include="'views/header.html'"></div>
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content" id="page-content">
    <div class="content sm-gutter">
        <div ui-view></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- END CONTAINER -->
<!--[if lt IE 9]>
<script src="bower_components/es5-shim/es5-shim.js"></script>
<script src="bower_components/json3/lib/json3.min.js"></script>
<![endif]-->

<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="{{ URL::asset('app/bower_components/angular/angular.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angular-resource/angular-resource.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angular-messages/angular-messages.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angular-animate/angular-animate.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angular-strap/dist/angular-strap.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angular-strap/dist/angular-strap.tpl.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angular-route/angular-route.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angular-cookies/angular-cookies.js') }}"></script>

<script src="{{ URL::asset('app/bower_components/ui-router/release/angular-ui-router.js') }}"></script>


<script src="{{ URL::asset('app/lib/satellizer.js') }}"></script>

<script src="{{ URL::asset('app/scripts/admin.js') }}"></script>
<script src="{{ URL::asset('app/scripts/controllers/AdminCtrl.js') }}"></script>
<script src="{{ URL::asset('app/scripts/controllers/SignInCtrl.js') }}"></script>
<script src="{{ URL::asset('app/scripts/controllers/SignOutCtrl.js') }}"></script>
<script src="{{ URL::asset('app/scripts/services/UserFactory.js') }}"></script>
<script src="{{ URL::asset('app/scripts/controllers/UserCtrl.js') }}">></script>
<script src="{{ URL::asset('app/scripts/controllers/BookCtrl.js') }}"></script>
<script src="{{ URL::asset('app/scripts/services/BookFactory.js') }}"></script>
<script src="{{ URL::asset('app/scripts/controllers/HomeCtrl.js') }}"></script>
<script src="{{ URL::asset('app/scripts/services/OrderFactory.js') }}"></script>
<script src="{{ URL::asset('app/scripts/controllers/OrderCtrl.js') }}"></script>


<script src="{{ URL::asset('app/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/bootstrap/dist/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/bootstrap/dist/js/main.js') }}"></script>
<script src="{{ URL::asset('app/bower_components/angularUtils-pagination/dirPagination.js') }}"></script>


</body>
</html>