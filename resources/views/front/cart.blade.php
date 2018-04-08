@extends('front/master')
@section('title')
Home LaraCommerce Yasin - Checkout
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
.notice {
  padding: 15px;
  background-color: #fafafa;
  border-left: 6px solid #7f7f84;
  margin-bottom: 10px;
  -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
          box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
  padding: 10px;
  font-size: 80%;
}
.notice-lg {
  padding: 35px;
  font-size: large;
}
.notice-success {
  border-color: #80D651;
}
.notice-success>strong {
  color: #80D651;
}
.notice-info {
  border-color: #45ABCD;
}
.notice-info>strong {
  color: #45ABCD;
}
.notice-warning {
  border-color: #FEAF20;
}
.notice-warning>strong {
  color: #FEAF20;
}
.notice-danger {
  border-color: #d73814;
}
.notice-danger>strong {
  color: #d73814;
}
.lib-panel {
    margin-bottom: 20Px;
}
.lib-panel img {
    width: 100%;
    background-color: transparent;
}

.lib-panel .row,
.lib-panel .col-md-6 {
    padding: 0;
    background-color: #FFFFFF;
}


.lib-panel .lib-row {
    padding: 0 20px 0 20px;
}

.lib-panel .lib-row.lib-header {
    background-color: #FFFFFF;
    font-size: 20px;
    padding: 10px 20px 0 20px;
}

.lib-panel .lib-row.lib-header .lib-header-seperator {
    height: 2px;
    width: 26px;
    background-color: #d9d9d9;
    margin: 7px 0 7px 0;
}

.lib-panel .lib-row.lib-desc {
    position: relative;
    height: 100%;
    display: block;
    font-size: 13px;
}
.lib-panel .lib-row.lib-desc a{
    position: absolute;
    width: 100%;
    bottom: 10px;
    left: 20px;
}

.row-margin-bottom {
    margin-bottom: 20px;
}

.box-shadow {
    -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
}

.no-padding {
    padding: 0;
}

</style>
<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">


					<div class="col-md-12">
						<!-- <p>Already a customer ? <a href="#">Login</a></p> -->
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>

									@if(Session::get('cart.items'))
									<table class="shopping-cart-table table">
										<thead>
											<tr>
												<th>Product</th>
												<th></th>
												<th class="text-center">Price</th>
												<th class="text-center">Quantity</th>
												<th class="text-center">Total</th>
												<th class="text-right"></th>
											</tr>
										</thead>
										<tbody>
											<?php $totalprice = 0; ?>
									    @foreach(Session::get('cart.items') as $item )
												<?php $totalprice = $totalprice + $item['total'];?>
												<tr>
													<td class="thumb"><img src="{{ Storage::url($item['image']) }}" alt="{{$item['name']}}"></td>
													<td class="details">
														<a href="#">{{$item['name']}}</a>
														<ul>
															<li><span>Size: {{$item['size']}}</span></li>
															<li><span>Color: {{$item['color']}}</span></li>
														</ul>
													</td>
													<td class="price text-center"><strong>{{number_format($item['price'])}}</strong><br>
														<!-- <del class="font-weak"><small>{{$item['diskon']}}</small></del> -->
													</td>
													<td class="qty text-center"><input class="input" type="number" value="{{$item['qty']}}"></td>
													<td class="total text-center"><strong class="primary-color">{{number_format($item['total'])}}</strong></td>
													<td class="text-right"><a href="/cart/destroy/{{$item['id']}}" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
												</tr>

											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th class="empty" colspan="3"></th>
												<th>SUBTOTAL</th>
												<th colspan="2" class="sub-total">{{number_format($totalprice)}}</th>
											</tr>
											<!-- <tr>
												<th class="empty" colspan="3"></th>
												<th>SHIPING</th>
												<td colspan="2">Free Shipping</td>
											</tr> -->
											<tr>
												<th class="empty" colspan="3"></th>
												<th>TOTAL</th>
												<th colspan="2" class="total">{{number_format($totalprice)}}</th>
											</tr>
										</tfoot>
									</table>
									<div class="pull-right">
										<a href="/" class="primary-btn">Continue Shopping</a>
										<a href="/checkout" class="primary-btn">Checkout</a>
										<!-- <button class="primary-btn">Place Order</button> -->
									</div>
								</div>
									@else
									<div class="col-sm-12 col-md-12">
											<div class="alert-message alert-message-warning">
												<div class="row">
													<div class="col-md-6">
														<h2>Keranjang belanja Anda kosong.</h2>
														<h4>Mulai Belanja <strong>Sekarang !!</strong>.</h4>
													</div>
													<div class="col-md-6">
														<div class="pull-right">
															<a href="/" class="primary-btn">Back to Home</a>
														</div>
													</div>
											</div>
											</div>
									</div>

									<div class="row">
										<!-- section title -->
										<div class="col-md-12">
											<div class="section-title">
												<h2 class="title">Latest Products</h2>
											</div>
										</div>
										<!-- section title -->
										<!-- Product Single -->
										@foreach($ProductData as $ProductDatas)
										<div class="col-md-3 col-sm-6 col-xs-6">
											<div class="product product-single">
												<div class="product-thumb">
													<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
													@if($ProductDatas->productimage)
														<?php $image = $ProductDatas->productimage;?>
													@else
														<?php $image = 'public/product/product-noimage.jpg';?>
													@endif

													<img src="{{ Storage::url($image) }}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-price">{{number_format($ProductDatas->harga)}}</h3>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
													<h2 class="product-name"><a href="/detail_product/{{$ProductDatas->id}}">{{$ProductDatas->namaproducts}}</a></h2>
													<div class="product-btns">
														<form action="/cart/store" method="post">
															{!! csrf_field() !!}
															<input type="hidden" name="id" value="{{$ProductDatas->id}}">
															<input type="hidden" name="name" value="{{$ProductDatas->namaproducts}}">
															<input type="hidden" name="size" value="35">
															<input type="hidden" name="color" value="Camelot">
															<input type="hidden" name="price" value="{{$ProductDatas->harga}}">
															<input type="hidden" name="berat" value="{{$ProductDatas->berat}}">
															<input type="hidden" name="image" value="{{$image}}">
															<input type="hidden" name="diskon" value="0">
															<input type="hidden" name="qty" value="1">
															<button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
														</form>

													</div>
												</div>
											</div>
										</div>
										<!-- /Product Single -->
										@endforeach
									</div>
									@endif


						<!-- <form action="/cart/store" method="post">
						  {!! csrf_field() !!}
						  <input type="hidden" name="id" value="1">
						  <input type="hidden" name="name" value="Product Name Goes Product 1">
							<input type="hidden" name="size" value="35">
							<input type="hidden" name="color" value="Camelot">
						  <input type="hidden" name="price" value="5000">
							<input type="hidden" name="image" value="img/thumb-product01.jpg">
							<input type="hidden" name="diskon" value="500">
							<input type="hidden" name="qty" value="1">
						  <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
						</form> -->


					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection
