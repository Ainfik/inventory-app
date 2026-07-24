@csrf

<div class="grid grid-cols-1 gap-5 lg:grid-cols-2">

    {{-- Product Name --}}
    <div class="lg:col-span-2">
        <label class="mb-2 block text-sm font-semibold text-slate-700">
            Product Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $product->name ?? '') }}"
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            placeholder="Enter product name">

        @error('name')
            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Category --}}
    <div>

        <label class="mb-2 block text-sm font-semibold text-slate-700">
            Category
        </label>

        <select
            name="category_id"
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id',$product->category_id ?? '') == $category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        @error('category_id')
            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- SKU --}}
    <div>

        <label class="mb-2 block text-sm font-semibold text-slate-700">
            SKU
        </label>

        <input
            type="text"
            name="sku"
            value="{{ old('sku',$product->sku ?? '') }}"
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            placeholder="SKU001">

        @error('sku')
            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Price --}}
    <div>

        <label class="mb-2 block text-sm font-semibold text-slate-700">
            Price
        </label>

        <input
            type="number"
            name="price"
            value="{{ old('price',$product->price ?? '') }}"
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">

        @error('price')
            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Status --}}
    <div>

        <label class="mb-2 block text-sm font-semibold text-slate-700">
            Status
        </label>

        <select
            name="status"
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">

            <option value="1"
                @selected(old('status',$product->status ?? 1)==1)>
                Active
            </option>

            <option value="0"
                @selected(old('status',$product->status ?? 1)==0)>
                Inactive
            </option>

        </select>

    </div>

    {{-- Image --}}
    <div>

        <label class="mb-2 block text-sm font-semibold text-slate-700">
            Product Image
        </label>

        <input
            type="file"
            name="image"
            class="block w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3">

        @if(isset($product) && $product->image)
            <img
                src="{{ asset('storage/'.$product->image) }}"
                class="mt-4 h-32 w-32 rounded-2xl border border-slate-200 object-cover">
        @endif

    </div>

    {{-- Description --}}
    <div class="lg:col-span-2">

        <label class="mb-2 block text-sm font-semibold text-slate-700">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full rounded-2xl border border-emerald-100 bg-white px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">{{ old('description',$product->description ?? '') }}</textarea>

    </div>

</div>

<div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-end">

    <a
        href="{{ route('products.index') }}"
        class="inline-flex items-center justify-center rounded-2xl border border-slate-300 px-5 py-3 font-semibold text-slate-700 transition hover:bg-slate-100">

        Cancel

    </a>

    <button
        class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-emerald-600 to-green-700 px-5 py-3 font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:scale-[1.01]">

        Save Product

    </button>

</div>