<div class="col-sm-3">
</div>
<div class="col-sm-6 form-box">
	<div class="form-top">
		<div class="form-top-left">
			<h3><strong>{{$title}}</strong></h3>
    		<p>{{$sub_title}}</p>
		</div>
		<div class="form-top-right">
			<i class="fa {{$icon}}"></i>
		</div>
		<div class="form-top-divider"></div>
    </div>
    <div class="form-bottom">
        @component('login.components.form')
            @slot('title1')
                Email
            @endslot
            @slot('title2')
                Password
            @endslot
            @slot('button_form')
                Login
            @endslot
        @endcomponent
    </div>
</div>