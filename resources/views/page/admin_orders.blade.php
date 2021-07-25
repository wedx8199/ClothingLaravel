@extends('master_admin')
@section('content')



<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lí đơn đặt hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
          
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">

      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">

            </th>
            <th>Mã hóa đơn</th>
            <th>Mã khách hàng</th>
            <th>Ngày đặt</th>
            <th>Thanh toán</th>
            <th>Ghi chú</th>
            <th>Tổng tiền</th>
            <th>Status</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
@foreach($orders as $ord)
          <tr>
            <td></td>
            <td>{{$ord->id}}</td>
            <td>{{$ord->id_customer}}</td>
            <td>{{$ord->date_order}}</td>
            <td>{{$ord->payment}}</td>
            <td>{{$ord->note}}</td>
            <td>{{number_format($ord->total)}} VNĐ</td>
            <td>
              @if($ord->status==2)
                  Đã hoàn thành đơn hàng
              @elseif($ord->status==1)
                  Đã xác nhận đơn hàng
              @else
                  Chưa xử lí đơn hàng
              @endif
            </td>
            <td>
              <a href="{{route('admin_orders_detail',$ord->id)}}" ui-toggle-class=""><i class="fa fa-search-plus"></i></a>
              @if($ord->status==0)
              <a onclick="return confirm('Bạn có muốn xác nhận đơn?')" href="{{route('admin_orders_confirm',$ord->id)}}" ui-toggle-class=""><i class="fa fa-thumbs-up text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn hủy đơn hàng?')" href="{{route('admin_orders_cancel',$ord->id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              @elseif($ord->status==1)
              <a href="{{route('print_order',$ord->id)}}" ui-toggle-class=""><i class="fa fa-print text-muted"></i></a>
              <a onclick="return confirm('Bạn có muốn hoàn tất đơn?')" href="{{route('admin_orders_done',$ord->id)}}" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn hủy đơn hàng?')" href="{{route('admin_orders_cancel',$ord->id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              @else
              <a href="{{route('print_order',$ord->id)}}" ui-toggle-class=""><i class="fa fa-print text-muted"></i></a>
              @endif
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
			<div class="row">{{$orders->links()}}</div>
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