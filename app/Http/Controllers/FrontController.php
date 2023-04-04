<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\campaign;
use App\Models\donasi;
use App\Models\Iklan;
use App\Models\kategori;
use App\Models\Slide;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt     = Carbon::now();

        $kategori_all = kategori::all();
        $artikel = Artikel::where('is_active', '1')->get();
        $slide = Slide::all();
        $even = campaign::all();
        $donasi = donasi::all();;

        $j = 5000000;
        $r = 2000000;
        $persen = ($r / $j) * 100;

        // dd($persen);

        return view('front.index',[
            'kategori_all'=>$kategori_all,
            'artikel'=>$artikel,
            'slide'=>$slide,
        'persen'=>$persen,
            'even'=>$even,
            'donasi'=>$donasi

    ]);
    }



     public function detail($slug){

     }


     public function event(Request $request){
        $donasi = donasi::where('is_active', '1')->get();
        $even = campaign::where('status', '1')->get();
        $slide = Slide::all();
        $g = campaign::first();
        // $deadline = Carbon::parse($g->deadline);


        return view('front.donasi', compact('even','donasi', 'slide'));
     }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function cek(){

    }

    public function show($slug)
    {

        $artikel = Artikel::where('slug',$slug)->first();
        $kategori_all = kategori::all();

        $iklan = Iklan::where('id', 1)->first();

        $postinganterbaru = Artikel::OrderBy('created_at', 'DESC')->limit('5')->get();
        $a = Artikel::all();
        return view ('front.detail',
        ['artikel'=>$artikel,
        'kategori_all'=>$kategori_all,
        'iklan'=>$iklan,
        'postinganterbaru'=>$postinganterbaru,
        'a'=>$a
    ]);

    }

    public function detail_kategori(kategori $kategori){


        $kategori_all = kategori::all();
        $artikel = Artikel::latest()->get()->random(2);
       $artikelall = $kategori->with('artikel')->get();
       $artikelterkait = Artikel::latest()->limit(4)->get();
       return view('front.kategori-tampil',['kategori_all'=>$kategori_all, 'artikel'=>$artikel, 'artikelall'=>$artikelall, 'artikelterkait'=>$artikelterkait]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}
?>
