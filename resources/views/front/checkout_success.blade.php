@extends('front/master')
@section('title')
Home LaraCommerce Yasin - Checkout
@endsection

@section('content')
<style>
.frb-group {
	margin: 15px 0;
}

.frb ~ .frb {
	margin-top: 15px;
}

.frb input[type="radio"]:empty,
.frb input[type="checkbox"]:empty {
	display: none;
}

.frb input[type="radio"] ~ label:before,
.frb input[type="checkbox"] ~ label:before {
	font-family: FontAwesome;
	content: '\f096';
	position: absolute;
	top: 50%;
	margin-top: -11px;
	left: 15px;
	font-size: 22px;
}

.frb input[type="radio"]:checked ~ label:before,
.frb input[type="checkbox"]:checked ~ label:before {
	content: '\f046';
}

.frb input[type="radio"] ~ label,
.frb input[type="checkbox"] ~ label {
	position: relative;
	cursor: pointer;
	width: 100%;
	border: 1px solid #ccc;
	border-radius: 5px;
	background-color: #f2f2f2;
}

.frb input[type="radio"] ~ label:focus,
.frb input[type="radio"] ~ label:hover,
.frb input[type="checkbox"] ~ label:focus,
.frb input[type="checkbox"] ~ label:hover {
	box-shadow: 0px 0px 3px #333;
}

.frb input[type="radio"]:checked ~ label,
.frb input[type="checkbox"]:checked ~ label {
	color: #fafafa;
}

.frb input[type="radio"]:checked ~ label,
.frb input[type="checkbox"]:checked ~ label {
	background-color: #f2f2f2;
}

.frb.frb-default input[type="radio"]:checked ~ label,
.frb.frb-default input[type="checkbox"]:checked ~ label {
	color: #333;
}

.frb.frb-primary input[type="radio"]:checked ~ label,
.frb.frb-primary input[type="checkbox"]:checked ~ label {
	background-color: #337ab7;
}

.frb.frb-success input[type="radio"]:checked ~ label,
.frb.frb-success input[type="checkbox"]:checked ~ label {
	background-color: #5cb85c;
}

.frb.frb-info input[type="radio"]:checked ~ label,
.frb.frb-info input[type="checkbox"]:checked ~ label {
	background-color: #5bc0de;
}

.frb.frb-warning input[type="radio"]:checked ~ label,
.frb.frb-warning input[type="checkbox"]:checked ~ label {
	background-color: #f0ad4e;
}

.frb.frb-danger input[type="radio"]:checked ~ label,
.frb.frb-danger input[type="checkbox"]:checked ~ label {
	background-color: #d9534f;
}

.frb input[type="radio"]:empty ~ label span,
.frb input[type="checkbox"]:empty ~ label span {
	display: inline-block;
}

.frb input[type="radio"]:empty ~ label span.frb-title,
.frb input[type="checkbox"]:empty ~ label span.frb-title {
	font-size: 16px;
	margin: 5px 5px 0px 50px;
}

.frb input[type="radio"]:empty ~ label span.frb-description,
.frb input[type="checkbox"]:empty ~ label span.frb-description {
	font-weight: normal;
	font-style: italic;
	color: #999;
	margin: 0px 5px 5px 0px;
}

.frb input[type="radio"]:empty:checked ~ label span.frb-description,
.frb input[type="checkbox"]:empty:checked ~ label span.frb-description {
	color: #fafafa;
}

