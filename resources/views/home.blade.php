<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teamu Capsule - Time and You</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @include('home-components.nav')
    @include('home-components.hero')
    @include('home-components.explore-more')
    @include('home-components.feature')
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 z-10">
        <img id="background"
            class="absolute -left-44 -rotate-12 top-0 max-w-[870px] shadow-xl lg:flex hidden rounded-3xl xl:scale-90"
            src="https://img.pikbest.com/png-images/20240607/white-alarm-clock-3d-render---isolated-on-transparent-background_10601977.png!sw800"
            alt="Laravel background" />
    </div>
    </main>
    @include('home-components.testimonial')
    @include('home-components.footer')
</body>

</html>
