@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold">{{ $product->name }}</h5>
                        <p class="text-gray-700 text-sm mt-2">{{ Str::limit($product->description, 80) }}</p>
                        <p class="text-gray-900 font-bold mt-4">Price: ${{ $product->price }}</p>
                        <a href='{{ route('products.details', $product->id) }}' class="block mt-4 bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition duration-200">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
