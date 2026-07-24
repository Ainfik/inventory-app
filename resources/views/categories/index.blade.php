@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="space-y-6">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Flash Message --}}
    @if(session('error'))
        <div class="rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
            {{ session('error') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if($errors->any())
        <div class="rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col gap-4 rounded-[28px] border border-emerald-100 bg-white p-6 shadow-sm shadow-emerald-100/60 md:flex-row md:items-center md:justify-between">

        <div>
            <h1 class="text-3xl font-bold text-slate-900">
                Categories
            </h1>

            <p class="mt-1 text-slate-500">
                Organize product groups for a cleaner inventory workflow.
            </p>
        </div>

        <a
            href="{{ route('categories.create') }}"
            class="inline-flex items-center rounded-2xl bg-gradient-to-r from-emerald-600 to-green-700 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:scale-[1.02]">

            + Add Category

        </a>

    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('categories.index') }}">

        <div class="flex flex-col gap-3 md:flex-row">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search category..."
                class="w-full rounded-2xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">

            <button
                type="submit"
                class="rounded-2xl bg-gradient-to-r from-emerald-600 to-green-700 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:scale-[1.01]">

                Search

            </button>

        </div>

    </form>

    {{-- Table --}}
    <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm shadow-slate-200/60">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200 text-sm">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">
                            Name
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">
                            Description
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">
                            Created
                        </th>

                        <th class="px-6 py-3 text-center text-sm font-semibold text-slate-700">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 bg-white">

                    @forelse($categories as $category)

                        <tr class="hover:bg-emerald-50/40">

                            <td class="px-6 py-4 font-semibold text-slate-900">
                                {{ $category->name }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $category->description ?: '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $category->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('categories.edit', $category) }}"
                                        class="rounded-xl bg-amber-500 px-3 py-2 text-sm font-medium text-white transition hover:bg-amber-600">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this category?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-xl bg-rose-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-rose-700">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="px-6 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-14 w-14 text-slate-300"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.5"
                                              d="M9 12h6m-3-3v6M4 6h16v12H4z"/>

                                    </svg>

                                    <h3 class="mt-4 text-lg font-semibold text-slate-700">

                                        No Categories

                                    </h3>

                                    <p class="mt-2 text-slate-500">

                                        Create your first category to start managing products.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- Pagination --}}
    <div>

        {{ $categories->links() }}

    </div>

</div>

@endsection