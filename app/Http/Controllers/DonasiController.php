<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use App\Models\donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alert;
class DonasiController extends Controller
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

    public function index(){

    $donasi = donasi::all();

    return view('back.donasi.index',compact('donasi'));


    }

 public function changestatus(Request $request)

    {

        $user = donasi::find($request->id);

        $user->is_active = $request->is_active;

        $user->save();

        return response()->json(['success'=>'Status change successfully.']);

    }

    public function create(){

        $campaign_all = campaign::all();

        return view('back.donasi.create',compact('campaign_all'));
    }

    public function edit(Request $request,$id){
        $donasi = donasi::findOrFail($id);
        $campaign_all = campaign::all();

        return view ('back.donasi.edit', compact('campaign_all', 'donasi'));

    }


    public function update(Request $request, $id){

        $this->validate($request,['jumlah'=>'required']);

        if(empty($request->file('gambar'))){
            $donasi= donasi::find($id);
            $donasi->update([
                'nama'=>$request->nama,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'pembayaran'=> $request->pembayaran,
                // 'jumlah'=> $request->jumlah,
                'is_active'=> $request->is_active,

                // 'campaign_id'=> $request->campaign_id,

            ]);

            $d = donasi::find($id);
            $total = campaign::findOrFail($d->campaign_id);
            $total->raised -= $d->jumlah;;
            $total->raised += $request->jumlah;;
            $total->save();

                $d->campaign_id = $request->campaign_id;
                $d->jumlah = $request->jumlah;
                $d->save();
            return redirect()->route('donasi.index')->with(['success' =>'donasi berhasil di update']);

         }else{

            $donasi= donasi::find($id);
            Storage::delete($donasi->gambar);
            $donasi->update([
                'nama'=>$request->nama,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'pembayaran'=> $request->pembayaran,
                // 'jumlah'=> $request->jumlah,
                'is_active'=> $request->is_active,
                // 'campaign_id'=> $request->campaign_id,
                'gambar'=>$request->file('gambar')->store('donasi'),


            ]);
            // $raise = campaign::findOrFail($request->campaign_id);
            // $raise = campaign::findOrFail($request->campaign_id);
            $d = donasi::find($id);
            $total = campaign::findOrFail($d->campaign_id);
            $total->raised -= $d->jumlah;
            $total->raised += $request->jumlah;
            $total->save();
                $d->campaign_id = $request->campaign_id;
                $d->jumlah = $request->jumlah;
                $d->save();


            return redirect()->route('donasi.index')->with(['success' =>'donasi berhasil di update']);
    }}


    public function terima($id){
        $data = donasi::findOrFail($id);
        $data->is_active = '1';
        $data->save();
        return back();
        // return redirect()->back()->with('success', 'Data approved successfully');

    }

    // public function cancel($id){
    //     $data = donasi::findOrFail($id);
    //     $data->is_active = '0';
    //     $data->save();
    //     return back();

    //     // return redirect()->back()->with('success', 'Data tidak di terima successfully');
    // }

    // public function approve($id){
    //     $data = donasi::find($id);
    //     $data->is_active = 1 ;
    //     $data->save();
    //     return back();
    //     // return redirect()->back()->with('success', 'Data approved successfully');

    // }

    // public function notapprove($id){
    //     $data = donasi::find($id);
    //     $data->is_active = 0;
    //     dd($data);
    //     $data->save();
    //     return back();

    //     // return redirect()->back()->with('success', 'Data tidak di terima successfully');
    // }


    public function store(Request $request){

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
       $raise = campaign::findOrFail($request->campaign_id);
       $raise->raised += $request->jumlah;
       $raise->save();
        return redirect()->route('donasi.index')->with(['success' =>'donasi berhasil di tambahkan']);
    }catch (\Exception $e){
        return redirect()->back()
            ->with('error', 'Donasi tidak berhasil di tambahkan ');
    }

    }



    public function destroy(Request $request, $id){
        $donasi = donasi::findOrFail($id);
        // $d = donasi::find($id);

        if(!$donasi == null){
            $total = campaign::findOrFail($donasi->campaign_id);
            $total->raised -= $donasi->jumlah;
            $total->save();

            Storage::delete($donasi->gambar);
            $donasi->delete();
            return back()->with('success', 'Data berhasil dihapus');
        }
        // $total = campaign::findOrFail($donasi->campaign_id);
        // $total->raised -= $donasi->jumlah;
        // $total->save();

        // Storage::delete($donasi->gambar);
        // $donasi->delete();
          return back()->with('success', 'data berhasil di hapus');
    }




}
