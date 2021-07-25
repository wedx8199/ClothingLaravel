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
			
			<form action="{{route('changepass')}}" method="post" class="beta-form-checkout">
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
						<h4>Đổi mật khẩu</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="passnew">Password mới</label>
							<input type="password" name="passnew" id="password" required>
						</div>
						<div class="form-block">
							<label for="repassnew">Nhập lại password mới</label>
							<input type="password" name="repassnew" id="password" required>
						</div>

						<div class="form-block">
							<button type="submit" class="btn btn-primary pull-left"><i class="fa fa-key"></i> Đổi mật khẩu</button>
							
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
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