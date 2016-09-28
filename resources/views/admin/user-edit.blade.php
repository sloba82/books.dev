<div ng-controller="UserCtrl">
    <div ng-init="getUser()">
        <div class="grid-title no-border">
            <h4>User: <span class="semi-bold">[[oldusername]]</span></h4>
        <form name="form" id='form' ng-submit="updateUserAdmin()" autocomplete="off" novalidate>
            <fieldset ng-disabled="!edit">
                <div>
                    <input type="hidden" name="_method" value="PUT">
                    <label for="username">Email/Username</label>
                    <div>
                        <input type="email"
                               id="username"
                               name="username"
                               class="form-control"
                               required
                               placeholder="example@mail.com"
                               ng-model="selected_user.username"
                               ng-maxlength="32">
                        <span class="text-danger"
                              ng-show="(form.username.$dirty || form.$submitted) && form.username.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.username.$dirty || form.$submitted) && form.username.$error.email">
                                            {{ trans('user.invalid_email') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.username.$dirty || form.$submitted) && form.username.$error.maxlength">
                                            {{ trans('user.username_maxlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="exist==true">
                                            {{ trans('user.email_exists') }}
                                        </span>
                    </div>
                </div>
                <div>
                    <label for="first_name">First name</label>
                    <div>
                        <input id="first_name"
                               name="first_name"
                               type="text"
                               placeholder="First name"
                               class="form-control"
                               required
                               ng-model="selected_user.first_name"
                               ng-minlength="2"
                               ng-maxlength="16">
                        <span class="text-danger"
                              ng-show="(form.first_name.$dirty || form.$submitted) && form.first_name.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.first_name.$dirty || form.$submitted) && form.first_name.$error.minlength">
                                            {{ trans('user.first_name_minlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.first_name.$dirty || form.$submitted) && form.first_name.$error.maxlength">
                                            {{ trans('user.first_name_maxlength') }}
                                        </span>
                    </div>
                </div>
                <div>
                    <label for="last_name">Last name</label>
                    <div class="controls">
                        <input id="last_name"
                               name="last_name"
                               type="text"
                               placeholder="Last name"
                               class="form-control"
                               required
                               ng-model="selected_user.last_name"
                               ng-minlength="2"
                               ng-maxlength="32">
                        <span class="text-danger"
                              ng-show="(form.last_name.$dirty || form.$submitted) && form.last_name.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.last_name.$dirty || form.$submitted) && form.last_name.$error.minlength">
                                            {{ trans('user.last_name_minlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.last_name.$dirty || form.$submitted) && form.last_name.$error.maxlength">
                                            {{ trans('user.last_name_maxlength') }}
                                        </span>
                    </div>
                </div>
                <div>
                    <label for="address">Address</label>
                    <div class="controls">
                        <input id="address"
                               name="address"
                               type="text"
                               placeholder="Address"
                               class="form-control"
                               required
                               ng-model="selected_user.address"
                               ng-minlength="8"
                               ng-maxlength="32">
                        <span class="text-danger"
                              ng-show="(form.address.$dirty || form.$submitted) && form.address.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.address.$dirty || form.$submitted) && form.address.$error.minlength">
                                            {{ trans('user.address_minlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.address.$dirty || form.$submitted) && form.address.$error.maxlength">
                                            {{ trans('user.address_maxlength') }}
                                        </span>
                    </div>
                </div>
                <div>
                    <label for="city">City</label>
                    <div class="controls">
                        <input id="city"
                               name="city"
                               type="text"
                               placeholder="City"
                               class="form-control"
                               required
                               ng-model="selected_user.city"
                               ng-minlength="2"
                               ng-maxlength="16">
                        <span class="text-danger"
                              ng-show="(form.city.$dirty || form.$submitted) && form.city.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.city.$dirty || form.$submitted) && form.city.$error.minlength">
                                            {{ trans('user.city_minlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.city.$dirty || form.$submitted) && form.city.$error.maxlength">
                                            {{ trans('user.city_maxlength') }}
                                        </span>
                    </div>
                </div>
                <div>
                    <label for="medical_institution">Medical Institution</label>
                    <div class="controls">
                        <input id="medical_institution"
                               name="medical_institution"
                               type="text"
                               placeholder="Medical Institution"
                               class="form-control"
                               required
                               ng-model="selected_user.medical_institution"
                               ng-minlength="8"
                               ng-maxlength="16">
                        <span class="text-danger"
                              ng-show="(form.medical_institution.$dirty || form.$submitted) && form.medical_institution.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.medical_institution.$dirty || form.$submitted) && form.medical_institution.$error.minlength">
                                            {{ trans('user.medical_institution_minlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.medical_institution.$dirty || form.$submitted) && form.medical_institution.$error.maxlength">
                                            {{ trans('user.medical_institution_maxlength') }}
                                        </span>
                    </div>
                </div>
                <div>
                    <label for="role">Role</label>
                    <div class="controls">
                        <select name="role"
                                id="role"
                                required
                                class="form-control"
                                ng-model="selected_user.role">
                            <option value="">Choose one..</option>
                            <option ng-selected="selected_user.role==1" value="1">Admin</option>
                            <option ng-selected="selected_user.role==2" value="2">User</option>
                        </select>
                        <span class="text-danger"
                              ng-show="(form.role.$dirty || form.$submitted) && form.role.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                    </div>
                </div>
                <div ng-if="user.id != selected_user.id">
                    <label for="user_active">

                        <input id="user_active" ng-model="selected_user.active" type="radio"
                               name="active" ng-true-value="1" ng-value="1">
                        Active
                    </label>
                </div>
                <div ng-if="user.id != selected_user.id">
                    <label for="user_inactive">
                        <input id="user_inactive" ng-model="selected_user.active" type="radio"
                               name="active" ng-true-value="0" ng-value="0">
                        Blocked
                    </label>
                </div>
            </fieldset>
            <div>
                <button type="button" ng-click="setEdit()" class="btn btn-default">Edit</button>
                <button type="submit" class="btn btn-primary"
                        ng-disabled="!edit||form.$invalid||exist==true">Update
                </button>
                <a ng-href="#/users"><button type="button" class="btn btn-success">Back</button></a>
            </div>
        </form>
    </div>
</div>

