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
        <div
            class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center" data-aos="fade-down">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Meet Our Team</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    The Minds Behind Teamu Capsule
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    We're a small but dedicated team working to preserve your precious memories for the future.
                </p>
            </div>

            <div class="mx-auto mt-16 grid max-w-5xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
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
                        </div>
                    </div>
                </div>

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
                        </div>
                    </div>
                </div>

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
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 rounded-2xl bg-gray-50 p-6 lg:p-8" data-aos="fade-up">
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold leading-7 text-gray-900">Our Development Base</h3>
                    <p class="mt-2 text-lg text-gray-600">SIJA-TKJ SMKN 2 Depok Sleman</p>
                </div>

                <div class="relative w-full overflow-hidden rounded-xl shadow-lg">
                    <div class="relative" style="padding-bottom: 56.25%;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d928.4914581005056!2d110.39207566850486!3d-7.771734546947559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59233163d4cb%3A0x12a89680108b143d!2sSIJA-TKJ%20SMKN%202%20Depok!5e1!3m2!1sid!2sid!4v1739110334284!5m2!1sid!2sid"
                            class="absolute top-0 left-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

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
</body>

</html>
