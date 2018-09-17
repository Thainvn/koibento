@extends('master')
@section('title')
<title>List Product</title>
@endsection
@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
                <div class="col-lg-12">

                        <form class="navbar-form pull-left" action="{{Route('searchProduct')}}">
                           

                            <div class="input-group">
                                <input type="text" class="form-control" name="key" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                         <div class='right-button-margin'>
                           <a href="{{Route('exportProduct')}}" class='btn btn-primary pull-right'>Export Excel</a>
                         </div>
                        <table class="table table-responsive table-striped table-bordered table-hover" >
                       
                            <tr class="text_align_center">
                                <th class="w-15-pct">Name</th>
                                <th class="w-20-pct">Description</th>
                                <th class="w-5-pct">Price</th>
                                <th class="w-5-pct">Sale</th>
                                <th class="w-5-pct">Category</th>
                                <th class="w-5-pct">likes</th>
                                <th class="w-25-pct text_align_center">Actions</th>                                   
                                
                            </tr>
                            @foreach($product as $product)
                            <tr id="item-{{$product->id}}" class="text_align_center">
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->unit_price}}</td>
                                <td>{{$product->sale}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->likes}}</td>
                              
                                <td>
                                 <!-- read product button -->
                                     <a href="{{Route('readProduct',$product->id)}}" class='btn btn-primary left-margin'>
                                         <span class='fa fa-list'></span> Read
                                     </a>
                                         
                                         <!-- edit product button -->
                                     <a href="{{Route('editProduct',$product->id)}}" class='btn btn-info left-margin'>
                                         <span class='fa fa-edit'></span> Edit
                                     </a>
                                         
                                       <!--  delete product button -->
                                     <a class="deleteProduct btn btn-danger" id="delete-{{$product->id}}" href="#" >
                                         <span class='fa fa-remove'></span> Delete
                                     </a>
                                </td>
                            </tr>
                            @endforeach
                       
                    </table>
                </div>
            </div>
	    </div>
	    <!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->

@endsection