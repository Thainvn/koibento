@extends('master')

@section('title')

    <title>Invoice</title>

@endsection

@section('content')
    
       <div id="page-wrapper">
           <div class="container-fluid">

               

               <div class="row">                               
                   <div class="col-lg-12">
                      
                   <div class="invoice">
                       <div class="brand">
                           <div class="logo">
                               <img src="{{asset('source/admin/images/logo.png')}}">
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
                           
                           <table class="table table-bordered table-hover">
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
                           <table class="table  table-bordered table-hover">
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
                                   <td>{{number_format($value->unit_price)}}<span>đ</span></td>
                                   <td>{{number_format(($value->unit_price) * ($value->sale))}}<span>đ</span></td>
                                  
                                   <td>{{number_format(($value->unit_price)*(1- ($value->sale)))}}<span>đ</span></td>

                               </tr>
                               @endforeach
                               <tr>
                                   <td colspan="4" class="media-text-right">Tổng chưa giảm</td>
                                   <td>{{number_format($sumOriPrice)}}<span>đ</span></td>
                               </tr>
                                <tr>
                                   <td colspan="4" class="media-text-right">Giảm giá</td>
                                   <td>{{number_format($sumSale)}}<span>đ</span></td>
                               </tr>
                                <tr>
                                   <td colspan="4" class="media-text-right">Phí Vận Chuyển</td>
                                   <td>0<span>đ</span></td>
                               </tr>
                                <tr>
                                   <td colspan="4" class="media-text-right">Tổng cộng </td>
                                   <td>{{number_format($sumPrice)}}<span>đ</span></td>
                               </tr>
                           </table>
                       </div>
                   </div>
                   <div class='right-button-margin'>
                        
                        <a href="{{Route('printInvoice',$detail_order[0]->order_id)}}" class='btn btn-primary pull-right'> Print Invoice</a>
                        <a href="{{Route('index')}}" class='btn btn-info pull-right' style="margin-right: 1em;"> Back</a>
                        </div>
               </div>
           </div>
           <!-- /->container-fluid -->
       </div>
       <!-- /#page-wrapper
    -->

@endsection 