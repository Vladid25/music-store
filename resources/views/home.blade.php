@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <form method="GET" action="{{ route('home') }}" class="flex space-x-4">
                    <select name="sort" id="sort" class="border rounded-md p-2">
                        <option value="">Sort By</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z to A</option>
                    </select>
                    <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" class="border rounded-md p-2" />
                    <button type="submit" class="bg-blue-500 text-black rounded-md p-2">Filter</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full">
                    <div class="aspect-w-16 aspect-h-9 w-full">
                        <img 
                            class="w-full h-64 object-cover object-center" 
                            src="{{ asset($product->image) }}" 
                            alt="{{ $product->name }}"
                        >
                    </div>
                    <div class="p-4 flex-grow">
                        <h5 class="text-lg font-semibold">{{ $product->name }}</h5>
                        <p class="text-gray-700 text-sm mt-2">{{ Str::limit($product->description, 80) }}</p>
                        <p class="text-gray-900 font-bold mt-4">Price: ${{ $product->price }}</p>
                        <a href='{{ route('products.details', $product->id) }}' class="block mt-4 bg-blue-500 text-black text-center py-2 rounded hover:bg-blue-600 transition duration-200">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection