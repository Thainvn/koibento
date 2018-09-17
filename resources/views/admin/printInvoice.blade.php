<!DOCTYPE html>
<html lang="vi">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

      
       
       <title>Invoice</title>
      <style type="text/css">
      body{
        font-family:  sans-serif;
      }
        .container-fluid{
          width: 794px;
          height: 1123px;
        }
        ul{
            list-style: none;
        }
          .invoice{
           
            padding-right: 80px;
           
          }
          .logo,.koibento{
            display: inline-block;
          }
          .logo img{
            height: 100px;
            width: 100px;
            vertical-align: bottom;
          }
          .logo{
            width :200px;
          }
          .koibento h3{
            margin-left: 40px;
            font-weight: 600;
          }
          .order{
            margin-bottom: 80px;
          }
          .order h1{
            color: #111;
            font-size: 50px;
            font-weight: 650;
            margin-bottom: 30px;
          }
          .order ul{
            padding-left: 0;
          }
          .brand,.customer{
            margin-bottom: 40px;
          }
          .num_order{
            font-weight: 700;
            font-size: 20px;
          }
          .customer p{
            color: #222;

          }
          .koibento{
            margin-left: 100px;
          }
          .name{
            font-size: 20px;
          }
          .media-text-right{
            text-align: right;
          }
          .text-center{
            text-align: center;
          }
          .w-25-pct{
            width: 30%;
          }
           .w-75-pct{
            width: 70%;
          }
          table, th, td {
              border: 1px solid black;
               border-collapse: collapse;
          }
          th, td {
              padding: 10px;
          }
      </style>
</head>
<body>
    
       <div id="page-wrapper">
           <div class="container-fluid">

               

               <div class="row">                               
                   <div class="col-lg-12">
                      
                   <div class="invoice">
                       <div class="brand">
                           <div class="logo">
                               <img src="../../../public/source/admin/images/users/1.jpg">
                           </div>
                           <div class="koibento">
                               <h3>WEBSITE MUA HÀNG TRỰC TUYẾN</h3>
                               <ul>
                                   <li>Hotline đặt hàng : 1900 1000 (8h-16h thứ 2- thứ 6)</li>
                                   <li>Email:koibento@reach.gmail.vn</li>
                                   <li>Hoặc truy cập : http://koibento.com.vn</li>
                               </ul>
                           </div>    
                       </div>
                       <div class="order">
                           <h1 class="text-center">Invoice</h1>
                           <ul>
                               <li>Mã đơn hàng: <span class="num_order">#{{$detail_order[0]->order_id}}</span></li>
                               <li>Ngày đặt hàng: {{$detail_order[0]->date_order}}</li>
                               <li>Phương thức thanh toán:{{$detail_order[0]->payment}}</li>
                           </ul>
                       </div>
                       <div class="customer">
                           
                           <table style="width:100%">
                               <tr>
                                   <th class="w-25-pct">Thông Tin Thanh Toán</th>
                                   <th class="w-75-pct">Địa chỉ giao hàng</th>
                               </tr>
                               <tr>
                                   <td>
                                       <p class="name">{{$detail_order[0]->fullname}}</p>
                                       <p>{{$detail_order[0]->email}}</p>
                                       <p>{{$detail_order[0]->contact_number}}</p>
                                   </td>
                                   <td>
                                       <p class="name">{{$detail_order[0]->fullname}}</p>
                                       <p>{{$detail_order[0]->address}}</p>
                                       <p>T:{{$detail_order[0]->contact_number}}</p>
                                   </td>
                               </tr>
                           </table>
                       </div>
                       <div class="product">
                           <table style="width:100%">
                               <tr>
                                   <th>Sản Phẩm </th>
                                   <th>Số Lượng</th>
                                   <th>Giá</th>
                                   <th>Giảm giá</th>
                                   <th>Tổng</th>
                               </tr>
                               @foreach($detail_order as $value)
                                  
                               <tr>
                                   <td>{{$value->name}}</td>
                                   <td>{{$value->quanity}}</td>
                                   <td>{{$value->unit_price}}</td>
                                   <td>{{($value->unit_price) * ($value->sale)}}</td>
                                  
                                   <td>{{($value->unit_price)*(1- ($value->sale))}}</td>

                               </tr>
                               @endforeach
                               <tr>
                                   <td colspan="4" class="media-text-right">Tổng chưa giảm</td>
                                   <td>{{$sumOriPrice}}</td>
                               </tr>
                                <tr>
                                   <td colspan="4" class="media-text-right">Giảm giá</td>
                                   <td>{{$sumSale}}</td>
                               </tr>
                                <tr>
                                   <td colspan="4" class="media-text-right">Phí Vận Chuyển</td>
                                   <td>0</td>
                               </tr>
                                <tr>
                                   <td colspan="4" class="media-text-right">Tổng cộng </td>
                                   <td>{{$sumPrice}}</td>
                               </tr>
                           </table>
                       </div>
                   </div>
                  
               </div>
           </div>
           <!-- /->container-fluid -->
       </div>
       <!-- /#page-wrapper
    -->

</body>
</html>