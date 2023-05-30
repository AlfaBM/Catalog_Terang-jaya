<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prof = admin::latest();
        if ($request->input('search')) {
            $prof->where('username', 'LIKE', '%' . $request->input('search') . '%');
        }

        return view('profile.index', [
            'profile' => $prof->where('_id', '!=', session::get('idadmin'))->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new admin;

        $request->validate([
            'username' => 'unique:App\Models\admin,username',
            'password' => 'min:4'
        ]);

        $admin->username = $request->input('username');
        $admin->password = $request->input('password');
        $admin->level = $request->input('level');
        $admin->save();

        session()->flash('succes', 'Data berhasil ditambah');
        return to_route('profile.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prof = admin::all();
        $profile = $prof->find($id);

        return view('profile.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    // public function edit(admin $admin)
    // {
    //     //
    // }

    public function reset($id)
    {
        
        $pwdefault = '1234';

        $data = admin::find($id);
        $data->password = $pwdefault;
        $data->save();

        session()->flash('succes', 'password berhasil di reset' . ' : ' . $pwdefault);
        return to_route('profile.index');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'passwordnew' => 'nullable|min:4'
        ]);

        $data = admin::find($id);

        if ($request->input('passwordnew') == '' and $request->input('username') == $data->username) {
            session()->flash('unchanged', 'data tidak berubah');
            return to_route('profile.show', Session::get('idadmin'));
        } else {
            if (Hash::check($request->input('passwordold'), $data->password)) 
            {
                if ($request->input('passwordnew') != '') {
                    $data->password = $request->input('passwordnew');
                }
                $data->username = $request->input('username');
            } elseif (
                $request->input('passwordnew') == '' and
                $request->input('passwordold') == ''
            )
            {
                $data->username = $request->input('username');
            } else 
            {
                session()->flash('failed', 'password lama salah');
                return to_route('profile.show', Session::get('idadmin'));
            }

            
            $data->save();
            session()->flash('succes', 'data berhasil diedit');
            return to_route('profile.show', Session::get('idadmin'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = admin::find($id);
        $data->delete();
        session()->flash('succes', 'Data berhasil dihapus');
        return to_route('profile.index');
    }
}