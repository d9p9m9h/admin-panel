ဟုတ်ကဲ့။ ဒီ `IMPLEMENTATION_GUIDE.md` ကို **analysis** လုပ်ပြီး၊ “copy-paste tutorial” မဟုတ်ဘဲ **course တစ်ခုလိုမျိုး နားလည်အောင်** ပြန်ပြင်ထားတဲ့ improved version အဖြစ် အောက်မှာ ပေးထားပါတယ်။

---

# 1. မူရင်း Guide ကို အရင် Analysis လုပ်ကြည့်ခြင်း

## 1.1 ကောင်းတဲ့အချက်များ

ဒီ guide ထဲမှာ အောက်ပါအချက်တွေက အရမ်းကောင်းပါတယ်။

1. **Bug diagnosis မှန်တယ်**
   - `create` နေရာမှာ `creat`
   - `destroy` နေရာမှာ `destory`
   - route နဲ့ controller method name mismatch ဖြစ်နေတာကို မှန်မှန်ကန်ကန် ဖော်ပြထားတယ်။

2. **Learning purpose ရှင်းတယ်**
   - “copy-paste tutorial မဟုတ်ဘဲ နားလည်အောင် သင်မယ်” ဆိုတဲ့ intent ကောင်းတယ်။
   - junior developer တွေ အမှားလုပ်တတ်တဲ့နေရာတွေကို ထည့်ပြောထားတယ်။

3. **Stack selection သင့်တော်တယ်**
   - Laravel
   - Bootstrap 5.3
   - AdminLTE 4
   - Blade
   - Vite  
   ဒါတွေက admin panel + portfolio project အတွက် လက်တွေ့ကျတယ်။

4. **Auth flow ကို Laravel convention အတိုင်း သွားထားတယ်**
   - `Auth::attempt()`
   - `session()->regenerate()`
   - `Auth::logout()`
   - `session()->invalidate()`
   - `session()->regenerateToken()`  
   ဒါတွေက Laravel auth ရဲ့ အခြေခံမှန်တဲ့ pattern ဖြစ်တယ်။

5. **Portfolio integration ကို ထည့်တွေးထားတယ်**
   - admin panel ကို standalone အနေနဲ့မဟုတ်ဘဲ portfolio frontend နဲ့ ချိတ်ဖို့ ရည်ရွယ်ထားတာကောင်းတယ်။

---

## 1.2 ပြင်သင့်တဲ့အချက်များ

| မူရင်းအခြေအနေ | ပြင်သင့်တဲ့အချက် | အကြောင်းရင်း |
|---|---|---|
| `create`/`creat`, `destroy`/`destory` typo ကို ပြောထားတယ် | ဒီပြဿနာကို “ဘာကြောင့်ဖြစ်တယ်၊ ဘယ်လိုကာကွယ်မလဲ” ဆိုတာပါ ထည့်သင့်တယ် | typo တစ်ခုတည်းမဟုတ်ဘဲ route ↔ controller contract ကို နားလည်ဖို့လိုတယ် |
| Login/logout flow ရှိတယ် | **guest redirect**, **authenticated redirect**, **rate limiting** ထည့်သင့်တယ် | login မအောင်မြင်ရင် brute force risk ရှိတယ်၊ login ပြီးသူ `/login` ပြန်ဝင်ရင် UX မကောင်းဘူး |
| `auth` middleware သုံးထားတယ် | **admin authorization** ထပ်ထည့်သင့်တယ် | login ရုံနဲ့ admin မဟုတ်နိုင်ဘူး။ `is_admin`/role/policy လိုတယ် |
| CRUD ကို ရိုးရိုးပြထားတယ် | **Form Request validation**, **flash messages**, **pagination**, **search**, **delete confirmation** ထည့်သင့်တယ် | production-ready admin panel ဖြစ်ဖို့လိုတယ် |
| Portfolio integration ကို အကြမ်းမျဉ်းပြထားတယ် | **content model**, **status**, **slug**, **published_at**, **SEO fields**, **public scope** ထည့်သင့်တယ် | public site မှာ ဘယ် data ကို ပြမလဲဆိုတာ ထိန်းရမယ် |
| Testing မပါသလောက်ဖြစ်နေတယ် | **feature tests** ထည့်သင့်တယ် | “method not found”, “guest can’t access admin” စတာတွေကို test နဲ့ ကာကွယ်လို့ရတယ် |
| Production checklist အားနည်းတယ် | **security**, **asset build**, **cache**, `.env`, **HTTPS**, **session config** ထည့်သင့်တယ် | local dev နဲ့ production ကွာတယ် |
| AdminLTE 4 integration ကို ပြထားတယ် | **AdminLTE 4 version compatibility**, **jQuery-free**, **Vite manifest** ပြဿနာတွေ ထည့်ရှင်းသင့်တယ် | asset path/manifest error တွေ အများကြီးဖြစ်တတ်တယ် |

---

## 1.3 Guide ကို ဘယ်လိုမျိုး update လုပ်သင့်လဲ?

ဒီ guide ကို အောက်ပါ ၄ မျိုးထဲက တစ်မျိုးမျိုးအနေနဲ့ သုံးလို့ရတယ်။

1. **Fix-only version**  
   လက်ရှိ typo နဲ့ auth method name တွေကို ပြင်မယ်။

2. **Working admin panel version**  
   layout, login, dashboard, CRUD တွေ တကယ်အလုပ်လုပ်အောင် တည်ဆောက်မယ်။

3. **Portfolio-ready version**  
   public frontend နဲ့ ချိတ်နိုင်အောင် content model, status, slug, public query တွေ ထည့်မယ်။

4. **Course-style version**  
   ကျွန်တော် အောက်မှာ ပြောပြမယ့်ပုံစံ။ တစ်ဆင့်ချင်းစီကို “ဘာလုပ်ရမလဲ + ဘာကြောင့်လုပ်ရမလဲ + မလုပ်ရင်ဘာဖြစ်မလဲ + ဘယ်လိုစစ်မလဲ” ဆိုပြီး သင်မယ်။

အောက်မှာ **Course-style Improved Guide** ကို ပေးထားပါတယ်။

---

# 2. Improved Guide — Laravel Admin Panel + Portfolio Foundation

## Course Title

**Laravel Admin Panel with Bootstrap 5 + AdminLTE 4: From Broken Auth to Portfolio-Ready System**

---

## Course Goal

ဒီ course ရဲ့ ရည်မှန်းချက်က —

- Laravel request flow ကို နားလည်မယ်။
- route, controller, middleware, view, model တို့ရဲ့ ဆက်စပ်မှုကို နားလည်မယ်။
- AdminLTE 4 + Bootstrap 5 သုံးပြီး အလုပ်လုပ်တဲ့ admin layout ဆောက်တတ်မယ်။
- login/logout flow ကို Laravel convention အတိုင်း မှန်မှန်ကန်ကန် ဆောက်တတ်မယ်။
- CRUD module တစ်ခုကို validation, flash messages, pagination, delete action တွေနဲ့ ဆောက်တတ်မယ်။
- admin panel ကို portfolio frontend နဲ့ ချိတ်ဆက်နိုင်အောင် content structure ဒီဇိုင်းဆွဲတတ်မယ်။
- “မအလုပ်လုပ်ဘူး” ဖြစ်တဲ့အခါ ဘယ်လို debug လုပ်ရမလဲဆိုတာ သိမယ်။

---

## Target Audience

ဒီ course က အောက်ပါသူတွေအတွက် သင့်တော်တယ်။

