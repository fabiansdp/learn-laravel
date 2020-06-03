<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Artist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return view('playlist.playlist', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::all();
        $artists = Artist::all();
        return view('playlist.add-playlist',compact('songs','artists'));
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
            'artistId' => 'required',
            'songTitle' => 'required',
            'optionGenre' => 'required',
            'songYear' => 'required|integer'
        ]);

        try {
            $song = new Song;
            $artist = Artist::findOrFail($request->artistId);

            $song->title = $request->songTitle;
            $song->genre = $request->optionGenre;
            $song->year = $request->songYear;
            $song->artist()->associate($artist);
            $song->save();

            return redirect('/playlist');

        } catch (\Throwable $e) {
            report($e);
            return "Gagal";
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
        $song = Song::findOrFail($id);
        return view('playlist.show-playlist', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $songs = Song::find($id);
        $artists = Artist::all();
        return view('playlist.edit-playlist',compact('songs', 'artists'));
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
            'artistId' => 'required',
            'songTitle' => 'required',
            'optionGenre' => 'required',
            'songYear' => 'required|integer'
        ]);

        try {
            $artist = Artist::findOrFail($request->artistId);
            $song = Song::findOrFail($id);
            $song->title = $request->songTitle;
            $song->genre = $request->optionGenre;
            $song->year = $request->songYear;
            $song->artist()->associate($artist);
            $song->save();
            
            return redirect('/playlist');

        } catch (\Throwable $e) {
            report($e);
            return "Gagal";
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
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect('/playlist');
    }
}
