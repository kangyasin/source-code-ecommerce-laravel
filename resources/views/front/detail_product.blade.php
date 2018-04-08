@extends('front/master')

@section('title')
LaraCommerce Yasin - Detail Products
@endsection

@section('content')
<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->

				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							@foreach($ProductData->picture as $ProductDatas)
							<div class="product-view">
								@if($ProductDatas->nameimage)
		              <?php $image = $ProductDatas->nameimage;?>
		            @else
		              <?php $image = 'public/product/product-noimage.jpg';?>
		            @endif
								<img src="{{ Storage::url($image) }}" alt="">
							</div>
							@endforeach

						</div>
						<div id="product-view">
							@foreach($ProductData->picture as $ProductDatae)
							<div class="product-view">
								@if($ProductDatae->nameimage)
		              <?php $image = $ProductDatae->nameimage;?>
		            @else
		              <?php $image = 'public/product/product-noimage.jpg';?>
		            @endif
								<img src="{{ Storage::url($image) }}" alt="">
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<!-- <div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div> -->
							<h2 class="product-name">{{$ProductData->namaproducts}}</h2>
							<h3 class="product-price">{{number_format($ProductData->harga)}} <!---<del class="product-old-price">$45.00</del>---></h3>
							<div>
								<!-- <div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<a href="#">3 Review(s) / Add Review</a> -->
							</div>
							<p><strong>Availability:</strong> In Stock</p>
							<p><strong>Category:</strong> E-SHOP</p>
							<p>{!!$ProductData->shortdesc!!}</p>
							<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li class="active"><a href="#">S</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">SL</a></li>
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Color:</span></li>
									<li class="active"><a href="#" style="background-color:#475984;"></a></li>
									<li><a href="#" style="background-color:#8A2454;"></a></li>
									<li><a href="#" style="background-color:#BF6989;"></a></li>
									<li><a href="#" style="background-color:#9A54D8;"></a></li>
								</ul>
							</div>
							<form action="/cart/store" method="post">
								{!! csrf_field() !!}
								<input type="hidden" name="id" value="{{$ProductData->id}}">
								<input type="hidden" name="name" value="{{$ProductData->namaproducts}}">
								<input type="hidden" name="size" value="35">
								<input type="hidden" name="color" value="Camelot">
								<input type="hidden" name="price" value="{{$ProductData->harga}}">
								<input type="hidden" name="image" value="{{$image}}">
								<input type="hidden" name="diskon" value="">
							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									<input class="input" name="qty" type="number" value="1">
								</div>
								<div style="clear: both;"></div>
								<br/>

	  						  <button class="primary-btn add-to-cart" type="submit" style="float:left;"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
	  						</form>
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<!-- <li><a data-toggle="tab" href="#tab1">Details</a></li>
								<li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li> -->
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									{!!$ProductData->deskripsi!!}
								</div>
								<!-- <div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form">
												<div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>



								</div> -->
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->


				<!-- Product Single -->
				@foreach($otherproduct as $otherproducts)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							@if($otherproducts->productimage)
								<?php $image = $otherproducts->productimage;?>
							@else
								<?php $image = 'product/product-noimage.jpg';?>
							@endif
							<img src="{{ Storage::url($image) }}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">{{number_format($otherproducts->harga)}}</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="/detail_product/{{$otherproducts->id}}">{{$otherproducts->namaproducts}}</a></h2>
							<div class="product-btns">
								<!-- <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button> -->
								<form action="/cart/store" method="post">
									{!! csrf_field() !!}
									<input type="hidden" name="id" value="{{$ProductData->id}}">
									<input type="hidden" name="name" value="{{$ProductData->namaproducts}}">
									<input type="hidden" name="size" value="35">
									<input type="hidden" name="color" value="Camelot">
									<input type="hidden" name="price" value="{{$ProductData->harga}}">
									<input type="hidden" name="image" value="{{$image}}">
									<input type="hidden" name="diskon" value="">
									<input type="hidden" name="qty" value="1">
								<button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->


			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection
