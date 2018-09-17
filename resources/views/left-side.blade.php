 <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>

                        <li> <a href="{{Route('index')}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                           
                        </li>
                        <li class="nav-label">Apps</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Email</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="email-compose.html">Compose</a></li>
                                <li><a href="email-read.html">Read</a></li>
                                <li><a href="email-inbox.html">Inbox</a></li>
                            </ul>
                        </li>
                        <li> <a href="{{Route('chart')}}" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Charts</span></a>                            
                        </li>
                      
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Category</span></a>
                           <ul aria-expanded="false" class="collapse">
                               <li><a href="{{Route('listCategory')}}">List Category</a></li>
                               <li><a href="{{Route('addCategory')}}">Add Category</a></li>
                               
                           </ul>
                       </li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cube"></i><span class="hide-menu">Product</span></a>
                           <ul aria-expanded="false" class="collapse">
                               <li><a href="{{Route('listProduct')}}">List Product</a></li>
                               <li><a href="{{Route('addProduct')}}">Add Product</a></li>
                              
                           </ul>
                       </li>
                       <li> <a href="{{Route('listUser')}}" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">User</span></a>
                           
                       </li>
                       
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>