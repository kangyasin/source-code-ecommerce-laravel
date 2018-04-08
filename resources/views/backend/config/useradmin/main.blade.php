@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog">

</div>
</div>
<script>
$(document).ready(function(e) {
    $('.adduseradmin').click(function() {
        var v_token = "{{csrf_token()}}";
        var group_id = {{Request::segment(3)}};
        $.ajax({
            type: "POST",
            url: '/administrator/adduseradmin',
            data: {group_id: group_id, _token: v_token},
            success: function( msg ) {
                $(".modal-dialog").html(msg);
            }
        });
    });

    $('.edituseradmin').click(function() {
        var v_token = "{{csrf_token()}}";
        var group_id = {{Request::segment(3)}};
        var id = $(this).attr("data-id");
        $.ajax({
            type: "POST",
            url: '/administrator/edituseradmin',
            data: {id: id, group_id: group_id, _token: v_token},
            success: function( msg ) {
                $(".modal-dialog").html(msg);
            }
        });
    });

    $('.changepassword').click(function() {
        var v_token = "{{csrf_token()}}";
        var group_id = {{Request::segment(3)}};
        var id = $(this).attr("data-id");
        $.ajax({
            type: "POST",
            url: '/administrator/changepassword',
            data: {id: id, group_id: group_id, _token: v_token},
            success: function( msg ) {
                $(".modal-dialog").html(msg);
            }
        });
    });

    $('.deleteuseradmin').click(function() {
        var v_token = "{{csrf_token()}}";
        var group_id = {{Request::segment(3)}};
        var id = $(this).attr("data-id");
            swal({
              title: "Are you sure to delete this  of ?",
              text: "Delete Confirmation?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Delete",
              closeOnConfirm: false
            },
            function() {
                $.ajax({
                    type: "POST",
                    url: '/administrator/deleteuseradmin',
                    data: {id:id},
                    success: function(data) {}
                    })
                    .done(function(data) {
                      swal("Deleted!", "Data successfully Deleted!", "success");
                    })
                    .error(function(data) {
                      swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
    });
});
</script>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Admin
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table User Admin</h3>
                <a class="btn btn-primary pull-right adduseradmin" data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;">Add User Admin</a>
            </div>
            @if(session('sukses'))
               <div class="alert alert-success">
                   {{ session('sukses') }}
               </div>
            @endif

            @if(session('status'))
               <div class="alert alert-warning">
                   {{ session('status') }}
               </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>Change Password</th>
                  <th>Reset Password</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;?>
                @foreach($useradmin as $useradmins)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$useradmins->name}}</td>
                  <td>{{$useradmins->email}}</td>
                  <td align="center">
                    <a data-id="{{$useradmins->id}}" class="btn btn-default btn-detail changepassword" data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;">Ubah Password</a>
                  </td>
                  <td align="center">
                    <a data-id="{{$useradmins->id}}" class="btn btn-success btn-detail resetpassword" data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;">Reset Password</a>
                  </td>
                  <td align="center">
                    <a data-id="{{$useradmins->id}}" class="btn btn-warning btn-detail edituseradmin" data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;">Edit</a>
                  </td>
                  <td align="center">
                    <a data-id="{{$useradmins->id}}" class="btn btn-danger btn-detail deleteuseradmin">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>Change Password</th>
                  <th>Reset Password</th>
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
