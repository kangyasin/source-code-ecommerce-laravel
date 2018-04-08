@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Gallery Banner
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Banner</h3>
              <a href="/administrator/addbanner" class="btn btn-primary pull-right">Add Banner</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Link</th>
                  <th>Image</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                  <?php $no = 1;?>
                  @foreach($ImageData as $ImageDatas)
                <tr>
                  <td align="center" style="vertical-align:middle">{{$no++}}</td>
                  <td align="center" style="vertical-align:middle">{{ $ImageDatas->name }}</td>
                  <td align="center" style="vertical-align:middle">{{ $ImageDatas->link }}</td>
                  <td align="center" style="vertical-align:middle"><img src="{{ Storage::url('banner/'.$ImageDatas->image) }}" title="{{ $ImageDatas->name }}" width="150"></td>
                  <td align="center" style="vertical-align:middle">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deletebanner/{{$ImageDatas->id}}" class="btn btn-danger btn-delete btn-xs">Delete</a>
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
