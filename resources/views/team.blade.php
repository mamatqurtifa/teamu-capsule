<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teamu - Team and You Team</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Favicon -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('teamu.png') }}" type="image/x-icon">
</head>

<body>
    @include('home-components.nav')
    <section class="relative bg-white py-24 sm:py-32" id="teams">
        <!-- Animated Background Pattern -->
        <div
            class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Section Header -->
            <div class="mx-auto max-w-2xl text-center" data-aos="fade-down">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Meet Our Team</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    The Minds Behind Teamu Capsule
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    We're a small but dedicated team working to preserve your precious memories for the future.
                </p>
            </div>

            <!-- Team Grid -->
            <div class="mx-auto mt-16 grid max-w-5xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Qurtifa - Lead Developer -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative h-[400px] w-full overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1587&q=80"
                            alt="Qurtifa"
                            class="h-full w-full object-cover grayscale transition duration-500 group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-gray-900/0"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <p class="text-xl font-bold text-white">Qurtifa</p>
                            <p class="mt-1 text-sm font-medium text-gray-300">Lead Developer & Founder</p>
                            <p class="mt-4 text-sm text-gray-300 line-clamp-2">
                                Full-stack developer with a passion for creating meaningful digital experiences.
                            </p>
                            <div class="mt-4 flex space-x-3">
                                <a href="https://github.com/qurtifa" target="_blank" rel="noopener noreferrer"
                                    class="rounded-full bg-white/10 p-2 text-white hover:bg-indigo-500 transition-colors duration-200">
                                    <span class="sr-only">GitHub</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                                    </svg>
                                </a>
                                <a href="https://linkedin.com/in/qurtifa" target="_blank" rel="noopener noreferrer"
                                    class="rounded-full bg-white/10 p-2 text-white hover:bg-indigo-500 transition-colors duration-200">
                                    <span class="sr-only">LinkedIn</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sarah - UI/UX Designer -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-[400px] w-full overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1587&q=80"
                            alt="Sarah"
                            class="h-full w-full object-cover grayscale transition duration-500 group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-gray-900/0"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <p class="text-xl font-bold text-white">Sarah</p>
                            <p class="mt-1 text-sm font-medium text-gray-300">UI/UX Designer</p>
                            <p class="mt-4 text-sm text-gray-300 line-clamp-2">
                                Creating beautiful and intuitive interfaces that make preserving memories a joy.
                            </p>
                            <div class="mt-4 flex space-x-3">
                                <a href="https://dribbble.com/sarah" target="_blank" rel="noopener noreferrer"
                                    class="rounded-full bg-white/10 p-2 text-white hover:bg-indigo-500 transition-colors duration-200">
                                    <span class="sr-only">Dribbble</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="https://behance.net/sarah" target="_blank" rel="noopener noreferrer"
                                    class="rounded-full bg-white/10 p-2 text-white hover:bg-indigo-500 transition-colors duration-200">
                                    <span class="sr-only">Behance</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M22 7h-7V2H9v5H2v15h20V7zM9 13.5c0 .8-.7 1.5-1.5 1.5H5v3H3v-7h4.5c.8 0 1.5.7 1.5 1.5v1zm7 3.5h-4v-3h4c.6 0 1-.4 1-1s-.4-1-1-1h-4V9h4c1.7 0 3 1.3 3 3s-1.3 3-3 3z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Michael - Backend Developer -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative h-[400px] w-full overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1587&q=80"
                            alt="Michael"
                            class="h-full w-full object-cover grayscale transition duration-500 group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-gray-900/0"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <p class="text-xl font-bold text-white">Michael</p>
                            <p class="mt-1 text-sm font-medium text-gray-300">Backend Developer</p>
                            <p class="mt-4 text-sm text-gray-300 line-clamp-2">
                                Ensuring your memories are securely stored and easily accessible when the time is right.
                            </p>
                            <div class="mt-4 flex space-x-3">
                                <a href="https://github.com/michael" target="_blank" rel="noopener noreferrer"
                                    class="rounded-full bg-white/10 p-2 text-white hover:bg-indigo-500 transition-colors duration-200">
                                    <span class="sr-only">GitHub</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Stats -->
            <div class="mt-20 border-t border-gray-200 pt-12" data-aos="fade-up">
                <dl class="grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4 text-center">
                        <dt class="text-base leading-7 text-gray-600">Time Zone</dt>
                        <dd
                            class="order-first text-3xl font-semibold tracking-tight text-gray-900 hover:text-indigo-600">
                            Asia/Jakarta</dd>
                        <dd class="text-sm text-gray-500">GMT+7</dd>
                    </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4 text-center">
                        <dt class="text-base leading-7 text-gray-600">Many Members</dt>
                        <dd
                            class="order-first text-3xl font-semibold tracking-tight text-gray-900 hover:text-indigo-600">
                            637+</dd>
                        <dd class="text-sm text-gray-500">Active Contributors</dd>
                    </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4 text-center">
                        <dt class="text-base leading-7 text-gray-600">Current Date & Time</dt>
                        <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 hover:text-indigo-600"
                            id="currentDateTime">
                            2025-02-09 14:18:37
                        </dd>
                        <dd class="text-sm text-gray-500">UTC Format</dd>
                    </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4 text-center">
                        <dt class="text-base leading-7 text-gray-600">Base Location</dt>
                        <dd
                            class="order-first text-3xl font-semibold tracking-tight text-gray-900 hover:text-indigo-600">
                            Yogyakarta</dd>
                        <dd class="text-sm text-gray-500">Indonesia</dd>
                    </div>
                </dl>
            </div>

            <!-- Location Map -->
            <div class="mt-16 rounded-2xl bg-gray-50 p-6 lg:p-8" data-aos="fade-up">
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold leading-7 text-gray-900">Our Development Base</h3>
                    <p class="mt-2 text-lg text-gray-600">SIJA-TKJ SMKN 2 Depok Sleman</p>
                </div>

                <!-- Map Container with Responsive Wrapper -->
                <div class="relative w-full overflow-hidden rounded-xl shadow-lg">
                    <div class="relative" style="padding-bottom: 56.25%;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d928.4914581005056!2d110.39207566850486!3d-7.771734546947559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59233163d4cb%3A0x12a89680108b143d!2sSIJA-TKJ%20SMKN%202%20Depok!5e1!3m2!1sid!2sid!4v1739110334284!5m2!1sid!2sid"
                            class="absolute top-0 left-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Location Details -->
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div class="rounded-xl bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Address</h4>
                                <p class="mt-1 text-sm text-gray-500">Mrican, Caturtunggal, Depok, Sleman</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Website</h4>
                                <a href="https://smkn2depoksleman.sch.id" target="_blank" rel="noopener noreferrer"
                                    class="mt-1 text-sm text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                                    smkn2depoksleman.sch.id
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Email</h4>
                                <p class="mt-1 text-sm text-gray-500">info@smkn2depoksleman.sch.id</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('home-components.footer')
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <style>
            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-20px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .float-animation {
                animation: float 6s ease-in-out infinite;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // AOS initialization
                AOS.init({
                    duration: 800,
                    offset: 100,
                    once: true
                });

                // Update current date time with Jakarta timezone
                function updateDateTime() {
                    const now = new Date();
                    const jakartaTime = new Intl.DateTimeFormat('en-US', {
                        timeZone: 'Asia/Jakarta',
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: false
                    }).format(now);

                    // Format: YYYY-MM-DD HH:mm:ss
                    const formatted = jakartaTime
                        .replace(/(\d+)\/(\d+)\/(\d+), (\d+):(\d+):(\d+)/, '$3-$1-$2 $4:$5:$6');

                    document.getElementById('currentDateTime').textContent = formatted;
                }

                setInterval(updateDateTime, 1000);
                updateDateTime();
            });
        </script>
    @endpush
</body>

</html>
