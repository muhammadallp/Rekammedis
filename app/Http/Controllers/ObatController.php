<?php

namespace App\Http\Controllers;

use App\Models\obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('obat.index',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Obat',
            'active'=>'Obat',
            'klinik'=>'Klinik',
            'obat' =>obat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('obat.create',[
        'title'=>'Klinik Pratama Simpang Tiga | Data Obat',
        'active'=>'Obat',
        'klinik'=>'Klinik',

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
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jns_obat' => 'required',
            'stok' => 'required|max:13',
            'harga_obat' => 'required|max:13',
        ]);
        obat::create($validatedData);
        return redirect('/obat')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(obat $obat)
    {
       return view('obat.edit',[
        'title'=>'Klinik Pratama Simpang Tiga | Data Obat',
        'active'=>'Obat',
        'klinik'=>'Klinik',
        'obat'=>$obat
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, obat $obat)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jns_obat' => 'required',
            'stok' => 'required|max:13',
            'harga_obat' => 'required|max:13',
        ]);
        obat::where('id',$obat->id) 
        ->update($validatedData);
        return redirect('/obat')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(obat $obat)
    {
        obat::destroy($obat->id);
        return redirect('/obat')->with('success', 'Data Berhasil Ditambahkan');
    }
}
