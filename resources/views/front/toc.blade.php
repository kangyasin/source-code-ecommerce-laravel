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
				<h2>{{$DataToc->name}}</h2>


				{!!$DataToc->deskripsi!!}

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->



@endsection
