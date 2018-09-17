<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Category;
use App\Product;
use App\Employee;
use App\Customer;
use App\Order;
use Session;
use App\Cart;
use App\Order_Detail;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\User;
use Auth;
use App\distanceFinder;
class userController extends Controller
{

	public function getProduct(){

        $slide = SLide::all();
        $category = Category::all();
        $product = Product::all();

        $hot_ProductId = DB::select("SELECT product_id ,sum(quanity) FROM order_details GROUP BY product_id ORDER BY sum(quanity) desc LIMIT 0,3");
        $topProduct = [];

        foreach ($hot_ProductId as $value) {
            $oneProduct = DB::select("SELECT * FROM products Where id = $value->product_id ");
            
         array_push($topProduct,$oneProduct);
        }
        //print_r( $topProduct[0][0]->id ) ;
		return view('user.product',compact('slide','category','product','topProduct'));
	}

	public function getProductDetail($id){

        $product = Product::where('id',$id)->first();

        $relaProduct = Product::where([['category_id',$product->category_id],['id','<>',$id]])->take(3)->get();
       
		return view('user.product_detail',compact('product','relaProduct'));
	}

	public function getProductCategory(){

         $category = Category::all();
        $product = Product::all();

		return view('user.menu',compact('category','product'));
	}

    public function getLogin(){

    	return view('user.login');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => "Email is required",
                'email.email' => "Your email is invalid",
                'password.required' => "Password is required"

            ]);
        $credentials_admin = array('email'=> $req->email,'password'=> $req->password,'dec'=>'1');

         if (Auth::attempt($credentials_admin)) {

           
            return  redirect()->route('index');

        }

        $credentials = array('email'=> $req->email,'password'=> $req->password);

        if (Auth::attempt($credentials) ) {

           
            return  redirect()->route('product');

        }else{
            Session::flash('message', "Email or Password is incorrect.Please try again.");
            return redirect()->back();
            
        }
    	
    }

    public function logout(){
        
    	Auth::logout();
        return redirect()->route('product');
    }

    public function getRegister(){
    	return view('user.register');
    }

    public function postRegister(Request $req){
       
       
        $this->validate($req,
            [
                'email' => 'required|email|unique:users,email', 
                'password' => 'required|min:8|max:26|',
                'fullname' => 'required',
                'gender' => 'required'
                
            ],
            [
                'email.required' => "Email is required",
                'email.email' => 'Email is invalid',
                'email.unique' => "Email is exist.Please choose another one",
                'password.required' => "Password is required",
                'password.min' => "Password has least 8 chars",
                'password.max' => "Password only has maximun 26 chars",
                'fullname.required' => "Fullname is required",
                'fullname.regex' => "Fullname is invalid",
                'gender.required' => "Gender is required",
                 
            ]);
           
            $user = new User();
            $user->email = $req->email;
            $user->password = bcrypt($req->password);
            $user->fullname = $req->fullname;
            $user->gender = $req->gender;
           
            $user->save();

        	$credentials = array('email'=> $req->email,'password'=> $req->password);

            if (Auth::attempt($credentials)) {

               
                return  redirect()->route('product');

            }else{
                Session::flash('message', "Fail");
                return redirect()->back();
            }
    }

    public function getCart(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
         
             return view('user.cart',['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
        return view('user.cart');
    }

    public function addCart(Request $req,$id){

        $product = Product::find($id);

        if($product){
            $old_cart = Session::has('cart')? Session::get('cart') :null;

            $cart = new Cart($old_cart);

            $cart->add($product,$id,$req->quanity);

            $req->session()->put('cart',$cart);
        
            return response()->json(['totalQty'=> $cart->totalQty]);
        }
    	
    }
    public function updateCart(Request $req ,$id,$qty){

        $product = Product::find($id);

        if($product){
            $old_cart = Session::has('cart')? Session::get('cart') :null;

            $cart = new Cart($old_cart);
            $quanity = $cart->items[$id]['qty'];
            // add 1 product
            if($quanity+1 == $qty){

                $cart->totalQty +=1;
                $cart->totalPrice +=  ($cart->items[$id]['item']->unit_price) ;
            // sub 1 product
            }elseif($quanity-1 == $qty){             

                $cart->totalQty -=1;
                $cart->totalPrice -=  ($cart->items[$id]['item']->unit_price) ;
              // add more product
            }else{

                $cart->totalQty -= $cart->items[$id]['qty'];
                $cart->totalQty+= $qty;
                $cart->totalPrice -=  ($cart->items[$id]['item']->unit_price)*($cart->items[$id]['qty']) ;
                $cart->totalPrice +=  ($cart->items[$id]['item']->unit_price)* $qty ;

            }

           
            $cart->items[$id]['qty'] = $qty;
            $cart->items[$id]['price'] = $qty * ($cart->items[$id]['item']->unit_price);
            $req->session()->put('cart',$cart);
        
             return response()->json(['qty'=> $cart->items[$id]['qty'],'price' =>  $cart->items[$id]['price'],'totalQty'=> $cart->totalQty,'totalPrice' =>$cart->totalPrice]);
        }
        
    }



    public function deleteCart($id){
            
                $old_cart = Session::has('cart')? Session::get('cart') :null;

                $cart = new Cart($old_cart);

                $cart->removeItem($id);

                if(($cart->items)>0){
                     Session::put('cart',$cart);
                }else{
                    Session::forget('cart');
                }
               //var_dump(Session::get('cart'));
              return response()->json(['totalQty'=> $cart->totalQty,'totalPrice' =>$cart->totalPrice]);
            
         
    }

     public function checkout(){

        if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
               return view('user.checkout',['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }

    	return view('user.checkout');
    }

     public function postCheckout(Request $req){

        
        $old_cart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($old_cart);

       if(Auth::check() && (Auth::user()->dec == 0)){
        
            $this->validate($req,
                [
                   
                    'address' => 'required',
                    'phone' => ['required','regex:/^(01[269]|09|08)[0-9]{8}$/'],
                    'payment' => 'required'
                ],
                [
              
                    'address.required' => 'Address is required',
                    'phone.required' => 'Phone number is required',
                    'phone.regex' => 'Phone number is invalid',
                    'payment.required' => 'Payment is required'
                ]);
            $customer = new Customer();
            $customer->fullname = Auth::user()->fullname;
            $customer->email = Auth::user()->email;
            $customer->gender = Auth::user()->gender;
            $customer->contact_number = $req->phone;
            $customer->address = $req->address;

            $user = User::find(Auth::user()->id);
            $user->contactnumber = $req->phone;
            $user->address = $req->address;
            $user->save();
       }else{
            $this->validate($req,
                [
                    'fullname' => 'required',
                    'email' => 'required|email',
                    'address' => 'required',
                    'phone' => ['required','regex:/^(01[269]|09|08)[0-9]{8}$/'],
                    'payment' => 'required'

                ],
                [
                    'fullname.required' => 'Fullname is required',
                   
                    'email.required' => 'Email is required',
                    'email.email' => 'Email is in valid',
                   
                    'address.required' => 'Address is required',
                    'phone.required' => 'Phone number is required',
                    'phone.required' => 'Phone number is invalid',
                    'payment.required' => 'Payment is required'
                    
                ]);
            $customer = new Customer();
            $customer->fullname = $req->fullname;
            $customer->email = $req->email;
            $customer->gender = $req->gender;
            $customer->contact_number = $req->phone;
            $customer->address = $req->address;
       }
       
       
       
        
        $customer->save();


        $order = new Order();
        $order->customer_id = $customer->id;
        $order->total = $cart->totalPrice;
        $order->payment = $req->payment;
        $order->date_order = date('Y-m-d H-m-s');
        $order->note = $req->note;
        $order->feeShip = $req->fee_ship;
        $order->save();

        foreach($cart->items as $key => $value){
            $order_detail = new Order_Detail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $key;
            $order_detail->quanity = $value['qty'];
            $order_detail->unit_price = ($value['price'])/$value['qty'];
            $order_detail->save();
        }
        Session::forget('cart');
        // send email to admin
        //$data = array('name'=>"Thai Nguyen", "body" => "Mot don hang moi,hay kiem tra ngay");
        
            
        
        // Mail::send('user.mail', $data, function($message) {
        
        //     $message->to('minhnhoban0707@gmail.com', 'nguyen thai')
        
        //             ->subject('Thong bao don hang');
        
        //     $message->from('vnibka.pasal@gmail.com','To master English');
        
        // });


        Session::flash('message',"Order successfully");
    	return redirect()->back();
    }


     public function search(Request $req){
        
        $product = Product::where('name_en','like','%' .$req->key .'%')->orwhere('description','like','%' .$req->key .'%')->get();
    	return view('user.search',compact('product'));
    }


     public function contact(){
        $data = array('name'=>"Thai Nguyen", "body" => "Mot don hang moi,hay kiem tra ngay");
        
            
        
        // Mail::send('user.mail', $data, function($message) {
        
        //     $message->to('minhnhoban0707@gmail.com', 'nguyen thai')
        
        //             ->subject('Thong bao don hang');
        
        //     $message->from('vnibka.pasal@gmail.com','To master English');
        
        // });

    	return view('user.contact');
    }

     public function about(){
        $employee = Employee::all();
    	return view('user.about',compact('employee'));
    }

     public function getDetailEmployee($id){

        $employee = Employee::where('id',$id)->get();
        $relEmployee = Employee::where('id','<>',$id)->get();
    
    	return view('user.employee',compact('employee','relEmployee'));
    }

    public function userProfile($id){

        $user = User::find($id);
       
    
        return view('user.profile',compact('user'));
    }

    public function editProfile($id){

        $user = User::find($id);
       
    
        return view('user.editProfile',compact('user'));
    }

    public function updateProfile(Request $req,$id){

       
       
        $this->validate($req,
           [
               // 'email' => 'required|email|unique:users,email', 
               'password' => 'required|min:8|max:26|',
               'fullname' => ['required','regex:/^[a-zA-Z ]*$/'],
               'gender' => 'required',
               'contactnumber' => ['required','regex:/^(01[269]|09|08)[0-9]{8}$/'],
               'address' => 'required'
           ],
           [
               
             
               'fullname.required' => "Fullname is required",
               'fullname.regex' => "Fullname is invalid",
               'gender.required' => "Gender is required",
               'contactnumber.required' => "Phone number is required",
               'contactnumber.regex' => "Phone number is incorrect", 
               'address.required' => "Address is required"  
           ]);
          
            $user = User::find($id);
            // $user->email = $req->email;
            $user->password = bcrypt($req->password);
            $user->fullname = $req->fullname;
            $user->gender = $req->gender;
            $user->contactnumber = $req->contactnumber;
            $user->address = $req->address;

            if ($req->hasFile('image')) {

                $file = $req->file('image');
               $formatImg = $file->getClientOriginalExtension();

               if($formatImg != 'jpg' && $formatImg !='png' && $formatImg != 'jpeg'){
                    Session::flash('message',"Format image is valid .Only jpg,png,jpeg");
                    return redirect()->back();

               }


                $name = $file->getClientOriginalName();
                $name = str_random(4) ."_" .$name;
                
                while (file_exists('source\KOIBENTO\images'.$name)) {
                   $name = str_random(4) ."_" .$name;
                }

                $file->move('source\KOIBENTO\images',$name);
             
                $user->url_image = $name; 
            }
            
            $user->save();

    
        return view()->route('user_profile');
    }

    public function page_error_403(){

        return view('user.page-error-403');
    }

    public function calFeeShip($address){


        $df = new distanceFinder("Car Drive");
        $result = $df->findDistance("Tầng 2, nhà B, Khu VL1, Trung tâm Thương mại Dịch vụ Trung Văn 1, Q. Nam Từ Liêm,Hà Nội", "$address");

        if (isset($result['error'])) {

            Session::flash('message',"Fail");
            return redirect()->back();

        } else {
          
            if($result<5){

                return response()->json(['fee'=>'20000']);

            } elseif($result<10){

                return response()->json(['fee'=>'40000']);

            }elseif ($result<20) {
               
                return response()->json(['fee'=>'60000']);

            }else{

            }
        }

    }



}
