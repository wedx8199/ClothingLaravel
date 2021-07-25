@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Tìm kiếm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<a href="https://bitis.com.vn/pages/outlet-2020"><img src="source/image/ad1.jpg" alt="" height="450px"></a>
						<a href="https://bitis.com.vn/collections/types?q=batman"><img src="source/image/ad2.jpg" alt="" height="450px"></a>
						<!-- <ul class="aside-menu"> -->
<!-- 							<li><a href="#">Sắp xếp theo giá tăng dần</a></li>
							<li><a href="#">Sắp xếp theo giá giảm dần</a></li>
							<li><a href="#">Sắp xếp theo tên từ A-Z</a></li>
							<li><a href="#">Sắp xếp theo tên từ Z-A</a></li> -->
<!-- 							<li><a href="#">Icon box</a></li>
							<li><a href="#">Notifications</a></li>
							<li><a href="#">Progress bars and Skill meter</a></li>
							<li><a href="#">Tabs</a></li>
							<li><a href="#">Testimonial</a></li>
							<li><a href="#">Video</a></li>
							<li><a href="#">Social icons</a></li>
							<li><a href="#">Carousel sliders</a></li>
							<li><a href="#">Custom List</a></li>
							<li><a href="#">Image frames &amp; gallery</a></li>
							<li><a href="#">Google Maps</a></li>
							<li><a href="#">Accordion and Toggles</a></li>
							<li class="is-active"><a href="#">Custom callout box</a></li>
							<li><a href="#">Page section</a></li>
							<li><a href="#">Mini callout box</a></li>
							<li><a href="#">Content box</a></li>
							<li><a href="#">Computer sliders</a></li>
							<li><a href="#">Pricing &amp; Data tables</a></li>
							<li><a href="#">Process Builders</a></li> -->
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							@if($danhmuc != 619)
							<h4>Tìm kiếm '{{$ten_sp}}' mục '{{$name->name}}'</h4>
							@else
							<h4>Tìm kiếm '{{$ten_sp}}'</h4>
							@endif
							<div class="beta-products-details">
								<p class="pull-left"></p>
<!-- 								<p class="pull-left">{{count($product)}}</p>
 -->								<div class="clearfix"></div>
							</div>

							<div class="row">
								@if(count($product) != 0)
								@foreach($product as $pro)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('product_detail',$pro->id)}}"><img src="source/image/product/{{$pro->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pro->name}}</p>
											<p class="single-item-price">
												@if($pro->promotion_price != 0)

												<span class="flash-del">{{number_format($pro->unit_price)}}</span>
												<span class="flash-sale">{{number_format($pro->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($pro->unit_price)}}</span> VNĐ

												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addsp',$pro->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$pro->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								@else
								<h7>Tìm thấy 0 sản phẩm</h7>
								@endif
							</div>
						</div> <!-- .beta-products-list -->
						<!--pagination -->
						<div class="row">{{$product->appends(Request::all())->links()}}</div>

<!-- 						<div class="space50">&nbsp;</div>
 -->


					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection