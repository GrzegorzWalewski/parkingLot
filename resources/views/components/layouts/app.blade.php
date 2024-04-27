<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/" class="active">Parking Areas</a></li>
                <li><a href="/payment">Payment Calculator</a></li>
            </ul>
        </nav>
        <h1>{{ $title ?? 'Page Title' }}</h1>
        {{ $slot }}
    </body>
</html>
