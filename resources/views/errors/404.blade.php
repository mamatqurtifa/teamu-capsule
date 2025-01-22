<script src="https://cdn.tailwindcss.com"></script>
@include('home-components.nav')
<main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="text-center">
        <p class="text-base font-semibold text-gray-900">404</p>
        <h1 class="mt-4 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Page not found</h1>
        <p class="mt-6 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Sorry, we couldn’t find the page
            you’re looking for.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="/"
                class="rounded-full bg-gray-900 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 transition ease-in-out delay-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
                back home</a>
            <a href="#" class="text-sm font-semibold text-gray-900">Contact support <span
                    aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</main>
@include('home-components.footer')
