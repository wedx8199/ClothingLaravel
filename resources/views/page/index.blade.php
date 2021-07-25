@extends('master')
@section('content')
<style>
* {
  box-sizing: border-box;
}

.row1 {
  display: flex;
}

/* Create three equal columns that sits next to each other */
.column1 {
  flex: 50%;
  padding: 5px;
}
</style>

	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="space20">&nbsp;</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<img src="source/image/slide/maxresdefault.jpg" style="width:100%">
<div class="row1">
  <div class="column1">
    <img src="source/image/ad3.jpg" alt="Snow" style="width:100%">
  </div>
  <div class="column1">
    <img src="source/image/ad4.jpg" alt="Mountains" style="width:100%">
  </div>
</div>

				
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $newhang)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('product_detail',$newhang->id)}}"><img src="source/image/product/{{$newhang->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$newhang->name}}</p>
											<p class="single-item-price">
												@if($newhang->promotion_price != 0)

												<span class="flash-del">{{number_format($newhang->unit_price)}}</span>
												<span class="flash-sale">{{number_format($newhang->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($newhang->unit_price)}}</span> VNĐ

												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addsp',$newhang->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$newhang->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>


							<!--pagination -->
							<div class="row">{{$new_product->links()}}</div>



						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Products On Sale</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($top_product as $tophang)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('product_detail',$tophang->id)}}"><img src="source/image/product/{{$tophang->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$tophang->name}}</p>
											<p class="single-item-price">
												@if($tophang->promotion_price != 0)

												<span class="flash-del">{{number_format($tophang->unit_price)}}</span>
												<span class="flash-sale">{{number_format($tophang->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($tophang->unit_price)}}</span> VNĐ

												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addsp',$tophang->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$tophang->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
						</div> <!-- .beta-products-list -->


							<!--pagination -->
							<div class="row">{{$top_product->links()}}</div>



					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
		</div>
		</div>
@endsection