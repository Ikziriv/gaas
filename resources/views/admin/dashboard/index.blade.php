@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="header">
{{--     <div class="stats">
        <p class="stat"><span class="label label-info">5</span> Tickets</p>
        <p class="stat"><span class="label label-success">27</span> Tasks</p>
        <p class="stat"><span class="label label-danger">15</span> Overdue</p>
    </div> --}}

    <h1 class="page-title">Dashboard</h1>
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> </li>
        <li class="active">Dashboard</li>
    </ul>

</div>
<div class="main-content">

<div class="panel panel-default">
    <a href="#page-stats" class="panel-heading" data-toggle="collapse">Latest Stats</a>
    <div id="page-stats" class="panel-collapse panel-body collapse in">

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="knob-container">
                    <input class="knob" data-width="200" data-min="0" data-max="3000" data-displayPrevious="true" value="{{$count1}}" data-fgColor="#92A3C2" data-readOnly=true;>
                    <h3 class="text-muted text-center">
                        <button type="button" class="btn btn-primary" id="show-new">New</button></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="knob-container">
                    <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="{{$count2}}" data-fgColor="#92A3C2" data-readOnly=true;>
                    <h3 class="text-muted text-center">
                        <button type="button" class="btn btn-warning" id="show-process">Process</button></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="knob-container">
                    <input class="knob" data-width="200" data-min="0" data-max="2700" data-displayPrevious="true" value="{{$count3}}" data-fgColor="#92A3C2" data-readOnly=true;>
                    <h3 class="text-muted text-center">
                        <button type="button" class="btn btn-danger" id="show-pending">Pending</button></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="knob-container">
                    <input class="knob" data-width="200" data-min="0" data-max="15000" data-displayPrevious="true" value="{{$count4}}" data-fgColor="#92A3C2" data-readOnly=true;>
                    <h3 class="text-muted text-center">
                        <button type="button" class="btn btn-success" id="show-completed">Completed</button></h3>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>

{{-- modal form --}}
@include('admin.dashboard.popup.new')
@include('admin.dashboard.popup.process')
@include('admin.dashboard.popup.pending')
@include('admin.dashboard.popup.completed')
@endsection

@section('scripts')
<script type="text/javascript">
// Show new click
$('#show-new').on('click', function() {
  $('#show-form-new').modal();
})
// Show process click
$('#show-process').on('click', function() {
  $('#show-form-process').modal();
})
// Show pending click
$('#show-pending').on('click', function() {
  $('#show-form-pending').modal();
})
// Show completed click
$('#show-completed').on('click', function() {
  $('#show-form-completed').modal();
})
</script>
@stop