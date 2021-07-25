@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Danh mục</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <span>Danh mục</span>
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
						<ul class="aside-menu">
							<li><a href="{{route('categorysorttang',$category_name->id)}}"><i class="fa fa-arrow-up"></i>Sắp xếp theo giá tăng dần</a></li>
							<li><a href="{{route('categorysortgiam',$category_name->id)}}"><i class="fa fa-arrow-down"></i>Sắp xếp theo giá giảm dần</a></li>
							<li><a href="{{route('categorysortaz',$category_name->id)}}"><i class="fa fa-sort-alpha-asc"></i>Sắp xếp theo tên từ A-Z</a></li>
							<li><a href="{{route('categorysortza',$category_name->id)}}"><i class="fa fa-sort-alpha-desc"></i>Sắp xếp theo tên từ Z-A</a></li>
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

						<a href="https://bitis.com.vn/pages/outlet-2020"><img src="source/image/ad1.jpg" alt="" height="450px"></a>
						<a href="https://bitis.com.vn/collections/types?q=batman"><img src="source/image/ad2.jpg" alt="" height="450px"></a>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							
							<h4>{{$category_name->name}}</h4>

							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($category_type as $cat_type)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('product_detail',$cat_type->id)}}"><img src="source/image/product/{{$cat_type->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$cat_type->name}}</p>
											<p class="single-item-price">
												@if($cat_type->promotion_price != 0)

												<span class="flash-del">{{number_format($cat_type->unit_price)}}</span>
												<span class="flash-sale">{{number_format($cat_type->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($cat_type->unit_price)}}</span> VNĐ

												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addsp',$cat_type->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$cat_type->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
						</div> <!-- .beta-products-list -->
						<!--pagination -->
						<div class="row">{{$category_type->links()}}</div>

						<div class="space50">&nbsp;</div>


						<div class="beta-products-list">
							<h4>Other Products</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($category_other as $other)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('product_detail',$other->id)}}"><img src="source/image/product/{{$other->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$other->name}}</p>
											<p class="single-item-price">
												@if($other->promotion_price != 0)

												<span class="flash-del">{{number_format($other->unit_price)}}</span>
												<span class="flash-sale">{{number_format($other->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($other->unit_price)}}</span> VNĐ

												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addsp',$other->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$other->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
							<div class="space40">&nbsp;</div>

							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
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