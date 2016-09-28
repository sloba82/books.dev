<div ng-controller="OrderCtrl">
    <div ng-init="getOrder()">
        <div class="grid-title no-border">
            <h4>Order Edit: <span class="semi-bold"></span></h4>
            <form name="form" id='form' ng-submit="updateOrder()" autocomplete="off" novalidate>
                <fieldset ng-disabled="!edit">
                    <div>
                        <input type="hidden" name="_method" value="PUT">
                        <label for="username">Username</label>
                        <div>
                            <select required
                                    id="username"
                                    name="username"
                                    ng-model="selected_order.user.username"
                                    class="form-control"
                                    ng-init="getAllUsers()">
                                <option ng-repeat="user in users"
                                        value="[[user.id]]"
                                        ng-selected="selected_order.user_id==user.id">
                                    [[user.username]]
                                </option>
                                <span class="text-danger"
                                      ng-show="(form.username.$dirty || form.$submitted) && form.username.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="books">Books</label>
                        <div>
                            <select  required
                                     id="book_id"
                                     name="book_id"
                                     ng-model="selected_order.book_id"
                                     class="form-control"
                                     ng-init="getAllBooks()" multiple>
                                <option ng-repeat="book in all_books"
                                        value="[[book.id]]"
                                        ng-selected="all_books.indexof(selected_order.books)">
                                    [[book.title_eng]]
                                </option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="status">Status</label>
                        <div>
                            <select id="status"
                                    name="status"
                                    class="form-control"
                                    required
                                    ng-model="selected_order.status">
                                <option value="">Choose one..</option>
                                <option ng-selected="selected_order.status=='Processing'"
                                        value="Processing">Processing</option>
                                <option ng-selected="selected_order.status=='Production'"
                                        value="Production">Production</option>
                                <option ng-selected="elected_order.status=='Sent'"
                                        value="Sent">Sent</option>
                            </select>
                            <span class="text-danger"
                                  ng-show="(form.books.$dirty || form.$submitted) && form.books.$error.required">
                                                {{ trans('user.required') }}
                            </span>
                        </div>
                    </div>
                </fieldset>
                <div>
                    <button type="button" ng-click="setEdit()" class="btn btn-default">Edit</button>
                    <button type="submit" class="btn btn-primary"
                            ng-disabled="!edit||form.$invalid||exist==true">Update
                    </button>
                    <a ng-href="#/orders"><button type="button" class="btn btn-success">Back</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

