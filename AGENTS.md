# AGENTS.md — Guidelines for AI Coding Agents in admin-panel

## Build, Test & Development Commands

- **Start Development Server**: `php artisan serve` (or `composer run dev`)
- **Run Tests**: `php artisan test` (or `composer run test`)
- **Run Database Migrations**: `php artisan migrate`
- **Seed Database**: `php artisan db:seed`
- **Build Frontend Assets**: `npm run dev` or `npm run build`
- **Code Style Fixer**: `vendor/bin/pint`

## Project Structure & Architecture

- **Framework**: Laravel 13 (PHP 8.3+)
- **Guide Documentation**: `laravel-bootstrap5-admin-panel-guide.md` contains the step-by-step implementation guide for building the Admin Panel with Bootstrap 5 and AdminLTE 4.
- **Controllers & Models**: Standard Laravel MVC pattern under `app/Http/Controllers/` and `app/Models/`.
- **Views**: Blade templates under `resources/views/`.

## Conventions

- Follow Laravel 13 best practices and strict type declarations where applicable.
- Ensure all admin routes and views align with the Bootstrap 5 / AdminLTE 4 component guidelines specified in `laravel-bootstrap5-admin-panel-guide.md`.
