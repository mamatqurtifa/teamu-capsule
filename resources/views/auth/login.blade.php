<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex h-screen max-w-screen overflow-hidden flex-col justify-center items-center px-4 py-12 lg:px-8 relative">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#100c07] to-[#cac9cd] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="flex w-full max-w-md sm:max-w-md md:max-w-sm justify-center items-center px-6 py-8 md:px-6 md:py-10 bg-white rounded-2xl shadow-lg flex-col border">
            <div class="sm:w-full sm:max-w-md md:max-w-sm">
                <img class="mx-auto h-12 w-auto"
                    src="https://qurtifa.my.id/teamu.png" alt="Teamu Capsule">
                <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Log in to your account
                </h2>
            </div>

            <div class="mt-10 w-full sm:max-w-md md:max-w-sm">
                <form class="space-y-4 w-full" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" :value="__('Email')"
                            class="block text-sm/6 font-medium text-gray-900">Email
                            address</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" :value="old('email')" required
                                autofocus autocomplete="username"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 focus:shadow-lg transition duration-500 ease-in-out sm:text-sm/6">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" :value="__('Password')"
                                class="block text-sm/6 font-medium text-gray-900">Password</label>
                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                        <a class="text-sm/6 font-medium text-gray-600" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required
                                autocomplete="current-password"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 focus:shadow-lg transition duration-500 ease-in-out sm:text-sm/6">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-gray-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">{{ __('Log in') }}</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm/6 text-gray-500">
                    Not a member?
                    <a href="/register" class="font-semibold text-gray-800 hover:text-gray-900">Sign Up</a>
                </p>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#000000] to-[#cac9cd] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
</body>

</html>
