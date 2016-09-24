<div>
    <h3>Users</h3>
</div>

<div ng-controller="UserCtrl">
    <div ng-if="isAuthenticated()">
        <ul ng-init="getAllUsers()">
            <li ng-repeat="user in users">
                <a href="#/user/[[user.id]]">
                    [[user.first_name]] [[user.last_name]] </a>
            </li>
        </ul>
    </div>
</div>