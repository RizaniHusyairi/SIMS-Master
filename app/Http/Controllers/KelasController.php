<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kelas_jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datakelas',[
            'dtkelas' => Kelas_jurusan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idguru = Guru::join('users','users.id','=','gurus.user_id')->select('users.name','gurus.id')->pluck('name','id');
        $dtkelas = Kelas_jurusan::where('guru_id','!=',"null")->get();
        $dtguru = Guru::all();
        foreach($dtkelas as $kelas){
            foreach($dtguru as $guru){
                if($guru->id == $kelas->guru_id){
                    unset($idguru[$guru->id]);
                }
            }
        }
        $walicurrent = Kelas_jurusan::find($id);
        foreach($dtkelas as $kelas){
            if ($kelas->guru_id == $walicurrent->guru_id) {
                $idguru[$walicurrent->guru_id] = $walicurrent->guru->user->name;
            }
        }
        
        return view('admin.walikelas',[
            'guru' => $idguru,
            'wali' => $walicurrent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kelas)
    {
        Kelas_jurusan::find($kelas)->update($request->all());
        return redirect('/admin/datakelas')->with('success','Wali kelas Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
