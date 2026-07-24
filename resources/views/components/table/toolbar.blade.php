<div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

    <div class="relative w-full md:max-w-sm">

        <input
            type="text"
            placeholder="Search..."
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">

    </div>

    <div>
        {{ $slot }}
    </div>

</div>