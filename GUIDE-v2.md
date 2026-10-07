ဟုတ်ကဲ့။ `IMPLEMENTATION_GUIDE.md` ထဲက **claims** တွေကို **fact-check** လုပ်ပြီး၊ **ဘာတွေထပ်ထည့်သင့်လဲ** ဆိုတာကို **မှန်/စစ်ရန်/ပြင်ရန်/ထပ်ထည့်ရန်** အနေနဲ့ ခွဲပေးပါမယ်။  
ဒီစစ်ဆေးမှုက လက်ရှိပါဝင်တဲ့ အချက်အလက်တွေ + Laravel/Bootstrap/AdminLTE conventions အပေါ် အခြေခံထားပါတယ်။ နောက်ဆုံးအတည်ပြုမှုအတွက်တော့ **official release notes / package docs** နဲ့ ထပ်စစ်ရပါမယ်။

---

# 1. Fact-check အကျဉ်းချုပ်

| အမှတ်အသား | အဓိပ္ပာယ် |
|---|---|
| ✅ | လက်ရှိ Laravel conventions / common best practice အရ မှန်တယ်/သင့်တော်တယ် |
| ⚠️ | မှန်နိုင်ပေမယ့် version, package compatibility, environment ပေါ်မူတည်ပြီး စစ်ရမယ် |
| ❌ / 🚫 | ဒီအတိုင်းထားရင် လုံခြုံရေး/UX/structure အရ ပြဿနာဖြစ်နိုင်တယ် |
| ➕ | ထပ်ထည့်သင့်တယ် |

---

# 2. မူရင်း Guide ထဲက အချက်များကို Fact-check လုပ်ခြင်း

## 2.1 Laravel 13 + PHP 8.2+

**မူရင်းအချက်**

> Laravel 13.x uses PHP 8.2+

**Status:** ⚠️ စစ်ရန် / သတိထားရန်

**အကြောင်းရင်း**

- Laravel version အသစ်တွေမှာ PHP requirement ပြောင်းနိုင်တယ်။
- လက်တွေ့မှာ `composer create-project` လုပ်ချိန်မှာ ကိုယ့်စက်ရဲ့ PHP version နဲ့ ကိုက်မကိုက် စစ်ပေးတယ်။
- PHP 8.2 က အနိမ့်ဆုံးလိုအပ်ချက်ဖြစ်နိုင်ပေမယ့်၊ လက်ရှိ/နောက်ပိုင်း Laravel တွေမှာ PHP 8.3+ ကို recommended အနေနဲ့ သုံးသင့်တယ်။
- ကျွန်တော်တို့ရဲ့ knowledge scope ထဲမှာ “Laravel 13” ဆိုတဲ့ အတည်ပြုချက်ကို အချိန်နဲ့တပြေးညီ official docs မဖွင့်ဘဲ 100% အတည်မပြုနိုင်ပါ။

**ဘာလုပ်သင့်လဲ?**

- `php -v` နဲ့ PHP version စစ်ပါ။
- Laravel install လုပ်ပြီးရင် `composer show laravel/framework` နဲ့ version စစ်ပါ။
- Production အတွက်ဆိုရင် **PHP 8.3+** ကို ပိုအကြံပြုတယ်။
- `composer.json` ထဲက `require.php` ကို ကြည့်ပြီး အနိမ့်ဆုံးလိုအပ်ချက် စစ်ပါ။

**အကြံပြုပြင်ရေး**

```md
Laravel 13 ကို သုံးမယ်ဆိုရင် ဖြစ်နိုင်ခြေအရ အနည်းဆုံး PHP 8.2+ လိုအပ်နိုင်ပေမယ့်၊ 
လက်ရှိ official docs/release notes အရ ပြန်စစ်ရန် လိုတယ်။ 
Production အတွက် PHP 8.3+ ကို အကြံပြုတယ်။
```

---

## 2.2 Laravel-AdminLTE v4 supports Laravel 12.x and 13.x

**မူရင်းအချက်**

> Laravel-AdminLTE v4 supports Laravel 12.x and 13.x

**Status:** ⚠️ အတည်ပြုစစ်ရန်

**အကြောင်းရင်း**

- “AdminLTE” ဆိုတာက **HTML/CSS/JS admin template** ဖြစ်တယ်။
- “Laravel-AdminLTE” ဆိုတာက **Laravel integration package** ဖြစ်တယ်။
- ဒါနှစ်ခုကို ရောပြောရင် မှားနိုင်တယ်။
- `jeroennoten/laravel-adminlte` package ရဲ့ Laravel version support ကို `composer.json`, Packagist, GitHub release notes မှာ ပြန်စစ်ရမယ်။
- တချို့အချိန်မှာ package က Laravel 12/13 ကို မသေးရသေးဘဲ အဟောင်းသုံးဖို့ လိုနိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

- **Manual AdminLTE integration** သုံးမလား
- **jeroennoten/laravel-adminlte package** သုံးမလား  
  ဒါကို အရင်ဆုံး ဆုံးဖြတ်ရမယ်။

**Manual integration သုံးမယ်ဆိုရင်**

```bash
composer show laravel/framework
npm ls admin-lte
```

**Package သုံးမယ်ဆိုရင်**

```bash
composer show jeroennoten/laravel-adminlte
```

**အကြံပြုပြင်ရေး**

```md
ဒီဂိုက်မှာ AdminLTE 4 ကို သုံးမယ်။ 
ဒါပေမယ့် AdminLTE template နဲ့ Laravel-AdminLTE package ကို မရောရန်။
အကယ်၍ Laravel-AdminLTE package သုံးရင် သူ့ရဲ့ Laravel 12/13 support ကို 
official repo/package docs မှာ အရင်စစ်ရမယ်။
```

---

## 2.3 AdminLTE 4 ships with Bootstrap 5.3 and is jQuery-free

**မူရင်းအချက်**

> AdminLTE 4 ships with AdminLTE 4, which is built on Bootstrap 5.3 and is jQuery-free

**Status:** ✅ မှန်နိုင်တယ်၊ ဒါပေမယ့် version စစ်ရန်

**အကြောင်းရင်း**

- အကယ်၍ AdminLTE 4 stable/official release ဖြစ်ရင် ဒီလမ်းကြောင်းက မှန်တယ်။
- အဟောင်းတုန်းက AdminLTE 3 က **Bootstrap 4 + jQuery** အပေါ် အခြေခံတယ်။
- ဒါကြောင့် **ဟောင်းတဲ့ AdminLTE 3 tutorials** တွေကို ကြည့်ပြီး လုပ်ရင် မတူနိုင်ဘူး။
- မလိုအပ်ဘဲ `jquery` ထည့်ရင် —
  - duplicate script
  - event binding ပြဿနာ
  - outdated plugin usage
  - bundle size ကြီးတာ  
  တွေ ဖြစ်နိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

- `admin-lte` package version ကို စစ်ပါ။

```bash
npm ls admin-lte
```

- Bootstrap 5.3 နဲ့ ကိုက်ညီမှုရှိမရှိ စစ်ပါ။
- `jquery` ကို မလိုအပ်ဘဲ မထည့်ပါနဲ့။
- အဟောင်းတုန်းက `$(document).ready()` pattern တွေ မသုံးပါနဲ့။

**အကြံပြုပြင်ရေး**

```md
ဒီဂိုက်မှာ သုံးတာက ဖြစ်နိုင်ရင် အမှန်တကယ် **AdminLTE 4 (Bootstrap 5.3, jQuery-free)** ဖြစ်ရမယ်။
အကယ်၍ AdminLTE 3 tutorials တွေကနေ ကူးယူတာရှိရင် 
`jquery`, `bootstrap@4`, `adminlte@3` တွေနဲ့ ရောထွေးနိုင်တယ်။
```

---

## 2.4 Login flow uses `Auth::attempt()` + `session()->regenerate()` + logout invalidate/regenerateToken

**မူရင်းအချက်**

> Laravel authentication docs confirm that login flow commonly uses `Auth::attempt(...)` + `session()->regenerate()` + logout with `Auth::logout()` and `session invalidate/regenerateToken`

**Status:** ✅ မှန်တယ်

**အကြောင်းရင်း**

- `Auth::attempt()` က Laravel ရဲ့ traditional credential attempt pattern ဖြစ်တယ်။
- `session()->regenerate()` က **session fixation** ကို ကာကွယ်ဖို့ အရေးကြီးတယ်။
- `Auth::logout()` တစ်ခုတည်းမဟုတ်ဘဲ —
  - `invalidate()`
  - `regenerateToken()`  
  တွေပါ ထည့်ရင် ပိုလုံခြုံတယ်။

**ဘာလုပ်သင့်လဲ?**

- ဒီပုံစံကို ဆက်သုံးလို့ရတယ်။
- ဒါပေမယ့် **rate limiting** ထပ်ထည့်သင့်တယ်။
- **admin authorization** ထပ်ထည့်သင့်တယ်။
- `remember` ကို သုံးမယ်ဆိုရင် “Remember me” cookie သက်တမ်း/လုံခြုံရေးကို သိထားသင့်တယ်။

**ထပ်ထည့်သင့်တာ**

```php
// login attempt အောင်မြင်ရင်
$request->session()->regenerate();
```

```php
// logout
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
```

ဒါတွေ ပါပြီးသားဖြစ်ရင် ကောင်းတယ်။  
ဒါပေမယ့် **brute-force protection** မပါသေးဘူး။

---

## 2.5 Built-in authentication services are recommended for browser-based login

**မူရင်းအချက်**

> For a web app with browser-based login, Laravel built-in authentication services are the recommended pattern

