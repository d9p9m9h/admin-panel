<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        @auth
            @if (auth()->user()->isSuperAdmin())
                <a href="{{ route('admin.dashboard') }}" class="brand-link">
                    <span class="brand-text fw-light">{{ config('app.name') }}</span>
                </a>
            @endif

            @if (auth()->user()->isClient())
                <a href="{{ route('admin.my-portfolio') }}" class="brand-link">
                    <span class="brand-text fw-light">{{ config('app.name') }}</span>
                </a>
            @endif
        @endauth
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview" role="menu" data-accordion="false">

                @auth
                    @if (auth()->user()->isSuperAdmin())
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer2"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->isClient())
                        <li class="nav-item">
                            <a href="{{ route('admin.my-portfolio') }}"
                            class="nav-link {{ request()->routeIs('admin.my-portfolio') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer2"></i>
                                <p>My Portfolio</p>
                            </a>
                        </li>
                    @endif
                @endauth

            </ul>
        </nav>
    </div>
</aside>
