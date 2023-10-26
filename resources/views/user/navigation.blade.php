@section('navigation_bar')
    <div class="pcoded-navigatio-lavel">Principal menu</div>
    <ul class="pcoded-item">
        <li class="{{ \Request::route()->getName() == 'home' ? 'active' : '' }}">
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
                <li class="{{ \Request::route()->getName() == 'user-profile' ? 'active' : '' }}">
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




        <li class="{{ \Request::route()->getName() == 'tasks.index' ? 'active' : '' }}">
            <a href="{{ route('tasks.index') }}">
                <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                <span class="pcoded-mtext">Tasks</span>
            </a>
        </li>
    </ul>
@endsection
