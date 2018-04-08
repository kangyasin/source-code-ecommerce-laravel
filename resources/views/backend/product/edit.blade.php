@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit Product
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Product <b>{{ $Product->namaproducts }}</b></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="/administrator/updateproduct/{{Request::segment(3)}}/{{ $Product->id }}" method="post" enctype="multipart/form-data" role="form">
              <!-- text input -->
              {{ csrf_field() }}
              <div class="form-group">
                <label>Nama Product</label>
                <input type="text" name="namaproducts" value="{{ $Product->namaproducts}}" required class="form-control">
              </div>
              <div class="form-group">
                <label>ShortDesc</label><br/>
                <textarea name="shortdesc" rows="4" class="form-control">{{$Product->shortdesc}}</textarea>
              </div>
              <div class="form-group">
                <label>Deskripsi Product</label>
                <textarea id="editor1" name="deskripsi" rows="10" cols="80">{{$Product->deskripsi}}</textarea>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                <label>Publish</label>
                <?php
                    $publish = $Product->publish;

                    if($publish == 1){
                      $checked = 'checked';
                    }else{
                      $checked = '';
                    }
                ?>
                <div class="checkbox">
                  <label>
                    <input id="publish" name="publish" type="checkbox" {{$checked}}> Publish Category
                  </label>
                </div>
              </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                <label>Harga</label><br/>
                <input type="number" name="harga" value="{{$Product->harga}}" required class="form-control">
              </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Berat</label> <span class="label label-primary"> Satuan gram contoh 1kg isi dengan 1000</span><br/>
                  <input type="number" name="berat"  value="{{$Product->berat}}" required class="form-control">
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
