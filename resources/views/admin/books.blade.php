<div role="main" class="container theme-showcase" ng-controller="BookCtrl">
    <div class="col-lg-8">
        <div class="page-header">
            <h3>Books</h3>
        </div>
    <div class="bs-component" ng-if="isAuthenticated()">
        <form class="form-inline">
            <div class="form-group">
                <label>Search</label>
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
            </div>
        </form>
        <div ng-init="getAllBooks()">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th ng-click="sort('title_eng')">Title Eng
                        <span class="glyphicon sort-icon" ng-show="sortKey=='title_eng'"
                              ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th ng-click="sort('title_srb')">Title Srb
                        <span class="glyphicon sort-icon" ng-show="sortKey=='title_srb'"
                              ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th ng-click="sort('discription_short')">Description Short
                        <span class="glyphicon sort-icon" ng-show="sortKey=='discription_short'"
                              ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th>Action</th>
                </tr>
                </thead>
                </thead>
                <tbody>
                <tr dir-paginate="book in books|filter:search|orderBy:sortKey:reverse|itemsPerPage:2">
                    <td>[[book.title_eng]]</td>
                    <td>[[book.title_srb]]</td>
                    <td>[[book.discription_short]]</td>
                    <td><a  ng-href="#/book/[[book.id]]/edit"><button class="btn btn-primary">Edit</button></a></td>
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