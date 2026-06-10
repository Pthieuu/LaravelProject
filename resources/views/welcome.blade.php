<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: #f8fafc;
            color: #1f2937;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        main {
            width: min(640px, calc(100% - 32px));
            padding: 40px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #ffffff;
        }

        h1 {
            margin: 0 0 12px;
            font-size: 32px;
        }

        p {
            margin: 0;
            color: #6b7280;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <main>
        <h1>Laravel Project</h1>
        <p>This is a clean starting point. Open the routes, controllers, models, migrations, and Blade files when you are ready to build step by step.</p>
    </main>
</body>
</html>
