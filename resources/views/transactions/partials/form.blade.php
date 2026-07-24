@csrf

<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

    {{-- Product --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-slate-700">
            Product
        </label>

        <select
            name="product_id"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:ring-indigo-500"
            required>

            <option value="">Select Product</option>

            @foreach($products as $product)
                <option
                    value="{{ $product->id }}"
                    @selected(old('product_id', $transaction->product_id ?? '') == $product->id)>

                    {{ $product->name }}

                    (Stock :
                    {{ $product->current_stock }}
                    )

                </option>
            @endforeach

        </select>

        @error('product_id')
            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Type --}}
    <div>

        <label class="mb-2 block text-sm font-medium text-slate-700">
            Transaction Type
        </label>

        <select
            name="type"
            class="w-full rounded-xl border border-slate-300 px-4 py-3">

            <option
                value="IN"
                @selected(old('type', $transaction->type ?? '') == 'IN')>

                Stock IN

            </option>

            <option
                value="OUT"
                @selected(old('type', $transaction->type ?? '') == 'OUT')>

                Stock OUT

            </option>

        </select>

        @error('type')
            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>
        @enderror

    </div>

</div>


<div class="mt-6">

    <label class="mb-2 block text-sm font-medium text-slate-700">
        Quantity
    </label>

    <input
        type="number"
        name="quantity"
        min="1"
        value="{{ old('quantity', $transaction->quantity ?? '') }}"
        class="w-full rounded-xl border border-slate-300 px-4 py-3">

    @error('quantity')
        <p class="mt-1 text-sm text-red-500">
            {{ $message }}
        </p>
    @enderror

</div>


<div class="mt-6">

    <label class="mb-2 block text-sm font-medium text-slate-700">
        Note
    </label>

    <textarea
        name="note"
        rows="4"
        class="w-full rounded-xl border border-slate-300 px-4 py-3">{{ old('note', $transaction->note ?? '') }}</textarea>

    @error('note')
        <p class="mt-1 text-sm text-red-500">
            {{ $message }}
        </p>
    @enderror

</div>


<div class="mt-8 flex justify-end gap-3">

    <a
        href="{{ route('transactions.index') }}"
        class="rounded-xl border border-slate-300 px-5 py-3 hover:bg-slate-100">

        Cancel

    </a>

    <button
        class="rounded-xl bg-indigo-600 px-5 py-3 font-medium text-white hover:bg-indigo-700">

        Save Transaction

    </button>

</div>