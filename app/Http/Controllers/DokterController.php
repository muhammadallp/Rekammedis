<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter =DB::table('users')
        ->select('*')
        ->where('level','dokter')
        ->get();
        return view('dokter.index',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Dokter',
            'active'=>'Dokter',
            'klinik'=>'Klinik',
            'dokter'=>$dokter
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Dokter',
            'active'=>'Dokter',
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
            'nik'=>'required|min:10|unique:users',
            'nama' => 'required|max:255',
            'jk' => 'required',
            'nohp' => 'required|max:13',
            'alamat' => 'required|max:255',
            'status_perkawinan' => 'required',
            'password' => 'required|min:5',
            'level' => 'required',
            'photo' => 'required',
        ]);
        // dd('berhasil');
        $validatedData['password'] =Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/dokter')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $dokter)
    {
       
        return view('dokter.edit',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Dokter',
            'dokter'=>$dokter,
            'active'=>'Dokter',
            'klinik'=>'Klinik',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $dokter)
    {
    
        
        $validatedData = $request->validate([
            'nik'=>'required|min:10',
            'nama' => 'required|max:255',
            'jk' => 'required',
            'nohp' => 'required|max:13',
            'alamat' => 'required|max:255',
            'status_perkawinan' => 'required',
    
        ]);

        // dd($validatedData);
        User::Where('id',$dokter->id)
        ->update($validatedData);
        return redirect('/dokter')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $dokter)
    {
        // dd($dokter->id);
        User::destroy($dokter->id);
        return redirect('/dokter')->with('success', 'Data Berhasil dihapus');
    }
}
