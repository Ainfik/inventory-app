@if(session('success'))

<div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-700">

    {{ session('success') }}

</div>

@endif

@if($errors->any())

<div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4">

    <ul class="list-disc space-y-1 pl-5 text-sm text-rose-700">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif