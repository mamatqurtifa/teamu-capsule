<div class="bg-white shadow-md rounded p-6 relative">
    <h2 class="text-xl font-bold mb-4">Your Capsule List</h2>
    {{-- Contoh Capsule --}}
    <div class="grid goid-cols-1 sm:grod-cols-2 lg:grid-cols-3 gap-4 py-4">
        <div class="bg-white shadow-md rounded overflow-hidden">
            <div class="w-full overflow-hidden"
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
            <div class="w-full overflow-hidden"
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
        <div class="shadow-md rounded-lg overflow-hidden border bg-white">
            <div class="w-full relative flex justify-center items-center aspect-w-16 aspect-h-9 overflow-hidden">
                <img src="http://127.0.0.1:8000/storage/capsules/chinese-new-year-2025.png" 
                    class="w-full h-full object-cover object-center">
                
                <!-- Lock Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                    class="bi bi-lock-fill absolute bottom-4 left-4 z-10 bg-white p-1 rounded-full shadow-md w-6 h-6" 
                    viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                </svg>
            </div>
            <div class="p-4">
                <p class="text-xs text-gray-500 mt-2">Date Created: 01 Jan 2021, 12:00</p>
                <p class="text-xs text-gray-500 mt-2">Date Open: 01 Jan 2031, 12:00</p>
                <div class="pt-3 flex items-center">
                    <p class="text-sm text-white bg-gray-800 px-4 py-2 rounded">Public</p>
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
