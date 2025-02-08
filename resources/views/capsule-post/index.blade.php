<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Time Capsule') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12" x-data="capsuleManager()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Card -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="flex items-center space-x-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Create Your Time Capsule') }}</h3>
                    </div>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Preserve your memories, thoughts, and moments. Open them when the time is right.') }}
                    </p>
                </div>
            </div>

            <!-- Create Capsule Form -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="flex items-center space-x-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900">{{ __('New Capsule') }}</h3>
                    </div>
                    @include('capsule-post.partials.form-input-capsule-post')
                </div>
            </div>

            <!-- Capsule List -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    @include('capsule-post.partials.capsule-list-capsule-post')
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="selectedCapsule"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 flex items-center justify-center" x-cloak
            @keydown.escape.window="selectedCapsule = null" @click="selectedCapsule = null">
            <div class="bg-white rounded-lg max-w-3xl w-full mx-4 shadow-xl" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4" @click.stop>
                <div class="relative">
                    <button @click="selectedCapsule = null"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="h-64 w-full overflow-hidden bg-gray-100">
                        <template x-if="selectedCapsule?.image">
                            <img :src="selectedCapsule.image" :alt="selectedCapsule.title"
                                class="w-full h-full object-cover">
                        </template>
                    </div>

                    <div class="p-6">
                        <h2 class="text-xl font-medium text-gray-900 mb-4" x-text="selectedCapsule?.title"></h2>

                        <div class="prose max-w-none mb-6">
                            <p class="text-gray-600" x-text="selectedCapsule?.text"></p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 text-sm border-t pt-4">
                            <div class="space-y-2">
                                <p class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Created: <span class="ml-1"
                                        x-text="formatDate(selectedCapsule?.created_at)"></span>
                                </p>
                                <p class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Opens: <span class="ml-1"
                                        x-text="formatDate(selectedCapsule?.future_time)"></span>
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-3 py-1 rounded-md text-sm"
                                    :class="capsuleTypeClass(selectedCapsule?.capsule_type)">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    <span x-text="selectedCapsule?.capsule_type"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function capsuleManager() {
                return {
                    selectedCapsule: null,
                    filterType: 'all',

                    openCapsule(event, capsule) {
                        event.preventDefault();
                        this.selectedCapsule = capsule;
                    },

                    // Add a filter function to determine capsule visibility
                    isVisible(capsuleType) {
                        return this.filterType === 'all' || this.filterType === capsuleType;
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
