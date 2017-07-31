@extends('admin.layouts.master')

@section('title')
Transaksi Create
@endsection
@section('style')
<style type="text/css" media="screen">


</style>
@endsection

@section('content')
<div class="header">

    <h1 class="page-title">Tambah Pemesanan</h1>         
    <h4 class="pull-right">Cashier : {{Auth::user()->name}}</h4>    
    <ul class="breadcrumb">
        <li><a href="/">Beranda</a> </li>
        <li><a href="{{route('transaksi.index')}}">Pemesanan</a></li>
        <li class="active">Tambah Pemesanan</li>
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
    @if (session('status'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
    @endif
    </div>
    <div class="col-md-12">

      <div class="panel panel-default">
      <div class="panel-heading">Tambah Order</div>
      <div class="panel-body">
      <div class="col-md-12">
      <div class="table-responsive">
      <form action="{{url('createorder')}}" role="form" method="POST" class="form-horizontal">

<!--         <div class="col-md-12">
        <hr>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex: John Doe" >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ex: jhon@doe.com" >
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="4" ></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Telephone</label>
            <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Ex: 08xxxxxx" >
          </div>
        </div>
        <div class="col-md-12 hidden">
          <div class="form-group">
            <input type="checkbox" value="1" id="active" name="active" checked="true"> Active
          </div>
        </div>
       -->
        <!--  -->
        <div class="col-md-12">
        {{ csrf_field() }}
        <table class="table table-hover" id="tab_order">
          <thead>
            <tr >
              <th class="text-center">
                No
              </th>
              <th class="text-center">
                Nama
              </th>
              <th class="text-center">
                Jenis Barang
              </th>
              <th class="text-center">
                Qty
              </th>
              <th class="text-center">
                
              </th>
            </tr>
          </thead>
          <tbody class="resultbody">
            <tr>
              <td class="no text-center">1</td>
              <td>
                <select class="form-control select2" name="customername[]" id="customername">
                @foreach ($cnames as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
                </select>
              </td>
              <td>
                <select class="form-control select2" name="produk_id[]" id="produk_id">
                @foreach ($jns_b as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
                </select>
              </td>
              <td>
                <input type="hidden" name="new[]" id="new" class="form-control" value="1">
                <input type="hidden" name="otw[]" id="otw" class="form-control" value="0">
                <input type="hidden" name="done[]" id="done" class="form-control" value="0">
                <input type="number" name="qty[]" id="qty" class="form-control" min="0" max="99" pattern="\d+" onkeypress="return isNumber(event)">
                <input type="hidden" name="created_at[]" id="created_at" class="form-control" value="{{Carbon::now()}}">
              </td>
              <td class="text-center">
                  <button class="btn btn-default pull-right delete" id="rmRow">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
        <div class="col-md-12">
        <table class="table">
          <tbody>
          <tr>
            <td>
              <a href="{{ route('customer.index') }}" class="create-modal">
                <input type="button" class="btn btn-default" value="Tambah Customer">
              </a>

              <input type="submit" class="btn btn-primary" value="Simpan">
            </td>
            <td>
            </td>
            <td></td>
            <td></td>
            <td><input type="button" class="btn btn-default pull-right addRow" value="Tambah"></td>
          </tr>   
          </tbody>
        </table> 
        </div>
      </form>
      </div>
      </div>
      </div>
      </div>
    </div>

</div>

{{-- modal form create --}}
@include('admin.pages.transaksi.popup.create')
@endsection

@section('scripts')
<script type="text/javascript">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script type="text/javascript">
$(function () {
  $('.resultbody').delegate('#produk_id', 'change', function(){
    var tr = $(this).parent().parent();
    tr.find('#qty').focus();
  });
  $('.addRow').on('click', function(){
    addRow();
  });
  function addRow(){
    var n = ($('.resultbody tr').length - 0) + 1;
    var tr = '<tr>'+
                  '<td class="no text-center">' + n + '</td>' +
                  '<td>'+
                    '<select class="form-control select2" name="customername[]" id="customername">'+
                    '@foreach ($cnames as $key => $value)'+
                        '<option value="{{ $key }}">{{ $value }}</option>'+
                    '@endforeach'+
                    '</select>'+
                  '</td>'+
                  '<td>'+
                    '<select class="form-control select2" name="produk_id[]" id="produk_id">'+
                    '@foreach ($jns_b as $key => $value)'+
                        '<option value="{{ $key }}">{{ $value }}</option>'+
                    '@endforeach'+
                    '</select>'+
                  '</td>'+
                  '<td>'+
                    '<input type="hidden" name="new[]" id="new" class="form-control" value="1" ">'+
                    '<input type="hidden" name="otw[]" id="otw" class="form-control" value="0" ">'+
                    '<input type="hidden" name="done[]" id="done" class="form-control" value="0" ">'+
                    '<input type="number" name="qty[]" id="qty" class="form-control" min="0" max="99" pattern="\d+" onkeypress="return isNumber(event)">'+
                    '<input type="hidden" name="created_at[]" id="created_at" class="form-control" value="{{Carbon::now()}}">'+
                  '</td>'+
                  '<td class="text-center">'+
                      '<button class="btn btn-default pull-right delete" id="rmRow">Hapus</button>'+
                  '</td>'+
              '</tr>';
    $('.resultbody').append(tr);
  }
  $('.resultbody').delegate('.delete', 'click', function () {
      $(this).parent().parent().remove();
  });

});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2({ width: '100%' });
    }); 
</script>
@stop