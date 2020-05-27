<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="http://lexa-v.laravel.themesbrand.com/index" class="logo">
                        <span class="text-white">
                            <img src="/favicon.png" alt="" height="18">
                            Rising Tide Africa
                        </span>
            <i>
                <img src="/favicon.png" alt="" height="22">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="navbar-right d-flex list-inline float-right mb-0">
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="/images/user-4.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                        <a class="dropdown-item text-danger" href="/admin/logout"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-key text-danger"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="/admin/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="fa fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
