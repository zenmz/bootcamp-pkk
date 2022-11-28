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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $tinggi = $request->tinggi / 100;
        $berat = $request->berat;
        $bmi = bmi($berat, $tinggi);
        $status = status(bmi($berat, $tinggi));
        $class = new Konsul($request->tahun, $status);
        $hobi = explode(',', $request->hobi);

        //untuk menghitung bmi
        // $a = new konsul($request->berat, $request->tinggi);

        $data = [
            'nama' => $nama,
            'tinggi' => $tinggi,
            'berat' => $berat,
            'bmi' => $bmi,
            'status' => $status,
            'hobi' => $hobi[rand(0, count($hobi) - 1)],
            'umur' => $class->hitungUmur(),
            'konsul' => $class->StatusKonsul()

        ];
        return view('formbmi', compact('data'));
    }
}

function bmi($berat, $tinggi)
{
    return $berat / ($tinggi * $tinggi);
}

function status($bmi)
{
    if ($bmi < 18.5) {
        return 'Kurus';
    } elseif ($bmi <= 22.9) {
        return 'Normal';
    } elseif ($bmi <= 29.9) {
        return 'Gemuk';
    } elseif ($bmi > 30) {
        return 'Obesitas';
    }
}

class Umur
{
    public function __construct($tahunLahir, $bmi)
    {
        $this->tahunLahir = $tahunLahir;
        $this->bmi = $bmi;
    }

    public function hitungUmur()
    {
        return 2022 - $this->tahunLahir;
    }
}

class Konsul extends Umur
{
    public function StatusKonsul()
    {
        if ($this->hitungUmur() >= 17) {
            $status = 'dewasa';
        } else {
            $status = 'belum dewasa';
        }

        if ($status == 'dewasa' && $this->bmi == 'Obesitas') {
            return 'Anda bisa mendapatkan Konsultasi gratis.';
        } else {
            return 'Anda belum bisa mendapatkan Konsultasi gratis.';
        }
    }
}

// class hitung
// {
//     public function __construct($berat, $tinggi)
//     {
//         $this->berat = $berat;
//         $this->tinggi = $tinggi / 100;
//     }

//     public function bmi()
//     {
//         return $this->berat / ($this->tinggi * $this->tinggi);
//     }
// }

// class konsul extends hitung
// {
//     public function obes()
//     {
//         $dbmi = $this->bmi();

//         if ($dbmi < 18) {
//             return 'kurus';
//         } elseif ($dbmi > 30) {
//             return 'obesitas';
//         } else {
//             return 'tidak terdaftar';
//         }
//     }
// }
