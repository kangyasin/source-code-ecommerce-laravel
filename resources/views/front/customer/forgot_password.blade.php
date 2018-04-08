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
                            <form action="/customer/doforgot" method="post">
															{{ csrf_field() }}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                    <div class="form-group">
                                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="form-control" placeholder="Enter Email Address">
																				@if($errors->has('email'))
																					<p class="text-danger">{{ $errors->first('email') }}</p>
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
