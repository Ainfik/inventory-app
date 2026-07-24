@props([
    'color' => 'indigo'
])

@php
$colors = [
    'indigo' => 'bg-indigo-100 text-indigo-700',
    'emerald' => 'bg-emerald-100 text-emerald-700',
    'rose' => 'bg-rose-100 text-rose-700',
    'amber' => 'bg-amber-100 text-amber-700',
    'slate' => 'bg-slate-100 text-slate-700',
];
@endphp

<span
    {{ $attributes->merge([
        'class' =>
            'inline-flex rounded-full px-3 py-1 text-xs font-semibold ' .
            ($colors[$color] ?? $colors['indigo'])
    ]) }}
>
    {{ $slot }}
</span>