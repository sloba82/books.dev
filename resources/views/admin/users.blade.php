<div role="main" class="container theme-showcase" ng-controller="UserCtrl">
    <div class="col-lg-8">
        <div class="page-header">
            <h3>Users</h3>
        </div>
        <div class="bs-component" ng-if="isAuthenticated()">
            <form class="form-inline">
                <div class="form-group">
                    <label>Search</label>
                    <input type="text" ng-model="search" class="form-control" placeholder="Search">
                </div>
            </form>
            <div ng-init="getAllUsers()">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th ng-click="sort('username')">Email
                            <span class="glyphicon sort-icon" ng-show="sortKey=='username'"
                                  ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                        </th>
                        <th ng-click="sort('first_name')">First Name
                            <span class="glyphicon sort-icon" ng-show="sortKey=='first_name'"
                                  ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                        </th>
                        <th ng-click="sort('last_name')">Last Name
                            <span class="glyphicon sort-icon" ng-show="sortKey=='last_name'"
                                  ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                        </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    </thead>
                    <tbody>
                    <tr dir-paginate="user in users|filter:search|orderBy:sortKey:reverse|itemsPerPage:2">
                        <td>[[user.username]]</td>
                        <td>[[user.first_name]]</td>
                        <td>[[user.last_name]]</td>
                        <td><button class="btn btn-primary"><a  ng-href="#/user/[[user.id]]/edit">Edit</a></button></td>
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