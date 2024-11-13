@extends('layouts.admin.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('admin.products.index') }}"
                       class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 p-6 rounded-lg shadow-md transition duration-300">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Manage Products</h3>
                        <p class="text-gray-600 dark:text-gray-400">View, create, update, and delete music products.</p>
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                       class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 p-6 rounded-lg shadow-md transition duration-300">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Manage Categories</h3>
                        <p class="text-gray-600 dark:text-gray-400">View, create, update, and delete product categories.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection