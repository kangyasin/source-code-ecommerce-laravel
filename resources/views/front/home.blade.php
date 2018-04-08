@extends('front/master')
@section('title')
Home LaraCommerce Yasin
@endsection

@section('content')
<!-- HOME -->
<div id="home">
  <!-- container -->
  <div class="container">
    <!-- home wrap -->
    <div class="home-wrap">
      <!-- home slick -->
      <div id="home-slick">
        @foreach($DataBanner as $DataBanners)
        <!-- banner -->
        <div class="banner banner-1">
          <img src="{{ Storage::url('public/banner/'.$DataBanners->image) }}" alt="{{$DataBanners->name}}">
          <div class="banner-caption text-center">
            <h1 class="white-color">{{$DataBanners->name}}</h1>
            <!-- <h3 class="white-color font-weak">Up to 50% Discount</h3> -->
            <a href="{{$DataBanners->link}}" class="primary-btn">Shop Now</a>
          </div>
        </div>
        @endforeach
        <!-- /banner -->

      </div>
      <!-- /home slick -->
    </div>
    <!-- /home wrap -->
  </div>
  <!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      @foreach($SubBanner as $SubBanners)
      <!-- banner -->
      <div class="col-md-4 col-sm-6">
        <a class="banner banner-1" href="#">
          <img src="{{ Storage::url('public/banner/'.$SubBanners->image) }}" alt="{{$SubBanners->name}}">
          <div class="banner-caption text-center">
            <h2 class="white-color">{{$SubBanners->name}}</h2>
          </div>
        </a>
      </div>
      <!-- /banner -->
      @endforeach



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
          <h2 class="title">Deals Of The Day</h2>
          <div class="pull-right">
            <div class="product-slick-dots-2 custom-dots">
            </div>
          </div>
        </div>
      </div>
      <!-- section title -->

      <!-- Product Single -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single product-hot">
          <div class="product-thumb">
            <div class="product-label">
              <span class="sale">-20%</span>
            </div>
            <ul class="product-countdown">
              <li><span>00 H</span></li>
              <li><span>00 M</span></li>
              <li><span>00 S</span></li>
            </ul>
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="./img/product01.jpg" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /Product Single -->

      <!-- Product Slick -->
      <div class="col-md-9 col-sm-6 col-xs-6">
        <div class="row">
          <div id="product-slick-2" class="product-slick">
            <!-- Product Single -->
              @foreach($Deals as $deal)
              @if($deal->productimage)
                <?php $imagedeals = $deal->productimage;?>
              @else
                <?php $imagedeals = 'public/product/product-noimage.jpg';?>
              @endif
            <div class="product product-single">
              <div class="product-thumb">
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{ Storage::url($imagedeals) }}" alt="{{$deal->namaproducts}}">
              </div>
              <div class="product-body">
                <h3 class="product-price">{{number_format($deal->harga)}}</h3>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="/detail_product/{{$deal->id}}">{{$deal->namaproducts}}</a></h2>
                <div class="product-btns">
                  <form action="/cart/store" method="post">
      						  {!! csrf_field() !!}
      						  <input type="hidden" name="id" value="{{$deal->id}}">
      						  <input type="hidden" name="name" value="{{$deal->namaproducts}}">
      							<input type="hidden" name="size" value="35">
      							<input type="hidden" name="color" value="Camelot">
      						  <input type="hidden" name="price" value="{{$deal->harga}}">
                    <input type="hidden" name="berat" value="{{$deal->berat}}">
      							<input type="hidden" name="image" value="{{$imagedeals}}">
      							<input type="hidden" name="diskon" value="500">
      							<input type="hidden" name="qty" value="1">
      						  <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
            <!-- /Product Single -->


          </div>
        </div>
      </div>
      <!-- /Product Slick -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- banner -->
      <div class="col-md-8">
        <div class="banner banner-1">
          <img src="./img/banner13.jpg" alt="">
          <div class="banner-caption text-center">
            <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
            <button class="primary-btn">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- /banner -->

      <!-- banner -->
      <div class="col-md-4 col-sm-6">
        <a class="banner banner-1" href="#">
          <img src="./img/banner11.jpg" alt="">
          <div class="banner-caption text-center">
            <h2 class="white-color">NEW COLLECTION</h2>
          </div>
        </a>
      </div>
      <!-- /banner -->

      <!-- banner -->
      <div class="col-md-4 col-sm-6">
        <a class="banner banner-1" href="#">
          <img src="./img/banner12.jpg" alt="">
          <div class="banner-caption text-center">
            <h2 class="white-color">NEW COLLECTION</h2>
          </div>
        </a>
      </div>
      <!-- /banner -->
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
          <h2 class="title">Latest Products</h2>
        </div>
      </div>
      <!-- section title -->
      <!-- Product Single -->
      @foreach($ProductData as $ProductDatas)
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <div class="product-label">
              <span>New</span>
            </div>
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            @if($ProductDatas->productimage)
              <?php $image = $ProductDatas->productimage;?>
            @else
              <?php $image = 'public/product/product-noimage.jpg';?>
            @endif

            <img src="{{ Storage::url($image) }}" alt="{{$ProductDatas->namaproducts}}">
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
                <input type="hidden" name="diskon" value="500">
                <input type="hidden" name="qty" value="1">
  						  <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
  						</form>

            </div>
          </div>
        </div>
      </div>
      <!-- /Product Single -->
      @endforeach


      <!-- section -->
      <div class="section">
        <!-- container -->
        <div class="container">
          <?php $slide = 4; ?>
        @foreach($CategoryProduct as $key => $CategoryProducts)
        <?php $slide += $key;?>
          <!-- row -->
          <div class="row">
            <!-- section title -->
            <div class="col-md-12">
              <div class="section-title">
                <h2 class="title">{{$CategoryProducts->namacategory}}</h2>
                <div class="pull-right">
                  <div class="product-slick-dots-{{$slide}} custom-dots">
                  </div>
                </div>
              </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="banner banner-2">
                <img src="./img/banner15.jpg" alt="">
                <div class="banner-caption">
                  <h2 class="white-color">NEW<br>COLLECTION</h2>
                  <button class="primary-btn">Shop Now</button>
                </div>
              </div>
            </div>
            <!-- /Product Single -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
              <div class="row">
                <div id="product-slick-{{$slide}}" class="product-slick">
                  <!-- Product Single -->
                    @foreach($CategoryProducts->product as $key => $deal)
                    @if($deal->productimage)
                      <?php $imagedeals = $deal->productimage;?>
                    @else
                      <?php $imagedeals = 'public/product/product-noimage.jpg';?>
                    @endif
                  <div class="product product-single">
                    <div class="product-thumb">
                      <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                      <img src="{{ Storage::url($imagedeals) }}" alt="{{$deal->namaproducts}}">
                    </div>
                    <div class="product-body">
                      <h3 class="product-price">{{number_format($deal->harga)}}</h3>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o empty"></i>
                      </div>
                      <h2 class="product-name"><a href="/detail_product/{{$deal->id}}">{{$deal->namaproducts}}</a></h2>
                      <div class="product-btns">
                        <form action="/cart/store" method="post">
            						  {!! csrf_field() !!}
            						  <input type="hidden" name="id" value="{{$deal->id}}">
            						  <input type="hidden" name="name" value="{{$deal->namaproducts}}">
            							<input type="hidden" name="size" value="35">
            							<input type="hidden" name="color" value="Camelot">
            						  <input type="hidden" name="price" value="{{$deal->harga}}">
                          <input type="hidden" name="berat" value="{{$deal->berat}}">
            							<input type="hidden" name="image" value="{{$imagedeals}}">
            							<input type="hidden" name="diskon" value="500">
            							<input type="hidden" name="qty" value="1">
            						  <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <!-- /Product Single -->


                </div>
              </div>
            </div>
            <!-- /Product Slick -->
          </div>
          <!-- /row -->

                <script>
                $(document).ready(function(e) {
                  $('#product-slick-{{$slide}}').slick({
                  slidesToShow: 3,
                  slidesToScroll: 2,
                  autoplay: true,
                  infinite: true,
                  speed: 300,
                  dots: true,
                  arrows: false,
                  appendDots: '.product-slick-dots-3',
                  responsive: [{
                    breakpoint: 991,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      dots: false,
                      arrows: true,
                      slidesToShow: 1,
                      slidesToScroll: 1,
                    }
                  },
                  ]
                  });
                });

                </script>

                @endforeach
        </div>
        <!-- /container -->
      </div>
      <!-- /section -->






    <!-- <div class="row">

      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Picked For You</h2>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="./img/product04.jpg" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">$32.50</h3>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <div class="product-label">
              <span>New</span>
            </div>
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="./img/product03.jpg" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">$32.50</h3>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <div class="product-label">
              <span class="sale">-20%</span>
            </div>
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="./img/product02.jpg" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <div class="product-label">
              <span>New</span>
              <span class="sale">-20%</span>
            </div>
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="./img/product01.jpg" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

    </div> -->

  </div>
  <!-- /container -->
</div>
<!-- /section -->
@endsection
