 <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
     <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
         aria-labelledby="sidebarMenuLabel">
         <div class="offcanvas-header">
             <h5 class="offcanvas-title" id="sidebarMenuLabel">School</h5>
             <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                 aria-label="Close"></button>
         </div>
         <div class="offcanvas-body d-md-flex flex-column p-2 pt-lg-3 overflow-y-auto">
             <ul class="navbar-nav flex-column">
                 <li class="nav-item">
                     <a class="nav-link d-flex align-items-center gap-2 {{ request()->segment('1') == 'dashboard' ? 'active' : '' }}" aria-current="page" href="{{ url('/dashboard') }}">
                         Dashboard
                     </a>
                 </li>

                 <h6
                     class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                     <span>Data</span>
                 </h6>
                 <ul class="navbar-nav flex-column mb-auto">
                     <li class="nav-item">
                         <a class="nav-link d-flex align-items-center gap-2 {{ request()->segment('1') == 'student' ? 'active' : '' }}" href="{{ url('student') }}">
                             Student
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link d-flex align-items-center gap-2 {{ request()->segment('1') == 'classroom' ? 'active' : '' }}" href="{{ url('classroom') }}">
                             Classroom
                         </a>
                     </li>
                 </ul>

                 <hr class="my-3">
                 <ul class="navbar-nav flex-column mb-auto">
                     <li class="nav-item">
                         <a class="nav-link d-flex align-items-center gap-2" href="#">
                             Sign out
                         </a>
                     </li>
                 </ul>
         </div>
     </div>
 </div>