**Status:** ✅ မှန်တယ်

**အကြောင်းရင်း**

- Laravel ရဲ့ `Auth`, `Session`, middleware pattern တွေက browser-based app အတွက် သင့်တော်တယ်။
- သင်ယူနေတဲ့အဆင့်မှာ **manual auth** ကို နားလည်အောင်ရေးတာ ကောင်းတယ်။
- ဒါပေမယ့် **production** အတွက် —
  - Laravel Breeze
  - Laravel Fortify
  - Jetstream  
  တွေက လုံခြုံရေး/UX အပိုင်းတွေ ပိုပြီးစစ်ပြီးသား ဖြစ်နိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

- လေ့လာနေတဲ့အချိန်မှာ manual auth ကို ဆက်သုံးလို့ရတယ်။
- ဒါပေမယ့် အောက်ပါအချက်တွေ ထပ်ဖြည့်ရမယ် —
  - validation
  - rate limiting
  - CSRF
  - session regeneration
  - authorization
  - password hashing
  - secure logout

---

## 2.6 Vite asset build မလုပ်ရင် CSS/JS မပေါ်ဘူး

**မူရင်းအချက်**

> Laravel uses Vite for frontend asset compilation. Without this, CSS/JS won’t load properly

**Status:** ✅ မှန်တယ်

**အကြောင်းရင်း**

- Laravel 9+ မှာ **Vite** ကို အဓိက frontend build tool အဖြစ် သုံးတယ်။
- `@vite([...])` က `public/build/manifest.json` ကို ကြည့်တယ်။
- `npm run build` မလုပ်ထားရင် production မှာ `Vite manifest not found` ဖြစ်နိုင်တယ်။
- development မှာ `npm run dev` မဖွင့်ထားရင် hot module/dev asset ကို မရနိုင်ဘူး။

**ဘာလုပ်သင့်လဲ?**

- Development:

```bash
npm run dev
```

- Production/build test:

```bash
npm run build
```

- Blade ထဲမှာ —

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

ဆိုတာ မှန်ရမယ်။

**ထပ်ထည့်သင့်တဲ့အချက်**

```md
- `npm run build` ပြီးမှ production deploy လုပ်ရမယ်
- `public/build/manifest.json` မရှိရင် Vite build မအောင်မြင်သေးဘူးလို့ သတ်မှတ်ရမယ်
- dev server မဖွင့်ထားဘဲ `@vite` သုံးရင် တချို့အခြေအနေမှာ 404/manifest error ဖြစ်နိုင်တယ်
```

---

## 2.7 Bootstrap 5.3 + AdminLTE 4 + `@popperjs/core` + `bootstrap-icons`

**မူရင်းအချက်**

```bash
npm install bootstrap@5.3 admin-lte@4 @popperjs/core bootstrap-icons
```

**Status:** ✅ သင့်တော်တယ်

**အကြောင်းရင်း**

- Bootstrap 5.3 ကို သုံးမယ်ဆိုရင် `@popperjs/core` က dropdown, tooltip, popover စတာတွေအတွက် လိုအပ်တယ်။
- `bootstrap-icons` က admin UI မှာ သုံးဖို့ အဆင်ပြေတယ်။
- `admin-lte@4` က AdminLTE 4 ကို ကိုယ်စားပြုတယ်။

**သတိထားရန်**

- AdminLTE 4 ရဲ့ `dist` path တွေက version အလိုက် ပြောင်းနိုင်တယ်။
- `admin-lte/dist/css/adminlte.min.css` နဲ့ `admin-lte/dist/js/adminlte.min.js` တွေ တကယ်ရှိမရှိ စစ်ရမယ်။
- တချို့ package တွေမှာ `adminlte.css`, `adminlte.js`, ESM build, UMD build စတာတွေ ကွာနိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

```bash
npm ls bootstrap
npm ls admin-lte
npm ls @popperjs/core
npm ls bootstrap-icons
```

`node_modules/admin-lte/dist` ထဲမှာ ဘာတွေရှိလဲ စစ်ရမယ်။

---

## 2.8 `Route::redirect('/', '/admin')`

**မူရင်းအချက်**

```php
Route::redirect('/', '/admin');
```

**Status:** ⚠️ / 🚫 Portfolio project အတွက် မသင့်တော်ဘူး

**အကြောင်းရင်း**

- ဒီဂိုက်ရဲ့ ရည်ရွယ်ချက်က **portfolio frontend** နဲ့ ချိတ်ဖို့ပါ။
- Public website ရဲ့ `/` က **home page** ဖြစ်သင့်တယ်။
- `/` ကို `/admin` ကို ပို့ရင် —
  - visitor တွေ အတွက် မကောင်းဘူး
  - SEO အတွက် မကောင်းဘူး
  - “ဒီဆိုက်က အများကြည့်လို့မရဘူး” ဖြစ်နိုင်တယ်
  - portfolio အနေနဲ့ deploy လုပ်တဲ့အခါ ပြဿနာဖြစ်နိုင်တယ်

**ဘာလုပ်သင့်လဲ?**

- Public route ခွဲရမယ်။
- `/` = public home
- `/admin` = admin dashboard
- `/login` = login

ဥပမာ —

```php
Route::view('/', 'public.home')->name('home');
Route::view('/about', 'public.about')->name('about');
Route::get('/projects', [PublicProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [PublicProjectController::class, 'show'])->name('projects.show');
```

Admin —

```php
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
```

**အကြံပြုပြင်ရေး**

```md
`Route::redirect('/', '/admin')` ကို မသုံးသင့်ဘူး။
`/` ကို ဖွင့်ရင် public portfolio home ပေါ်ရမယ်။
`/admin` ကို ဖွင့်မှသာ admin dashboard ပေါ်ရမယ်။
```

---

## 2.9 `auth` middleware တစ်ခုတည်း သုံးထားတယ်

**မူရင်းအချက်**

```php
Route::middleware('auth')->prefix('admin')->name('admin.')->group(...);
```

**Status:** ❌ / ⚠️ မလုံလောက်ဘူး

**အကြောင်းရင်း**

- `auth` က **ဘယ်သူဆိုတာ** သိရုံသာရှိတယ်။
- ဒါပေမယ့် **ဒီသူက ဘာတွေလုပ်ခွင့်ရှိလဲ** ဆိုတာ မထိန်းဘူး။
- မှတ်ပုံတင်ထားတဲ့ သာမန်သုံးစွဲသူတိုင်း `/admin` ဝင်နိုင်နေရင် မလုံခြုံဘူး။
- ဒါက **authentication ≠ authorization** ပြဿနာ။

**ဘာလုပ်သင့်လဲ?**

- `admin` middleware ထည့်ရမယ်။
- သို့မဟုတ် `Gate` / `Policy` သုံးရမယ်။
- အနည်းဆုံး `users` table ထဲမှာ `is_admin` boolean ထည့်သင့်တယ်။

ဥပမာ —

```php
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(...);
```

`EnsureUserIsAdmin` middleware —

```php
if (!$request->user()) {
    return redirect()->route('login');
}

if (!$request->user()->is_admin) {
    abort(403);
}

return $next($request);
```

**အကြံပြုပြင်ရေး**

```md
`auth` middleware တစ်ခုတည်းနဲ့ မလုံလောက်ဘူး။
Admin route တွေအတွက် `admin` middleware သို့မဟုတ် `Gate`/`Policy` ထည့်ရမယ်။
```

---

## 2.10 `LoginController::create()` / `store()` / `destroy()` method naming

**မူရင်းအချက်**

- `/login` → `create()`
- `/login` POST → `store()`
- `/logout` → `destroy()`

**Status:** ✅ မှန်တယ်

**ဒါပေမယ့် မူရင်း bug ဖြစ်နေတဲ့အချက်**

- `creat()` ❌
- `destory()` ❌

**ဘာကြောင့်အရေးကြီးလဲ?**

- Laravel က `Controller::method` ကို string အနေနဲ့ ခေါ်တယ်။
- `create` နဲ့ `creat` က မတူဘူး။
- `destroy` နဲ့ `destory` က မတူဘူး။
- Route က မရှိတဲ့ method ကို ခေါ်ရင် `Call to undefined method` / route action not callable ဖြစ်နိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

- `php artisan route:list` နဲ့ route တွေ စစ်ရမယ်။
- `LoginController` ထဲက `create`, `store`, `destroy` ကို တိကျစွာ စစ်ရမယ်။
- IDE သုံးရင် “Go to Definition” နဲ့ route action ကို ခုန်ကြည့်လို့ရတယ်။
- နောက်ပိုင်းမှာ ဒီလိုမျိုးမဖြစ်အောင် —
  - route list စစ်တတ်မယ်
  - `php artisan route:list --path=login`
  - `php artisan route:list --name=admin`
  - test ရေးတတ်မယ်

**အကြံပြုပြင်ရေး**

```md
`create`, `store`, `destroy` ကို တိတိကျကျ သုံးရမယ်။
`creat`, `destory` လိုမျိုး မသုံးရ။
```

---

## 2.11 Seeder ထဲမှာ `admin@example.com` / `password` ထည့်ထားတယ်

**မူရင်းအချက်**

```php
User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
]);
```

**Status:** ⚠️ Development အတွက်သာ OK

**အကြောင်းရင်း**

