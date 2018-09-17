@extends('master')

@section('title')
	<title>Dashboard</title>
@endsection

@section('content')
	<div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>{{number_format($revenue)}}<span>đ</span></h2>
                                <p class="m-b-0">Total Revenue</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>{{$sales}}</h2>
                                <p class="m-b-0">Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>25</h2>
                                <p class="m-b-0">Stores</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>{{$customer}}</h2>
                                <p class="m-b-0">Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                <!-- column -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Extra Area Chart</h4>
                            <div id="barChartContainer" style="height: 370px; width: 100%;"></div>

                        </div>
                    </div>
                </div>
                <!-- column -->

                <!-- column -->
                <div class="col-lg-4">
                    <div class="card">
                       <div id="pieChartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <!-- column -->
            </div>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Recent Orders </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="table_order">
                                <table class="table">
                                  
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Orders</th>                                       
                                              <th>Note</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                   
                                  
                                        @foreach ($pendingOrder as $value)
                                            <tr id="item-{{$value->id}}">
                                                <td>{{$value->id}}</td>
                                                <td>{{$value->fullname}}</td>
                                                <td>{{$value->contact_number}}</td>
                                               
                                               
                                                <td>{{$value->orders}}</td>
                                                <td>{{$value->note}}</td>
                                               
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{Route('detailOrders',$value->id)}}">Detail</a>

                                                    <a  class="updateStatus btn btn-info" href="#" id ="update-{{$value->id}}" >Update</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- End PAge Content -->
    </div>
    <script>

        window.onload = function () {
        var d = new Date();
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
         


        var barChart = new CanvasJS.Chart("barChartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Doanh thu hàng tháng năm" + d.getFullYear()
            },
            axisY: {
                title: "Doanh thu",
                includeZero: false
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($monthly_revenue, JSON_NUMERIC_CHECK); ?>
            }]
        });
        barChart.render();

         var pieChart = new CanvasJS.Chart("pieChartContainer", {
            animationEnabled: true,
            title: {
                text: "Hot Product"
            },
            subtitles: [{
                text: months[d.getMonth()] + " " + d.getFullYear()
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($hot_ProductId, JSON_NUMERIC_CHECK); ?>
            }]
         });
         pieChart.render();
        }

    </script>
@endsection