<div ng-controller="HomeCtrl">
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
                        <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
        </div>
        </span>
    </div>
</div>