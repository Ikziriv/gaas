@extends('admin.layouts.master')

@section('title')
Purchase Order
@endsection
@section('style')
<style type="text/css" media="screen">
</style>
@endsection

@section('content') 
<ul class="nav nav-pills pull-right">
  <li class="active">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Harian 
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="{{url('transaksi/daily')}}">Print</a></li>
      <li class="divider"></li>
      <li><a href="{{ url('download/transaksi/harian/xls') }}">XLS</a></li>
      <li><a href="{{ url('download/transaksi/harian/xlsx') }}">XLSX</a></li>
      <li><a href="{{ route('pdfharian',['download'=>'pdf']) }}">PDF</a></li>
    </ul>
  </li>
  <li class="active">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bulanan 
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="{{url('transaksi/month')}}">Print</a></li>
      <li class="divider"></li>
      <li><a href="{{ url('download/transaksi/bulanan/xls') }}">XLS</a></li>
      <li><a href="{{ url('download/transaksi/bulanan/xlsx') }}">XLSX</a></li>
      <li><a href="{{ route('pdfbulanan',['download'=>'pdf']) }}">PDF</a></li>
    </ul>
  </li>
</ul>
<div class="header">

    <h1 class="page-title">Menu Pemesanan</h1>                 
    <ul class="breadcrumb">
        <li><a href="/">Beranda</a> </li>
        <li class="active">Pemesanan</li>
    </ul>

</div>

<div class="main-content">
<div class="col-md-12">
  <div class="btn-toolbar list-toolbar">
      <a href="{{ route('transaksi.create')}}"><button class="btn btn-primary">Tambah Pemesanan</button></a>
    <div class="btn-group">
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="col-md-12">
        <div class="table-responsive"><br>
        <table class="table" id="transaksi">
          <thead>
            <tr>
              <th>#</th>
              <th>Status</th>
              <th>Proses</th>
              <th>Selesai</th>
              <th>Nama</th>
              <th>Produk</th>
              <th>Qty</th>
            </tr>
          </thead>
          {{ csrf_field() }}
          <tbody>
            {{ $status='' }}
            @foreach ($transaksis as $key => $transaksi)
            <tr {{ $transaksi->otw? 'class="warning"' : '' }} {{ $transaksi->done? 'class="success"' : '' }}>
              <td>{{ $key +1 }}</td>
              @if($transaksi->new == 1 AND $transaksi->otw == 0 AND $transaksi->done == 0)
              <td><span class="label label-primary">{{ $status='Baru' }}</span></td>
              @elseif($transaksi->new == 1 AND $transaksi->otw == 1 AND $transaksi->done == 0)
              <td><span class="label label-warning">{{ $status='Otw' }}</span></td>
              @elseif($transaksi->new == 1 AND $transaksi->otw == 1 AND $transaksi->done == 1)
              <td><span class="label label-success">{{ $status='Selesai' }}</span></td>
              @else
              <td>{{ $status='Nothing' }}</td>
              @endif
              <td>
              {!! Form::checkbox('otw', $transaksi->id, $transaksi->otw , ['class' => 'checkotw']) !!}
              </td>
              <td>{!! Form::checkbox('done', $transaksi->id, $transaksi->done , ['class' => 'checkdone']) !!}</td>
              <td><a href="customer/{{ $transaksi->customer->id }}"><strong>{{ $transaksi->customer->name }}</strong></a></td>
              <td>{{ $transaksi->produk->nama }}</td>
              <td>{{ $transaksi->qty}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
  </div>

  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{url('js/operation/transaksi.js')}}"></script>
@stop