<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UI elements - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    </head>
    <body>
        <header>
            <h1>@yield('title')</h1>
            <nav>
            <a href="{{ route('product-list') }}">Product</a>
            <a href="{{ route('shop-list') }}">Shop</a>
            </nav>
        </header>
        <main>
                @if(session()->has('status'))
        <div class="status">
        <span class="info">{{ session()->get('status') }}</span>
        </div>
        @error('error')
        <div class="status">
        <span class="warn">{{ $message }}</span>
        </div>
        @enderror
        @endif
        @yield('content')
        </main>
        <footer>
            &#xA9; Copyright Week-13, 2021 SITTHA's UI elements.
        </footer>
    </body>
</html>
