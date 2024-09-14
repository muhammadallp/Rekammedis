<?php

namespace App\Http\Controllers;

use App\Models\suster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('suster.index',[
        'title'=>'Klinik Pratama Simpang Tiga | Data Petugas',
        'active'=>'Petugas',
        'suster'=>suster::all()
       ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('suster.create',[
        'title'=>'Klinik Pratama Simpang Tiga | Data Petugas',
        'active'=>'Petugas',
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
            'nik'=>'required|min:10|unique:petugas',
            'nama' => 'required|max:255',
            'jk' => 'required',
            'nohp' => 'required|max:13',
            'alamat' => 'required|max:255',
            'foto' => 'required',
        ]);

        Suster::create($validatedData);
        return redirect('/petugas')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\suster  $suster
     * @return \Illuminate\Http\Response
     */
    public function show(suster $suster)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suster  $suster
     * @return \Illuminate\Http\Response
     */
    public function edit(suster $suster)
    {
        return view('suster.edit',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Petugas',
            'active'=>'Petugas',
            'suster'=>$suster
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\suster  $suster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, suster $suster)
    {
        $validatedData = $request->validate([
            'nik'=>'required|min:10|unique:users',
            'nama' => 'required|max:255',
            'jk' => 'required',
            'nohp' => 'required|max:13',
            'alamat' => 'required|max:255',
        ]);

        Suster::where('id',$suster->id)
                ->update($validatedData);
        return redirect('/petugas')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suster  $suster
     * @return \Illuminate\Http\Response
     */
    public function destroy(suster $suster)
    {
        Suster::destroy($suster->id);
        return redirect('/petugas')->with('success', 'Data Berhasil Ditambahkan');
    }
}
