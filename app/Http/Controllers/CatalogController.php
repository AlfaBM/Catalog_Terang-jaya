<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use App\Models\category;
use Illuminate\Http\Request;
use MongoDB\Operation\Aggregate;
use Jenssegers\Mongodb\Relations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $catalog = catalog::latest();
        if ($request->input('search')) {
            $catalog->where('nama', 'LIKE', '%' . $request->input('search') . '%')
                ->orWhere('deskripsi', 'LIKE', '%' . $request->input('search') . '%')
                ->orWhere('produsen', 'LIKE', '%' . $request->input('search') . '%');
        }

        return view('Catalog.admin.index', [
            'sort' => $catalog->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('Catalog.admin.create', [
            'cat' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catalog = new catalog;

        $request->validate([
            'gambar' => 'image',
            'deskripsi' => 'required|max:1000',
            'harga' => 'required|numeric',
            'ukuran' => 'required|regex:/^[\w\-\s]+$/'
        ]);

        $ukuranfix = preg_replace('/\s+/', '', $request->input('ukuran'));

        if ($request->file('gambar')) {
            $catalog->gambar = $request->file('gambar')->store('gambar');
        } else {
            $catalog->gambar = null;
        }

        $catalog->nama = $request->input('nama');
        $catalog->deskripsi = $request->input('deskripsi');
        $catalog->ukuran = $ukuranfix;
        $catalog->harga = $request->input('harga');
        $catalog->category_id = $request->input('category');
        $catalog->produsen = $request->input('produsen');
        $catalog->save();

        session()->flash('succes', 'Data berhasil ditambah');
        return to_route('Catalog.admin.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(catalog $catalog)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catbyid = catalog::find($id);
        $category = category::all();
        return view('Catalog.admin.edit', [
            'catalog' => $catbyid,
            'category' => $category
        ]);
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
        $request->validate([
            'gambar' => 'image',
            'deskripsi' => 'required|max:1000',
            'harga' => 'required|regex:([A-Za-z0-9]+(\.[A-Za-z0-9]+)+)',
            'ukuran' => 'required|regex:/^[\w\-\s]+$/',
            'category' => 'required'
        ]);

        $datafile = catalog::find($id);

        $intmoney = preg_replace('/[^0-9]/', '', $request->input('harga'));

        $ukuranfix = preg_replace('/\s+/', '', $request->input('ukuran'));

        if ($request->file('gambarnew')) {
            if ($datafile->gambar) {
                preg_match(
                    '/gambar\/([A-Za-z0-9]*).(jpg|JPG|PNG|png|jpeg|JPEG|bmp|BMP|gif|GIF|svg|SVG|webp|WEBP)*/',
                    $datafile->gambar,
                    $filename
                );
                $namagmbr = $filename[1] . '.' . $filename[2];
                $datafile->gambar = $request->file('gambarnew')->storeAs('gambar', $namagmbr);
            } else {
                $datafile->gambar = $request->file('gambarnew')->store('gambar');
            }
        };

        $datafile->nama = $request->input('nama');
        $datafile->deskripsi = $request->input('deskripsi');
        $datafile->ukuran = $ukuranfix;
        $datafile->harga = intval($intmoney);
        $datafile->category_id = $request->input('category');
        $datafile->produsen = $request->input('produsen');

        $datafile->save();
        session()->flash('succes', 'Data berhasil diedit');
        return to_route('Catalog.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = catalog::find($id);
        if ($del->gambar) {
            $path = public_path() . '/storage/' . $del->gambar;
            unlink($path);
        }

        $del->delete();
        session()->flash('succes', 'Data berhasil dihapus');
        return to_route('Catalog.admin.index');
    }
}
