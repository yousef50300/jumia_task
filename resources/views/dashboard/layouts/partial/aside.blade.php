<div class="sidebar">
    <nav class="sidebar-nav pb-3">
        <ul class="nav">
            <li class="nav-title">
                @lang('core.sidebar')
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    Route::is('/dashboard') ? 'active' : ''
                }}" href="{{ route('dashboard.index') }}">
                    <i class="nav-icon fas fa-home"></i>
                    @lang('core.home')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    Route::is('/dashboard/users') ? 'active' : ''
                }}" href="{{ route('dashboard.users.index') }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    {{ __('users.actions.list') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    Route::is('/dashboard/buses') ? 'active' : ''
                }}" href="{{ route('dashboard.buses.index') }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    {{ __('buses.actions.list') }}
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link {{
                    Route::is('/dashboard/cities') ? 'active' : ''
                }}" href="{{ route('dashboard.cities.index') }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    {{ __('cities.actions.list') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    Route::is('/dashboard/routes') ? 'active' : ''
                }}" href="{{ route('dashboard.routes.index') }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    {{ __('routes.actions.list') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    Route::is('/dashboard/trips') ? 'active' : ''
                }}" href="{{ route('dashboard.trips.index') }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    {{ __('trips.actions.list') }}
                </a>
            </li>
        </ul>
    </nav>
</div>
