@extends('backend/masteradmin')

@section('title')
LaraCommerce Yasin - Login
@endsection

@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#">LaraCommerce Yasin</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new LaraCommerce</p>

    <form action="/administrator/doregister" method="post">
        {{ csrf_field() }}
      <div class="form-group has-feedback">
        <select class="form-control" name="groupadmin" required>
            <option value="">--Pilih Group--</option>
            @foreach ($usergroup as $usergroups)
              <option value="{{$usergroups->id}}">{{$usergroups->namagroup}}</option>
            @endforeach

        </select>
        @if($errors->has('groupadmin'))
          <p>{{ $errors->first('groupadmin') }}</p>
        @endif
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if($errors->has('password'))
          <p class="text-danger">{{ $errors->first('password') }}</p>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        @if($errors->has('confirm_password'))
          <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>

        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <a href="/administrator" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection
