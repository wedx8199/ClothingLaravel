@extends('master_admin')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!-- gallery -->
		<!-- gallery -->
	<div class="gallery">
		<h2 class="w3ls_head">Slide quảng cáo</h2>
		<div class="gallery-grids">
				<div class="gallery-top-grids">
@foreach($image as $img)
<form action="{{route('postUploadUpdate',$img->id)}}" method="post" enctype="multipart/form-data">
	@csrf
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
								<img width="300" height="250" src="source/image/slide/{{$img->image}}" alt="" />
								<div class="captn">
									<h4>Chỉnh sửa hình</h4>
									<br>
									<input type="file" name="updateFile" id="updateFile">
									<input type="submit">
									<a class="text-danger text" href="{{route('slideDelete',$img->id)}}"><button type="button"><i class="fa fa-times text-danger text"></i> Xóa hình</button></a>
								</div>
						</div>
					</div>
</form>
@endforeach
<form action="{{route('postUpload')}}" method="post" enctype="multipart/form-data">
	@csrf
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							
								<img src="source/image/slide/plus.png" alt="" />
								<div class="captn">
									<h4>Thêm hình</h4>
									<input type="file" name="newFile" id="newFile">
									<input type="submit">
								</div>
							
						</div>
					</div>
</form>
					<div class="clearfix"> </div>
				</div>
				<script src="source/admin/js/lightbox-plus-jquery.min.js"> </script>
		
	</div>
	</div>
	<!-- //gallery -->

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