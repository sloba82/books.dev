<div ng-controller="HomeCtrl">
    <ul>
        <li ng-if="!isAuthenticated()"><a href="#/signIn">
                {{ trans('home.login') }}</a></li>
    </ul>
</div>