@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Thông tin tài khoản</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('index')}}">Home</a> / <span>Thông tin tài khoản</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('userinfo')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $er)
							{{$er}}
							@endforeach
						</div>
					@endif
					<div class="col-sm-6">
						<h4>Thông tin</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" id="email" value="{{Auth::user()->email}}" readonly required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="name" id="your_last_name" value="{{Auth::user()->full_name}}" required>
						</div>

						<div class="form-block">
							<label for="address">Address*</label>
							<input type="text" name="address" id="address" value="{{Auth::user()->address}}" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" id="phone" value="{{Auth::user()->phone}}" required>
						</div>
						<div class="form-block">
							<label for="pass">Password*</label>
							<input type="password" name="pass" id="password" required>
						</div>

						<div class="form-block">
							<button type="submit" class="btn btn-primary pull-left"><i class="fa fa-pencil-square-o"></i> Update</button>
							
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div class="form-block">
						<a href="{{route('changepass')}}"><button class="btn btn-danger pull-left"><i class="fa fa-key"></i>Đổi mật khẩu</button></a>
						</div>
					</div>
				</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

	 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

@endsection