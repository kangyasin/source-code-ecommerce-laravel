@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        About LaraCommerce Yasin
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">About</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">


                   <form action="/administrator/postabout/1" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <div class="form-group">
                         <label>Judul About</label>
                         <input type="text" name="name" required class="form-control" value="{{ $AboutData->name }}"/>
                       </div>

                       <div class="form-group">
                         <label>Deskripsi</label>
                         <textarea id="editor1" name="deskripsi" rows="10" cols="80">{{ $AboutData->deskripsi }}</textarea>
                       </div>

                       <div class="form-group">
                         <label>Alamat</label>
                         <textarea name="alamat" rows="4" cols="20" class="form-control">{{ $AboutData->alamat }}</textarea>
                       </div>

                       <div class="form-group">
                         <label>Maps Link</label>
                         <input type="text" name="email" required class="form-control" value="{{ $AboutData->maps }}"/>
                       </div>

                       <div class="form-group">
                         <label>Email</label>
                         <input type="text" name="email" required class="form-control" value="{{ $AboutData->email }}"/>
                       </div>



                       <div class="form-group">
                         <label>No Telp</label>
                         <input type="text" name="telp" required class="form-control" value="{{ $AboutData->notelp }}"/>
                       </div>


                       <div class="form-actions">
                           <button type="submit" class="btn btn-primary">Save</button>
                       </div>
                   </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
</div>
@endsection
