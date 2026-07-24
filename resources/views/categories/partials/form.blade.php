@csrf

<div class="grid grid-cols-1 gap-5 lg:grid-cols-2">

    {{-- Category Name --}}
    <div class="lg:col-span-2">

        <label
            for="name"
            class="mb-2 block text-sm font-semibold text-slate-700">

            Category Name
        </label>

        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $category->name ?? '') }}"
            placeholder="Enter category name"
            required
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">

    </div>

    {{-- Description --}}
    <div class="lg:col-span-2">

        <label
            for="description"
            class="mb-2 block text-sm font-semibold text-slate-700">

            Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="5"
            placeholder="Describe this category..."
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">{{ old('description', $category->description ?? '') }}</textarea>

    </div>

</div>

<div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-end">

    <a
        href="{{ route('categories.index') }}"
        class="inline-flex items-center justify-center rounded-2xl border border-slate-300 px-5 py-3 font-semibold text-slate-700 transition hover:bg-slate-100">

        Cancel

    </a>

    <button
        type="submit"
        class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-emerald-600 to-green-700 px-5 py-3 font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:scale-[1.01]">

        Save Category

    </button>

</div>