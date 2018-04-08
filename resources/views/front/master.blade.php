<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<meta name="description" content="{!!$configshop->webdesc!!}"/>
  <meta name="keywords" content="{!!$configshop->webkeyword!!}"/>

  <meta property="og:title" content="@yield('title')"/>
  <meta property="og:url" content="{{URL::to('/')}}"/>
  <meta property="og:description" content="{!!$configshop->webdesc!!}"/>
  <meta property="og:image" content="{{ URL::to('/').Storage::url($configshop->logo) }}"/>
  <meta property="og:image:secure_url" content="{{ URL::to('/').Storage::url($configshop->logo) }}"/>
  <meta property="og:title" content="@yield('title')"/>
  <meta property="og:site_name" content="{!!$configshop->webtitle!!}"/>
  <meta property="og:type" content="website"/>

  <meta name="twitter:card" content="summary"/>
  <meta name="twitter:title" content="@yield('title')"/>
  <meta name="twitter:description" content="{!!$configshop->webdesc!!}"/>
  <meta name="twitter:image:src" content="{{URL::to('/').Storage::url($configshop->logo)}}"/>
  <meta name="twitter:url" content="{{URL::to('/')}}"/>

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
	<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
	<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style media="screen">
		#loading-div-background
	{
			display:none;
			position:fixed;
			top:0;
			left:0;
			background:black;
			opacity: 0.9;
			width:100%;
			height:100%;
			z-index: 999;
	 }

#loading-div
	{
			 text-align:center;
			 position:absolute;
			 left: 50%;
			 top: 50%;
			 margin-top: -50px;
  	 	margin-left: -100px;
	 }
		</style>

</head>

<div id="loading-div-background" class="loading">
		<div id="loading-div">
			<img style="height:80px;margin:30px;" src="http://gurubesar.kopertis4.or.id/assets/img/loading.gif" alt="Loading.."/>
		 </div>
</div>

<?php
$uri1 = Request::segment(1);

if($uri1 <> ''){
	$clashow = 'show-on-click';
}else{
	$clashow = '';
}

