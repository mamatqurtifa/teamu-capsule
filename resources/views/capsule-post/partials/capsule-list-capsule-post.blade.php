<div class="bg-white shadow-md rounded p-6 relative">
    <h2 class="text-xl font-bold mb-4">Your Capsule List</h2>
    {{-- Contoh Capsule --}}
    <div class="grid goid-cols-1 sm:grod-cols-2 lg:grid-cols-3 gap-4 py-4">
        <div class="bg-white shadow-md rounded overflow-hidden">
            <div class="p-4 w-full overflow-hidden"
                style="height: 14rem; object-fit: cover; object-position: center; display: flex; justify-content: center; align-items: center; position: relative;">
                <div class="w-full h-full"
                    style="background: rgba(255, 255, 255, 0.75);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                position: absolute;">
                </div>
                <p class="text-xl text-gray-800 absolute text-bold">5 years, 11 months, 16 days</p>
                <img src="http://127.0.0.1:8000/storage/capsules/58at0pQ1SPBJ4WezwOFEvOCZAnKvqPYYItZQBWbL.png"
                    class="w-full object-cover object-center rounded">
            </div>
            <div class="p-4">
                <h2 class="text-lg font-bold"> Suatu hari di 2020 </h2>
                <p class="text-xs text-gray-500 mt-2">
                    Date Created : 01 Jan 2021, 12:00
                </p>
                <p class="text-xs text-gray-500 mt-2">
                    Date Open : 01 Jan 2031, 12:00
                </p>
                <div class="pt-2 flex justify-start gap-2 items-center">
                    <p class="text-sm text-white bg-gray-800 px-4 py-2 rounded text-center">Public</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded overflow-hidden">
            <div class="p-4 w-full overflow-hidden"
                style="height: 14rem; object-fit: cover; object-position: center; display: flex; justify-content: center; align-items: center;">
                <img src="http://127.0.0.1:8000/storage/capsules/58at0pQ1SPBJ4WezwOFEvOCZAnKvqPYYItZQBWbL.png"
                    class="w-full object-cover object-center rounded">
            </div>
            <div class="p-4">
                <h2 class="text-lg font-bold"> Suatu hari di 2020 </h2>
                <p class="text-xs text-gray-500 mt-2">
                    Date Created : 01 Jan 2021, 12:00
                </p>
                <p class="text-xs text-gray-500 mt-2">
                    Date Open : 01 Jan 2031, 12:00
                </p>
                <div class="pt-2 flex justify-start gap-2 items-center">
                    <p class="text-sm text-white bg-gray-800 px-4 py-2 rounded text-center">Public</p>
                    <p class="text-sm text-white bg-gray-800 px-4 py-2 rounded text-center">Open</p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($capsules as $capsule)
            <div class="bg-white shadow-md rounded overflow-hidden">
                <div class="p-4 w-full overflow-hidden"
                    style="height: 14rem; object-fit: cover; object-position: center; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('storage/' . $capsule->image) }}" alt="{{ $capsule->title }}"
                        class="w-full object-cover object-center rounded">
                </div>
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $capsule->title }}</h2>
                    <p class="text-sm text-gray-600">
                        {{ \Illuminate\Support\Str::limit($capsule->text, 100) }}</p>
                    <p class="text-xs text-gray-500 mt-2">
                        {{ $capsule->created_at->format('d M Y, H:i') }}
                    </p>
                    <p class="text-xs text-gray-500 mt-2">
                        {{ $capsule->future_time }}
                    </p>
                    <div class="pt-2 flex justify-start items-center">
                        <p class="text-sm text-white bg-gray-800 px-4 py-2 rounded text-center">
                            {{ $capsule->capsule_type }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