- `Hash::make('password')` သုံးတာ မှန်တယ်။
- ဒါပေမယ့် `password` လိုမျိုး အားနည်းတဲ့စကားဝှက်ကို production မှာ မသုံးသင့်ဘူး။
- `DatabaseSeeder` ကို `--seed` နဲ့ production မှာ မသုံးသင့်ဘူး။
- `.env` ထဲကနေ ယူသုံးတာ၊ သို့မဟုတ် `php artisan tinker` / custom command နဲ့ ထည့်တာ ပိုကောင်းတယ်။

**ဘာလုပ်သင့်လဲ?**

- Local dev အတွက်ပဲ သုံးမယ်။
- `.env` ကို `.gitignore` ထဲထည့်မယ်။
- `password` ကို Git repo ထဲမှာ မချန်ထားသင့်ဘူး။
- အကယ်၍ repository ထဲမှာ default admin credentials ပါနေရင် ဖျက်သင့်တယ်။

**အကြံပြုပြင်ရေး**

```md
Seeder ထဲက `admin@example.com` / `password` ကို production မှာ မသုံးရ။
ဒါက လေ့လာရေးအတွက်သာ။
```

---

## 2.12 `@csrf` မထည့်ရင် `419 Page Expired`

**မူရင်းအချက်**

> `@csrf` မထည့်မယ် → `419 Page Expired`

**Status:** ✅ မှန်တယ်

**အကြောင်းရင်း**

- `POST`, `PUT`, `PATCH`, `DELETE` form တွေမှာ `@csrf` လိုတယ်။
- `logout` ကို `POST` နဲ့ လုပ်မယ်ဆိုရင်လည်း `@csrf` လိုတယ်။
- မထည့်ရင် `419 Page Expired` ဖြစ်နိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

- `login` form မှာ `@csrf` ပါရမယ်။
- `logout` form မှာ `@csrf` ပါရမယ်။
- `delete` form မှာ `@csrf` နဲ့ `@method('DELETE')` ပါရမယ်။

**ဥပမာ**

```blade
<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
```

```blade
<form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
```

---

## 2.13 `GET` နဲ့ delete action လုပ်မယ်ဆိုတဲ့ အမှား

**မူရင်းအချက်**

> delete action ကို GET method နဲ့လုပ်မယ်ဆိုတာ မသင့်တော်ဘူး

**Status:** ✅ မှန်တယ်

**အကြောင်းရင်း**

- `GET` က read-only action အတွက် ဖြစ်တယ်။
- `GET` နဲ့ delete လုပ်ရင် —
  - browser prefetch နဲ့ ဖျက်မိနိုင်တယ်
  - crawler/link preview နဲ့ ဖျက်မိနိုင်တယ်
  - CSRF risk ပိုများတယ်
  - RESTful convention နဲ့ မကိုက်ဘူး

**ဘာလုပ်သင့်လဲ?**

- `DELETE` ကို `form` နဲ့ပဲ လုပ်ရမယ်။
- `@method('DELETE')` သုံးရမယ်။
- `confirm()` သို့မဟုတ် modal ထည့်သုံးနိုင်တယ်။

**အကြံပြုပြင်ရေး**

```md
`<a href="...delete">` လိုမျိုးနဲ့ မဖျက်ရ။
`@method('DELETE')` ပါတဲ့ `form` နဲ့ပဲ ဖျက်ရမယ်။
```

---

## 2.14 Layout ထဲက `body class` နဲ့ `app-wrapper` markup

**မူရင်းအချက်**

```blade
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
```

**Status:** ⚠️ AdminLTE 4 docs နဲ့ ထပ်စစ်ရန်

**အကြောင်းရင်း**

- AdminLTE 4 ရဲ့ layout class တွေက version တွေအလိုက် ပြောင်းနိုင်တယ်။
- `sidebar-expand-lg`, `layout-fixed`, `app-wrapper` စတာတွေက AdminLTE 4 မှာ ပါနိုင်ပေမယ့်၊ တကယ့် recommended markup ကို စစ်ရမယ်။
- အဟောင်းတုန်းက AdminLTE 3 markup ကို ကူးသုံးရင် မမှန်နိုင်ဘူး။

**ဘာလုပ်သင့်လဲ?**

- `admin-lte@4` package ရဲ့ `dist` ထဲက sample HTML ကို ကြည့်ရမယ်။
- `node_modules/admin-lte/dist/index.html` လိုမျိုး ရှိရင် ဖွင့်ကြည့်ရမယ်။
- `body` class, `app-wrapper`, `app-sidebar`, `app-main` စတာတွေကို စစ်ရမယ်။

**အကြံပြုပြင်ရေး**

```md
ဒီ `body` class နဲ့ `app-wrapper` markup ကို ကြည့်ကောင်းအောင် ထည့်ထားပေမယ့်၊
အမှန်တကယ်သုံးမယ့် **AdminLTE 4 version** ရဲ့ official markup နဲ့ ကိုက်မကိုက် စစ်ရမယ်။
```

---

## 2.15 `npm run build` vs `npm run dev`

**မူရင်းအချက်**

> `npm run build` သုံးမယ်

**Status:** ✅ မှန်တယ်၊ ဒါပေမယ့် development workflow ထည့်ပြောရန်

**အကြောင်းရင်း**

- `npm run build` က production build အတွက်။
- `npm run dev` က development မှာ hot reload/watch အတွက်။
- တချို့အချိန်မှာ `npm run dev` မဖွင့်ထားဘဲ browser refresh လုပ်ရင် `@vite` asset မပေါ်တာ ဖြစ်နိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

- Development:

```bash
npm run dev
```

- Production build:

```bash
npm run build
```

- Deploy မလုပ်ခင်:

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

ဒါပေမယ့် `config:cache` သုံးထားရင် `.env` ပြင်ပြီးရင် `config:clear` ပြန်လုပ်ရမယ်။

---

# 3. ဘာတွေ ထပ်ထည့်သင့်လဲ? — Fact-based Additions

အောက်မှာ **Must Add**, **Should Add**, **Nice to Have** ဆိုပြီး ခွဲပေးထားပါတယ်။

---

# 4. Must Add — မဖြစ်မနေ ထပ်ထည့်သင့်တာများ

## 4.1 Version compatibility check section

**ဘာကြောင့်ထည့်သင့်လဲ?**

- “Laravel 13”, “AdminLTE 4”, “Laravel-AdminLTE v4” စတာတွေက version အလိုက် ပြောင်းနိုင်တယ်။
- တစ်ယောက်နဲ့တစ်ယောက် environment မတူနိုင်ဘူး။
- “ငါ့မှာ အလုပ်လုပ်တယ်” ဆိုတာထက် “ဘယ်လိုစစ်ရမလဲ” ဆိုတာ ပိုအရေးကြီးတယ်။

**ထည့်သင့်တဲ့အချက်များ**

```bash
php -v
composer -V
node -v
npm -v
php artisan --version
composer show laravel/framework
npm ls admin-lte bootstrap
```

**Guide ထဲမှာ ထည့်ရေးသင့်တာ**

```md
ဒီဂိုက်မှာ “ဒီအတိုင်းကူး” မလုပ်ခင် —
- ကိုယ့် PHP version
- Laravel version
- Node version
- AdminLTE package version
ကို အရင်စစ်ရမယ်။
```

---

## 4.2 “AdminLTE 4” နဲ့ “Laravel-AdminLTE package” ကို ခွဲပြောဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- ဒီနှစ်ခုက မတူဘူး။
- တချို့က `npm install admin-lte@4` နဲ့ manual integration လုပ်တယ်။
- တချို့က `composer require jeroennoten/laravel-adminlte` နဲ့ package integration လုပ်တယ်။
- ဒါနှစ်ခုရဲ့ install method, layout config, Blade integration မတူဘူး။

**ထည့်သင့်တဲ့အချက်**

```md
ဒီဂိုက်မှာ သုံးမယ့်နည်းလမ်းကို ရွေးရမယ် —
1. `npm` ကနေ `admin-lte@4` ကို သုံးပြီး **manual Blade integration** လုပ်မယ်
2. `jeroennoten/laravel-adminlte` package ကို သုံးပြီး **Laravel package integration** လုပ်မယ်

ဒီဂိုက်မှာ ဖြစ်နိုင်ရင် **manual integration** ကို သုံးမယ်။
ဘာကြောင့်ဆိုတော့ လေ့လာနေသူအတွက် route/view/layout ကို ပိုနားလည်စေလို့။
```

---

## 4.3 `guest` middleware redirect config

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `guest` middleware က “မဝင်ရသေးသူ” အတွက်သာ ဖြစ်တယ်။
- ဒါပေမယ့် login ပြီးပြီးသူက `/login` ပြန်ဝင်ရင် ဘယ်ကို ပို့မလဲဆိုတာ ထိန်းရမယ်။
- မထိန်းဘဲဆိုရင် —
  - `/login` ပြန်ပြနေနိုင်တယ်
  - `/home` လိုမျိုး မရှိတဲ့နေရာကို ပို့နိုင်တယ်
  - “ဘာကြောင့် ဒီနေရာရောက်တာလဲ” ဖြစ်နိုင်တယ်

**ဘာလုပ်သင့်လဲ?**

- `RedirectIfAuthenticated` middleware ကို စစ်ရမယ်။
- Laravel version အလိုက် —
  - `app/Http/Middleware/RedirectIfAuthenticated.php`
  - Laravel 11+ မှာ `bootstrap/app.php` / middleware configuration  
  စတာတွေမှာ ပြင်ရနိုင်တယ်။

**အကြံပြုအပြုအမူ**

- Login ပြီးပြီးသူ `/login` ပြန်ဝင်ရင် `/admin` သို့ ပို့ရမယ်။
- သို့မဟုတ် `intended()` ကို သုံးရမယ်။

