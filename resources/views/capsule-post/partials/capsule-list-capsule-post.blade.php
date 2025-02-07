<div class="p-6" x-data="capsuleManager()">
    <h3 class="text-lg font-medium text-gray-900 mb-6">Your Capsules</h3>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($capsules as $capsule)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <!-- Image Section -->
                    <div class="relative h-48 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $capsule->image) }}" 
                             alt="{{ $capsule->title }}"
                             class="w-full h-full object-cover">
                        
                        @if($capsule->isLocked())
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        @endif

                        <!-- Type Badge -->
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                       {{ $capsule->capsule_type === 'private' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($capsule->capsule_type) }}
                            </span>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-4">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $capsule->title }}</h4>
                        
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Created: {{ $capsule->created_at->format('d M Y, H:i') }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Opens: {{ $capsule->future_time->format('d M Y, H:i') }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="mt-4 flex items-center justify-between">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $capsule->getStatusClass() }}">
                                {{ $capsule->getStatus() }}
                            </span>
                            @unless($capsule->isLocked())
                                <button type="button"
                                        @click="openCapsule($event, {
                                            id: {{ $capsule->id }},
                                            title: '{{ addslashes($capsule->title) }}',
                                            text: '{{ addslashes($capsule->text) }}',
                                            image: '{{ asset('storage/' . $capsule->image) }}',
                                            created_at: '{{ $capsule->created_at->format('d M Y, H:i') }}',
                                            future_time: '{{ $capsule->future_time->format('d M Y, H:i') }}',
                                            capsule_type: '{{ $capsule->capsule_type }}'
                                        })"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    View Contents
                                </button>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <template x-if="selectedCapsule">
        <div class="fixed inset-0 z-50 overflow-y-auto" 
             @keydown.escape.window="selectedCapsule = null">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                     @click="selectedCapsule = null"></div>

                <!-- Modal panel -->
                <div class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <!-- Close button -->
                    <button @click="selectedCapsule = null" 
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Modal content -->
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" x-text="selectedCapsule.title"></h3>
                                <img :src="selectedCapsule.image" 
                                     :alt="selectedCapsule.title"
                                     class="w-full h-48 object-cover rounded-lg mb-4">
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500" x-text="selectedCapsule.text"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

<script>
function capsuleManager() {
    return {
        selectedCapsule: null,
        
        openCapsule(event, capsule) {
            event.preventDefault();
            this.selectedCapsule = capsule;
            console.log('Opening capsule:', capsule); // Untuk debugging
        }
    }
}
</script>