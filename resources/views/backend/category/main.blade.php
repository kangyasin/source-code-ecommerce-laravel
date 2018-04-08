@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Category
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Category</h3>
              <a href="/administrator/addcategoryproduct" class="btn btn-primary pull-right">Add New Category</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Category</th>
                  <th>Product</th>
                  <th>Publish</th>
                  <th>Feature</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                  <?php $no = 1;?>
                @foreach($CategoryProduct as $CategoryProducts)
                @if($CategoryProducts->publish == 1)
                  <?php $publish = '<i class="fa fa-check-circle-o text-aqua"></i>';?>
                @else
                  <?php $publish = '<i class="fa fa-circle-o text-red"></i>';?>
                @endif
                @if($CategoryProducts->feature == 1)
                  <?php $feature = '<i class="fa fa-check-circle-o text-aqua"></i>';?>
                @else
                  <?php $feature = '<i class="fa fa-circle-o text-red"></i>';?>
                @endif
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$CategoryProducts->namacategory}}</td>
                  <td>
                    <a href="/administrator/product/{{$CategoryProducts->id}}" class="btn btn-block btn-primary btn-xs">{{count($CategoryProducts->product)}} products</a>
                  </td>
                  <td align="center">
                    <a href="/administrator/publishcategoryproduct/{{$CategoryProducts->id}}/{{$CategoryProducts->publish}}">
                      {!!$publish!!}
                    </a>
                  </td>
                  <td align="center">
                    <a href="/administrator/featurecategoryproduct/{{$CategoryProducts->id}}/{{$CategoryProducts->feature}}">
                      {!!$feature!!}
                    </a>
                  </td>
                  <td align="center">
                    <a href="/administrator/editcategoryproduct/{{$CategoryProducts->id}}" class="btn btn-warning btn-detail">Edit</a>
                  </td>
                  <td align="center">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deletecategoryproduct/{{$CategoryProducts->id}}" class="btn btn-danger btn-delete">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Category</th>
                  <th>Product</th>
                  <th>Publish</th>
                  <th>Feature</th>
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
