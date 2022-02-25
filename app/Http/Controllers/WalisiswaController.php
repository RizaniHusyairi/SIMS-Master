<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\Jurusan;
use App\Models\Kelas_jurusan;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WalisiswaController extends Controller
{
    public function ShowDsWalisiswa(){
        return view('walisiswa.home',[
            'dtsiswa' => Siswa::all()->count(),
            'dtguru' => Guru::all()->count(),
            'dtkelas' => Kelas_jurusan::all()->count(),
            'dtmapel' => Mapel::all()->count()
        ]);

    }

    public function showprofile(){
        // $user = Auth::user()->siswa;
        // dd($user->siswakelas[0]->id);
        // $siswa = SiswaKelas::find($user->siswakelas->id);

        return view('walisiswa.profile');
    }

    public function editprofile(Request $request,$id){
       $oldsiswa = Siswa::find($id);
       if ($request->hasFile('foto')) {
           if ($oldsiswa->foto != 'foto_profil_siswa/defaultprofile.jpg') {
               Storage::delete($oldsiswa->foto);
           }
           $oldsiswa->update(['foto' => $request->file('foto')->store('foto_profil_siswa')]);
       }
       return redirect('/walisiswa/profile');

    }


    public function index(){
        return view('admin.datasiswa',[
            'dtsiswa' => SiswaKelas::with('siswa','kelas_jurusan')->latest()->get(),
        ]);

    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.tambahsiswa',[
            'NISN' => Siswa::max('NISN')?Siswa::max('NISN')+1:1030,
            'dtkelas'=>Kelas::pluck('tingkat_kelas','id'),
            'dtjurusan'=>Jurusan::pluck('nama_jurusan','id')
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
        $validateKelas = $request->validate([
            'kelas_id' => 'required',
            'jurusan_id' => 'required'
        ]);
        $validateSiswa = $request->validate([
            'NISN' => 'required|integer',
            'foto'=>'file|image',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'=> 'required',
            'alamat' => 'required',
            'nama_wali'=>'required',
        ]);
        $validateAkunSiswa = $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'password'=>'required',
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $validateSiswa['foto'] = $request->file('image')->store('foto_profil_siswa');
            }
            // dd($request);
            $iduser = User::create([
                'name' => $validateAkunSiswa['name'],
                'email' => $validateAkunSiswa['email'],
                'password' => Hash::make($validateAkunSiswa['password']),
                'role' => 'WaliSiswa'
            ]);
            
            $validateSiswa['user_id'] = $iduser->id;
            $idkelas = Kelas_jurusan::where([
                ['kelas_id','=',$validateKelas['kelas_id']],
                ['jurusan_id','=',$validateKelas['jurusan_id']]
            ])->first();
            $idsiswa = Siswa::create($validateSiswa);
            $idkelassiswa = SiswaKelas::create([
                'siswa_id'=>$idsiswa->id,
                'kelas_jurusan_id' => $idkelas->id 
            ]);
            $jmlSiswa = $idkelas->jumlah + 1;
            $idkelas->update(['jumlah' => $jmlSiswa ]);
            $dtmapel = Mapel::where('jurusan_id',$validateKelas['jurusan_id'])->get();
            // dd($dtmapel);
            foreach($dtmapel as $mapel){
                Nilai::create([
                    'siswakelas_id' => $idkelassiswa->id,
                    'mapel_id' => $mapel->id,
                    'Semester' => 1
                ]);
            }
            foreach($dtmapel as $mapel){
                Nilai::create([
                    'siswakelas_id' => $idkelassiswa->id,
                    'mapel_id' => $mapel->id,
                    'Semester' => 2
                ]);
            }
            DB::commit();
            return redirect('/admin/datasiswa')->with('success','Data Berhasil Ditambah');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($siswa)
    {
        $dts = SiswaKelas::find($siswa);
        $dtsiswa = [
            'foto' => $dts->siswa->foto,
            'NISN' => $dts->siswa->NISN,
            'id' => $dts->siswa_id,
            'nama_siswa' => $dts->siswa->user->name,
            'tempat_lahir' => $dts->siswa->tempat_lahir,
            'tgl_lahir' => $dts->siswa->tgl_lahir,
            'jenis_kelamin' => $dts->siswa->jenis_kelamin,
            'alamat' => $dts->siswa->alamat,
            'kelas' => $dts->kelas_jurusan->kelas->tingkat_kelas,
            'jurusan' => $dts->kelas_jurusan->jurusan->nama_jurusan,
            'nama_wali' => $dts->siswa->nama_wali,
            'email' => $dts->siswa->user->email
        ];
        return response()->json($dtsiswa,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($siswa)
    {
        $dts = SiswaKelas::find($siswa);
        $dtsiswa = [
            'id' => $siswa,
            'name' => $dts->siswa->user->name,
            'tempat_lahir' => $dts->siswa->tempat_lahir,
            'tgl_lahir' => $dts->siswa->tgl_lahir,
            'jenis_kelamin' => $dts->siswa->jenis_kelamin,
            'alamat' => $dts->siswa->alamat,
            'kelas_id' => $dts->kelas_jurusan->kelas_id,
            'jurusan_id' => $dts->kelas_jurusan->jurusan_id,
            'nama_wali' => $dts->siswa->nama_wali,
            'email' => $dts->siswa->user->email
        ];
        return view('admin.siswa.editsiswa',[
            'NISN' => $dts->siswa->NISN,
            'dtsiswa' => $dtsiswa,
            'dtkelas'=>Kelas::pluck('tingkat_kelas','id'),
            'dtjurusan'=>Jurusan::pluck('nama_jurusan','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$siswa)
    {
        $validateKelas = $request->validate([
            'kelas_id' => 'required',
            'jurusan_id' => 'required'
        ]);
        $validateSiswa = $request->validate([
            'NISN' => 'required|integer',
            'foto'=>'file|image',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'=> 'required',
            'alamat' => 'required',
            'nama_wali'=>'required',
        ]);
        $validateAkunSiswa = $request->validate([
            'name' => 'required',
            'email'=> 'required',
        ]);
        DB::beginTransaction();
        try {
            $oldDataSiswa = SiswaKelas::find($siswa);

            if ($request->hasFile('image')) {
                if($oldDataSiswa->siswa->foto != 'foto_profil_siswa/defaultprofile.jpg'){
                    Storage::delete($oldDataSiswa->siswa->foto);
                }
                $validateSiswa['foto'] = $request->file('image')->store('foto_profil_siswa');
            }
            User::find($oldDataSiswa->siswa->user_id)->update([
                'name' => $validateAkunSiswa['name'],
                'email' => $validateAkunSiswa['email'],
                'password' => (($request->password)?Hash::make($validateAkunSiswa['password']):$oldDataSiswa->siswa->user->password),
            ]);
            
            $idkelas = Kelas_jurusan::where([
                ['kelas_id','=',$validateKelas['kelas_id']],
                ['jurusan_id','=',$validateKelas['jurusan_id']]
            ])->first();
            if($oldDataSiswa->kelas_jurusan_id != $idkelas->id){

                
                $jmlSiswa = $idkelas->jumlah + 1;
                $jmlsiswaOld = $oldDataSiswa->kelas_jurusan->jumlah - 1;

                $oldDataSiswa->kelas_jurusan->update([
                    'jumlah' => $jmlsiswaOld
                ]);

                $oldDataSiswa->update([
                        'kelas_jurusan_id' => $idkelas->id 
                ]);

                $idkelas->update([
                    'jumlah' => $jmlSiswa
                ]);

            }
            Siswa::find($siswa)->update($validateSiswa);

            DB::commit();
            return redirect('/admin/datasiswa')->with('success','Data '. $request->nama_siswa. ' Berhasil Diubah');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($siswa)
    {
        $siswakelas = SiswaKelas::find($siswa);
        $jml = $siswakelas->kelas_jurusan->jumlah - 1;
        $siswakelas->kelas_jurusan->update([
            'jumlah' => $jml
        ]);
        Nilai::where('siswakelas_id',$siswa)->delete();
        User::destroy($siswakelas->siswa->user_id);
        Siswa::destroy($siswakelas->siswa_id);
        $siswakelas->delete();
        return redirect('/admin/datasiswa')->with('success','Data berhasil dihapus');
    }
}
