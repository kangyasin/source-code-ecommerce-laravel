@extends('front/master')

@section('title')
LaraCommerce Yasin - Member Area
@endsection

@section('content')

<style>

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}
.col-md-3{
padding:0 0 0 15px;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-usermenu {
  margin-top: 30px;
  padding:0px !important;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* order Content */
.order-content {
  padding: 20px;
  background: #F6F9FB;
  min-height: 460px;
}
.form_main {
    width: 100%;
}
.form_main h4 {
    font-family: roboto;
    font-size: 20px;
    font-weight: 300;
    margin-bottom: 15px;
    margin-top: 20px;
    text-transform: uppercase;
}
.heading {
    border-bottom: 1px solid #A9A59F;
    padding-bottom: 9px;
    position: relative;
}
.heading span {
    background: #6D6C6A none repeat scroll 0 0;
    bottom: -2px;
    height: 3px;
    left: 0;
    position: absolute;
    width: 75px;
}
.form {
    border-radius: 7px;
    padding: 6px;
}
.txt[type="text"] {
    border: 1px solid #ccc;
    margin: 5px 0;
    padding: 4px 0 4px 5px;
	border-radius:5px;
    width: 80%;
}
.txt[type="password"] {
    border: 1px solid #ccc;
    margin: 5px 0;
    padding: 4px 0 4px 5px;
	border-radius:5px;
    width: 80%;
}
/*.txt2[type="submit"] {
    background: #949390 none repeat scroll 0 0;
    border: 1px solid #949390;
    border-radius: 10px;
    color: #fff;
    font-size: 16px;
    font-style: normal;
    line-height: 35px;
    margin: 10px 0;
    padding: 0;

    width: 12%;
}*/
.txt2:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #949390;
    transition: all 0.5s ease 0s;
}

	</style>

  <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h3 class="modal-title" id="lineModalLabel">Edit Alamat</h3>
    </div>
    <form action="/customer/updatealamat" method="post">
      {{ csrf_field() }}
    <div class="modal-body">

    </div>
    <div class="modal-footer">
      <div class="btn-group btn-group-justified" role="group" aria-label="group button">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
        </div>
        <div class="btn-group btn-delete hidden" role="group">
          <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
        </div>
        <div class="btn-group" role="group">
          <button type="submit" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
    <script>
    $(document).ready(function(e) {
        $('.editalamat').click(function() {

            var v_token = "{{csrf_token()}}";
            var id_alamat = $(this).attr("alt");
            $.ajax({
                type: "POST",
                url: '/customer/getdataalamat',
                data: {id_alamat: id_alamat, _token: v_token},
                success: function( msg ) {
                    $(".modal-body").html(msg);
                }
            });
        });

        $('.deletealamat').click(function() {
            var alamatID = $(this).attr("data-alamat-id");
            deleteMember(alamatID);
          });

          function deleteMember(alamatID) {
            var v_token = "{{csrf_token()}}";
            swal({
              title: "Are you sure?",
              text: "Are you sure that you want to delete this member?",
              type: "warning",
              showCancelButton: true,
              showLoaderOnConfirm: true,
              closeOnConfirm: false,
              confirmButtonText: "Yes, delete it!",
              confirmButtonColor: "#ec6c62"
            }, function() {
              $.ajax({
                type: "POST",
                url: '/customer/getdataalamat/id='+alamatID+'&_token='+v_token,
              })
              .done(function(data) {
                swal({
                    title: "Deleted",
                    text: "Member has been successfully deleted",
                    type: "success"
                },function() {
                    location.reload();
                });
              })
              .error(function(data) {
                swal("Oops", "We couldn't connect to the server!", "error");
              });
            });
          }

        });

  </script>

  @if (alert()->ready())
      <script>
          swal({
              title: "{!! alert()->message() !!}",
              type: "{!! alert()->type() !!}",
              text: "{!! alert()->option('text') !!}",
              showCancelButton: "{!! alert()->option('showCancelButton') !!}",
              cancelButtonColor: "{!! alert()->option('cancelButtonColor') !!}",
              confirmButtonColor: "{!! alert()->option('confirmButtonColor') !!}",
              confirmButtonText: "{!! alert()->option('confirmButtonText') !!}",
          }).then(function () {
              swal(
                  '{!! alert()->option('deleted') !!}',
                  '{!! alert()->option('msg') !!}',
                  '{!! alert()->option('type') !!}'
              )
          });
      </script>
  @endif


<!-- section -->
	<div class="container">
    <div class="row profile">
			@include('front/member/mastermenu')
			<div class="col-md-9 order-content">
				<div class="form_main col-md-4 col-sm-5 col-xs-7">
					<div class="form">
            @if(session('success'))
                 <div class="alert alert-success">
                     {{ session('success') }}
                 </div>
             @endif
	          <h4 class="heading"><strong>Informasi </strong> Alamat <span></span></h4>

            @foreach($DataAlamat->alamats as $DataAlamats)
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              @if($DataAlamats->main ==1)
              <div class="notice notice-warning">
                <div class="pull-right">
                  <ul class="nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                      <ul class="dropdown-menu">
                        <li><a class="editalamat" data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;" alt="{{$DataAlamats->id}}">Edit <span class="fa fa-pencil pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a class="deletealamat" style="cursor:pointer;" data-alamat-id="{{$DataAlamats->id}}">Delete <span class="fa fa-trash pull-right"></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <strong>{{$DataAlamats->namalamat}}</strong><br/>
                <i>Alamat : </i> {{$DataAlamats->alamat}}<br/>
                <i>Kota : </i> {{$DataAlamats->kota}}<br/>
                <i>Kode Pos : </i> {{$DataAlamats->kodepos}}
              </div>
              @else
              <div class="notice notice-default">
                <div class="pull-right">
                  <ul class="nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="/customer/setalamat/{{$DataAlamats->id}}">Set Main <span class="fa fa-check-square pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a class="editalamat" data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;" alt="{{$DataAlamats->id}}">Edit <span class="fa fa-pencil pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="/customer/deletealamat/{{$DataAlamats->id}}">Delete <span class="fa fa-trash pull-right"></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                  <strong>{{$DataAlamats->namalamat}}</strong><br/>
                  <i>Alamat : </i> {{$DataAlamats->alamat}}<br/>
                  <i>Kota : </i> {{$DataAlamats->kota}}<br/>
                  <i>Kode Pos : </i> {{$DataAlamats->kodepos}}

              </div>
              @endif
              </div>
            @endforeach

	      </div>
	      </div>

			</div>
		</div>
	</div>
	<!-- /section -->



@endsection
