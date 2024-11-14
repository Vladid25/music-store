@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Назад
                </a>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 p-4 flex flex-col items-center">
                        <img class="w-full h-64 object-cover rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </div>

                    <div class="w-full md:w-1/2 p-4 flex flex-col justify-between">
                        <div>
                            <div class="text-gray-500 mt-2">
                                Наявність: <span class="font-semibold text-green-600">На складі</span><br>
                            </div>

                            <div class="mt-6">
                                <p class="text-4xl font-bold text-red-600">{{ $product->price }} ₴</p>
                                <p class="text-lg text-gray-400 line-through">45 360 ₴</p>
                                <p class="text-sm text-gray-600">Безкоштовна доставка від 5000 грн</p>
                            </div>
                        </div>

                        <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <div class="flex space-x-4">
                                <input type="number" name="quantity" value="1" min="1" class="border rounded-lg py-2 px-4 w-20 focus:outline-none focus:ring-2 focus:ring-red-500" />
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                                    Купити
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-8 px-6">
                    <h2 class="text-xl font-bold text-gray-800">Опис</h2>
                    <p class="text-gray-700 mt-4">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection