<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#/home"><img
                    src="{{ URL::asset('app/bower_components/bootstrap/dist/images/logo.png') }}" alt="logo"></a>
        </div>
		
		
        <div class="collapse navbar-collapse" >
			<div class="col-md-4 col-sm-4" style="margin:20px 0px 0px 0px;">
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group form-group-sm">
					<input type="text" class="form-control input-sm" placeholder="naslov ili autor">
					</div>
					<button type="submit" class="btn btn-success btn-sm">Pretraga</button>
					</form>
			</div>
		
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#/home">{{ trans('master.home') }}</a></li>
                 <li><a href="#/books">{{ trans('master.books') }}</a></li>
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