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
				<h2>{{$DataPayment->name}}</h2>
				{!!$DataPayment->deskripsi!!}
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->



@endsection
