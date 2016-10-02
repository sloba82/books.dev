<div ng-controller="UserCtrl">
    <div>
        <h4>New User</h4>
    </div>
    <div>
        <form name="form" id='form' ng-submit="createUserAdmin()" autocomplete="off" novalidate>
            <fieldset>
                <div>
                    <label for="username">Email/Username</label>
                    <div>
                        <input type="email"
                               id="username"
                               name="username"
                               class="form-control"
                               required
                               placeholder="example@mail.com"
                               ng-model="user_create.username"
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
                    <label for="password">Password</label>
                    <div>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               required
                               placeholder="Password"
                               ng-model="user_create.password"
                               ng-minlength="5"
                               ng-maxlength="60">
                        <span class="text-danger"
                              ng-show="(form.password.$dirty || form.$submitted) && form.password.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.password.$dirty || form.$submitted) && form.password.$error.minlength">
                                            {{ trans('user.password_minlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.password.$dirty || form.$submitted) && form.password.$error.maxlength">
                                            {{ trans('user.password_maxlength') }}
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
                               ng-model="user_create.first_name"
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
                               ng-model="user_create.last_name"
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
                               ng-model="user_create.address"
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
                    <label for="phone">Phone #</label>
                    <div class="controls">
                        <input id="phone"
                               name="phone"
                               type="text"
                               placeholder="Phone number"
                               class="form-control"
                               required
                               ng-model="user_create.phone"
                               ng-pattern="^[0-9-/]*$"
                               ng-minlength="9"
                               ng-maxlength="16">
                        <span class="text-danger"
                              ng-show="(form.city.$dirty || form.$submitted) && form.city.$error.required">
                                            {{ trans('user.required') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.city.$dirty || form.$submitted) && form.city.$error.minlength">
                                            {{ trans('user.phone_minlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.city.$dirty || form.$submitted) && form.city.$error.maxlength">
                                            {{ trans('user.phone_maxlength') }}
                                        </span>
                        <span class="text-danger"
                              ng-show="(form.phone.$dirty || form.$submitted) && form.phone.$error.pattern">
                                            {{ trans('user.phone_pattern') }}
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
                               ng-model="user_create.medical_institution"
                               ng-minlength="8"
                               ng-maxlength="64">
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
                    <label for="role">User role</label>
                    <div>
                        <select name="role"
                                id="role"
                                required
                                class="form-control"
                                ng-model="user_create.role"
                                ng-init="getRoles()">
                            <option value="">Choose one..</option>
                            <option ng-repeat="role in roles" value="[[role.id]]">[[role.name]]</option>
                        </select>
                        <span class="text-danger"
                              ng-show="(form.role.$dirty || form.$submitted) && form.role.$error.required">
                                        {{ trans('user.required') }}
                                    </span>
                    </div>
                </div>
                <div>
                    <label for="user_active">

                        <input id="user_active" ng-model="user_create.active" type="radio"
                               name="active" ng-true-value="1" ng-value="1">
                        Active
                    </label>
                </div>
                <div>
                    <label for="user_inactive">
                        <input id="user_inactive" ng-model="user_create.active" type="radio"
                               name="active" ng-true-value="0" ng-value="0">
                        Blocked
                    </label>
                </div>
            </fieldset>
            <div>
                <button class="btn btn" type="reset">Reset</button>
                <button type="submit" ng-disabled="form.$invalid||exist==true" class="btn btn-primary">Create</button>
                <a  ng-href="#/users"><button class="btn btn-success">Back</button></a>
            </div>
        </form>
    </div>
</div>
