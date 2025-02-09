<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page not found - {{ config('app.name') }}">
    <title>404 - Page Not Found | {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('teamu.png') }}" type="image/x-icon">
</head>

<body class="h-full">
    @include('home-components.nav')

    <main class="grid min-h-[calc(100vh-4rem)] place-items-center bg-white px-6 py-16 sm:py-24 lg:px-8">
        <div class="max-w-2xl text-center">
            <!-- Error Code with Animation -->
            <div class="relative">
                <p class="text-base font-semibold text-gray-900">404</p>
                <div class="absolute -inset-x-2 -inset-y-2 animate-pulse rounded-lg"></div>
            </div>

            <!-- Main Error Message -->
            <h1 class="mt-4 text-balance text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                Oops! Page not found
            </h1>

            <!-- Error Description -->
            <p class="mt-6 text-pretty text-lg leading-8 text-gray-600">
                Sorry, we couldn't find the page you're looking for. The page might have been removed,
                renamed, or is temporarily unavailable.
            </p>

            <!-- Action Buttons -->
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ url('/') }}"
                    class="group relative inline-flex items-center gap-x-2 rounded-full bg-gray-900 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 transition-all duration-300 ease-in-out">
                    <span>Return home</span>
                    <svg class="h-5 w-5 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <!-- Contact Support -->
            <div class="mt-8 text-sm text-gray-500">
                <p>Need help?
                    <a href="mailto:contact@qurtifa.me"
                        class="font-medium text-gray-900 hover:text-gray-700 underline-offset-4 hover:underline transition-all duration-300 inline-flex items-center gap-x-1">
                        Contact support
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </a>
                </p>
            </div>
        </div>
    </main>

    @include('home-components.footer')

    <script>
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
</body>

</html>
