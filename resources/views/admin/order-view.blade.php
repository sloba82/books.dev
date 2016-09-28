<div role="main" class="container theme-showcase" ng-controller="OrderCtrl">
    <div class="col-lg-8">
        <div class="page-header">
            <h3>Order for: <span class="semi-bold">[[selected_order.user.username]]</span></h3>
        </div>
        <div class="bs-component" ng-if="isAuthenticated()">
            <div ng-init="getOrder()">
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>User Email</th>
                        <td>[[selected_order.user.username]]</td>
                    </tr>
                    <tr>
                        <th>Books</th>
                        <td ng-repeat="names in selected_order.books_names">[[names]][[$last ? ', ' : ', ']]</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>[[selected_order.status]]</td>
                    </tr>
                    </tbody>
                </table>
                <a ng-href="#/orders"><button class="btn btn-success">Back</button></a>
            </div>
        </div>
    </div>
</div>