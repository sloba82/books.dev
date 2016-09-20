<div>
    <h3>Books</h3>
</div>

<div ng-controller="BookCtrl">
    <div ng-if="isAuthenticated()">
        <ul ng-init="getAllBooks()">
            <li ng-repeat="book in books">
                <a href="#/book/[[book.id]]">
                    [[book.title_eng]] [[book.title_srb]] [[book.description_short]]</a>
            </li>
        </ul>
    </div>
</div>