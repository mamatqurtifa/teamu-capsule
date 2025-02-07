<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Capsule') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="capsuleManager()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('You Can Create A Capsule Here!') }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Form untuk membuat Capsule baru -->
                @include('capsule-post.partials.form-input-capsule-post')
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('capsule-post.partials.capsule-list-capsule-post')
            </div>
        </div>

        <!-- Modal (dipindahkan ke root layout) -->
        <div x-show="selectedCapsule" 
             class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
             x-cloak
             @keydown.escape.window="selectedCapsule = null"
             @click="selectedCapsule = null">
            <div class="bg-white rounded-lg max-w-3xl w-full mx-4 overflow-hidden"
                 @click.stop>
                <div class="relative">
                    <!-- Close Button -->
                    <button @click="selectedCapsule = null"
                            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 z-10 
                                   bg-white rounded-full p-2 hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Modal Content -->
                    <div class="h-64 w-full overflow-hidden">
                        <img :src="selectedCapsule?.image" 
                             :alt="selectedCapsule?.title"
                             class="w-full h-full object-cover">
                    </div>

                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4" x-text="selectedCapsule?.title"></h2>
                        
                        <div class="prose max-w-none mb-6">
                            <p class="text-gray-600" x-text="selectedCapsule?.text"></p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 text-sm border-t pt-4">
                            <div class="space-y-2">
                                <p class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Created: <span class="ml-1 font-medium" x-text="formatDate(selectedCapsule?.created_at)"></span>
                                </p>
                                <p class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Opens: <span class="ml-1 font-medium" x-text="formatDate(selectedCapsule?.future_time)"></span>
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm"
                                      :class="capsuleTypeClass(selectedCapsule?.capsule_type)">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
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
                
                openCapsule(capsule) {
                    this.selectedCapsule = capsule;
                },

                formatDate(dateString) {
                    if (!dateString) return '';
                    return new Date(dateString).toLocaleString('en-US', {
                        year: 'numeric',
                        month: 'short',
                        day: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                },

                capsuleTypeClass(type) {
                    return type === 'private' 
                        ? 'bg-red-100 text-red-800' 
                        : 'bg-green-100 text-green-800';
                }
            }
        }
    </script>
    @endpush
</x-app-layout>