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

<script>
$(document).ready(function(e) {
		$('.pilihalamat').change(function() {
			var v_token = "{{csrf_token()}}";
			var id_alamat = $(this).val();
			var kurir = $('.pilihkurir').val();
			var berat = $(".berat").text();

			$.ajax({
					type: "POST",
					url: '/customer/detailalamat',
					data: {id_alamat: id_alamat, _token: v_token},
					success: function(msg) {
							$(".detailalamat").html(msg);
							var tujuan = $('.datakota').val();
							paketongkir(v_token, tujuan, kurir, berat);
					}
			});
		});

		$('.pilihprovinsi').change(function() {
			$(".loading").show();
			var v_token = "{{csrf_token()}}";
			var id_provinsi = $(this).val();
			var element = $(this).find('option:selected');
      var namaprov = element.attr("namaprovinsi");
			$('.namaprovinsi').val(namaprov);

			$.ajax({
					type: "POST",
					url: '/getKota',
					data: {id_provinsi: id_provinsi, _token: v_token},
					success: function(msg) {
							$(".datakota").html(msg);
							$(".loading").hide();
					}
			});


		});

		$('.datakota').change(function() {
			$(".loading").show();
			var element = $(this).find('option:selected');
      var myTag = element.attr("myTag");
			var namakota = element.attr("namakota");
			$(".kodepos").val(myTag);
			$(".namakota").val(namakota);

			var v_token = "{{csrf_token()}}";
			var kurir = $('.pilihkurir').val();
			var tujuan = $('.datakota').val();
			var berat = $(".berat").text();
			paketongkir(v_token, tujuan, kurir, berat);

			$(".loading").hide();
		});

		$('.pilihkurir').change(function() {
			$(".loading").show();
			var v_token = "{{csrf_token()}}";
			var kurir = $(this).val();
			var tujuan = $('.datakota').val();

			var berat = $(".berat").text();
			paketongkir(v_token, destination, kurir, berat);
		});

		$('.datapaket').change(function() {
			$(".loading").show();
			var element = $(this).find('option:selected');
      var myValue = element.attr("myValue");
			var etd = element.attr("etd");
			$('.etd').html(etd);
			number(myValue);
			$(".loading").hide();
		});

    function paketongkir(v_token, tujuan, kurir, berat){
			$.ajax({
					type: "POST",
					url: '/getCost',
					data: {kurir: kurir, tujuan: tujuan, _token: v_token, berat: berat},
					success: function(msg) {
							$(".datapaket").html(msg);
							var element = $('.datapaket').find('option:selected');
							var myValue = element.attr("myValue");
							var etd = element.attr("etd");

							$('.etd').html(etd);
							number(myValue);

							$(".loading").hide();
					}
			});
		}

		function number(number){
			var berat = $(".berat").text();
			var totalprice = $('.totalawal').val();

			var totalshipping = berat * number;
			var bayarakhir = parseInt(totalprice) + parseInt(totalshipping);
			$('.totalprice').val(bayarakhir);

			var nf = new Intl.NumberFormat();

			$('#shipping').html(nf.format(totalshipping));
			$('.perkilo').html(nf.format(number));
			$('.bayarakhir').html(nf.format(bayarakhir))
			$('.totalongkir').val(totalshipping);

		}

	});
</script>

@if (alert()->ready())
    <script>
        swal({
          title: "{!! alert()->message() !!}",
          text: "{!! alert()->option('text') !!}",
          type: "{!! alert()->type() !!}"
        });
    </script>
@endif
<div class="modal fade" id="popUpWindow">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Login Form</h3>
        </div>
        <!-- body -->
        <div class="modal-header">
          <form action="/customer/loginback" method="post" role="form">
						{!! csrf_field() !!}
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email"/>
						</div>
						<div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>

        </div>
        <!-- footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Log In</button>
        </div>
				</form>

      </div>
    </div>
  </div>
