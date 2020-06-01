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
            'artistName' => 'required',
            'songTitle' => 'required',
            'optionGenre' => 'required',
            'songYear' => 'required|integer'
        ]);

        try {
            $song = new Song;
            $artist_id= Artist::where('name',$request->artistName)->pluck('id');

            $song->artist_id = $artist_id[0];
            $song->title = $request->songTitle;
            $song->genre = $request->optionGenre;
            $song->year = $request->songYear;
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
        $songs = Song::where('id',$id)->get();
        return view('playlist.show-playlist', compact('songs'));
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
            'artistName' => 'required',
            'songTitle' => 'required',
            'optionGenre' => 'required',
            'songYear' => 'required|integer'
        ]);

        try {
            $artist_id= Artist::where('name',$request->artistName)->pluck('id');
            $songDetail = Song::where('id', $id)->update([
                'artist_id' => $artist_id[0],
                'title' => $request->songTitle,
                'genre' => $request->optionGenre,
                'year' => $request->songYear,
                'updated_at' => now()
            ]);
            
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
        $song = Song::find($id);
        $song->delete();

        return redirect('/playlist');
    }
}
