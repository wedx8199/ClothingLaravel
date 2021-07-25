@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('index')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form id="formlast" action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-6">
@if(Auth::check())
						<h4>Thông tin của tài khoản</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" value="{{Auth::user()->full_name}}" readonly required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" value="{{Auth::user()->email}}" readonly required>
						</div>

						<div class="form-block">
							<label for="address">Địa chỉ*</label>
							<input type="text" id="address" name="address" value="{{Auth::user()->address}}" readonly required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" readonly required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
@else
						<h4>Thông tin người mua</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" placeholder="expample@gmail.com" required>
						</div>

						<div class="form-block">
							<label for="address">Địa chỉ*</label>
							<input type="text" id="address" name="address" placeholder="Street Address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
@endif
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@foreach($content as $item)
										
										<div class="media">
											<img width="20%" height="20%" src="source/image/product/{{$item->options->img}}" alt="" class="pull-left">
											<div class="media-body">
												<a href="{{route('product_detail',$item->id)}}"><p class="font-large">{{$item->name}}</p></a>
												<span class="color-gray your-order-info">Đơn giá: {{number_format($item->price)}} đ</span>
												<span class="color-gray your-order-info">SL: {{$item->qty}}</span>

												<!-- lấy $item->rowId chứ ko phải là id trên sql -->

												<a href="{{route('deletesp',$item->rowId)}}"><img width="5%" height="5%" src="source/image/trash.png" class="pull-right"></a>
												<a href="{{route('reducesp',$item->rowId)}}"><img width="5%" height="5%" src="source/image/delete.png" class="pull-right"></a>
												<a href="{{route('addsp',$item->id)}}"><img width="5%" height="5%" src="source/image/plus.png" class="pull-right"></a>
											</div>
										</div>
										
									<!-- end one item -->
									@endforeach
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{$total}} VNĐ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>
@if($total!=0)
							
							<!-- <div class="text-center"><a class="beta-btn primary" href="javascript:document.getElementById('formlast').submit();">Đặt hàng <i class="fa fa-chevron-right"></i></a></div> -->
							<div class="text-center"><button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Đặt hàng</button></div>
@else
							<div class="text-center"><a style="pointer-events: none; cursor: default;" href="">Giỏ hàng đang trống</a></div>
@endif
						</div> <!-- .your-order -->
					</div>
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