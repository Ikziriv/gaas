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

    <h1 class="page-title">Order Create</h1>         
    <h4 class="pull-right">Cashier : {{Auth::user()->name}}</h4>    
    <ul class="breadcrumb">
        <li><a href="/">Home</a> </li>
        <li><a href="{{route('transaksi.index')}}">Order</a></li>
        <li class="active">Order Create</li>
    </ul>

</div>
<div class="main-content">

    <div class="col-md-12">

      <div class="panel panel-default">
      <div class="panel-heading">Search Customer</div>
      <div class="panel-body">
        <div class="col-md-12">
          <div class="btn-toolbar list-toolbar">
            <div class="btn-group">
              <button class="btn btn-primary create-modal">Add Customer</button>
            </div>
          </div>
        </div>
        <form action="/" method="POST" class="form-horizontal">
        <div class="container-fluid">
            <div class="input-group col-md-12">
                <input type="text" class="form-control" placeholder="Nama / Phone"/>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        </form>
      </div>
      </div>
      </div>

    </div>

    <div class="col-md-12">

      <div class="panel panel-default">
      <div class="panel-heading">Add Order</div>
      <div class="panel-body">
          <form action="/" method="POST" class="form-horizontal">
          <div class="original-form">
          <div class="form-add">
            <div class="input-group">
              <div class="input-group-btn"> 
                <button class="btn btn-default add" type="button"><i class="fa fa-plus"></i> Tambah</button>
              </div>
            </div><br>
            <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <select class="form-control" name="name">
                  @foreach ($cnames as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                  </select>
                </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Barang</label>
                <select class="form-control" name="jns_b[]" id="jns_b[]">
                @foreach ($jns_b as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Qty</label>
                <input type="number" name="qty[]" class="form-control" min="0" max="99" pattern="\d+">
              </div>
            </div>
          </div>
          </div>

          <div class="col-md-12">
            <div class="form-group pull-left">
              <button class="btn btn-primary" type="submit">Order</button>
            </div>
          </div>

          </form>
      </div>
      </div>
    </div>

    <!-- Copy Fields -->
    <div class="copy hide">
    <div class="form-add">
      <div class="input-group">
        <div class="input-group-btn"> 
          <button class="btn btn-danger remove" type="button"><i class="fa fa-times"></i> Hapus</button>
        </div>
      </div><br>
      <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <select class="form-control" name="name">
            @foreach ($cnames as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
            </select>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Jenis Barang</label>
          <select class="form-control" name="jns_b[]" id="jns_b[]">
          @foreach ($jns_b as $key => $value)
              <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Qty</label>
          <input type="number" name="qty[]" class="form-control" min="0" max="99" pattern="\d+">
        </div>
      </div>
    </div>
    </div>

</div>

{{-- modal form create --}}
@include('admin.pages.customer.popup.create')
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function() {
    //     $("select").select2();
    // }); 
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".add").click(function(){ 
        var html = $(".copy").html();
        $(".original-form").after(html);
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".form-add").remove();
    });

  });
  // Create Modal Show
  $(document).on('click', '.create-modal', function(){
    $('.modal-title').text('Create Customer');
    $('#form-create').show();
    $('#createModal').modal('show');
  });
  // Click function ajax create
  $('.modal-footer').on('click', '.create', function(e){
    var id = $('#id').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var alamat = $('#alamat').val();
    var tlp = $('#tlp').val();
    var active = $('#active').val();
    $.post('createcustomer', {
        '_token' : $('input[name=_token]').val(),
        'id' : id,
        'name' : name,
        'email' : email,
        'alamat' : alamat,
        'tlp' : tlp,
        'active' : active

      }, 
      function(data){            
        if ( data.status === 'success' ) {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.success( data.data );
            setInterval(function() {
                window.location.reload();
            }, 2000);
        } else {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.error('Create customer data failed!');
            setInterval(function() {
                window.location.reload();
          }, 2000);
        }

    });
  });
</script>
@stop