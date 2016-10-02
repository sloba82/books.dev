<div ng-controller="OrderCtrl">
    <div>
        <div class="grid-title no-border">
            <h4>New Order<span class="semi-bold"></span></h4>
            <form name="form" id='form' ng-submit="createOrder()" autocomplete="off" novalidate>
                    <div>
                        <label for="username">Username</label>
                        <div>
                            <select required
                                    id="username"
                                    name="username"
                                    ng-model="new_order.username"
                                    class="form-control"
                                    ng-init="getAllUsers()">
                                <option value="">Choose one..</option>
                                <option ng-repeat="user in users"
                                        value="[[user.id]]">
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
                                     ng-model="new_order.books"
                                     class="form-control"
                                     ng-init="getAllBooks()"
                                     data-placeholder="Choose one.."
                                     multiple>
                                <option ng-repeat="book in all_books"
                                        value="[[book.id]]">
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
                                    ng-model="new_order.status">
                                <option value="">Choose one..</option>
                                <option value="Processing">Processing</option>
                                <option value="Production">Production</option>
                                <option value="Sent">Sent</option>
                            </select>
                            <span class="text-danger"
                                  ng-show="(form.books.$dirty || form.$submitted) && form.books.$error.required">
                                                {{ trans('user.required') }}
                            </span>
                        </div>
                    </div>
                </fieldset>
                <div>
                    <button type="submit" class="btn btn-primary"
                            ng-disabled="form.$invalid">Create
                    </button>
                    <a ng-href="#/orders"><button type="button" class="btn btn-success">Back</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

