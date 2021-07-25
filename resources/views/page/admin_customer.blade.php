@extends('master_admin')
@section('content')

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách khách hàng
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">ID Khách hàng</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th data-breakpoints="xs">Email</th>
            <th data-breakpoints="xs">Địa chỉ</th>
            <th data-breakpoints="xs sm md">SĐT</th>
          </tr>
        </thead>
        <tbody>
@foreach($customer as $cus)
          <tr data-expanded="true">
            <td>{{$cus->id}}</td>
            <td>{{$cus->name}}</td>
            <td>{{$cus->gender}}</td>
            <td>{{$cus->email}}</td>
            <td>{{$cus->address}}</td>
            <td>{{$cus->phone_number}}</td>
          </tr>
@endforeach
        </tbody>
        <div class="col-sm-7 text-right text-center-xs">                
      <div class="row">{{$customer->links()}}</div>
        </div>
      </table>
    </div>
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

@endsection