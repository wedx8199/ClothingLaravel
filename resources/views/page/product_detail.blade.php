@extends('master')
@section('content')
<style>
figure.zoom {
  background-position: 50% 50%;
  position: relative;
  width: 280px;
  overflow: hidden;
  cursor: zoom-in;
}

figure.zoom img:hover {
  opacity: 0;
}

figure.zoom img {
  transition: opacity 0.5s;
  display: block;
  width: 100%;
}
</style>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$product->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <a href="{{route('category',$product->id_type)}}" >{{$category_name->name}}</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<figure class="zoom" style="background:url(source/image/product/{{$product->image}})" onmousemove="zoom(event)" ontouchmove="zoom(event)">
							  <img src="source/image/product/{{$product->image}}" />
							</figure>
							<!-- <img src="source/image/product/{{$product->image}}" alt=""> -->
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" style="font-weight: bold">{{$product->name}}</p>
								<div class="space20">&nbsp;</div>
								<p class="single-item-price">
									Giá:
												@if($product->promotion_price != 0)

												<span class="flash-del">{{number_format($product->unit_price)}}</span>
												<span class="flash-sale">{{number_format($product->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($product->unit_price)}}</span> VNĐ

												@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>


							<div class="space20">&nbsp;</div>
@if($product->quantity > 0)
							<p>Số lượng:</p>
						<form id="myform" method="POST" action="{{route('muahang',$product->id)}}">
							@csrf
							<div class="single-item-options">
<!-- 								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select> -->
								<select class="wc-select" name="soluong">
									
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
<!-- 								<a class="add-to-cart" href="{{route('muahang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a> -->
								<a class="add-to-cart" href="javascript:document.getElementById('myform').submit();"><i class="fa fa-shopping-cart"></i></a>
								
								<div class="clearfix"></div>

							</div>
						</form>
@else
						<h6 class="inner-title">Hết hàng</h6>
@endif


						<div class="space20">&nbsp;</div>
						<p class="single-item-title">(Còn {{$product->quantity}} sản phẩm)</p>
						<div class="space20">&nbsp;</div>
							<div class="fb-share-button" data-href="http://localhost/MyLaravel/public/product_detail/{{$product->id}}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FMyLaravel%2Fpublic%2Fproduct_detail%2F{{$product->id}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả sản phẩm</a></li>
							<li><a href="#tab-reviews">Bình luận</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$product->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<div class="fb-comments" data-href="http://localhost/MyLaravel/public/product_detail/{{$product->id}}" data-numposts="20" data-width=""></div>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
							@foreach($product_related as $related)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('product_detail',$related->id)}}"><img src="source/image/product/{{$related->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$related->name}}</p>
										<p class="single-item-price">
												@if($related->promotion_price != 0)

												<span class="flash-del">{{number_format($related->unit_price)}}</span>
												<span class="flash-sale">{{number_format($related->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($related->unit_price)}}</span> VNĐ

												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('addsp',$related->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('product_detail',$related->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach

						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
@foreach($top_product as $top)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('product_detail',$top->id)}}"><img src="source/image/product/{{$top->image}}" alt="" height="58px"></a>
									<div class="media-body">
										{{$top->name}}
												@if($related->promotion_price != 0)

												<span class="beta-sales-price">{{number_format($related->promotion_price)}}</span> VNĐ
												
												@else
												<span class="beta-sales-price">{{number_format($related->unit_price)}}</span> VNĐ

												@endif
									</div>
								</div>
@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
@foreach($new_product as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('product_detail',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="58px"></a>
									<div class="media-body">
										{{$new->name}}
												@if($related->promotion_price != 0)

												<span class="beta-sales-price">{{number_format($related->promotion_price)}}</span> VNĐ
												
												@else
												<span class="beta-sales-price">{{number_format($related->unit_price)}}</span> VNĐ

												@endif
									</div>
								</div>
@endforeach
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
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


  function zoom(e) {
    var zoomer = e.currentTarget;
    e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
    e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
    x = (offsetX / zoomer.offsetWidth) * 100
    y = (offsetY / zoomer.offsetHeight) * 100
    zoomer.style.backgroundPosition = x + "% " + y + "%";
  }
  </script>
@endsection