<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form action="/cart/checkout" id="checkout-form" class="clearfix" method="post">
					{!! csrf_field() !!}
					<div class="col-md-12">
						<div class="order-summary clearfix">
							@if(Session::get('cart.items'))
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
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
									<?php $totalprice = 0; $totalberat=0; ?>
									@foreach(Session::get('cart.items') as $item )
									<input type="hidden" name="id_order[]" value="{{$item['id']}}"/>
										<?php
											$totalprice += $item['total'];
											$totalberat += $item['berat'];
										?>
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
												<!-- <del class="font-weak"><small>{{$item['diskon']}}</small></del>-->
											</td>
											<td class="qty text-center"><input class="input" name="qty[]" type="number" value="{{$item['qty']}}"></td>
											<td class="total text-center"><strong class="primary-color">{{number_format($item['total'])}}</strong></td>
											<td class="text-right"><a href="/cart/destroy/{{$item['id']}}" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
										</tr>

									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total" style="text-align:right;">{{number_format($totalprice)}}</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING <small><br/>
											Estimasi : <span class="etd">0 day</span><br/><span class="berat">{{ceil($totalberat/1000)}}</span>kg x <span class="perkilo">0</span>/kg </small></th>
										<td colspan="2" id="shipping" class="sub-total" style="text-align:right;">0</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<input type="hidden" name="berat" class="totalberat" value="{{ceil($totalberat/1000)}}"/>
										<input type="hidden" name="ongkir" class="totalongkir" value="0"/>
										<input type="hidden" name="total" class="totalprice" value="{{$totalprice}}"/>
										<input type="hidden" name="totalawal" class="totalawal" value="{{$totalprice}}"/>
										<input type="hidden" name="nameprovinsi" class="namaprovinsi" value="0"/>
										<input type="hidden" name="namekota" class="namakota" value="0"/>
										<th colspan="2" class="total bayarakhir" style="text-align:right;">{{number_format($totalprice)}}</th>
									</tr>
								</tfoot>
							</table>
						</div>
							@else

							@endif

					</div>

					@if(Session::get('cart.items'))

						@if(auth('customer')->user())
							<div class="col-md-6">
								<div class="section-title">
									<h4 class="title">Pilih Alamat</h4>
								</div>

								<div class="form-group">
									<label>Pilih Alamat</label>
									<select name="alamat" class="form-control pilihalamat" required>
										<option value="">Pilih Alamat</option>
										<?php $DataAlamat = \App\Alamat::where('customer_id', auth('customer')->user()->id)->get();?>
											@foreach($DataAlamat as $DataAlamats)
											<option value="{{$DataAlamats->id}}">{{$DataAlamats->namalamat}}</option>
											@endforeach
									</select><br/>
									<label><strong>Kirim ke :</strong></label><br/>
										<div class="notice notice-danger detailalamat">
			              </div>
								</div>
								<div class="section-title">
									<h3 class="title">Kurir</h3>
								</div>

								<div class="form-group">
									<select name="kurir" class="form-control pilihkurir" required>
										<option value="jne">JNE</option>
										<option value="pos">POS</option>
									</select>
								</div>

								<div class="form-group">
									<select name="paket" class="form-control datapaket">
									 <option value="">Pilih Paket</option>
									</select>
								</div>

							</div>
						@else
							<div class="col-md-6">
								<div class="billing-details">
									<div class="test" data-toggle="modal" data-target="#popUpWindow" style="cursor:pointer;">Already a customer ? Login</div>
									<!-- <div class="form-group">
										<div class="input-checkbox">
											<input type="checkbox" id="login">
											<label class="font-weak" for="login">Already a customer ? Login</label>
											<div class="caption">
														<div class="form-group">
														<label>Email</label>
														<input class="input" type="email" name="email" placeholder="Enter Email Address">
														</div>
														<div class="form-group">
														<label>Password</label>
														<input class="input" type="password" name="password" placeholder="Enter Password">
														</div>
														<div class="form-group">
														<button type="submit" class="primary-btn add-to-cart pull-right">Login</button>
														</div>
											</div>
										</div>
									</div> -->
									<div class="section-title">
										<h3 class="title">Billing Details</h3>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="namadepan" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="namabelakang" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>

									<div class="form-group">
										<div class="input-checkbox">
											<input type="checkbox" id="register">
											<label class="font-weak" for="register">Create Account?</label>
											<div class="caption">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
													<p>
														<input class="input" type="password" name="password" placeholder="Enter Your Password">
											</div>
										</div>
									</div>

									<div class="section-title">
										<h3 class="title">Alamat</h3>
									</div>
									<div class="form-group">
										<select name="provinsi" class="form-control pilihprovinsi" required>
											<option value="">Pilih Provinsi</option>
											@foreach($provinsi as $provinsis)
													<option value="{{$provinsis['province_id']}}" namaprovinsi="{{$provinsis['province']}}">{{$provinsis['province']}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<select name="city" class="form-control datakota">
										 <option value="">Pilih Kota</option>
									 	</select>
									</div>

									<div class="form-group">
										<textarea name="address" class="form-control" placeholder="Alamat" rows="4"></textarea>
									</div>

									<div class="form-group">
										<input class="input kodepos" type="text" name="kodepos" placeholder="ZIP Code">
									</div>

									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Telephone">
									</div>

									<div class="section-title">
										<h3 class="title">Kurir</h3>
									</div>

									<div class="form-group">
										<select name="kurir" class="form-control pilihkurir" required>
											<option value="jne">JNE</option>
											<option value="pos">POS</option>
										</select>
									</div>

									<div class="form-group">
										<select name="paket" class="form-control datapaket">
										 <option value="">Pilih Paket</option>
									 	</select>
									</div>

								</div>
							</div>
						@endif

					<div class="col-md-6">
						<!-- <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Shiping Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Free Shiping -  $0.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-2">
								<label for="shipping-2">Standard - $4.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div> -->

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" value="1" checked>
								<label for="payments-1">Direct Bank Transfer</label>
								<div class="caption">
									<div class="row row-margin-bottom">
										@foreach($bank as $banks)
				            <div class="col-md-12 lib-item" data-category="view">
				                <div class="lib-panel">
				                    <div class="row box-shadow">
				                        <div class="col-md-3">
				                            <img src="{{Storage::url($banks->logobank)}}">
				                        </div>
				                        <div class="col-md-9">
				                            <div class="lib-row lib-header">
				                                {{$banks->namabank}}
				                                <div class="lib-header-seperator"></div>
				                            </div>
				                            <div class="lib-row lib-desc">
				                                {{$banks->infobank}}
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
										@endforeach
				            <div class="col-md-1"></div>
								</div>
							</div>
							<!-- <div class="input-checkbox">
								<input type="radio" name="payments" value="2" id="payments-2">
								<label for="payments-2">Cheque Payment</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div> -->
							<div class="input-checkbox">
								<input type="radio" name="payments" value="2" id="payments-3">
								<label for="payments-3">Paypal System</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div>

						<div class="pull-right">
							<button class="primary-btn">Lanjut Pembayaran</button>
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


				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<br/><br/>
@endsection
