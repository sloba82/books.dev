
<div ng-controller="BookCtrl">
    
<div class="row">
  <div class="col-xs-12 col-md-8">

    <div class="col-sm-10">
        <h4>New Book</h4>
    </div>

    <div ng-init="createBook()">
            <div>
                <form name="form" method="post" id='form' action="create" autocomplete="off" novalidate class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label for="photo" class="col-sm-4 control-label">Image</label>
                            <div class="col-sm-8">
                                <input type="file" 
									                  data-target="#upload"
                                    name="photo"
                                    id="photo" >
                            </div>
                        </div>
                        <div  class="form-group">
                            <label for="title_eng" class="col-sm-4 control-label">Title English</label>
                            <div class="col-sm-8">
                                <input id="title_eng"
                                       name="title_eng"
                                       type="text"
                                       placeholder="Title English"
									                     required
                                       ng-model="book_create.title_eng"
                                       ng-maxlength="256"
					                             class="form-control">
                                <span class="text-danger"
                                      ng-show="(form.title_eng.$dirty || form.$submitted) && form.title_eng.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.title_eng.$dirty || form.$submitted) && form.title_eng.$error.maxlength">
                                            {{ trans('book.title_eng_maxlength') }}
                                        </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title_srb" class="col-sm-4 control-label">Title Serbian</label>
                            <div class="col-sm-8">
                                <input id="title_srb"
                                       name="title_srb"
                                       type="text"
                                       placeholder="Title Serbian"
									                     required
                                       ng-model="book_create.title_srb"
                                       ng-maxlength="256"
                                       class="form-control">
                                <span class="text-danger"
                                      ng-show="(form.title_srb.$dirty || form.$submitted) && form.title_srb.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.title_srb.$dirty || form.$submitted) && form.title_srb.$error.maxlength">
                                            {{ trans('book.title_srb_maxlength') }}
                                        </span>
                            </div>
                        </div>
              

                        <div class="form-group">
                            <label for="discription_short" class="col-sm-4 control-label">Description Short</label>
                            <div class="controls col-sm-8" >
                            <textarea  rows="2" cols="25"  form="form"
                                      id="discription_short"
                                      name="discription_short"
                                      placeholder="Description short"
										                  required
                                      ng-model="book_create.discription_short"
                                      ng-minlength="2"
                                      ng-maxlength="32767"
                                      class="form-control"></textarea>
                                <span class="text-danger"
                                      ng-show="(form.discription_short.$dirty || form.$submitted) && form.discription_short.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.discription_short.$dirty || form.$submitted) && form.discription_short.$error.minlength">
                                            {{ trans('book.discription_short_minlength') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.discription_short.$dirty || form.$submitted) && form.discription_short.$error.maxlength">
                                            {{ trans('book.discription_short_maxlength') }}
                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discription_long" class="col-sm-4 control-label">Description Long</label>
                            <div class="controls col-sm-8" >
                            <textarea  rows="2" cols="25"  form="form"
                                      id="discription_long"
                                      name="discription_long"
                                      placeholder="Description Long"
										                  required
                                      ng-model="book_create.discription_long"
                                      ng-minlength="3"
                                      ng-maxlength="65535"
                                      class="form-control"></textarea>
                                <span class="text-danger"
                                      ng-show="(form.discription_long.$dirty || form.$submitted) && form.discription_long.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.discription_long.$dirty || form.$submitted) && form.discription_long.$error.minlength">
                                            {{ trans('book.discription_long_minlength') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.discription_long.$dirty || form.$submitted) && form.discription_long.$error.maxlength">
                                            {{ trans('book.discription_long_maxlength') }}
                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="autor" class="col-sm-4 control-label">Author</label>
                            <div class="controls col-sm-8">
                                <input id="autor"
                                       name="autor"
                                       type="text"
                                       placeholder="Author"
										                   required
                                       ng-model="book_create.auhtor"
                                       ng-minlength="3"
                                       ng-maxlength="512"
                                       class="form-control">
                                <span class="text-danger"
                                      ng-show="(form.auhtor.$dirty || form.$submitted) && form.auhtor.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.auhtor.$dirty || form.$submitted) && form.auhtor.$error.minlength">
                                            {{ trans('book.auhtor_minlength') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.auhtor.$dirty || form.$submitted) && form.auhtor.$error.maxlength">
                                            {{ trans('book.auhtor_maxlength') }}
                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">Price</label>
                            <div class="controls col-sm-8">
                                <input id="price"
                                       name="price"
                                       type="number"
                                       placeholder="Price"
										                    required
                                       ng-model="book_create.price"
                                       [ng-min="1" ]
                                       [ng-max="100000" ]
                                       class="form-control">
                                <span class="text-danger"
                                      ng-show="(form.price.$dirty || form.$submitted) && form.price.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.price.$dirty || form.$submitted) && form.price.$error.minlength">
                                            {{ trans('book.price_min') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.price.$dirty || form.$submitted) && form.price.$error.maxlength">
                                            {{ trans('book.price_max') }}
                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="page_num" class="col-sm-4 control-label">Page number</label>
                            <div class="controls col-sm-8">
                                <input id="page_num"
                                       name="page_num"
                                       type="number"
                                       placeholder="Page Number"
									                     required
                                       ng-model="book_create.page_num"
                                       [ng-min="1" ]
                                       [ng-max="10000" ]
                                       class="form-control" >
                                <span class="text-danger"
                                      ng-show="(form.page_num.$dirty || form.$submitted) && form.page_num.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.page_num.$dirty || form.$submitted) && form.page_num.$error.minlength">
                                            {{ trans('book.page_num_min') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.page_num.$dirty || form.$submitted) && form.page_num.$error.maxlength">
                                            {{ trans('book.page_num_max') }}
                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deadline" class="col-sm-4 control-label">Deadline</label>
                            <div class="controls col-sm-8">
                                <input id="deadline"
                                       name="deadline"
                                       type="text"
                                       placeholder="Deadline"
                                       required
                                       ng-model="book_create.deadline"
                                       ng-minlength="4"
                                       ng-maxlength="32"
                                       class="form-control">
                                <span class="text-danger"
                                      ng-show="(form.deadline.$dirty || form.$submitted) && form.deadline.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.deadline.$dirty || form.$submitted) && form.deadline.$error.minlength">
                                            {{ trans('book.deadline_minlength') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.deadline.$dirty || form.$submitted) && form.deadline.$error.maxlength">
                                            {{ trans('book.deadline_maxlength') }}
                                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pdf" class="col-sm-4 control-label">Pdf</label>
                            <div class="col-sm-8">
                                <input  type="text"
                                        name="book_pdf"
                                        id="book_pdf" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_cover" class="col-sm-4 control-label">Book cover</label>
                            <div class="controls col-sm-8">
                                <input id="book_cover"
                                       name="book_cover"
                                       type="text"
                                       placeholder="Book Cover"
                                       required
                                       ng-model="book_create.book_cover"
                                       ng-minlength="4"
                                       ng-maxlength="32"
                                       class="form-control">
                                <span class="text-danger"
                                      ng-show="(form.book_cover.$dirty || form.$submitted) && form.book_cover.$error.required">
                                            {{ trans('book.required') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.book_cover.$dirty || form.$submitted) && form.book_cover.$error.minlength">
                                            {{ trans('book.book_cover_minlength') }}
                                        </span>
                                <span class="text-danger"
                                      ng-show="(form.book_cover.$dirty || form.$submitted) && form.book_cover.$error.maxlength">
                                            {{ trans('book.book_cover_maxlength') }}
                                        </span>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                         <button type="submit" class="btn btn-primary" value="book" 
                                >Create
                        </button><!--  ng-disabled="!edit||form.$invalid||exist==true" -->
                        <a ng-href="#/books"><button type="button" class="btn btn-success">Back</button></a>

                    </div>
                </form>
            </div>
        </div>
</div>

</div>
</div>
