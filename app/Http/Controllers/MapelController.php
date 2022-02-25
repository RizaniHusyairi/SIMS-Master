<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\GuruMapel;
use App\Models\Kelas_jurusan;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Facade\Ignition\DumpRecorder\Dump;

class MapelController extends Controller
{

    public function tambahpengampu()
    {
        return view('layouts.editpengampu',[
            'guru'=>Guru::join('users', 'users.id', '=', 'gurus.user_id')->pluck('users.name','gurus.id')
        ]);
    }

    public function ambilpengampu($id)
    {
        $cekpengampu = GuruMapel::join('mapels','mapels.id','=','guru_mapels.mapel_id')
                        ->join('gurus','gurus.id','=','guru_mapels.guru_id')
                        ->join('users','users.id','=','gurus.user_id')
                        ->where('guru_mapels.mapel_id',$id)->get();
        return $cekpengampu;
        // $pengampu = [];
        // if($cekpengampu){
        //     foreach($cekpengampu as $c){
        //         $pengam
        //     }
        // }
        // return view('');
    }

    public function inputpengampu(Request $request,$id){
        
        GuruMapel::where('mapel_id',$id)->delete();
        $bts = 0;
        foreach($request->input() as $v){
            if ($bts < 2) {
                $bts++;
            }else{
                if ($v) {
                    $cekpengampu = GuruMapel::where('guru_id',$v)->where('mapel_id',$id)->first();
                    if ($cekpengampu == null) {
                        GuruMapel::create([
                            'mapel_id' => $id,
                            'guru_id' => $v
                        ]);
                    }
                }
            }
        }
        return redirect('/admin/datamapel')->with('success','Pengampu berhasil di edit');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datamapel',[
            'dtmapel' => Mapel::with('gurumapel','jurusan')->latest()->get(),
            'dtpengampu' => GuruMapel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mapel.tambahmapel',[
            'dtjurusan'=>Jurusan::pluck('nama_jurusan','id'),
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
        $validateMapel = $request->validate([
            'nama_mapel' => 'required',
            'jurusan_id' => 'required',
            'KKM' => 'required'
        ]);
        DB::beginTransaction();
        try{

            $idmapel = Mapel::create($validateMapel);
            $dtsiswa = SiswaKelas::join('kelas_jurusans','kelas_jurusans.id','=','siswa_kelas.kelas_jurusan_id')
                      ->where('kelas_jurusans.jurusan_id',$request->jurusan_id)
                      ->select('siswa_kelas.id','siswa_kelas.kelas_jurusan_id')
                      ->get();
            // dd($dtsiswa);
            foreach($dtsiswa as $siswa){
                Nilai::create([
                    'siswakelas_id' => $siswa->id,
                    'mapel_id' => $idmapel->id,
                    'Semester' => 1
                ]);
            }
            foreach($dtsiswa as $siswa){
                Nilai::create([
                    'siswakelas_id' => $siswa->id,
                    'mapel_id' => $idmapel->id,
                    'Semester' => 2
                ]);
            }
            DB::commit();
            return redirect('/admin/datamapel')->with('success','Data Mapel Berhasil Ditambah');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($mapel)
    {
        return view('admin.mapel.editmapel',[
            'mapel' => Mapel::find($mapel),
            'dtjurusan' => Jurusan::pluck('nama_jurusan','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$mapel)
    {
        $dtOldMapel = Mapel::find($mapel);
        DB::beginTransaction();
        try {
            $validateMapel = $request->validate([
                'nama_mapel' => 'required',
                'jurusan_id' => 'required',
                'KKM' => 'required'
            ]);

            $dtOldMapel->update($validateMapel);

            DB::commit();
            return redirect('/admin/datamapel')->with('success','Data Mapel Berhasil Diedit');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors($e)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($mapel)
    {
        Nilai::where('mapel_id',$mapel)->delete();
        GuruMapel::where('mapel_id',$mapel)->update(['mapel_id' => null]);
        Mapel::destroy($mapel);
        return redirect('/admin/datamapel')->with('success','Data Mapel Berhasil Dihapus');
    }
}
