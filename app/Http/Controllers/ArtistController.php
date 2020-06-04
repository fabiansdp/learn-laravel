<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Song;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artist.artist', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        return view('artist.create-artist', compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required|integer'
        ]);

        try {
            $artist = new Artist();

            $artist->name = $request->name;
            $artist->gender = $request->gender;
            $artist->age = $request->age;
            $artist->save();

            return redirect('/artist');
        } catch (\Throwable $e) {
            report($e);
            return 'Gagal';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artist.show-artist', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artist.edit-artist', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required|integer'
        ]);

        try {
            $artist = Artist::findOrFail($id)->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'updated_at' => now()
            ]);

            $artist = Artist::findOrFail($id);

            return view('artist.show-artist', compact('artist'));
        } catch (\Throwable $e) {
            report($e);
            return 'Gagal';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $songs = Song::with(['artist'])->findOrFail($id)->delete();
        $artist->delete();

        return redirect('artist');
    }
}
