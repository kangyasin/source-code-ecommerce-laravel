@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Customer
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
              <!-- <a href="/administrator/addcategoryproduct" class="btn btn-primary pull-right">Add New Category</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                  <?php $no = 1;?>
                @foreach($Customer as $Customers)
                @if($Customers->status == 0)
                  <?php $status = 'Customer';?>
                @elseif($Customers->status == 1)
                  <?php $status = 'Member';?>
                  @elseif($Customers->status == 2)
                    <?php $status = 'Verifikasi';?>
                @else
                  <?php $status = 'Suspend';?>
                @endif
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$Customers->nama}}</td>
                  <td>{{$Customers->email}}</td>
                  <td align="center">
                    <a href="/administrator/changstatus/{{$Customers->id}}/{{$Customers->status}}">
                      {!!$status!!}
                    </a>
                  </td>

                  <td align="center">
                    <a href="/administrator/editcustomer/{{$Customers->id}}" class="btn btn-warning btn-detail">Edit</a>
                  </td>
                  <td align="center">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deletecustomer/{{$Customers->id}}" class="btn btn-danger btn-delete">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Status</th>
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
