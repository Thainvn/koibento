@extends('master')
@section('title')

    <title>Add Product</title>

@endsection

@section('content')
    
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       

                        
                        <div class='right-button-margin'>
                          <a href="{{Route('listProduct')}}" class='btn btn-primary pull-right'>Read Products</a>
                        </div>
                
                       
                             <table class='table table-hover table-responsive table-bordered table-data'>
                          
                                 <tr>
                                     <th>Name</th>
                                     <td>{{$product[0]->name}}</td>
                                 </tr>

                                <tr>
                                    <th>Description</th>
                                    <td>{{$product[0]->description}}</textarea></td>
                                </tr>

                                 <tr>
                                     <th >Price</th>
                                     <td>{{$product[0]->unit_price}}</td>
                                 </tr>
                                <tr>
                                    <th>Unit</th>
                                    <td>
                                       {{$product[0]->unit}}
                                    </td>
                                </tr>
                                 
                          
                                 <tr>
                                     <th>Category</th>
                                     <td>
                                            {{$product[0]->category_name}}
                                     </td>
                                 </tr>
                          
                                 <tr>
                                     <th>Image</th>
                                     <td>
                                         <img style="max-width: 250px;max-height: 250px;" src="{{asset('source/KOIBENTO/images/')}}/{{$product[0]->url_image}} ">
                                     </td>
                                 </tr>
                          
                             </table>
                        
                    </div>
                </div>
            </div>
           <!--  .container-fluid -->
        </div>
       <!--  #page-wrapper -->

@endsection 