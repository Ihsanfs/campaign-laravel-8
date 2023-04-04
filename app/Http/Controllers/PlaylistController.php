<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use App\Models\Playlist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $playlist = Playlist::all();
       return view('back.playlist.index', compact('playlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_playlist'=> 'required',
            'gambar_playlist'=> 'required'
        ]);
        // $input = $request->deskripsi;
       $data = $request->all();
       $data['slug']= Str::slug ($request->judul_playlist);
       $data['user_id']= Auth::id();
       $data['deskripsi']= $request->deskripsi;
    //    $data = strip_tags($input);
        $data['gambar_playlist'] =  $request->file('gambar_playlist')->store('playlist');


       Playlist::create($data);

        return redirect()->route('playlist.index')->with(['success' =>'playlist berhasil di tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlist = Playlist::findOrFail($id)->first();

        return view ('back.playlist.edit',compact('playlist'));
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
        if(empty($request->file('gambar_playlist'))){
            $playlist = Playlist::find($id);
            $playlist->update([
                'judul_playlist'=>$request->judul_playlist,
                'slug'=> Str::slug ($request->judul_playlist),
                'user_id'=> Auth::id(),
                'deskripsi'=> $request->deskripsi,
                'is_active'=> $request->is_active,


            ]);
            return redirect()->route('playlist.index')->with(['success' =>'playlist berhasil di update']);

         }else{

            $playlist = Playlist::find($id);
            Storage::delete($playlist->gambar_playlist);
            $playlist->update([
                'judul_playlist'=>$request->judul_playlist,
                'slug'=> Str::slug ($request->judul_playlist),
                'user_id'=> Auth::id(),
                'deskripsi'=> $request->deskripsi,
                'is_active'=> $request->is_active,

                'gambar_playlist'=>$request->file('gambar_playlist')->store('playlist'),


            ]);
            return redirect()->route('playlist.index')->with(['success' =>'playlist
             berhasil di update']);
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

        $playlist = playlist::find($id);
        Storage::delete($playlist->gambar_playlist);
        $playlist->delete();
    return back();
    }
}
