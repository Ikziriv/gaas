@extends('admin.layouts.master')

@section('title')
Activities
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<ul class="nav nav-pills pull-right">
  <li class="active"><a href="{{url('user/deleteall')}}">Delete All</a></li>
</ul>
<div class="header">

    <h1 class="page-title">User Activities</h1>             
    <ul class="breadcrumb">
        <li><a href="#">Home</a> </li>
        <li><a href="#">User</a></li>
        <li class="active">Activities</li>
    </ul>

</div>
<div class="main-content">
<div class="panel panel-default">

<div class="panel-body">
  <div class="col-md-12">
    @if($options != null)
      <form action="{{route('activities')}}" method="get" class="">
        <div class="row gap-bottom gap-20">
          <div class="col-sm-6">
            <div class="form-group">
              <input type="text"
                     name="search_text"
                     placeholder="Search a description"
                     value="{{$options['search_text']}}"
                     class="form-control" />
            </div>
          </div>

          <div class="col-sm-3">
            <div class="form-group">
              <select name="level" id="level" class="form-control">
                <option value="">Select</option>
                <option value="info" {{($options['level'] === 'info') ? 'selected' : ''}}>Info</option>
                <option value="warning" {{($options['level'] === 'warning') ? 'selected' : ''}}>Warning</option>
                <option value="danger" {{($options['level'] === 'danger') ? 'selected' : ''}}>Danger</option>
              </select>
            </div>
          </div>

          <div class="col-sm-3">
            <button class="btn btn-success">
              <i class="fa fa-filter"></i> Filter
            </button>
            <a href="{{route('activities')}}" class="btn btn-primary">Reset</a>
          </div>
        </div>
      </form>
    @endif
  </div>

  <div class="col-md-12">
    <div class="row">
      <div class="col-sm-12 gap-bottom gap-10">
        <strong>Total: </strong>{{$rows->total()}}
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table">
        <thead>
        <tr>
          <th>#</th>
          <th>Description</th>
          <th>Level</th>
          <th>IP Address</th>
          <th>User id</th>
          <th>Time</th>
        </tr>
        </thead>

        <tbody>
        @foreach($rows as $watchdog)
          <tr>
            <td>{{$watchdog->id}}</td>
            <td>{{$watchdog->description}}</td>
            @if($watchdog->level = 'info')
            <td><span class="label label-info">{{$watchdog->level}}</span></td>
            @elseif($watchdog->level = 'warning')
            <td><span class="label label-warning">{{$watchdog->level}}</span></td>
            @else
            <td><span class="label label-danger">{{$watchdog->level}}</span></td>
            @endif
            <td>{{$watchdog->ip_address}}</td>
            <td>{{$watchdog->user_id}}</td>
            <td>{{$watchdog->created_at}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

      @if ($options != null)
        {{$rows->appends($options)->links()}}
      @else
        {{$rows->render()}}
      @endif

    </div>
  </div>
</div>
</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop