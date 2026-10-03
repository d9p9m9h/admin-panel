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
                    {{-- Logout button ကို အဆင့် 7 မှာ ထည့်မယ် --}}
                    <li><span class="dropdown-item-text text-muted">Account</span></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
