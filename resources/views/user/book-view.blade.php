<div role="main" class="container theme-showcase">
    <div class="col-lg-8">
        <div class="page-header">
            <h3><span class="semi-bold">
                    [[book.title_eng]]
                </span></h3>
        </div>
        <div class="bs-component">
            <div ng-init="getBook()">
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>Photo</th>
                        <td>[[book.photo]]</td>
                    </tr>
                    <tr>
                        <th>Title Eng #</th>
                        <td>[[book.title_eng]]</td>
                    </tr>
                    <tr>
                        <th>Title Srb</th>
                        <td>[[book.title_srb]]</td>
                    </tr>
                    <tr>
                        <th>Short description</th>
                        <td>[[book.discription_short]]</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>[[book.author]]</td>
                    </tr>
                    <tr ng-if="isAuthenticated()">
                        <th>Price</th>
                        <td>[[book.price]]</td>
                    </tr>
                    <tr>
                        <th>Number of pages</th>
                        <td>[[book.page_num]]</td>
                    </tr>
                    <tr>
                        <th>Deadline</th>
                        <td>[[book.deadline]]</td>
                    </tr>
                    <tr>
                        <th>Deadline</th>
                        <td>[[book.deadline]]</td>
                    </tr>
                    </tbody>
                </table>
                <a ng-href="#/home">
                    <button class="btn btn-success">Back</button>
                </a>
                <!-- Trigger the modal with a button -->
                <button ng-if="!isAuthenticated()" type="button" class="btn btn-primary"
                        data-toggle="modal" data-target="#myModal">
                    {{ trans('home.buy') }}
                </button>
                <button ng-if="isAuthenticated()" type="button" class="btn btn-primary">
                    {{ trans('home.buy') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Obavezno logovanje</h4>
            </div>
            <div class="modal-body">
                <p>Da biste mogli da porucite knjingu morate biti registrovani i ulogovani.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>