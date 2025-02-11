@forelse ($capsules as $capsule)
    <div
        class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 hover:border-indigo-300 transition-colors duration-200">
        <div class="relative">
            <div class="relative h-48 overflow-hidden">
                @if ($capsule->isLocked())
                    <div class="relative h-48 bg-gradient-to-r from-indigo-200 to-indigo-400">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="treasure-chest animate-bounce">
                                <svg class="w-32 h-32" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 10h16v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8z" fill="#818cf8" />
                                    <path d="M2 8h20v2H2z" fill="#3730A3" />
                                    <path d="M10 8V6a2 2 0 012-2v0a2 2 0 012 2v2" stroke="gold" stroke-width="2" />
                                    <rect x="7" y="12" width="10" height="2" fill="gold"
                                        class="animate-pulse" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @else
                    <img src="{{ asset('storage/' . $capsule->image) }}" alt="{{ $capsule->title }}"
                        class="w-full h-48 object-cover">
                @endif
            </div>

            <div class="p-4 sm:p-6">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-lg font-medium text-gray-900">{{ $capsule->title }}</h4>

                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ $capsule->user->name }}
                    </span>
                </div>

                <div class="space-y-2 text-sm">
                    <div class="flex items-center text-gray-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Created: {{ $capsule->created_at->format('M d, Y H:i') }}
                    </div>
                    <div class="flex items-center text-gray-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Opens: {{ $capsule->future_time->format('M d, Y H:i') }}
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $capsule->getStatusClass() }}">
                        {{ $capsule->getStatus() }}
                    </span>

                    @unless ($capsule->isLocked())
                        <a href="{{ route('capsules.public.show', $capsule) }}"
                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            View Contents
                        </a>
                    @endunless
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-span-full text-center py-12">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No capsules found</h3>
        <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter criteria</p>
    </div>
@endforelse