- Laravel ကို အခြေခံသိပြီးသား ဖြစ်ပေမယ့် admin panel တစ်ခုကို တကယ်အလုပ်လုပ်အောင် မဆောက်ဖူးသေးသူ
- route, controller, view ကို ကူးရေးဖူးပေမယ့် “ဘာကြောင့် ဒီလိုဆက်နေတာလဲ” မသိသေးသူ
- portfolio project အတွက် admin panel လိုချင်သူ
- Laravel + Bootstrap + AdminLTE integration ကို နားလည်ချင်သူ

---

## Prerequisites

ဒီ course မစခင် ဒါတွေ သိထားသင့်တယ်။

- PHP basic syntax
- OOP basic
- HTML, CSS, Bootstrap basic
- Laravel installation basic
- Blade template ဆိုတာ ဘာလဲ
- MySQL/SQLite basic query idea
- Git basic command

---

## Final Outcome

Course ပြီးရင် အောက်ပါအချက်တွေ ရှိသင့်တယ်။

1. `/` ကို ဖွင့်ရင် `/admin` သို့မဟုတ် public portfolio page သို့ သွားမယ်။
2. `/login` မှာ admin login form ပေါ်မယ်။
3. မှန်တဲ့ admin account နဲ့ login ဝင်ရင် `/admin` dashboard ရောက်မယ်။
4. login မဝင်ဘဲ `/admin` ကို ဝင်ကြိုးစားရင် `/login` သို့ ပြန်ပို့မယ်။
5. admin မဟုတ်တဲ့ user ဝင်ကြိုးစားရင် 403 သို့မဟုတ် ထိန်းချုပ်ထားတဲ့ access denial ပြမယ်။
6. Category/Project CRUD အလုပ်လုပ်မယ်။
7. Portfolio public page မှာ admin ထဲက ထည့်ထားတဲ့ published content တွေ ပေါ်မယ်။
8. CSS/JS များ `npm run build` သို့မဟုတ် `npm run dev` နဲ့ မှန်ကန်စွာ load ဖြစ်မယ်။
9. common error တွေကို ကိုယ်တိုင် ရှာပြင်နိုင်မယ်။

---

# 3. Course Mindset — “Code ကို မကူးခင် နားလည်ရမယ်”

## 3.1 Laravel Request Flow ကို အရင်နားလည်ပါ

ဒီလိုစဉ်းစားပါ။

```text
Browser Request
   ↓
Route
   ↓
Middleware
   ↓
Controller
   ↓
Form Request / Validation
   ↓
Model / Service / Database
   ↓
View / JSON Response
   ↓
Browser Response
```

## 3.2 ဘာကြောင့်ဒါကို နားလည်ရမလဲ?

ဥပမာ —

```php
Route::get('/login', [LoginController::class, 'create'])->name('login');
```

ဒီတစ်ကြောင်းထဲမှာ အောက်ပါအဓိပ္ပာယ်တွေ ပါတယ်။

- `/login` URL ကို GET method နဲ့ ဝင်လာရင်
- `LoginController` class ထဲက
- `create()` method ကို ခေါ်မယ်
- route name က `login` ဖြစ်မယ်

ဒါကြောင့် controller ထဲမှာ —

```php
public function creat()
```

လို့ ရေးထားရင် **မတူဘူး**။

- `create` ≠ `creat`

Laravel က route ကနေ `create()` ကို ခေါ်ဖို့ ကြိုးစားမယ်။  
ဒါပေမယ့် `creat()` ဆိုတဲ့ နာမည်နဲ့ပဲ ရှိနေရင် **Call to undefined method** သို့မဟုတ် **method not found** type error ဖြစ်မယ်။

ဒါကြောင့် ဒီလိုပြဿနာမျိုးမှာ “Laravel ပျက်နေတယ်” လို့ မယူဆရ။  
“ငါ့ရဲ့ route ↔ controller contract မတူဘူး” လို့ ယူဆရမယ်။

---

# 4. Module 1 — Environment Setup & Version Fact-Check

## 4.1 ဘာလုပ်ရမလဲ?

အောက်ပါ tools တွေ ထည့်ထားရမယ်။

- PHP 8.2+  
  production အတွက်ဆိုရင် 8.3+ ကို အကြံပြုတယ်။
- Composer
- Node.js LTS
- npm
- MySQL သို့မဟုတ် SQLite
- Git

Windows/WSL2/Docker ဘယ်မှာသုံးသုံး —

- `php -v`
- `composer -V`
- `node -v`
- `npm -v`

ဒါတွေနဲ့ အလုပ်လုပ်နိုင်တယ်ဆိုတာ စစ်ရမယ်။

## 4.2 ဘာကြောင့်လုပ်ရမလဲ?

Laravel project တွေမှာ အများဆုံးအမှားက “ငါ့စက်မှာ ဘာတွေထည့်ထားလဲ” မသိဘဲ စရေးတာပါ။

ဥပမာ —

- PHP version နိမ့်နေရင် Laravel install မလုပ်နိုင်ဘူး။
- Node version မတည့်ရင် Vite build error ဖြစ်တတ်တယ်။
- MySQL service မဖွင့်ထားရင် `SQLSTATE[HY000] [2002] Connection refused` ဖြစ်တတ်တယ်။

## 4.3 မလုပ်ရင် ဘာဖြစ်မလဲ?

- `composer create-project` fail ဖြစ်နိုင်တယ်။
- `npm run build` fail ဖြစ်နိုင်တယ်။
- `php artisan migrate` fail ဖြစ်နိုင်တယ်။
- “ဘာမှ မပြင်ဘူး အလုပ်မလုပ်ဘူး” ဖြစ်တတ်တယ်။

## 4.4 Checkpoint

```bash
php -v
composer -V
node -v
npm -v
```

Expected:

- PHP 8.2+ သို့မဟုတ် 8.3+
- Composer 2.x
- Node LTS
- npm available

---

# 5. Module 2 — Laravel Project တည်ဆောက်ခြင်း

## 5.1 Fresh Laravel app ဖန်တီးမယ်

```bash
composer create-project laravel/laravel admin-panel
cd admin-panel
```

ပြီးရင် —

```bash
php artisan serve
```

Browser မှာ `http://127.0.0.1:8000` ဖွင့်ပြီး Laravel default page ပေါ်မပေါ် စစ်ပါ။

## 5.2 ဘာကြောင့် Fresh install နဲ့ စတာလဲ?

လက်ရှိ broken project ထဲမှာ စမ်းရင် —

- အဟောင်းတုန်းက ကျန်နေတဲ့ route
- ဖျက်ထားပေမယ့် cache ကျန်နေတဲ့ config
- migration အဟောင်း
- seed data အဟောင်း
- frontend build artifact အဟောင်း

စတာတွေကြောင့် “တကယ်ပြင်လား မပြင်လား” မသဲကွဲနိုင်ဘူး။

ဒါကြောင့် သင်ယူနေတဲ့အဆင့်မှာ —

1. အဟောင်းကို Git commit လုပ်ထားမယ်
2. အသစ်တစ်ခု ထပ်ဆောက်ပြီး နှိုင်းယှဉ်ကြည့်မယ်

ဒါက အကောင်းဆုံးပါပဲ။

## 5.3 Git ကို အသုံးပြုပါ

```bash
git init
git add .
git commit -m "Initial Laravel setup"
```

ပြီးရင် —

```bash
git checkout -b feature/admin-auth
```

ဒါဆိုရင် ပျက်သွားရင် ပြန်လွယ်တယ်။

## 5.4 Checkpoint

- Laravel default page ပေါ်မယ်။
- `php artisan route:list` အလုပ်လုပ်မယ်။
- `.env` file ထဲမှာ `APP_KEY` ရှိမယ်။

---

# 6. Module 3 — Database Setup & Environment Configuration

## 6.1 Database ရွေးချယ်မှု

သင်ယူနေတဲ့အဆင့်မှာ —

- **SQLite** ကို အရင်သုံးလို့ရတယ်။
- ပြီးမှ **MySQL** ပြောင်းလို့ရတယ်။

