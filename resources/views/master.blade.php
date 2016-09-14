<!DOCTYPE html>
<html ng-app="uiApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Medical Books</title>

</head>
<body ng-controller="HomeCtrl" ng-cloak>

<div ng-if="isAuthenticated()" ng-init="init()"></div>
<div class="row">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Brand and toggle get grouped for better mobile display -->
            <a href="#/dashboard" class="navbar-brand"  ng-if="isAuthenticated()">[[user.company_rel.name]]</a>


            <a href="" ng-if="isAuthenticated()" class="show-menu navbar-brand" ng-controller="HomeCtrl" ng-click="changeClass()">Meni</a>

            <div class="profile-signIn-signOut">
                <ul class="nav navbar-nav navbar-right">
                    <li  ng-click="changeProfileClass()" ng-if="isAuthenticated()"><a href="#/profile">{{ trans('master.profile') }}</a></li>
                    <li ng-if="isAuthenticated()"><a href="#/signOut">{{ trans('master.signout') }}</a></li>
                </ul>
            </div>
        </div>

    </div>


    <div class="col-lg-2-5 col-md-3  col-sm-6 col-xs-12 side-menu" ng-if="isAuthenticated()">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="main-menu">
                    <ul class="nav navbar-nav">
                        <li ng-if="isAuthenticated()"><a href="#/dashboard">{{ trans('master.dashboard') }}</a></li>
                        <li class="dropdown" ng-if='isAdmin()'>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-building"></i> {{ trans('master.company') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/admin/company"><i class="fa fa-book"></i> {{ trans('master.companydata') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/company-vehicle-groups-list"><i
                                            class="fa fa-object-group"></i> {{ trans('master.vehiclegroups') }}</a>
                                </li>
                                <li ng-click="changeClass()"><a href="#/admin/company-vehicle-group-create"><i
                                            class="fa fa-plus"></i> {{ trans('master.newgroup') }}</a></li>
                                <li role="separator" class="divider"></li>
                                <li ng-click="changeClass()"><a href="#/admin/employees"><i
                                            class="fa fa-users"></i> {{ trans('master.allemployees') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/new_employee"><i
                                            class="fa fa-user-plus"></i> {{ trans('master.newemployee') }}</a></li>
                            </ul>
                        </li>
                        <li ng-if='isAdmin()||isDispatcher()'>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-car"></i> {{ trans('master.vehicles') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-if='isAdmin()' ng-click="changeClass()"><a href="#/admin/vehicles"><i class="fa fa-book"></i> {{ trans('master.allvehicles') }}</a></li>
                                <li ng-if='isAdmin()' ng-click="changeClass()"><a href="#/admin/create_vehicle"><i
                                            class="fa fa-plus"></i> {{ trans('master.newvehicle') }}</a></li>
                                <li role='separator' class="divider" ng-click="changeClass()"></li>
                                <li ng-if='isAdmin()||isDispatcher()' ng-click="changeClass()"><a href="#/vehicle-reservations"><i
                                            class="fa fa-car"></i> {{ trans('master.reservedvehicles') }}</a></li>
                                <li ng-if="isAdmin()||isDispatcher()" ng-click="changeClass()"><a href="#/vehicle-available"><i
                                            class="fa fa-braille"></i> {{ trans('master.availablevehicles') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li ng-if='isAdmin()'>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"><i class="fa fa-car"></i> {{ trans('master.tyres') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-if='isAdmin()' ng-click="changeClass()"><a href="#/admin/tyre" ><i
                                            class="fa fa-car"></i> {{ trans('master.alltyres') }}</a></li>
                                <li role='separator' class="divider"></li>
                                <li ng-if='isAdmin()' ng-click="changeClass()"><a href="#/admin/tyre/create"><i
                                            class="fa fa-plus"></i> {{ trans('master.newtyre') }}</a></li>
                            </ul>
                        </li>
                        <li ng-if="isAdmin()">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-book"></i> {{ trans('master.insurances') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/insurance/all/"><i class="fa fa-book"></i> {{ trans('master.allinsurances') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/insurance/new/"><i
                                            class="fa fa-plus"></i> {{ trans('master.newinsurance') }}</a></li>
                            </ul>
                        </li>
                        <li ng-if="isAdmin()">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-book"></i> {{ trans('master.attestations') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/attestation/all/"><i class="fa fa-book"></i> {{ trans('master.allattestations') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/attestation/new/"><i
                                            class="fa fa-plus"></i> {{ trans('master.newattestation') }}</a></li>
                            </ul>
                        </li>
                        <li ng-if="isAdmin()||isDispatcher()||isUser()" role="presentation" ng-click="changeClass()"><a
                                href="#/vehicle-reservation"><i
                                    class="fa fa-bus"></i> {{ trans('master.reservation') }}</a></li>
                        <li ng-if="isAdmin()">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-car"></i> {{ trans('vehicleservices.service') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/admin/vehicle-services-list"><i class="fa fa-book"></i> {{ trans('vehicleservices.information') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/vehicle-services-create"><i
                                            class="fa fa-plus"></i> {{ trans('vehicleservices.newservice') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li ng-if="isAdmin()">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-car"></i> {{ trans('vehicletyres.tyrerepl') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/admin/vehicle-tyre-list"><i class="fa fa-book"></i> {{ trans('vehicletyres.informations') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/vehicle-tyre-create"><i
                                            class="fa fa-plus"></i> {{ trans('vehicletyres.newtyre') }}</a></li>
                            </ul>
                        </li>

                        <li ng-if="isAdmin()">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ambulance"></i>
                                {{ trans('firstaid.firstaid') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/admin/first-aid-list"><i class="fa fa-book"></i> {{ trans('firstaid.information') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/first-aid-create"><i
                                            class="fa fa-plus"></i> {{ trans('firstaid.newfirstaid') }}</a></li>
                            </ul>
                        </li>


                        <li ng-if="isAdmin()">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-fire-extinguisher"></i> {{ trans('master.fireextinguishers') }} <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/fireextinguisher/all/"><i class="fa fa-fire-extinguisher"></i> {{ trans('master.allfireextinguishers') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/fireextinguisher/new/"><i
                                            class="fa fa-plus"></i> {{ trans('master.newfireextinguisher') }}</a></li>
                            </ul>
                        </li>
                        <li ng-if="isAdmin()">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-bell"></i> {{ trans('master.alerts') }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ng-click="changeClass()"><a href="#/admin/alert_atest_edit"><i
                                            class="fa fa-plus"></i> {{ trans('master.alertattest') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/alert_insurance_edit"><i
                                            class="fa fa-plus"></i> {{ trans('master.alertinsurance') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/alert_service_edit"><i
                                            class="fa fa-plus"></i> {{ trans('master.alertservice') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/alert_tyre_edit"><i
                                            class="fa fa-plus"></i> {{ trans('master.alerttyre') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/alert_first_aid_edit"><i
                                            class="fa fa-plus"></i> {{ trans('master.alertfirstaid') }}</a></li>
                                <li ng-click="changeClass()"><a href="#/admin/alert_fire_extinguisher_edit"><i
                                            class="fa fa-plus"></i> {{ trans('master.alertfireextinguisher') }}</a></li>
                            </ul>
                        </li>
                        <li ng-click="changeClass()">
                            <a href="#/send_mail" role="button" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-envelope-o"></i> {{ trans('send_mail.sendmail') }}</a>
                        </li>
                        <li ng-click="changeClass()">
                            <a href="#/date-format" role="button" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-calendar"></i> {{ trans('date_format.dateformat') }}</a>
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div class="col-lg-9-5 col-md-12 col-sm-12 col-xs-12" ng-if="isAuthenticated()">

        <div class="mainInput">

            <div ui-view></div>
        </div>
    </div>
</div>


<div class="col-lg-12" ng-if="!isAuthenticated()">

    <div class="mainInput">

        <div ui-view></div>
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

<script src="{{ URL::asset("app/scripts/app.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/SignInCtrl.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/SignOutCtrl.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/HomeCtrl.js") }}"></script>
<script src="{{ URL::asset("app/scripts/controllers/FrontendCtrl.js") }}"></script>
</script>
</body>
</html>