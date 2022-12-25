<style type="text/css">

</style>
<header class="app-header">

    <a class="app-header__logo" href="{{url('/')}}">
        <img src="{{url('uploads/logo/'.settings()->panel_logo)}}" alt="" style="height:50px; width: 100%;">
    </a>


    <ul class="app-nav">

        <!-- Super Admin -->
        @if (Auth::user()->is_admin == 1)
            <li>
                <a class="app-nav__item" href="{{ url('admin/dashboard') }}">
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>

            <li class="dropdown texr-center">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    Admin
                    <i class="fa-solid fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="{{ url('admin/list-admin') }}">
                            <i class="fa fa-cog fa-lg"></i>
                            List Admin

                        </a>
                    </li>

                </ul>
            </li>

            <li class="dropdown texr-center">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    Profile
                    <i class="fa-solid fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="{{ url('admin/dashboard/all-manager-profile') }}">
                            Manager Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('admin/dashboard/all-loan-officer-profile') }}">
                            Loan Officer Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('admin/dashboard/all-rejected-profile') }}">
                            Member Rejected Profile
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="app-nav__item" href="{{ url('admin/dashboard/all-member-list') }}">
                    <span class="app-menu__label">Member List</span>
                </a>
            </li>

            <li>
                <a class="app-nav__item" href="{{ url('admin/dashboard/member-edit/list') }}">
                    <span class="app-menu__label">All Edit Request</span>
                </a>
            </li>

            <li>
                <a class="app-nav__item" href="{{ url('admin/site-settings') }}">
                    <span class="app-menu__label">Settings</span>
                </a>
            </li>


            {{-- Notification --}}
            <li class="dropdown">
                <a href="{{ url('admin/dashboard/member-edit/list') }}" aria-label="Open Profile Menu"
                    style="line-height: 33px;" class="btn btn-primary" data-toggle="dropdown">
                    Notifications <span
                        class="badge bg-secondary">{{ count(SuperAdminNotification()) + count(Notification()) }}</span>
                </a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">

                    @foreach (SuperAdminNotification() as $notification)
                        <li style="padding: 10px;display: flex;justify-content: space-between;">
                            <a>
                                {{ $notification->n_type }}
                            </a>
                            <a href="{{ route('notification.view', $notification->id) }}">
                                View
                            </a>
                        </li>
                    @endforeach

                    @foreach (Notification() as $item)
                        <li style="padding: 10px;display: flex;justify-content: space-between;">
                            <a>
                                Edit Request
                            </a>
                            <a href="{{ route('member.edit.request.view', $item->id) }}">
                                View ({{ count(Notification()) }})
                            </a>
                        </li>
                    @endforeach


                </ul>
            </li>
            {{-- Notification --}}

        @endif
        <!-- Super Admin -->

        <!-- Notice Admin -->
        @if (Auth::user()->is_admin == 4)
            <li>
                <a class="app-nav__item" href="{{ url('home') }}">
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="app-nav__item" href="{{ url('admin/dashboard/all-member-list') }}">
                    <span class="app-menu__label">Member List</span>
                </a>
            </li>
            <li>
                <a class="app-nav__item" href="{{ url('create-notice') }}">
                    <span class="app-menu__label">Add Notice</span>
                </a>
            </li>

            {{-- Notification --}}
            <li class="dropdown">
                <a href="{{ url('admin/dashboard/member-edit/list') }}" aria-label="Open Profile Menu"
                    style="line-height: 33px;" class="btn btn-primary" data-toggle="dropdown">
                    Notifications <span class="badge bg-secondary">{{ count(NoticeAdminNotification()) }}</span>
                </a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">

                    @foreach (NoticeAdminNotification() as $notification)
                        <li style="padding: 10px;display: flex;justify-content: space-between;">
                            <a>
                                {{ $notification->n_type }}
                            </a>
                            <a href="{{ route('notification.view', $notification->id) }}">
                                View
                            </a>
                        </li>
                    @endforeach

                </ul>
            </li>
            {{-- Notification --}}

        @endif
        <!-- Notice Admin -->


        <!-- Manager -->
        @if (Auth::user()->is_admin == 2)
            <li>
                <a class="app-nav__item" href="{{ url('home') }}">
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="app-nav__item" href="{{ url('home/create-loan-officer') }}">
                    <span class="app-menu__label">Add Loan Officer</span>
                </a>
            </li>

            <li>
                <a class="app-nav__item" href="{{ url('home/loan-member-list') }}">
                    <span class="app-menu__label">Member List</span>
                </a>
            </li>
            <li>
                <a class="app-nav__item" href="{{ url('home/manager/profile-settings') }}">
                    <span class="app-menu__label">Profile Settings</span>
                </a>
            </li>

            {{-- Notification --}}
            <li class="dropdown">
                <a href="{{ url('admin/dashboard/member-edit/list') }}" aria-label="Open Profile Menu"
                    style="line-height: 33px;" class="btn btn-primary" data-toggle="dropdown">
                    Notifications
                    <span class="badge bg-secondary">
                        {{ count(ManagerNotification(Auth::user()->id)) }}
                    </span>
                </a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">

                    @foreach (ManagerNotification(Auth::user()->id) as $notification)
                        <li style="padding: 10px;display: flex;justify-content: space-between;">
                            <a>
                                {{ $notification->n_type }}
                            </a>
                            <a href="{{ route('notification.view', $notification->id) }}">
                                View
                            </a>
                        </li>
                    @endforeach

                </ul>
            </li>
            {{-- Notification --}}
        @endif
        <!-- Manager -->


        <!-- Loan Officer -->
        @if (Auth::user()->is_admin == 3)
            <li>
                <a class="app-nav__item" href="{{ url('home') }}">
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="app-nav__item" href="{{ url('home/create-user-profile') }}">
                    <span class="app-menu__label">Form</span>
                </a>
            </li>


            <li>
                <a class="app-nav__item" href="{{ url('home/loan-officer-member-list') }}">
                    <span class="app-menu__label">Member List</span>
                </a>
            </li>

            <li>
                <a class="app-nav__item" href="{{ url('home/loan-officer/loan-recive') }}">
                    <span class="app-menu__label">Recived Ammount</span>
                </a>
            </li>



            <li>
                <a class="app-nav__item" href="{{ url('home/loan-officer/profile-settings') }}">
                    <span class="app-menu__label">Profile Settings</span>
                </a>
            </li>


            {{-- Notification --}}
            <li class="dropdown">
                <a href="{{ url('admin/dashboard/member-edit/list') }}" aria-label="Open Profile Menu"
                    style="line-height: 33px;" class="btn btn-primary" data-toggle="dropdown">
                    Notifications <span
                        class="badge bg-secondary">{{ count(OfficerNotification(Auth::user()->id)) }}</span>
                </a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">

                    @foreach (OfficerNotification(Auth::user()->id) as $notification)
                        <li style="padding: 10px;display: flex;justify-content: space-between;">
                            <a>
                                {{ $notification->n_type }}
                            </a>
                            <a href="{{ route('notification.view', $notification->id) }}">
                                View
                            </a>
                        </li>
                    @endforeach



                </ul>
            </li>
            {{-- Notification --}}


        @endif
        <!-- Loan Officer -->


        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                Welcome : {{ Auth::user()->name }}
                <i class="fa fa-user fa-lg"></i>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                            class="fa fa-user fa-lg"></i>Logout</a>
                </li>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>


            </ul>
        </li>


    </ul>
</header>
