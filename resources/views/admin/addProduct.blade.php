@extends('master')
@section('title')

	<title>Add Product</title>

@endsection

@section('content')
	
	<div id="page-wrapper">
    	    <div class="container-fluid">
    	        <div class="row">
                    <div class="col-lg-12">
                        @if(count($errors)>0)
                            
                                <div class=" alert alert-danger">
                                @foreach($errors->all() as $err)

                                    {{$err}}<br>

                                @endforeach
                                </div>
                            
                        
                        @endif

                        @if(Session::has('message'))
                        <div class="alert alert-success" >{{Session::get('message')}}</div>
                        @endif

                        
                        <div class='right-button-margin'>
                          <a href="{{Route('listProduct')}}" class='btn btn-primary pull-right'>Read Product</a>
                        </div>
                
                         <form action="{{Route('addProduct')}}" method="post" enctype="multipart/form-data">
                          	<input type="hidden" name="_token" value="{{csrf_token()}}">
                             <table class='table table-hover table-responsive table-bordered table-data'>
                          
                                 <tr>
                                     <th>Name</th>
                                     <td><input type='text' name='name' class='form-control' /></td>
                                 </tr>

                                <tr>
                                    <th>Description</th>
                                    <td><textarea name='description' class='form-control'></textarea></td>
                                </tr>

                                 <tr>
                                     <th >Price</th>
                                     <td><input type='text' name='price' class='form-control' /></td>
                                 </tr>
                                <tr>
                                    <th>Unit</th>
                                    <td>
                                        <select class='form-control' name='unit'>
                                            <option>Select unit...</option>
                                         
                                               <option value='Hộp'>Hộp</option>
                                        </select>
                                    </td>
                                </tr>
                                 
                          
                                 <tr>
                                     <th>Category</th>
                                     <td>
                                    		<select class='form-control' name='category_id'>
                                    		    <option>Select category...</option>
                                    		      @foreach($category as $category)
                                    		  
                                    		        <option value='{{$category->id}}'>{{$category->name}}</option>
                                    		  
                                    		      @endforeach
                                    		</select>
                                     </td>
                                 </tr>
                                <tr>
                                    <th >Image</th>
                                    <td><input type='file' name="image" class='form-control' /></td>
                                </tr>
                                 <tr>
                                     <td></td>
                                     <td>
                                         <button type="submit" class="btn btn-primary">Create</button>
                                     </td>
                                 </tr>
                          
                             </table>
                         </form>
                    </div>
                </div>
    	    </div>
    	    <!-- /.container-fluid -->
    	</div>
    	<!-- /#page-wrapper -->

@endsection