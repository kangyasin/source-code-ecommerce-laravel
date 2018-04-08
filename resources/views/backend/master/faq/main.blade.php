@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Faq LaraCommerce Yasin
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">FAQ</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">


                   <form action="/administrator/postfaq/1" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <div class="form-group">
                         <label>Deskripsi</label>
                         <textarea id="editor1" name="deskripsi" rows="10" cols="80">{{ $FaqData->deskripsi }}</textarea>
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
