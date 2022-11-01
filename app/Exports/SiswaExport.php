<?php

namespace App\Exports;

use App\Models\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Siswa::all();
    // }

    public function view(): View
    {
        $data = [
            'nama' => 'aaaa',
            'alamat' => 'aaaa'
        ];
        return view('export', compact('data'));
    }
}
