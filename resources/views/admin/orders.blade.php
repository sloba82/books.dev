<div role="main" class="container theme-showcase" ng-controller="OrderCtrl">
    <div class="col-lg-8">
        <div class="page-header">
            <h3>Orders</h3>
        </div>
        <div class="bs-component" ng-if="isAuthenticated()">
            <form class="form-inline">
                <div class="form-group">
                    <label>Search</label>
                    <input type="text" ng-model="search" class="form-control" placeholder="Search">
                </div>
            </form>
            <div ng-init="getAllOrders()">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th ng-click="sort('user.username')">User Email
                            <span class="glyphicon sort-icon" ng-show="sortKey=='user.username'"
                                  ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                        </th>
                        <th ng-click="sort('status')">Order Status
                            <span class="glyphicon sort-icon" ng-show="sortKey=='status'"
                                  ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                        </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    </thead>
                    <tbody>
                    <tr dir-paginate="order in orders|filter:search|orderBy:sortKey:reverse|itemsPerPage:2">
                        <td>[[order.user.username]]</td>
                        <td>[[order.status]]</td>
                        <td><button class="btn btn-primary"><a  ng-href="#/order/[[order.id]]/edit">Edit</a></button></td>
                        <td><button class="btn btn-info"><a  ng-href="#/order/[[order.id]]">View</a></button></td>
                    </tr>
                    </tbody>
                    <dir-pagination-controls
                        max-size="5"
                        direction-links="true"
                        boundary-links="true" >
                    </dir-pagination-controls>
                </table>
            </div>
        </div>
    </div>
</div>