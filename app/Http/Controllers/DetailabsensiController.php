<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\SiswaKelas;
use App\Models\Detailabsensi;
use Illuminate\Http\Request;

class DetailabsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Detailabsensi  $detailabsensi
     * @return \Illuminate\Http\Response
     */
    public function show(Detailabsensi $detailabsensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detailabsensi  $detailabsensi
     * @return \Illuminate\Http\Response
     */
    public function edit($detailabsensi)
    {
        $dtabsen = Detailabsensi::where('absensi_id',$detailabsensi)->get();
        $idkelas = Absensi::find($detailabsensi);
        return view('guru.editabsen',[
            'detail' => Detailabsensi::where('absensi_id',$detailabsensi)->get()->pluck('keterangan','siswakelas_id'),
            'dtabsen' => $detailabsensi,
            'dtsiswa' => SiswaKelas::where('kelas_jurusan_id',$idkelas->kelas_jurusan_id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detailabsensi  $detailabsensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$detailabsensi)
    {
        // return $request;
        $absen = Absensi::find($detailabsensi);
        $dtsiswa = SiswaKelas::where('kelas_jurusan_id',$absen->kelas_jurusan_id)->get();

        foreach($dtsiswa as $siswa){
            Detailabsensi::where('absensi_id',$detailabsensi)->where('siswakelas_id',$siswa->id)->update([
                'keterangan' => $request[$siswa->id],
            ]);
        }
        return redirect('/guru/absensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detailabsensi  $detailabsensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detailabsensi $detailabsensi)
    {
        //
    }
}
