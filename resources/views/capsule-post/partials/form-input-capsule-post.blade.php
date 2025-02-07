<form action="{{ route('capsule-post.store') }}" method="POST" enctype="multipart/form-data"
    class="bg-white shadow-lg rounded-lg p-6 mx-auto space-y-6">
    @csrf

    <!-- Title -->
    <div class="space-y-2">
        <x-input-label for="title" :value="__('Title')" class="text-gray-700 font-semibold" />
        <x-text-input 
            id="title" 
            name="title" 
            type="text" 
            class="mt-1 block w-full transition duration-150 ease-in-out px-2 py-1.5 border" 
            placeholder="Enter your capsule title"
            required 
        />
    </div>

    <!-- Text -->
    <div class="space-y-2">
        <x-input-label for="text" :value="__('Text')" class="text-gray-700 font-semibold" />
        <textarea 
            id="text" 
            name="text" 
            rows="4" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out resize-none px-2 py-1.5 border"
            placeholder="Write your capsule content here..."
            required
        ></textarea>
    </div>

    <!-- Image -->
    <div class="space-y-2">
        <label for="image" class="block text-sm font-semibold text-gray-700">Image</label>
        <div class="mt-1 flex items-center">
            <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:border-blue-500 transition-colors duration-150">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <span class="mt-2 text-sm text-gray-600">Click to upload or drag and drop</span>
                <input type="file" name="image" id="image" accept="image/*" class="hidden" required>
            </label>
        </div>
        <p class="text-xs text-gray-500">Supported formats: JPG, PNG, GIF</p>
    </div>

    <!-- Capsule Type -->
    <div class="space-y-2">
        <x-input-label for="capsule_type" :value="__('Capsule Type')" class="text-gray-700 font-semibold" />
        <div class="relative">
            <select 
                name="capsule_type" 
                id="capsule_type"
                class="appearance-none w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-3 pr-10 py-2 transition duration-150 ease-in-out border"
                required
            >
                <option value="public" {{ old('capsule_type') === 'public' ? 'selected' : '' }}>Public</option>
                <option value="private" {{ old('capsule_type') === 'private' ? 'selected' : '' }}>Private</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Future Time -->
    <div class="space-y-2">
        <x-input-label for="future_time" :value="__('Future Time')" class="text-gray-700 font-semibold" />
        <input 
            type="datetime-local" 
            name="future_time" 
            id="future_time"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out px-2 py-1.5 border"
            required
        >
    </div>

    <!-- Submit Button -->
    <div class="flex items-center justify-end pt-4">
        <x-primary-button 
            type="submit"
            class="px-6 py-3 transition duration-150 ease-in-out transform hover:scale-105"
        >
            {{ __('Create Capsule') }}
        </x-primary-button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    const imageInput = document.querySelector('input[type="file"]');
    const uploadLabel = imageInput.parentElement;

    imageInput.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const fileName = e.target.files[0].name;
            uploadLabel.querySelector('span').textContent = fileName;
        }
    });

    // Drag and drop functionality
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadLabel.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults (e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadLabel.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadLabel.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        uploadLabel.classList.add('border-blue-500');
    }

    function unhighlight(e) {
        uploadLabel.classList.remove('border-blue-500');
    }

    uploadLabel.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        imageInput.files = files;
        
        if (files && files[0]) {
            uploadLabel.querySelector('span').textContent = files[0].name;
        }
    }
});
</script>