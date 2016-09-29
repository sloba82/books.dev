<div class="col-md-4 col-md-offset-4">
    <fieldset ng-controller="UserCtrl">
        <legend>{{ trans('passwords.forgotpass') }}</legend>
        <form name="form" ng-submit="resetPassword()" autocomplete="off" novalidate>
            <div class="form-group">
                <label for="email">{{ trans('passwords.typeemail') }}</label>
                <input type="email"
                       id="email"
                       name="username"
                       ng-model="reset_email"
                       ng-maxlength="32"
                       required
                       class="form-control"
                       placeholder="{{ trans('passwords.email') }}"/>
                <span class="text-danger"
                      ng-show="(form.username.$dirty || form.$submitted) && form.username.$error.required">
                    {{ trans('passwords.required') }}
                </span>
                <span class="text-danger"
                      ng-show="(form.username.$dirty || form.$submitted) && form.username.$error.email">
                    {{ trans('passwords.invalid_email') }}
                </span>
                <span class="text-danger"
                      ng-show="(form.username.$dirty || form.$submitted) && form.username.$error.maxlength">
                    {{ trans('passwords.error_maxlength') }}
                </span>
            </div>
            <div class="form-group">
                <a href="#/signIn" class="btn btn-default">{{ trans('buttons.back') }}</a>
                <button type="submit" ng-disabled="form.$invalid" class="btn btn-primary">
                    {{ trans('buttons.send') }}
                </button>
            </div>
        </form>
    </fieldset>
</div>



