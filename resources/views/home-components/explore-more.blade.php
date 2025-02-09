<section class="bg-white py-24 sm:py-32" id="about">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mx-auto max-w-2xl lg:text-center" data-aos="fade-up">
            <h2 class="text-base font-semibold leading-7 text-indigo-600">About Us</h2>
            <p class="mx-auto mb-2 max-w-lg text-balance text-center text-4xl font-semibold tracking-tight text-gray-950 sm:text-5xl">
                Your Digital Time Machine
            </p>
            <p class="mt-6 text-lg/8 text-gray-600">
                Teamu is more than just storage—it's your personal memory vault that bridges past, present, and future.
                Create meaningful time capsules that preserve your story, letting you rediscover cherished moments
                exactly
                when they mean the most.
            </p>
        </div>

        <!-- Features Grid -->
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                <!-- Feature 1: Push Memories -->
                <div class="relative pl-16 group" data-aos="fade-right">
                    <dt class="text-base/7 font-semibold text-gray-900">
                        <div
                            class="absolute left-0 top-0 flex size-12 items-center justify-center rounded-xl bg-gray-900 shadow-lg transition-all duration-300 group-hover:bg-indigo-600">
                            <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                            </svg>
                        </div>
                        Preserve Your Journey
                    </dt>
                    <dd class="mt-2 text-base/7 text-gray-600">
                        <span class="block mb-3">
                            Securely store your meaningful moments—photos, messages, and milestones—in your personal
                            digital vault.
                        </span>
                        <ul class="space-y-2 text-sm text-gray-500">
                            <li class="flex items-center">
                                <svg class="mr-2 size-4 text-indigo-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Unlimited storage space
                            </li>
                            <li class="flex items-center">
                                <svg class="mr-2 size-4 text-indigo-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Support for all image formats
                            </li>
                        </ul>
                    </dd>
                </div>

                <!-- Feature 2: Time Reveal -->
                <div class="relative pl-16 group" data-aos="fade-left">
                    <dt class="text-base/7 font-semibold text-gray-900">
                        <div
                            class="absolute left-0 top-0 flex size-12 items-center justify-center rounded-xl bg-gray-900 shadow-lg transition-all duration-300 group-hover:bg-indigo-600">
                            <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        Time-Released Memories
                    </dt>
                    <dd class="mt-2 text-base/7 text-gray-600">
                        <span class="block mb-3">
                            Set the perfect moment for your memories to resurface. Like a letter to your future self,
                            each capsule opens at just the right time.
                        </span>
                        <ul class="space-y-2 text-sm text-gray-500">
                            <li class="flex items-center">
                                <svg class="mr-2 size-4 text-indigo-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Customizable unlock dates
                            </li>
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>


    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
@endpush
