<div class="bg-white" x-data="capsuleManager()">
    <!-- Filter Buttons -->
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <h3 class="text-lg font-medium text-gray-900">{{ __('Your Capsules') }}</h3>
        </div>

        <div class="mb-6 flex justify-end space-x-2">
            <button @click="setFilter('all')"
                :class="{ 'bg-indigo-100 text-indigo-700': filterType === 'all', 'bg-gray-100 text-gray-700': filterType !== 'all' }"
                class="px-3 py-1 rounded-md text-sm text-gray-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                All
            </button>
            <button @click="setFilter('public')"
                :class="{ 'bg-indigo-100 text-indigo-700': filterType === 'public', 'bg-gray-100 text-gray-700': filterType !== 'public' }"
                class="px-3 py-1 rounded-md text-sm text-gray-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                Public
            </button>
            <button @click="setFilter('private')"
                :class="{ 'bg-indigo-100 text-indigo-700': filterType === 'private', 'bg-gray-100 text-gray-700': filterType !== 'private' }"
                class="px-3 py-1 rounded-md text-sm text-gray-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                Private
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($capsules as $capsule)
            <div x-show="isVisible('{{ $capsule->capsule_type }}')"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 hover:border-gray-300 transition-colors duration-200">
                <div class="relative">
                    <!-- Image Section -->
                    <div class="relative h-48 overflow-hidden">

                        @if ($capsule->isLocked())
                            <div class="relative h-48 bg-gradient-to-r from-indigo-200 to-indigo-400">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <!-- Animated Treasure Chest -->
                                    <div class="treasure-chest animate-bounce">
                                        <svg class="w-32 h-32" viewBox="0 0 24 24" fill="none">
                                            <path d="M4 10h16v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8z" fill="#818cf8" />
                                            <path d="M2 8h20v2H2z" fill="#3730A3" />
                                            <path d="M10 8V6a2 2 0 012-2v0a2 2 0 012 2v2" stroke="gold"
                                                stroke-width="2" />
                                            <rect x="7" y="12" width="10" height="2" fill="gold"
                                                class="animate-pulse" />
                                        </svg>
                                    </div>
                                    <div class="absolute bottom-4 text-white text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <p class="font-semibold">Locked</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('storage/' . $capsule->image) }}" alt="{{ $capsule->title }}"
                                class="w-full h-48 object-cover">
                        @endif

                        <!-- Type Badge -->
                        <div class="absolute top-3 right-3">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium
                                       {{ $capsule->capsule_type === 'private' ? 'bg-gray-100 text-gray-800' : 'bg-gray-100 text-gray-800' }}">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if ($capsule->capsule_type === 'private')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                    @endif
                                </svg>
                                {{ ucfirst($capsule->capsule_type) }}
                            </span>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-4 sm:p-6">
                        <h4 class="text-lg font-medium text-gray-900 mb-2">{{ $capsule->title }}</h4>

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

                        <!-- Actions -->
                        <div class="mt-4 flex items-center justify-between">
                            <span
                                class="inline-flex items-center px-2.5 pt-0.5 pb-1 rounded-full text-xs font-medium {{ $capsule->getStatusClass() }}">
                                {{ $capsule->getStatus() }}
                            </span>
                            @unless ($capsule->isLocked())
                                <x-secondary-button
                                    @click="openCapsule($event, {
                                id: {{ $capsule->id }},
                                title: '{{ addslashes($capsule->title) }}',
                                text: {{ json_encode($capsule->text) }},
                                image: '{{ asset('storage/' . $capsule->image) }}',
                                created_at: '{{ $capsule->created_at->format('M d, Y H:i') }}',
                                future_time: '{{ $capsule->future_time->format('M d, Y H:i') }}',
                                capsule_type: '{{ $capsule->capsule_type }}'
                            })">
                                    View Contents
                                </x-secondary-button>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div x-show="selectedCapsule" class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 overflow-y-auto" x-cloak
        @keydown.escape.window="selectedCapsule = null">
        <div class="flex min-h-screen items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                @click.away="selectedCapsule = null">
                <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                    <button type="button"
                        class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        @click="selectedCapsule = null">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900"
                                x-text="selectedCapsule?.title"></h3>
                            <div class="mt-4">
                                <img :src="selectedCapsule?.image" :alt="selectedCapsule?.title"
                                    class="w-full rounded-lg">
                                <p class="mt-4 text-sm text-gray-500 whitespace-pre-line"
                                    x-text="selectedCapsule?.text"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <x-secondary-button @click="selectedCapsule = null">
                        Close
                    </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</div>

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
</script>
