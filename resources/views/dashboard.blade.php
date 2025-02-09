<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Welcome back, ') . Auth::user()->name }}
            </h2>
            <p class="text-sm text-gray-600">
                {{ now()->setTimezone('Asia/Jakarta')->format('l, d F Y') }}
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Total Capsules -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Capsules</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ Auth::user()->capsules()->count() }}
                                </p>
                            </div>
                            <div class="p-3 bg-indigo-50 rounded-full">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Locked Capsules -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Locked Capsules</p>
                                <p class="text-2xl font-semibold text-gray-900">
                                    {{ Auth::user()->capsules()->where('future_time', '>', now())->count() }}
                                </p>
                            </div>
                            <div class="p-3 bg-yellow-50 rounded-full">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Unlocked Capsules -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Unlocked Capsules</p>
                                <p class="text-2xl font-semibold text-gray-900">
                                    {{ Auth::user()->capsules()->where('future_time', '<=', now())->count() }}
                                </p>
                            </div>
                            <div class="p-3 bg-green-50 rounded-full">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity and Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            @forelse(Auth::user()->capsules()->latest()->take(5)->get() as $capsule)
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        @if ($capsule->isLocked())
                                            <span class="p-2 bg-yellow-50 rounded-full">
                                                <svg class="w-5 h-5 text-yellow-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0" />
                                                </svg>
                                            </span>
                                        @else
                                            <span class="p-2 bg-green-50 rounded-full">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $capsule->title }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Opens {{ $capsule->future_time->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">No recent activity</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-4">
                            <a href="{{ route('capsules.index') }}"
                                class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors duration-200">
                                <div
                                    class="flex-shrink-0 p-3 bg-white rounded-full shadow-sm group-hover:bg-indigo-500">
                                    <svg class="w-6 h-6 text-gray-600 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900 group-hover:text-indigo-600">Create New
                                        Capsule</p>
                                    <p class="text-sm text-gray-500">Add a new memory to your collection</p>
                                </div>
                            </a>

                            <a href="{{ route('capsules.public.index') }}"
                                class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors duration-200">
                                <div
                                    class="flex-shrink-0 p-3 bg-white rounded-full shadow-sm group-hover:bg-indigo-500">
                                    <svg class="w-6 h-6 text-gray-600 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900 group-hover:text-indigo-600">Explore
                                        Public Capsules</p>
                                    <p class="text-sm text-gray-500">Discover memories shared by others</p>
                                </div>
                            </a>

                            <a href="{{ route('profile.edit') }}"
                                class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors duration-200">
                                <div
                                    class="flex-shrink-0 p-3 bg-white rounded-full shadow-sm group-hover:bg-indigo-500">
                                    <svg class="w-6 h-6 text-gray-600 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900 group-hover:text-indigo-600">Update
                                        Profile</p>
                                    <p class="text-sm text-gray-500">Manage your account settings</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
