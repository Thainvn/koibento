@extends('master')

    @section('title')
        <title>List Category</title>
    @endsection

@section('content')
	<!-- Page Content -->

	<div id="page-wrapper">
	    <div class="container-fluid">

            

	        <div class="row">                               
                <div class="col-lg-12">

                       <form class="navbar-form pull-left" action="{{Route('searchCategory')}}">
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
                          <a href="{{Route('exportCategory')}}" class='btn btn-primary pull-right'>Export Excel</a>
                        </div>
                        <table class="table table-responsive table-striped table-bordered table-hover" >
                       
                            <tr class="text_align_center">
                              
                                <th class="w-15-pct">Name</th>
                                <th class="w-15-pct">Description</th>                              
                                <th class="w-20-pct">Actions</th>
                                
                            </tr>
                       
                            @foreach($category as $category)
                            <tr class="text_align_center" id="item-{{$category->id}}">
                              
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                
                                 <td>
                                 <!-- read product button -->
                                   
                                         
                                         <!-- edit product button -->
                                      <a href="{{Route('editCategory',$category->id)}}" class='btn btn-primary left-margin'>
                                         <span class='fa fa-edit'></span> Edit
                                     </a>
                                         
                                       <!--  delete product button -->
                                    <a class='deleteCategory btn btn-danger' id = "delete-{{$category->id}}" href="#" >
                                    <span class='fa fa-remove'></span> Delete</a>
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