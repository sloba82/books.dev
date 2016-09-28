<div ng-controller="BookCtrl">
    <div>
        <h4>New Book</h4>
    </div>
    <div ng-init="createBook()">
            <div>
                <form name="form" id='form' ng-submit="createBook()" autocomplete="off" novalidate>
                    <fieldset>
                        <div class="form-group">
                            <label for="logo">Image</label>
                            <div>
                                <button data-toggle="modal"
                                        data-target="#upload"
                                        id="btnUpload">
                                    Upload Image
                                </button>
                            </div>
                        </div>
                        <div>
                            <label for="title_eng">Title English</label>
                            <div>
                                <input id="title_eng"
                                       name="title_eng"
                                       type="text"
                                       placeholder="Title English"
                                       class="form-control"
                                       required
                                       ng-model="book_create.title_eng"
                                       ng-maxlength="256">
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
                        <div>
                            <label for="title_srb">Title Serbian</label>
                            <div>
                                <input id="title_srb"
                                       name="title_srb"
                                       type="text"
                                       placeholder="Title Serbian"
                                       class="form-control"
                                       required
                                       ng-model="book_create.title_srb"
                                       ng-maxlength="256">
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
                        <div>
                            <label for="discription_short">Description Short</label>
                            <div class="controls">
                            <textarea rows="4" cols="50" name="comment" form="form"
                                      id="discription_short"
                                      name="discription_short"
                                      placeholder="Description short"
                                      class="form-control"
                                      required
                                      ng-model="book_create.discription_short"
                                      ng-minlength="16"
                                      ng-maxlength="32767"></textarea>
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
                        <div>
                            <label for="discription_long">Description Long</label>
                            <div class="controls">
                            <textarea rows="10" cols="50" name="comment" form="form"
                                      id="discription_long"
                                      name="discription_long"
                                      placeholder="Description Long"
                                      class="form-control"
                                      required
                                      ng-model="book_create.discription_long"
                                      ng-minlength="64"
                                      ng-maxlength="65535"></textarea>
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
                        <div>
                            <label for="auhtor">Author</label>
                            <div class="controls">
                                <input id="author"
                                       name="author"
                                       type="text"
                                       placeholder="Author"
                                       class="form-control"
                                       required
                                       ng-model="book_create.auhtor"
                                       ng-minlength="16"
                                       ng-maxlength="512">
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
                        <div>
                            <label for="price">Price</label>
                            <div class="controls">
                                <input id="price"
                                       name="price"
                                       type="number"
                                       placeholder="Price"
                                       class="form-control"
                                       required
                                       ng-model="book_create.price"
                                       [ng-min="1" ]
                                       [ng-max="100000" ]>
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
                        <div>
                            <label for="page_num">Page number</label>
                            <div class="controls">
                                <input id="page_num"
                                       name="page_num"
                                       type="number"
                                       placeholder="Page Number"
                                       class="form-control"
                                       required
                                       ng-model="book_create.page_num"
                                       [ng-min="1" ]
                                       [ng-max="10000" ]>
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
                        <div>
                            <label for="deadline">Deadline</label>
                            <div class="controls">
                                <input id="deadline"
                                       name="deadline"
                                       type="text"
                                       placeholder="Deadline"
                                       class="form-control"
                                       required
                                       ng-model="book_create.deadline"
                                       ng-minlength="4"
                                       ng-maxlength="32">
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
                            <label for="pdf">PDF</label>
                            <div>
                                <button data-toggle="modal"
                                        data-target="#upload"
                                        id="btnUpload">
                                    Upload Pdf
                                </button>
                            </div>
                        </div>
                        <div>
                            <label for="book_cover">Book cover</label>
                            <div class="controls">
                                <input id="book_cover"
                                       name="book_cover"
                                       type="text"
                                       placeholder="Book Cover"
                                       class="form-control"
                                       required
                                       ng-model="book_create.book_cover"
                                       ng-minlength="4"
                                       ng-maxlength="32">
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
                    <div>
                        <button type="submit" class="btn btn-primary"
                                ng-disabled="!edit||form.$invalid||exist==true">Create
                        </button>
                        <button type="button" class="btn btn-success"><a ng-href="#/books">Back</a></button>

                    </div>
                </form>
            </div>
        </div>
</div>