**ထည့်ရေးသင့်တာ**

```md
`guest` middleware ကို သုံးတဲ့အခါ —
- မဝင်ရသေးသူသာ `/login` ကို ဝင်ခွင့်ရမယ်
- ဝင်ပြီးသူဆိုရင် `/admin` (သို့မဟုတ် `intended`) ကို ပို့ရမယ်
```

---

## 4.4 `admin` authorization middleware

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `auth` က “ဝင်ပြီးပြီ” ဆိုတာပဲ သိတယ်။
- “ဒီသူက ဘာလုပ်ခွင့်ရှိလဲ” ဆိုတာ မသိဘူး။
- မှတ်ပုံတင်ထားသူတိုင်း `/admin` ဝင်နိုင်နေရင် မလုံခြုံဘူး။

**ထည့်သင့်တဲ့အချက်များ**

1. `users` table ထဲမှာ `is_admin` boolean ထည့်မယ်
2. `EnsureUserIsAdmin` middleware ဖန်တီးမယ်
3. `admin` alias အနေနဲ့ register လုပ်မယ်
4. Admin route group မှာ `auth, admin` နှစ်ခုလုံး သုံးမယ်

**ဥပမာ**

```php
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // admin routes
    });
```

**Middleware logic**

```php
if (!$request->user()) {
    return redirect()->route('login');
}

if (!$request->user()->is_admin) {
    abort(403);
}
```

**ထည့်ရေးသင့်တာ**

```md
Authentication ≠ Authorization
ဝင်လို့ရတယ်ဆိုတာနဲ့ “အလုပ်လုပ်ခွင့်ရှိတယ်” ဆိုတာ မတူဘူး။
ဒါကြောင့် `admin` middleware ထည့်ရမယ်။
```

---

## 4.5 Login rate limiting / brute-force protection

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `/login` ကို ကြိမ်ဖန်များစွာ စမ်းဝင်ခွင့်ပေးရင် **brute-force attack** ဖြစ်နိုင်တယ်။
- မရှိမဖြစ် လုံခြုံရေးအပိုင်း။

**ဘာလုပ်သင့်လဲ?**

- `POST /login` မှာ `throttle` ထည့်နိုင်တယ်။

```php
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('login.store');
```

ဒါက ရိုးရိုးနည်းပါ။  
ပိုကောင်းတာက `RateLimiter` သုံးပြီး —

- ၅ ကြိမ် မအောင်မြင်ရင် ၁ မိနစ်စောင့်
- `email` + IP အပေါ်မူတည်ပြီး count လုပ်
- lockout message ပြန်ပေး

**ထည့်ရေးသင့်တာ**

```md
`POST /login` မှာ `throttle` သို့မဟုတ် `RateLimiter` ထည့်ရမယ်။
```

---

## 4.6 Logout form ကို `POST` + `@csrf` နဲ့ သုံးဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `logout` က state-changing action ဖြစ်တယ်။
- `GET` နဲ့ မလုပ်သင့်ဘူး။
- `POST` နဲ့ လုပ်ရင် `@csrf` လိုတယ်။
- `route('admin.logout')` နဲ့ route name ကိုက်ရမယ်။

**ထည့်ရေးသင့်တဲ့အချက်**

```blade
<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
```

**ဘာကြောင့် `route('logout')` မဟုတ်တာလဲ?**

- မူရင်း route group က —

```php
->prefix('admin')->name('admin.')
```

ဒါကြောင့် `Route::post('/logout', ...)->name('logout')` ဆိုရင်  
**အပြည့်အစုံက `admin.logout`** ဖြစ်သွားတယ်။

ဒါကြောင့် `route('logout')` လို့ သုံးရင် **`Route [logout] not defined`** ဖြစ်နိုင်တယ်။

---

## 4.7 Public portfolio routes ကို သီးခြားခွဲဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `/` ကို `/admin` ကို ပို့နေရင် **portfolio site** မဖြစ်ဘူး။
- Public visitor တွေအတွက် —
  - home
  - about
  - services
  - projects
  - contact  
  စတာတွေ ရှိရမယ်။

**ထည့်သင့်တဲ့အချက်**

```php
Route::view('/', 'public.home')->name('home');
Route::view('/about', 'public.about')->name('about');
Route::get('/projects', [PublicProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [PublicProjectController::class, 'show'])->name('projects.show');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
```

**ဘာကြောင့်အရေးကြီးလဲ?**

- `/` = ဖောက်သည်/အလုပ်ရှင်တွေ မြင်ရမယ့်နေရာ
- `/admin` = ကိုယ်တိုင် ထိန်းချုပ်ရမယ့်နေရာ
- ဒါနှစ်ခုကို မရောရ

**ထည့်ရေးသင့်တာ**

```md
Public route နဲ့ Admin route ကို တိတိကျကျ ခွဲရမယ်။
`/` ကို `/admin` ကို မပို့ရ။
```

---

## 4.8 `is_published` / `published_at` / `slug` fields

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- Portfolio site မှာ “ပြချင်မှ ပြ” ဆိုတာ လိုတယ်။
- `is_published` မပါရင် မပြီးသေးတဲ့အလုပ်တွေ ပေါ်သွားနိုင်တယ်။
- `slug` မပါရင် `/projects/1` လိုမျိုး မလှတဲ့လင့်ခ်တွေ ဖြစ်မယ်။
- `published_at` ပါရင် အချိန်အလိုက် ထုတ်ပြန်လို့ရမယ်။

**ဥပမာ**

`projects`

```php
$table->id();
$table->string('title');
$table->string('slug')->unique();
$table->text('description')->nullable();
$table->boolean('is_published')->default(false);
$table->timestamp('published_at')->nullable();
$table->timestamps();
```

Model scope —

```php
public function scopePublished($query)
{
    return $query->where('is_published', true);
}
```

Public query —

```php
Project::published()->latest()->get();
```

Admin query —

```php
Project::latest()->paginate(10);
```

**ထည့်ရေးသင့်တာ**

```md
- `is_published` နဲ့ ထိန်းမယ်
- `slug` နဲ့ လှတဲ့လင့်ခ်တွေ သုံးမယ်
- `published_at` နဲ့ အချိန်အလိုက် ထုတ်ပြန်လို့ရအောင် ထည့်မယ်
```

---

## 4.9 CRUD validation ကို `FormRequest` နဲ့ ခွဲဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `store()`/`update()` ထဲမှာ `validate()` တိုက်ရိုက်ထည့်လို့ရတယ်။
- ဒါပေမယ့် **FormRequest** က —
  - controller ကို ပိုပါးစေတယ်
  - `authorize()` ထည့်လို့ရတယ်
  - rules ကို သီးခြားစီမံလို့ရတယ်
  - test ရေးရလွယ်တယ်

**ထည့်သင့်တဲ့အချက်**

```bash
php artisan make:request StoreCategoryRequest
php artisan make:request UpdateCategoryRequest
```

**Rules ဥပမာ**

```php
'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
'description' => ['nullable', 'string'],
'is_active' => ['boolean'],
```

Update မှာ —

```php
'name' => [
    'required',
    'string',
    'max:255',
    Rule::unique('categories')->ignore($category),
],
```

**ထည့်ရေးသင့်တာ**

```md
- `store` နဲ့ `update` မှာ `FormRequest` သုံးရမယ်
- `unique` validation ထည့်ရမယ်
- `boolean`, `nullable`, `max` စတာတွေ သတ်မှတ်ရမယ်
```

---

## 4.10 `unique` constraints ကို **database level** မှာ ထည့်ဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `unique:categories,name` ကို **application level** မှာ စစ်လို့ရတယ်။
- ဒါပေမယ့် **database level** မှာ `unique()` မထည့်ထားရင် —
  - တစ်ချိန်ထဲမှာ နှစ်ယောက် တူညီတဲ့နာမည် ထည့်နိုင်တယ်
  - data integrity မလုံခြုံဘူး

**ထည့်သင့်တဲ့အချက်**

```php
$table->string('name')->unique();
$table->string('slug')->unique();
```

**ဘာကြောင့်အရေးကြီးလဲ?**

- `slug` တူရင် `/projects/{slug}` မှာ ပြဿနာတက်မယ်
- category name တူရင် စာရင်းမှာ ရှုပ်ထွေးမယ်

---

## 4.11 `flash messages` + `old()` + error styling

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- CRUD လုပ်ပြီးရင် “အောင်မြင်တယ်/မအောင်မြင်ဘူး” ပြန်ပြောသင့်တယ်။
- Form မှားပြီး ပြန်ပြင်တဲ့အခါ ထည့်ထားတဲ့စာသားတွေ မပျောက်သင့်ဘူး။
- `old()` မသုံးရင် မှားတဲ့ input တွေ ပျောက်သွားမယ်။

**ထည့်သင့်တဲ့အချက်များ**

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

`old()` ဥပမာ —

```blade
<input type="text"
       name="name"
       class="form-control @error('name') is-invalid @enderror"
       value="{{ old('name', $category->name ?? '') }}">
```

**ထည့်ရေးသင့်တာ**

```md
- CRUD လုပ်ပြီးရင် `session('success')` / `session('error')` ပြန်ပြရမယ်
- `old()` နဲ့ input တွေ ပြန်ဖြည့်ပေးရမယ်
- `@error()` နဲ့ validation error ပြရမယ်
```

---

## 4.12 `pagination` နဲ့ Bootstrap 5 compatibility

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- Laravel ရဲ့ **default pagination views** က **Tailwind CSS** အပေါ် အခြေခံထားတယ်။
- ကိုယ်က **Bootstrap 5** သုံးနေရင် —
  - `pagination` class တွေ မတူဘူး
  - စာမျက်နှာတွေ မလှဘူး
  - `nav-link`, `page-item` စတာတွေ မမှန်ဘူး

