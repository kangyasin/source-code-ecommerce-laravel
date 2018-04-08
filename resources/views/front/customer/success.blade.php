@extends('front.customer.master')
@section('title')
LaraCommerce - Yasin : Konfirmasi Email
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
									<h3>PENDAFTARAN BERHASIL</h3>
							</div>

							<div class="col-sm-12 col-md-12">
			            <div class="alert-message alert-message-warning">
										<div class="row">
											<div class="col-md-6">
				                <h3>{{$DataKonfirmasi['pesan']}}</h3>
				                {!!$DataKonfirmasi['login']!!}
											</div>
											<div class="col-md-6">
												<div class="pull-right" style="vertical-align: text-middle;">
													<a href="/customer" class="primary-btn">Login</a>
												</div>
											</div>
									</div>
			            </div>
			        </div>

        </div>
  	</div>
</div>

@endsection
