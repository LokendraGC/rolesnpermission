 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link @if (Request::segment(2) != 'dashboard') collapsed @endif" href="{{ route('admin.dashboard') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->


         {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li>
            </ul>
        </li> --}}
         {{--
        <li class="nav-heading">Pages</li> --}}

         <li class="nav-item">
             <a class="nav-link @if (Request::segment(2) != 'users' && Request::segment(2) != 'add-user' && Request::segment(2) != 'edit-user') collapsed @endif" href="{{ route('show.users') }}">
                 <i class="bi bi-person"></i>
                 <span>Users</span>
             </a>
         </li><!-- End Profile Page Nav -->

         <li class="nav-item">

             <a class="nav-link @if (Request::segment(2) != 'roles' && Request::segment(2) != 'add-roles' && Request::segment(2) != 'edit-role') collapsed @endif" href="{{ route('roles') }}">
                 <i class="bi bi-card-list"></i>
                 <span>Role</span>
             </a>
         </li><!-- End Register Page Nav -->

         <li class="nav-item">
             <a class="nav-link @if (Request::segment(2) != 'products' && Request::segment(2) != 'add-product' && Request::segment(2) != 'edit-product') collapsed @endif" href="{{ route('products') }}">
                 <i class="bi bi-bag-dash-fill"></i>
                 <span>Product</span>
             </a>
         </li><!-- End Login Page Nav -->

         <li class="nav-item">
             <a class="nav-link @if (Request::segment(2) != 'categories' &&
                     Request::segment(2) != 'add-category' &&
                     Request::segment(2) != 'edit-category') collapsed @endif" href="{{ route('categories') }}">
                 <i class="bi bi-basket2-fill"></i>
                 <span>Category</span>
             </a>
         </li><!-- End Login Page Nav -->

     </ul>

 </aside><!-- End Sidebar-->
