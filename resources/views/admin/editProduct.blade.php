@extends('master')

@section('title')

    <title>Edit Product</title>

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
                         <form action="{{Route('editProduct',$product->id)}}" method="post" enctype="multipart/form-data">
                         
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <table class='table table-hover table-responsive table-bordered table-data'>
                          
                                 <tr>
                                     <th>Name</th>
                                     <td><input type='text' name='name' class='form-control' value="{{$product->name}}"/></td>
                                 </tr>
                                
                                <tr>
                                     <th>Description</th>
                                     <td><textarea name='description' class='form-control'>{{$product->description}}</textarea></td>
                                 </tr>

                                 <tr>
                                     <th >Price</th>
                                     <td><input type='text' name='price' class='form-control' value="{{$product->unit_price}}"/></td>
                                 </tr>
                          
                                 
                          
                                 <tr>
                                     <th>Category</th>
                                     <td>
                                            <select class='form-control' name='category_id'>
                                               
                                                @foreach($category as $category)
                                                        
                                             <!-- current category of the product must be selected -->
                                                   @if($product->category_id == $category->id){

                                                       <option value="{{$category->id}}" selected>
                                                            {{$category->name}}
                                                       </option>
                                                   }
                                                   @else{
                                                       <option value="{{$category->id}}">
                                                            {{$category->name}}
                                                        </option>
                                                   }
                                            
                                                 @endif
                                                    
                                                @endforeach
                                             
                                            </select>
                                     </td>
                                 </tr>
                                 <tr>
                                     <th >Image</th>

                                     <td>
                                         <img  src="{{asset('source/KOIBENTO/images/')}} /{{$product->url_image}}">
                                         <input type="file" name="image" value="{{$product->url_image}}">
                                     </td>
                                 </tr>
                                 <tr>
                                     <td></td>
                                     <td>
                                         <button type="submit" class="btn btn-primary"><span class='fa fa-edit'></span>Update</button>
                                     </td>
                                 </tr>
                          
                             </table>
                         </form>
                    </div>
                </div>
            </div>
           <!--  .container-fluid -->
        </div>
       <!--  #page-wrapper -->

@endsection 