@extends('admin.layouts.master')

@section('title')
User Edit
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="header">

    <h1 class="page-title">User Edit</h1>             
    <ul class="breadcrumb">
        <li><a href="#">Home</a> </li>
        <li><a href="#">User</a></li>
        <li class="active">Ubah User</li>
    </ul>

</div>
<div class="main-content">
     <form id="tab">
        <div class="form-group">
        <label>Username</label>
        <input type="text" value="jsmith" class="form-control">
        </div>
        <div class="form-group">
        <label>First Name</label>
        <input type="text" value="John" class="form-control">
        </div>
        <div class="form-group">
        <label>Last Name</label>
        <input type="text" value="Smith" class="form-control">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" value="jsmith@yourcompany.com" class="form-control">
        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea value="Smith" rows="3" class="form-control">2817 S 49th
Apt 314
San Jose, CA 95101</textarea>
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