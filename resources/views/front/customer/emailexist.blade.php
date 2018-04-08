@extends('front.customer.master')
@section('title')
LaraCommerce - Yasin : Login or Register
@endsection

@section('content')
<style media="screen">
.alert-message
{
	margin: 20px 0;
	padding: 20px;
	border-left: 3px solid #eee;
}
.alert-message h4
{
	margin-top: 0;
	margin-bottom: 5px;
}
.alert-message p:last-child
{
	margin-bottom: 0;
}
.alert-message code
{
	background-color: #fff;
	border-radius: 3px;
}
.alert-message-success
{
	background-color: #F4FDF0;
	border-color: #3C763D;
}
.alert-message-success h4
{
	color: #3C763D;
}
.alert-message-danger
{
	background-color: #fdf7f7;
	border-color: #d9534f;
}
.alert-message-danger h4
{
	color: #d9534f;
}
.alert-message-warning
{
	background-color: #fcf8f2;
	border-color: #f0ad4e;
}
.alert-message-warning h4
{
	color: #f0ad4e;
}
.alert-message-info
{
	background-color: #f4f8fa;
	border-color: #5bc0de;
}
.alert-message-info h4
{
	color: #5bc0de;
}
.alert-message-default
{
	background-color: #EEE;
	border-color: #B4B4B4;
}
.alert-message-default h4
{
	color: #000;
}
.alert-message-notice
{
	background-color: #FCFCDD;
	border-color: #BDBD89;
}
.alert-message-notice h4
{
	color: #444;
}
</style>

<div class="space-medium">
        <div class="container">
            <div class="row">
							<div class="col-md-12 text-center" style="margin-top:20px; margin-bottom:20px;">
									<a href="/"><img src="{{asset('img/logo.png')}}"/></a><br/>
									<h3>DAFTAR DI LARACOMMERCE YASIN</h3>
							</div>
							<div class="col-sm-12 col-md-12">
			            <div class="alert-message alert-message-danger">
										<div class="row">
											<div class="col-md-12">
				                <h3>Email Anda Sudah Terdaftar.</h3>
				                Lanjutkan <strong>Pendaftaran !!</strong>.
											</div>
									</div>
			            </div>
			        </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="account-holder">
                        <div class="row">
                            <form action="/customer/updateregister" method="post">
															{{ csrf_field() }}
															<input type="hidden" name="id" value="{{Request::segment(3)}}"/>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="name"> Name<sup style="color:red">*</sup></label>
                                        <input id="name" name="name" type="text" value="{{$DataCustomer->nama}}" class="form-control" placeholder="Enter Your Name">
																				@if($errors->has('name'))
																					<p class="text-danger">{{ $errors->first('name') }}</p>
																				@endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required" for="email">Email<sup style="color:red">*</sup></label>
                                        <input id="email" name="email" readonly type="text" value="{{$DataCustomer->email}}" class="form-control" placeholder="Enter Email Address">
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
                                        <label class="control-label required" for="password">Confirm Password<sup style="color:red">*</sup></label>
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
