<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{

    protected $artikel;
    public function __construct()
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->artikel = artikel::select('id')->get();
    }
    public function details (){


    }

    public function index(){


        // return view ('front.kategori-tampil',compact('kategori_all','artikel_all', 'data'));
    }

    public function show ( kategori $detail_kategori){

        $data = $detail_kategori->artikel()->get();
        // $data = kategori::where('slug', $kategori)->get();
        // $data =->get();
        $kategori_all = kategori::all();
        // dd($data)
        return view('front.kategori-tampil',compact('data','kategori_all'));

    }
}
