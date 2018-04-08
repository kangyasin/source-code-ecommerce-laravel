@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Gallery Product
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Gallery Product</h3>
              <a href="/administrator/addgalleryproduct/{{Request::segment(3)}}/{{Request::segment(4)}}" class="btn btn-primary pull-right">Add Image</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                  <?php $no = 1;?>
                  @foreach($ImageData as $ImageDatas)
                <tr>
                  <td align="center" style="vertical-align:middle">{{$no++}}</td>
                  <td><img src="{{ Storage::url($ImageDatas->nameimage) }}" title="{{ $ImageDatas->nameimage }}" width="150"></td>
                  <td align="center" style="vertical-align:middle">
                    <a href="/administrator/editgalleryproduct/{{Request::segment(3)}}/{{Request::segment(4)}}/{{$ImageDatas->id}}" class="btn btn-warning btn-detail btn-xs">Edit</a>
                  </td>
                  <td align="center" style="vertical-align:middle">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deletegalleryproduct/{{Request::segment(3)}}/{{Request::segment(4)}}/{{$ImageDatas->id}}" class="btn btn-danger btn-delete btn-xs">Delete</a>
                  </td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Image</th>
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
