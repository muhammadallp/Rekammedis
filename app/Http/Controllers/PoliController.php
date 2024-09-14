<?php

namespace App\Http\Controllers;

use App\Models\poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('poli.index',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
            'poli'=>poli::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poli.create',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Poli',
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
            'poli'=>'required|unique:poli',
        ]);

        poli::create($validatedData);
        return redirect('/poli')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit(poli $poli)
    {
        return view('poli.edit',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Suster',
            'poli'=>$poli
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poli $poli)
    {
        $validatedData = $request->validate([
            'poli'=>'required',
        ]);

        poli::where('id',$poli->id) 
                ->update($validatedData);
        return redirect('/poli')->with('success', 'Data Berhasil DiEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy(poli $poli)
    {
        poli::destroy($poli->id);
        return redirect('/poli')->with('success', 'Data Berhasil DiHapus');
    }
}
