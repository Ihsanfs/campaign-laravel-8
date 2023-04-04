<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(){

        $artikel = Artikel::all();
        // dd($artikel);
        return view ('back.artikel.index',['artikel'=>$artikel]);
    }


    public function create(){

       $kategori_all = kategori::all();;
        return view('back.artikel.create', compact('kategori_all'));
    }

    public function store (Request $request){
        $this->validate($request,[
            'judul'=> 'required',
            'gambar_artikel'=> 'required'
        ]);

       $data = $request->all();
       $data['slug']= Str::slug ($request->judul);
       $data['user_id']= Auth::id();
       $data['body']= $request->body;
       $data['views']= 0;
        $data['gambar_artikel'] =  $request->file('gambar_artikel')->store('artikel');


        Artikel::create($data);

        return redirect()->route('artikel.index')->with(['success' =>'artikel berhasil di tambahkan']);

    }

    public function edit (Request $request,$id){
        $artikel = Artikel::findOrFail($id)->first();

        $kategori_all = kategori::all();


        return view ('back.artikel.edit',compact('artikel','kategori_all'));
    }

    public function update (Request $request, $id){

     if(empty($request->file('gambar_artikel'))){
        $artikel = Artikel::find($id);
        $artikel->update([
            'judul'=>$request->judul,
            'slug'=> Str::slug ($request->judul),
            'user_id'=> Auth::id(),
            'kategori_id'=> $request->kategori_id,
            'body'=> $request->body,
            'is_active'=> $request->is_active,
            'view'=> 0,



        ]);
        return redirect()->route('artikel.index')->with(['success' =>'artikel berhasil di update']);

     }else{

        $artikel = Artikel::find($id);
        Storage::delete($artikel->gambar_artikel);
        $artikel->update([
            'judul'=>$request->judul,
            'slug'=> Str::slug ($request->judul),
            'user_id'=> Auth::id(),
            'kategori_id'=> $request->kategori_id,
            'body'=> $request->body,
            'is_active'=> $request->is_active,
            'view'=> 0,
            'gambar_artikel'=>$request->file('gambar_artikel')->store('artikel'),


        ]);
        return redirect()->route('artikel.index')->with(['success' =>'artikel berhasil di update']);

     }

    }

        public function destroy ($id){

            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            $artikel->delete();
        return back();

    }



}
