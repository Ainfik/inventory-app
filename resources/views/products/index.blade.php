@extends('layouts.app')


@section('title','Products')


@section('content')


<div class="space-y-6">


    {{-- Header --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">


        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Products
            </h1>


            <p class="mt-1 text-slate-500">
                Manage your inventory products.
            </p>


        </div>



        <a
            href="{{ route('products.create') }}"
            class="rounded-xl bg-indigo-600 px-5 py-3 font-semibold text-white hover:bg-indigo-700">


            + Add Product


        </a>



    </div>





    {{-- Alert --}}
    @if(session('success'))


        <div
            class="rounded-xl bg-emerald-100 px-5 py-4 text-emerald-700">


            {{ session('success') }}


        </div>


    @endif







    {{-- Search --}}
    <div class="rounded-2xl bg-white p-5 shadow-sm">


        <form method="GET">


            <div class="flex flex-col gap-3 md:flex-row">



                <input

                    type="text"

                    name="search"

                    value="{{ request('search') }}"

                    placeholder="Search product name or SKU..."

                    class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">





                <button

                    class="rounded-xl bg-slate-800 px-6 py-3 font-semibold text-white hover:bg-slate-900">


                    Search


                </button>



            </div>



        </form>



    </div>






    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl bg-white shadow-sm">


        <div class="overflow-x-auto">


            <table class="min-w-full divide-y divide-slate-200">


                <thead class="bg-slate-50">


                    <tr>


                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Image
                        </th>


                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Product
                        </th>



                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Category
                        </th>



                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Price
                        </th>



                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Status
                        </th>



                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                            Action
                        </th>



                    </tr>


                </thead>






                <tbody class="divide-y divide-slate-100">



                @forelse($products as $product)



                    <tr class="hover:bg-slate-50">





                        {{-- Image --}}

                        <td class="px-6 py-4">


                            @if($product->image)


                                <img

                                    src="{{ asset('storage/'.$product->image) }}"

                                    class="h-14 w-14 rounded-xl object-cover">


                            @else


                                <div

                                    class="flex h-14 w-14 items-center justify-center rounded-xl bg-slate-100 text-xs text-slate-500">


                                    No Image


                                </div>



                            @endif


                        </td>







                        {{-- Product --}}

                        <td class="px-6 py-4">


                            <div class="font-semibold text-slate-800">


                                {{ $product->name }}


                            </div>


                            <div class="text-sm text-slate-500">


                                SKU:
                                {{ $product->sku }}


                            </div>



                        </td>






                        {{-- Category --}}

                        <td class="px-6 py-4 text-slate-700">


                            {{ $product->category->name }}


                        </td>







                        {{-- Price --}}

                        <td class="px-6 py-4 text-slate-700">


                            Rp {{ number_format($product->price,0,',','.') }}


                        </td>







                        {{-- Status --}}

                        <td class="px-6 py-4">


                            @if($product->status)



                                <span

                                    class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">


                                    Active


                                </span>



                            @else



                                <span

                                    class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">


                                    Inactive


                                </span>



                            @endif



                        </td>








                        {{-- Action --}}

                        <td class="px-6 py-4">


                            <div class="flex justify-center gap-2">



                                <a

                                    href="{{ route('products.edit',$product) }}"

                                    class="rounded-xl bg-amber-500 px-3 py-2 text-sm font-semibold text-white transition hover:bg-amber-600">


                                    Edit


                                </a>





                                <form

                                    action="{{ route('products.destroy',$product) }}"

                                    method="POST"


                                    onsubmit="return confirm('Delete this product?')">


                                    @csrf

                                    @method('DELETE')



                                    <button

                                        class="rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white transition hover:bg-red-700">


                                        Delete


                                    </button>



                                </form>



                            </div>


                        </td>




                    </tr>



                @empty



                    <tr>


                        <td

                            colspan="6"

                            class="px-6 py-12 text-center text-slate-500">


                            No products found.


                        </td>



                    </tr>



                @endforelse




                </tbody>



            </table>



        </div>



    </div>






    {{-- Pagination --}}

    <div>


        {{ $products->links() }}


    </div>




</div>



@endsection