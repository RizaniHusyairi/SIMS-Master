<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas_jurusan;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;
use App\Models\GuruMapel;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowDsGuru()
    {
        return view('guru.home',[
            'dtsiswa' => Siswa::all()->count(),
            'dtguru' => Guru::all()->count(),
            'dtkelas' => Kelas_jurusan::all()->count(),
            'dtmapel' => Mapel::all()->count()
        ]);
    }

    public function profile(){
        return view('guru.profile');
    }

    public function profile_edit(Request $request, $id){
        $olddata = Guru::find($id);
        DB::beginTransaction();
        try {
            if ($request->hasFile('foto')) {
                if($olddata->foto != 'foto_profil_guru/defaultprofile.jpg'){
                    Storage::delete($olddata->foto);
                }
                
                $olddata->update([
                    'foto' => $request->file('foto')->store('foto_profil_guru'),
                ]);
            }
            $olddata->user->update([
                'name'=>$request->name
            ]);
            $olddata->update([
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat
            ]);

            DB::commit();
            return redirect('/guru/profile');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e)->withInput();
        }
    }

    public function changePassword(Request $request){
        // return $request;
        $user = Auth::user();
        $userPassword = $user->password;
        // dd($request);
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:renewpassword',
            'renewpassword' => 'required'
        ]);

        if (!Hash::check($request->current_password,$userPassword)) {
            return back()->withErrors(['current_password'=>'Password salah'])->withInput();
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect('/guru/profile')->with('success','Password Berhasil diubah');
    }

    public function showsiswa(){
        return view('guru.datasiswa',[
            'dtsiswa' => SiswaKelas::with('siswa','kelas_jurusan')->latest()->get(),
        ]);
    }

    public function detailsiswa($siswa){
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

    public function index()
    {
        return view('admin.dataguru',[
            'dtguru' => Guru::with('gurumapel','user')->latest()->get()
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $arr = Mapel::pluck('nama_mapel','id');
        // $dtmapel = Mapel::all();
        // $jurusan = [];
        // foreach($dtmapel as $mapel){
        //     $arr[$mapel->id] =  $mapel->nama_mapel.' - '.$mapel->jurusan->nama_jurusan;
        // }

        return view('admin.guru.tambahguru',[
            'NIP' => Guru::max('NIP')?Guru::max('NIP')+1:65400,
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
        $validateGuru = $request->validate([
            'NIP' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir'=>'required',
            'foto' => 'image|file',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);
        $validateUser = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);            
        DB::beginTransaction();
        try {
            
            if ($request->hasFile('image')) {
                $validateGuru['foto'] = $request->file('image')->store('foto_profil_guru');
            }
            $iduser = User::create([
                'name'=> $validateUser['name'],
                'email' => $validateUser['email'],
                'password'=>Hash::make($validateUser['password']),
                'role' => 'Guru' 
            ]);
            $validateGuru['user_id'] = $iduser->id;
            Guru::create($validateGuru);

            DB::commit();
            return redirect('/admin/dataguru')->with('success','Data Guru Berhasil Ditambah');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($guru)
    {
        return view('admin.guru.detailguru',[
            'guru' => Guru::with('kelas_jurusan','gurumapel')->find($guru)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($guru)
    {
        $dtg = Guru::find($guru);
        $dtguru = [
            'id' => $dtg->id,
            'name' => $dtg->user->name,
            'tempat_lahir' => $dtg->tempat_lahir,
            'tgl_lahir' => $dtg->tgl_lahir,
            'jenis_kelamin' => $dtg->jenis_kelamin,
            'alamat' => $dtg->alamat,
            'mapel_id' => $dtg->mapel_id,
            'email' => $dtg->user->email
        ];
        return view('admin.guru.editguru',[
            'NIP' => $dtg->NIP,
            'dtguru' => $dtguru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guru)
    {
        DB::beginTransaction();
        try{
            $dtOld = Guru::find($guru);

            $validateGuru = $request->validate([
                'NIP' => 'required',
                'tgl_lahir' => 'required',
                'tempat_lahir'=>'required',
                'foto' => 'image|file',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
            ]);
            
            $validateUser = $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);        
                $validateUser['password'] = (($request->password)?Hash::make($request->password):$dtOld->user->password);

            if ($request->hasFile('image')) {
                if($dtOld->foto != 'foto_profil_guru/defaultprofile.jpg'){
                    Storage::delete($dtOld->foto);
                }
                $validateGuru['foto'] = $request->file('image')->store('foto_profil_guru');
            }
            
            $dtOld->user->update($validateUser);
            $dtOld->update($validateGuru);
            
            
            DB::commit();
            return redirect('/admin/dataguru')->with('success','Data Berhasil diedit');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->withErrors($e)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($guru)
    {
        $dtguru = Guru::find($guru);
        Kelas_jurusan::where('guru_id',$guru)->update(['guru_id' => null]);
        GuruMapel::where('guru_id',$guru)->delete();
        if ($dtguru->foto != 'foto_profil_guru/defaultprofile.jpg') {
            Storage::delete($dtguru->foto);
        }
        $dtguru->user->delete();
        Absensi::where('guru_id',$guru)->delete();
        $dtguru->delete();

        return redirect('/admin/dataguru')->with('success','Data Berhasil Dihapus');
    }
}
