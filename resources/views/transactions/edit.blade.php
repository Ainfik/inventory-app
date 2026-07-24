@extends('layouts.app')

@section('title', 'Edit Transaction')

@section('content')

<div class="space-y-6">

    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Edit Transaction
            </h1>

            <p class="mt-2 text-slate-500">
                Update stock movement information.
            </p>

        </div>

        <a
            href="{{ route('transactions.index') }}"
            class="rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">

            Back

        </a>

    </div>

    <div class="rounded-2xl bg-white p-8 shadow-sm border border-slate-200">

        <form
            action="{{ route('transactions.update', $transaction) }}"
            method="POST">

            @method('PUT')

            @include('transactions.partials.form')

        </form>

    </div>

</div>

@endsection