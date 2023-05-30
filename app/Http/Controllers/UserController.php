<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = catalog::latest();
        
        if ($request->input('search')) {
            $user->where('nama', 'LIKE', '%' . $request->input('search') . '%');
        }
        if($request->input('category')){
            $user->where('category_id',$request->input('category'));
        }
        if ($request->input('harga')) {
            $harga = explode('-', $request->input('harga'));
            $user->whereBetween('harga', [intval($harga[0]),intval($harga[1])]);
        }
        if ($request->input('produsen')) {
            $user->where('produsen', 'LIKE', '%' . $request->input('produsen') . '%');
        }

        return view('user.index', [
            'catalog' => $user->paginate(12),
            'category' => category::all(),
            'produsen' => catalog::groupBy('produsen')->orderBy('produsen')->get()
        ]);
    }

    public function show($id)
    {
        $user = catalog::find($id);

        return view('user.show', [
            'catalog' => $user
        ]);
    }
}
