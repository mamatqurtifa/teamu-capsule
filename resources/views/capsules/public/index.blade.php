<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="bg-white" x-data="{
                    searchQuery: '{{ request()->search ?? '' }}',
                    sortBy: '{{ request()->sort ?? 'latest' }}',
                    isLoading: false,
                
                    async filterCapsules() {
                        this.isLoading = true;
                
                        try {
                            const params = new URLSearchParams({
                                search: this.searchQuery,
                                sort: this.sortBy
                            });
                
                            const response = await fetch(`{{ route('capsules.public.filter') }}?${params.toString()}`, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                }
                            });
                
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                
                            const data = await response.json();
                            document.getElementById('capsules-grid').innerHTML = data.html;

                            window.history.pushState({},
                                '',
                                `{{ route('capsules.public.index') }}?${params.toString()}`
                            );
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Failed to load capsules. Please try again.');
                        } finally {
                            this.isLoading = false;
                        }
                    },
                
                    init() {
                        this.$watch('searchQuery', () => this.filterCapsules());
                        this.$watch('sortBy', () => this.filterCapsules());
                    }
                }" x-init="init">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Public Capsules') }}</h3>
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
                            <div class="relative">
                                <select x-model="sortBy"
                                    class="w-full sm:w-44 h-10 px-3 text-sm text-gray-700 border border-gray-300 rounded-lg 
                                           bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                           hover:border-indigo-300 transition-colors duration-200 cursor-pointer">
                                    <option value="latest">Latest</option>
                                    <option value="oldest">Oldest</option>
                                    <option value="opening_soon">Opening Soon</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                </div>
                            </div>

                            <div class="relative flex-grow sm:flex-grow-0 sm:min-w-[260px]">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" x-model.debounce.300ms="searchQuery"
                                    placeholder="Search capsules..."
                                    class="w-full h-10 pl-10 pr-4 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 
                                           rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                                           hover:border-indigo-300 transition-colors duration-200">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <div x-show="searchQuery" @click="searchQuery = ''"
                                        class="cursor-pointer text-gray-400 hover:text-gray-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="isLoading" x-cloak
                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white rounded-lg p-4 flex items-center space-x-3">
                            <svg class="animate-spin h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span class="text-gray-700">Loading capsules...</span>
                        </div>
                    </div>

                    <div id="capsules-grid">
                        @include('capsules.public._capsules_list', ['capsules' => $capsules])
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    @endpush
</x-app-layout>
