@extends('master_admin')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Doanh thu shop
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <form role="search" method="post" id="searchform" action="{{route('admin_doanhthu')}}">
          @csrf
        <div class="input-group">
          <input type="date" name="day1" class="input-sm form-control" placeholder="" required>
          <input type="date" name="day2" class="input-sm form-control" placeholder="" required>
        </div>
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
            
          </span>
        </form>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <h4><u>Tổng:</u></h4>
        <br>
        <h2>{{number_format($orders->sum('total'))}} VNĐ</h2>

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