@extends('master')
    @section('title')
    <title>List User</title>
    @endsection
    @section('content')
    	<!-- Page Content -->
    	<div id="page-wrapper">
    	    <div class="container-fluid">
    	        <div class="row">
                    <div class="col-lg-12">

                            @if(isset($num))
                                <div style="margin-bottom: 20px;">Tìm thấy {{$num}} kết quả.</div>
                            @endif
                            <form class="navbar-form pull-left" action="{{Route('searchUser')}}">
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
                                <a href="{Route('exportUser')}" class='btn btn-primary pull-right'>Export Excel</a>
                            </div>
                            <table class="table table-responsive table-bordered table-hover">
                          
                           
                                <tr class="text_align_center">
                                   
                                    <th class="w-10-pct">Name</th>
                                    <th class="w-15-pct">Email</th>
                                    <th class="w-5-pct">Gender</th>                                   
                                    <th class="w-10-pct">Number</th>                                   
                                    <th class="w-20-pct">Address</th>                                   
                                    <th class="w-20-pct">Action</th>                                   
                                </tr>
                          
                                @foreach($user as $user)
                                <tr id="item-{{$user->id}}" class="text_align_center">
                                   
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->contactnumber}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>
                                    <!-- read product button -->
                                        <a href="{{Route('readUser',$user->id)}}" class='btn btn-primary left-margin'>
                                            <span class='glyphicon glyphicon-list'></span> Read
                                        </a>
                                            
                                                                                 
                                          <!--  delete product button -->
                                        <a id="delete-{{$user->id}}" class='deleteUser btn btn-danger'>
                                            <span class='glyphicon glyphicon-remove'></span> Delete
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