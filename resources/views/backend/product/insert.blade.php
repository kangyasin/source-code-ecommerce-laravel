@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Product
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Product Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="/administrator/postproduct/{{Request::segment(3)}}" method="post" enctype="multipart/form-data" role="form">
              <!-- text input -->
              {{ csrf_field() }}
              <div class="form-group">
                <label>Nama Product</label>
                <input type="text" name="namaproducts"  value="{{ old('namaproducts') }}" required class="form-control">
              </div>
              <div class="form-group">
                <label>ShortDesc</label><br/>
                <textarea name="shortdesc" rows="4" class="form-control">{{ old('ShortDesc') }}</textarea>
              </div>
              <div class="form-group">
                <label>Deskripsi Product</label>
                <textarea id="editor1" name="deskripsi" rows="10" cols="80">{{ old('deskripsi') }}</textarea>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Publish</label>
                  <div class="checkbox">
                    <label>
                      <input id="publish" name="publish" type="checkbox" {{ old('publish') }}> Publish Product
                    </label>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Harga</label><br/>
                  <input type="number" name="harga"  value="{{ old('harga') }}" required class="form-control">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Berat</label> <span class="label label-primary"> Satuan gram contoh 1kg isi dengan 1000</span><br/>
                  <input type="number" name="berat"  value="{{ old('berat') }}" required class="form-control">
                </div>
              </div>

              <button type="submit" class="btn btn-lg btn-primary pull-right" id="btn-save" value="add">Save</button>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
</div>
@endsection
