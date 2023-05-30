<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function autentikasi(Request $request)
    {
        $admin = admin::where('username', '=', $request->input('username'))->first();
        if ($admin){
            
            if (Hash::check($request->input('password'), $admin->password)) {
                if ($admin->level == 'admin') {
                    session()->put('admin', 'True');
                }else {
                    session()->put('superadmin', 'True');
                }
                session()->put('idadmin', $admin->id);
                return to_route('Catalog.admin.index', $admin);
            } else {
                session()->flash('failed', 'Password salah');
                return redirect('/login');
            }
        } else {
            session()->flash('failed', 'Username Tidak ada');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Session::flush();

        return redirect('/login');

    }
}