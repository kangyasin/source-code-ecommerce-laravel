@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')
<script>
  $(document).ready(function(e) {
  $("#description").keyup(function(){
      el = $(this);
      if(el.val().length >= 150){
          el.val( el.val().substr(0, 150) );
      } else {
          $("#countDesc").text(150-el.val().length);
      }
  });

  $("#keyword").keyup(function(){
      el = $(this);
      if(el.val().length >= 400){
          el.val( el.val().substr(0, 400) );
      } else {
          $("#countKey").text(400-el.val().length);
      }
  });

});
function updateLogo() {
    if (document.getElementById("ubahlogo").checked) {
        document.getElementById("logos").style.display = "block";
        document.getElementById("logoupdate").disabled = false;

    }else{
        document.getElementById("logos").style.display = "none";
        document.getElementById("logoupdate").disabled = true;
    }
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Config
      </h1>
    </section>

    <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Config Shop</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            @if(session('success'))
                 <div class="alert alert-success">
                     {{ session('success') }}
                 </div>
             @endif


                   <form action="/administrator/postconfig/1" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <div class="form-group">
                         <label>Judul Web</label>
                         <input type="text" name="webtitle" required class="form-control" value="{{$ConfigData->webtitle}}"/>
                       </div>

                       <div class="form-group">
                         <label>Meta Deskripsi</label>
                         <textarea id="description" name="webdesc" class="form-control">{{$ConfigData->webdesc}}</textarea>
                         Maksimal 150 karakter : <span id="countDesc" class="label label-danger">{{150 - mb_strlen($ConfigData->webdesc)}}</span>
                       </div>

                       <div class="form-group">
                         <label>Meta Keyword</label>
                         <textarea id="keyword" name="webkeyword" class="form-control">{{$ConfigData->webkeyword}}</textarea>
                         Maksimal 400 karakter : <span id="countKey" class="label label-danger">{{400 - mb_strlen($ConfigData->webkeyword)}}</span>
                       </div>

                       <div class="col-md-3">
                         <div class="form-group">
                           <label>Facebook Link</label>
                           <input type="text" name="facebook" class="form-control" value="{{$ConfigData->facebook}}"/>
                         </div>
                       </div>

                       <div class="col-md-3">
                         <div class="form-group">
                           <label>Twitter Link</label>
                           <input type="text" name="twitter" class="form-control" value="{{$ConfigData->twitter}}"/>
                         </div>
                       </div>

                       <div class="col-md-3">
                         <div class="form-group">
                           <label>Instagram Link</label>
                           <input type="text" name="instagram" class="form-control" value="{{$ConfigData->instagram}}"/>
                         </div>
                       </div>

                       <div class="col-md-3">
                         <div class="form-group">
                           <label>GooglePlus Link</label>
                           <input type="text" name="google" class="form-control" value="{{$ConfigData->google}}"/>
                         </div>
                       </div>

                       <div class="form-group {{ !$errors->has('files') ?: 'has-error' }}">
                         <label>Logo</label><br/>
                         <img src="{{ Storage::url($ConfigData->logo) }}" title="{{ $ConfigData->logo }}" width="150"><br/>
                           <div class="input-checkbox">
                             <input type="checkbox" id="ubahlogo" name="ubahlogo" onclick="javascript:updateLogo();">
                             <label class="font-weak">Ubah logo ?</label>
                             <div id="logos" style="display:none; margin-bottom:5px;">
                               <input id="logoupdate" type="file" name="files" class="form-control" disabled>
                             </div>
                           </div>

                           <span class="help-block text-danger">{{ $errors->first('files') }}</span>
                       </div>

                       <div class="form-actions">
                           <button type="submit" class="btn btn-lg btn-primary pull-right">Save</button>
                       </div>
                   </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
</div>
@endsection
