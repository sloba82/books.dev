
    <div class="row">
        <div class="col-lg-10">
            <h3>Latest Features</h3>
        </div>
    </div>

    <div  ng-init="getAllBooks()">
        <span ng-repeat="book in books">
       

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="http://placehold.it/800x500" alt="">
                <div class="caption">
                    <h3>[[book.title_eng]]</h3>
                    <p>[[book.description_short]]</p>
                    <p>
                        <!-- Trigger the modal with a button -->
                        <button ng-if="!isAuthenticated()" type="button" class="btn btn-primary"
                                data-toggle="modal" data-target="#myModal">
                            {{ trans('home.buy') }}
                        </button>
                        <button ng-if="isAuthenticated()" type="button" class="btn btn-primary">
                            {{ trans('home.buy') }}
                        </button>
                        <a href="#/book/[[book.id]]" class="btn btn-default">{{ trans('home.info') }}</a>
                    </p>
                </div>
            </div>
        </div>

        
        </span>
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
