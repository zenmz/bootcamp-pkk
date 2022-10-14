<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::select('select * from siswa');
        // $data2 = DB::table('siswa')->select('id', 'nama')->get();
        // $data = Siswa::select('siswa.id','siswa.nis', 'siswa.nama', 'siswa.alamat', 'sekolah.namasekolah')->join('sekolah', 'siswa.sekolah_id', '=', 'sekolah.id')->get();

        $data = Siswa::all();
        // echo $data->sekolah->namasekolah;
        // dd($data->sekolah()->namasekolah);
        return view('siswa.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Sekolah::all();
        return view('siswa.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // DB::insert('insert into siswa (nis, nama, alamat, sekolah_id) values (?, ?, ?, ?)', [$request->nis,$request->nama,$request->alamat,$request->sekolah_id ]);

        // DB::table('siswa')->insert([
        //     'nis' => $request->nis,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'sekolah_id' => $request->sekolah_id,
        // ]);

        // Siswa::create($request->all());

        // Siswa::create([
        //     'nis' => $request->input_nis,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'sekolah_id' => $request->sekolah_id,
        // ]);

        $validator = $request->validate([
            'nis'=> 'required|integer',
            'nama' => 'required|string', 
            'alamat' => 'required|string',
            'sekolah_id' => 'required' 
        ]);

        Siswa::create($validator);

        return redirect('siswa')->with('success', 'Data Berhasil Masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "ini fungsi show $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = DB::select('select * from siswa where active = ?', $id);
        // $data = DB::table('siswa')->where('id', '=', $id);
        // $data = Siswa::where('id', '=', '$id');
        $data = Siswa::findOrFail($id);
        $sekolah = Sekolah::all();

        return view('siswa.edit', compact('data', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::update('update users set votes = 100 where name = ?', ['John']);

        $data = Siswa::findOrFail($id);
        // $data->update($request->all());

        $validator = $request->validate([
            'nis'=> 'required|integer',
            'nama' => 'required|string', 
            'alamat' => 'required|string',
            'sekolah_id' => 'required' 
        ]);

        $data->update($validator);

        return redirect('siswa')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::findOrFail($id);
        $data->delete();
        return redirect('siswa')->with('success', 'Data Berhasil Dihapus');
    }

}
