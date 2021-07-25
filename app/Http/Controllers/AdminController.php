<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Session;
use Hash;
use Auth;
use Cart;
use DB;
use PDF;
use DateTime;

session_start();

class AdminController extends Controller
{

    public function adminlogin(){
    	return view('page.admin_login');
    }




    public function adminindex(){
    	$customer=Customer::count();
    	$doanhthutong=Bill::where('status','2')->get();
    	$orders_notfinish=Bill::where('status','0')->count();
    	$orders=Bill::where('status','0')->orderBy('date_order', 'DESC')->take(6)->get();
    	return view('page.admin_dashboard',compact('orders','orders_notfinish','doanhthutong','customer'));
    }



    public function postAdmin(Request $req){
    	$name=$req->name;
    	$pass=$req->pass;
    	//$result=DB::table('admin')->where('name',$name)->where('password',Hash::check('password',$pass))->first();
    	$result=DB::table('admin')->where('name',$name)->where('password',$pass)->first();
    	if(isset($result)){
    		$_SESSION['username'] = $name;
    		return redirect()->route('admin');
    	}
    	else{
    		return redirect()->back()->with('alert','Điền đúng tên hoặc mật khẩu admin');
    	}
    }
    public function logout(){
    	session_unset();

		session_destroy();
    	return redirect()->route('admin_login');
    }











    public function adminOrders(){
    	$orders=Bill::paginate(20);
    	return view('page.admin_orders',compact('orders'));
    }
    public function adminOrdersDetail($id){
    	$billnum = $id;
    	$detail = BillDetail::where('id_bill',$id)->get();
    	$orders=Bill::paginate(20);
    	return view('page.admin_order_detail',compact('detail','orders','billnum'));
    }
    public function adminOrdersConfirm($id){
		Bill::where('id',$id)->update(['status' => '1']);
    	return redirect()->route('admin_orders')->with('alert','Đã xác nhận đơn');
    }
    public function adminOrdersDone($id){
		Bill::where('id',$id)->update(['status' => '2']);
    	return redirect()->route('admin_orders')->with('alert','Đã xử lí hoàn tất đơn');
    }
    public function adminOrdersCancel($id){
    	$customer=Bill::where('id',$id)->first();
    	Customer::where('id',$customer->id_customer)->delete();
		Bill::where('id',$id)->delete();
		BillDetail::where('id_bill',$id)->delete();
    	return redirect()->route('admin_orders')->with('alert','Đã hủy đơn hàng');
    }





    public function adminDoanhthu(){
    	$orders=Bill::where('status','2')->orderBy('date_order', 'ASC')->get();
    	return view('page.admin_doanhthu',compact('orders'));
    }
    public function postAdminDoanhthu(Request $req){
    	$date1 = $req->day1;
    	$date2 = $req->day2;
    	$orders = Bill::where('date_order', '>=', $date1)->where('date_order', '<=', $date2)->where('status','2')->orderBy('date_order', 'ASC')->get();
    	return view('page.admin_doanhthu',compact('orders'));
    }








    public function adminProduct(){
    	$product=Product::orderBy('id_type', 'ASC')->paginate(10);
    	return view('page.admin_product',compact('product'));
    }
    public function adminProductAdd(){
    	$category=ProductType::all();
    	return view('page.admin_product_add',compact('category'));
    }
    public function productAdd(Request $req){
    	if($req->hasFile('newFile')){
    		$file= $req->file('newFile');
    		if($file->getClientOriginalExtension('newFile') == "jpg")
    		{
	    		$filename=$file->getClientOriginalName('newFile');
	    		$file->move('source/image/product',$filename);
		    	$pro=new Product;
		    	$pro->name=$req->name;
		    	$pro->description=$req->description;
		    	$pro->id_type=$req->category;
		    	$pro->unit_price=$req->price;
		    	$pro->quantity=$req->quantity;
	    		$pro->image = $filename;
		    	$pro->save();
	    		return redirect()->route('admin_product')->with('alert','Tải lên file thành công');
    		}
    		else{
    			return redirect()->back()->with('alert','Định dạng phải là jpg');
    		}
    	}
    	else
    	{
    		return redirect()->back()->with('alert','Chưa có file ảnh sản phẩm');
    	}
    }
    public function adminProductEdit($id){
    	$product = Product::where('id',$id)->first();
    	$category=ProductType::all();
    	return view('page.admin_product_edit',compact('product','category'));
    }
    public function productUpdate(Request $req,$id){

    	if($req->hasFile('newFile')){
    		$file= $req->file('newFile');
    		if($file->getClientOriginalExtension('newFile') == "jpg")
    		{
	    		$filename=$file->getClientOriginalName('newFile');
	    		$file->move('source/image/product',$filename);
	    		Product::where('id',$id)->update(['name' => $req->name,'description'=>$req->description,'id_type'=>$req->category,'unit_price'=>$req->price,'promotion_price'=>$req->pricesale,'image'=>$filename,'new'=>$req->status,'quantity'=>$req->quantity]);
	    		return redirect()->route('admin_product')->with('alert','Sửa thông tin thành công');
    		}
    		else{
    			return redirect()->back()->with('alert','Định dạng phải là jpg');
    		}
    	}
    	else
    	{
	    		Product::where('id',$id)->update(['name' => $req->name,'description'=>$req->description,'id_type'=>$req->category,'unit_price'=>$req->price,'promotion_price'=>$req->pricesale,'new'=>$req->status,'quantity'=>$req->quantity]);
	    		return redirect()->route('admin_product')->with('alert','Sửa thông tin thành công');
    	}
    }
    public function productDelete($id){
    	Product::where('id',$id)->delete();
    	return redirect()->back()->with('alert','Xóa thành công');
    }











    public function adminCategory(){
    	$category=ProductType::all();
    	return view('page.admin_category',compact('category'));
    }
    public function adminCategoryAdd(){
    	return view('page.admin_category_add');
    }
    public function categoryAdd(Request $req){
    	$cat=new ProductType;
    	$cat->name=$req->name;
    	$cat->description=$req->description;
    	$cat->save();
    	return redirect()->route('admin_category')->with('alert','Thêm thành công');
    }
    public function adminCategoryEdit($id){
    	$cat = ProductType::where('id',$id)->first();
    	return view('page.admin_category_edit',compact('cat'));
    }
    public function categoryUpdate(Request $req,$id){
    	ProductType::where('id',$id)->update(['name' => $req->name,'description'=>$req->description]);
    	return redirect()->route('admin_category')->with('alert','Sửa thành công');
    }
    public function categoryDelete($id){
    	$check = Product::where('id_type',$id)->get();
    	if($check->isNotEmpty())
    	{
		return redirect()->route('admin_category')->with('alert','Không thể xóa danh mục vì còn sản phẩm thuộc danh mục này');
    	}
    	else{
    	ProductType::where('id',$id)->delete();
    	return redirect()->route('admin_category')->with('alert','Xóa thành công');		
    	}

    }






    public function adminCustomer(){
    	$customer = Customer::orderBy('email','ASC')->paginate(10);
    	return view('page.admin_customer',compact('customer'));
    }
    public function adminUsers(){
    	$user=User::all();
    	return view('page.admin_user',compact('user'));
    }
    public function adminUserAdd(){
    	return view('page.admin_user_add');
    }
    public function userAdd(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'pass'=>'required|min:6',
                'name'=>'required',
                'repass'=>'required|same:pass',
                'address'=>'required',
                'phone'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Vui lòng nhập đúng định dạng email',
                'email.unique'=>'Đã có email này',
                'name.required'=>'Vui lòng nhập tên',
                'address.required'=>'Vui lòng nhập địa chỉ',
                'phone.required'=>'Vui lòng nhập SĐT',
                'pass.required'=>'Vui lòng nhập password',
                'pass.min'=>'Password có ít nhất 6 kí tự',
                'repass.same'=>'Vui lòng nhập đúng mật khẩu'
            ]);

        $user = new User;
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->pass);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->route('admin_users')->with('alert','Đã tạo tài khoản thành công');

    }
    public function passwordReset($id){
    	$password = Hash::make('111111');
    	User::where('id',$id)->update(['password' => $password]);
    	return redirect()->back()->with('alert','Đã reset mật khẩu thành 111111');
    }
    public function userDelete($id){
    	User::where('id',$id)->delete();
    	return redirect()->route('admin_users')->with('alert','Xóa thành công');
    }











    public function slides(){
    	$image=Slide::all();
    	return view('page.admin_slide',compact('image'));
    }
    public function postUploadNew(Request $req){
    	if($req->hasFile('newFile')){
    		$file= $req->file('newFile');

    		if($file->getClientOriginalExtension('newFile') == "jpg")
    		{
	    		$filename=$file->getClientOriginalName('newFile');
	    		$file->move('source/image/slide',$filename);
	    		$slide = new Slide;
	    		$slide->image = $filename;
	    		$slide->save();
	    		return redirect()->route('slides')->with('alert','Tải lên file thành công');
    		}
    		else{
    			return redirect()->route('slides')->with('alert','Định dạng phải là jpg');
    		}
    	}
    	else
    	{
    		return redirect()->route('slides')->with('alert','Tải lên file thất bại');
    	}
    }
    public function postUploadUpdate(Request $req,$id){
    	if($req->hasFile('updateFile')){
    		$file= $req->file('updateFile');

    		if($file->getClientOriginalExtension('updateFile') == "jpg")
    		{
	    		$filename=$file->getClientOriginalName('updateFile');
	    		$file->move('source/image/slide',$filename);
	    		Slide::where('id',$id)->update(['image' => $filename]);
	    		return redirect()->route('slides')->with('alert','Tải lên file thành công');
    		}
    		else{
    			return redirect()->route('slides')->with('alert','Định dạng phải là jpg');
    		}
    	}
    	else
    	{
    		return redirect()->route('slides')->with('alert','Tải lên file thất bại');
    	}
    }
    public function slideDelete($id){
    	Slide::where('id',$id)->delete();
    	return redirect()->route('slides')->with('alert','Xóa thành công');
    }









    public function print_order($id){
    	$pdf= \App::make('dompdf.wrapper');
    	$pdf->loadHTML($this->print_order_convert($id));
    	return $pdf->stream();
    }
    public function print_order_convert($id){
    	$detail = BillDetail::where('id_bill',$id)->get();
    	$orders=Bill::where('id',$id)->get();
    	foreach ($orders as $key => $ord) {
    		$customer_id = $ord->id_customer;
    	}
    	$customer = Customer::where('id',$customer_id)->first();
    	$detail_product = BillDetail::with('product')->where('id_bill',$id)->get();
    	$output = '';
    	$output.='<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<center><img src="source/assets/dest/images/logo-cake.png" width="200px" height="100px"></center>
		<h1><center>METALOGIX SHOP</center></h1>
    	<h3><center>Hóa đơn</center></h3>
    	<p>Người mua hàng:</p>
		<table class="table-styling">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên khách hàng</th>
					<th>Địa chỉ giao</th>
					<th>SĐT</th>
				</tr>
			</thead>
			<tbody>';

$output.='
				<tr>
					<td>'.$customer->id.'</td>
					<td>'.$customer->name.'</td>
					<td>'.$customer->address.'</td>
					<td>'.$customer->phone_number.'</td>
				</tr>';

$output.='
			</tbody>
		</table>




    	<p>Thông tin đơn:</p>
		<table class="table-styling">
			<thead>
				<tr>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>';
			foreach($detail as $key => $det){


			$subtotal = $det->unit_price*$det->quantity;
			if(isset($det->product->name)){
			$name = $det->product->name;
			}
			else{
			$name = ' Mã SP: ' .$det->id_product. '(đã xóa mặt hàng)';
			}
$output.='
				<tr>
					<td>'.$name.'</td>
					<td>'.$det->quantity.'</td>
					<td>'.number_format($det->unit_price,0,',','.').'đ'.'</td>
					<td>'.number_format($subtotal,0,',','.').'đ'.'</td>
				</tr>';
			}
$output.='
			</tbody>
		</table>



    	<br>
		<table class="table-styling">
			<thead>
				<tr>
					<th>Số hóa đơn</th>
					<th>Ngày đặt</th>
					<th>Hình thức thanh toán</th>
					<th>Tổng thu</th>
				</tr>
			</thead>
			<tbody>';
			foreach($orders as $key => $ord){
$output.='
				<tr>
					<td>'.$ord->id.'</td>
					<td>'.date_format(new DateTime($ord->date_order), 'd-m-Y').'</td>
					<td>'.$ord->payment.'</td>
					<td>'.number_format($ord->total,0,',','.').'đ'.'</td>
				</tr>';
			}
$output.='
			</tbody>
		</table>


		<br><br>
		<p>Ký tên</p>
			<table>
				<thead>
					<tr>
						<th width="200px">Người lập phiếu</th>
						<th width="800px">Người nhận</th>

					</tr>
				</thead>
				<tbody>';

		$output.='
				</tbody>

		</table>




    	';

    	return $output;
    }










}
