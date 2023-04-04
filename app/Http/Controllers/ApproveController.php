<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use App\Models\donasi;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
//     public function approve($id)
// {
//         $data = donasi::findOrFail($id);
//         $data->is_approved = true;
//         $data->approved_by = auth()->user()->id;
//         $data->save();

//         return redirect()->back()->with('success', 'Data has been approved.');
//     }

//     public function notApprove($id)
//     {
//         $data = donasi::findOrFail($id);
//         $data->is_approved = false;
//         $data->approved_by = null;
//         $data->save();

//         return redirect()->back()->with('success', 'Data has been not approved.');
//     }

public function show($id){
    $data = donasi::find($id);
    // dd($data);
    // if(!$data == null){
    //     $data->is_active = 1 ;
    //     $data->save();
    //     return back()->with('error', 'donasi tidak diterima');
    // }elseif($data->is_active == 1){
    //     $raise = campaign::findOrFail($data->campaign_id);
    //     $raise->raised += $data->jumlah;
    //     $raise->save();
    // }

        $data->is_active = 1 ;
        $data->save();
        if($data->is_active == 0){
            $raise = campaign::findOrFail($data->campaign_id);
            $raise->raised -= $data->jumlah;
            $raise->save();
        }elseif($data->is_active == 1){
            $raise = campaign::findOrFail($data->campaign_id);
            $raise->raised += $data->jumlah;
            $raise->save();
        }


        return back()->with('success', 'donasi diterima');

}


public function update($id){
    $data = donasi::find($id);
    // dd($data);

    // if(!$data == null){
    //     $data->is_active = 0 ;
    //     $data->save();
    //     return back()->with('error', 'donasi tidak diterima');
    // }
        $data->is_active = 0 ;
        $data->save();
        if($data->is_active == 0){
            $raise = campaign::findOrFail($data->campaign_id);
            $raise->raised -= $data->jumlah;
            $raise->save();
        }elseif($data->is_active == 1){
            $raise = campaign::findOrFail($data->campaign_id);
            $raise->raised += $data->jumlah;
            $raise->save();
        }
        return back()->with('error', 'donasi tidak diterima');



}




}
