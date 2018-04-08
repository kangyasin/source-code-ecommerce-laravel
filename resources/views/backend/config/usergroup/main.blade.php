@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Group Admin
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Group Admin</h3>
                <a href="/administrator/addusergroup" class="btn btn-primary pull-right">Add UserGroup</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Group</th>
                  <th>Total User</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;?>
                @foreach($usergroups as $usergroup)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$usergroup->namagroup}}</td>
                  <td><a href="/administrator/configuseradmin/{{$usergroup->id}}" class="btn btn-block btn-primary btn-xs">{{count($usergroup->user)}} user</a></td>
                  <td align="center">
                    <a href="/administrator/editusergroup/{{$usergroup->id}}" class="btn btn-warning btn-detail">Edit</a>
                  </td>
                  <td align="center">
                    <a href="/administrator/deleteusergroup/{{$usergroup->id}}" class="btn btn-danger btn-detail">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Group</th>
                  <th>Total User</th>
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
