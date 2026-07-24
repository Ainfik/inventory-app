<div class="rounded-2xl bg-white p-6 shadow-sm">


    <div class="flex items-center justify-between">


        <div>

            <p class="text-sm text-slate-500">
                {{ $title }}
            </p>


            <h2 class="mt-2 text-3xl font-bold text-slate-800">
                {{ $value }}
            </h2>

        </div>



        <div
            class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">


            @if($icon === 'product')

                📦

            @elseif($icon === 'category')

                🗂️

            @elseif($icon === 'transaction')

                🔄

            @else

                📊

            @endif


        </div>


    </div>


</div>