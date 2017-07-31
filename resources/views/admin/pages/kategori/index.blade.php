@extends('admin.layouts.master')

@section('title')
Kategori
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="header">

    <h1 class="page-title">Kategori Menu</h1>                    
    <ul class="breadcrumb">
        <li><a href="#">Home</a> </li>
        <li class="active">Kategori</li>
    </ul>

</div>
<div class="main-content">

<div class="main-content">
<div class="btn-toolbar list-toolbar">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
  <div class="btn-group">
  </div>
</div>
<div class="table-responsive">
<table id="kategori" class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Created</th>
      <th>Updated</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($kategoris as $key => $kategori)
    <tr>
      <td>{{ $key +1 }}</td>
      <td>{{ $kategori->name }}</td>
      <td>{{ Carbon::now()->toDayDateTimeString($kategori->created_at) }}</td>
      <td>{{ Carbon::now()->toDayDateTimeString($kategori->updated_at) }}</td>
      <td>
          <a href="user.html"><i class="fa fa-pencil"></i></a>
          <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#kategori').DataTable();
} );
</script>
@stop