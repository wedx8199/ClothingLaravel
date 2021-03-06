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

class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
    	$slide=Slide::all();
    	$new_product=Product::where('new',1)->paginate(4);
    	$top_product=Product::where('promotion_price','<>',0)->paginate(4);
    	//return view('page.index',['slide'=>$slide]);
    	return view('page.index',compact('slide','new_product','top_product'));
    }

    public function category($type){
    	$category_type = Product::where('id_type',$type)->paginate(6);
    	$category_other = Product::where('id_type','<>',$type)->take(3)->get();
    	$category_name = ProductType::where('id',$type)->first();
    	return view('page.category',compact('category_type','category_other','category_name'));
    }
    public function categorySortGiam($type){
        $category_type = Product::where('id_type',$type)->orderBy('unit_price', 'DESC')->paginate(6);
        $category_other = Product::where('id_type','<>',$type)->take(3)->get();
        $category_name = ProductType::where('id',$type)->first();
        return view('page.category',compact('category_type','category_other','category_name'));
    }
    public function categorySortTang($type){
        $category_type = Product::where('id_type',$type)->orderBy('unit_price', 'ASC')->paginate(6);
        $category_other = Product::where('id_type','<>',$type)->take(3)->get();
        $category_name = ProductType::where('id',$type)->first();
        return view('page.category',compact('category_type','category_other','category_name'));
    }
    public function categorySortAZ($type){
        $category_type = Product::where('id_type',$type)->orderBy('name', 'ASC')->paginate(6);
        $category_other = Product::where('id_type','<>',$type)->take(3)->get();
        $category_name = ProductType::where('id',$type)->first();
        return view('page.category',compact('category_type','category_other','category_name'));
    }
    public function categorySortZA($type){
        $category_type = Product::where('id_type',$type)->orderBy('name', 'DESC')->paginate(6);
        $category_other = Product::where('id_type','<>',$type)->take(3)->get();
        $category_name = ProductType::where('id',$type)->first();
        return view('page.category',compact('category_type','category_other','category_name'));
    }












    // public function category(){
    // 	return view('page.category');
    // }

    

    public function product_detail($id){
    	$product = Product::where('id',$id)->first();
    	$product_related = Product::where('id_type',$product->id_type)->take(3)->inRandomOrder()->get();
    	$category_name = ProductType::where('id',$product->id_type)->first();
    	$new_product=Product::where('new',1)->take(4)->inRandomOrder()->get();
    	$top_product=Product::where('promotion_price','<>',0)->take(4)->inRandomOrder()->get();   	
    	return view('page.product_detail',compact('product','product_related','new_product','top_product','category_name'));
    }



    public function muahang(Request $req, $id){
        $cartInfor = Cart::content();
        $soluong = $req->soluong;
        $product = Product::where('id',$id)->first();
    //n???u cart ??ang r???ng, ch??n v??o cart(bug)
    if($cartInfor->isEmpty()){
        if($soluong > $product->quantity)
        {
            return redirect()->back()->with('alert','S???? l??????ng ha??ng kh??ng ??u??');
        }
        else {
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng v??o gi???');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng v??o gi???');
            }
        }

    }//n???u ???? c?? h??ng trong cart
    else{

     // iterate through the products and store them into the database
     // v??ng foreach l???y t???ng item h??ng trong cart
     foreach($cartInfor as $key => $item){
            if($item->qty + $soluong > $product->quantity)   //n???u sl c???a item trong cart + 1 l???n h??n sl c???a h??ng tr??n DB g???i t??? id URL
            {
                return redirect()->back()->with('alert','S???? l??????ng ha??ng co?? s????n kh??ng ??u??');
            }
        }
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng v??o gi???');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng v??o gi???');
            }
        




    }


    }
    public function cart(){
    	$content = Cart::content();
    	$total = Cart::subtotal();
    	return view('page.checkout',compact('content','total'));
    }

    // public function cartheader(){
    // 	$content = Cart::content();
    // 	$total = Cart::subtotal();
    // 	return view('page.header',compact('content','total'));
    // }





    public function deletesp($id){
    	Cart::remove($id);
    	return redirect()->route('cart');
    }
    //need to store another value reducesp/{id}/{qty}
    public function reducesp($id){
        $item = Cart::get($id);

        Cart::update($id, $item->qty - 1);

		return redirect()->route('cart');
    }



    
    public function addsp($id){
        $cartInfor = Cart::content();
    //n???u cart ??ang r???ng, ch??n v??o cart(bug)
    if($cartInfor->isEmpty()){

            $product = Product::where('id',$id)->first();
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng');
            }

    }//n???u ???? c?? h??ng trong cart
    else{

     // iterate through the products and store them into the database
     // v??ng foreach l???y t???ng item h??ng trong cart
     foreach($cartInfor as $key => $item){
        $pro = Product::where('id',$item->id)->first(); //l???y id t??? item trong cart
        $product = Product::where('id',$id)->first();   //l???y id t??? URL
        
            if($item->qty + 1 > $product->quantity)   //n???u sl c???a item trong cart + 1 l???n h??n sl c???a h??ng tr??n DB g???i t??? id URL
            {
                return redirect()->back()->with('alert','S???? l??????ng ha??ng co?? s????n kh??ng ??u??');
            }    
        
    }
        
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','???? th??m h??ng');
            }


        

    }










    }



    //about checkout contact login signin

    public function about(){
    	return view('page.about');
    }

    public function contact(){
    	return view('page.contact');
    }









    public function login(){
    	return view('page.login');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'pass'=>'required|min:6',
            ],
            [
                'email.required'=>'Vui l??ng nh???p email',
                'email.email'=>'Vui l??ng nh???p ????ng ?????nh d???ng email',
                'pass.required'=>'Vui l??ng nh???p password',
                'pass.min'=>'Password c?? ??t nh???t 6 k?? t???',
            ]);

        $credentials = array('email'=>$req->email,'password'=>$req->pass);
        if(Auth::attempt($credentials)){
            return redirect()->route('index')->with('alert','????ng nh???p th??nh c??ng'); 
        }
        else {
            return redirect()->back()->with('alert','H??y ??i???n ????ng email ho???c m???t kh???u');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }











    public function signin(){
    	return view('page.signin');
    }   
    public function postSignin(Request $req){
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
                'email.required'=>'Vui l??ng nh???p email',
                'email.email'=>'Vui l??ng nh???p ????ng ?????nh d???ng email',
                'email.unique'=>'???? c?? email n??y',
                'name.required'=>'Vui l??ng nh???p t??n',
                'address.required'=>'Vui l??ng nh???p ?????a ch???',
                'phone.required'=>'Vui l??ng nh???p S??T',
                'pass.required'=>'Vui l??ng nh???p password',
                'pass.min'=>'Password c?? ??t nh???t 6 k?? t???',
                'repass.same'=>'Vui l??ng nh???p ????ng m???t kh???u'
            ]);

        $user = new User;
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->pass);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('alert','???? t???o t??i kho???n th??nh c??ng, vui l??ng ????ng nh???p');
    }

    public function userinfo(){
        return view('page.user_info');
    }   
    public function postUserinfo(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'pass'=>'required|min:6',
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required'
            ],
            [
                'email.required'=>'Vui l??ng nh???p email',
                'email.email'=>'Vui l??ng nh???p ????ng ?????nh d???ng email',
                'name.required'=>'Vui l??ng nh???p t??n',
                'address.required'=>'Vui l??ng nh???p ?????a ch???',
                'phone.required'=>'Vui l??ng nh???p S??T',
                'pass.required'=>'Vui l??ng nh???p password',
                'pass.min'=>'Password c?? ??t nh???t 6 k?? t???'
            ]);
        $email = $req->email;
        $newname = $req->name;
        $newphone = $req->phone;
        $newaddress = $req->address;

        $credentials = array('email'=>$email,'password'=>$req->pass);
        if(Auth::attempt($credentials)){
            User::where('email',$email)->update(['full_name' => $newname,'phone'=>$newphone,'address'=>$newaddress]);
            return redirect()->route('index')->with('alert','S???a th??ng tin th??nh c??ng'); 
        }
        else {
            return redirect()->back()->with('alert','H??y ??i???n ????ng m???t kh???u');
        }
    }
    public function changepass(){
        return view('page.changepass');
    }   

    public function postChangepass(Request $req){
        $this->validate($req,
            [
                
                
                'passnew'=>'required|min:6',
                'repassnew'=>'required|min:6|same:passnew'
            ],
            [

                
                'passnew.required'=>'Vui l??ng nh???p password',
                'passnew.min'=>'Password c?? ??t nh???t 6 k?? t???',
                'repassnew.required'=>'Vui l??ng nh???p password',
                'repassnew.min'=>'Password c?? ??t nh???t 6 k?? t???',
                'repassnew.same'=>'Vui l??ng nh???p ????ng m???t kh???u'
            ]);
        $passnew = Hash::make($req->passnew);

        User::where('id',Auth::user()->id)->update(['password' => $passnew]);
        return redirect()->route('index')->with('alert','S???a m???t kh???u th??nh c??ng'); 

    }









    public function postCheckout(Request $req){
        $cartInfor = Cart::content();

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->save();



        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = str_replace(',', '', Cart::subtotal());
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

     // iterate through the products and store them into the database
     foreach($cartInfor as $key => $item){
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $item->id;
        $bill_detail->quantity = $item->qty;
        $bill_detail->unit_price = $item->price;
        $bill_detail->save();
     }
        Cart::destroy();
        return redirect()->back()->with('alert','?????t h??ng th??nh c??ng');


    }











    public function search(Request $req){
        $ten_sp=$req->searchbox;
        $danhmuc=$req->danhmuc;
        if($danhmuc != 619){
        $product = Product::where('id_type',$danhmuc)->where('name','like','%'.$ten_sp.'%')->paginate(9);
        $name = ProductType::where('id',$danhmuc)->first();
        return view('page.search',compact('ten_sp','danhmuc','product','name'));
        }
        else {
        $product = Product::where('name','like','%'.$ten_sp.'%')->paginate(9);
        return view('page.search',compact('ten_sp','danhmuc','product'));
        }

    }



}


