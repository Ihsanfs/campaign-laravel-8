<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;
class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('error')) {


                Alert::html('Error during the creation!', 'error');
            }

            return $next($request);
        });
    }

    public function index(){

        $kategori_all = kategori::all();
        return view ('back.kategori.index', compact('kategori_all'));

    }

    public function create(){

        return view('back.kategori.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'nama_kategori'=> 'required'
        ]);


       kategori::create([
            'nama_kategori'=> $request->nama_kategori,
            'slug'=> Str::slug ($request->nama_kategori)


        ]);

        return redirect()->route('kategori.index')->with(['success' =>'data berhasil di tambahkan']);

    }
    public function show( Artikel $artikel, kategori $slug){

        $kat = kategori::all();
        $artikel = Artikel::latest()->get()->random(1);
        $artikelall= $slug->with('Tampil')->get();
       $artikelterkait = Artikel::latest()->limit(4)->get();
       return view('front.kategori-tampil',compact('kat','slug','artikel','artikelall','artikelterkait'));
    }

    public function edit($id){
       $kategori_all= kategori::find($id);

        return view ('back.kategori.edit',compact('kategori_all'));

    }
    public function update(Request $request, $id){


        $kategori_all = kategori::all();
        $kategori_all = kategori::findOrFail($id);
        $kategori_all['slug']=Str::slug ($request->nama_kategori);
        $kategori_all ->nama_kategori= $request->nama_kategori;
        $kategori_all->save();
        // Alert::success('Success Title', 'Success Message');

        return redirect()->route('kategori.index')->with(['success' =>'Data berhasil di edit']);

    }
}
