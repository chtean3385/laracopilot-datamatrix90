<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Setting;

class GalleryController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);
        
        return view('gallery', compact('galleries', 'settings'));
    }
}