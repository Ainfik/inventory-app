@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-6">

    <div class="rounded-[28px] border border-emerald-100 bg-gradient-to-r from-emerald-600 via-green-600 to-emerald-700 p-6 text-white shadow-[0_20px_60px_-24px_rgba(22,163,74,0.9)] sm:p-8">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <p class="text-sm font-medium text-emerald-100">
                    Inventory Overview
                </p>

                <h1 class="mt-2 text-3xl font-bold sm:text-4xl">
                    Welcome back, {{ Auth::user()->name }}
                </h1>

                <p class="mt-2 max-w-2xl text-sm text-emerald-50 sm:text-base">
                    A cleaner and more focused dashboard for monitoring stock, product activity, and daily inventory health.
                </p>

            </div>

            <div class="rounded-2xl bg-white/15 px-4 py-3 backdrop-blur">
                <p class="text-xs uppercase tracking-[0.25em] text-emerald-100">
                    Live Status
                </p>
                <p class="mt-2 text-lg font-semibold">
                    {{ now()->format('d M Y') }}
                </p>
            </div>

        </div>

    </div>

    {{-- Statistic --}}
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-3xl border border-emerald-100 bg-white p-5 shadow-sm shadow-emerald-100/70">

            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">
                    Categories
                </p>
                <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                    Total
                </span>
            </div>

            <h2 class="mt-4 text-4xl font-bold text-emerald-700">
                {{ $totalCategories }}
            </h2>

        </div>

        <div class="rounded-3xl border border-emerald-100 bg-white p-5 shadow-sm shadow-emerald-100/70">

            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">
                    Products
                </p>
                <span class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700">
                    Active
                </span>
            </div>

            <h2 class="mt-4 text-4xl font-bold text-green-700">
                {{ $totalProducts }}
            </h2>

        </div>

        <div class="rounded-3xl border border-amber-100 bg-white p-5 shadow-sm shadow-amber-100/70">

            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">
                    Current Stock
                </p>
                <span class="rounded-full bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700">
                    Units
                </span>
            </div>

            <h2 class="mt-4 text-4xl font-bold text-amber-600">
                {{ $currentStock }}
            </h2>

        </div>

        <div class="rounded-3xl border border-rose-100 bg-white p-5 shadow-sm shadow-rose-100/70">

            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">
                    Transactions Today
                </p>
                <span class="rounded-full bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-700">
                    Activity
                </span>
            </div>

            <h2 class="mt-4 text-4xl font-bold text-rose-600">
                {{ $transactionsToday }}
            </h2>

        </div>

    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-[1.6fr_1fr]">

        {{-- Recent Transaction --}}
        <div class="rounded-[28px] border border-slate-200 bg-white shadow-sm shadow-slate-200/60">

            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">

                <h2 class="text-lg font-semibold text-slate-900">
                    Recent Transactions
                </h2>

                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                    Latest Updates
                </span>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full text-sm">

                    <thead class="bg-slate-50 text-slate-500">

                    <tr>

                        <th class="px-6 py-3 text-left font-semibold">
                            Product
                        </th>

                        <th class="px-6 py-3 text-left font-semibold">
                            Type
                        </th>

                        <th class="px-6 py-3 text-left font-semibold">
                            Qty
                        </th>

                        <th class="px-6 py-3 text-left font-semibold">
                            Date
                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($recentTransactions as $transaction)

                        <tr class="border-b border-slate-100 last:border-b-0">

                            <td class="px-6 py-4 font-medium text-slate-700">

                                {{ $transaction->product->name }}

                            </td>

                            <td class="px-6 py-4">

                                @if($transaction->type=='IN')

                                    <span class="rounded-full bg-emerald-50 px-3 py-1 font-semibold text-emerald-700">

                                        IN

                                    </span>

                                @else

                                    <span class="rounded-full bg-rose-50 px-3 py-1 font-semibold text-rose-700">

                                        OUT

                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-slate-700">

                                {{ $transaction->quantity }}

                            </td>

                            <td class="px-6 py-4 text-slate-500">

                                {{ $transaction->created_at->format('d M Y H:i') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="px-6 py-8 text-center text-slate-500">

                                No transactions available.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Low Stock --}}
        <div class="rounded-[28px] border border-rose-100 bg-white shadow-sm shadow-rose-100/60">

            <div class="border-b border-rose-100 px-6 py-4">

                <h2 class="text-lg font-semibold text-rose-600">
                    Low Stock Products
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full text-sm">

                    <thead class="bg-rose-50 text-rose-700">

                    <tr>

                        <th class="px-6 py-3 text-left font-semibold">
                            Product
                        </th>

                        <th class="px-6 py-3 text-left font-semibold">
                            Stock
                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($lowStockProducts as $product)

                        <tr class="border-b border-rose-50">

                            <td class="px-6 py-4 font-medium text-slate-700">

                                {{ $product->name }}

                            </td>

                            <td class="px-6 py-4">

                                <span class="font-bold text-rose-600">

                                    {{ $product->current_stock }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="2" class="px-6 py-8 text-center text-slate-500">

                                No low stock products.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection