<div {{ $attributes->merge([
    'class' => 'rounded-2xl border border-slate-200 bg-white shadow-sm'
]) }}>

    @isset($header)
        <div class="border-b border-slate-200 px-6 py-4">

            {{ $header }}

        </div>
    @endisset

    <div class="p-6">

        {{ $slot }}

    </div>

</div>