ဒါပေမယ့် portfolio/production အတွက်ဆိုရင် MySQL က ပိုအသုံးများတယ်။

## 6.2 MySQL သုံးမယ်ဆိုရင်

`.env` ထဲမှာ —

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_panel
DB_USERNAME=root
DB_PASSWORD=
```

Database ဖန်တီးမယ် —

```sql
CREATE DATABASE admin_panel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Migrate —

```bash
php artisan migrate
```

## 6.3 ဘာကြောင့် `utf8mb4` သုံးရတာလဲ?

- Burmese text
- Emoji
- Unicode characters

စတာတွေကို မှန်ကန်စွာ သိမ်းဖို့လိုတယ်။

## 6.4 `.env` ကို နားလည်ရမယ်

`.env` က “အလုပ်လုပ်မယ့် စက်ရဲ့ setting file” ဖြစ်တယ်။

- `APP_ENV=local`
- `APP_DEBUG=true`
- `DB_*`
- `SESSION_DRIVER`
- `MAIL_MAILER`

ဒါတွေက environment ပေါ်မူတည်ပြီး ပြောင်းရမယ်။

## 6.5 မလုပ်ရင် ဘာဖြစ်မလဲ?

- `.env` မရှိရင် `No application encryption key` တက်တတ်တယ်။
- `.env` ထဲ `APP_KEY` မရှိရင် session/auth ပြဿနာဖြစ်တတ်တယ်။
- DB setting မှားရင် `Connection refused` ဖြစ်တတ်တယ်။
- `.env` ကို Git ထဲထည့်မိရင် secret ပေါက်နိုင်တယ်။

## 6.6 Checkpoint

```bash
php artisan migrate
```

- migration အောင်မြင်မယ်။
- `users` table ပါလာမယ်။
- `cache`, `sessions`, `jobs` စတဲ့ table တွေ ပါနိုင်တယ်။

---

# 7. Module 4 — Bootstrap 5 + AdminLTE 4 + Vite Integration

## 7.1 Frontend dependency install

```bash
npm install
npm install bootstrap@5.3 admin-lte@4 @popperjs/core bootstrap-icons
```

## 7.2 ဘာကြောင့်ဒါတွေသုံးတာလဲ?

| Package | အသုံးဝင်ပုံ |
|---|---|
| `bootstrap@5.3` | UI components, grid, forms, buttons |
| `admin-lte@4` | admin dashboard layout, sidebar, cards |
| `@popperjs/core` | Bootstrap dropdown/popover dependency |
| `bootstrap-icons` | icon set |

## 7.3 AdminLTE 4 အကြောင်း သတိထားရမယ်

- AdminLTE 4 က Bootstrap 5.3 အပေါ်အခြေခံတယ်။
- **jQuery မလိုတော့ဘူး**။
- မလိုအပ်ဘဲ `jquery` ထည့်ရင် —
  - duplicate event binding
  - global JS conflict
  - outdated plugin pattern  
  တွေ ဖြစ်နိုင်တယ်။

## 7.4 `resources/css/app.css`

```css
@import "bootstrap-icons/font/bootstrap-icons.min.css";
@import "bootstrap/dist/css/bootstrap.min.css";
@import "admin-lte/dist/css/adminlte.min.css";
```

## 7.5 `resources/js/app.js`

```js
import "bootstrap";
import "admin-lte/dist/js/adminlte.min.js";
```

## 7.6 Build

Development —

```bash
npm run dev
```

Production —

```bash
npm run build
```

## 7.7 Blade ထဲမှာ

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

## 7.8 ဘာကြောင့် `@vite` သုံးရတာလဲ?

Laravel 9+ မှာ frontend asset compilation အတွက် **Vite** ကို သုံးတယ်။  
`mix()` က အဟောင်း။ `@vite` က လက်ရှိပုံစံ။

## 7.9 မလုပ်ရင် ဘာဖြစ်မလဲ?

- `npm run build` မလုပ်ရင် `Vite manifest not found` ဖြစ်နိုင်တယ်။
- `npm run dev` မဖွင့်ထားဘဲ `@vite` ကြည့်ရင် dev asset မတွေ့နိုင်တယ်။
- CSS/JS load မဖြစ်ရင် AdminLTE layout ကျိုးနေမယ်။
- `bootstrap.min.js` မထည့်ရင် dropdown, modal, toast အလုပ်မလုပ်နိုင်ဘူး။

## 7.10 Troubleshooting

| Error/Issue | ဖြစ်နိုင်တဲ့အကြောင်းရင်း | ပြင်နည်း |
|---|---|---|
| `Vite manifest not found` | build မလုပ်သေး | `npm run build` |
| CSS မပေါ် | `app.css` မှာ `@import` မထည့်ထား | import path စစ်မယ် |
| AdminLTE ကျိုးနေ | `@vite` မထည့်ထား/asset build မှား | Network tab မှာ 404 စစ်မယ် |
| dropdown မအလုပ်လုပ် | `bootstrap` JS မထည့်ထား | `import "bootstrap"` စစ်မယ် |

## 7.11 Checkpoint

- Browser DevTools > Network tab မှာ `app.css`, `app.js` load ဖြစ်မယ်။
- 404 မပေါ်ဘူး။
- `npm run dev` ကြည့်ရင် hot reload အလုပ်လုပ်မယ်။

---

# 8. Module 5 — Admin Layout Architecture

## 8.1 Layout ကို ဘာကြောင့် အရင်ဆောက်ရတာလဲ?

အမှားအများဆုံးက —

- dashboard view ကို အရင်ရေးတယ်
- navbar ကို page ထဲမှာ ထည့်ရေးတယ်
- တစ်နေရာပြင်ရင် တခြားနေရာ ကျိုးတယ်
- sidebar active state မမှန်ဘူး

ဒါကြောင့် layout ကို အရင်ခွဲရမယ်။

## 8.2 အကြံပြု folder structure

```text
resources/views/
├── admin/
│   ├── categories/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   └── dashboard.blade.php
├── auth/
│   └── login.blade.php
├── layouts/
│   ├── admin.blade.php
│   └── partials/
│       ├── navbar.blade.php
│       ├── sidebar.blade.php
│       ├── footer.blade.php
│       └── alerts.blade.php
└── public/
    ├── home.blade.php
    ├── projects.blade.php
    └── contact.blade.php
```

## 8.3 Blade inheritance concept

```blade
@extends('layouts.admin')

@section('content')
    {{-- page specific content --}}
@endsection
```

ဒါဆိုရင် —

- layout ကို တစ်နေရာထဲက ပြင်လို့ရတယ်
- တခြား page တွေက `@yield('content')` နေရာမှာ ဝင်မယ်

## 8.4 `layouts/admin.blade.php` ထဲမှာ ပါသင့်တာများ

- `<!DOCTYPE html>`
- `<meta charset="UTF-8">`
- `<meta name="csrf-token" content="{{ csrf_token() }}">`
- `@vite([...])`
- `<body>` class for AdminLTE
- `.app-wrapper`
- navbar
- sidebar
- main content
- alerts
- footer

## 8.5 CSRF meta tag ဘာကြောင့်ပါသင့်လဲ?

JavaScript ကနေ AJAX/axios သုံးမယ်ဆိုရင် —

```js
headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
}
```

လိုမျိုး သုံးလို့ရတယ်။

## 8.6 Sidebar active state

ဥပမာ —

```blade
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}"
       href="{{ route('admin.categories.index') }}">
        <i class="bi bi-folder"></i>
        <p>Categories</p>
    </a>
</li>
```

ဘာကြောင့်လဲ?

- လက်ရှိနေရာမှာ ရှိနေတဲ့ menu ကို ပြန်ထူးပြဖို့
- UX ကောင်းဖို့

