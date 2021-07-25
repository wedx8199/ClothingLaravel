@extends('master_admin')
@section('content')
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}
.modal-backdrop {
  z-index: -1;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>


   
    <div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thông tin đơn {{$billnum}}</h4>
          </div>
          <div class="modal-body">
                <table class="table table-striped b-t b-light">
                  <thead>
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                    </tr>
                  </thead>
                  <tbody>

@foreach ($detail as $de) 
                    <tr>
                      @if(isset($de->product->name))
                      <td>{{$de->product->name}}</td>
                      <td>{{$de->quantity}}</td>
                      <td>{{number_format($de->unit_price)}}đ</td>
                      @else
                      <td>SP: {{$de->id_product}} (Đã xóa)</td>
                      <td>{{$de->quantity}}</td>
                      <td>{{number_format($de->unit_price)}}đ</td>   
                      @endif                   
                    </tr>
@endforeach

                  </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>




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
              <a href="{{route('admin_orders_detail',$ord->id)}}" id="myBtn" ui-toggle-class=""><i class="fa fa-search-plus"></i></a>
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
// Get the modal
var modal = document.getElementById("yourModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$(window).load(function()
{
    $('#yourModal').modal('show');
});


    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

@endsection