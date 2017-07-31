@extends('admin.layouts.master')

@section('title')
User
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="header">

    <h1 class="page-title">User Menu</h1>                 
    <ul class="breadcrumb">
        <li><a href="#">Home</a> </li>
        <li class="active">Users</li>
    </ul>

</div>
<div class="main-content">
<div class="btn-toolbar list-toolbar">
    <a href="{{ route('user.create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Add</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="table-responsive">
<table id="user" class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Role</th>
      <th>Full Name</th>
      <th>Username</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Status</th>
      <th style="width: 3.5em;"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $key => $user)
    <tr>
      <td>{{ $key +1 }}</td>
      @if($user->role_id == 1)
      <td><span class="label label-primary">Super Admin</span></td>
      @else
      <td><span class="label label-primary">Admin</span></td>
      @endif
      <td><strong>{{ $user->name }}</strong></td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->tlp }}</td>
      <td>{{ $user->email }}</td>
      @if($user->active == 1)
      <td><span class="label label-success">Active</span></td>
      @else
      <td><span class="label label-danger">Passive</span></td>
      @endif
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
    $('#user').DataTable();
} );
</script>
@stop