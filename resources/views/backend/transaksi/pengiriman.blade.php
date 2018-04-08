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
    <h3 class="modal-title" id="lineModalLabel">Status Pengiriman</h3>
  </div>
  <form action="/administrator/updatepengiriman" method="post">
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
              url: '/administrator/getdatapengiriman',
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
        Pengiriman
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Pengiriman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>ID Payment</th>
                  <th>Customer</th>
                  <th>Tanggal Trans</th>
                  <th>Tanggal Payment</th>
                  <th>No Resi</th>
                  <th>Total</th>
                  <th>Item</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody id="data-list">
                <?php $no = 1;?>
                @foreach($DataPesanan as $DataPesanans)

                @if($DataPesanans->statuspayment == 0)
                  <?php $publish = '<span class="label label-success">Konfirmasi</span>';?>
                @elseif($DataPesanans->statuspayment == 1)
                  <?php $publish = '<span class="label label-warning">Dibayar</span>';?>
                @elseif($DataPesanans->statuspayment == 2)
                  <?php $publish = '<span class="label label-info">Proses Kirim</span>';?>
                @elseif($DataPesanans->statuspayment == 3)
                  <?php $publish = '<span class="label label-primary">Dikirim</span>';?>
                @elseif($DataPesanans->statuspayment == 4)
                  <?php $publish = '<span class="label label-primary">Terima</span>';?>
                @elseif($DataPesanans->statuspayment == 5)
                  <?php $publish = '<span class="label label-success">Ditolak</span>';?>
                @endif
                <tr>
                  <td>{{$no++}}</td>
                  <td align="center">{{$DataPesanans->id}}</td>
                  <td>
                  <a href="/administrator/detailpembayaran/{{$DataPesanans->id}}">
                    {{$DataPesanans->headertransaksi->customertransaksi->nama}}
                  </a>
                  </td>
                  <td>{{$DataPesanans->headertransaksi->tanggaltransaksi}}</td>
                  <td>{{$DataPesanans->tanggalpayment}}</td>
                  <td>{{$DataPesanans->headertransaksi->noresi}}</td>
                  <td align="right">{{number_format($DataPesanans->totalpayment)}}</td>
                  <td align="center">{{count($DataPesanans->headertransaksi->detailtransaksi)}} item</td>
                  <td align="center">
                    <a class="editstatus" data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;" alt="{{$DataPesanans->id}}">
                      {!!$publish!!}
                    </a>
                  </td>

                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>ID Payment</th>
                  <th>Customer</th>
                  <th>Tanggal Trans</th>
                  <th>Tanggal Payment</th>
                  <th>No Resi</th>
                  <th>Total</th>
                  <th>Item</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
</div>


@endsection
