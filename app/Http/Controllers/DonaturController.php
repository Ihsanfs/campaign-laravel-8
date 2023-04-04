<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use App\Models\donasi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Collection;
class DonaturController extends Controller
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



            return $next($request);
        });
    }
    public function cek (donasi $donatur){
    //    $d= campaign::where('slug', $slug)->first();
    $d = $donatur->donasi->get();
        // $d = campaign::find(1)->first();
        dd($d);

    }
    // public function index( campaign $slug){

    //     $data = $slug->donasi->get();
    //     // $even = campaign::where('slug', $slug);
    //     // $even->donasi->get();
    //     dd($data);

    // }

public function store(Request $request, campaign $id){
   try{
    $this->validate($request,[
        'nama'=> 'required',
        'address'=> 'required',
        'phone'=> 'required',
        'pembayaran'=> 'required',
        'gambar'=> 'required'
    ]);
    // $input = $request->deskripsi;


   $data = $request->all();
   $data['nama']= $request->nama;
   $data['address']= $request->address;
   $data['phone']= $request->phone;
   $data['pembayaran']= $request->pembayaran;
   $data['jumlah']= $request->jumlah;
//    $data['is_active']= $request->is_active;
   $data['campaign_id']= $request->campaign_id;
    $data['gambar'] =  $request->file('gambar')->store('donasi');
    $data['is_active']= 0;
   donasi::create($data);
//    $raise = campaign::findOrFail($dona->campaign_id);
//    $raise->raised += $request->jumlah;
//    $raise->save();
//    dd($data);
    return redirect()->back()->with(['success' =>'donasi berhasil di tambahkan']);
}catch (\Exception $e){
    return redirect()->back()
        ->with('error', 'Donasi tidak berhasil di tambahkan, harap cek data anda');
}
}
    public function show($slug){
        // $donasi = donasi::findOrFail($slug);
        // $campaign_all = campaign::all();
        $today = Carbon::now();
        $dona = campaign::where('slug',$slug)->first();
        // $dona = $a->where();

        $donasi = $dona->donasi->where('is_active', '1')->sortDesc();

        // $dona = ampaign::where('slug', '!=', $donatur->slug)
        // ->orderBy('created_at', 'desc')
        // ->latest()
        // ->limit(5)
        // ->get();
        // $collection = collect($donatur);
        // $dona = campaign::where('slug',$donatur)->first();

        // $dona = campaign::where('slug',$donatur)->first();
        $even = campaign::all();
        // $donasi = donasi::find;
        // $even = campaign::where('status', '1')->get();


        // $dona = $slug->get();


        // $dona = campaign::where('slug',$slug)->first();

        // $donasi = donasi::where('campaign_id', $donatur)->first();
        // $dona->$collection;

        // dd($dona);
        // return $donatur;
        // $data = $donatur->with('donasi')->get();
        return view('front.showdonasi',compact('dona','even','donasi','today'));
        // dd($data);
    }
}
