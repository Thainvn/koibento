@extends('master')
@section('title')
	<title>Chart</title>
@endsection

@section('content')

	<div class="container-fluid">
	    <!-- Start Page Content -->
	    <div class="row">
	        <!-- column -->
	        <div class="col-lg-12">
	        	<div class='right-button-margin'>
	        	  <a href="{{Route('export_Month_Revenue')}}" class='btn btn-primary pull-right'>Export Month Revenue</a>
	        	</div>
	            <div class="card">
	                <div class="card-body">
	                    <h4 class="card-title">Customer Development</h4>
	                    <div id="orderChart" style="height: 370px; width: 100%;"></div>
	                </div>
	            </div>
	        </div>
	        <!-- column -->
	        <!-- column -->
	       
	      <!--   <div class="col-lg-6">
	          <div class="card">
	              <div class="card-body">
	                  <h4 class="card-title">Line Chart</h4>
	                  <div id="morris-line-chart"></div>
	              </div>
	          </div>
	      </div>
	      column
	      column
	      <div class="col-lg-6">
	          <div class="card">
	              <div class="card-body">
	                  <h4 class="card-title">Donut Chart</h4>
	                  <div id="morris-donut-chart"></div>
	              </div>
	          </div>
	      </div>
	      column
	      column
	      <div class="col-lg-12">
	          <div class="card">
	              <div class="card-body">
	                  <h4 class="card-title">Bar Chart</h4>
	                  <div id="morris-bar-chart"></div>
	              </div>
	          </div>
	      </div>
	      column
	      column
	      <div class="col-lg-12">
	          <div class="card">
	              <div class="card-body">
	                  <h4 class="card-title">Extra Area Chart</h4>
	                  <div id="extra-area-chart"></div>
	              </div>
	          </div>
	      </div> -->
	        <!-- column -->
	    </div>

	    <!-- End PAge Content -->
	</div>
	<script>

	    window.onload = function () {

	    var d = new Date();
	    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	     


	   	var chart = new CanvasJS.Chart("orderChart", {
		   		animationEnabled: true,  
		   		title:{
		   			text: "Order Development by Year"
		   		},
		   		axisY: {
		   			title: "Order",
		   			
		   		},
		   		data: [{
		   			type: "splineArea",
		   			color: "rgba(54,158,173,.7)",
		   			markerSize: 5,
		   			xValueFormatString: "MMMM",
		   			
		   			dataPoints:  <?php echo json_encode($order_development, JSON_NUMERIC_CHECK); ?>
		   		}]
	   		});
	   	chart.render();

	}

	</script>
@endsection