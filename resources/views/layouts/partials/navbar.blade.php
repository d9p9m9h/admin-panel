<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        {{-- ဘယ်ဘက် — Sidebar toggle button --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>

        {{-- ညာဘက် — User menu --}}
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ auth()->user()?->name ?? 'Guest' }}
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>

            </li>
        </ul>
    </div>
</nav>
