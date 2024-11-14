@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Shopping Cart</h1>
                @if(Session::has('cart') && count(Session::get('cart')) > 0)
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach(Session::get('cart') as $productId => $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['name']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('cart.update', $productId) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="border rounded-lg py-1 px-2 w-16" />
                                            <button type="submit" class="text-blue-600 hover:text-blue-800 ml-2">Update</button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['price'] }} ₴</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['quantity'] * $item['price'] }} ₴</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('cart.remove', $productId) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-800">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-4">
                        <p class="text-lg font-bold">Total: {{ array_sum(array_map(function($item) { return $item['quantity'] * $item['price']; }, Session::get('cart'))) }} ₴</p>
                    </div>
                @else
                    <p class="p-4">Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
@endsection