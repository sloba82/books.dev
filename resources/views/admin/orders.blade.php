<div>
    <h3>Orders</h3>
</div>

<div ng-controller="OrderCtrl">
    <div ng-if="isAuthenticated()">
        <ul ng-init="getAllOrders()">
            <li ng-repeat="order in orders">
                <a href="#/order/[[order.id]]">
                    [[order.user.first_name]]
                    [[order.user.last_name]][[$last ? ', ' : ', ']]
                    <span ng-repeat="book in order.books">[[book]][[$last ? ', ' : ', ']]</span>
                    [[order.status]]
                </a>
            </li>
        </ul>
    </div>
</div>