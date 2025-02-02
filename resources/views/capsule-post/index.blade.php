<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Capsule') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
    </div>
</x-app-layout>
