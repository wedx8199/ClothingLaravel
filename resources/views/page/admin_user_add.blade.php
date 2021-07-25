@extends('master_admin')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm tài khoản khách hàng
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $er)
							{{$er}}
							@endforeach
						</div>
					@endif
                                <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{route('users_add')}}">
                                	@csrf
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Tên đầy đủ</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="name" name="name" minlength="2" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="phone" class="control-label col-lg-3">SĐT</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="address" class="control-label col-lg-3">Địa chỉ</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="address" name="address" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pass" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="pass" name="pass" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="repass" class="control-label col-lg-3">Nhập lại password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="repass" name="repass" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

	 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
@endsection