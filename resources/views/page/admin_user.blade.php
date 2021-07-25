@extends('master_admin')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lí tài khoản
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">

        <a href="{{route('admin_users_add')}}"><button class="btn btn-sm btn-default"><i class="fa fa-plus"></i>  Thêm</button></a>            
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
            <th>STT</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th></th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
@php
$i=0;
@endphp
@foreach($user as $u)
            @php
            $i++;
            @endphp
          <tr>
            <td></td>
            <td>{{$i}}</td>
            <td><span class="text-ellipsis">{{$u->email}}</span></td>
            <td><span class="text-ellipsis">{{$u->full_name}}</span></td>
            <td><span class="text-ellipsis">{{$u->phone}}</span></td>
            <td><span class="text-ellipsis">{{$u->address}}</span></td>
            <td><span class="text-ellipsis"><a href="{{route('pass_reset',$u->id)}}"><i class="fa fa-key">  Reset mật khẩu</i></a></span></td>
            <td>
              <a onclick="return confirm('Xóa tài khoản?')" href="{{route('admin_users_delete',$u->id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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