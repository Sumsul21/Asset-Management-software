    <!--**********************************
                Sidebar start
    ***********************************-->
    <div class="deznav scrollbar">
        {{-- <div class=""> --}}
            <div class="main-profile">
                <div class="image-bx">
                    <img src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="">
                    <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                </div>
                <h5 class="name">{{ Auth::user()->name }}</h5>
                <p class="email"><a href="mailto:<nowiki>{{ Auth::user()->email }}">[{{ Auth::user()->email }}]</a></p>
            </div>
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <li><a href="{{route('dashboard')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-144-layout"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-152-followers"></i>
                        <span class="nav-text">Setting</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('asset_group.index')}}">Asset Group</a></li>
                        <li><a href="{{route('asset_type.index')}}">Asset Type</a></li>
                        <li><a href="{{route('asset_details.index')}}">Asset Details</a></li>
                        <li><a href="{{route('dep_name.index')}}">Depreciation Method</a></li>
                        <li><a href="{{route('supply_name.index')}}">Supplier Information</a></li>
                        <li><a href="{{ route('employee.index') }}">Employee</a></li>
                        {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Employee</a>
                            <ul aria-expanded="false">
                                <li><a href="#">Employee List</a></li>
                                <li><a href="#">Employee Register</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="{{ route('dep_det.index') }}">Department</a></li>
                        <li><a href="{{ route('dept_loc.index') }}">Location</a></li>

                    </ul>
                </li>


                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-layer-1"></i>
                        <span class="nav-text">Asset Movement</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('ast_trans.index')}}">Info</a></li>
                        <li><a href="{{ route('allocation.index') }}">Allocation</a></li>
                        <li><a href="{{ route('asset-withdraw.index') }}">Asset Withdrawal</a></li>
                        <li><a href="{{ route('movement.index') }}">Movement</a></li>
                        <li><a href="{{route('ast_repair.index')}}">Repair</a></li>
                        <li><a href="{{route('ast_repair_approve.index')}}">Approve Repair</a></li>

                    </ul>

                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        </i><i class="flaticon-152-followers"></i>
                        <span class="nav-text">Inventory</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('purchase.index')}}">Purchase</a></li>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('inv_purchase_approve.create')}}">Approve Purchase </a></li>
                            <li><a href="{{ route('det_part_no',['cat_id' => 1])}}">Pur Part No & SL No</a></li>
                        </ul>

                    </ul>
                </li>

                <li class="nav-label">Apps</li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-077-menu-1"></i>
                        <span class="nav-text">Apps</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="#">Profile</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                            <ul aria-expanded="false">
                                <li><a href="#">Product Grid</a></li>
                                <li><a href="#">Product List</a></li>
                                <li><a href="#">Product Details</a></li>
                            </ul>
                        </li>
                    </ul>
                    {{-- <ul aria-expanded="false">
                        <li><a href="{{route('sales_quoation.index')}}">Sales Quotation</a></li>
                        <li><a href="{{route('sales.index')}}" >Sales</a></li>
                        <li><a href="{{route('sales_cashmemo.index')}}">Cash Memo Sales</a></li>
                        <li><a href="{{route('sales_requisition.index')}}">Item Requisition</a></li>
                        <li><a href="{{route('sales_installation.index')}}">Installation</a></li>
                        <li><a href="{{route('sales_payment_receive.index')}}">Payment Receive</a></li>
                        <li><a href="{{route('sales_cheque_return.index')}}">Cheque Return</a></li>
                        <li><a href="{{route('sales_product_return.index')}}" >Product Return</a></li>
                        <li><a href="{{route('coming_soon')}}">Stock Position</a></li>
                        <li><a href="{{route('coming_soon')}}">Conveyance</a></li>
                        <li><a href="{{route('coming_soon')}}">Verify Conveyance</a></li>
                        <li><a href="{{route('mast_item.index')}}">Item Catalogue</a></li>
                        <li><a href="{{route('mast_client.index')}}">Client Details</a></li>
                        <li><a href="{{route('mast_grade.index')}}">Grade Code</a></li>
                        <li><a href="{{route('mast_supplier.index')}}">Supplier Details</a></li>
                        <li><a href="{{route('mast_employee.index')}}">Employee Category</a></li>
                        <li><a href="{{route('mast_designation.index')}}">Designation</a></li>
                        <li><a href="{{route('mast_department.index')}}">Department</a></li>
                        <li><a href="{{route('mast_leaveType.index')}}">Leave type</a></li>
                        <li><a href="{{route('mast_package.index')}}">Package Type</a></li>
                        <li><a href="{{route('mast_salary.index')}}">Salary structure</a></li>
                        <li><a href="{{route('mast_store.index')}}">Store Detials</a></li>
                        <li><a href="{{route('mast_unit.index')}}">Unit Details</a></li>
                    </ul> --}}
                </li>
                @canany('Setting access')
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Setting</span>
                    </a>
                    <ul aria-expanded="false">
                        @canany('Role access','Role add','Role edit','Role delete')
                            <li><a href="{{ route('roles.index') }}">Role</a></li>
                        @endcanany

                        @canany('User access','User add','User edit','User delete')
                        <li><a href="{{ Route('users.index')}}">User</a></li>
                        @endcanany
                    </ul>
                </li>
                @endcanany
            </ul>
            <div class="copyright">
                <p><strong>Asset Management Admin Dashboard</strong> © 2023 All Rights Reserved</p>
                <p class="fs-12">Made with <span class="heart"></span> by Icon ISL</p>
            </div>
        {{-- </div> --}}
    </div>
    <!--**********************************
                Sidebar end
    ***********************************-->
