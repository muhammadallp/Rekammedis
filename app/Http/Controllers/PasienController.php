<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use App\Models\poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = DB::table('pasien')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->select('pasien.*','poli.poli')
        ->get();

       return view('pasien.index',[
        'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
        'pasien'=>$pasien,
        'active'=>'Pasien',
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $lastProductId = Pasien::latest('id')->first()->id ?? 0;
    $newProductId = $lastProductId + 1;
    $kodeProduk = 'PSN-' . str_pad($newProductId, 4, '0', STR_PAD_LEFT);

        return view('pasien.create',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
            'active'=>'Pasien',
            'poli'=>poli::all(),
            'pasien'=>$kodeProduk   
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
            'id_poli'=>'required',
            'nip'=>'required',
            'nama_pasien' => 'required|max:255',
            'jk' => 'required',
            'nohp' => 'required|max:13',
            'alamat' => 'required|max:255',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_perkawinan' => 'required',
        ]);

        pasien::create($validatedData);
        return redirect('/pasien')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(pasien $pasien)
    {
        $detailpasien = DB::table('pasien')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->select('pasien.*','poli.poli')
        ->where('pasien.id', $pasien->id)
        ->first();
        $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->join('ruangan', 'rekammedis.id_ruangan', '=', 'ruangan.id')
        ->select('rekammedis.*','pasien.id_poli', 'poli.poli','ruangan.ruangan')
        ->where('rekammedis.id_pasien', $pasien->id)
        ->where('rekammedis.status', '=', '2')
        ->get();
            $obat = DB::table('rekammedisdetail')
        ->join('obat', 'rekammedisdetail.id_obat', '=', 'obat.id')
        ->select('rekammedisdetail.*','obat.*')
        ->get();
        
       return view('pasien.view',[
        'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
        'active'=>'Pasien',
        'pasien'=>$detailpasien,
        'rekam'=>$rekammedis,
        'obat'=>$obat
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(pasien $pasien)
    {
        return view('pasien.edit',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Suster',
            'active'=>'Pasien',
            'pasien'=>$pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pasien $pasien)
    {
        $validatedData = $request->validate([
            'nip'=>'required',
            'nama_pasien' => 'required|max:255',
            'jk' => 'required',
            'nohp' => 'required|max:13',
            'alamat' => 'required|max:255',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_perkawinan' => 'required',
        ]);

        pasien::where('id',$pasien->id) 
                ->update($validatedData);
        return redirect('/pasien')->with('success', 'Data Berhasil DiEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(pasien $pasien)
    {
        pasien::destroy($pasien->id);
        return redirect('/pasien')->with('success', 'Data Berhasil DiHapus');
    }

    public function laporanpasien($laporan)
    {
    
        $detailpasien = DB::table('pasien')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->select('pasien.*','poli.poli')
        ->where('pasien.id', $laporan)
        ->first();
        $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->join('ruangan', 'rekammedis.id_ruangan', '=', 'ruangan.id')
        ->select('rekammedis.*','pasien.id_poli', 'poli.poli','ruangan.ruangan')
        ->where('rekammedis.id_pasien', $laporan)
        ->get();
        $obat = DB::table('rekammedisdetail')
        ->join('obat', 'rekammedisdetail.id_obat', '=', 'obat.id')
        ->select('rekammedisdetail.*','obat.*')
        ->get();
        $pdf = Pdf::loadView('pasien.laporan',[
            'pasien'=>$detailpasien,
            'rekam'=>$rekammedis,
            'obat'=>$obat
        ]);
        $pdf->setPaper('legal', 'landscape');
        // $pdf = Pdf::loadView('pasien.laporan', $data);
        return $pdf->download('laporan-data-perpasien.pdf');
        
    }

    public function search(Request $request)
    {
        return view('pasien.pasien',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Suster',
            'active'=>'Lappasien',
        ]);
    }
    
    public function laporan(Request $request)

    {
        $bulan = $request->input('month');
            $month=date('m',strtotime($bulan));
            $pasien = DB::table('pasien')
            ->join('poli', 'pasien.id_poli', '=', 'poli.id')
            ->select('pasien.*','poli.poli')
            ->whereMonth('pasien.created_at', $month)
            ->get();
            $results = $pasien;
        return view('pasien.laporanabsen', [
            'month' =>$month,
            'active'=>'Lappasien',
            'resulst'=>$request
        ],
        compact('results'));
        // return view('cuti.laporan');
    }

    public function viewpdf(Request $request)
    {
        
        $bulan = $request->input('month');
       
        
        $data['pasien'] = DB::table('pasien')
            ->join('poli', 'pasien.id_poli', '=', 'poli.id')
            ->select('pasien.*','poli.poli')
            ->whereMonth('pasien.created_at', $bulan)
            ->get();
        $pdf = Pdf::loadView('pasien.cetak_laporan', $data);
        return $pdf->download('laporan-data-pasien.pdf');
        
    }

    public function setSession(Request $request)
    {
        $request->session()->put('puskesmas', $request->puskesmas);
        return redirect('/laporan-data-pasien');
        // return redirect()->route('search');
    }
}
