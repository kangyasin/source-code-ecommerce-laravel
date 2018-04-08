@extends('front.customer.master')
@section('title')
LaraCommerce - Yasin : Login or Register
@endsection

@section('content')
<div class="space-medium">
        <div class="container">
            <div class="row">
							<div class="col-md-12 text-center" style="margin-top:20px; margin-bottom:20px;">
									<a href="/"><img src="{{asset('img/logo.png')}}"/></a><br/>
									<h3>DAFTAR DI LARACOMMERCE YASIN</h3>
							</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-holder">
                         <!--login-form-->
                        <h3>Login to Today’s Fashion</h3>
                        <br>
                        <div class="social-btn">
                            <h6>Sign in With</h6>
                            <div class="fb-btn">
                                <i class="fa fa-facebook-official"></i><a href="#" class="fb-btn-text">facebook</a>
                            </div>
                            <div class="google-btn">
                                <i class="fa fa-google"></i><a href="#" class="google-btn-text">Google</a>
                            </div>
                        </div>
                        <div class="row">
                            <form action="/customer/login" method="post">
															{{ csrf_field() }}
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="email">Email<sup style="color:red">*</sup></label>
                                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="form-control" placeholder="Enter Email Address">
																				@if($errors->has('email'))
																					<p class="text-danger">{{ $errors->first('email') }}</p>
																				@endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="email">Password<sup style="color:red">*</sup></label>
                                        <input id="password" name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="password">
																				@if($errors->has('password'))
																					<p class="text-danger">{{ $errors->first('email') }}</p>
																				@endif
                                    </div>
                                    <a href="/customer/forgotpassword" class="forgot-password">Forgot Password?</a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">

                                            <p>Remember Me?</p>
                                             </label>
														 	</form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <!--/.login-form-->
                      <!--sing-up-form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-holder">
                        <h3>Signup With Today’s Fashion</h3>
                        <br>
                        <div class="social-btn">
                            <h6>Sign up With</h6>
                            <div class="fb-btn">
                                <i class="fa fa-facebook-official"></i><a href="#" class="fb-btn-text">facebook</a>
                            </div>
                            <div class="google-btn">
                                <i class="fa fa-google"></i><a href="#" class="google-btn-text">Google</a>
                            </div>
                        </div>
                        <div class="row">
                            <form action="/customer/register" method="post">
															{{ csrf_field() }}
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="name"> Name<sup style="color:red">*</sup></label>
                                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Enter Your Name">
																				@if($errors->has('name'))
																					<p class="text-danger">{{ $errors->first('name') }}</p>
																				@endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="email">Email<sup style="color:red">*</sup></label>
                                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="form-control" placeholder="Enter Email Address">
																				@if($errors->has('email'))
																					<p class="text-danger">{{ $errors->first('email') }}</p>
																				@endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="password">Password<sup style="color:red">*</sup></label>
                                        <input id="password" name="password" type="password" value="{{ old('password') }}" class="form-control" placeholder="password">
																				@if($errors->has('password'))
																					<p class="text-danger">{{ $errors->first('password') }}</p>
																				@endif
                                    </div>
																</div>
																<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="password">Password<sup style="color:red">*</sup></label>
                                        <input id="password" name="confirm_password" type="password" class="form-control" placeholder="password">
																				@if($errors->has('confirm_password'))
																					<p class="text-danger">{{ $errors->first('confirm_password') }}</p>
																				@endif
                                    </div>
                                    <div class="mb30">
                                        <p>Already have an account?   <a href="#">Login</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

        </div>

            </div>
        </div>
  @endsection
