@extends('master')
    @section('title')

    	<title>Add Category</title>

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
                              <a href={{Route('listCategory')}} class='btn btn-primary pull-right'>Read Category</a>
                            </div>

                             <form action="{{Route('addCategory')}}" method="post">
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
                                         <td></td>
                                         <td>
                                             <button type="submit" class="btn btn-primary"> <span class='fa fa-add'></span> Create</button>
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