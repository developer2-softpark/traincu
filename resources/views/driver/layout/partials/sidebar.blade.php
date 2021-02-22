<div class="col-md-2 col-sm-12 dashboard-sidebar">
    <div class="mr-1 shadow-lg">
        <div class="px-2 py-3 bg-purple-300 d-flex align-items-center">
            <div class="mx-2 sidebar-user-img-div">
                <img class="sidebar-user-img"
                    src="{{asset(auth()->user()->driver ? auth()->user()->driver->image : 'images/user2-160x160.jpg')}}"
                    alt="" />
                <div class="green-dot"></div>
            </div>
            <div class="ml-2 text-white text-rtl">
                <p class="m-0 text-17 font-weight-bold">Welcome Back!</p>
                <p class="m-0 text-17">{{auth()->user()->name}}</p>
            </div>
        </div>
        <div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a class="sidebar-link {{active('driver.dashboard')}}" href="{{route('driver.dashboard')}}">
                        <span class="sidebar-icon">
                            <i class="icon-dashboard"></i>
                        </span>
                        <span class="sidebar-link-name"> Dashboard </span>
                        <span class="ml-auto nav-rtl icon-right">
                            <i class="fas fa-arrow-circle-down"></i>
                        </span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link {{active('driver.my-profile.show')}}"
                        href="{{route('driver.my-profile.show')}}">
                        <span class="sidebar-icon">
                            <i class="icon-user"></i>
                        </span>
                        <span class="sidebar-link-name"> Profile </span>
                        <span class="ml-auto nav-rtl icon-right">
                            <i class="icon-chevron-right"></i>
                        </span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link" href="{{route('driver.change-password.show')}}">
                        <span class="sidebar-icon">
                            <i class="icon-key"></i>
                        </span>
                        <span class="sidebar-link-name"> Change Password </span>
                        <span class="ml-auto nav-rtl icon-right">
                            <i class="icon-chevron-right"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>