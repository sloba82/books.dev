<!DOCTYPE html>
<html ng-app="uiApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Medical Books</title>

</head>
    <body ng-controller="HomeCtrl" ng-cloak>

        <div ng-if="isAuthenticated()" ng-init="init()"></div>
        <div class="row">
            <div>
                <div>
                    <ul>
                        <li ng-click="changeProfileClass()" ng-if="isAuthenticated()"><a href="#/profile">
                                {{ trans('master.profile') }}</a></li>
                        <li ng-if="isAuthenticated()"><a href="#/contact">{{ trans('master.contact') }}</a></li>
                        <li ng-if="isAuthenticated()"><a href="#/basket">{{ trans('master.basket') }}</a></li>
                        <li ng-if="isAuthenticated()"><a href="#/signOut">{{ trans('master.signout') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>

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
        <script></script>
    </body>
</html>