# Laravel + Bootstrap 5 + AdminLTE 4 — Admin Panel တည်ဆောက်နည်း (Beginner Step-by-Step Guide)

ဒီ guide ကို **အစကနေ အဆုံးထိ လိုက်လုပ်ရုံနဲ့** အလုပ်လုပ်တဲ့ Admin Panel တစ်ခု ရလာအောင် ရေးထားပါတယ်။

> **အဆင့်တိုင်းရဲ့ အဆုံးမှာ ✅ Checkpoint ပါပါတယ်။** Checkpoint မအောင်သေးရင် နောက်အဆင့် မသွားပါနဲ့။ Error ကို အဲဒီအဆင့်မှာပဲ ဖြေရှင်းတာ အလွယ်ဆုံးပါ။

---

## မာတိကာ

0. [ဘာတွေ တည်ဆောက်မလဲ](#0-ဘာတွေ-တည်ဆောက်မလဲ)
1. [လိုအပ်တဲ့ Tools ထည့်သွင်းခြင်း](#1-လိုအပ်တဲ့-tools-ထည့်သွင်းခြင်း)
2. [Laravel Project ဖန်တီးခြင်း](#2-laravel-project-ဖန်တီးခြင်း)
3. [MySQL Database ချိတ်ဆက်ခြင်း](#3-mysql-database-ချိတ်ဆက်ခြင်း)
4. [Bootstrap 5 + AdminLTE 4 ထည့်သွင်းခြင်း (Vite)](#4-bootstrap-5--adminlte-4-ထည့်သွင်းခြင်း-vite)
5. [Admin Layout (Blade) ဖန်တီးခြင်း](#5-admin-layout-blade-ဖန်တီးခြင်း)
6. [Dashboard Page](#6-dashboard-page)
7. [Login / Logout (Authentication)](#7-login--logout-authentication)
8. [CRUD ဥပမာ — Category စီမံခန့်ခွဲခြင်း](#8-crud-ဥပမာ--category-စီမံခန့်ခွဲခြင်း)
9. [Git နဲ့ Project သိမ်းခြင်း](#9-git-နဲ့-project-သိမ်းခြင်း)
10. [Troubleshooting (ပြဿနာဖြေရှင်းနည်း)](#10-troubleshooting-ပြဿနာဖြေရှင်းနည်း)
11. [နောက်ထပ် လေ့လာသင့်တာတွေ](#11-နောက်ထပ်-လေ့လာသင့်တာတွေ)

---

## 0. ဘာတွေ တည်ဆောက်မလဲ

### Admin UI Package အနေနဲ့ **AdminLTE 4** ကို ရွေးထားတယ်

| ရွေးချယ်စရာ | ဘာကြောင့် ရွေးတာလဲ |
|---|---|
| **AdminLTE 4** | Bootstrap **5.3** ပေါ်မှာ တည်ဆောက်ထားပြီး jQuery မလိုတော့ပါ။ Free + MIT license။ Dashboard, Sidebar, Navbar, Card, Table, Form အဆင်သင့်ပါ။ v4 ကို 2026 ခုနှစ် မေလမှာ stable အဖြစ် ထုတ်ပြန်ခဲ့ပါတယ်။ |
| Tabler / CoreUI | Bootstrap 5 အခြေခံ တခြား admin template တွေပါ။ နောက်ပိုင်း စိတ်ဝင်စားရင် စမ်းကြည့်လို့ရပါတယ်။ |

> ⚠️ **သတိပြုရန်:** `jeroennoten/laravel-adminlte` လို Composer package အဟောင်းတွေက AdminLTE **3 (Bootstrap 4)** ကို သုံးတာများပါတယ်။ **Bootstrap 5** လိုချင်လို့ AdminLTE **4** ကို npm ကနေ တိုက်ရိုက် ထည့်မှာပါ။

### နောက်ဆုံးရလဒ်

- ✅ Login / Logout
- ✅ Admin Layout (Navbar + Sidebar + Content + Footer)
- ✅ Dashboard
- ✅ Category CRUD (စာရင်း၊ ထည့်၊ ပြင်၊ ဖျက်၊ validation၊ pagination၊ flash message)

### Tech Stack

```
Laravel (PHP)  →  Backend / Routing / Blade
MySQL          →  Database
Vite + npm     →  CSS/JS build
Bootstrap 5.3  →  UI framework
AdminLTE 4     →  Admin template (Layout/Components)
```

---

## 1. လိုအပ်တဲ့ Tools ထည့်သွင်းခြင်း

| Tool | လိုအပ်ချက် |
|---|---|
| PHP | **8.2 နှင့်အထက်** (သုံးမယ့် Laravel ဗားရှင်းရဲ့ [official docs](https://laravel.com/docs) မှာ အတည်ပြုပါ) |
| Composer | 2.x |
| Node.js + npm | LTS ဗားရှင်း |
| MySQL | 8.x (သို့) MariaDB |
| Git | နောက်ဆုံးဗားရှင်း |
| Code Editor | VS Code (Laravel Blade, PHP Intelephense extension တွေ ထည့်ရင် ကောင်းပါတယ်) |

### အလွယ်ဆုံးနည်း (Windows)

**[Laragon](https://laragon.org)** ကို ထည့်လိုက်ရင် PHP, MySQL, Composer, Node.js, Git အားလုံး တစ်ခါတည်း ပါလာပါတယ်။
macOS / Linux ဆိုရင် Laravel Herd၊ Valet၊ Docker တို့ကို သုံးနိုင်ပါတယ်။

### ✅ Checkpoint 1 — Terminal မှာ ဗားရှင်းစစ်ပါ

```bash
php -v
composer -V
node -v
npm -v
mysql --version
git --version
```

အားလုံး ဗားရှင်းနံပါတ် ပြရင် အောင်ပါပြီ။ `command not found` / `not recognized` ပေါ်ရင် အဲဒီ tool ကို PATH ထဲ ထည့်ဖို့ လိုပါတယ် (Laragon သုံးရင် Laragon Terminal ကို ဖွင့်ပြီး စစ်ပါ)။

---

## 2. Laravel Project ဖန်တီးခြင်း

```bash
# Project folder ရှိမယ့်နေရာကို သွားပါ (ဥပမာ - Laragon ရဲ့ www folder)
cd C:\laragon\www        # Windows (Laragon)
# cd ~/projects          # macOS / Linux

composer create-project laravel/laravel admin-panel
cd admin-panel
```

> `admin-panel` ဆိုတာ Project နာမည်ပါ။ ကြိုက်တာ ပြောင်းလို့ရပါတယ်။

Server စမ်းဖွင့်ကြည့်ပါ။

```bash
php artisan serve
```

Browser မှာ `http://127.0.0.1:8000` ကို ဖွင့်ပါ။ (ရပ်ချင်ရင် `Ctrl + C`)

### ✅ Checkpoint 2

Laravel ရဲ့ Welcome page ပေါ်လာရင် အောင်ပါပြီ။

### Project Folder အကြမ်းဖျင်း (သိထားသင့်တာ)

```
admin-panel/
├── app/
│   ├── Http/Controllers/    ← Controller တွေ
│   └── Models/              ← Model တွေ (User.php, Category.php ...)
├── database/
│   ├── migrations/          ← Table ဖွဲ့စည်းပုံ
│   └── seeders/             ← စမ်းသပ်ဒေတာ
├── resources/
│   ├── css/app.css          ← CSS entry
│   ├── js/app.js            ← JS entry
│   └── views/               ← Blade (HTML) files
├── routes/web.php           ← URL လမ်းကြောင်းတွေ
├── .env                     ← Configuration (Git ထဲ မတင်ရ)
└── vite.config.js           ← Vite configuration
```

---

## 3. MySQL Database ချိတ်ဆက်ခြင်း

### 3.1 Database ဖန်တီးပါ

MySQL client (phpMyAdmin / HeidiSQL / Terminal) မှာ -

```sql
CREATE DATABASE admin_panel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 3.2 `.env` ကို ပြင်ပါ

Laravel ရဲ့ default database က SQLite ဖြစ်တတ်လို့ MySQL သုံးဖို့ ပြင်ရပါမယ်။

```env
APP_NAME="Admin Panel"

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_panel
DB_USERNAME=root
DB_PASSWORD=
```

> `DB_PASSWORD` ကို သင့် MySQL password အတိုင်း ထည့်ပါ (Laragon default က အလွတ်ပါ)။

### 3.3 Migration run ပါ

```bash
php artisan migrate
```

### ✅ Checkpoint 3

Database ထဲမှာ `users`, `sessions`, `cache`, `jobs`, `migrations` စတဲ့ table တွေ ဝင်လာရင် အောင်ပါပြီ။
`Access denied` error ပေါ်ရင် `.env` ထဲက username/password ကို ပြန်စစ်ပါ။ `.env` ပြင်ပြီးရင် `php artisan config:clear` run ပါ။

---

## 4. Bootstrap 5 + AdminLTE 4 ထည့်သွင်းခြင်း (Vite)

### 4.1 Package တွေ ထည့်ပါ

```bash
npm install
npm install admin-lte@4 bootstrap@5.3 @popperjs/core bootstrap-icons
```

| Package | အသုံး |
|---|---|
| `admin-lte@4` | Admin template (Layout, Sidebar, Cards ...) |
| `bootstrap@5.3` | Bootstrap JS (Dropdown, Alert, Modal ...) |
| `@popperjs/core` | Bootstrap Dropdown တွေအတွက် လိုအပ်တယ် |
| `bootstrap-icons` | Icon တွေ (`bi bi-...`) |

### 4.2 Laravel ရဲ့ default Tailwind ကို ဖယ်ပါ

Laravel ရဲ့ အသစ်တွေမှာ Tailwind CSS ပါလာတတ်ပါတယ်။ Bootstrap နဲ့ မရောအောင် ဖယ်ထုတ်ပါမယ်။

```bash
npm uninstall tailwindcss @tailwindcss/vite
```

> Package နာမည်တွေ မရှိဘူးဆိုတဲ့ error ပေါ်ရင် ကိစ္စမရှိပါ၊ ကျော်သွားလို့ရပါတယ်။

### 4.3 `vite.config.js` ကို အစားထိုးပါ

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

### 4.4 `resources/css/app.css` ကို အစားထိုးပါ

```css
@import 'bootstrap-icons/font/bootstrap-icons.min.css';
@import 'admin-lte/dist/css/adminlte.min.css';

/* ကိုယ်ပိုင် CSS ကို ဒီအောက်မှာ ရေးပါ */
```

> AdminLTE 4 ရဲ့ CSS ထဲမှာ Bootstrap 5 CSS ပါပြီးသားမို့ Bootstrap CSS ကို သီးသန့် import စရာ မလိုပါ။

### 4.5 `resources/js/app.js` ကို အစားထိုးပါ

```js
import 'bootstrap';
import 'admin-lte/dist/js/adminlte.min.js';
```

### 4.6 Dev server run ပါ

Terminal **နှစ်ခု** ဖွင့်ထားရပါမယ်။

```bash
# Terminal 1 — Laravel server
php artisan serve

# Terminal 2 — Vite (CSS/JS build, ပြင်တာနဲ့ အလိုအလျောက် reload)
npm run dev
```

### ✅ Checkpoint 4

`npm run dev` က error မပေးဘဲ `VITE ... ready` လို့ ပြနေရင် အောင်ပါပြီ။ (UI ကို နောက်အဆင့်မှာ တကယ်မြင်ရပါမယ်)

---

## 5. Admin Layout (Blade) ဖန်တီးခြင်း

Layout တစ်ခုတည်း ရေးပြီး page တိုင်းက ပြန်သုံးတဲ့ ပုံစံ (Blade `@extends` / `@section`) ကို သုံးပါမယ်။

### 5.1 Folder / File တွေ ဖန်တီးပါ

```
resources/views/
├── layouts/
│   ├── admin.blade.php              ← Main layout
│   └── partials/
│       ├── navbar.blade.php
│       ├── sidebar.blade.php
│       ├── footer.blade.php
│       └── alerts.blade.php
```

Terminal က လွယ်ပါတယ် -

```bash
mkdir -p resources/views/layouts/partials
```

(Windows PowerShell မှာ `mkdir resources\views\layouts\partials`)

### 5.2 `resources/views/layouts/admin.blade.php`

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')

        <main class="app-main">
            {{-- Page Title + Breadcrumb --}}
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('page-title')</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="app-content">
                <div class="container-fluid">
                    @include('layouts.partials.alerts')
                    @yield('content')
                </div>
            </div>
        </main>

        @include('layouts.partials.footer')
    </div>

    @stack('scripts')
</body>
</html>
```

### 5.3 `resources/views/layouts/partials/navbar.blade.php`

```blade
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
```

### 5.4 `resources/views/layouts/partials/sidebar.blade.php`

```blade
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <span class="brand-text fw-light">{{ config('app.name') }}</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Category menu ကို အဆင့် 8 မှာ ထည့်မယ် --}}
            </ul>
        </nav>
    </div>
</aside>
```

> `request()->routeIs('admin.dashboard')` က လက်ရှိ page ကို sidebar မှာ highlight (`active`) လုပ်ပေးတာပါ။ Menu အသစ်တိုင်း ဒီပုံစံအတိုင်း ထပ်ထည့်နိုင်ပါတယ်။

### 5.5 `resources/views/layouts/partials/footer.blade.php`

```blade
<footer class="app-footer">
    <div class="float-end d-none d-sm-inline">Version 1.0</div>
    <strong>&copy; {{ date('Y') }} {{ config('app.name') }}.</strong> All rights reserved.
</footer>
```

### 5.6 `resources/views/layouts/partials/alerts.blade.php`

Success / Error message တွေ ပြဖို့ပါ။

```blade
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
```

### ✅ Checkpoint 5

File ခြောက်ခု ဖန်တီးပြီးပြီဆိုရင် အောင်ပါပြီ။ (Dashboard route မရှိသေးလို့ browser မှာ မကြည့်နိုင်သေးပါ — နောက်အဆင့်မှာ ကြည့်ပါမယ်)

---

## 6. Dashboard Page

### 6.1 Controller ဖန်တီးပါ

```bash
php artisan make:controller DashboardController
```

`app/Http/Controllers/DashboardController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
        ]);
    }
}
```

### 6.2 Route ထည့်ပါ

`routes/web.php` ကို အစားထိုးပါ (login ထည့်ရင် အဆင့် 7 မှာ ပြန်ပြင်မယ်)

```php
<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
```

### 6.3 View ဖန်တီးပါ

`resources/views/admin/dashboard.blade.php`

```blade
@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <p>Total Users</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Welcome</h3>
        </div>
        <div class="card-body">
            Admin Panel မှ ကြိုဆိုပါတယ်။
        </div>
    </div>
@endsection
```

### ✅ Checkpoint 6

`php artisan serve` နဲ့ `npm run dev` နှစ်ခုလုံး run နေစဉ် `http://127.0.0.1:8000` ကို ဖွင့်ပါ။

- Sidebar (ဘယ်ဘက်, အနက်ရောင်) + Navbar (အပေါ်) + Dashboard card တွေ မြင်ရမယ်
- ☰ button နှိပ်ရင် Sidebar ကျုံ့/ပြန်ပွင့်ရမယ်

UI ပျက်နေရင် [Troubleshooting](#10-troubleshooting-ပြဿနာဖြေရှင်းနည်း) ကို ကြည့်ပါ။

---

## 7. Login / Logout (Authentication)

Admin panel ဆိုတာ Login လုပ်မှ ဝင်ခွင့်ရတာမို့ Authentication ထည့်ပါမယ်။ Beginner အတွက် နားလည်လွယ်အောင် **Laravel ရဲ့ `Auth` facade** ကို တိုက်ရိုက်သုံးပြီး ရိုးရိုး Login/Logout ရေးပါမယ်။

### 7.1 Admin User စမ်းသပ်ဒေတာ (Seeder)

`database/seeders/DatabaseSeeder.php`

```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
```

```bash
php artisan db:seed
```

> ⚠️ `admin@example.com` / `password` ဆိုတာ **စမ်းသပ်ဖို့သာ**ပါ။ တကယ် deploy လုပ်ရင် လုံခြုံတဲ့ password ပြောင်းပါ။

### 7.2 LoginController ဖန်တီးပါ

```bash
php artisan make:controller Auth/LoginController
```

`app/Http/Controllers/Auth/LoginController.php`

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login form ပြမယ်
    public function create()
    {
        return view('auth.login');
    }

    // Login လုပ်မယ်
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withErrors(['email' => 'Email သို့မဟုတ် Password မှားနေပါတယ်။'])
            ->onlyInput('email');
    }

    // Logout လုပ်မယ်
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
```

### 7.3 Login View

`resources/views/auth/login.blade.php`

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>{{ config('app.name') }}</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf

                    <div class="mb-3">
                        <div class="input-group">
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password" required>
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
```

### 7.4 Routes ကို Login ပါတဲ့ ပုံစံ ပြောင်းပါ

`routes/web.php` ကို အစားထိုးပါ

```php
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

// Login မဝင်ရသေးသူများအတွက်
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Login ဝင်ပြီးသူများသာ ဝင်ခွင့်ရတဲ့ Admin Area
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
```

> `prefix('admin')` → URL အစ `/admin/...` ဖြစ်စေတယ်၊ `name('admin.')` → route နာမည်အစ `admin.` ဖြစ်စေတယ်။ ဒါကြောင့် `route('admin.dashboard')` က အရင်အတိုင်း ဆက်အလုပ်လုပ်ပါတယ်။

### 7.5 Navbar မှာ Logout button ထည့်ပါ

`resources/views/layouts/partials/navbar.blade.php` ထဲက dropdown-menu ကို ဒီလို ပြင်ပါ -

```blade
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
```

> Logout ကို `<form method="POST">` + `@csrf` နဲ့ လုပ်ရတာ လုံခြုံရေးအတွက်ပါ (link `GET` နဲ့ logout မလုပ်ပါနဲ့)။

### ✅ Checkpoint 7

1. `http://127.0.0.1:8000/admin` ကို Login မဝင်ဘဲ ဖွင့်ကြည့်ပါ → **Login page သို့ ရောက်သွားရမယ်**
2. `admin@example.com` / `password` နဲ့ Login → Dashboard ပေါ်ရမယ်
3. အပေါ်ညာထောင့် နာမည်ကို နှိပ်ပြီး Logout → Login page ပြန်ရောက်ရမယ်
4. Password မှားထည့်ကြည့်ပါ → Error message ပေါ်ရမယ်

---

## 8. CRUD ဥပမာ — Category စီမံခန့်ခွဲခြင်း

**CRUD** = **C**reate (ထည့်), **R**ead (ကြည့်), **U**pdate (ပြင်), **D**elete (ဖျက်)။ Admin panel တိုင်းရဲ့ အခြေခံပါ။

### 8.1 Model + Migration ဖန်တီးပါ

```bash
php artisan make:model Category -m
```

`database/migrations/xxxx_xx_xx_xxxxxx_create_categories_table.php` ထဲက `up()` ကို ပြင်ပါ -

```php
public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
```

`app/Models/Category.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
```

```bash
php artisan migrate
```

### 8.2 Pagination ကို Bootstrap 5 ပုံစံ ပြောင်းပါ

Laravel pagination default က Tailwind ပုံစံမို့ Bootstrap 5 သုံးဖို့ `app/Providers/AppServiceProvider.php` ကို ပြင်ပါ -

```php
<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
```

### 8.3 Controller ရေးပါ

```bash
php artisan make:controller CategoryController
```

`app/Http/Controllers/CategoryController.php` ကို ဒီအတိုင်း အစားထိုးပါ -

```php
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // စာရင်း
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    // ထည့်မယ့် form
    public function create()
    {
        return view('admin.categories.create');
    }

    // သိမ်းမယ်
    public function store(Request $request)
    {
        Category::create($this->validated($request));

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category အသစ် ထည့်ပြီးပါပြီ။');
    }

    // ပြင်မယ့် form
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // ပြင်ပြီး သိမ်းမယ်
    public function update(Request $request, Category $category)
    {
        $category->update($this->validated($request));

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category ကို ပြင်ဆင်ပြီးပါပြီ။');
    }

    // ဖျက်မယ်
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category ကို ဖျက်ပြီးပါပြီ။');
    }

    // Validation rule တစ်နေရာတည်း
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        // checkbox ကို မတိုက်ရင် request ထဲ မပါလာလို့ boolean() နဲ့ ယူရတယ်
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
```

### 8.4 Route ထည့်ပါ

`routes/web.php` ထဲက admin group ထဲမှာ တစ်ကြောင်း ထပ်ထည့်ပါ -

```php
use App\Http\Controllers\CategoryController;   // ← ဖိုင်ထိပ်မှာ ထည့်

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class)->except('show');   // ← ဒါ အသစ်
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
```

> `Route::resource` တစ်ကြောင်းတည်းက `index, create, store, edit, update, destroy` route ၆ ခုကို ဖန်တီးပေးပါတယ်။ Route စာရင်းကြည့်ချင်ရင် `php artisan route:list`။

### 8.5 Sidebar မှာ Menu ထည့်ပါ

`resources/views/layouts/partials/sidebar.blade.php` ထဲက `{{-- Category menu ... --}}` နေရာမှာ -

```blade
<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}"
       class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-tags"></i>
        <p>Categories</p>
    </a>
</li>
```

### 8.6 Views ရေးပါ

Folder ဖန်တီးပါ - `resources/views/admin/categories/`

#### (က) `index.blade.php` — စာရင်း

```blade
@extends('layouts.admin')

@section('title', 'Categories')
@section('page-title', 'Categories')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Category List</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Add New
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width: 100px">Status</th>
                            <th style="width: 160px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($category->description, 60) }}</td>
                                <td>
                                    @if ($category->is_active)
                                        <span class="badge text-bg-success">Active</span>
                                    @else
                                        <span class="badge text-bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                       class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('ဒီ Category ကို ဖျက်မှာ သေချာပါသလား?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Category မရှိသေးပါ။
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($categories->hasPages())
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@endsection
```

#### (ခ) `_form.blade.php` — Create/Edit မှာ ပြန်သုံးမယ့် form

```blade
<div class="mb-3">
    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
    <input type="text" id="name" name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $category->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea id="description" name="description" rows="4"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check form-switch mb-3">
    <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
           @checked(old('is_active', $category->is_active ?? true))>
    <label class="form-check-label" for="is_active">Active</label>
</div>
```

#### (ဂ) `create.blade.php`

```blade
@extends('layouts.admin')

@section('title', 'Add Category')
@section('page-title', 'Add Category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">Add</li>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="card-body">
                @include('admin.categories._form')
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
```

#### (ဃ) `edit.blade.php`

```blade
@extends('layouts.admin')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                @include('admin.categories._form')
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
```

### ✅ Checkpoint 8

- Sidebar မှာ **Categories** menu ပေါ်ပြီး နှိပ်ရင် Active အရောင်ပြောင်းရမယ်
- **Add New** → နာမည်မထည့်ဘဲ Save လုပ်ကြည့်ပါ → နီရောင် validation error ပေါ်ရမယ်
- နာမည်ထည့်ပြီး Save → စာရင်းထဲ ရောက်ပြီး အစိမ်းရောင် success message ပေါ်ရမယ်
- Edit → ပြင်လို့ရမယ်၊ Delete → confirm မေးပြီး ဖျက်လို့ရမယ်
- Category ၁၀ ခုထက်ပိုထည့်ရင် Pagination ပေါ်ရမယ်

---

## 9. Git နဲ့ Project သိမ်းခြင်း

```bash
git init
git add .
git commit -m "Initial admin panel: Laravel + AdminLTE 4 + Category CRUD"
```

- `.env` ကို Laravel က `.gitignore` ထဲ ထည့်ပေးထားပြီးသားပါ။ **`.env` ကို GitHub ပေါ် ဘယ်တော့မှ မတင်ပါနဲ့** (password တွေ ပါလို့ပါ)။
- ကိုယ့် project ကို တခြားစက်မှာ ပြန်တည်ဆောက်ချင်ရင် -
  ```bash
  git clone <repo-url>
  cd admin-panel
  composer install
  npm install
  cp .env.example .env
  php artisan key:generate
  # .env ထဲ DB setting ပြင်ပြီး
  php artisan migrate --seed
  npm run dev
  ```

---

## 10. Troubleshooting (ပြဿနာဖြေရှင်းနည်း)

| ပြဿနာ | ဖြေရှင်းနည်း |
|---|---|
| **`Vite manifest not found`** error | `npm run dev` (ဒါမှမဟုတ် `npm run build`) မ run ရသေးလို့ပါ။ Run ပါ။ |
| စာမျက်နှာက စာသားသက်သက်၊ Style မပါ | `npm run dev` ရပ်နေလား စစ်ပါ။ `resources/css/app.css` ထဲက `@import` နှစ်ကြောင်း ပါလား စစ်ပါ။ |
| Icon တွေ မပေါ်ဘူး | `npm install bootstrap-icons` လုပ်ထားလား၊ `app.css` ထဲ `bootstrap-icons` import ပါလား စစ်ပါ။ |
| Sidebar toggle (☰) မအလုပ်လုပ်ဘူး | Browser Console (F12) ကိုကြည့်ပါ။ `app.js` ထဲ `admin-lte` import ပါလား စစ်ပါ။ အဆင်မပြေရင် အောက်က CDN နည်း စမ်းပါ။ |
| **419 Page Expired** | Form ထဲမှာ `@csrf` မေ့နေတာပါ။ |
| **`Route [xxx] not defined`** | `php artisan route:list` နဲ့ route နာမည်ကို စစ်ပါ။ (`admin.` prefix မေ့တတ်ပါတယ်) |
| `SQLSTATE[HY000] [1045] Access denied` | `.env` ထဲက `DB_USERNAME` / `DB_PASSWORD` မှားနေတာ။ ပြင်ပြီး `php artisan config:clear` |
| `Class "App\Models\Category" not found` | `app/Models/Category.php` ဖိုင်နဲ့ `namespace` မှန်လား စစ်ပါ။ |
| `.env` / config ပြင်ပြီး မပြောင်းဘူး | `php artisan optimize:clear` |

### CDN နည်းနဲ့ အစားထိုး စမ်းချင်ရင် (Vite အဆင်မပြေတဲ့အခါ)

`layouts/admin.blade.php` ထဲက `@vite(...)` ကို ဖြုတ်ပြီး -

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">
```

`</body>` မတိုင်မီ -

```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>
```

> CDN နည်းက internet လိုပါတယ်။ Production မှာတော့ npm + `npm run build` ကို အကြံပြုပါတယ်။

---

## 11. နောက်ထပ် လေ့လာသင့်တာတွေ

Project အခြေခံ ပြီးသွားပြီဆိုရင် အောက်ပါအတိုင်း တဖြည်းဖြည်း တိုးချဲ့ပါ -

1. **Form Request Class** — Validation ကို Controller ထဲကနေ ခွဲထုတ်ခြင်း (`php artisan make:request`)
2. **Search + Filter** — Category စာရင်းမှာ search box ထည့်ခြင်း
3. **Image Upload** — File upload + Storage (`php artisan storage:link`)
4. **Roles & Permissions** — `spatie/laravel-permission` package နဲ့ Admin/Editor ခွဲခြင်း
5. **Registration / Password Reset** — Laravel Fortify (သို့) `laravel/ui` နဲ့ ထပ်ထည့်ခြင်း
6. **DataTables / Charts** — AdminLTE demo pages ထဲက component တွေကို ယူသုံးခြင်း
7. **Relationship** — `Product belongsTo Category` လို table နှစ်ခုချိတ်ခြင်း
8. **Testing** — Pest / PHPUnit နဲ့ feature test ရေးခြင်း
9. **Deployment** — `npm run build`, `php artisan optimize`, `.env` production setting

### အသုံးဝင်တဲ့ Link များ

- Laravel Docs — https://laravel.com/docs
- AdminLTE 4 Docs — https://docs.adminlte.io
- AdminLTE 4 Live Demo (HTML markup ကူးသုံးဖို့) — https://adminlte.io/themes/v4
- Bootstrap 5.3 Docs — https://getbootstrap.com/docs/5.3
- Bootstrap Icons — https://icons.getbootstrap.com

> 💡 **Tip:** AdminLTE demo page မှာ ကြိုက်တဲ့ component (Card, Table, Chart, Form ...) ကို ကြည့်ပြီး HTML ကို Blade ထဲ ကူးထည့်ရုံနဲ့ UI အသစ်တွေ အလွယ်တကူ ဆောက်လို့ရပါတယ်။

---

**Happy Coding! 🚀**
