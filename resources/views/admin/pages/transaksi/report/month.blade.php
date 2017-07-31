@extends('admin.layouts.master')

@section('title')
Customer Detial Order
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<ul class="nav nav-pills pull-right">
  <li class="active"><a href="#"  onClick="window.print();"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
</ul>
<div class="header">
    <h1 class="page-title">Rincian Pemesanan Pelanggan</h1>                 
    <ul class="breadcrumb">
        <li><a href="/">Beranda</a> </li>
        <li><a href="/transaksi">Transaksi</a> </li>
        <li class="active">Transaksi Bulanan</li>
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
            <h2>MONTHLY</h2><br>
            <strong>REPORT</strong>
        </div>
    </div>
    <hr>
    <div class="row">

      <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-body">
        	  <div class="table-responsive">
              <table id="produk" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Produk Order</th>
                    <th>Tanggal</th>
                    <th>Qty</th>
                  </tr>
                </thead>
                @forelse($orders as $key => $order)
                <tbody>
                  <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $order->c_nama }}</td>
                    <td>{{ $order->p_nama }}</td>
                    <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                    <td>{{ $order->qty }}</td>
                    {{-- End --}}
                  </tr>
                </tbody>
                @empty
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>Tidak ada transaksi, bulan ini</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
                @endforelse
                <tfoot>
                  <tr>  
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    @if(empty($orders))
                    <th>{{$total = "Kosong"}}</th>
                    @else
                    <th>{{$total}}</th>
                    @endif
                  </tr>
                </tfoot>
              </table>
              {{ $orders->links() }}
              </div>
            </div>
        </div>
        <!--  -->
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