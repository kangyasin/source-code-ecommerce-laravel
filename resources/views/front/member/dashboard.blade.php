@extends('front/master')

@section('title')
LaraCommerce Yasin - Member Area
@endsection

@section('content')

<style>

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}
.col-md-3{
padding:0 0 0 15px;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-usermenu {
  margin-top: 30px;
  padding:0px !important;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* order Content */
.order-content {
  padding: 20px;
  background: #F6F9FB;
  min-height: 460px;
}
.form_main {
    width: 100%;
}
.form_main h4 {
    font-family: roboto;
    font-size: 20px;
    font-weight: 300;
    margin-bottom: 15px;
    margin-top: 20px;
    text-transform: uppercase;
}
.heading {
    border-bottom: 1px solid #A9A59F;
    padding-bottom: 9px;
    position: relative;
}
.heading span {
    background: #6D6C6A none repeat scroll 0 0;
    bottom: -2px;
    height: 3px;
    left: 0;
    position: absolute;
    width: 75px;
}
.form {
    border-radius: 7px;
    padding: 6px;
}
.txt[type="text"] {
    border: 1px solid #ccc;
    margin: 5px 0;
    padding: 4px 0 4px 5px;
	border-radius:5px;
    width: 80%;
}
.txt[type="password"] {
    border: 1px solid #ccc;
    margin: 5px 0;
    padding: 4px 0 4px 5px;
	border-radius:5px;
    width: 80%;
}
/*.txt2[type="submit"] {
    background: #949390 none repeat scroll 0 0;
    border: 1px solid #949390;
    border-radius: 10px;
    color: #fff;
    font-size: 16px;
    font-style: normal;
    line-height: 35px;
    margin: 10px 0;
    padding: 0;

    width: 12%;
}*/
.txt2:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #949390;
    transition: all 0.5s ease 0s;
}

	</style>


<!-- section -->
	<div class="container">
    <div class="row profile">
			@include('front/member/mastermenu')
			<div class="col-md-9 order-content">

				<div class="form_main col-md-4 col-sm-5 col-xs-7">
					<div class="form">
	          <h4 class="heading"><strong>Informasi </strong> Diri <span></span></h4>

            @if(session('success_profile'))
                 <div class="alert alert-success">
                     {{ session('success_profile') }}
                 </div>
             @endif

             @if(session('error_profile'))
                  <div class="alert alert-danger">
                      {{ session('error_profile') }}
                  </div>
              @endif

	          <form action="/customer/updateprofile" method="post" id="contactFrm" name="contactFrm">
              {!!csrf_field()!!}
							<div class="form-group">
								<label>Nama</label>
	              <input type="text" value="{{$DataCustomer->nama}}" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
	              <input type="email" value="{{$DataCustomer->email}}" name="email" class="form-control">
							</div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" value="{{ old('password') }}" name="password" class="form-control" required>
              </div>
							<button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	          </form><br/><br/>

						<h4 class="heading"><strong>Ubah </strong> Password <span></span></h4>
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
 						<form action="/customer/ubahpassword" method="post" id="contactFrm" name="contactFrm">
              {!!csrf_field()!!}
								<div class="form-group">
									<label>Old Password</label>
		              <input type="password" value="{{ old('current_password') }}" name="current_password" class="form-control" required>
                  @if($errors->has('current_password'))
                    <p class="text-danger">{{ $errors->first('current_password') }}</p>
                  @endif
								</div>
								<div class="form-group">
									<label>New Password</label>
		              <input type="password" value="{{ old('new_password') }}" name="new_password" class="form-control" required>
                  @if($errors->has('new_password'))
                    <p class="text-danger">{{ $errors->first('new_password') }}</p>
                  @endif
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
		              <input type="password" value="{{ old('confirm_password') }}" name="confirm_password" class="form-control" required>
                  @if($errors->has('confirm_password'))
                    <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                  @endif
								</div>
	              <button type="submit" class="btn btn-primary pull-right">Ubah Password</button>
	          </form>
	      </div>
	      </div>

			</div>
		</div>
	</div>
	<!-- /section -->



@endsection
