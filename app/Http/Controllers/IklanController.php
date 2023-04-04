<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklan = Iklan::all();
        return view ('back.iklan.index',compact('iklan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.iklan.create');
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
            'judul_iklan'=> 'required',
            'gambar_iklan'=> 'required'
        ]);
        // $input = $request->deskripsi;
       $data = $request->all();
       $data['judul_iklan']= $request->judul_iklan;
       $data['link']= $request->link;

    //    $data = strip_tags($input);
        $data['gambar_iklan'] =  $request->file('gambar_iklan')->store('iklan');


       Iklan::create($data);

        return redirect()->route('iklan.index')->with(['success' =>'iklan berhasil di tambahkan']);
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
        $iklan = iklan::findOrFail($id)->first();

        return view ('back.iklan.edit',compact('iklan'));
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
        if(empty($request->file('gambar_iklan'))){
            $iklan = iklan::find($id);
            $iklan->update([
                'judul_iklan'=>$request->judul_iklan,
                'link'=> $request->link,
                'is_active'=> $request->is_active,


            ]);
            return redirect()->route('iklan.index')->with(['success' =>'iklan berhasil di update']);

         }else{

            $iklan = iklan::find($id);
            Storage::delete($iklan->gambar_iklan);
            $iklan->update([
                'judul_iklan'=>$request->judul_iklan,
                'link'=> $request->link,
                'is_active'=> $request->is_active,

            ]);
            return redirect()->route('iklan.index')->with(['success' =>'iklan
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
        $iklan = iklan::find($id);
        Storage::delete($iklan->gambar_iklan);
        $iklan->delete();
    return back();
    }
}
