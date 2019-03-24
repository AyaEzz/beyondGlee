<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/AdminPanel')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                @if ((Auth::user()->role_id) == 1)

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Users </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-account-box"></i><span class="hide-menu"> Users Management </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="sidebar-item"><a href="/admin/AddUser" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Add User </span></a></li>
                                <li class="sidebar-item"><a href="/admin/EditUser" class="sidebar-link"><i class="mdi mdi-account-edit"></i><span class="hide-menu"> Edit User </span></a></li>
                                <li class="sidebar-item"><a href="/admin/DeleteUser" class="sidebar-link"><i class="mdi mdi-account-minus"></i><span class="hide-menu"> Remove User </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"><a href="/admin/UserRoles" class="sidebar-link"><i class="mdi mdi-account-key"></i><span class="hide-menu"> Users Roles </span></a></li>
                    </ul>
                </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/Activity')}}" aria-expanded="false"><i class="mdi mdi-information"></i><span class="hide-menu">Admin Activities</span></a></li>


                @endif


                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span class="hide-menu">Products</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item"><a href="/admin/Product/" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Products </span></a></li>
                                <li class="sidebar-item"><a href="/admin/Product/Add" class="sidebar-link"><i class="mdi mdi-plus-circle"></i><span class="hide-menu"> Add Product </span></a></li>
                                <li class="sidebar-item"><a href="/admin/Product/Edit" class="sidebar-link"><i class="mdi mdi-grease-pencil"></i><span class="hide-menu"> Edit Product </span></a></li>
                                <li class="sidebar-item"><a href="/admin/Product/Delete" class="sidebar-link"><i class="mdi mdi-delete-circle"></i><span class="hide-menu"> Remove Product </span></a></li>
                                <li class="sidebar-item"><a href="/admin/Product/Instagram" class="sidebar-link"><i class="fab fa-instagram"></i><span class="hide-menu"> Instagram </span></a></li>

                    </ul>
                </li>



                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/Categories" aria-expanded="false"><i class="mdi mdi-hexagon-multiple"></i><span class="hide-menu">Categories</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/Distributors" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Distributors</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Orders</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <li class="sidebar-item"><a href="/admin/Orders/" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Orders </span></a></li>
                        <li class="sidebar-item"><a href="/admin/Orders/Edit" class="sidebar-link"><i class="mdi mdi-grease-pencil"></i><span class="hide-menu"> Edit Orders </span></a></li>

                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-wallet-giftcard"></i><span class="hide-menu">Coupons</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <li class="sidebar-item"><a href="/admin/Coupons/" class="sidebar-link"><i class="fas fa-eye"></i><span class="hide-menu"> View Coupons </span></a></li>
                        <li class="sidebar-item"><a href="/admin/Coupons/Add" class="sidebar-link"><i class="mdi mdi-plus-circle"></i><span class="hide-menu"> Add Coupons </span></a></li>
                        <li class="sidebar-item"><a href="/admin/Coupons/Edit" class="sidebar-link"><i class="mdi mdi-grease-pencil"></i><span class="hide-menu"> Edit Coupons </span></a></li>
                        <li class="sidebar-item"><a href="/admin/Coupons/Delete" class="sidebar-link"><i class="mdi mdi-delete-circle"></i><span class="hide-menu"> Deactivate Coupons </span></a></li>

                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/Shipping" aria-expanded="false"><i class="mdi mdi-motorbike"></i><span class="hide-menu">Shipping</span></a></li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->