.frb.frb-default input[type="radio"]:empty:checked ~ label span.frb-description,
.frb.frb-default input[type="checkbox"]:empty:checked ~ label span.frb-description {
	color: #999;
}
</style>
<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">
		        <div class="col-sm-12  text-center">
		        <br><br> <h2 style="color:#0fad00">Success</h2>
		        <i class="fa fa-check-circle-o" style="font-size:50px; color:green;"></i>
		        <h3>Hai, {{$DataTransaksi[0]->nama}}</h3>
		        <p style="font-size:20px; color:#5C5C5C;">Pesanan berhasil, berikut ringkasan pesanan anda.</p>
						<hr><br/>
						</div>
						<div class="col-md-6">
							<div class="order-summary clearfix">
								<div class="section-title">
									<h3 class="title">Pesanan</h3>
								</div>

								<table class="shopping-cart-table table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Product</th>
											<th class="text-center">Price</th>
											<th class="text-center">Quantity</th>
											<th class="text-center">Sub Total</th>
										</tr>
									</thead>
									<tbody>
										<?php $totalprice = 0; ?>

										@foreach($DataTransaksi as $key => $value)
										<?php
										$totalperitem = $DataTransaksi[$key]->jumlahpembelian * $DataTransaksi[$key]->harga;
										$totalprice += $totalprice + $totalperitem;

										$totalakhir = $DataTransaksi[$key]->totalpembelian - $DataTransaksi[$key]->totaldiskon;
										?>
											<tr>
												<td class="thumb"><img src="{{Storage::url($DataTransaksi[$key]->nameimage)}}" alt="{{$DataTransaksi[$key]->namaproducts}}"></td>
												<td class="details">
													<a href="#">{{$DataTransaksi[$key]->namaproducts}}</a>

												</td>
												<td class="price text-center"><strong>{{number_format($DataTransaksi[$key]->harga)}}</strong><br><del class="font-weak"><small>{{$key['totaldiskon']}}</small></del></td>
												<td class="qty text-center">{{$DataTransaksi[$key]->jumlahpembelian}}</td>
												<td class="total text-center"><strong class="primary-color">{{number_format($totalperitem)}}</strong></td>

											</tr>

										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th class="empty" colspan="3"></th>
											<th>SHIPING</th>
											<td colspan="2" class="text-right">{{number_format($DataTransaksi[0]->totalongkir)}}</td>
										</tr>
										<tr>
											<th class="empty" colspan="3"></th>
											<th>TOTAL</th>
											<th colspan="2" class="total text-right">{{number_format($totalakhir)}}</th>
										</tr>
									</tfoot>
								</table>
							</div>

						</div>

						<div class="col-md-6">
							<div class="order-summary clearfix">
								<div class="section-title"><h3 class="title">Pembayaran</h3></div>
								<div class="panel panel-default">
	                <div class="panel-body">
                    <form action="/checkout/konfirmasipembayaran/{{Request::segment(3)}}" role="form" method="post">
										{!! csrf_field() !!}
										<div class="form-group">
                      <label>NAMA PEMILIK REKENING</label>
                          <input type="text" class="form-control" name="namapemilik" value="{{ old('namapemilik') }}" placeholder="Nama Pemilik Rekening" required autofocus/>
                    </div>

                    <div class="form-group">
                      <label>NAMA BANK eg. BCA</label>
                          <input type="text" class="form-control" name="namabank" value="{{ old('namabank') }}" placeholder="Nama Bank" required />
                    </div>

										<div class="form-group">
                      <label>NOMOR REKENING</label>
                          <input type="text" class="form-control" name="nomor_rekening" value="{{ old('nomor_rekening') }}" placeholder="Nomor Rekening" required />
                    </div>

										<div class="form-group">
                      <label>TOTAL PEMBAYARAN</label>
                          <input type="text" class="form-control" name="totalpembayaran" value="{{number_format($totalakhir)}}" readonly/>
                    </div>

              		</div>
		            </div>
								<div class="panel panel-default">
	                <div class="panel-body">

										<div class="form-group">
                      <label>TRANFER MELALUI AKUN BANK</label>
											<div class="frb-group">

												@foreach ($DataBank as $DataBanks)

												<div class="frb frb-primary">
													<input type="radio" id="radio-button-{{$DataBanks->id}}" name="transfer" value="{{$DataBanks->id}}">
													<label for="radio-button-{{$DataBanks->id}}">
															<div class="row">
																<div class="col-md-2 text-right">
																	<img src="{{Storage::url($DataBanks->logobank)}}" width="50" style="padding-top:6px; right:0;"/>
																</div>
																<div class="col-md-10 text-left" style="padding-top:2px;">
																	{{$DataBanks->namabank}}<br/>
																	<span class="frb-description">{{$DataBanks->infobank}}</span>
																</div>
															</div>


													</label>
												</div>

												@endforeach



											</div>
										</div>
                    </div>
              		</div>
		            </div>

		            <button type="submit" class="btn btn-success btn-lg btn-block" role="button">Konfirmasi Pembayaran</button>
								</form>
		        	</div>
						</div>

						</div>


			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection
