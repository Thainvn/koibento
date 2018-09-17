<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Order;
use App\Order_Detail;
use App\Customer;
use App\User;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Style_Alignment;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('roleAdmin');
    }

    // display dashbroad
    public function getHome(){

        $fromDate = date('Y') .'-'.date('m').'-01 00:00:00';
        $toDate =  date('Y-m-d H:i:s');

        $revenue = Order::where('status','1')->whereBetween('created_at', [$fromDate, $toDate])->sum('total');
        $sales =  Order::whereBetween('created_at', [$fromDate, $toDate])->count();

       $customer =  Customer::whereBetween('created_at', [$fromDate, $toDate])->distinct('email')->count('email');

        $fromDate2 = date('Y') .'-'.'01-01 00:00:00';
       
        //  Monthly revenue
        $monthly_revenue =  DB::select("SELECT  MONTHNAME(date_ship) AS label, SUM(total) AS y  FROM orders WHERE date_ship BETWEEN '" .  $fromDate2. "' AND'" . $toDate  ."'GROUP BY YEAR(date_ship), MONTHNAME(date_ship) ORDER BY date_order ");
     
    
        // List orders is pending
        $pendingOrder = DB::select("SELECT count(*) as orders, orders.id,customers.fullname,customers.contact_number,orders.note from orders inner join customers on orders.customer_id =customers.id inner join order_details on orders.id =order_details.order_id inner join products on order_details.product_id =products.id where status = 0 group by orders.id, orders.id,customers.fullname,customers.contact_number,orders.note");

        // List best seller product
        $hot_ProductId = DB::select("SELECT product_id as label,(sum(quanity)*100)/(SELECT sum(quanity)  FROM order_details) AS y FROM order_details WHERE created_at BETWEEN '2018-01-01'AND'" .$toDate ."'   GROUP BY product_id ORDER BY sum(quanity) desc LIMIT 0,5");
       
        $sum = 0;
        foreach ($hot_ProductId as $value) {
            $oneProduct = DB::select("SELECT name FROM products Where id = $value->label ");
            $value->label =  $oneProduct[0]->name;
            $sum +=$value->y;
        }
        $du = 100- $sum;
        array_push($hot_ProductId,['label'=>'other','y'=> $du]);

       
    	return view('admin.dashbroad',compact('revenue','customer','pendingOrder','sales','monthly_revenue','hot_ProductId'));
        // var_dump($pendingOrder);
        // return view('admin.a',compact('pendingOrder'));
    

    }
    // display detail invoice
    public function getDetailOrder($id){

        $detail_order = DB::select("SELECT * from orders inner join customers on orders.customer_id =customers.id inner join order_details on orders.id =order_details.order_id inner join products on order_details.product_id =products.id where order_id = $id");

        $sumOriPrice = 0;
        $sumSale =0;
        $sumPrice = 0;

        foreach ($detail_order as $value) {
           $sumOriPrice += $value->unit_price;
            $sumSale += ($value->unit_price)*($value->sale);
            $sumPrice += ($value->unit_price)*(1-($value->sale));
        }
        
       return view ('admin.invoice',compact('detail_order','sumOriPrice','sumSale','sumPrice'));
    }


    // print invoice
     public function printInvoice($id){

        $detail_order = DB::select("SELECT * from orders inner join customers on orders.customer_id =customers.id inner join order_details on orders.id =order_details.order_id inner join products on order_details.product_id =products.id where order_id = $id");

        $sumOriPrice = 0;
        $sumSale =0;
        $sumPrice = 0;

        foreach ($detail_order as $value) {
           $sumOriPrice += $value->unit_price;
            $sumSale += ($value->unit_price)*($value->sale);
            $sumPrice += ($value->unit_price)*(1-($value->sale));
        }

        $pdf = PDF::loadView('admin.printInvoice',compact('detail_order','sumOriPrice','sumSale','sumPrice'))->setWarnings(false);
            return $pdf->download('invoice.pdf');

        redirect()->back();
      
    }
    // update order is pending
    public function updateStatus($id){
        $timestamp =  date('Y-m-d H:i:s');
        $order = Order::find($id);
        $order->status = '1';
        $order->date_ship = $timestamp;
        $order->save();
        
       

        return response()->json(['message'=> 'Delete Successfully']);
      
    }

    // display chart page
    public function getChart(){


        $toDate =  date('Y-m-d H:i:s');
        $fromDate2 = date('Y') .'-'.'01-01 00:00:00';


        $order_development = DB::select("SELECT  MONTHNAME(date_order) AS label, count(id) AS y  FROM orders WHERE date_order BETWEEN '" .  $fromDate2. "' AND'" . $toDate  ."'GROUP BY YEAR(date_order), MONTHNAME(date_order) ORDER BY date_order ");
        
    	return view('admin.chart',compact('order_development'));
    }




    // display list Product page
    public function listProduct(){
        $product = DB::table('products')
                ->join('categories','products.category_id','=','categories.id')
                ->select('products.*','categories.name as category_name')
                ->get();

        return view('admin.listProduct',compact('product'));

    }


    // display add Product page
    public function addProduct(){
        $category =Category::all();
    	return view('admin.addProduct',compact('category'));

    }


    // add Product in db
    public function postAddProduct(Request $req){

        $this->validate($req,
            [
                'name' => 'required|unique:products,name',
                'description' => 'required',
                'price' => 'required|regex:/^[0-9]*$/',
                'category_id' => 'required',
                'image' => 'required',
            ],
            [
                'name.required' =>'Product name is required',
                'name.unique' => 'Product name is exist.Please choose another one.',
                'description.required' => 'Description is required',
                
                'price.required' => 'Price is required',
                'price.regex' => 'Price is invalid',
                'category_id.required' => "You don't choose category of product",
                'image.required' => "You need add image for product"
            ]
            );

        $product = new Product();
        $product->name = $req->name;
        $product->name_en =changeTitle($req->name); 
        $product->description = $req->description;
        $product->unit_price = $req->price;
        $product->unit = $req->unit;
        $product->category_id = $req->category_id;
         
        if ($req->hasFile('image')) {

            $file = $req->file('image');
           $formatImg = $file->getClientOriginalExtension();

           if($formatImg != 'jpg' && $formatImg !='png' && $formatImg != 'jpeg'){
                return redirect()->back()->with('message',"Format image is valid .Only jpg,png,jpeg");

           }


           $name = $file->getClientOriginalName();
           $name = str_random(4) ."_" .$name;
            
           while (file_exists('source\KOIBENTO\images'.$name)) {
               $name = str_random(4) ."_" .$name;
           }

           $file->move('source\KOIBENTO\images',$name);

            $product->url_image = $name; 
        }
     

        $product->save();

    	return redirect()->back()->with('message',"Add Product successfully");
    }

    // display detail about one product
    public function readProduct($id){

       $product = DB::table('products')
                ->where('products.id','=',$id)
                ->join('categories','products.category_id','=','categories.id')
                ->select('products.*','categories.name as category_name')
                ->get();

        return view('admin.readProduct',compact('product'));
    }

    // display edit product page
    public function editProduct($id){

        $product = Product::find($id);
        $category = Category::all();

    	return view('admin.editProduct',compact('product','category'));
    }
    // edit product
    public function postEditProduct(Request $req,$id){

            $this->validate($req,
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|regex:/^[0-9]*$/',
                'category_id' => 'required',
                
            ],
            [
                'name.required' =>'Product name is required',
                'description.required' => 'Description is required',           
                'price.required' => 'Price is required',
                'price.regex' => 'Price is invalid',
                'category_id.required' => "You don't choose category of product",
               
            ]
            );
            echo $req->category_id;
        $product = Product::find($id);

        $product->name = $req->name;
        $product->name_en =changeTitle($req->name); 
        $product->description = $req->description;
        $product->unit_price = $req->price;
      
        $product->category_id = $req->category_id;
         
        if ($req->hasFile('image')) {

            $file = $req->file('image');
           $formatImg = $file->getClientOriginalExtension();

           if($formatImg != 'jpg' && $formatImg !='png' && $formatImg != 'jpeg'){
                return redirect()->back()->with('message',"Format image is valid .Only jpg,png,jpeg");

           }


           $name = $file->getClientOriginalName();
           $name = str_random(4) ."_" .$name;
            
           while (file_exists('source\Koibento\images'.$name)) {
               $name = str_random(4) ."_" .$name;
           }

           $file->move('source\admin\images',$name);
         
            $product->url_image = $name; 
        }
     

        $product->save();

        return redirect()->back()->with('message',"Update Product successfully");
    }

    // delete Product
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message',"Delete Product successfully"]);

    }
   


    // Category
    // display list category page
     public function listCategory(){
        $category = Category::all();
        return view('admin.listCategory',compact('category'));
    }
    // display add category page
    public function addCategory(){

    	return view('admin.addCategory');
    }
    // add category
    public function postAddCategory(Request $req){
           
    	    $this->validate($req,
                [
                    'name' => 'required|unique:categories,name',
                    'description' => 'required'
                    

                ],
                [
                    'name.required' =>'Product name is required',
                    'name.unique' => 'Category name is exist.Please choose another one',
                    'description.required' => 'Description is required'
                  
                   
                ]
                );

            $category = new Category();
            $category->name = $req->name;
           
            $category->description = $req->description;
           
            $category->save();

            return redirect()->back()->with('message',"Add category successfully");
    }
    // display edit category page
    public function editCategory($id){

        $category = Category::find($id);
    	return view('admin.editCategory',compact('category'));

    }
    // edit category
    public function postEditCategory(Request $req,$id){

       $this->validate($req,
            [
                'name' => 'required',
                'description' => 'required'
                

            ],
            [
                'name.requiredd' =>'Product name is required',
               
                'description.requiredd' => 'Description is required'
               
               
            ]
            );

        $category = Category::find($id);
        $category->name = $req->name;
       
        $category->description = $req->description;
       
        $category->save();

        return redirect()->back()->with('message',"Update category successfully");
    }
    // delete category
     public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return response()->json(['message',"Delete Category successfully"]);

    }



    // user
    // display list User page
    public function listUser(){

        $user = User::all();
        return view('admin.user',compact('user'));
    }
    // display user profile
    public function readUser($id){

        $user = User::find($id);
        return view('admin.userProfile',compact('user'));
    }
    // delete user 
    public function deleteUser($id){

        $user = User::find($id);
        $user->delete();
        return response()->json(['message',"Delete User successfully"]);
    }



    // search
    // search product
    public function searchProduct(Request $req){

        $product = Product::where('name','like','%'.$req->key.'%')->orwhere('description','like','%'.$req->key.'%')->get();
       
        return view('admin.listProduct',compact('product'));
    }

    // search category
    public function searchCategory(Request $req){

        $category = Category::where('name','like','%'.$req->key.'%')->orwhere('description','like','%'.$req->key.'%')->get();
        return view('admin.listCategory',compact('category'));
    }
    // search user
    public function searchUser(Request $req){

        $user = User::where('fullname','like','%'.$req->key.'%')->orwhere('email','like','%'.$req->key.'%')->orwhere('gender','like','%'.$req->key.'%')->orwhere('address','like','%'.$req->key.'%')->get();
        $num = count($user);

        return view('admin.user',compact('user','num'));
    }



    // export excel
    // export product table
    public function exportProduct(){

         $products = Product::select('products.id','products.name','products.description','products.unit_price','products.unit','categories.name as category_name')->join('categories','products.category_id','=','categories.id')
         ->get();

        // Initialize the array which will be passed into the Excel
            // generator.
            $productsArray = []; 

            // Define the Excel spreadsheet headers
            $productsArray[] = ['Id', 'Name','Description','Price','Unit','Category'];

            // Convert each member of the returned collection into an array,
            // and append it to the products array.
            foreach ($products as $product) {
                $productsArray[] = $product->toArray();
            }
           
            // Generate and return the spreadsheet
            Excel::create('products', function($excel) use ($productsArray) {

                // Set the spreadsheet title, creator, and description
                $excel->setTitle('Danh Sách Sản Phẩm');
                $excel->setCreator('Thai Nguyen')->setCompany('KoiBenTo');
                $excel->setDescription('Danh sách sản phẩm đang được bán.');

                // Build the spreadsheet, passing in the products array
                $excel->sheet('sheet1', function($sheet) use ($productsArray) {
                    // get highest row of table
                   

                    $sheet->mergeCells('A1:F1')->setCellValue('A1', 'Danh Sách Sản Phẩm');

                    $sheet->getDefaultStyle()->getAlignment()->setIndent(1);
                    $sheet->getRowDimension('1')->setRowHeight(50);
                           
                   $style = array(
                        'alignment' => array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    ),
                        'font' => array(
                            'bold'=>true,
                            'size'=>15,
                        )

                 );
                   $styleTitle = array(
                        'alignment' => array(
                            'horizontal' =>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            'vertical' =>PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        ),
                        'font' => array(
                            'bold'=>true,
                            'size'=>20
                        )
                    );
                    $sheet->getStyle('A1')->applyFromArray($styleTitle);
                    $sheet->getStyle("A2:F2")->applyFromArray($style);
                    $sheet->fromArray($productsArray, null, 'A2', false, false);
                });

            })->download('xlsx');
         return redirect()->back();
    }
    // export category table
    public function exportCategory(){
             $categories = Category::select('id','name','description')->get();

            // Initialize the array which will be passed into the Excel
                // generator.
                $categoriesArray = []; 

                // Define the Excel spreadsheet headers
                $categoriesArray[] = ['Id', 'Name','Description'];

                // Convert each member of the returned collection into an array,
                // and append it to the products array.
                foreach ($categories as $category) {
                    $categoriesArray[] = $category->toArray();
                }
               
                // Generate and return the spreadsheet
                Excel::create('products', function($excel) use ($categoriesArray) {

                    // Set the spreadsheet title, creator, and description
                    $excel->setTitle('Danh Sách Thể Loại');
                    $excel->setCreator('Thai Nguyen')->setCompany('KoiBenTo');
                    $excel->setDescription('Danh sách thể loại.');

                    // Build the spreadsheet, passing in the products array
                    $excel->sheet('sheet1', function($sheet) use ($categoriesArray) {
                       
                      

                        $sheet->mergeCells('G1:I1')->setCellValue('G1','Danh Sách Thể Loại');

                        $sheet->getDefaultStyle()->getAlignment()->setIndent(1);
                        $sheet->getRowDimension('1')->setRowHeight(50);
                               
                       $style = array(
                            'alignment' => array(
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        ),
                            'font' => array(
                                'bold'=>true,
                                'size'=>15,
                            )

                     );
                       $styleTitle = array(
                            'alignment' => array(
                                'horizontal' =>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                                'vertical' =>PHPExcel_Style_Alignment::VERTICAL_CENTER,
                            ),
                            'font' => array(
                                'bold'=>true,
                                'size'=>20
                            )
                        );
                        $sheet->getStyle('G1')->applyFromArray($styleTitle);
                        $sheet->getStyle("G2:I2")->applyFromArray($style);
                        $sheet->fromArray($categoriesArray, null, 'G2', false, false);
                    });

                })->download('xlsx');
            return redirect()->back();
    }
    // export user table
    public function exportUser(){
         $users = User::select('id','fullname','email','Gender','contactnumber','address')->get();

        // Initialize the array which will be passed into the Excel
            // generator.
            $usersArray = []; 

            // Define the Excel spreadsheet headers
            $usersArray[] = ['Id', 'Name','Email','Gender','Number','Address'];

            // Convert each member of the returned collection into an array,
            // and append it to the products array.
            foreach ($users as $user) {
                $usersArray[] = $user->toArray();
            }
           
            // Generate and return the spreadsheet
            Excel::create('users', function($excel) use ($usersArray) {

                // Set the spreadsheet title, creator, and description
                $excel->setTitle('Danh Sách người dùng');
                $excel->setCreator('Thai Nguyen')->setCompany('KoiBenTo');
                $excel->setDescription('Danh sách người dùng');

                // Build the spreadsheet, passing in the products array
                $excel->sheet('sheet1', function($sheet) use ($usersArray) {
                    

                    $sheet->mergeCells("A1:F1")->setCellValue('A1','Danh Sách người dùng');

                    $sheet->getDefaultStyle()->getAlignment()->setIndent(1);
                    $sheet->getRowDimension('1')->setRowHeight(50);
                           
                   $style = array(
                        'alignment' => array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    ),
                        'font' => array(
                            'bold'=>true,
                            'size'=>15,
                        )

                 );
                   $styleTitle = array(
                        'alignment' => array(
                            'horizontal' =>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            'vertical' =>PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        ),
                        'font' => array(
                            'bold'=>true,
                            'size'=>20
                        )
                    );
                    $sheet->getStyle('A1')->applyFromArray($styleTitle);
                    $sheet->getDefStyle("A2:F2")->applyFromArray($style);
                    $sheet->fromArray($usersArray, null, 'A2', false, false);
                });

            })->download('xlsx');
            return redirect()->back();
    }
    // export month revenue
    public function export_Month_Revenue(){

        $fromDate = date('Y') .'-'.date('m').'-01 00:00:00';
        $toDate =  date('Y-m-d H:i:s');

         $month_Revenue = DB::select("SELECT order_details.id as id, orders.date_ship,customers.fullname,categories.name,order_details.quanity,((order_details.quanity)*(order_details.unit_price)) as Price FROM order_details INNER JOIN orders ON order_details.order_id = orders.id INNER JOIN products ON order_details.product_id = products.id INNER JOIN categories ON products.category_id = categories.id INNER JOIN customers ON orders.customer_id = customers.id WHERE orders.date_ship BETWEEN '". $fromDate."' AND '". $toDate."' ");

        
        /*Initialize the array which will be passed into the Excel
            generator.*/
          

            // Define the Excel spreadsheet headers
            $data[] = ['STT', 'Ngày giao hàng','Tên Khách Hàng','Loại BenTo','Số Lượng','Thành Tiền','Note'];

            // Convert each member of the returned collection into an array,
            // and append it to the products array.
            $id = 0;
            foreach ($month_Revenue as $value) {

                    $value->id = ++$id;
                $data[] = (array) $value;
                
            }
         
            //Generate and return the spreadsheet
            Excel::create('users', function($excel) use ($data) {

                // Set the spreadsheet title, creator, and description
                $excel->setTitle("Báo cáo bán hàng");
                $excel->setCreator('Thai Nguyen')->setCompany('KoiBenTo');
                $excel->setDescription('Báo cáo bán hàng theo tháng');

                // Build the spreadsheet, passing in the products array
                $excel->sheet('sheet1', function($sheet) use ($data) {
                    

                    $sheet->mergeCells("A1:G1")->setCellValue('A1',"Báo cáo bán hàng tháng ". date('m') ." năm ". date('Y'));

                    $sheet->getDefaultStyle()->getAlignment()->setIndent(1);
                    $sheet->getRowDimension('1')->setRowHeight(50);
                           
                   $style = array(
                        'alignment' => array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    ),
                        'font' => array(
                            'bold'=>true,
                            'size'=>15,
                        )

                 );
                   $styleTitle = array(
                        'alignment' => array(
                            'horizontal' =>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            'vertical' =>PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        ),
                        'font' => array(
                            'bold'=>true,
                            'size'=>20
                        )
                    );
                    $sheet->getStyle('A1')->applyFromArray($styleTitle);
                    $sheet->getStyle('A2:G2')->applyFromArray($style);
                    $sheet->fromArray($data, null, 'A2', false, false);
                });

            })->download('xlsx');
          
    }



}
