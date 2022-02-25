<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Nilai;
use App\Models\Kelas;
use App\Models\Kelas_jurusan;
use App\Models\Mapel;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{

    public function nilaimapel($id){
        $dtsiswa = Auth::user()->siswa;
        $siswa = SiswaKelas::where('siswa_id',$dtsiswa->id)->where('status','aktif')->first();
        return view('walisiswa.dtnilai',[
            'dtmapel' => Nilai::where('siswakelas_id',$siswa->id)->where('Semester',$id)->get()
        ]);
    }

    public function lihatnilai(){
        return view('walisiswa.lihatnilai');
    }



    public function getsiswa(Request $request){
        $idjurusan = Mapel::find($request->idmapel);
        $idkelas = Kelas_jurusan::where('kelas_id','=',$request->idkelas)->where('jurusan_id','=',$idjurusan->jurusan_id)->first();

        $dtsiswa = Nilai::join('siswa_kelas','siswa_kelas.id','=','nilais.siswakelas_id')
        ->join('mapels','mapels.id','=','nilais.mapel_id')
        ->join('kelas_jurusans','kelas_jurusans.id','=','siswa_kelas.kelas_jurusan_id')
        ->join('kelas','kelas.id','=','kelas_jurusans.kelas_id')
        ->join('jurusans','jurusans.id','=','kelas_jurusans.jurusan_id')
        ->join('siswas','siswas.id','=','siswa_kelas.siswa_id')
        ->join('users','users.id','=','siswas.user_id')
        ->where('siswa_kelas.kelas_jurusan_id',$idkelas->id)
        ->where('nilais.mapel_id',$request->idmapel)
        ->where('nilais.semester',$request->semester)
        ->select('nilais.*','users.name','siswas.NISN','mapels.KKM')
        ->get();
        return view('guru.dtsiswa',[
            'dtsiswa'=> $dtsiswa
        ]);
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru=Auth::user()->guru;
        
        $dtmapel = [];

        foreach($guru->gurumapel as $mapel){
            $dtmapel[$mapel->mapel_id] = $mapel->mapel->nama_mapel.' - '.$mapel->mapel->jurusan->nama_jurusan;
        }
        return view('guru.nilai',[
            'dtkelas'=>Kelas::pluck('tingkat_kelas','id'),
            'dtmapel'=> $dtmapel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit($nilai)
    {

        return view('guru.editnilai',[
            'nilai' => Nilai::find($nilai)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$nilai)
    {
        $dtnilai = Nilai::find($nilai);
        $nilai_tugas = ($request->Tugas_1 + $request->Tugas_2 + $request->Tugas_3 + $request->Tugas_4 + $request->Tugas_5)/5;
        $total_tugas = floatval($nilai_tugas*0.2);
        $total_UTS = floatval($request->UTS*0.3);
        $total_UAS = floatval($request->UAS*0.5);
        $nilai_rapor = $total_tugas + $total_UTS + $total_UAS;

        $request['nilai_rapor'] = $nilai_rapor;
        if ($nilai_rapor >= $dtnilai->mapel->KKM) {
            $request['keterangan'] = 'Tuntas';
        }else{
            $request['keterangan'] = 'Tidak Tuntas';
        }
        $dtnilai->update($request->all());
        return redirect('/guru/nilaisiswa')->with('success','Data Nilai berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
