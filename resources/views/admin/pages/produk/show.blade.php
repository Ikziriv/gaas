@extends('admin.layouts.master')

@section('title')
Produk View
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="header">

    <h1 class="page-title">Rincian Menu Gudang</h1>                 
    <ul class="breadcrumb">
        <li><a href="/">Beranda</a> </li>
        <li><a href="/produk">Gudang</a> </li>
        <li class="active">Rincian Produk</li>
    </ul>

</div>

<div class="main-content">
  <div class="col-md-12">
    <div class="btn-toolbar list-toolbar">
        <a href="/produk"><button class="btn btn-primary" id="add-customer">Kembali</button></a>
    </div>
  </div>
	<div class="col-md-12">
  <div class="panel panel-primary">
    <div class="panel-heading"  style="background-color: white;">
    <div class="invoice-title">
      <h4><strong>{{$produk->nama}}</strong>
          <span class="label label-primary pull-right">Total Stock 
          <h4><strong>{{ $total }}</strong></h4></span>
      </h4>
    </div>
    </div>
    <div class="panel-body">
	  <div class="table-responsive">
      <table id="produk" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th style="width: 3.5em;">Stock</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($details as $key => $detail)
          <tr>
            <td>{{ $key +1 }}</td>
            <td>{{ date('d-m-Y', strtotime($detail->created_at)) }}</td>
            <td>{{ $detail->p_nama }}</td>
            <td>{{ $detail->qty }}</td>
            {{-- End --}}
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
	</div>
</div>


{{-- modal form edit --}}
@include('admin.pages.produk.popup.showedit')
@endsection

@section('scripts')

@stop