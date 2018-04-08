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
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Menu Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="/administrator/insertmenu" method="post" enctype="multipart/form-data" role="form">
              <!-- text input -->
              {{ csrf_field() }}
              <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" name="namamenu"  value="{{ old('namamenu') }}" required class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Controller</label>
                <input type="text" name="controller" value="{{ old('controller') }}" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Font Awesome (Icon) <small>eg.&#x3C;i class=&#x22;fa fa-dashboard&#x22;&#x3E;&#x3C;/i&#x3E;</smal></label>
                <input type="text" name="icon" value="{{ old('icon') }}" class="form-control">
              </div>
              <div class="form-group">
                <label>Menu Type</label>
                <select name="type" id="type" class="form-control" value="{{ old('type') }}">
                  <option value="B">B</option>
                  <option value="SA">SA</option>
                </select>
              </div>
              <input type="hidden" name="parent_number" value="0" value="{{ old('parent_number') }}">
              <input type="hidden" name="menulevel" value="1" value="{{ old('menulevel') }}">
              <div class="form-group">
                <label>Publish</label>
                <div class="checkbox">
                  <label>
                    <input id="publish" name="publish" type="checkbox" value="{{ old('publish') }}"> Publish Menu
                  </label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right" id="btn-save" value="add">Save</button>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
</div>
@endsection
