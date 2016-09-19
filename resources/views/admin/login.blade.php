<fieldset ng-controller="SignInCtrl">
    <legend>Login</legend>
    <form name="form" id="sign-in-form" ng-submit="submit()" novalidate
          autocomplete="off">
        <div class="form-group">
            <label for="email">Email</label>
            <input required
                   type="email"
                   name="email"
                   id="email"
                   class="form-control"
                   ng-model="email"
                   placeholder="Email">
            <span class="text-danger"
                  ng-show="(form.email.$dirty || form.$submitted) && form.email.$error.required">
                {{ trans('admin.required') }}
            </span>
            <span class="text-danger"
                  ng-show="(form.email.$dirty || form.$submitted) && form.email.$error.email">
                {{ trans('admin.invalid_email') }}
            </span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input required
                   type="password"
                   name="password"
                   id="password"
                   class="form-control"
                   placeholder="Password"
                   ng-model="password">
            <span class="text-danger"
                  ng-show="(form.password.$dirty || form.$submitted)&& form.password.$error.required">
                {{ trans('admin.required') }}
            </span>
        </div>
        <div class="form-group">
            <button id="submit"
                    type="submit"
                    value="submit"
                    class="btn btn-lg btn-primary btn-block"
                    ng-disabled="form.$invalid">Login
            </button>
        </div>
    </form>
</fieldset>
