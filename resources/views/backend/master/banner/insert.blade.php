@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Image Banner
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Banner</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            @if(session('success'))
                       <div class="alert alert-success">
                           {{ session('success') }}
                       </div>
                   @endif
                   <form action="/administrator/postbanner" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       {{ method_field('post') }}
                       <div class="form-group">
                         <label>Judul Banner</label>
                         <input type="text" name="name" required class="form-control" value="{{ old('name') }}"/>
                       </div>

                       <div class="form-group">
                         <label>Link Banner</label>
                         <input type="text" name="link" required class="form-control" value="{{ old('link') }}"/>
                       </div>

                       <div class="form-group {{ !$errors->has('files') ?: 'has-error' }}">
                           <label>File</label>
                           <input type="file" name="files[]"multiple>

                           <span class="help-block text-danger">{{ $errors->first('files') }}</span>
                       </div>
                       <div class="form-actions">
                           <button type="submit" class="btn btn-primary">Upload</button>
                       </div>
                   </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
</div>
@endsection
