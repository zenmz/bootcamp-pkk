<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();

        $respon = [
            'response' => 'sukses',
            'data' => $data
        ];

        return response($respon, 200);
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
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'sekolah_id' => 'required'
        ]);

        $data = Siswa::create($validator);

        $respon = [
            'response' => 'Data berhasil disimpan',
            'data' => $data
        ];

        return response($respon, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);

        if ($data) {
            $respon = [
                'response' => 'sukses',
                'data' => $data
            ];

            $stcode = 200;
        } else {
            $respon = [
                'response' => 'Data tidak ditemukan',
            ];

            $stcode = 400;
        }
        
        return response($respon, $stcode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Siswa::find($id);

        // $validator = $request->validate([
        //     'nis'=> 'required|integer',
        //     'nama' => 'required|string', 
        //     'alamat' => 'required|string',
        //     'sekolah_id' => 'required' 
        // ]);

        $data->update($request->all());

        $respon = [
            'response' => 'Data berhasil diubah',
            'data' => $data
        ];

        return response($respon, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::find($id);
        $data->delete();

        $respon = [
            'response' => 'Data berhasil dihapus',
            'data' => $data
        ];

        return response($respon, 200);
    }
}
