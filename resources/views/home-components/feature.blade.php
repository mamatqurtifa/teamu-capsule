<div class="bg-white py-24 sm:py-32" id="features">
    <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
        <p
            class="mx-auto mb-2 max-w-lg text-balance text-center text-4xl font-semibold tracking-tight text-gray-950 sm:text-5xl">
            Key Features</p>
        <h2 class="text-center text-base/7 font-semibold text-gray-600">Discover what Teamu Capsule offers</h2>
        <div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-3 lg:grid-rows-2">
            <div class="relative lg:row-span-2">
                <div class="absolute inset-px rounded-lg bg-white lg:rounded-l-[2rem]"></div>
                <div
                    class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] lg:rounded-l-[calc(2rem+1px)]">
                    <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                        <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">Mobile
                            friendly</p>
                        <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center"> Its design adapts
                            seamlessly to various platforms, from desktops to mobile devices, thereby enhancing
                            accessibility and usability.</p>
                    </div>
                    <div
                        class="relative min-h-[30rem] w-full grow [container-type:inline-size] max-lg:mx-auto max-lg:max-w-sm">
                        <div
                            class="absolute inset-x-10 bottom-0 top-10 overflow-hidden rounded-t-[12cqw] border-x-[3cqw] border-t-[3cqw] border-gray-700 bg-gray-900 shadow-2xl">
                            <img class="size-full object-cover object-top"
                                src="{{ asset('storage/capsules/teamu-responsive.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div
                    class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 lg:rounded-l-[2rem]">
                </div>
            </div>
            <div class="relative max-lg:row-start-1">
                <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
                <div
                    class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                    <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                        <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">Time Keeps
                            Running
                        </p>
                        <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Capcure every memory for
                            the future serves as a vital endeavor that not only preserves our personal histories but
                            also enriches the collective narrative of human experience.</p>
                    </div>
                    <div
                        class="flex flex-1 items-center justify-center px-8 max-lg:pb-12 max-lg:pt-10 sm:px-10 lg:pb-2">
                        <div id="clock" class="text-4xl font-bold text-gray-900 max-lg:max-w-xs">
                            Loading...
                        </div>
                    </div>
                </div>
                <div
                    class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]">
                </div>
            </div>
            <div class="relative max-lg:row-start-3 lg:col-start-2 lg:row-start-2">
                <div class="absolute inset-px rounded-lg bg-white"></div>
                <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)]">
                    <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                        <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">Security</p>
                        <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">This application is
                            continuously updated to maintain security against the latest threats.</p>
                    </div>
                    <div class="flex flex-1 items-center [container-type:inline-size] max-lg:py-6 lg:pb-2">
                        <img class="h-[min(152px,40cqw)] object-cover grayscale"
                            src="{{ asset('storage/capsules/teamu-security.png') }}" alt="">
                    </div>
                </div>
                <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5"></div>
            </div>
            <div class="relative lg:row-span-2">
                <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]"></div>
                <div
                    class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)] lg:rounded-r-[calc(2rem+1px)]">
                    <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                        <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">Store
                            Memories</p>
                        {{-- <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Sit quis amet rutrum tellus
                            ullamcorper ultricies libero dolor eget sem sodales gravida.</p> --}}
                    </div>
                    <div class="relative min-h-[30rem] w-full grow">
                        <div
                            class="absolute bottom-0 left-10 right-0 top-10 overflow-hidden rounded-tl-xl bg-gray-900 shadow-2xl">
                            <div class="flex bg-gray-800/40 ring-1 ring-white/5">
                                <div class="-mb-px flex text-sm/6 font-medium text-gray-400">
                                    {{-- <div
                                        class="border-b border-r border-b-white/20 border-r-white/10 bg-white/5 px-4 py-2 text-white">
                                        NotificationSetting.jsx</div> --}}
                                </div>
                            </div>
                            <div class="px-6 pb-14 pt-6 text-gray-300">
                                Discover a space where your cherished stories and images find a lasting home. Our
                                platform offers an elegant solution to store your precious
                                memories. Join us today for years
                                to come.
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const milliseconds = String(now.getMilliseconds()).padStart(3, '0');

        document.getElementById("clock").textContent =
            `${hours}:${minutes}:${seconds}:${milliseconds}`;
    }

    setInterval(updateClock, 1);
    updateClock();
</script>
