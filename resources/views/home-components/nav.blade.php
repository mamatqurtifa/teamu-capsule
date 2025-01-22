<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<header class="bg-none fixed inset-x-0 top-0 z-50" x-data="{ menuOpen: false }">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto"
                    src="https://tailwindcss.com/_next/static/media/tailwindcss-mark.3c5441fc7a190fb1800d4a5c7f07ba4b1345a9c8.svg"
                    alt="Logo">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" @click="menuOpen = true"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12 py-2 px-4 items-center rounded-full"
            style="background: rgba(255, 255, 255, 0.4);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 255, 255, 0.3);">
            <a href="#" class="text-sm font-semibold text-gray-900">About</a>
            <a href="#" class="text-sm font-semibold text-gray-900">Features</a>
            <a href="#" class="text-sm font-semibold text-gray-900">Product</a>
        </div>

        @if (Route::has('login'))
            <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm font-semibold text-gray-900 py-2 px-4 items-center rounded-full"
                        style="background: rgba(255, 255, 255, 0.4);
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(8px);
                            -webkit-backdrop-filter: blur(8px);
                            border: 1px solid rgba(255, 255, 255, 0.3);">
                        Dashboard <span aria-hidden="true">&rarr;</span>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-semibold text-gray-900 py-2 px-4 items-center rounded-full"
                        style="background: rgba(255, 255, 255, 0.4);
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(8px);
                            -webkit-backdrop-filter: blur(8px);
                            border: 1px solid rgba(255, 255, 255, 0.3);">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-sm font-semibold text-gray-900 py-2 px-4 items-center rounded-full"
                            style="background: rgba(255, 255, 255, 0.4);
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(8px);
                            -webkit-backdrop-filter: blur(8px);
                            border: 1px solid rgba(255, 255, 255, 0.3);">
                            Register <span aria-hidden="true">&rarr;</span>
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>
    <div class="lg:hidden sticky top-0" role="dialog" aria-modal="true" x-show="menuOpen" x-cloak>
        <div class="fixed inset-0 z-50 bg-gray-500 bg-opacity-75"></div>
        <div x-show="menuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:leave="transition ease-in duration-150"
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                        alt="Logo">
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="menuOpen = false">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">About</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Features</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Product</a>
                    </div>
                    <div class="py-6">
                        <a href="/login"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50">Log
                            in</a>
                        <a href="/register"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
