<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img
                    src="{{ URL::asset('app/bower_components/bootstrap/dist/images/logo.png') }}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#/home">{{ trans('master.home') }}</a></li>
                <li ng-if="isAuthenticated()"><a href="#/profile">{{ trans('master.profile') }}</a></li>
                <li><a href="#/contact">{{ trans('master.contact') }}</a></li>
                <li ng-if="isAuthenticated()"><a href="#/basket">{{ trans('master.basket') }}</a></li>
                <li ng-if="!isAuthenticated()"><a href="#/signIn">{{ trans('master.login') }}</a></li>
                <li ng-if="!isAuthenticated()"><a href="#/signUp">{{ trans('master.register') }}</a></li>
                <li ng-if="isAuthenticated()"><a href="#/signOut">{{ trans('master.signout') }}</a></li>
            </ul>
        </div>
    </div>
</header><!--/header-->