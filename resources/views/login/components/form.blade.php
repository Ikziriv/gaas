<form role="form" method="POST" action="{{ url('login') }}">
    {{ csrf_field() }}
    <div class="form-group">
    	<label class="sr-only" for="form-username">{{$title1}}</label>
    	<input type="text" id="username" name="username" placeholder="Email..." class="form-control">
        <div class="HelpText error">{{$errors->first('username')}}</div>
    </div>
    <div class="form-group">
    	<label class="sr-only" for="form-password">{{$title2}}</label>
    	<input type="password" id="password" name="password" placeholder="Password..." class="form-control">
        <div class="HelpText error">{{$errors->first('password')}}</div>
    </div>
      <div class="checkbox">
        <label>
          <input id="memory" type="checkbox" name="remember" value="1"> Remember me
        </label>
      </div>
    <button type="submit" class="btn btn-primary">{{$button_form}}</button>
</form>