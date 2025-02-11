<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <a href="{{ route('capsules.public.index') }}" class="flex items-center text-gray-600 hover:text-gray-900">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Public Capsules
                        </a>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $capsule->title }}</h1>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ $capsule->user->name }}
                        </span>
                    </div>

                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $capsule->image) }}" 
                             alt="{{ $capsule->title }}"
                             class="w-full rounded-lg shadow-lg object-cover">
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Created: {{ $capsule->created_at->format('M d, Y H:i') }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Opened: {{ $capsule->future_time->format('M d, Y H:i') }}
                            </div>
                        </div>

                        <div class="prose max-w-none">
                            <p class="text-gray-700 whitespace-pre-line">{{ $capsule->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>