<!DOCTYPE html>
<html ng-app="uiResetPassword">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Password recovery</title>
</head>
<body ng-controller="ResetPasswordCtrl">


<div class="container">
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


<!-- END CONTAINER -->
<!--[if lt IE 9]>
<script src="bower_components/es5-shim/es5-shim.js"></script>
<script src="bower_components/json3/lib/json3.min.js"></script>
<![endif]-->

<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="{{ URL::asset("app/bower_components/angular/angular.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-resource/angular-resource.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-messages/angular-messages.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-animate/angular-animate.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-strap/dist/angular-strap.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-strap/dist/angular-strap.tpl.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-route/angular-route.js") }}"></script>
<script src="{{ URL::asset("app/bower_components/angular-cookies/angular-cookies.js") }}"></script>

<script src="{{ URL::asset("app/bower_components/ui-router/release/angular-ui-router.js") }}"></script>


<script src="{{ URL::asset("app/lib/satellizer.js") }}"></script>

<script src="{{ URL::asset("app/scripts/resetPassword.js") }}"></script>

</body>
</html>