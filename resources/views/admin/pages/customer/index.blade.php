@extends('admin.layouts.master')

@section('title')
User
@endsection
@section('style')
<style type="text/css" media="screen">
.center {
    margin-top:50px;   
}

.modal-header {
  padding-bottom: 5px;
}

.modal-footer {
      padding: 0;
  }
    
.modal-footer .btn-group button {
  height:40px;
  border-top-left-radius : 0;
  border-top-right-radius : 0;
  border: none;
  border-right: 1px solid #ddd;
}
  
.modal-footer .btn-group:last-child > button {
  border-right: 0;
}
</style>
@endsection

@section('content')
<ul class="nav nav-pills pull-right">
  <li class="active"><a href="{{ url('download/customer/xlsx') }}">XLSX</a></li>
  <li class="active"><a href="{{ url('download/customer/csv') }}">CSV</a></li>
</ul>
<div class="header">

    <h1 class="page-title">Menu Customer</h1>                 
    <ul class="breadcrumb">
        <li><a href="#">Beranda</a> </li>
        <li class="active">Pelanggan</li>
    </ul>

</div>
<div class="main-content">
<div class="col-md-12">
  @if (count($errors) > 0)
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>
<div class="col-md-12">
  <div class="btn-toolbar list-toolbar">
    <div class="btn-group">
      <button class="btn btn-primary create-modal">Tambah Pelanggan</button>
      <a href="{{ route('transaksi.create')}}">
        <button class="btn btn-default">Tambah Transaksi</button>
      </a>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="col-md-12">
      <div class="table-responsive">
        @include('admin.pages.customer.table')
      </div>
      {{ csrf_field() }}
<!--       <form action="{{ URL::to('import/customer') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="col-md-8"> 
          <div class="form-group">
              <input type="file" class="form-control" name="import_customer" id="import_customer" placeholder="Search"/>
          </div>
      </div>
      <div class="col-md-4"> 
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-file-excel-o"></i> Import
        </button>  
      </div>
      </form> -->
    </div>
  </div>
</div>
</div>

{{-- modal form create --}}
@include('admin.pages.customer.popup.create')
{{-- modal form edit --}}
@include('admin.pages.customer.popup.edit')
@endsection

@section('scripts')
<script type="text/javascript" src="{{url('js/operation/customer.js')}}"></script>
@stop