**ဘာလုပ်သင့်လဲ?**

- `pagination` view ကို publish/custom လုပ်ရမယ်။
- သို့မဟုတ် `links()` ကို custom view နဲ့ ခေါ်ရမယ်။

**ဥပမာ**

```blade
{{ $categories->links('pagination.bootstrap-5') }}
```

ဒါမှမဟုတ် —

```blade
{{ $categories->links() }}
```

ဆိုပြီး ကိုယ်ပိုင် `pagination.blade.php` ကို ပြင်ထားရမယ်။

**ထည့်ရေးသင့်တာ**

```md
- Laravel default pagination ကို သတိထားရမယ်
- Bootstrap 5 သုံးနေရင် custom pagination view ထည့်ရမယ်
```

---

## 4.13 `search` / `filter` / `sort` ထည့်ဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- အလုပ်လုပ်တဲ့အခါ —
  - “ဒီစာကြောင်းကို ရှာချင်တယ်”
  - “ဒီအမျိုးအစားကို ပြချင်တယ်”
  - “ဒီအချိန်အလိုက် စီချင်တယ်”  
  ဆိုတာ လိုတယ်။

**ဘာလုပ်သင့်လဲ?**

- `?search=` query string
- `?status=active`
- `?sort=latest`

**ဥပမာ**

```php
$query = Category::query();

if ($request->filled('search')) {
    $query->where('name', 'like', '%'.$request->search.'%');
}

$categories = $query->latest()->paginate(10)->withQueryString();
```

**ဘာကြောင့် `withQueryString()` လိုတာလဲ?**

- `?search=abc` နဲ့ စာမျက်နှာ ၂ ကို သွားရင် —
  - `search` parameter ပျောက်သွားနိုင်တယ်
- `withQueryString()` က query string ကို pagination link ထဲမှာ ထည့်ပေးတယ်

**ထည့်ရေးသင့်တာ**

```md
- `index()` မှာ `search`, `filter`, `sort` ထည့်နိုင်အောင် ရေးမယ်
- `paginate()` နဲ့ `withQueryString()` သုံးမယ်
```

---

## 4.14 `403`, `404`, `500` စတဲ့ **custom error pages**

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- မလုံခြုံတဲ့သူ `/admin` ကို ဝင်ကြိုးစားရင် —
  - ဘာပြမလဲ?
- မရှိတဲ့ `/projects/xyz` ကို ဖွင့်ရင် —
  - ဘာပြမလဲ?
- ထိန်းချုပ်ထားတဲ့ **user-friendly error page** ရှိသင့်တယ်။

**ဘာလုပ်သင့်လဲ?**

- `resources/views/errors/403.blade.php`
- `resources/views/errors/404.blade.php`
- `resources/views/errors/500.blade.php`

**ထည့်ရေးသင့်တာ**

```md
- `403`, `404`, `500` အတွက် ကိုယ်ပိုင် `errors` view ထည့်ရမယ်
- `abort(403)` ကို သုံးရင် ဘာပြမလဲဆိုတာ ထိန်းရမယ်
```

---

## 4.15 `storage:link` နဲ့ `file upload` handling

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- Portfolio မှာ —
  - `featured_image`
  - gallery
  - service icon
  - blog cover  
  စတာတွေ ပါလာနိုင်တယ်။
- `storage:link` မလုပ်ထားရင် `public/storage` ကို ဝင်မရနိုင်ဘူး။
- Upload လုပ်မယ်ဆိုရင် —
  - `image` validation
  - `mimes` validation
  - `max` size
  - `store('projects', 'public')`  
  စတာတွေ လိုတယ်။

**ဘာလုပ်သင့်လဲ?**

```php
'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
```

Controller —

```php
$path = $request->file('featured_image')->store('projects', 'public');
```

Blade —

```blade
<img src="{{ asset('storage/'.$project->featured_image) }}">
```

Terminal —

```bash
php artisan storage:link
```

**ထည့်ရေးသင့်တာ**

```md
- `featured_image` / `gallery` အတွက် `file upload` handling ထည့်ရမယ်
- `storage:link` လုပ်ရမယ်
- `image` validation ထည့်ရမယ်
```

---

## 4.16 `FormRequest` ထဲမှာ `authorize()` နဲ့ permission ထိန်းဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `FormRequest` က `validation` အတွက်သာမက —
  - “ဒီ user က ဒါလုပ်ခွင့်ရှိလား?”  
  ဆိုတာလည်း ထိန်းလို့ရတယ်။

**ဥပမာ**

```php
public function authorize(): bool
{
    return $this->user()?->is_admin ?? false;
}
```

ဒါဆိုရင် —

- `auth` middleware ကနေ ဖြတ်ပြီးသားဖြစ်ပေမယ့်
- `FormRequest` ထဲမှာ ထပ်စစ်လို့ရသေးတယ်

**ထည့်ရေးသင့်တာ**

```md
- `authorize()` ကို `return true` တစ်ခုတည်းနဲ့ မထားသင့်ဘူး
- `is_admin` / `Gate` / `Policy` နဲ့ ချိတ်ရမယ်
```

---

# 5. Should Add — ထည့်ရင် ပိုကောင်းတာများ

## 5.1 Git / branch / commit strategy

**ဘာကြောင့်ထည့်သင့်လဲ?**

- “အလုပ်လုပ်တယ်” ဆိုတာကို **တစ်ဆင့်ချင်း** မှတ်တမ်းတင်ရမယ်။
- `route` ပြင်ပြီးရင် `route list` စစ်ရမယ်။
- `git` သုံးရင် —
  - ပျက်ရင် ပြန်လွယ်တယ်
  - “ဘယ်အချိန်မှာ ဘာပြင်တာလဲ” သိနိုင်တယ်

**ထည့်သင့်တဲ့အချက်**

```bash
git init
git add .
git commit -m "Initial Laravel setup"
git checkout -b feature/admin-auth
```

**Commit examples**

```bash
git commit -m "Fix login controller method names"
git commit -m "Add admin middleware"
git commit -m "Add category CRUD"
git commit -m "Add published scope for projects"
```

---

## 5.2 `php artisan route:list` ကို မကြာခဏ သုံးဖို့

**ဘာကြောင့်ထည့်သင့်လဲ?**

- `route` နဲ့ `controller` မကိုက်တာကို **အမြန်ဆုံး** ရှာလို့ရတယ်။
- `admin.*` route တွေ ရှိ/မရှိ စစ်လို့ရတယ်။
- `login` route name မှားတာကို ရှာလို့ရတယ်။

**အသုံးဝင်ပုံ**

```bash
php artisan route:list
```

```bash
php artisan route:list --path=login
```

```bash
php artisan route:list --name=admin
```

---

## 5.3 `optimize:clear` နဲ့ cache ပြဿနာရှင်းဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `route:list` မှာ အဟောင်းတွေ ကျန်နေနိုင်တယ်။
- `config` cache ကြောင့် `.env` ပြင်တာ အလုပ်မလုပ်နိုင်ဘူး။
- `view` cache ကြောင့် ပြင်ထားတဲ့အတိုင်း မပေါ်နိုင်ဘူး။

**သုံးရမယ့်အချိန်**

- `route` ပြင်ပေမယ့် မပေါ်ဘူး
- `.env` ပြင်ပေမယ့် မအလုပ်လုပ်ဘူး
- `view` ပြင်ပေမယ့် မပြောင်းဘူး

**အသုံးဝင်ပုံ**

```bash
php artisan optimize:clear
```

---

## 5.4 `APP_DEBUG` နဲ့ `APP_ENV` ကို သီးခြားထိန်းဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `APP_DEBUG=true` က **လုံခြုံရေးအတွက် အန္တရာယ်ရှိတယ်**။
- `APP_ENV=local` နဲ့ `production` ကို မရောရ။
- `production` မှာ —
  - `APP_DEBUG=false`
  - `APP_ENV=production`
  - `SESSION_COOKIE_SECURE=true`
  - `SESSION_COOKIE_HTTPONLY=true`

**ထည့်ရေးသင့်တာ**

```md
- `local` နဲ့ `production` မှာ `.env` တူရန်မလိုဘူး
- `APP_DEBUG` ကို `true` မထားရ
```

---

## 5.5 `SESSION_DRIVER` နဲ့ `SESSION_COOKIE_SECURE`

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `SESSION_DRIVER` က `file` ဖြစ်နေရင် —
  - တစ်ချို့အခြေအနေမှာ ပြဿနာရှိနိုင်တယ်
- `database` သို့မဟုတ် `redis` က ပိုကောင်းတယ်
- HTTPS သုံးတဲ့အခါ `SESSION_COOKIE_SECURE=true` ဖြစ်သင့်တယ်

**ဥပမာ**

```env
SESSION_DRIVER=database
SESSION_COOKIE_SECURE=true
SESSION_COOKIE_HTTPONLY=true
```

---

## 5.6 `remember me` ကို ထိန်းဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `remember` ကို သုံးမယ်ဆိုရင် —
  - `remember_token` column လိုတယ်
  - `users` table ထဲမှာ `remember_token` ရှိရမယ်
- မရှိရင် `remember` အလုပ်မလုပ်နိုင်ဘူး။

**ဘာလုပ်သင့်လဲ?**

- `users` migration ထဲမှာ —

```php
$table->rememberToken();
```

ဆိုတာ ပါရမယ်။

---

