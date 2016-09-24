<!DOCTYPE html>
<html ng-app="uiApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Medical Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('app/bower_components/bootstrap/dist/css/main.css') }}" rel="stylesheet">
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

<body ng-controller="HomeCtrl" ng-cloak  ng-init="init()"  >

<div  ng-include=" 'views/header_front.html'"></div>


  <div ng-if="isAuthenticated()">
            <nav>
                <div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div id="main-menu">

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
    </div>
        <div ng-if="isAuthenticated()">

            <div class="mainInput">

                <div ui-view></div>
            </div>
        </div>


        <div ng-if="!isAuthenticated()">

            <div class="mainInput">

                <div ui-view></div>
            </div>
        </div>












<!-- /////  -->

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

        <script src="{{ URL::asset("app/scripts/app.js") }}"></script>
        <script src="{{ URL::asset("app/scripts/controllers/SignInCtrl.js") }}"></script>
        <script src="{{ URL::asset("app/scripts/controllers/SignOutCtrl.js") }}"></script>
        <script src="{{ URL::asset("app/scripts/controllers/HomeCtrl.js") }}"></script>
        <script src="{{ URL::asset("app/scripts/services/UserFactory.js") }}"></script>
        <script src="{{ URL::asset("app/scripts/controllers/UserCtrl.js") }}">></script>
        <script src="{{ URL::asset("app/scripts/controllers/BookCtrl.js") }}"></script>
        <script src="{{ URL::asset("app/scripts/services/BookFactory.js") }}"></script>
<!--
    <script src="{{ URL::asset('app/bower_components/bootstrap/dist/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('app/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('app/bower_components/bootstrap/dist/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ URL::asset('app/bower_components/bootstrap/dist/js/main.js') }}"></script>
-->



    </body>
</html>