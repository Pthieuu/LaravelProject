# SDG Action Tracker

A small Laravel learning project about the United Nations Sustainable Development Goals. The app lets you create SDG-related actions, assign impact scores, track status, and review simple dashboard statistics.

## Features

- SDG dashboard with total actions, completed actions, impact points, and completion rate
- Create actions connected to one of the 17 SDGs
- Validate form input with Laravel request validation
- Store data in SQLite through Eloquent
- Mark actions as done or move them back to doing
- Delete actions
- Seed sample SDG actions for the first run

## Laravel Concepts Practiced

- Routes in `routes/web.php`
- Controller actions in `app/Http/Controllers/ActionController.php`
- Eloquent model in `app/Models/Action.php`
- Migration in `database/migrations/*_create_actions_table.php`
- Seeder in `database/seeders/DatabaseSeeder.php`
- Blade view in `resources/views/welcome.blade.php`
- CSRF protection and HTTP method spoofing for forms

## Run Locally

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Then open:

```text
http://127.0.0.1:8000
```

## Test

```bash
php artisan test
```

## Notes

This project uses SQLite by default, so it is easy to run while learning Laravel. The local `.env` file is ignored by Git and should not be committed.
