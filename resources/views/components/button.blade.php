@props([
    'variant' => 'primary',
    'type' => 'button'
])

@php
$variants = [
    'primary' => 'bg-indigo-600 hover:bg-indigo-700 text-white',
    'secondary' => 'bg-slate-200 hover:bg-slate-300 text-slate-800',
    'success' => 'bg-emerald-600 hover:bg-emerald-700 text-white',
    'danger' => 'bg-rose-600 hover:bg-rose-700 text-white',
    'warning' => 'bg-amber-500 hover:bg-amber-600 text-white',
];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center justify-center rounded-xl px-5 py-2.5
             font-semibold transition-all duration-200 focus:outline-none
             focus:ring-2 focus:ring-offset-2 ' .
             ($variants[$variant] ?? $variants['primary'])
    ]) }}
>
    {{ $slot }}
</button>