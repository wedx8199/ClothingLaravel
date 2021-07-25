@extends('master_admin')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lí sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">

        <a href="{{route('admin_product_add')}}"><button class="btn btn-sm btn-default"><i class="fa fa-plus"></i>  Thêm</button></a>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">

            </th>
            <th>Mã sp</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Giá sale</th>
            <th>Số lượng</th>
            <th>Hình sản phẩm</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
@foreach($product as $pro)
          <tr>
            <td></td>
            <td>{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->description}}</td>
            <td>{{$pro->product_type->name}}</td>
            <td>{{number_format($pro->unit_price)}} VNĐ</td>
            <td>{{number_format($pro->promotion_price)}} VNĐ</td>
            <td>{{$pro->quantity}}</td>
            <td><img width="80" height="80" src="source/image/product/{{$pro->image}}" alt="" /></td>
            <td>
              <a href="{{route('admin_product_edit',$pro->id)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm?')" href="{{route('admin_product_delete',$pro->id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>

@endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <div class="row">{{$product->links()}}</div>
        </div>
      </div>
    </footer>
  </div>
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