@extends('admin.layouts.master')

@section('title')
Produk
@endsection
@section('style')
<style type="text/css" media="screen">
#loadingmessage {
  height: 400px;
  position: relative;
  background-color: gray; /* for demonstration */
}
.ajax-loader {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  margin: auto; /* presto! */
}
</style>
@endsection

@section('content')
<div class="header">
    <h1 class="page-title">Menu Gudang</h1>                 
    <ul class="breadcrumb">
        <li><a href="/">Beranda</a> </li>
        <li class="active">Gudang</li>
    </ul>

</div>

<div class="main-content">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        @include('admin.pages.produk.partials.tab')
        <div class="table-responsive"><br>
          @include('admin.pages.produk.table')
        </div>
        </div>
      </div>
  </div>
</div>

{{-- modal form create --}}
@include('admin.pages.produk.popup.create')
{{-- modal form edit --}}
@include('admin.pages.produk.popup.edit')
{{-- modal form edit --}}
@include('admin.pages.produk.popup.showedit')
@endsection

@section('scripts')
<script type="text/javascript" src="{{url('js/operation/produk.js')}}"></script>
@stop