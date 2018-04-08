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
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Menu</h3>
              <a href="/administrator/addmenu" class="btn btn-primary pull-right">Add New Menu</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Menu</th>
                  <th>Controller</th>
                  <th>Child</th>
                  <th>Publish</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                  <?php $no = 1;?>
                @foreach($menu as $menus)
                @if($menus->publish == 1)
                  <?php $publish = '<i class="fa fa-check-circle-o text-aqua"></i>';?>
                @else
                  <?php $publish = '<i class="fa fa-circle-o text-red"></i>';?>
                @endif
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$menus->namamenu}}</td>
                  <td>{{$menus->controller}}</td>
                  <td>
                    <a href="/administrator/configmenuchild/{{$menus->id}}" class="btn btn-block btn-primary btn-xs">{{$count[$menus->id]}} child</a>
                  </td>
                  <td align="center">
                    <a href="/administrator/publishmenu/{{$menus->id}}/{{$menus->publish}}">
                      {!!$publish!!}
                    </a>
                  </td>
                  <td align="center">
                    <a href="/administrator/editmenu/{{$menus->id}}" class="btn btn-warning btn-detail">Edit</a>
                  </td>
                  <td align="center">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deletemenu/{{$menus->id}}" class="btn btn-danger btn-delete">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Controller</th>
                  <th>Nama Menu</th>
                  <th>Child</th>
                  <th>Publish</th>
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
