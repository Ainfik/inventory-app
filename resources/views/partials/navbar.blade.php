<header class="sticky top-0 z-30 border-b border-emerald-100 bg-white/80 backdrop-blur">

    <div class="flex h-20 items-center justify-between px-4 sm:px-6 lg:px-8">

        <!-- LEFT -->
        <div class="flex items-center space-x-5">

            <!-- Mobile Menu Button -->
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="rounded-lg p-2 transition hover:bg-emerald-50 lg:hidden">

                <!-- Bars 3 -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.8"
                     stroke="currentColor"
                     class="w-6 h-6">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>

                </svg>

            </button>

            <!-- Title -->

            <div>

                <h1 class="text-2xl font-bold text-slate-900">

                    @yield('title','Dashboard')

                </h1>

                <p class="text-sm text-slate-500">

                    Inventory Management System

                </p>

            </div>

        </div>

        <!-- CENTER -->

        <div class="hidden lg:block">

            <div class="relative">

                <input
                    type="text"
                    placeholder="Search..."
                    class="w-80 rounded-2xl border border-emerald-100 bg-emerald-50/70 py-3 pl-12 pr-4 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">

                <!-- Search Icon -->

                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.8"
                     stroke="currentColor"
                     class="absolute left-4 top-3.5 h-5 w-5 text-slate-400">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/>

                </svg>

            </div>

        </div>

        <!-- RIGHT -->

        <div
            x-data="{open:false}"
            class="flex items-center space-x-5">

            <!-- Notification -->

            <button
                    class="relative rounded-xl p-3 transition hover:bg-emerald-50">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.8"
                     stroke="currentColor"
                     class="w-6 h-6 text-slate-600">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0018 9.75V9A6 6 0 006 9v.75a8.967 8.967 0 00-2.311 6.022c1.733.64 3.57 1.082 5.454 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>

                </svg>

                <span
                    class="absolute top-2 right-2 h-2.5 w-2.5 rounded-full bg-red-500"></span>

            </button>

            <!-- Profile -->

            <div class="relative">

                <button
                    @click="open=!open"
                    class="flex items-center space-x-3 rounded-xl p-2 hover:bg-slate-100 transition">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 to-green-700 text-sm font-bold text-white shadow-lg shadow-emerald-500/30">

                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                    </div>

                    <div class="hidden md:block text-left">

                        <p class="font-semibold text-slate-900">

                            {{ Auth::user()->name }}

                        </p>

                        <p class="text-xs text-slate-500">

                            Administrator

                        </p>

                    </div>

                </button>

                <!-- Dropdown -->

                <div
                    x-show="open"
                    @click.outside="open=false"
                    x-transition
                    class="absolute right-0 mt-3 w-56 rounded-xl border border-slate-200 bg-white shadow-xl">

                    <div class="border-b p-4">

                        <p class="font-semibold">

                            {{ Auth::user()->name }}

                        </p>

                        <p class="text-sm text-slate-500">

                            {{ Auth::user()->email }}

                        </p>

                    </div>

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            class="w-full px-4 py-3 text-left text-red-600 hover:bg-red-50 rounded-b-xl">

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</header>