 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         @php
             $PermissionDashboard = App\Models\RoleHasPermission::getPermissions('dashboard', Auth::user()->role_id);
             $PermissionUser = App\Models\RoleHasPermission::getPermissions('users', Auth::user()->role_id);
             $PermissionRole = App\Models\RoleHasPermission::getPermissions('roles', Auth::user()->role_id);
             $PermissionProduct = App\Models\RoleHasPermission::getPermissions('products', Auth::user()->role_id);
             $PermissionCategory = App\Models\RoleHasPermission::getPermissions('categories', Auth::user()->role_id);
         @endphp

         @if (!empty($PermissionDashboard))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'dashboard') collapsed @endif"
                     href="{{ route('admin.dashboard') }}">
                     <i class="bi bi-grid"></i>
                     <span>Dashboard</span>
                 </a>
             </li><!-- End Dashboard Nav -->
         @endif

         @if (!empty($PermissionUser))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'users' && Request::segment(2) != 'add-user' && Request::segment(2) != 'edit-user') collapsed @endif" href="{{ route('show.users') }}">
                     <i class="bi bi-person"></i>
                     <span>Users</span>
                 </a>
             </li><!-- End Profile Page Nav -->
         @endif

         @if (!empty($PermissionRole))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'roles' && Request::segment(2) != 'add-roles' && Request::segment(2) != 'edit-role') collapsed @endif" href="{{ route('roles') }}">
                     <i class="bi bi-card-list"></i>
                     <span>Role</span>
                 </a>
             </li><!-- End Register Page Nav -->
         @endif

         @if (!empty($PermissionProduct))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'products' && Request::segment(2) != 'add-product' && Request::segment(2) != 'edit-product') collapsed @endif" href="{{ route('products') }}">
                     <i class="bi bi-bag-dash-fill"></i>
                     <span>Product</span>
                 </a>
             </li><!-- End Login Page Nav -->
         @endif

         @if (!empty($PermissionCategory))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'categories' &&
                         Request::segment(2) != 'add-category' &&
                         Request::segment(2) != 'edit-category') collapsed @endif"
                     href="{{ route('categories') }}">
                     <i class="bi bi-basket2-fill"></i>
                     <span>Category</span>
                 </a>
             </li><!-- End Login Page Nav -->
         @endif

     </ul>

 </aside><!-- End Sidebar-->
