@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tambah Stok Product
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Stok</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="/administrator/poststockproduct/{{Request::segment(3)}}/{{Request::segment(4)}}/{{Request::segment(5)}}" method="post" enctype="multipart/form-data" role="form">
              <!-- text input -->
              {{ csrf_field() }}
              <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="number" name="jumlahstok"  value="0" required class="form-control">
              </div>
              <button type="submit" class="btn btn-primary pull-right" id="btn-save" value="add">Save</button>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
</div>
@endsection
