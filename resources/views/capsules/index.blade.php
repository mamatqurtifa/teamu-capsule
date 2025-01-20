<!-- resources/views/capsules/index.blade.php -->

<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-center text-2xl font-bold mb-6">Capsules</h1>

        <!-- Form untuk membuat Capsule baru -->
        <form action="{{ route('capsules.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6 mb-6">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="text" class="block text-sm font-medium text-gray-700">Text</label>
                <textarea name="text" id="text" rows="4" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Post</button>
        </form>

        <!-- Daftar Capsules -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($capsules as $capsule)
            <div class="bg-white shadow-md rounded overflow-hidden">
                <img src="{{ asset('storage/' . $capsule->image) }}" alt="{{ $capsule->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $capsule->title }}</h2>
                    <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($capsule->text, 100) }}</p>
                    <button onclick="showCapsule({{ $capsule->id }})" class="text-blue-500 mt-2">Read More</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="capsuleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-3/4 lg:w-1/2">
            <button class="absolute top-4 right-4 text-gray-500 hover:text-black" onclick="closeModal()">X</button>
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
        function showCapsule(id) {
            fetch(`/capsules/${id}`)
                .then(response => response.json())
                .then(data => {
                    const modalContent = `
                        <img src="/storage/${data.image}" alt="${data.title}" class="w-full h-48 object-cover rounded">
                        <h2 class="text-2xl font-bold mt-4">${data.title}</h2>
                        <p class="mt-2">${data.text}</p>
                    `;
                    document.getElementById('modalContent').innerHTML = modalContent;
                    document.getElementById('capsuleModal').classList.remove('hidden');
                });
        }

        function closeModal() {
            document.getElementById('capsuleModal').classList.add('hidden');
        }
    </script>
    @endsection
</x-app-layout>
