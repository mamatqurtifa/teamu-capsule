<!-- Form untuk membuat Capsule baru -->
<form action="{{ route('capsule-post.store') }}" method="POST" enctype="multipart/form-data"
    class="bg-white shadow-md rounded p-6">
    @csrf

    <!-- Title -->
    <div class="mb-4">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
    </div>

    <!-- Text -->
    <div class="mb-4">
        <x-input-label for="text" :value="__('Text')" />
        <x-text-input id="text" name="text" rows="4" class="mt-1 block w-full" required></x-text-input>
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" name="image" id="image" accept="image/*"
            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
    </div> 

    <!-- Capsule Type (Public/Private) -->
    <div class="mb-4">
        <x-input-label for="capsule_type" :value="__('Capsule Type')" />
        <select name="capsule_type" id="capsule_type"
            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
            <option value="public" {{ old('capsule_type') === 'public' ? 'selected' : '' }}>Public</option>
            <option value="private" {{ old('capsule_type') === 'private' ? 'selected' : '' }}>Private</option>
        </select>
    </div>

    <!-- Future Time -->
    <div class="mb-4">
        <x-input-label for="future_time" :value="__('Future Time')" />
        <input type="datetime-local" name="future_time" id="future_time"
            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
    </div>

    <!-- Submit Button -->
    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
</form>
