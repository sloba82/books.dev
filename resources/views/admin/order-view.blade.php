<div role="main" class="container theme-showcase" ng-controller="OrderCtrl">
    <div class="col-lg-8">
        <div class="page-header">
            <h3>Orders</h3>
        </div>
        <div class="bs-component" ng-if="isAuthenticated()">
            <div ng-init="getOrder()">
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>User Email</th>
                        <td>[[order.user.username]]</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>[[order.status]]</td>
                    </tr>
                    </tbody>
                </table>
                <button class="btn btn-success"><a  ng-href="#/orders">Back</a></button>
            </div>
        </div>
    </div>
</div>