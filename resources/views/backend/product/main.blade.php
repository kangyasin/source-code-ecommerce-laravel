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
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Product</h3>
              <a href="/administrator/addproduct/{{Request::segment(3)}}" class="btn btn-primary pull-right">Add New Product</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Product</th>
                  <th>Stok</th>
                  <th>Gallery</th>
                  <th>Publish</th>
                  <th>Deals</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                <?php $no = 1;?>
                @foreach($ProductData as $ProductDatas)
                <?php
                $collection = $ProductDatas->stokproduct;
                ?>
                @if($ProductDatas->publish == 1)
                  <?php $publish = '<i class="fa fa-check-circle-o text-aqua"></i>';?>
                @else
                  <?php $publish = '<i class="fa fa-circle-o text-red"></i>';?>
                @endif


                @if($ProductDatas->deals == 1)
                  <?php $deals = '<i class="fa fa-check-circle-o text-aqua"></i>';?>
                @else
                  <?php $deals = '<i class="fa fa-circle-o text-red"></i>';?>
                @endif
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$ProductDatas->namaproducts}}</td>
                  <td>
                    <a href="/administrator/stockproduct/{{Request::segment(3)}}/{{$ProductDatas->id}}" class="btn btn-block btn-primary btn-xs">{{$collection->sum('masuk')}} stock</a>
                  </td>
                  <td>
                    <a href="/administrator/galleryproduct/{{Request::segment(3)}}/{{$ProductDatas->id}}" class="btn btn-block btn-primary btn-xs"><i class="fa fa-picture-o"></i></a>
                  </td>
                  <td align="center">
                    <a href="/administrator/publishproduct/{{Request::segment(3)}}/{{$ProductDatas->id}}/{{$ProductDatas->publish}}">
                      {!!$publish!!}
                    </a>
                  </td>
                  <td align="center">
                    <a href="/administrator/dealsproduct/{{Request::segment(3)}}/{{$ProductDatas->id}}/{{$ProductDatas->deals}}">
                      {!!$deals!!}
                    </a>
                  </td>
                  <td align="center">
                    <a href="/administrator/editproduct/{{Request::segment(3)}}/{{$ProductDatas->id}}" class="btn btn-warning btn-detail btn-xs">Edit</a>
                  </td>
                  <td align="center">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deleteproduct/{{Request::segment(3)}}/{{$ProductDatas->id}}" class="btn btn-danger btn-delete btn-xs">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Product</th>
                  <th>Stok</th>
                  <th>Gallery</th>
                  <th>Publish</th>
                  <th>Deals</th>
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
