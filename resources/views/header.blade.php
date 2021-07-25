	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 220 Trần Bình Trọng, Quận 5</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
<!-- 						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li> -->
							<li><a href="{{route('userinfo')}}"><i class="fa fa-user"></i>Chào {{Auth::user()->full_name}}</a></li>
							<li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
						@else
							<li><a href="{{route('signin')}}"><i class="fa fa-key"></i>Đăng kí</a></li>
							<li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i>Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('index')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="searchbox" id="search" placeholder="Nhập từ khóa..." required />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</div>
					<div class="beta-comp">
							<div class="single-item-options">
								<select class="wc-select" name="danhmuc">
									<option value="619">Tất cả</option>
									@foreach($category as $cat)
									<option value="{{$cat->id}}">{{$cat->name}}</option>
									@endforeach
								</select>
							</div>
					</div>
						</form>

					<div class="beta-comp">
						<div class="cart">
							<a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng <i class="fa fa-chevron-down"></i></a>
<!-- 							<div class="beta-dropdown cart-body">
								
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="source/assets/dest/images/products/cart/1.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>


								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">$34.55</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="cart" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div> -->
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('index')}}">Trang chủ</a></li>
						<li><a href="#">Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($category as $cat)
								<li><a href="{{route('category',$cat->id)}}">{{$cat->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('about')}}">Giới thiệu</a></li>
						<li><a href="{{route('contact')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->