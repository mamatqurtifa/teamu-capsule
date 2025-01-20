<div class="bg-white shadow-md rounded p-6">
    <h2 class="text-xl font-bold mb-4">Your Capsule List</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($capsules as $capsule)
            <div class="bg-white shadow-md rounded overflow-hidden">
                <img src="{{ asset('storage/' . $capsule->image) }}" alt="{{ $capsule->title }}"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $capsule->title }}</h2>
                    <p class="text-sm text-gray-600">
                        {{ \Illuminate\Support\Str::limit($capsule->text, 100) }}</p>
                    <p class="text-xs text-gray-500 mt-2">
                        {{ $capsule->created_at->format('d M Y, H:i') }}
                    </p>
                    <div class="pt-2 flex justify-start items-center">
                        <p class="text-sm text-white bg-gray-800 px-4 py-2 rounded text-center">{{ $capsule->capsule_type }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
