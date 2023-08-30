<nav class="navbar sticky-top   navbar-lg " data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">School</a>
        <a class="navbar-toggler"  data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="sidebar" >
           <i class="fa-solid fa-bars"></i>
        </a>
        <div class="offcanvas offcanvas-end " tabindex="-1" id="sidebar"
            aria-labelledby="sidebarLabel" data-bs-theme="dark">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" >
                <ul class="navbar-nav ">
                    <li class="navbar-items border-bottom d-flex justify-content-end">
                        <a href="{{ url('login') }}" class="nav-link text-light">Masuk</a>
                    </li>
                    <li class="navbar-items border-bottom d-flex justify-content-end">
                        <a href="{{ url('register') }}" class="nav-link text-light">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
