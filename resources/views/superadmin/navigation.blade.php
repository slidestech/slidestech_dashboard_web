
@section('navigation_bar')
<div class="pcoded-navigatio-lavel">Principal menu</div>
<ul class="pcoded-item">
    <li class="{{ (\Request::route()->getName() == 'home') ? 'active' : '' }}">
        <a href="{{ route('home') }}">
            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
            <span class="pcoded-mtext">Home</span>
        </a>
    </li>
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="feather icon-user"></i></span>
            <span class="pcoded-mtext">Account settings</span>
        </a>
        <ul class="pcoded-submenu">
        <li class="{{ (\Request::route()->getName() == 'user-profile') ? 'active' : '' }}">
                <a href="/user_profile">
                    <span class="pcoded-mtext">My Profile</span>
                </a>
            </li>
            {{-- <li class=" ">
                <a href="notifications_v">
                    <span class="pcoded-mtext">Notifications</span>
                    <span class="pcoded-badge label label-danger">NOUVEAU</span>
                </a>
            </li> --}}

        </ul>
    </li>
</ul>
<div class="pcoded-navigatio-lavel">Tables management</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="pcoded-hasmenu {{ (\Request::route()->getName() == 'structures-list' || \Request::route()->getName() == 'structuretypes-list' ) ? 'pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fa fa-map "></i></span>
            <span class="pcoded-mtext">Structures Table</span>
        </a>
        <ul class="pcoded-submenu ">
            <li class="{{ (\Request::route()->getName() == 'structures-list') ? 'active' : '' }}">
                <a href="/structures_list">
                    <span class="pcoded-mtext">Structures Table</span>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'structuretypes-list') ? 'active' : '' }}">
                <a href="/structuretypes_list">
                    <span class="pcoded-mtext">Structure Types Table</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="pcoded-hasmenu {{ (\Request::route()->getName() == 'users-list' || \Request::route()->getName() == 'create-user' ) ? 'pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fa fa-users"></i></span>
            <span class="pcoded-mtext">Users</span>
        </a>
        <ul class="pcoded-submenu">
            <li class="{{ (\Request::route()->getName() == 'create-user') ? 'active' : '' }}">
                <a href="/create_user">
                    <span class="pcoded-mtext">Add User</span>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'users-list') ? 'active' : '' }}">
                <a href="/users_list">
                    <span class="pcoded-mtext">Users list</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="pcoded-hasmenu {{ (\Request::route()->getName() == 'roles-list' || \Request::route()->getName() == 'permissions-list' ) ? 'pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fa fa-key"></i></span>
            <span class="pcoded-mtext">Roles - Permissions</span>
        </a>
        <ul class="pcoded-submenu ">
            <li class="{{ (\Request::route()->getName() == 'roles-list') ? 'active' : '' }}">
                <a href="/roles_list">
                    <span class="pcoded-mtext">Roles Table</span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-submenu ">
            <li class="{{ (\Request::route()->getName() == 'permissions-list') ? 'active' : '' }}">
                <a href="/permissions_list">
                    <span class="pcoded-mtext">Permissions Table </span>
                </a>
            </li>
        </ul>
    </li>
    <li class="pcoded-hasmenu {{ (\Request::route()->getName() == 'states-list' || \Request::route()->getName() == 'communes-list' ) ? 'pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fa fa-map "></i></span>
            <span class="pcoded-mtext">States - Communes</span>
        </a>
        <ul class="pcoded-submenu ">
            <li class="{{ (\Request::route()->getName() == 'states-list') ? 'active' : '' }}">
                <a href="/states_list">
                    <span class="pcoded-mtext">States Table</span>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'communes-list') ? 'active' : '' }}">
                <a href="/communes_list">
                    <span class="pcoded-mtext">Communes Table </span>
                </a>
            </li>
        </ul>
    </li>
        <li class="pcoded-hasmenu {{ (\Request::route()->getName() == 'services-list' || \Request::route()->getName() == 'questions-list' ) ? 'pcoded-trigger' : '' }}">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="fa fa-map "></i></span>
                <span class="pcoded-mtext">Services - Questions</span>
            </a>
            <ul class="pcoded-submenu ">
                <li class="{{ (\Request::route()->getName() == 'services-list') ? 'active' : '' }}">
                    <a href="/services_list">
                        <span class="pcoded-mtext">Services Table </span>
                    </a>
                </li>
                <li class="{{ (\Request::route()->getName() == 'questions-list') ? 'active' : '' }}">
                    <a href="/questions_list">
                        <span class="pcoded-mtext">Questions Table </span>
                    </a>
                </li>
            </ul>
</ul>
@endsection
