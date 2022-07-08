<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('images/backend/brand/logo.svg') }}" width="89" height="25"
             alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="{{ asset('images/backend/brand/sygnet.svg') }}" width="30" height="30"
             alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
        {{--<li class="nav-item px-3">--}}
        {{--<a class="nav-link" href="{{ route('frontend.index') }}"><i class="fas fa-home"></i></a>--}}
        {{--</li>--}}

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('dashboard.index') }}">{{ trans('core.home') }}</a>
        </li>
    </ul>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <img src="{{ asset('images/backend/avatar.png') }}" class="img-avatar" alt="nnn">
                <span class="d-md-down-none">{{ auth()->user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <a class="dropdown-item" href=""
                   onclick="event.preventDefault();document.getElementById('logoutForm').submit()">
                    <i class="fas fa-lock"></i> {{ __('core.logout') }}
                </a>

                <form style="display: none;" action="{{ route('dashboard.admin.logout') }}" method="post" id="logoutForm">
                    @csrf
                </form>

            </div>

        </li>


    </ul>

    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        {{--<span class="navbar-toggler-icon"></span>--}}
    </button>

    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>
