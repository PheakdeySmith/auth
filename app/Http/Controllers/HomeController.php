<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method to return the index view
    public function index()
    {
        return view('admin.index');
    }
}
