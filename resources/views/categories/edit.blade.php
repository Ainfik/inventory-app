@extends('layouts.app')

@section('title','Edit Category')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    <x-alert />

    <div class="rounded-[28px] border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-100/60">

        <div class="mb-6">

            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-emerald-600">
                Category Management
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-900">
                Edit Category
            </h1>

            <p class="mt-2 text-slate-500">
                Update category information with a cleaner, more structured layout.
            </p>

        </div>

        <form
            action="{{ route('categories.update',$category) }}"
            method="POST"
            class="rounded-[24px] border border-slate-200 bg-slate-50/60 p-4 sm:p-6">

            @csrf

            @method('PUT')

            @include('categories.partials.form')

        </form>

    </div>

</div>

@endsection