<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $data = ['name' => 'Vlad', 'role' => 'Student'];
        
        return view('welcome', $data);
    }

    public function about()
    {
        $data = ['name' => 'Vlad', 'role' => 'Student', 'description' => 'Musician.'];
        return view('about', $data);
    }

    public function contact()
    {
        $data = ['email' => 'v14d06@gmail.com', 'phone' => '+380985929418'];
        return view('contact', $data);
    }
    public function hobbies()
    {
        $data = ['name' => 'Vlad','hobbies' => 'playing guitar'];
        return view('hobbies', $data);
    }
}
