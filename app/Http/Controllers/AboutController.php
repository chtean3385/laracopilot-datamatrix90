<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $settings = Setting::first();
        
        return view('about', compact('about', 'settings'));
    }
}