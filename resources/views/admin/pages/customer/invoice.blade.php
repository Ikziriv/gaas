@extends('admin.layouts.master')

@section('title')
Customer Detial Order
@endsection
@section('style')
<style type="text/css" media="screen">
.style5 {
  background-color: #fff;
  border-top: 2px dashed #8c8b8b;
}

</style>
@endsection

@section('content')
<ul class="nav nav-pills pull-right">
  <li class="active"><a href="#"  onClick="window.print();"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a></li>
</ul>
<div class="header">
    <h1 class="page-title">Invoice Pelanggan</h1>                 
    <ul class="breadcrumb">
        <li><a href="/">Beranda</a> </li>
        <li><a href="/customer">Pelanggan</a> </li>
        <li class="active">Invoice Pelanggan</li>
    </ul>
</div>

<div class="main-content">
<!--   <div class="col-md-12">
    <div class="btn-toolbar list-toolbar">
        <a href="/customer"><button class="btn btn-primary" id="add-customer">Kembali</button></a>
    </div>
  </div> -->
<section class="scrollable wrapper" id="print">
	<div class="col-md-12">
    <div class="row">
        <div class="col-xs-6">
            <h2 style="margin-top: 0px">PT. GAS <b>INDONESIA</b></h2>
            <p>Jalan Bintaro Raya <br>
                12330 Bintaro, Jakarta Selatan<br>
                Indonesia
            </p>
        </div>
        <div class="col-xs-6 text-right">
            <h2><strong>INVOICE</strong></h2><br>
            <span class="label label-primary">Pemesanan Pelanggan {{$customer->id}}</span>
        </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12 m-t" style="margin-bottom: 50px">
          <div class="row">
              <div class="col-xs-6">
                  <strong>Kepada :</strong>
                  <h4>{{$customer->name}}</h4>
                  <address>                   
                  <strong>Telephone :</strong><br> 
                      {{$customer->tlp}}<br>
                  </address>
              </div>
              <div class="col-xs-6 text-right">
                  <address>            
                  <strong>Deskripsi :</strong><br>
                      {{$customer->email}}<br>
                      {{$customer->alamat}}<br>
                  </address>
                  <p class="m-t m-b">Tanggal : <br>
                  <strong>{{ Carbon::now()->toFormattedDateString($customer->created_at) }}</strong><br>
                  </p>
              </div>
              <div class="col-md-12">
                  <div class="table-responsive">
                    <table id="produk" class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Barang</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Qty</th>
                        </tr>
                      </thead>
                      @forelse($orders as $order)
                      <tbody>
                        <tr>
                          <td class="text-center">{{ $order->p_nama }}</td>
                          <td class="text-center">{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                          <td class="text-center">{{ $order->qty }}</td>
                          {{-- End --}}
                        </tr>
                      </tbody>
                      @empty
                      <tbody>
                        <tr>
                          <td class="text-center">Order Tidak Ada</td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                      @endforelse
                    </table>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-xs-8">
              <p><i> Buy goods  cdsncl dskjckjds sdc dsjbc dsv sdjuguas csaasooief aihashasfnsakoasss sa fosafosa yfoasyfoaisfoa asfas f sa foyaosyosayf as f asyofyoasyfas as</i></p>

              <p>Recvied By: __________________ </p>
          </div>
      </div>

      <div class="col-md-12">
        <hr class="style5">
      </div>
    </div>
	</div>
</section>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop