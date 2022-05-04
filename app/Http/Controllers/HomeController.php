<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function handle(): View
    {
        return view('home');
    }
}