## 8.7 Alerts partial

flash message တွေကို တစ်နေရာထဲက ပြသင့်တယ်။

```blade
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

## 8.8 မလုပ်ရင် ဘာဖြစ်မလဲ?

- တိုင်းမှာတစ်ခုချင်းစီမှာ layout ထပ်ကူးရမယ်
- တစ်နေရာပြင်ရင် တစ်ခြားနေရာ ကျိုးမယ်
- flash message ကို တိုင်းမှာ ထပ်ထည့်ရမယ်
- sidebar active state မမှန်ဘူး
- code duplication များမယ်

## 8.9 Checkpoint

- `/admin` layout မှာ navbar/sidebar/footer ပေါ်မယ်။
- `@yield('content')` နေရာမှာ dashboard content ဝင်မယ်။
- `session('success')` ထည့်ကြည့်ရင် ပေါ်မယ်။

---

# 9. Module 6 — Authentication Flow ကို မှန်မှန်ကန်ကန်ဆောက်ခြင်း

ဒီအပိုင်းက ဒီဂိုက်ရဲ့ အဓိကအပိုင်းပါပဲ။

---

## 9.1 Route နဲ့ Controller Contract

အရင်ဆုံး ဒီစာရင်းကို ကြည့်ပါ။

| URL | Method | Route Action | Purpose |
|---|---|---|---|
| `/login` | GET | `LoginController::create()` | login form ပြမယ် |
| `/login` | POST | `LoginController::store()` | login attempt လုပ်မယ် |
| `/admin/logout` | POST | `LoginController::destroy()` | logout လုပ်မယ် |

ဒီတော့ —

- `create` နေရာမှာ `creat` မဖြစ်ရ
- `store` နေရာမှာ `stor` မဖြစ်ရ
- `destroy` နေရာမှာ `destory` မဖြစ်ရ

---

## 9.2 မူရင်း bug ကို ပြန်ရှင်းမယ်

### မှားနေတဲ့ဥပမာ

```php
Route::get('/login', [LoginController::class, 'create'])->name('login');
```

Controller —

```php
public function creat()
```

ဒါဆိုရင် —

- route က `create()` ကို ခေါ်မယ်
- တကယ့်ရှိနေတာ `creat()`
- Laravel က `create()` မတွေ့ဘူး
- `Call to undefined method` type error ဖြစ်မယ်

### ပြင်ရမယ့်ပုံစံ

```php
public function create()
```

အလားတူ —

```php
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
```

Controller —

```php
public function destory(Request $request)
```

ဒါမှားတယ်။

ပြင်ရမယ် —

```php
public function destroy(Request $request)
```

---

## 9.3 LoginController ရဲ့ တာဝန်

`LoginController` က ဒီ ၃ ခုကိုပဲ တာဝန်ယူသင့်တယ်။

1. **create()**  
   login form ပြမယ်

2. **store()**  
   email/password ကို validate လုပ်ပြီး auth attempt လုပ်မယ်

3. **destroy()**  
   logout လုပ်မယ်

ဒါဆိုရင် **single responsibility** ကျတယ်။

---

## 9.4 `create()` ဘာကြောင့်လိုလဲ?

```php
public function create()
{
    return view('auth.login');
}
```

- GET `/login` က form ပြဖို့
- view ကို return လုပ်ရုံပဲ

ဒါပေမယ့် **အဆင့်မြှင့်ချင်ရင်** —

```php
public function create()
{
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }

    return view('auth.login');
}
```

ဒါဆို login ပြီးပြီးသူက `/login` ပြန်မရောက်တော့ဘူး။

ဒါပေမယ့် `guest` middleware ကို သုံးရင် ဒါကို ပိုသန့်ရှင်းအောင် ထိန်းလို့ရတယ်။

---

## 9.5 `store()` ထဲမှာ ပါသင့်တာများ

### အဆင့် ၁ — validation

```php
$credentials = $request->validate([
    'email' => ['required', 'email'],
    'password' => ['required'],
]);
```

ဘာကြောင့်?

- email format မှားတာ ကာကွယ်
- `null`/empty password ကာကွယ်
- မှားတဲ့ input ကြောင့် ဖြစ်တဲ့ runtime error လျှော့ချ

### အဆင့် ၂ — auth attempt

```php
if (Auth::attempt($credentials, $request->boolean('remember'))) {
    $request->session()->regenerate();

    return redirect()->intended(route('admin.dashboard'));
}
```

ဘာကြောင့် `session()->regenerate()`?

- session fixation attack ကာကွယ်ဖို့
- login အောင်မြင်ပြီးတဲ့အခါ session ID အသစ်ပြောင်းပေးရမယ်

### အဆင့် ၃ — မအောင်မြင်ရင် ပြန်သွားမယ်

```php
return back()
    ->withErrors(['email' => 'Email သို့မဟုတ် Password မှားနေပါတယ်။'])
    ->onlyInput('email');
