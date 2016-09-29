<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
                <img src="{{ URL::asset('app/bower_components/bootstrap/dist/images/logo.png') }}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> {{ trans('admin.users') }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#/users">{{trans('admin.all_users') }}</a></li>
                        <li><a href="#/user">{{ trans('admin.create_user') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> {{ trans('admin.books') }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#/books">{{trans('admin.all_books') }}</a></li>
                        <li>
                            <a href="#/book"> {{ trans('admin.create_book') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ trans('admin.orders') }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#/orders"><i class="fa fa-book"></i>{{trans('admin.all_orders') }}</a></li>
                        <li><a href="#/order"><i class="fa fa-object-group"></i> {{ trans('admin.create_order') }}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#/signOut">{{ trans('admin.signout') }}</a></li>
            </ul>
        </div>
    </div>
</header><!--/header-->