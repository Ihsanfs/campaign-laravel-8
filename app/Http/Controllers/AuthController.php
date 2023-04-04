<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
Use Alert;
use Exception;

// use RealRashid\SweetAlert\Facades\Alert;
class AuthController extends Controller
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

    public function index()
    {

        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'editor') {
                return redirect()->intended('editor');
            }
        }
        return view('login');


            // return redirect()->back()->with('error', 'Terjadi kesalahan. ' . $e->getMessage());

    }


    public function proses_login(Request $request)
    {
        try{
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('email','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == 'admin') {
                    return redirect()->intended('admin')->with('success', 'login berhasil');
                } elseif ($user->level == 'editor') {
                    return redirect()->intended('editor');
                }
            return redirect()->intended('dashboard')->with('success', 'login berhasil');
            }else{
                return back()->with('error', 'username dan password salah');

            }
        }catch(\Exception $e){
            return back()->with('error', 'login gagal');
        }
            // Alert::error('Error Title', 'Error Message');

        // return redirect('login')
        //                         ->withInput()
        //                         ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
