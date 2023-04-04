<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\campaign;
use App\Models\donasi;

class DashboardController extends Controller
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


        $donasi = donasi::where('is_active', '1')->count();
        $even = campaign::where('status', '1')->count();



        return view ('back.dashboard', compact('donasi', 'even'))->with('success', 'berhasil login');
    }
}
