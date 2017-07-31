@extends('admin.layouts.master')

@section('title')
Kategori Edit
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="header">

    <h1 class="page-title">Kategori Edit</h1>               
    <ul class="breadcrumb">
        <li><a href="#">Home</a> </li>
        <li><a href="#">Kategori</a></li>
        <li class="active">Ubah Kategori</li>
    </ul>

</div>
<div class="main-content">
     <form id="tab">
        <div class="form-group">
        <label>Nama</label>
        <input type="text" value="jsmith" class="form-control">
        </div>
        <div class="form-group">
        <label>Jenis</label>
        <input type="text" value="John" class="form-control">
        </div>
        <div class="btn-toolbar list-toolbar">
	      <button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	      <a href="#myModal" data-toggle="modal" class="btn btn-primary">Batal</a>
	    </div>
        </form>

</div>

@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop