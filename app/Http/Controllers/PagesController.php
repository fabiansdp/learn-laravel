<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    
    public function blog()
    {
        return view('pages.blog');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
