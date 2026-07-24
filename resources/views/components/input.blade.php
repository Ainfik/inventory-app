@props([
    'type' => 'text'
])

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'w-full rounded-xl border border-slate-300 bg-white px-4 py-3
             shadow-sm outline-none transition
             focus:border-indigo-500
             focus:ring-4
             focus:ring-indigo-100'
    ]) }}
>s