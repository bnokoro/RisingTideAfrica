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
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti-bell noti-icon"></i>
                    <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg" style="">
                    <h6 class="dropdown-item-text">
                        Notifications (258)
                    </h6>
                    <div class="slimScrollDiv"
                         style="position: relative; overflow: hidden; width: auto; height: 314.3px;">
                        <div class="slimscroll notification-item-list"
                             style="overflow: hidden; width: auto; height: 314.3px;">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text
                                        of the printing and typesetting industry.</small></p>
                            </a>

                        </div>
                        <div class="slimScrollBar"
                             style="background: rgb(158, 165, 171) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                        <div class="slimScrollRail"
                             style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                    <a href="#" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li>
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="/images/user-4.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <a class="dropdown-item d-block" href="/admin/account-settings">
                            <i
                                class="fa fa-cog m-r-5"></i> Account Settings</a>
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-key text-danger"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form> --}}
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
