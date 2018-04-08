@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Menu
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Category Product <b>{{ $CategoryProduct->namacategory }}</b></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="/administrator/updatecategoryproduct/{{ $CategoryProduct->id }}" method="post" enctype="multipart/form-data" role="form">
              <!-- text input -->
              {{ csrf_field() }}
              <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" name="namacategory"  value="{{ $CategoryProduct->namacategory }}" required class="form-control">
              </div>

              <div class="form-group">
                <label>Publish</label>
                <?php
                    $publish = $CategoryProduct->publish;

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

              <button type="submit" class="btn btn-primary pull-right" id="btn-save" value="add">Save</button>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
</div>
@endsection