```

ဘာကြောင့် `onlyInput('email')`?

- password ကို ပြန်မဖြည့်စေချင်ဘူး
- email ကိုပဲ ပြန်ပြသင့်တယ်

---

## 9.6 `destroy()` ထဲမှာ ပါသင့်တာများ

```php
public function destroy(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
```

ဘာကြောင့်?

- `Auth::logout()` → user session ကို ဖျက်မယ်
- `invalidate()` → session data ကို ဖျက်မယ်
- `regenerateToken()` → CSRF token ကို regenerate လုပ်မယ်

ဒါမလုပ်ဘဲ `Auth::logout()` တစ်ခုတည်းသုံးရင် —

- အချို့ session data ကျန်နိုင်တယ်
- CSRF token ကို ပြန်သုံးနိုင်တဲ့ အခြေအနေမျိုး ဖြစ်နိုင်တယ်

---

## 9.7 Login form ထဲမှာ ပါသင့်တာများ

`resources/views/auth/login.blade.php` မှာ —

- `@csrf`
- email field
- password field
- remember checkbox
- error display
- `old('email')`

ဥပမာ —

```blade
<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <input type="password" name="password" required>

    <label>
        <input type="checkbox" name="remember"> Remember me
    </label>

    <button type="submit">Login</button>
</form>
```

### ဘာကြောင့် `@csrf` ပါရတာလဲ?

- POST/PUT/PATCH/DELETE form တိုင်းမှာ `@csrf` လိုတယ်
- မထည့်ရင် `419 Page Expired` ဖြစ်မယ်
- CSRF attack ကာကွယ်ဖို့

---

## 9.8 Route များ

```php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    });
```

ဒီမှာ —

- `guest` middleware → login မဝင်ရသေးသူများ
- `auth` middleware → login ဝင်ပြီးသူများ
- `admin` middleware → admin ဖြစ်သူများသာ

---

## 9.9 Rate Limiting ထည့်သင့်တယ်

Login ကို အကြိမ်ရေအကန့်အသတ်မရှိ ခွင့်ပြုရင် brute-force ဖြစ်နိုင်တယ်။

ရိုးရိုးနည်း —

```php
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('login.store');
```

ဒါဆိုရင် —

- ၁ မိနစ်အတွင်း အကြိမ် ၅ ကြောင်းသာ
- မှားရင် ပြန်စမ်းတဲ့အခါ wait time ပါလာမယ်

ဒါပေမယ့် production-grade အတွက် —

- `RateLimiter` custom
- failed login tracking
- lockout message  
  စတာတွေ ထပ်ထည့်လို့ရတယ်။

---

## 9.10 Auth အတွက် Final Checklist

- [ ] `create()` method name မှန်လား
- [ ] `store()` method name မှန်လား
- [ ] `destroy()` method name မှန်လား
- [ ] `@csrf` ပါလား
- [ ] `Auth::attempt()` သုံးလား
- [ ] `session()->regenerate()` ပါလား
- [ ] logout မှာ `invalidate()` ပါလား
- [ ] logout မှာ `regenerateToken()` ပါလား
- [ ] `guest` middleware သုံးထားလား
- [ ] `auth` middleware သုံးထားလား
- [ ] `admin` middleware သုံးထားလား
- [ ] `redirect()->intended()` သုံးထားလား

---

# 10. Module 7 — Authorization: Login ဝင်တိုင်း Admin မဟုတ်ဘူး

## 10.1 ဘာကြောင့် ဒါကို သီးခြားခွဲပြောရတာလဲ?

ဒီနှစ်ခုက မတူဘူး —

| အကြောင်းအရာ | အဓိပ္ပာယ် |
|---|---|
| Authentication | “ဒီသူ ဘယ်သူလဲ?” |
| Authorization | “ဒီသူ ဒါလုပ်ခွင့်ရှိလား?” |

Login ဝင်တိုင်း **အားလုံး** admin ဖြစ်နေရင် မလုံခြုံဘူး။

## 10.2 `is_admin` column ထည့်မယ်

```php
Schema::table('users', function (Blueprint $table) {
    $table->boolean('is_admin')->default(false)->after('password');
});
```

Model —

```php
protected $fillable = [
    'name',
    'email',
    'password',
    'is_admin',
];
```

## 10.3 Admin middleware ဖန်တီးမယ်

```bash
php artisan make:middleware EnsureUserIsAdmin
```

`app/Http/Middleware/EnsureUserIsAdmin.php`

```php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        if (!$request->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
```

Middleware register လုပ်ရမယ်။  
လက်ရှိ Laravel မှာ `bootstrap/app.php` သို့မဟုတ် `app/Http/Kernel.php` ထဲမှာ ဖြစ်နိုင်တယ်။

```php
'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
```

## 10.4 ဘာကြောင့်ဒါလုပ်ရတာလဲ?

- `/admin` ကို ပုံမှန် user ဝင်မရစေဖို့
- category/project delete ကို admin မဟုတ်သူ မလုပ်နိုင်စေဖို့
- `403` နဲ့ ထိန်းချုပ်ထားတဲ့ error ပြဖို့

## 10.5 မလုပ်ရင် ဘာဖြစ်မလဲ?

- မှတ်ပုံတင်ပြီးသူတိုင်း `/admin` ဝင်နိုင်မယ်
- ဘယ်သူမဆို content ဖျက်နိုင်မယ်
- မလုံခြုံတဲ့ system ဖြစ်မယ်

## 10.6 Checkpoint

- admin user ဖြစ်မှ `/admin` ဝင်လို့ရမယ်
- မှတ်ပုံတင်ထားပေမယ့် `is_admin = false` ဖြစ်နေရင် `403` ပြမယ်

---

# 11. Module 8 — Dashboard Controller & View

## 11.1 Controller ဖန်တီးမယ်

```bash
php artisan make:controller DashboardController
```

```php
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

## 11.2 View

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

## 11.3 ဘာကြောင့် `view('admin.dashboard')` ကို `layouts.admin` နဲ့ extend လုပ်တာလဲ?

- တိုင်းမှာတစ်ခုချင်းစီမှာ `<html>` `<head>` ထပ်ရေးစရာမလို
- `@section('content')` နဲ့ content ပဲ ထည့်ရုံ
- layout တစ်ခုလုံးကို တစ်နေရာထဲက ပြင်လို့ရ

## 11.4 နောက်ပိုင်းမှာ ထည့်နိုင်တာများ

- recent projects
- recent messages
- published posts
- draft posts
- quick actions

## 11.5 Checkpoint

- admin login ဝင်ပြီးရင် `/admin` မှာ `userCount` ပေါ်မယ်
- `layouts.admin` ပေါ်နေမယ်
- `page-title` နဲ့ `breadcrumb` ပေါ်နေမယ်

---

# 12. Module 9 — CRUD Module: Category or Project

## 12.1 ဘာကြောင့် `Category`/`Project` က အကောင်းဆုံးဥပမာလဲ?

- ရိုးရှင်းတယ်
- `name`, `description`, `is_active` စတဲ့ အခြေခံစက်ကွက်တွေနဲ့ ဆောက်လို့ရတယ်
- ပြင်ဆင်ရလွယ်တယ်
- တကယ့်အလုပ်မှာ အသုံးများတယ်

## 12.2 Model + Migration

```bash
php artisan make:model Category -m
```

Migration —

```php
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

Model —

```php
class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];
}
```

---

## 12.3 Controller

```bash
php artisan make:controller CategoryController
```

Resource controller မှာ ပါသင့်တဲ့အချက် —

- `index()` — စာရင်းပြမယ်
- `create()` — form ပြမယ်
- `store()` — save မယ်
- `edit()` — edit form ပြမယ်
- `update()` — update မယ်
- `destroy()` — delete မယ်

`show()` ကို မသုံးချင်ရင် route ထဲမှာ `except('show')` သုံးနိုင်တယ်။

---

## 12.4 Route

```php
use App\Http\Controllers\CategoryController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('categories', CategoryController::class)->except('show');
    });
```

`Route::resource` ကို သုံးရင် —

- `categories` — index
- `categories/create` — create form
- `categories` — store
- `categories/{category}/edit` — edit form
- `categories/{category}` — update
- `categories/{category}` — delete

ဆိုပြီး လွယ်လွယ်ကူကူရတယ်။

---

## 12.5 Validation ကို သီးခြား Form Request ထဲထည့်ပါ

```bash
php artisan make:request StoreCategoryRequest
php artisan make:request UpdateCategoryRequest
```

`StoreCategoryRequest` —

```php
public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'is_active' => ['boolean'],
    ];
}
```

`UpdateCategoryRequest` မှာ —

```php
'name' => ['required', 'string', 'max:255'],
```

ဘာကြောင့်?

- `create` နဲ့ `update` မှာ လိုအပ်ချက် မတူနိုင်ဘူး
- `is_active` ကို `boolean` အဖြစ် ထိန်းချင်လို့
- `description` ကို `nullable` ထားချင်လို့

---

## 12.6 `store()` မှာ

```php
public function store(StoreCategoryRequest $request)
{
    Category::create($request->validated());

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Category ကို အောင်မြင်စွာ ထည့်သွင်းပြီးပါပြီ။');
}
```

## 12.7 `update()` မှာ

```php
public function update(UpdateCategoryRequest $request, Category $category)
{
    $category->update($request->validated());

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Category ကို အောင်မြင်စွာ ပြင်ဆင်ပြီးပါပြီ။');
}
```

## 12.8 `destroy()` မှာ

```php
public function destroy(Category $category)
{
    $category->delete();

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Category ကို ဖျက်ပြီးပါပြီ။');
}
```

---

## 12.9 View များ

### `index.blade.php`

```blade
@extends('layouts.admin')

