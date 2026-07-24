@extends('layouts.app')

@section('title','Edit Product')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    <div class="rounded-[28px] border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-100/60">

        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-emerald-600">
            Product Management
        </p>

        <h1 class="mt-2 text-3xl font-bold text-slate-900">
            Edit Product
        </h1>

        <p class="mt-2 text-slate-500">
            Update product information with a smoother and more polished layout.
        </p>

    </div>

    <div class="rounded-[28px] border border-slate-200 bg-white p-4 shadow-sm shadow-slate-200/60 sm:p-6">

        <form
            action="{{ route('products.update',$product) }}"
            method="POST"
            enctype="multipart/form-data"
            class="rounded-[24px] border border-slate-200 bg-slate-50/60 p-4 sm:p-6">

            @method('PUT')

            @include('products.partials.form')

        </form>

    </div>

</div>

@endsection