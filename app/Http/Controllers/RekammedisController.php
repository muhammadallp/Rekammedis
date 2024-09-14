<?php

namespace App\Http\Controllers;

use App\Models\rekammedis;
use App\Models\pasien;
use App\Models\Ruangan;
use App\Models\obat;
use App\Models\poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class RekammedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->join('ruangan', 'rekammedis.id_ruangan', '=', 'ruangan.id')
        ->select('rekammedis.*','pasien.nip','pasien.nama_pasien','poli.poli','ruangan.ruangan')
        ->get();
        // dd($rekammedis);
        return view('rekammedis.index',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
            'rekammedis'=>$rekammedis
           ]);
    }

    public function proses()
    {
        $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->join('ruangan', 'rekammedis.id_ruangan', '=', 'ruangan.id')
        ->select('rekammedis.*','pasien.nama_pasien','pasien.nip','poli.poli','ruangan.ruangan')
        ->get();
        // dd($rekammedis);
        return view('rekammedis.proses',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
            'rekammedis'=>$rekammedis
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekammedis.create',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
            'pasien' => pasien::all(),
            'ruangan' =>Ruangan::all(),
            'obat' =>obat::all()
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
            'id_pasien'=>'required',
            'id_ruangan'=>'required',
            'keluhan' => 'required',
            'class' => 'required',
            'status' => 'required',
        ]);

        rekammedis::create($validatedData);
        return redirect('/rekammedis')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rekammedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function show(rekammedis $rekammedi)
    {

        $users = DB::table('rekammedisdetail')
             ->select(DB::raw('id_obat as obat'))
             ->where('id_rekam', $rekammedi->id)
             ->groupBy('id_obat')
             ->get();
       
        foreach($users as $us):
            $obat[] = DB::table('obat')
            ->join('rekammedisdetail', 'obat.id', '=', 'rekammedisdetail.id_obat')
            ->select('*')
            ->where('rekammedisdetail.id_rekam', $rekammedi->id)
            ->where('rekammedisdetail.id_obat', $us->obat)
            ->get();
            // dd( $us->obat);
        endforeach;
        $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('users', 'rekammedis.id_dokter', '=', 'users.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->join('ruangan', 'rekammedis.id_ruangan', '=', 'ruangan.id')
        ->select('rekammedis.*','pasien.*','poli.poli','ruangan.ruangan','users.nik','users.nama')
        ->where('rekammedis.id', $rekammedi->id)
        ->first();
    
        $obatList = [];
        $totalHargaObat = 0;
        foreach($users as $us) {
            $obat1 = DB::table('obat')
                ->join('rekammedisdetail', 'obat.id', '=', 'rekammedisdetail.id_obat')
                ->select('obat.*', 'rekammedisdetail.*')
                ->where('rekammedisdetail.id_rekam', $rekammedi->id)
                ->where('rekammedisdetail.id_obat', $us->obat)
                ->get();
            
            // Menyimpan hasil query ke dalam array obatList
            $obatList[] = $obat1;

            foreach ($obat1 as $o) {
                $totalHargaObat += $o->harga_obat;
            }
        }
        
        // Mengirimkan data ke view
     
    //    dd($obat);
        return view('rekammedis.detail',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
            'rekammedis'=>$rekammedis,
            'obat' =>$obat,
            'id' =>  $rekammedi->id
        ],compact('obatList', 'totalHargaObat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rekammedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function edit(rekammedis $rekammedi)
    {
        // dd($rekammedi);
        $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->join('ruangan', 'rekammedis.id_ruangan', '=', 'ruangan.id')
        ->select('rekammedis.*','pasien.nama_pasien','pasien.nip','poli.poli','ruangan.ruangan')
        ->where('rekammedis.id', $rekammedi->id)
        ->first();
        return view('rekammedis.edit',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Pasien',
            'rekammedis'=>$rekammedis,
            'obat' =>obat::all()
           ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rekammedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rekammedis $rekammedi)
    {

        // dd($rekammedi);
        $validatedData = $request->validate([
            'id_dokter'=>'required',
            'diagnosa'=>'required',
            'status' => 'required',
            'tindakan' => 'required',
        ]);

        rekammedis::where('id',$rekammedi->id) 
        ->update($validatedData);

        
        $value = request('id_rekam');
        $id_obat = request('id_obat');
        $jml_obat = request('jml_obat');
        $ket = request('keterangan');

        // dd($id_obat);

        $jumlah_dipilih = count($id_obat);

        // Loop melalui data yang dipilih
        for ($x = 0; $x < $jumlah_dipilih; $x++) {
            // Cek apakah data sudah ada sebelumnya
            $existingData = DB::table('rekammedisdetail')
                ->where('id_rekam', $value)
                ->where('id_obat', $id_obat[$x])
                ->exists();

            // Jika data belum ada, masukkan ke dalam tabel
            if (!$existingData) {
                DB::table('rekammedisdetail')->insert([
                    'id_rekam' => $value,
                    'id_obat' => $id_obat[$x],
                    'jml_obat' => $jml_obat[$x],
                    'keterangan' => $ket[$x],
                ]);
                $obat = DB::table('obat')
                ->select('*')
                ->where('id',$id_obat[$x])
                ->get();
                // dd($obat);
                foreach ($obat as $obt) {
                 
                  $stokbaru=  $obt->stok -  $jml_obat[$x];
                //   dd($stokbaru);
                obat::where('id',$id_obat[$x]) 
                ->update([
                    'stok' => $stokbaru,
                ]);
                }
            }
        }

        return redirect('/proses-rekammedis')->with('success', 'Data Berhasil DiProses');
    }
// menangil type obat dengan json
    public function getObatType($id)
    {
        $obat = Obat::find($id);
        return response()->json($obat);
    }

    public function rubah(Request $request, $id)
    {

        $validatedData = $request->validate([
            'biaya'=>'required',
            'ttl_hrg_obt'=>'required',
            'status'=>'required',
        ]);
        // dd($id);

        rekammedis::where('id',$id) 
        ->update($validatedData);
        return redirect('/rekammedis')->with('success', 'Data Berhasil DiProses');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rekammedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(rekammedis $rekammedis)
    {
        //
    }

    public function search(Request $request)
    {
        return view('rekammedis.pasien',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Suster',
            'poli' =>Poli::all()
        ]);
    }
    
    public function laporan(Request $request)

    {

            $bulan = $request->input('month');
            $poli = $request->input('poli');
            // dd($poli);
            $month=date('m-Y',strtotime($bulan));
            $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->select('rekammedis.*','pasien.nama_pasien','pasien.nip','poli.poli')
        ->where('rekammedis.status','=', 2)
        ->whereMonth('rekammedis.created_at', $month)
        ->get();
        $count= DB::table('rekammedis')
        ->where('status','=', 2)
        ->whereMonth('created_at', $month)
        ->count();
            $results = $rekammedis;
        return view('rekammedis.laporanabsen', [
            'month' =>$month,
            'poli'=>$poli,
            'count'=>$count,
            'resulst'=>$request
        ],
        compact('results'));
        // return view('cuti.laporan');
    }

    public function viewpdf(Request $request)
    {
        
        $bulan = $request->input('month');
        // $month=date('m-Y',strtotime($bulan));
        // dd($bulan);
        $pasien = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->select('rekammedis.*','pasien.nama_pasien','pasien.nip','poli.poli')
        ->where('rekammedis.status','=', 2)
        ->whereMonth('rekammedis.created_at', $bulan)
        ->get();
        $pdf = Pdf::loadView('rekammedis.cetak_laporan',[
            'pasien'=>$pasien,
            'bulan'=>$bulan,
        ]);
        // $pdf = Pdf::loadView('rekammedis.cetak_laporan', $data);
        return $pdf->download('laporan-data-rekammedis-perbulan.pdf');
        
    }

    public function searchpertahun(Request $request)
    {
        return view('rekammedis.laporanpertahun',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Suster',
        ]);
    }
    
    public function laporanpertahun(Request $request)

    {
        $year = $request->input('year');
        $rekammedis = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->select('rekammedis.*','pasien.nama_pasien','pasien.nip','poli.poli')
        ->where('rekammedis.status','=', 2)
        ->orderby('rekammedis.id','ASC')
        ->whereYear('rekammedis.created_at', $year)
        ->get();

        $count= DB::table('rekammedis')
        ->where('status','=', 2)
        ->whereYear('created_at', $year)
        ->count();
            $results = $rekammedis;
        return view('rekammedis.laporanmedis', [
            'year' =>$year,
            'count' =>$count,
            'resulst'=>$request
        ],
        compact('results'));
        // return view('cuti.laporan');
    }

    public function viewpdfmedis(Request $request)
    {
        
        $year = $request->input('year');
        $pasien = DB::table('rekammedis')
        ->join('pasien', 'rekammedis.id_pasien', '=', 'pasien.id')
        ->join('poli', 'pasien.id_poli', '=', 'poli.id')
        ->select('rekammedis.*','pasien.nama_pasien','pasien.nip','poli.poli')
        ->where('rekammedis.status','=', 2)
        ->whereYear('rekammedis.created_at', $year)
        ->get();
        $pdf = Pdf::loadView('rekammedis.cetak_laporanprtahun',[
            'pasien'=>$pasien,
            'bulan'=>$year
        ]);
        // $pdf = Pdf::loadView('rekammedis.cetak_laporan', $data);
        return $pdf->download('laporan-data-rekammedis-perTahun.pdf');
        
    }

    public function searchperndapatan(Request $request)
    {
        return view('rekammedis.pendapatan',[
            'title'=>'Klinik Pratama Simpang Tiga | Data Suster',
            'poli' =>Poli::all()
        ]);
    }

    public function laporanpendapatan(Request $request)

    {

            $bulan = $request->input('month');
            $month=date('m-Y',strtotime($bulan));
            $rekammedis = DB::table('rekammedis')
            ->select('*')
            ->where('status','=', 2)
            ->whereMonth('created_at', $month)
            // ->groupBy('created_at')
            ->get();
            $count= DB::table('rekammedis')
            ->where('status','=', 2)
            ->whereMonth('created_at', $month)
            ->count();

             $transaksi = DB::table('rekammedis')
            ->select(DB::raw('count(*) as transaksi'), DB::raw('sum(ttl_hrg_obt) as totalobat'), 'created_at',DB::raw('sum(biaya) as totalbiaya'), 'created_at')
            ->where('status', '=', 2)
            ->whereMonth('created_at', $month)
            ->groupBy('created_at')
            ->get();
           
            $total = DB::table('rekammedis')
            ->select(DB::raw('sum(ttl_hrg_obt) as totalobat'),DB::raw('sum(biaya) as totalbiaya'),'status')
            ->where('status', '=', 2)
            ->whereMonth('created_at', $month)
            ->groupBy('status')
            ->first();
        // dd($total);
            $results = $total;
        return view('rekammedis.laporanpendapatan', [
            'month' =>$month,
            'transaksi'=>$transaksi,
            'resulst'=>$request,
            'total'=>$total,
            'count'=>$count,
        ],
        compact('results'));
        // return view('cuti.laporan');
    }

    public function viewpdfpendapatan(Request $request)
    {
        
        $bulan = $request->input('month');
         $transaksi = DB::table('rekammedis')
        ->select(DB::raw('count(*) as transaksi'), DB::raw('sum(ttl_hrg_obt) as totalobat'), 'created_at',DB::raw('sum(biaya) as totalbiaya'), 'created_at')
        ->where('status', '=', 2)
        ->whereMonth('created_at', $bulan)
        ->groupBy('created_at')
        ->get();
       
        $total = DB::table('rekammedis')
        ->select(DB::raw('sum(ttl_hrg_obt) as totalobat'),DB::raw('sum(biaya) as totalbiaya'),'status')
        ->where('status', '=', 2)
        ->whereMonth('created_at', $bulan)
        ->groupBy('status')
        ->first();

        $pdf = Pdf::loadView('rekammedis.cetak_laporanpendapatan',[
            'bulan'=>$bulan,
            'transaksi'=>$transaksi,
            'total'=>$total,
        ]);

        return $pdf->download('laporan-pendapatan-perbulan.pdf');
        
    }
}
