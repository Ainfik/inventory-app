@props([
    'title',
    'value',
    'icon',
    'color' => 'indigo'
])

@php
    $colors = [
        'indigo' => 'bg-indigo-100 text-indigo-600',
        'emerald' => 'bg-emerald-100 text-emerald-600',
        'amber' => 'bg-amber-100 text-amber-600',
        'rose' => 'bg-rose-100 text-rose-600',
    ];
@endphp

<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm font-medium text-slate-500">

                {{ $title }}

            </p>

            <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-800">

                {{ $value }}

            </h2>

        </div>

        <div class="rounded-2xl p-4 {{ $colors[$color] ?? $colors['indigo'] }}">

            {{ $icon }}

        </div>

    </div>

</div>