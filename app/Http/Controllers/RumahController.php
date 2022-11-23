<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formbmi');
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
        //untuk menghitung bmi
        $a = new konsul($request->berat, $request->tinggi);
        // $a->bmi();
        // $a->obes();
        $data = [
            'bmi' => $a->bmi(),
            'obes' => $a->obes()
        ];

        return view('formbmi', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(Rumah $rumah)
    {
        $rumah->delete();
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumah $rumah)
    {
        // $siswa = Siswa::all();
        return view('rumah', compact('rumah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rumah $rumah)
    {
        $rumah->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumah $rumah)
    {
        //
    }
}

class hitung
{
    public function __construct($berat, $tinggi)
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi / 100;
    }

    public function bmi()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }
}

class konsul extends hitung
{
    public function obes()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18) {
            return 'kurus';
        } elseif ($dbmi > 30) {
            return 'obesitas';
        } else {
            return 'tidak terdaftar';
        }
    }
}
