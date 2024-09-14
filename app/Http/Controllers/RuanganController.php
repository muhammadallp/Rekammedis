<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ruangan.index',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Ruangan',
            'ruangan'=>Ruangan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Ruangan',
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
            'ruangan' => 'required|max:255',

        ]);
        Ruangan::create($validatedData);
        return redirect('/ruangan')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
       return view('ruangan.edit',[
        'title'=>'Klinik Pratama Simpang Tiga | Data Ruangan',
        'ruangan'=>$ruangan
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $validatedData = $request->validate([
            'ruangan' => 'required|max:255',

        ]);
        Ruangan::where('id',$ruangan->id)
        ->update($validatedData);
        return redirect('/ruangan')->with('success', 'Data Berhasil DiEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        Ruangan::destroy($ruangan->id);
        return redirect('/ruangan')->with('success', 'Data Berhasil DiHapus');
    }
}
