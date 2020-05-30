<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function playlist()
    {
        $songs = Song::all();
        return view('pages.playlist')->with('songs', $songs);
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
