# Laravel Project

This is a clean Laravel project for learning from the beginning.

## Run Locally

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

## Useful Commands

```bash
php artisan route:list
php artisan make:controller ExampleController
php artisan make:model Example -m
php artisan test
```

## Project Structure

```text
routes/web.php                    Web routes
resources/views/welcome.blade.php First Blade page
app/Http/Controllers              Controllers
app/Models                        Eloquent models
database/migrations               Database schema changes
database/seeders                  Sample data
```

## Git

After making changes:

```bash
git add .
git commit -m "Describe your change"
git push
```
