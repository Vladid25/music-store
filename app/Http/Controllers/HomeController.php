<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Отримуємо всі товари
        $products = Product::all();

        // Передаємо товари у вигляд home.blade.php
        return view('home', compact('products'));
    }
}
