<div  class="col-md-4 col-md-offset-4">
    <fieldset ng-controller="SignInCtrl">
        <legend>{{ trans('login.loginform') }}</legend>
        <form name="form" id="sign-in-form"
              ng-submit="submit()"
              autocomplete="off"
              novalidate>
            <div class="form-group">
                <label for="email">{{ trans('login.email') }}</label>
                <input required
                       type="email"
                       name="email"
                       id="email"
                       class="form-control"
                       ng-model="email"
                       placeholder="Email">
                <span class="text-danger"
                      ng-show="(form.email.$dirty || form.$submitted) && form.email.$error.required">
                        {{ trans('login.required') }}
                    </span>
                <span class="text-danger"
                      ng-show="(form.email.$dirty || form.$submitted) && form.email.$error.email">
                        {{ trans('login.invalid_email') }}
                    </span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('login.password') }}</label>
                <input required
                       type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       placeholder="Password"
                       ng-model="password">
                <span class="text-danger"
                      ng-show="(form.password.$dirty || form.$submitted) && form.password.$error.required">
                        {{ trans('login.required') }}
                    </span>
            </div>
            <div class="form-group">
                <button id="submit" type="submit"
                        value="submit"
                        ng-disabled="form.$invalid"
                        class="btn btn-lg btn-primary btn-block">{{ trans('login.login') }}
                </button>
            </div>
        </form>
        <hr/>
        <div class="text-right">
            <a href='#/forgot-password'>{{ trans('login.forgotpass') }}</a>
        </div>
    </fieldset>
</div>

