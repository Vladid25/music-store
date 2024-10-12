@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Back Button -->
            <div class="p-4">
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Назад
                </a>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- Container -->
                <div class="flex flex-wrap -mx-6">
                    <!-- Image Section -->
                    <div class="w-full md:w-1/2 p-6 flex flex-col items-center">
                        <img class="w-full max-h-[400px] object-contain" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">

                        <!-- Thumbnails -->
                        <div class="mt-4 flex space-x-2">
                            <img src="{{ asset('images/' . $product->image) }}" class="w-16 h-16 object-cover border rounded" alt="thumbnail">
                            <img src="{{ asset('images/' . $product->image) }}" class="w-16 h-16 object-cover border rounded" alt="thumbnail">
                            <img src="{{ asset('images/' . $product->image) }}" class="w-16 h-16 object-cover border rounded" alt="thumbnail">
                        </div>

                        <!-- Video Section -->
                        <div class="mt-4">
                            <i class="fas fa-play-circle text-4xl text-gray-600 cursor-pointer"></i>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="w-full md:w-1/2 p-6">
                        <div class="flex justify-between items-start">
                            <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                            <img src="{{ asset('images/logo.png') }}" alt="Brand Logo" class="h-10">
                        </div>

                        <div class="text-gray-500 mt-2">
                            Виробник: <span class="font-semibold">{{ $product->manufacturer ?? 'N/A' }}</span><br>
                            Наявність: <span class="font-semibold text-green-600">На складі</span><br>
                            Код товару: <span class="font-semibold">{{ $product->code ?? 'N/A' }}</span>
                        </div>

                        <!-- Price Section -->
                        <div class="mt-6">
                            <p class="text-4xl font-bold text-red-600">{{ $product->price }} ₴</p>
                            <p class="text-lg text-gray-400 line-through">45 360 ₴</p>
                            <p class="text-sm text-gray-600">Безкоштовна доставка від 5000 грн</p>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="btn bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                                Купити
                            </a>
                            <a href="#" class="btn border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                                Кредит / Розстрочка
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Description -->
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
