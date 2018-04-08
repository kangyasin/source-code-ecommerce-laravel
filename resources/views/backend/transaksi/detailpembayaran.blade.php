@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')
<!-- line modal -->

<style>
.funkyradio div {
   clear: both;
   /*margin: 0 50px;*/
   overflow: hidden;
}
.funkyradio label {
   /*min-width: 400px;*/
   width: 100%;
   border-radius: 3px;
   border: 1px solid #D1D3D4;
   font-weight: normal;
}
.funkyradio input[type="radio"]:empty, .funkyradio input[type="checkbox"]:empty {
   display: none;
}
.funkyradio input[type="radio"]:empty ~ label, .funkyradio input[type="checkbox"]:empty ~ label {
   position: relative;
   line-height: 2.5em;
   text-indent: 3.25em;
   cursor: pointer;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
}
.funkyradio input[type="radio"]:empty ~ label:before, .funkyradio input[type="checkbox"]:empty ~ label:before {
   position: absolute;
   display: block;
   top: 0;
   bottom: 0;
   left: 0;
   content:'';
   width: 2.5em;
   background: #D1D3D4;
   border-radius: 3px 0 0 3px;
}
.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
   content:'\2714';
   text-indent: .9em;
   color: #C2C2C2;
}
.funkyradio input[type="radio"]:hover:not(:checked) ~ label, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
   color: #888;
}
.funkyradio input[type="radio"]:checked ~ label:before, .funkyradio input[type="checkbox"]:checked ~ label:before {
   content:'\2714';
   text-indent: .9em;
   color: #333;
   background-color: #ccc;
}
.funkyradio input[type="radio"]:checked ~ label, .funkyradio input[type="checkbox"]:checked ~ label {
   color: #777;
}
.funkyradio input[type="radio"]:focus ~ label:before, .funkyradio input[type="checkbox"]:focus ~ label:before {
   box-shadow: 0 0 0 3px #999;
}
.funkyradio-default input[type="radio"]:checked ~ label:before, .funkyradio-default input[type="checkbox"]:checked ~ label:before {
   color: #333;
   background-color: #ccc;
}
.funkyradio-primary input[type="radio"]:checked ~ label:before, .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
   color: #fff;
   background-color: #337ab7;
}
.funkyradio-success input[type="radio"]:checked ~ label:before, .funkyradio-success input[type="checkbox"]:checked ~ label:before {
   color: #fff;
   background-color: #5cb85c;
}
.funkyradio-danger input[type="radio"]:checked ~ label:before, .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
   color: #fff;
   background-color: #d9534f;
}
.funkyradio-warning input[type="radio"]:checked ~ label:before, .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
   color: #fff;
   background-color: #f0ad4e;
}
.funkyradio-info input[type="radio"]:checked ~ label:before, .funkyradio-info input[type="checkbox"]:checked ~ label:before {
   color: #fff;
   background-color: #5bc0de;
}
</style>

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h3 class="modal-title" id="lineModalLabel">Status Pembayaran</h3>
  </div>
  <form action="/administrator/updatepesanan" method="post">
    {{ csrf_field() }}
  <div class="modal-body">

  </div>
  <div class="modal-footer">
    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
      </div>
      <div class="btn-group btn-delete hidden" role="group">
        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
      </div>
      <div class="btn-group" role="group">
        <button type="submit" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script>
  $(document).ready(function(e) {
      $('.editstatus').click(function() {

          var v_token = "{{csrf_token()}}";
          var idTransaksi = $(this).attr("alt");
          $.ajax({
              type: "POST",
              url: '/administrator/getdatatransaksi',
              data: {idTransaksi: idTransaksi, _token: v_token},
              success: function( msg ) {
                  $(".modal-body").html(msg);
              }
          });
      });
  });
</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Detail Pembayaran
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Pembayaran</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Transaksi</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Sub Total</th>
                </tr>
                </thead>
                <tbody id="data-list">
                <?php
                  $no = 1;
                  $subtotal = 0;
                ?>
                
                @foreach($DetailPayment as $DetailPayments)
                <?php
                $total = $DetailPayments->tsdttransaksi['jumlahpembelian'] * $DetailPayments->hargabayar;
                $subtotal += $total;
                ?>

                <tr>
                  <td>{{$no++}}</td>
                  <td align="center">{{$DetailPayments->tsdttransaksi['ts_hdtransaksi_id']}}</td>
                  <td>
                    {{$DetailPayments->tsdttransaksi->productinfo['namaproducts']}}
                  </td>
                  <td>{{$DetailPayments->tsdttransaksi['jumlahpembelian']}}</td>
                  <td align="right">{{number_format($DetailPayments->hargabayar)}}</td>
                  <td align="right">{{number_format($total)}}</td>

                </tr>
                @endforeach

                <tr>
                  <td align="right" colspan="5"><strong>TOTAL</strong></td>
                  <td align="right"><strong>{{number_format($subtotal)}}</strong></td>
                </tr>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <style media="screen">
          .invoice-title h2, .invoice-title h3 {
              display: inline-block;
            }

            .table > tbody > tr > .no-line {
              border-top: none;
            }

            .table > thead > tr > .no-line {
              border-bottom: none;
            }

            .table > tbody > tr > .thick-line {
              border-top: 2px solid;
            }
          </style>

          <div class="container">
        	    <div class="row color-invoice">
              <div class="col-md-12" style="background:white;">
                #Sr. No: {{$DetailPayments->ts_hdpayment_id}}
                <div class="row">
                  <div class="col-lg-7 col-md-7 col-sm-7">
                    <h1>PEMBAYARAN</h1>
                    <strong>Tanggal Transaksi : </strong> {{date("Y-m-d",strtotime($DetailPayments->tsdttransaksi['created_at']))}}
                    <br />
                    <strong>Tanggal Pembayaran : </strong> {{date("Y-m-d",strtotime($DetailPayments->created_at))}}
                    <h3>Customer</h3>
                    <strong>{{$DetailPayments->tsdttransaksi->getheaderdata->customertransaksi['nama']}}, </strong> {{$DetailPayments->tsdttransaksi->getheaderdata->customertransaksi->alamat['alamat']}}
                    <br /> {{$DetailPayments->tsdttransaksi->getheaderdata->customertransaksi->alamat['kota']}} - {{$DetailPayments->tsdttransaksi->getheaderdata->customertransaksi->alamat['notelp']}}
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5 text-right">
                    <img src="{{url('img/logo.png')}}"/>
                    <br> Jalan Artha Gading Selatan No.1, Kelapa Gading Barat.
                    <br> Daerah Khusus Ibukota Jakarta 14240.
                    <h3> Contact</h3> Mob: +62 819-0832-7332
                    <br> info@laracommerce.com
                  </div>

                </div>

                <hr />
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <strong>DETAIL PEMBAYARAN :</strong>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Sub Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            $subtotal = 0;
                          ?>

                          @foreach($DetailPayment as $DetailPayments)
                          <?php
                          $total = $DetailPayments->tsdttransaksi['jumlahpembelian'] * $DetailPayments->hargabayar;
                          $subtotal += $total;
                          ?>

                          <tr>
                            <td>{{$no++}}</td>
                            <td>
                              {{$DetailPayments->tsdttransaksi->productinfo['namaproducts']}}
                            </td>
                            <td>{{$DetailPayments->tsdttransaksi['jumlahpembelian']}}</td>
                            <td align="right">{{number_format($DetailPayments->hargabayar)}}</td>
                            <td align="right">{{number_format($total)}}</td>

                          </tr>
                          @endforeach
                          <tr>
                            <td align="right" colspan="4"><h4><b>TOTAL</b></h4></td>
                            <td align="right"><h4><b>{{number_format($subtotal)}}</b></h4></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <strong> Important: </strong>
                    <ol>
                      <li>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.

                      </li>
                      <li>
                        Nulla eros eros, laoreet non pretium sit amet, efficitur eu magna.
                      </li>
                      <li>
                        Curabitur efficitur vitae massa quis molestie. Ut quis porttitor justo, sed euismod tortor.
                      </li>
                    </ol>
                  </div>
                </div>

                <div class="row">
                </div>
                <br/>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                <a href="#" class="btn btn-success btn-sm">Print Invoice</a>    
                <a href="#" class="btn btn-info btn-sm">Send to customer</a>
              </div>
            </div>

            <hr>
        </div>

    </section>
</div>


@endsection