## 5.7 `password` policy

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `password` ကို `required` တစ်ခုတည်းနဲ့ မလုံလောက်ဘူး။
- အနည်းဆုံး —
  - ၈ လုံး
  - စာလုံး + ဂဏန်း
  - သင့်တော်တဲ့အားကောင်းမှု

**ဥပမာ**

```php
use Illuminate\Validation\Rules\Password;

'password' => ['required', Password::min(8)->letters()->numbers()],
```

**ထည့်ရေးသင့်တာ**

```md
- `password` ကို `required` တစ်ခုတည်းနဲ့ မထားရ
- `Password::min()` သုံးသင့်တယ်
```

---

## 5.8 `admin` account အတွက် `change password` feature

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `password` ကို seed ထဲမှာ မချန်ထားသင့်ဘူး။
- `admin` ကိုယ်တိုင် ပြောင်းနိုင်ရမယ်။
- မလုံခြုံတဲ့အကောင့်ကို မသုံးသင့်ဘူး။

**ထည့်ရေးသင့်တာ**

```md
- `admin` အတွက် “ပြောင်းလဲရန်” စာမျက်နှာ ထည့်ရမယ်
- `password` ကို `Hash::make()` နဲ့ သိမ်းရမယ်
```

---

## 5.9 `published` scope ကို **တစ်နေရာထဲ** သုံးဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `where('is_published', true)` ကို **တိုင်းမှာ** ထပ်ရေးနေရင် —
  - ပြင်ရခက်တယ်
  - မှားနိုင်တယ်
  - `published` logic ကို ထိန်းရခက်တယ်

**ဘာလုပ်သင့်လဲ?**

```php
public function scopePublished($query)
{
    return $query->where('is_published', true);
}
```

Public controller —

```php
Project::published()->latest()->get();
```

Admin controller —

```php
Project::latest()->paginate(10);
```

---

## 5.10 `route model binding` နဲ့ `slug` routing

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `id` နဲ့ မဟုတ်ဘဲ `slug` နဲ့ ပြချင်ရင် —

```php
public function getRouteKeyName()
{
    return 'slug';
}
```

သို့မဟုတ် —

```php
Route::get('/projects/{project:slug}', ...);
```

**ဘာကြောင့်အသုံးဝင်လဲ?**

- `/projects/1` ထက် `/projects/my-awesome-project` က ပိုကောင်းတယ်
- `404` ကို ထိန်းရလွယ်တယ်
- `published()` scope နဲ့ ချိတ်လို့ရတယ်

---

## 5.11 `SEO fields` နဲ့ `meta` tags

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `title`, `meta_description` မပါရင် —
  - search engine မှာ မကောင်းဘူး
  - `og:image` မပါရင် မျှဝေတဲ့အခါ မလှဘူး

**ထည့်သင့်တဲ့အချက်**

`projects`

```php
$table->string('meta_title')->nullable();
$table->string('meta_description')->nullable();
```

Blade —

```blade
<title>{{ $project->meta_title ?? $project->title }}</title>
<meta name="description" content="{{ $project->meta_description }}">
```

---

## 5.12 `contact form` မှာ `rate limit` + `honeypot`

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `contact` ကို **မထိန်းဘဲ** ခွင့်ပြုရင် —
  - ဘော့တ်တွေက အကြိမ်ရေများစွာ ပို့နိုင်တယ်
  - `email` စပမ် ဖြစ်နိုင်တယ်
  - `database` ထဲမှာ အပိုတွေ ဝင်နိုင်တယ်

**ဘာလုပ်သင့်လဲ?**

- `throttle:contact` သုံးမယ်
- `honeypot` field ထည့်မယ်
- `email` validation ထည့်မယ်

**ဥပမာ**

```blade
<input type="text" name="website" class="d-none" tabindex="-1" autocomplete="off">
```

```php
'website' => ['prohibited'],
```

---

## 5.13 `activity log` / `audit log`

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- ဘယ်သူက ဘာပြင်တာလဲ သိချင်ရင် —
  - `created_by`
  - `updated_by`
  - `activity_logs` table  
  စတာတွေ ထည့်နိုင်တယ်။

**ဘာလုပ်သင့်လဲ?**

- `spatie/laravel-activitylog` သုံးနိုင်တယ်
- သို့မဟုတ် ကိုယ်တိုင် `activity_logs` table ဆောက်နိုင်တယ်

**ထည့်ရေးသင့်တာ**

```md
- `created_by`, `updated_by` ထည့်နိုင်တယ်
- `activity log` ထည့်နိုင်တယ်
```

---

## 5.14 `soft delete` ထည့်ဖို့

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- မတော်တဆ `delete` လုပ်မိရင် ပြန်ယူလို့ရမယ်။
- `deleted_at` နဲ့ ထိန်းလို့ရတယ်။

**ထည့်သင့်တဲ့အချက်**

```php
$table->softDeletes();
```

Model —

```php
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
}
```

---

## 5.15 `model casts` နဲ့ boolean/date handling

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `is_published` ကို `1`/`0` အနေနဲ့ မဟုတ်ဘဲ `true`/`false` အနေနဲ့ သုံးချင်ရင် —

```php
protected $casts = [
    'is_published' => 'boolean',
    'published_at' => 'datetime',
];
```

**ဘာကြောင့်အသုံးဝင်လဲ?**

- `if ($project->is_published)` လိုမျိုး သုံးလို့ရတယ်
- `published_at->format()` လိုမျိုး သုံးလို့ရတယ်

---

# 6. Nice to Have — ထည့်ရင် ပိုကောင်းတဲ့အဆင့်မြင့်အပိုင်းများ

## 6.1 `Pest` / `PHPUnit` feature tests

**ဘာကြောင့်ထည့်သင့်လဲ?**

- `route` နဲ့ `controller` မကိုက်တာကို **အလိုအလျောက်** စစ်လို့ရတယ်။
- `guest` မဝင်ရသေးတဲ့အခါ `/admin` မရောက်သင့်ဘူးဆိုတာ စစ်လို့ရတယ်။
- `admin` မဟုတ်ရင် `403` ပြသင့်တယ်ဆိုတာ စစ်လို့ရတယ်။

**ထည့်ရေးသင့်တာ**

```md
- `php artisan test` နဲ့ စစ်နိုင်အောင် `feature tests` ထည့်ရမယ်
- `guest`, `user`, `admin` အဆင့်သုံးမျိုးနဲ့ စစ်ရမယ်
```

---

## 6.2 `Pest` နဲ့ testing ကို ပိုလွယ်အောင် လုပ်ဖို့

**ဘာကြောင့်ထည့်သင့်လဲ?**

- `Pest` က `PHPUnit` ထက် ရေးရလွယ်တယ်။
- `it()` syntax နဲ့ ရေးလို့ရတယ်။
- `feature` test တွေကို ပိုမြန်မြန်ရေးနိုင်တယ်။

**ထည့်ရေးသင့်တာ**

```md
- `Pest` သုံးရင် `feature tests` ရေးရလွယ်တယ်
- `guest`, `admin`, `user` အတွက် `it()` တွေ ရေးနိုင်တယ်
```

---

## 6.3 `PHPStan` / `Larastan` နဲ့ static analysis

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `create()` နေရာမှာ `creat()` လိုမျိုး မှားတာကို **အလိုအလျောက်** ရှာလို့ရတယ်။
- `Route::get('/login', [LoginController::class, 'creat'])` လိုမျိုး မှားတာကို **အလိုအလျောက်** ရှာလို့ရတယ်။
- `undefined method` တွေကို **အလိုအလျောက်** ရှာလို့ရတယ်။

**ထည့်ရေးသင့်တာ**

```md
- `PHPStan` / `Larastan` သုံးရင် “မရှိတဲ့ method ကို ခေါ်မိတာ” ကို စောစောစီးစီး တွေ့နိုင်တယ်
```

---

## 6.4 `Laravel Pint` နဲ့ code style

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `code style` ကို တူညီအောင် ထိန်းလို့ရတယ်။
- `spaces`, `alignment`, `braces` စတာတွေကို အလိုအလျောက် ပြင်လို့ရတယ်။

**ထည့်ရေးသင့်တာ**

```md
- `Laravel Pint` သုံးရင် `code style` ကို တူညီအောင် ထိန်းလို့ရတယ်
```

---

## 6.5 `CI/CD` (GitHub Actions)

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `git push` တိုင်းမှာ —
  - `php artisan test`
  - `phpstan analyse`
  - `npm run build`  
  စတာတွေကို အလိုအလျောက် လုပ်လို့ရတယ်။

**ထည့်ရေးသင့်တာ**

```md
- `CI/CD` ထည့်ရင် “ကိုယ့်စက်မှာ အလုပ်လုပ်တယ်” ဆိုတာထက် 
  “ဘယ်နေရာမှာမဆို အလုပ်လုပ်တယ်” ဆိုတာ သက်သေပြလို့ရတယ်
```

---

## 6.6 `Docker` / `WSL2` environment notes

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `DB_HOST=127.0.0.1` က Docker ထဲမှာ မမှန်နိုင်ဘူး။
- `DB_HOST=mysql` လိုမျိုး ဖြစ်နိုင်တယ်။
- `WSL2` မှာ file permission / performance ပြဿနာ ရှိနိုင်တယ်။
- `Docker` မှာ `php artisan serve` ကို `0.0.0.0:8000` နဲ့ ဖွင့်ရနိုင်တယ်။

**ထည့်ရေးသင့်တာ**

