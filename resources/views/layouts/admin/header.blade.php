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
				    <li><a href="#/signOut">{{ trans('admin.signout') }}</a></li>
				    <li><a href="#/users">{{ trans('admin.users') }}</a></li>
				    <li><a href="#/user">{{ trans('admin.create_user') }}</a></li>
				    <li><a href="#/books">{{ trans('admin.books') }}</a></li>
				    <li><a href="#/book">{{ trans('admin.create_book') }}</a></li>
				    <li><a href="#/orders">{{ trans('admin.orders') }}</a></li>
				    <li><a href="#/order">{{ trans('admin.create_order') }}</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->