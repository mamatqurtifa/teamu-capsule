<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="bg-white" x-data="publicCapsuleManager()">
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Public Capsules') }}</h3>
                        </div>

                        <!-- Filters -->
                        <div class="flex items-center space-x-4 border shadow-md">
                            <select x-model="sortBy" @change="filterCapsules()" 
                                    class="rounded-md border shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="latest">Latest</option>
                                <option value="oldest">Oldest</option>
                                <option value="opening_soon">Opening Soon</option>
                            </select>

                            <div class="relative">
                                <input type="text" 
                                       x-model="searchQuery"
                                       @input.debounce.300ms="filterCapsules()"
                                       placeholder="Search capsules..."
                                       class="w-full rounded-md border shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10 pr-4 py-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Capsules Grid -->
                    <div id="capsules-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($capsules as $capsule)
                            <div class="bg-white overflow-hidden sm:rounded-lg border border-gray-200 hover:border-indigo-300 transition-colors duration-200 shadow-md">
                                <div class="relative">
                                    <!-- Image Section -->
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $capsule->image) }}" 
                                             alt="{{ $capsule->title }}"
                                             class="w-full h-full object-cover">
                                        
                                        @if ($capsule->isLocked())
                                            <div class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                                                <svg class="w-10 h-10 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Content Section -->
                                    <div class="p-4 sm:p-6">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">{{ $capsule->title }}</h4>
                                            
                                            <!-- Author Badge -->
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $capsule->user->name }}
                                            </span>
                                        </div>

                                        <div class="space-y-2 text-sm">
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Created: {{ $capsule->created_at->format('M d, Y H:i') }}
                                            </div>
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Opens: {{ $capsule->future_time->format('M d, Y H:i') }}
                                            </div>
                                        </div>

                                        <!-- Status & Actions -->
                                        <div class="mt-4 flex items-center justify-between">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $capsule->getStatusClass() }}">
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
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($capsules->hasPages())
                        <div class="mt-6">
                            {{ $capsules->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function publicCapsuleManager() {
            return {
                searchQuery: '',
                sortBy: 'latest',
                isLoading: false,

                filterCapsules() {
                    this.isLoading = true;
                    const params = new URLSearchParams({
                        search: this.searchQuery,
                        sort: this.sortBy
                    });

                    window.location.href = `{{ route('capsules.public.filter') }}?${params.toString()}`;
                }
            }
        }
    </script>
    @endpush
</x-app-layout>