```md
- Docker သုံးရင် `DB_HOST=127.0.0.1` မဟုတ်ဘဲ `DB_HOST=mysql` ဖြစ်နိုင်တယ်
- WSL2 သုံးရင် `file permission` / `performance` ကို သတိထားရမယ်
```

---

## 6.7 `API` နဲ့ `Sanctum` အတွက် အနာဂတ်ပြင်ဆင်မှု

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- အနာဂတ်မှာ —
  - React frontend
  - Next.js
  - mobile app  
  စတာတွေ ချိတ်ချင်ရင် `API` လိုတယ်။

**ထည့်ရေးသင့်တာ**

```md
- အနာဂတ်မှာ `React` / `Next.js` နဲ့ ချိတ်ချင်ရင် 
  `API routes` + `Sanctum` + `API Resources` ကို ထည့်နိုင်တယ်
```

---

## 6.8 `Queue` နဲ့ `email notification`

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `contact form` က `email` ပို့မယ်ဆိုရင် —
  - `queue` သုံးရင် ပိုမြန်တယ်
  - `email` ပို့တာ `background` မှာ လုပ်လို့ရတယ်

**ထည့်ရေးသင့်တာ**

```md
- `contact form` မှာ `email` ပို့မယ်ဆိုရင် `queue` ထည့်သုံးသင့်တယ်
```

---

## 6.9 `sitemap.xml` နဲ့ `robots.txt`

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `sitemap.xml` က search engine ကို ကူညီတယ်။
- `robots.txt` က ဘယ်နေရာကို မသိမ်းစေချင်လဲ ထိန်းလို့ရတယ်။

**ထည့်ရေးသင့်တာ**

```md
- `/sitemap.xml` ထည့်ရမယ်
- `/robots.txt` ထည့်ရမယ်
```

---

## 6.10 `backup` နဲ့ `monitoring`

**ဘာကြောင့်ထပ်ထည့်သင့်လဲ?**

- `database` ပျက်ရင် ပြန်ယူလို့ရမယ်။
- `storage` ပျက်ရင် ပြန်ယူလို့ရမယ်။
- `error` တွေကို သိနိုင်အောင် `monitoring` ထည့်သင့်တယ်။

**ထည့်ရေးသင့်တာ**

```md
- `database` backup ထည့်ရမယ်
- `storage` backup ထည့်ရမယ်
- `error` တွေကို `log` ထဲမှာ ကြည့်နိုင်အောင် ထည့်ရမယ်
```

---

# 7. မူရင်း Guide ထဲက “အရေးကြီးဆုံး ပြင်ရမယ့်အချက်များ”

## 7.1 ပြင်ရမယ့်အချက် #1 — `Route::redirect('/', '/admin')` ကို ဖျက်ရမယ်

**ဘာကြောင့်?**

- `/` က **အများကြည့်လို့ရတဲ့ နေရာ** ဖြစ်သင့်တယ်။
- `/admin` က **ထိန်းချုပ်လို့ရတဲ့ နေရာ** ဖြစ်သင့်တယ်။

**ဘာလုပ်ရမလဲ?**

```php
Route::view('/', 'public.home')->name('home');
```

```php
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
```

---

## 7.2 ပြင်ရမယ့်အချက် #2 — `auth` middleware တစ်ခုတည်း မသုံးရ

**ဘာကြောင့်?**

- `auth` က “ဝင်ပြီးပြီ” ဆိုတာပဲ သိတယ်။
- “ဘာလုပ်ခွင့်ရှိလဲ” ဆိုတာ မသိဘူး။

**ဘာလုပ်ရမလဲ?**

```php
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // admin routes
    });
```

---

## 7.3 ပြင်ရမယ့်အချက် #3 — `logout` ကို `route('logout')` နဲ့ မခေါ်ရ

**ဘာကြောင့်?**

- `admin` prefix နဲ့ `name('admin.')` သုံးထားရင် —
  - `logout` route name က `admin.logout` ဖြစ်သွားတယ်
- `route('logout')` လို့ သုံးရင် `Route [logout] not defined` ဖြစ်နိုင်တယ်

**ဘာလုပ်ရမလဲ?**

```blade
<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
```

---

## 7.4 ပြင်ရမယ့်အချက် #4 — `create`/`creat` နဲ့ `destroy`/`destory` ကို တိကျစွာ စစ်ရမယ်

**ဘာကြောင့်?**

- `route` က `create()` ကို ခေါ်မယ်
- `controller` ထဲမှာ `creat()` ဆိုရင် `method not found` ဖြစ်မယ်

**ဘာလုပ်ရမလဲ?**

```php
public function create()
```

```php
public function destroy(Request $request)
```

---

## 7.5 ပြင်ရမယ့်အချက် #5 — `throttle` ထည့်ရမယ်

**ဘာကြောင့်?**

- `POST /login` ကို ကြိမ်ဖန်များစွာ စမ်းဝင်ခွင့်ပေးရင် **brute-force** ဖြစ်နိုင်တယ်

**ဘာလုပ်ရမလဲ?**

```php
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('login.store');
```

---

## 7.6 ပြင်ရမယ့်အချက် #6 — `published` scope ထည့်ရမယ်

**ဘာကြောင့်?**

- မပြီးသေးတဲ့အလုပ်တွေ ပေါ်သွားနိုင်တယ်
- `where('is_published', true)` ကို တိုင်းမှာ ထပ်ရေးနေရင် ပြင်ရခက်တယ်

**ဘာလုပ်ရမလဲ?**

```php
public function scopePublished($query)
{
    return $query->where('is_published', true);
}
```

---

## 7.7 ပြင်ရမယ့်အချက် #7 — `unique` constraint ထည့်ရမယ်

**ဘာကြောင့်?**

- `slug` တူရင် `/projects/{slug}` မှာ ပြဿနာတက်မယ်
- `name` တူရင် စာရင်းမှာ ရှုပ်ထွေးမယ်

**ဘာလုပ်ရမလဲ?**

```php
$table->string('name')->unique();
$table->string('slug')->unique();
```

---

# 8. Fact-check အရ “မထည့်သင့်တာများ”

## 8.1 `jquery` ကို မလိုအပ်ဘဲ မထည့်ရ

**ဘာကြောင့်?**

- အကယ်၍ သုံးတာက **အမှန်တကယ်** `AdminLTE 4` ဖြစ်ရင် `jquery` မလိုဘူး။
- `jquery` ထည့်ရင် —
  - duplicate script
  - event binding ပြဿနာ
  - bundle size ကြီးတာ  
  ဖြစ်နိုင်တယ်။

**ထည့်ရေးသင့်တာ**

```md
- မလိုအပ်ဘဲ `jquery` မထည့်ရ
- `admin-lte@4` ကို သုံးနေရင် `jquery` မလိုဘူး
```

---

## 8.2 `GET` နဲ့ delete မလုပ်ရ

**ဘာကြောင့်?**

- `GET` က read-only action အတွက်
- `delete` က state-changing action
- `GET` နဲ့ ဖျက်ရင် မတော်တဆ ဖျက်မိနိုင်တယ်

**ထည့်ရေးသင့်တာ**

```md
- `GET` နဲ့ `delete` မလုပ်ရ
- `@method('DELETE')` ပါတဲ့ `form` နဲ့ပဲ ဖျက်ရမယ်
```

---

## 8.3 `route('logout')` ကို မသုံးရ

**ဘာကြောင့်?**

- `admin.logout` နဲ့ `logout` က မတူဘူး
- `route('logout')` က `Route [logout] not defined` ဖြစ်နိုင်တယ်

**ထည့်ရေးသင့်တာ**

```md
- `logout` ကို `route('admin.logout')` နဲ့ ခေါ်ရမယ်
```

---

## 8.4 `is_admin` မပါဘဲ “ဝင်ပြီးသူတိုင်း admin” လို့ မသတ်မှတ်ရ

**ဘာကြောင့်?**

- `auth` middleware က “ဝင်ပြီးပြီ” ဆိုတာပဲ သိတယ်
- “ဘာလုပ်ခွင့်ရှိလဲ” ဆိုတာ မသိဘူး

**ထည့်ရေးသင့်တာ**

```md
- `auth` middleware တစ်ခုတည်းနဲ့ မလုံလောက်ဘူး
- `is_admin` / `Gate` / `Policy` ထည့်ရမယ်
```

---

# 9. “ဘာထပ်ထည့်သင့်လဲ?” — အကျဉ်းချုပ်စာရင်း

## 9.1 မဖြစ်မနေ ထည့်ရမယ်

| အမှတ် | အကြောင်းအရာ | အကြောင်းရင်း |
|---|---|---|
| 1 | `version compatibility check` | Laravel/AdminLTE version ပြောင်းနိုင်တယ် |
| 2 | `admin` middleware | `auth` တစ်ခုတည်းနဲ့ မလုံလောက်ဘူး |
| 3 | `rate limiting` | brute-force ကာကွယ်ဖို့ |
| 4 | `guest redirect` | login ပြီးသူ `/login` မရောက်စေဖို့ |
| 5 | `public routes` | `/` ကို `/admin` မပို့သင့်ဘူး |
| 6 | `is_published` / `slug` | portfolio content ထိန်းဖို့ |
| 7 | `FormRequest` | validation ကို သန့်ရှင်းအောင် ထိန်းဖို့ |
| 8 | `unique` constraint | data integrity ကာကွယ်ဖို့ |
| 9 | `flash messages` | CRUD အောင်မြင်/မအောင်မြင် ပြန်ပြဖို့ |
| 10 | `old()` + `@error()` | form error ပြန်ပြင်ရလွယ်အောင် |
| 11 | `pagination` custom view | Bootstrap 5 နဲ့ ကိုက်ညီအောင် |
| 12 | `search` / `filter` | အလုပ်လုပ်တဲ့အခါ လိုအပ်လာမယ် |
| 13 | `403`, `404`, `500` | ထိန်းချုပ်ထားတဲ့ `user-friendly` error ပြဖို့ |
| 14 | `storage:link` | `featured_image` / gallery အတွက် |
| 15 | `file upload validation` | `image` / `mimes` / `max` ထိန်းဖို့ |
| 16 | `authorize()` in `FormRequest` | permission ထိန်းဖို့ |

