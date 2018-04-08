@extends('front.customer.master')
@section('title')
LaraCommerce - Yasin : Forgot Password
@endsection

@section('content')
<div class="space-medium">
        <div class="container">
            <div class="row">
							<div class="col-md-12 text-center" style="margin-top:20px; margin-bottom:20px;">
									<a href="/"><img src="{{asset('img/logo.png')}}"/></a><br/>
									<h3>ATUR ULANG PASSWORD</h3>
							</div>
                <div class="col-md-12 text-center">
                    <div class="account-holder">
                        <div class="row">
                            <form action="/customer/updatepassword" method="post">
															{{ csrf_field() }}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                    <div class="form-group">
                                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="form-control" placeholder="Enter Email Address">

                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="email" name="password" type="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Email Address">
																				@if($errors->has('password'))
																					<p class="text-danger">{{ $errors->first('password') }}</p>
																				@endif
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input id="email" name="confirm_password" type="password" value="{{ old('confirm_password') }}" class="form-control" placeholder="Enter Email Address">
																				@if($errors->has('confirm_password'))
																					<p class="text-danger">{{ $errors->first('confirm_password') }}</p>
																				@endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                    <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>

            </div>
        </div>
  @endsection
