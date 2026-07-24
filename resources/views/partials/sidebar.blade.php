<aside class="fixed inset-y-0 left-0 z-40 w-72 flex flex-col border-r border-emerald-100 bg-white/85 shadow-[0_20px_60px_-30px_rgba(5,150,105,0.35)] backdrop-blur">

    {{-- Logo --}}
    <div class="flex h-20 items-center border-b border-emerald-100 px-6">

        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-green-700 text-xl font-bold text-white shadow-lg shadow-emerald-500/30">
            IMS
        </div>

        <div class="ml-4">
            <h2 class="text-lg font-bold text-slate-800">
                Inventory
            </h2>

            <p class="text-sm text-slate-500">
                Management System
            </p>
        </div>

    </div>

    {{-- Navigation --}}
    <div class="flex-1 overflow-y-auto px-4 py-6">

        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
            Main Menu
        </p>

        <nav class="space-y-2">

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 transition duration-200
               {{ request()->routeIs('dashboard')
                    ? 'bg-gradient-to-r from-emerald-600 to-green-700 text-white shadow-lg shadow-emerald-600/20'
                    : 'text-slate-700 hover:bg-emerald-50' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 10.5L12 3l9 7.5V21a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V10.5z"/>

                </svg>

                <span class="font-medium">
                    Dashboard
                </span>

            </a>

            {{-- Categories --}}
            <a href="{{ route('categories.index') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 transition duration-200
               {{ request()->routeIs('categories.*')
                    ? 'bg-gradient-to-r from-emerald-600 to-green-700 text-white shadow-lg shadow-emerald-600/20'
                    : 'text-slate-700 hover:bg-emerald-50' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 7h18M3 12h18M3 17h18"/>

                </svg>

                <span class="font-medium">
                    Categories
                </span>

            </a>

            {{-- Products --}}
            <a href="{{ route('products.index') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 transition duration-200
               {{ request()->routeIs('products.*')
                    ? 'bg-gradient-to-r from-emerald-600 to-green-700 text-white shadow-lg shadow-emerald-600/20'
                    : 'text-slate-700 hover:bg-emerald-50' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M20 7L12 3 4 7l8 4 8-4ZM4 7v10l8 4 8-4V7M12 11v10"/>

                </svg>

                <span class="font-medium">
                    Products
                </span>

            </a>

            {{-- Transactions --}}
            <a href="{{ route('transactions.index') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 transition duration-200
               {{ request()->routeIs('transactions.*') && !request('type')
                    ? 'bg-gradient-to-r from-emerald-600 to-green-700 text-white shadow-lg shadow-emerald-600/20'
                    : 'text-slate-700 hover:bg-emerald-50' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M8 7h12M8 12h12M8 17h12M3 7h.01M3 12h.01M3 17h.01"/>

                </svg>

                <span class="font-medium">
                    Transactions
                </span>

            </a>

            {{-- Stock In --}}
            <a href="{{ route('transactions.index', ['type' => 'IN']) }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 transition duration-200
               {{ request('type') == 'IN'
                    ? 'bg-gradient-to-r from-emerald-500 to-emerald-700 text-white shadow-lg shadow-emerald-500/20'
                    : 'text-slate-700 hover:bg-emerald-50' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 5v14m0 0-5-5m5 5 5-5"/>

                </svg>

                <span class="font-medium">
                    Stock In
                </span>

            </a>

            {{-- Stock Out --}}
            <a href="{{ route('transactions.index', ['type' => 'OUT']) }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 transition duration-200
               {{ request('type') == 'OUT'
                    ? 'bg-gradient-to-r from-rose-500 to-rose-700 text-white shadow-lg shadow-rose-500/20'
                    : 'text-slate-700 hover:bg-rose-50' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 19V5m0 0-5 5m5-5 5 5"/>

                </svg>

                <span class="font-medium">
                    Stock Out
                </span>

            </a>

        </nav>

    </div>

    {{-- Footer --}}
    <div class="border-t border-slate-200 p-4">

        <div class="rounded-xl bg-slate-50 p-4">

            <p class="font-semibold text-slate-800">
                {{ Auth::user()->name }}
            </p>

            <p class="text-sm text-slate-500">
                Administrator
            </p>

        </div>

    </div>

</aside>