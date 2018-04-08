@extends('backend.dashboardmaster')
@section('title')
Dashboard LaraCommerce Yasin
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Bank
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Bank</h3>
              <a href="/administrator/addbank" class="btn btn-primary pull-right">Add Bank Account</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name Bank</th>
                  <th>Info Bank</th>
                  <th>Image</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody id="data-list">
                  <?php $no = 1;?>
                  @foreach($DataBank as $DataBanks)
                <tr>
                  <td align="center" style="vertical-align:middle">{{$no++}}</td>
                  <td align="center" style="vertical-align:middle">{{ $DataBanks->namabank }}</td>
                  <td align="center" style="vertical-align:middle">{{ $DataBanks->infobank }}</td>
                  <td align="center" style="vertical-align:middle"><img src="{{ Storage::url('bank/'.$DataBanks->image) }}" title="{{ $DataBanks->namabank }}" width="150"></td>
                  <td align="center" style="vertical-align:middle">
                    <!-- <i class="fa fa-trash text-red"></i> -->
                    <a href="/administrator/deletbank/{{$DataBanks->id}}" class="btn btn-danger btn-delete btn-xs">Delete</a>
                  </td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Name Bank</th>
                  <th>Info Bank</th>
                  <th>Image</th>
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
