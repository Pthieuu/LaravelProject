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
            background: #f8fafc;
            color: #1f2937;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .navbar {
            min-height: 72px;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e5e7eb;
            background: #ffffff;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #111827;
            font-size: 20px;
            font-weight: 800;
            text-decoration: none;
        }

        .logo-mark {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border-radius: 8px;
            background: #2563eb;
            color: #ffffff;
            font-size: 14px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-links a {
            padding: 10px 14px;
            border-radius: 8px;
            color: #4b5563;
            font-weight: 700;
            text-decoration: none;
        }

        .nav-links a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .nav-links .primary {
            background: #2563eb;
            color: #ffffff;
        }

        .page {
            min-height: calc(100vh - 72px);
            display: grid;
            place-items: center;
            padding: 32px 16px;
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
    <header class="navbar">
        <a class="brand" href="{{ route('home') }}">
            <span class="logo-mark">SV</span>
            <span>StopViolent</span>
        </a>

        <nav class="nav-links" aria-label="Main navigation">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a class="primary" href="{{ route('tasks.index') }}">Tasks</a>
            @else
                <a href="{{ route('login') }}">Đăng nhập</a>
                <a class="primary" href="{{ route('register') }}">Đăng ký</a>
            @endauth
        </nav>
    </header>

    <div class="page">
        <main>
            <h1>Laravel Project</h1>
            <p>This is a clean starting point. Use the navigation above to open the Breeze login and registration pages.</p>
        </main>
    </div>
</body>
</html>
