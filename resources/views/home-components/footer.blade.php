<footer class="w-full border-t bg-white">
  <div class="mx-auto max-w-7xl px-6 py-12">
      <div class="grid grid-cols-1 gap-8 md:grid-cols-12 lg:gap-12">
          <div class="md:col-span-5">
              <div class="flex flex-col items-start">
                  <a href="/" class="flex items-center space-x-2">
                      <img src="{{ asset('teamu.png') }}" alt="Teamu Logo" class="h-8 w-auto">
                      <span class="text-xl font-semibold text-gray-900">Teamu Capsule</span>
                  </a>
                  <p class="mt-4 text-sm leading-6 text-gray-600">
                      Capture your memories, lock them in time, and rediscover them when the moment is right.
                  </p>
                  <div class="mt-4 text-xs space-y-1">
                      <p class="text-gray-500">
                          Current Date and Time (UTC):
                          <span class="font-medium text-gray-700">
                              {{ now()->format('Y-m-d H:i:s') }}
                          </span>
                      </p>
                      @auth
                          <p class="text-gray-500">
                              Logged in as:
                              <span class="font-medium text-gray-700">
                                  {{ Auth::user()->name }}
                              </span>
                          </p>
                      @endauth
                  </div>
              </div>
          </div>

          <div class="md:col-span-3">
              <h3 class="text-sm font-semibold leading-6 text-gray-900">Product</h3>
              <ul class="mt-4 space-y-3">
                  <li>
                      <a href="" 
                         class="text-sm text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition-colors duration-200">
                          Features
                      </a>
                  </li>
                  <li>
                      <a href="" 
                         class="text-sm text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition-colors duration-200">
                          FAQ
                      </a>
                  </li>
              </ul>
          </div>

          <div class="md:col-span-2">
              <h3 class="text-sm font-semibold leading-6 text-gray-900">Legal</h3>
              <ul class="mt-4 space-y-3">
                  <li>
                      <a href="" 
                         class="text-sm text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition-colors duration-200">
                          Privacy
                      </a>
                  </li>
                  <li>
                      <a href="" 
                         class="text-sm text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition-colors duration-200">
                          Terms
                      </a>
                  </li>
              </ul>
          </div>

          <div class="md:col-span-2">
              <h3 class="text-sm font-semibold leading-6 text-gray-900">Connect</h3>
              <ul class="mt-4 space-y-3">
                  <li>
                      <a href="mailto:contact@qurtifa.me" 
                         class="group inline-flex items-center gap-x-2 text-sm text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition-colors duration-200">
                          <svg class="h-5 w-5 text-gray-400 group-hover:text-indigo-600 group-focus:text-indigo-600 transition-colors duration-200" 
                               fill="none" 
                               viewBox="0 0 24 24" 
                               stroke-width="1.5" 
                               stroke="currentColor">
                              <path stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                          </svg>
                          Contact
                      </a>
                  </li>
                  <li>
                      <a href="https://twitter.com/teamucapsule" 
                         class="group inline-flex items-center gap-x-2 text-sm text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition-colors duration-200"
                         target="_blank" 
                         rel="noopener noreferrer">
                          <svg class="h-5 w-5 text-gray-400 group-hover:text-indigo-600 group-focus:text-indigo-600 transition-colors duration-200" 
                               fill="currentColor" 
                               viewBox="0 0 24 24">
                              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                          </svg>
                          Twitter
                      </a>
                  </li>
                  <li>
                      <a href="https://github.com/mamatqurtifa/teamu-capsule" 
                         class="group inline-flex items-center gap-x-2 text-sm text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition-colors duration-200"
                         target="_blank" 
                         rel="noopener noreferrer">
                          <svg class="h-5 w-5 text-gray-400 group-hover:text-indigo-600 group-focus:text-indigo-600 transition-colors duration-200" 
                               fill="currentColor" 
                               viewBox="0 0 24 24">
                              <path fill-rule="evenodd" 
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                          </svg>
                          GitHub
                      </a>
                  </li>
              </ul>
          </div>
      </div>

      <div class="mt-12 border-t border-gray-100 pt-8">
          <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
              <p class="text-sm text-gray-500">
                  &copy; {{ now()->year }} Teamu Capsule. All rights reserved.
              </p>

              <a href="/team" class="text-sm text-gray-500">
                  Made with
                  <span class="mx-1 inline-block animate-pulse text-red-500">❤</span>
                  by Teamu - Time and You Team
              </a>
          </div>
      </div>
  </div>
</footer>