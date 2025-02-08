<form action="{{ route('capsule-post.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Title -->
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input 
            id="title" 
            name="title" 
            type="text" 
            class="mt-1 block w-full" 
            placeholder="Enter your capsule title (Title will be shown on the capsule cover)"
            :value="old('title')"
            required 
            autofocus
        />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Text -->
    <div>
        <x-input-label for="text" :value="__('Text')" />
        <textarea 
            id="text" 
            name="text" 
            rows="4" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm resize-none px-2 py-1.5 border"
            placeholder="Write your capsule content here..."
            required
        >{{ old('text') }}</textarea>
        <x-input-error :messages="$errors->get('text')" class="mt-2" />
    </div>

    <!-- Image -->
    <div>
        <x-input-label for="image" :value="__('Image')" />
        <div class="mt-1">
            <label class="flex justify-center px-6 py-4 border-2 border-gray-300 border-dashed rounded-md cursor-pointer hover:border-indigo-500 focus-within:border-indigo-500 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span class="relative rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            Upload an image
                        </span>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
                <input type="file" name="image" id="image" accept="image/*" class="sr-only" required>
            </label>
        </div>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <!-- Capsule Type -->
    <div>
        <x-input-label for="capsule_type" :value="__('Capsule Type')" />
        <div class="relative mt-1">
            <select 
                name="capsule_type" 
                id="capsule_type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-2 py-1.5 border"
                required
            >
                <option value="public" {{ old('capsule_type') === 'public' ? 'selected' : '' }}>Public</option>
                <option value="private" {{ old('capsule_type') === 'private' ? 'selected' : '' }}>Private</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
        <x-input-error :messages="$errors->get('capsule_type')" class="mt-2" />
    </div>

    <!-- Future Time -->
    <div>
        <x-input-label for="future_time" :value="__('Future Time')" />
        <input 
            type="datetime-local" 
            name="future_time" 
            id="future_time"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-2 py-1.5 border"
            :value="old('future_time')"
            required
        >
        <x-input-error :messages="$errors->get('future_time')" class="mt-2" />
    </div>

    <!-- Submit Button -->
    <div class="flex items-center justify-end pt-4">
        <x-primary-button>
            {{ __('Create Capsule') }}
        </x-primary-button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    const imageInput = document.querySelector('input[type="file"]');
    const uploadLabel = imageInput.closest('label');
    const textContainer = uploadLabel.querySelector('.space-y-1');

    function updateImagePreview(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create preview container if it doesn't exist
                let previewContainer = uploadLabel.querySelector('.preview-container');
                if (!previewContainer) {
                    previewContainer = document.createElement('div');
                    previewContainer.className = 'preview-container relative w-full h-32 mt-2';
                    uploadLabel.appendChild(previewContainer);
                }

                previewContainer.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover rounded-md">
                    <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-sm hover:bg-gray-100">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                `;

                textContainer.style.display = 'none';
                
                // Add remove functionality
                const removeButton = previewContainer.querySelector('button');
                removeButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    imageInput.value = '';
                    previewContainer.remove();
                    textContainer.style.display = 'block';
                });
            }
            reader.readAsDataURL(file);
        }
    }

    imageInput.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            updateImagePreview(e.target.files[0]);
        }
    });

    // Drag and drop functionality
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadLabel.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadLabel.addEventListener(eventName, () => {
            uploadLabel.classList.add('border-indigo-500', 'ring-2', 'ring-offset-2', 'ring-indigo-500');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadLabel.addEventListener(eventName, () => {
            uploadLabel.classList.remove('border-indigo-500', 'ring-2', 'ring-offset-2', 'ring-indigo-500');
        });
    });

    uploadLabel.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files && files[0]) {
            imageInput.files = files;
            updateImagePreview(files[0]);
        }
    });
});
</script>