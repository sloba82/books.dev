<div class="container" ng-controller="ResetPasswordCtrl">
    <div class="row">
        <div class="center">
            <fieldset class="col-lg-4 col-lg-offset-4">
                <legend>{{ trans('passwords.typenew') }}</legend>
                <form name="form" ng-submit="resetPasswordRecovery()" autocomplete="off" novalidate>
                    <input type="hidden" id="secret_token" name="secret_token" required=""
                           value="{{$secret_token}}"/>
                    <div class="form-group">
                        <label for="password">{{ trans('passwords.newpass') }}</label>
                        <input type="password"
                               class="form-control"
                               ng-model="password"
                               required=""
                               id="password"
                               name="password"
                               ng-minlength="5"
                               ng-maxlength="32"
                        />
                        <span class="text-danger"
                              ng-show="(form.password.$dirty || form.$submitted) && form.password.$error.required">
                            {{ trans('auth.required') }}
                        </span>
                        <span class="text-danger"
                              ng-show="(form.password.$dirty || form.$submitted) && form.password.$error.minlength">
                            {{ trans('auth.error_minlength') }}
                        </span>
                        <span class="text-danger"
                              ng-show="(form.password.$dirty || form.$submitted) && form.password.$error.maxlength">
                            {{ trans('auth.error_maxlength') }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="rePass">{{ trans('passwords.retype') }}</label>
                        <input type="password"
                               class="form-control"
                               ng-model="confirm_password"
                               id="rePass"
                               name="rePass"
                               required=""
                        />
                        <span class="text-danger"
                              ng-show="(form.rePass.$dirty || form.$submitted) && form.password.$error.required">
                            {{ trans('auth.required') }}
                        </span>
                        <span class="text-danger"
                              ng-show="(form.rePass.$dirty || form.$submitted) && password!=confirm_password">
                            {{ trans('auth.pass_equal') }}
                        </span>
                    </div>
                    <div class="form-group text-right">
                        <a href="/">{{ trans ('buttons.back') }}</a>
                        <button ng-disabled="form.$invalid"
                                type="submit"
                                class="btn btn-primary">
                            {{ trans('buttons.save') }}
                        </button>
                    </div>

                </form>
            </fieldset>
        </div>
    </div>

</div>