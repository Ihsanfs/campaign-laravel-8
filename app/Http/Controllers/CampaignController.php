<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Alert;
class CampaignController extends Controller
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

        $even = campaign::all();

      return view('back.event.index', compact('even'));


    }

    public function show(){
        return view('back.event.create');
    }

    public function create(){
        return view('back.event.create');
    }

    public function store(Request $request){
try{
        $this->validate($request,[
            'title'=> 'required',
            // 'slug'=> 'required',
            'author'=> 'required',
            'thumbnail'=> 'required',
            'body'=> 'required',
            'goals'=> 'required',


        ]);
        // $input = $request->deskripsi;
       $data = $request->all();
    //    $data['title']= $request->title;
       $data['slug']= Str::slug($request->title);
       $data['author']= $request->author;

       $data['body']= $request->body;
       $data['goals']= $request->goals;
       $data['status']= $request->status;

        $data['thumbnail'] =  $request->file('thumbnail')->store('campaign');
        $data['raised'] = 0;
       campaign::create($data);


        return redirect()->route('campaign.index')->with(['success' =>'donasi berhasil di tambahkan']);
    }catch (\Exception $e){
        return redirect()->back()
            ->with('error', 'Donasi tidak berhasil di tambahkan ');
    }

    }
    public function update(Request $request, $id){
try{
        if(empty($request->file('thumbnail'))){
            $even= campaign::find($id);
            $even->update([
                'title'=>$request->title,
                'slug'=> Str::Slug($request->title),
                'author'=> $request->author,
                'body'=> $request->body,
                'goals'=> $request->goals,
                'status'=>$request->status

            ]);
            return redirect()->route('campaign.index')->with(['success' =>'even berhasil di update']);

         }else{

            $even= campaign::find($id);
            Storage::delete($even->thumbnail);
            $even->update([
                'title'=>$request->title,
                'slug'=> Str::Slug($request->title),
                'author'=> $request->author,
                'body'=> $request->body,
                'goals'=> $request->goal,
                'status'=>$request->status,
                'thumbnail'=>$request->file('thumbnail')->store('campaign'),


            ]);
            return redirect()->route('campaign.index')->with(['success' =>'even berhasil di update']);
        }
    }catch (\Exception $e){
        return redirect()->back()
            ->with('error', 'Donasi tidak berhasil di update ');
    }
}

    public function destroy($id){
        $even = campaign::findOrFail($id);
        Storage::delete($even->thumbnail);
        $even->delete();
        return back()->with('success', 'data berhasil di hapus');

    }

    public function edit($id){

        $even = campaign::findOrFail($id);
        return view('back.event.edit', compact('even'));


    }


    public function event(campaign $event){
       $e = $event->with('donasi')->get();
        dd($e);
        // $artikel = campaign::where('slug',$event)->first();
    }



}
