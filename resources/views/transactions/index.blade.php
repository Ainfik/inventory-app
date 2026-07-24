@extends('layouts.app')

@section('title', 'Transactions')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Stock Transactions
            </h1>

            <p class="mt-2 text-slate-500">
                Manage incoming and outgoing stock.
            </p>

        </div>

        <a
            href="{{ route('transactions.create') }}"
            class="rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700">

            + New Transaction

        </a>

    </div>

    {{-- Alert --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif

    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <table class="min-w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold">
                        Product
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold">
                        Type
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold">
                        Quantity
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold">
                        Note
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold">
                        Date
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-200">

            @forelse($transactions as $transaction)

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">

                        {{ $transaction->product->name }}

                    </td>

                    <td class="px-6 py-4">

                        @if($transaction->type == 'IN')

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                STOCK IN

                            </span>

                        @else

                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                STOCK OUT

                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4 font-semibold">

                        {{ $transaction->quantity }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $transaction->note }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $transaction->created_at->format('d M Y') }}

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('transactions.edit',$transaction) }}"
                                class="rounded-lg bg-amber-500 px-3 py-2 text-xs font-semibold text-white hover:bg-amber-600">

                                Edit

                            </a>

                            <form
                                action="{{ route('transactions.destroy',$transaction) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this transaction?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">

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
                        class="py-10 text-center text-slate-500">

                        No transaction data available.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div>

        {{ $transactions->links() }}

    </div>

</div>

@endsection