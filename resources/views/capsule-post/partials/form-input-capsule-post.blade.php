<!-- Form untuk membuat Capsule baru -->
<form action="{{ route('capsule-post.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6">
    @csrf
    <div class="mb-4">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
    </div>

    <div class="mb-4">
        <x-input-label for="text" :value="__('Text')" />
        <x-text-input id="text" name="text" rows="4" class="mt-1 block w-full" required />
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
    </div>
{{-- 
    <button type="submit" class="px-4 py-2 ">Post</button> --}}
    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
</form>