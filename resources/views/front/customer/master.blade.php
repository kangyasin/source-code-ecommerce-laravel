<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('title')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

<style media="screen">
h1, h2, h3, h4, h5, h6 { font-weight: 600; color: #301c1e; font-family: 'Hind Siliguri', sans-serif; margin: 0px 0px 15px 0px; letter-spacing: 1.6px; text-transform: uppercase; }
a { text-decoration: none; color: #301c1e; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; transition: all 0.3s; }
a:focus, a:hover { text-decoration: none; color: #f25b6a; }
/*------------------------
Account
--------------------------*/
.account-holder { border: 1px solid #ededed; padding: 30px; }
.social-btn { margin-bottom: 20px; }
.fb-btn { border: 1px solid #ededed; padding: 7px 18px; display: inline-block; color: #3a549e; font-size: 14px; margin-bottom: 20px; }
.fb-btn-text { padding-left: 8px; font-size: 14px; text-transform: uppercase; letter-spacing: 1.6px; color: #301c1e; font-weight: 700; }
.google-btn { border: 1px solid #ededed; padding: 7px 18px; display: inline-block; color: #f04c42; font-size: 14px; margin-left: 10px; }
.google-btn-text { padding-left: 8px; font-size: 14px; text-transform: uppercase; letter-spacing: 1.6px; color: #301c1e; font-weight: 700; }
.forgot-password { color: #f25b6a; text-transform: uppercase; font-size: 12px; font-weight: 700; display: block; margin-bottom: 16px; }




.btn { font-family: 'Hind Siliguri', sans-serif; font-size: 15px; text-transform: uppercase; font-weight: 600; padding: 14px 24px; margin-bottom: 4px; letter-spacing: 2.2px; border-radius: 0px; line-height: 1.6; border: transparent; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; transition: all 0.3s; word-wrap: break-word; white-space: normal !important; }
.btn-primary { background-color: #f25b6a; color: #fff; }
.btn-primary:hover { background-color: #e14e5c; color: #fff; }


/*-----------------------
 Form Elements:
-------------------------*/
label { }
.control-label { font-size: 14px; text-transform: uppercase; letter-spacing: 1px; color: #301c1e; margin-bottom: 10px; }
.form-control:focus { }
.textarea.form-control { }
.required { }

.form-control { border-radius: 0px; text-transform: capitalize; color: #aca5a5; font-size: 12px; font-weight: 500; width: 100%; height: 50px; padding: 14px; line-height: 1.42857143; background-image:; border: transparent; background-color: #f1f1f1; letter-spacing: 1px; margin-bottom: 10px; text-transform: uppercase; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); }
.input-group { position: relative; display: table; border-collapse: separate; }
input[type=checkbox], input[type=radio] { margin: 8px 0 0; margin-top: 1px\9; line-height: normal; }
input::-webkit-input-placeholder { color: #595857 !important; }
textarea::-webkit-input-placeholder { color: #595857 !important; }
</style>

</head>
<body>
	@if(auth('customer')->check())
	{{auth('customer')->user()}}</br>
	ini email customer : {{auth('customer')->user()->email}}
	@endif

@yield('content')

<footer>
  <div class="space-medium" style="margin-top:40px; margin-bottom:20px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-left" style="padding-top:20px;">

            © 2018, Kang Yasin

        </div>
        <div class="col-md-6 text-right">
          <div class="fb-btn">
              <i class="fa fa-facebook-official"></i>
          </div>
          <div class="google-btn">
              <i class="fa fa-google"></i>
          </div>
          <div class="google-btn">
              <i class="fa fa-instagram"></i>
          </div>

        </div>
      </div>
    </div>
  </div>
</footer>
<!-- jQuery Plugins -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
