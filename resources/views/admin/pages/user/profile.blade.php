@extends('admin.layouts.master')

@section('title')
Profile User
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="header">

    <h1 class="page-title">Profile User</h1>             
    <ul class="breadcrumb">
        <li><a href="#">Home</a> </li>
        <li><a href="#">User</a></li>
        <li class="active">Profile</li>
    </ul>

</div>
<div class="main-content">
<div class="col-md-8">
    <form action="{{route('update-profile')}}" method="post" id="profiled-edit-form">

          {{csrf_field()}}
          <div class="col-md-4">
            <div class="form-group">
              <label for="display_name">Name:</label>
              <input type="text"
                     class="form-control"
                     name="name"
                     value="{{Auth::user()->name}}"
                     placeholder="Enter your name"/>
              <div class="Message error">{{$errors->first('name')}}</div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="display_name">Username:</label>
              <input type="text"
                     class="form-control"
                     name="name"
                     value="{{Auth::user()->username}}"
                     placeholder="Enter your username" disabled/>
              <div class="Message error">{{$errors->first('username')}}</div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="display_name">Email:</label>
              <input type="text"
                     class="form-control"
                     value="{{Auth::user()->email}}"
                     placeholder="Enter your email address" disabled/>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="display_name">First Name:</label>
              <input type="text"
                     class="form-control"
                     name="name"
                     value="{{Auth::user()->profile->first_name}}"
                     placeholder="Enter your first name"/>
              <div class="Message error">{{$errors->first('first_name')}}</div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="display_name">Last Name:</label>
              <input type="text"
                     class="form-control"
                     name="name"
                     value="{{Auth::user()->profile->last_name}}"
                     placeholder="Enter your last name"/>
              <div class="Message error">{{$errors->first('last_name')}}</div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="display_name">Full Name:</label>
              <input type="text"
                     class="form-control"
                     value="{{Auth::user()->profile->full_name}}"
                     placeholder="Enter your full name"/>
              <div class="Message error">{{$errors->first('full_name')}}</div>
            </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
            <label for="display_name">Phone:</label>
            <input type="text"
                   class="form-control"
                   name="phone"
                   value="{{Auth::user()->tlp}}"
                   placeholder="Enter your phone"/>
            <div class="Message error">{{$errors->first('tlp')}}</div>
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
            <label for="display_name">Country:</label>
            <input type="text"
                   class="form-control"
                   name="country"
                   value="{{Auth::user()->profile->country}}"
                   placeholder="Enter your country"/>
            <div class="Message error">{{$errors->first('country')}}</div>
          </div>
          </div>

          <div class="col-md-12">
          <div class="form-group">
            <label for="display_name">Alamat:</label>
            <textarea type="text"
                   class="form-control"
                   name="address"
                   placeholder="Enter your address">{{Auth::user()->alamat}}</textarea>
            <div class="Message error">{{$errors->first('alamat')}}</div>
          </div>
          </div>

          <div class="col-md-3">
          <div class="form-group">
            <label for="display_name">Twitter id:</label>
            <input type="text"
                   class="form-control"
                   name="twitter"
                   value="{{Auth::user()->profile->twitter}}"
                   placeholder="Enter your twitter username"/>
            <div class="Message error">{{$errors->first('twitter')}}</div>
          </div>
          </div>

          <div class="col-md-3">
          <div class="form-group">
            <label for="display_name">Facebook profile:</label>
            <input type="text"
                   class="form-control"
                   name="facebook"
                   value="{{Auth::user()->profile->facebook}}"
                   placeholder="Enter your facebook profile url"/>
            <div class="Message error">{{$errors->first('facebook')}}</div>
          </div>
          </div>

          <div class="col-md-3">
          <div class="form-group">
            <label for="display_name">Skype:</label>
            <input type="text"
                   class="form-control"
                   name="skype"
                   value="{{Auth::user()->profile->skype}}"
                   placeholder="Enter your Skype username"/>
            <div class="Message error">{{$errors->first('skype')}}</div>
          </div>
          </div>

          <div class="col-md-3">
          <div class="form-group">
            <label for="display_name">Linked In:</label>
            <input type="text"
                   class="form-control"
                   name="linkedin"
                   value="{{Auth::user()->profile->linkedin}}"
                   placeholder="Enter your Linekd In username"/>
            <div class="Message error">{{$errors->first('linkedin')}}</div>
          </div>
          </div>

          <div class="col-md-12">
          <div class="form-group">
            <label for="display_name">Designation:</label>
            <input type="text"
                   class="form-control"
                   name="designation"
                   value="{{Auth::user()->profile->designation}}"
                   placeholder="Enter your Linekd In username"/>
            <div class="Message error">{{$errors->first('designation')}}</div>
          </div>
          </div>


          <div class="col-md-12">
          <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Update
          </button>
          </div>
      </div>
    </form>
</div>

<div class="col-md-4">
    <form action="{{route('change-password')}}" method="post" id="change-password-form">
      {{csrf_field()}}
      <div class="page-title">
      <h3>Change Password</h3><hr>
      </div>
      <div class="col-md-12">
      <div class="form-group">
        <label for="">Current password</label>
        <input type="password" class="form-control"
               name="current_password"
               placeholder="Your current password"/>
        <span class="Message error">{{$errors->first('current_password')}}</span>
      </div>
      </div>

      <div class="col-md-12">
      <div class="form-group">
        <label for="">New password</label>
        <input type="password" class="form-control"
               name="new_password"
               placeholder="You new password"/>
        <span class="Message error">{{$errors->first('new_password')}}</span>
      </div>
      </div>

      <div class="col-md-12">
      <div class="form-group">
        <label for="">Confirm password</label>
        <input type="password" class="form-control"
               name="confirm_password"
               placeholder="Re enter your new password"/>
        <span class="Message error">{{$errors->first('confirm_password')}}</span>
      </div>
      </div>

      <div class="col-md-12">
      <button class="btn btn-success">
        <i class="fa fa-save"></i> Change
      </button>
      </div>
    </form>
</div>

</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop