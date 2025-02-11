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

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    @include('capsule-post.partials.capsule-list-capsule-post')
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function capsuleManager() {
                return {
                    selectedCapsule: null,
                    filterType: localStorage.getItem('capsuleFilter') || 'all',

                    openCapsule(event, capsule) {
                        event.preventDefault();
                        this.selectedCapsule = capsule;
                    },

                    setFilter(type) {
                        this.filterType = type;
                        localStorage.setItem('capsuleFilter', type);
                    },

                    isVisible(capsuleType) {
                        return this.filterType === 'all' || this.filterType === capsuleType;
                    }
                }
            }

            document.addEventListener('alpine:init', () => {
                Alpine.data('formData', () => ({
                    old(field) {
                        return @json(old())[field] || '';
                    }
                }));
            });
        </script>
    @endpush
</x-app-layout>