---

## 9.2 ထည့်ရင် ပိုကောင်းတာများ

| အမှတ် | အကြောင်းအရာ | အကြောင်းရင်း |
|---|---|---|
| 1 | `git` / branch | ပျက်ရင် ပြန်လွယ်အောင် |
| 2 | `php artisan route:list` | `route`/`controller` မကိုက်တာ ရှာဖို့ |
| 3 | `optimize:clear` | `cache` ကြောင့် ပြဿနာရှင်းဖို့ |
| 4 | `APP_DEBUG` / `APP_ENV` | `production` မှာ မလုံခြုံတာ မဖြစ်အောင် |
| 5 | `SESSION_DRIVER` | `database`/`redis` သုံးရင် ပိုကောင်းတယ် |
| 6 | `SESSION_COOKIE_SECURE` | HTTPS မှာ လုံခြုံအောင် |
| 7 | `remember me` | `remember_token` ပါရမယ် |
| 8 | `password policy` | `Password::min()` သုံးသင့်တယ် |
| 9 | `change password` | `admin` ကိုယ်တိုင် ပြောင်းနိုင်ရမယ် |
| 10 | `published()` scope | `where('is_published', true)` ကို တိုင်းမှာ မထပ်ရေးရအောင် |
| 11 | `route model binding` | `slug` နဲ့ routing လုပ်ဖို့ |
| 12 | `SEO fields` | `meta_title`, `meta_description` ထည့်ဖို့ |
| 13 | `contact` rate limit | `spam` ကာကွယ်ဖို့ |
| 14 | `honeypot` | `bot` တွေ မပို့နိုင်အောင် |
| 15 | `activity log` | ဘယ်သူက ဘာပြင်လဲ သိဖို့ |
| 16 | `soft delete` | မတော်တဆ ဖျက်မိရင် ပြန်ယူလို့ရအောင် |
| 17 | `model casts` | `is_published` ကို `boolean` အနေနဲ့ သုံးဖို့ |

---

## 9.3 ထည့်ရင် ပိုကောင်းတဲ့ အဆင့်မြင့်အပိုင်းများ

| အမှတ် | အကြောင်းအရာ | အကြောင်းရင်း |
|---|---|---|
| 1 | `Pest` / `PHPUnit` | “မအလုပ်လုပ်ဘူး” ဖြစ်တာကို အလိုအလျောက် စစ်ဖို့ |
| 2 | `PHPStan` / `Larastan` | `undefined method` တွေကို စောစောစီးစီး တွေ့ဖို့ |
| 3 | `Laravel Pint` | `code style` ကို တူညီအောင် ထိန်းဖို့ |
| 4 | `CI/CD` | `git push` တိုင်းမှာ `test`/`build` အလိုအလျောက် လုပ်ဖို့ |
| 5 | `Docker` / `WSL2` notes | `DB_HOST` / `file permission` ပြဿနာ မဖြစ်အောင် |
| 6 | `API` / `Sanctum` | အနာဂတ်မှာ `React`/`Next.js` နဲ့ ချိတ်ဖို့ |
| 7 | `Queue` | `email` ပို့တာကို `background` မှာ လုပ်ဖို့ |
| 8 | `sitemap.xml` | SEO အတွက် |
| 9 | `robots.txt` | `crawler` ထိန်းချုပ်ဖို့ |
| 10 | `backup` | `database` ပျက်ရင် ပြန်ယူလို့ရအောင် |
| 11 | `monitoring` | `error` တွေကို သိနိုင်အောင် |

---

# 10. “ဘာတွေ ထပ်ထည့်သင့်လဲ?” — နောက်ဆုံးအကြံပြုချက်

ဒီဂိုက်ကို **အမှန်တကယ် အလုပ်လုပ်တဲ့** + **လုံခြုံတဲ့** + **portfolio-ready** ဖြစ်အောင် လုပ်ချင်ရင် အောက်ပါအတိုင်း **အနည်းဆုံး** ထည့်ရမယ်။

## 10.1 အနည်းဆုံး ထည့်ရမယ့်အချက်များ

1. **`version compatibility check`**
2. **`admin` middleware**
3. **`rate limiting`**
4. **`guest redirect`**
5. **`public routes`**
6. **`is_published` / `slug`**
7. **`FormRequest`**
8. **`unique` constraint**
9. **`flash messages`**
10. **`old()` + `@error()`**
11. **`pagination` custom view**
12. **`search` / `filter`**
13. **`403`, `404`, `500`**
14. **`storage:link`**
15. **`file upload validation`**
16. **`authorize()` in `FormRequest`**

---

## 10.2 ထည့်ရင် ပိုကောင်းတဲ့အချက်များ

1. `git` / branch
2. `php artisan route:list`
3. `optimize:clear`
4. `APP_DEBUG` / `APP_ENV`
5. `SESSION_DRIVER`
6. `SESSION_COOKIE_SECURE`
7. `remember me`
8. `password policy`
9. `change password`
10. `published()` scope
11. `route model binding`
12. `SEO fields`
13. `contact` rate limit
14. `honeypot`
15. `activity log`
16. `soft delete`
17. `model casts`

---

## 10.3 ထည့်ရင် ပိုကောင်းတဲ့ အဆင့်မြင့်အပိုင်းများ

1. `Pest` / `PHPUnit`
2. `PHPStan` / `Larastan`
3. `Laravel Pint`
4. `CI/CD`
5. `Docker` / `WSL2` notes
6. `API` / `Sanctum`
7. `Queue`
8. `sitemap.xml`
9. `robots.txt`
10. `backup`
11. `monitoring`

---

# 11. နောက်ဆုံးအကြံပြုချက်

ဒီဂိုက်ကို **အမှန်တကယ် အလုပ်လုပ်တဲ့** + **လုံခြုံတဲ့** + **portfolio-ready** ဖြစ်အောင် လုပ်ချင်ရင် —

## 11.1 အရင်ဆုံး ပြင်ရမယ့်အချက်များ

1. `Route::redirect('/', '/admin')` ကို ဖျက်ရမယ်
2. `auth` middleware တစ်ခုတည်း မသုံးရ
3. `admin` middleware ထည့်ရမယ်
4. `logout` ကို `route('admin.logout')` နဲ့ ခေါ်ရမယ်
5. `create`/`creat` နဲ့ `destroy`/`destory` ကို တိကျစွာ စစ်ရမယ်
6. `throttle` ထည့်ရမယ်
7. `published` scope ထည့်ရမယ်
8. `unique` constraint ထည့်ရမယ်

---

## 11.2 ထည့်ရမယ့်အချက်များ

1. `version compatibility check`
2. `guest redirect`
3. `public routes`
4. `is_published` / `slug`
5. `FormRequest`
6. `flash messages`
7. `old()` + `@error()`
8. `pagination` custom view
9. `search` / `filter`
10. `403`, `404`, `500`
11. `storage:link`
12. `file upload validation`
13. `authorize()` in `FormRequest`

---

## 11.3 ထည့်ရင် ပိုကောင်းတဲ့အချက်များ

1. `git` / branch
2. `php artisan route:list`
3. `optimize:clear`
4. `APP_DEBUG` / `APP_ENV`
5. `SESSION_DRIVER`
6. `SESSION_COOKIE_SECURE`
7. `remember me`
8. `password policy`
9. `change password`
10. `published()` scope
11. `route model binding`
12. `SEO fields`
13. `contact` rate limit
14. `honeypot`
15. `activity log`
16. `soft delete`
17. `model casts`

---

## 11.4 ထည့်ရင် ပိုကောင်းတဲ့ အဆင့်မြင့်အပိုင်းများ

1. `Pest` / `PHPUnit`
2. `PHPStan` / `Larastan`
3. `Laravel Pint`
4. `CI/CD`
5. `Docker` / `WSL2` notes
6. `API` / `Sanctum`
7. `Queue`
8. `sitemap.xml`
9. `robots.txt`
10. `backup`
11. `monitoring`

---

အကျဉ်းချုပ်အနေနဲ့ —

> **ဒီဂိုက်ထဲမှာ “ဘာတွေ ထပ်ထည့်သင့်လဲ?” ဆိုတာကို စစ်ဆေးကြည့်ရင်  
> အဓိကအားဖြင့် —  
> `admin authorization`, `rate limiting`, `public routes`, `published/slug`, `FormRequest`, `unique constraint`, `flash messages`, `pagination`, `search/filter`, `error pages`, `file upload`, `testing` စတာတွေကို ထပ်ထည့်သင့်တယ်။**

ဒါတွေကို ထည့်လိုက်ရင် —

- **လုံခြုံတဲ့** admin panel ဖြစ်မယ်
- **အလုပ်လုပ်တဲ့** CRUD system ဖြစ်မယ်
- **အမှန်တကယ်** အသုံးဝင်တဲ့ **portfolio** ဖြစ်လာမယ်
- **နောက်ပိုင်း** မှာ **React/Next.js** နဲ့ ချိတ်ချင်ရင်လည်း **API** အတွက် အဆင်ပြေမယ်