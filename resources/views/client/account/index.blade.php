@extends('layouts.front-layout')

@section('page-title', 'Register')

@section('content')


    <div id="content" class="pt30 pb30">
        <div class="container">

            <div class="row mt20">
                <div class="col-sm-12">
                    <ul class="pagination pull-right">
                        <li class="active"><a href="{{ route("account.index") }}">My account</a></li>
                        <li><a href="{{ route("account.bookings") }}">Booking history</a></li>
                    </ul>
                </div>
            </div>
            <fieldset>
                <legend>My account</legend>
                <div class="row">
                    <form method="post" action="/account" role="form" class="ajax-form">
                        <div class="alert alert-success" style="display:none;"></div>
                        <div class="alert alert-danger" style="display:none;"></div>
                        <input type="hidden" name="signup_type" value="complete">
                        <div class="col-sm-6">

                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Firstname *</label>
                                <div class="col-lg-9">
                                    <input type="text" required class="form-control" name="firstname"
                                        value="{{ auth()->user()->first_name }}">
                                    <div class="field-notice" rel="firstname"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Lastname *</label>
                                <div class="col-lg-9">
                                    <input type="text" required class="form-control" name="lastname"
                                        value="{{ auth()->user()->last_name }}">
                                    <div class="field-notice" rel="lastname"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Membership Number</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly class="form-control" name="membership_number"
                                        value="{{ auth()->user()->member_ship_number }}">
                                    <div class="field-notice" rel="membership_number"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">E-mail *</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ auth()->user()->email }}">
                                    <div class="field-notice" rel="email"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">New password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" name="password" value="">
                                    <div class="field-notice" rel="password"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Confirm password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" name="password_confirm" value="">
                                    <div class="field-notice" rel="password_confirm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Address *</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="address" required
                                        value="{{ auth()->user()->address }}">
                                    <div class="field-notice" rel="address"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Post code *</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="postcode" required
                                        value="{{ auth()->user()->post_code }}">
                                    <div class="field-notice" rel="postcode"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">City *</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="city" required
                                        value="{{ auth()->user()->city }}">
                                    <div class="field-notice" rel="city"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Country *</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="country" required
                                        value="{{ auth()->user()->country }}">
                                    <div class="field-notice" rel="country"></div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Mobile</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="mobile"
                                        value="{{ auth()->user()->mobile }}">
                                    <div class="field-notice" rel="mobile"></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <i class="text-muted"> * Required field </i><br>
                                    <a href="#" class="btn btn-primary sendAjaxForm"
                                        >
                                        <i class="fa fa-power-off"></i>
                                        Update</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>


@endsection
