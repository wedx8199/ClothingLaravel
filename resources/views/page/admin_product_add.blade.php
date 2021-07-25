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
                            Thêm sản phẩm
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{route('product_add')}}" enctype="multipart/form-data">
                                	@csrf
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Tên sản phẩm</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="name" name="name" minlength="2" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-3">Mô tả</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="description" name="description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="category" class="control-label col-lg-3">Danh mục</label>
                                        <div class="col-lg-6">
											<select name="category">
												@foreach($category as $cat)
												<option value="{{$cat->id}}">{{$cat->name}}</option>
												@endforeach
											</select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="price" class="control-label col-lg-3">Giá</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="price" name="price" required min="1000">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="quantity" class="control-label col-lg-3">Số lượng</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newFile" class="control-label col-lg-3">Hình sản phẩm</label>
                                        <div class="col-lg-6">
											<input type="file" name="newFile" id="newFile">
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