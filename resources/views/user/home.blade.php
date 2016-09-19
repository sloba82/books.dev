<div ng-controller="HomeCtrl">
    <div ng-if="!isAuthenticated()">
        <ul>
            <li><a href="#/signIn">
                    {{ trans('home.login') }}</a></li>
        </ul>
    </div>

    <div ng-if="isAuthenticated()">
        <ul ng-init="getAllBooks()">
            <li ng-repeat="book in books">
                <a href="#/book/[[book.id]]">
                    [[book.title_eng]] [[book.title_srb]] [[book.description_short]]</a>
            </li>
        </ul>
    </div>
</div>