?>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>{{$configshop->webtitle}}</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">About</a></li>
						<li><a href="#">FAQ</a></li>

						<!-- <li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="/">
							<img src="{{ Storage::url($configshop->logo) }}" alt="{{$configshop->webtitle}}">
						</a>
					</div>
					<!-- /Logo -->
					<!-- Search -->



					<div class="header-search">
						<form>
							<input id="auto" name="auto" class="input search-input" type="text" placeholder="Enter your keyword">

							<select class="input search-categories">
								<option value="0">All Categories</option>
								@foreach ($category as $categorys)

								<option value="{{$categorys->id}}">{{$categorys->namacategory}}</option>
								@endforeach
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>

					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<?php $member = auth('customer')->user();?>
						@if($member)
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">{{$member->nama}} <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="/customer/logout" class="text-uppercase">Logout</a>
							<ul class="custom-menu">
								<li><a href="/customer/dashboard"><i class="fa fa-user"></i> Dashboard</a></li>
								<li><a href="/customer/alamat"><i class="fa fa-home"></i> Alamat</a></li>
								<li><a href="/customer/transaksi"><i class="fa fa-shopping-cart"></i> Transaksi</a></li>
							</ul>
						</li>
						<!-- /Account -->
						@else
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="/customer" class="text-uppercase">Login</a>/<a href="/customer" class="text-uppercase">Join</a>
							<ul class="custom-menu">
								<li><a href="/customer"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="/customer"><i class="fa fa-user-plus"></i> Create An Account</a></li>
							</ul>
						</li>
						<!-- /Account -->
						@endif
						<!-- session variabel cart ---->

						<?php
						if(Session::get('cart.items')){
							$totbayar =0;
							foreach (Session::get('cart.items') as $key => $value) {
								$totbayar += $value['price'];
							}

						?>

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">{{count(Session::get('cart.items'))}}</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>{{number_format($totbayar)}}</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">

											@foreach(Session::get('cart.items') as $item )
												<div class="product product-widget">
													<div class="product-thumb">
														<img src="{{$item['image']}}" alt="{{$item['name']}}">
													</div>
													<div class="product-body">
														<h3 class="product-price">{{number_format($item['price'])}} <span class="qty">x {{$item['qty']}}</span></h3>
														<h2 class="product-name"><a href="#">{{ str_limit($item['name'], 25) }}</a></h2>
													</div>
													<a href="/cart/destroy/{{$item['id']}}" class="cancel-btn"><i class="fa fa-trash"></i></a>
												</div>
											@endforeach
									</div>
									<div class="shopping-cart-btns" style="z-index:999;">
										<!-- <button class="main-btn">View Cart</button> -->
										<a href="/cart" class="main-btn">View Cart</a>
                    <a href="/checkout" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
										<!-- <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button> -->
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->
						<?php
					}else{
						$qty = 0;
						$totalprice = 0;

					?>
					<!-- Cart -->
					<li class="header-cart dropdown default-dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<div class="header-btns-icon">
								<i class="fa fa-shopping-cart"></i>
								<span class="qty">{{$qty}}</span>
							</div>
							<strong class="text-uppercase">My Cart:</strong>
							<br>
							<span>{{number_format($totalprice)}}</span>
						</a>
						<div class="custom-menu">
							<div id="shopping-cart">
								<div class="shopping-cart-list">

											<div class="product product-widget">
												<p>Cart Kosong</p>
											</div>

								</div>
								<div class="shopping-cart-btns" style="z-index:999;">
									<!-- <button class="main-btn">View Cart</button> -->
									<a href="/cart" class="main-btn">View Cart</a>
									<a href="/checkout" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									<!-- <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button> -->
								</div>
							</div>
						</div>
					</li>

					<?php

					}
						?>

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav <?=$clashow;?>">

					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						@foreach ($category as $categorys)
						<?php
							if(count($categorys->product) == 0)
							{$dropdown = '';
								$fa = '';
							}else{
								$dropdown = 'data-toggle="dropdown" aria-expanded="true"';
								$fa = '<i class="fa fa-angle-right"></i>';
							};
						?>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" {!!$dropdown!!}>{{$categorys->namacategory}}{!!$fa!!}</i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-links">
											<li><h3 class="list-links-title"><a href="/category_product/{{$categorys->id}}">{{$categorys->namacategory}}</a></h3></li>
											@foreach ($categorys->product as $products)

											<li><a href="detail_product/{{ $products->id }}">{{$products->namaproducts}}</a></li>

											@endforeach
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>

								</div>

							</div>
						</li>
						@endforeach
						<!--
						<li><a href="#">Bags & Shoes</a></li>
						<li><a href="#">View All</a></li> -->
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="/">Home</a></li>
						<li><a href="/category_product/1">Atasan</a></li>
						<li><a href="/category_product/2">Bawahan</a></li>
						<li><a href="/category_product/3">Aksesoris</a></li>

						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Tentang Kami <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="/about">Tentang</a></li>
								<li><a href="/toc">Syarat dan Ketentuan</a></li>
								<li><a href="/privacy">Kebijakan privasi</a></li>
								<li><a href="/career">Karir</a></li>
							</ul>
						</li>


						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Panduan <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="/faq">Faq</a></li>
								<li><a href="/howtopayment">Pembayaran</a></li>
							</ul>
						</li>


					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

@yield('content')


	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="/">
		            <img src="{{ Storage::url($configshop->logo) }}" alt="{{$configshop->webtitle}}">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>{{$configshop->webdesc}}</p>

						<!-- footer social -->
						<ul class="footer-social">
							@if($configshop->facebook)
							<li><a href="{{$configshop->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							@endif
							@if($configshop->twitter)
							<li><a href="{{$configshop->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
							@endif
							@if($configshop->instagram)
							<li><a href="{{$configshop->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							@endif
							@if($configshop->google)
							<li><a href="{{$configshop->google}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							@endif
							<!-- <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li> -->
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Tentang Kami</h3>
						<ul class="list-links">
							<li><a href="#">Tentang</a></li>
							<li><a href="#">Syarat dan Ketentuan</a></li>
							<li><a href="#">Kebijakan privasi</a></li>
							<li><a href="#">Karir</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	<script type="text/javascript">
			$(function() {
					$("#auto").autocomplete({
							source: "getdata",
							minLength: 1,
							select: function( event, ui ) {
									$('#response').val(ui.item.id);
							}
					});
			});
	</script>

</body>

</html>
