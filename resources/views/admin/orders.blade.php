<div>
    <h3>Orders</h3>
</div>

<div ng-controller="OrderCtrl">
    <div ng-if="isAuthenticated()">
        <ul ng-init="getAllOrders()">
            <li ng-repeat="order in orders">
                <a href="#/order/[[order.id]]">
                    [[order.user_id]] [[order.books]] [[order.status]]</a>
            </li>
        </ul>
    </div>
</div>