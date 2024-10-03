<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        // Отримуємо всі товари
        $products = Product::all();

        // Передаємо товари у вигляд home.blade.php
        return view('home', compact('products'));
    }
}
