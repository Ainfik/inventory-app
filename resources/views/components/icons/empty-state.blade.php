@props([
    'title',
    'description'
])

<div class="py-16 text-center">

    <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">

        <x-heroicon-o-folder-open class="h-10 w-10 text-slate-400"/>

    </div>

    <h2 class="text-xl font-bold text-slate-800">

        {{ $title }}

    </h2>

    <p class="mt-2 text-slate-500">

        {{ $description }}

    </p>

</div>