@section('page-title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Category List</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                Add New
            </a>
        </div>
        <div class="card-body">
            @include('layouts.partials.alerts')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.categories.destroy', $category) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
```

### `create.blade.php`

```blade
@extends('layouts.admin')

@section('page-title', 'Create Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                @include('admin.categories._form')

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
```

### `edit.blade.php`

```blade
@extends('layouts.admin')

@section('page-title', 'Edit Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.categories._form')

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
```

### `_form.blade.php`

```blade
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text"
           name="name"
           id="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $category->name ?? '') }}">

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description"
              id="description"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check">
    <input type="checkbox"
           name="is_active"
           id="is_active"
           value="1"
           class="form-check-input"
           {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
    <label for="is_active" class="form-check-label">Active</label>
</div>
```

---

## 12.10 CRUD မှာ မလုပ်ရင် မကောင်းတာများ

| မလုပ်ရင် | ဖြစ်နိုင်တာ |
|---|---|
| `@csrf` မထည့် | `419 Page Expired` |
| `@method('DELETE')` မထည့် | `405 Method Not Allowed` |
| validation မလုပ် | မှားတဲ့ data ဝင်နိုင်တယ် |
| `flash message` မထည့် | “လုပ်ပြီးသားလား မပြီးသေးဘူးလား” မသိဘူး |
| `paginate()` မသုံး | အများကြီးရှိရင် စာမျက်နှာ ကြီးသွားမယ် |
| `old()` မသုံး | input မှားပြီး ပြန်ပြင်ရင် ပျောက်သွားမယ် |
| `confirm()` မထည့် | မတော်တဆ delete နှိပ်မိနိုင်တယ် |

---

# 13. Module 10 — Portfolio Frontend နဲ့ ချိတ်ဆက်ခြင်း

## 13.1 ဒီအပိုင်းက ဘာကြောင့် အရေးကြီးတာလဲ?

ဒီဂိုက်ရဲ့ ရည်ရွယ်ချက်က —

> “admin panel ကို standalone မဟုတ်ဘဲ၊ ပုံမှန် visitor တွေကြည့်တဲ့ public portfolio site နဲ့ ချိတ်ဆက်ဖို့”

ဒါဆိုရင် —

- `projects`
- `services`
- `blog_posts`
- `contact_messages`

စတာတွေကို **တစ်နေရာထဲ**က ထိန်းရမယ်။

---

## 13.2 ခွဲခြားရမယ့်အပိုင်းများ

| အပိုင်း | ဘယ်သူကြည့်မလဲ | ဘယ်လိုထိန်းမလဲ |
|---|---|---|
| Public pages | visitor | `public` route |
| Admin panel | admin | `auth + admin` route |
| Database | system | single source of truth |

---

## 13.3 အကြံပြုထားတဲ့ data model

### `projects`

```text
id
title
slug
description
client_name
started_at
completed_at
is_published
featured_image
sort_order
created_at
updated_at
```

### `services`

```text
id
name
slug
description
icon
is_active
sort_order
created_at
updated_at
```

### `blog_posts`

```text
id
title
slug
content
excerpt
featured_image
is_published
published_at
created_at
updated_at
```

### `contact_messages`

```text
id
name
email
phone
message
is_read
created_at
updated_at
```

---

## 13.4 Public page မှာ ဘယ်လိုပြမလဲ?

`projects` table မှာ —

```php
public function scopePublished($query)
{
    return $query->where('is_published', true);
}
```

Public controller —

```php
$projects = Project::published()->latest()->get();
```

Admin —

```php
$projects = Project::latest()->paginate(10);
```

ဘာကြောင့်?

- visitor က **တရားဝင် ထုတ်ပြန်ပြီးသား**ပဲ ပြရမယ်
- admin က **draft/published** အားလုံးကို ပြရမယ်

---

## 13.5 `slug` ကို ဘာကြောင့်ထည့်သင့်တာလဲ?

- `/projects/1` ထက် `/projects/my-awesome-project` က ပိုကောင်းတယ်
- `slug` ကို `unique` ထားရမယ်
- `Str::slug()` နဲ့ generate လုပ်လို့ရတယ်

---

## 13.6 `is_published` vs `published_at`

| အသုံးပြုပုံ | ကွာခြားချက် |
|---|---|
| `is_published` | ခလုတ်တစ်ခုလို ပြ/မပြ ထိန်းချုပ် |
| `published_at` | အချိန်အလိုက် ထုတ်ပြန်ချင်ရင် သုံး |

---

## 13.7 SEO fields ထည့်သင့်တယ်

```text
meta_title
meta_description
```

ဘာကြောင့်?

- portfolio site ကို လူတွေ ရှာတွေ့အောင်
- Google search result ကောင်းအောင်

---

## 13.8 မလုပ်ရင် ဘာဖြစ်မလဲ?

- `is_published` မပါရင် မပြီးသေးတဲ့ project တွေ ပြမိနိုင်တယ်
- `slug` မထည့်ရင် `/projects/1` လို မလှတဲ့လင့်ခ်တွေ ဖြစ်မယ်
- `scopePublished` မရှိရင် တိုင်းမှာ `where('is_published', true)` ထပ်ရေးရမယ်

---

# 14. Module 11 — Security & Production Readiness

## 14.1 CSRF

- form တိုင်းမှာ `@csrf` ပါရမယ်
- `@method('PUT')` / `@method('DELETE')` သုံးရမယ်
- `419 Page Expired` ပေါ်ရင် ဒါကို စစ်ရမယ်

## 14.2 Authorization

- `auth` middleware တစ်ခုတည်းနဲ့ မလုံဘူး
- `admin` middleware ထပ်ထည့်ရမယ်
- `Policy` သုံးရင် ပိုကောင်းတယ်

## 14.3 Validation

- `request()->validate()` သုံးမယ်
- `FormRequest` သုံးရင် ပိုသန့်ရှင်းတယ်
- `mass assignment` အတွက် `fillable` ထည့်ရမယ်

## 14.4 Rate Limiting

- login route မှာ `throttle` ထည့်ရမယ်
- `register` မှာလည်း ထည့်နိုင်တယ်
- `contact form` မှာလည်း ထည့်နိုင်တယ်

## 14.5 Password & Hashing

- `Hash::make()` သုံးရမယ်
- `bcrypt` သို့မဟုတ် `argon2id` သုံးရမယ်
- `password` field ကို `hidden()` သို့မဟုတ် `makeHidden()` နဲ့ ပြန်မပြရ

## 14.6 `.env`

- `APP_DEBUG=true` ကို **local** မှာပဲ သုံးမယ်
- **production** မှာ `APP_DEBUG=false` ဖြစ်ရမယ်
- `APP_ENV=production` ဖြစ်ရမယ်
- `SESSION_COOKIE_SECURE=true` ဖြစ်ရမယ်
- `SESSION_COOKIE_HTTPONLY=true` ဖြစ်ရမယ်

## 14.7 HTTPS

- production မှာ HTTPS သုံးရမယ်
- `SESSION_COOKIE_SECURE` ကို `true` ထားရမယ်
- `HSTS` header ထည့်နိုင်တယ်

## 14.8 Asset build

- `npm run build` ကို **production** မှာ သုံးမယ်
- `npm run dev` ကို **development** မှာ သုံးမယ်

## 14.9 Cache

- `php artisan config:cache`
- `php artisan route:cache`
- `php artisan view:cache`

ဒါပေမယ့် **local** မှာ မသုံးသင့်ဘူး။  
`config:cache` သုံးပြီးရင် `.env` ပြင်တာ သတိထားရမယ်။

---

# 15. Module 12 — Testing & Debugging

## 15.1 Testing က ဘာကြောင့်လိုတာလဲ?

ဒီလိုပြဿနာမျိုးကို —

- “`create` မရှိဘူး”
- “`destroy` မရှိဘူး”
- “`/admin` ကို guest ဝင်လို့မရဘူး”

ဒါတွေကို **လက်နဲ့ စမ်း** နေစရာမလိုဘဲ **test** နဲ့ စစ်လို့ရတယ်။

---

## 15.2 Feature tests အကြံပြု

```bash
php artisan make:test Auth/LoginTest
php artisan make:test Admin/CategoryTest
```

### ဥပမာစစ်သင့်တဲ့အချက်များ

1. **မလုပ်ရသေးတဲ့သူ** `/admin` ဝင်ရင် `/login` ပြန်ပို့လား
2. **မှားတဲ့အကောင့်** login ဝင်ရင် `401/422` ပြန်ပို့လား
3. **မှန်တဲ့အကောင့်** ဝင်ရင် `/admin` ရောက်လား
4. **`is_admin = false`** ဖြစ်နေရင် `403` ပြလား
5. **`is_admin = true`** ဖြစ်နေရင် `/admin` ဝင်လို့ရလား
6. **`create()`** route က `200` ပြလား
7. **`store()`** က `redirect()` ပြန်လုပ်လား
8. **`destroy()`** က `delete()` ပြီးမှ `redirect()` ပြန်လုပ်လား

---

## 15.3 Laravel Debugging Tools

- `dd()` — temporary debug
- `dump()` — data ထုတ်ကြည့်
- `php artisan route:list` — route စစ်
- `php artisan tinker` — data စစ်
- `Log::info()` — log ထဲရေး
- `debugbar` — local dev မှာ အသုံးဝင်

---

## 15.4 `php artisan route:list` က အရမ်းအသုံးဝင်တယ်

```bash
php artisan route:list
```

ဒါဆိုရင် —

- `/admin` ဘယ် route name နဲ့ ရှိလဲ
- `/admin/logout` ဘယ် method နဲ့ ခေါ်လို့ရလဲ
- `admin.categories.destroy` ရှိလား

ဒါတွေကို တစ်ချက်ထဲမှာ ကြည့်လို့ရတယ်။

---

# 16. Updated Troubleshooting Table

| Error / Issue | အဓိကအကြောင်းရင်း | ဘယ်လိုစစ်မလဲ | ပြင်နည်း |
|---|---|---|---|
| `Call to undefined method create()` | controller method name မှား | `LoginController` ဖွင့်ကြည့် | `creat()` ကို `create()` ပြင် |
| `Call to undefined method destroy()` | controller method name မှား | `destroy()` ရှိမရှိစစ် | `destory()` ကို `destroy()` ပြင် |
| `419 Page Expired` | `@csrf` မထည့်ထား | `form` ကို ကြည့် | `@csrf` ထည့် |
| `Route [login] not defined` | route name မှား/မရှိ | `php artisan route:list` | `Route::get('/login')->name('login')` ပြင် |
| `404 Not Found` | route URL မှား | `php artisan route:list` | route path ပြင် |
| `405 Method Not Allowed` | `@method('DELETE')` မထည့်ထား | `form` ကို ကြည့် | `@method('DELETE')` ထည့် |
| `403 Forbidden` | `admin` middleware မှာ `abort(403)` | middleware စစ် | `is_admin` ပြင် |
| `Vite manifest not found` | `npm run build` မလုပ်သေး | `public/build` စစ် | `npm run build` |
| CSS မပေါ် | `@vite` မထည့်ထား/`@import` မှား | `network` tab | `@vite` နဲ့ `@import` ပြင် |
| `SQLSTATE[HY000] [2002]` | DB service မဖွင့်ထား | `php artisan migrate` | MySQL service ဖွင့် |

---

# 17. Recommended 4-Week Learning Path

## Week 1 — Foundation

### ရည်မှန်းချက်

- Laravel ကို တပ်ဆင်တတ်မယ်
- `.env` ကို နားလည်မယ်
- `php artisan` command တွေ သုံးတတ်မယ်
- `php artisan route:list` သုံးတတ်မယ်

### လုပ်ရမယ့်အလုပ်

- [ ] `composer create-project`
- [ ] `php artisan serve`
- [ ] `.env` config
- [ ] `php artisan migrate`
- [ ] `php artisan tinker`

### Checkpoint

- Laravel default page ပေါ်မယ်
- `route:list` အလုပ်လုပ်မယ်

---

## Week 2 — Auth + Admin Layout

### ရည်မှန်းချက်

- `/login` ကို မှန်ကန်စွာ ဆောက်တတ်မယ်
- `guest` / `auth` / `admin` middleware ခွဲတတ်မယ်
- `layouts.admin` နဲ့ partials ခွဲတတ်မယ်

### လုပ်ရမယ့်အလုပ်

- [ ] `LoginController`
- [ ] `create()`
- [ ] `store()`
- [ ] `destroy()`
- [ ] `admin.blade.php`
- [ ] navbar/sidebar/footer partials

### Checkpoint

- login မဝင်ဘဲ `/admin` ဝင်ရင် `/login` ပြန်ပို့မယ်
- `is_admin = false` ဖြစ်ရင် `403` ပြမယ်
- `is_admin = true` ဖြစ်ရင် `/admin` ဝင်လို့ရမယ်

---

## Week 3 — CRUD

### ရည်မှန်းချက်

- `Category` သို့မဟုတ် `Project` CRUD ဆောက်တတ်မယ်
- `FormRequest` သုံးတတ်မယ်
- `flash message` သုံးတတ်မယ်
- `delete()` ကို `form` နဲ့ လုပ်တတ်မယ်

### လုပ်ရမယ့်အလုပ်

- [ ] `Category` model + migration
- [ ] `CategoryController`
- [ ] `StoreCategoryRequest`
- [ ] `UpdateCategoryRequest`
- [ ] `index.blade.php`
- [ ] `create.blade.php`
- [ ] `edit.blade.php`
- [ ] `_form.blade.php`

### Checkpoint

- `categories` table ထဲမှာ အသစ်ထည့်လို့ရမယ်
- `edit` ပြီးသွားရင် `updated_at` ပြောင်းမယ်
- `delete` ပြီးရင် `deleted_at` သို့မဟုတ် `id` ပျောက်မယ်
- `flash message` ပေါ်မယ်

---

## Week 4 — Portfolio Integration

### ရည်မှန်းချက်

- `is_published` ပါတဲ့ `projects` model ဆောက်တတ်မယ်
- public page မှာ `published()` scope သုံးတတ်မယ်
- admin panel ကနေ `projects` ကို ထိန်းချုပ်တတ်မယ်
- `slug` နဲ့ SEO field ထည့်တတ်မယ်

### လုပ်ရမယ့်အလုပ်

- [ ] `Project` model
- [ ] `slug` column
- [ ] `is_published` column
- [ ] `meta_title`, `meta_description`
- [ ] public `projects` route
- [ ] public `project detail` route
- [ ] admin CRUD

### Checkpoint

- `is_published = true` ဖြစ်မှ ပြမယ်
- `/projects` မှာ `slug` နဲ့ ပြမယ်
- `/admin/projects` မှာ `published` status ပြမယ်

---

# 18. Final Quality Checklist

ဒီအချက်တွေကို မိမိကိုယ်တိုင် မေးပါ —

## 18.1 Route & Controller

- [ ] `Route::get('/login')` က `create()` ကို ခေါ်လား
- [ ] `Route::post('/login')` က `store()` ကို ခေါ်လား
- [ ] `Route::post('/logout')` က `destroy()` ကို ခေါ်လား
- [ ] `php artisan route:list` မှာ `admin.*` route တွေ ပြည့်စုံလား

## 18.2 Auth

- [ ] `guest` middleware သုံးထားလား
- [ ] `auth` middleware သုံးထားလား
- [ ] `admin` middleware သုံးထားလား
- [ ] `Auth::attempt()` သုံးထားလား
- [ ] `session()->regenerate()` ပါလား
- [ ] `Auth::logout()` ပါလား
- [ ] `session()->invalidate()` ပါလား
- [ ] `session()->regenerateToken()` ပါလား

## 18.3 Layout

- [ ] `layouts.admin` ကို `@extends` သုံးထားလား
- [ ] `@section('content')` ပါလား
- [ ] `@include('layouts.partials.navbar')` ပါလား
- [ ] `@include('layouts.partials.sidebar')` ပါလား
- [ ] `@include('layouts.partials.footer')` ပါလား
- [ ] `@include('layouts.partials.alerts')` ပါလား

## 18.4 CRUD

- [ ] `index()` စာရင်းပြလား
- [ ] `create()` form ပြလား
- [ ] `store()` save လုပ်လား
- [ ] `edit()` ပြင်လား
- [ ] `update()` update လုပ်လား
- [ ] `destroy()` ဖျက်လား
- [ ] `@csrf` ပါလား
- [ ] `@method('PUT')` ပါလား
- [ ] `@method('DELETE')` ပါလား
- [ ] `flash message` ပါလား

## 18.5 Security

- [ ] `admin` middleware ရှိလား
- [ ] `rate limiting` ရှိလား
- [ ] `validation` ပါလား
- [ ] `fillable` ပါလား
- [ ] `403` ကို ထိန်းချုပ်ထားလား
- [ ] `HTTPS` သုံးဖို့ ပြင်ဆင်ထားလား
- [ ] `APP_DEBUG` ကို `false` ထားဖို့ ပြင်ဆင်ထားလား

---

# 19. မူရင်း Guide ထဲက “အရေးကြီးဆုံး ပြင်ရမယ့်အချက်များ”

## 19.1 ပြင်ရမယ့်အချက် #1 — `creat()` ကို `create()` ပြင်မယ်

```php
// မှားနေတာ
public function creat()

// မှန်တာ
public function create()
```

## 19.2 ပြင်ရမယ့်အချက် #2 — `destory()` ကို `destroy()` ပြင်မယ်

```php
// မှားနေတာ
public function destory(Request $request)

// မှန်တာ
public function destroy(Request $request)
```

## 19.3 ပြင်ရမယ့်အချက် #3 — `Route::post('/logout')` ကို `POST` အနေနဲ့ပဲ ခေါ်မယ်

```blade
<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
```

ဘာကြောင့်?

- `logout` က state change ဖြစ်တယ်
- `GET` နဲ့ ခေါ်ရင် မတော်တဆ နှိပ်မိရင် ဖြစ်နိုင်တယ်

## 19.4 ပြင်ရမယ့်အချက် #4 — `admin` middleware ထည့်မယ်

```php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', ...)->name('admin.dashboard');
});
```

## 19.5 ပြင်ရမယ့်အချက် #5 — `throttle` ထည့်မယ်

```php
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('login.store');
```

## 19.6 ပြင်ရမယ့်အချက် #6 — `FormRequest` သုံးမယ်

```php
public function store(StoreCategoryRequest $request)
{
    Category::create($request->validated());
}
```

## 19.7 ပြင်ရမယ့်အချက် #7 — `published()` scope ထည့်မယ်

```php
public function scopePublished($query)
{
    return $query->where('is_published', true);
}
```

---

# 20. အကျဉ်းချုပ်

ဒီဂိုက်ကို **တကယ်အသုံးဝင်အောင်** ပြန်ပြင်ချင်ရင် —

1. **Method name typo** ကို ပြင်မယ်
2. **Route ↔ Controller contract** ကို စစ်မယ်
3. **Guest/Auth/Admin middleware** ခွဲမယ်
4. **Login/logout flow** ကို `session` နဲ့ `CSRF` ပြည့်စုံအောင် ဆောက်မယ်
5. **Layout** ကို partials ခွဲမယ်
6. **CRUD** ကို `FormRequest`, `flash`, `pagination`, `delete` ပါအောင် ဆောက်မယ်
7. **Portfolio** နဲ့ ချိတ်ဖို့ `published`, `slug`, `SEO` ထည့်မယ်
8. **Testing** ထည့်မယ်
9. **Production** checklist ထည့်မယ်

ဒါဆိုရင် —

> **“ကျူးပီးလို့ ရတဲ့ tutorial”** မဟုတ်ဘဲ  
> **“နားလည်ပြီး တကယ်အလုပ်လုပ်တဲ့ system”** ဖြစ်လာမယ်။

---

## 21. လက်ရှိအတွက် အကောင်းဆုံး Next Steps

လက်ရှိမှာ ဒီအတိုင်း စတင်ပါ —

### ချက်ချင်းလုပ်ရမယ့်အလုပ်

1. `LoginController` ထဲက `creat()` ကို `create()` ပြင်မယ်
2. `LoginController` ထဲက `destory()` ကို `destroy()` ပြင်မယ်
3. `php artisan route:list` နဲ့ route စစ်မယ်
4. `/login` ကို ဖွင့်ပြီး `create()` အလုပ်လုပ်မလား စစ်မယ်
5. `/logout` ကို `POST` နဲ့ ခေါ်မယ်
6. `admin` middleware ထည့်မယ်
7. `throttle` ထည့်မယ်

### ပြီးရင် လုပ်ရမယ့်အလုပ်

8. `Category` CRUD ဆောက်မယ်
9. `Project` model ထည့်မယ်
10. `is_published` နဲ့ `slug` ထည့်မယ်
11. `projects` public page ဆောက်မယ်
12. `contact_messages` model ထည့်မယ်

---

## 22. လိုအပ်ရင် ထပ်ဖြည့်နိုင်တဲ့အပိုင်းများ

ဒီဂိုက်ကို ပိုပြီး **production-ready** ဖြစ်စေချင်ရင် အောက်ပါအပိုင်းတွေ ထပ်ထည့်နိုင်တယ်။

- [ ] `User` registration
- [ ] `password reset`
- [ ] `email verification`
- [ ] `role` / `permission` system
- [ ] `Policy` / `Gate`
- [ ] `API` endpoint
- [ ] `file upload`
- [ ] `image resize`
- [ ] `SEO meta`
- [ ] `sitemap.xml`
- [ ] `robots.txt`
- [ ] `pagination`
- [ ] `search`
- [ ] `soft delete`
- [ ] `audit log`
- [ ] `activity log`
- [ ] `notification`

---

## 23. နောက်ဆုံးစကား

ဒီဂိုက်ရဲ့ **အဓိကသင်ခန်းစာ** က —

> **Laravel မှာ “မအလုပ်လုပ်ဘူး” ဖြစ်တဲ့အခါ  
> “ဘယ်အပိုင်းက ဘယ်အပိုင်းကို ခေါ်နေတာလဲ” ဆိုတာကို ရှာရမယ်။**

- `route` က `controller` ကို ခေါ်တယ်
- `controller` က `view` ကို ပြန်ပေးတယ်
- `view` က `layout` ကို သုံးတယ်
- `layout` က `partials` ကို သုံးတယ်
- `middleware` က request ကို ထိန်းတယ်
- `database` က data ကို သိမ်းတယ်
- `auth` က “ဘယ်သူ” ဆိုတာ သတ်မှတ်တယ်
- `admin` middleware က “ဘယ်သူ ဝင်ခွင့်ရှိလဲ” ဆိုတာ ထိန်းတယ်

ဒါတွေကို **တစ်စုံတစ်ရာ** အနေနဲ့ နားလည်ရင် —  
**“တကယ်အလုပ်လုပ်တဲ့ Laravel Admin Panel”** ကို ဆောက်နိုင်မယ်။

---

အောက်မှာ **မြန်မာဘာသာနဲ့ ပြန်ပြင်ထားတဲ့ Implementation Guide (Course Style)** ကို ပေးထားပါတယ်။  
မူရင်း guide ထဲက **အဓိကပြဿနာ ၂ ခု** ဖြစ်တဲ့ `create`/`creat` နဲ့ `destroy`/`destory` ကို **ဘာကြောင့်ပြင်ရတာလဲ** ဆိုတာနဲ့ တကွ **ဘယ်လိုကာကွယ်မလဲ** ဆိုတာပါ ထည့်ရေးထားပါတယ်။  
ဒါ့အပြင် **production-ready admin panel** ဖြစ်ဖို့ လိုအပ်တဲ့ **authorization, validation, flash messages, pagination, testing, portfolio integration** တွေပါ ပါဝင်ပါတယ်။