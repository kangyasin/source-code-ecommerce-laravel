@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Stock Product
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Keluar Masuk Barang</h3>

                            
              <small><span class="btn btn-warning btn-delete btn-xs">Sisa Stok {{$TotalStok}}</span></small>
              <a href="/administrator/addstockproduct/{{Request::segment(3)}}/{{Request::segment(4)}}" class="btn btn-primary pull-right">Add Stock</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Masuk</th>
                  <th>Keluar</th>
                  <th>Total Stok</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                  <?php $no = 1;?>
                  @foreach($LogStocks as $DataStock)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$DataStock->tanggal}}</td>
                  <td>{{$DataStock->masuk}}</td>
                  <td>{{$DataStock->keluar}}</td>
                  <td>{{$DataStock->totalstok}}</td>
                  <td align="center">
                    <a href="/administrator/editstockproduct/{{Request::segment(3)}}/{{Request::segment(4)}}/{{$DataStock->id}}" class="btn btn-warning btn-detail btn-xs">Edit</a>
                  </td>
                  <td align="center">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deletestockproduct/{{Request::segment(3)}}/{{Request::segment(4)}}/{{$DataStock->id}}" class="btn btn-danger btn-delete btn-xs">Delete</a>
                  </td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Masuk</th>
                  <th>Keluar</th>
                  <th>Total Stok</th>
                  <th>Edit</th>
                  <th>Delete</th>
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
