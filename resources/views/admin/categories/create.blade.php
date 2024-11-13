@extends('layouts.admin.admin')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-2xl">
    <h1 class="text-3xl font-bold mb-8 text-gray-900">Create New Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white rounded-lg shadow-lg p-8 space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="name" name="name" required>
        </div>

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 text-black font-semibold rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Create Category
        </button>
    </form>
</div>
@endsection