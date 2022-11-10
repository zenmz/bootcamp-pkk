<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Excel;
use Midtrans\Config;
use Midtrans\Snap;

use function PHPUnit\Framework\returnSelf;

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
        // $data = Siswa::paginate(10);
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
            'nis' => 'required|integer',
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
            'nis' => 'required|integer',
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

    public function wilayah()
    {
        $data = Http::get('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        return $data->json();
        // dd($data->json());


        // Http::post('http://127.0.0.1:8000/api/siswa', [
        //     'nis' => 5555,
        //     'nama' => 'zzzz',
        //     'alamat' => 'zzzz',
        //     'sekolah_id' => 1
        // ]);

        // $data = Http::withHeaders([
        //     'Content-Type' => 'application/json'
        // ])->post('https://testprepaid.mobilepulsa.net/v1/legacy/index', [
        //     "commands" => "pricelist",
        //     "username" => "081553355305",
        //     "sign" => "f677348026a1bc0a14f4a7d507ac6559",
        //     "status" => "all"
        // ]);


        // $data = Http::withHeaders([
        //     'Content-Type' => 'application/json'
        // ])->post('https://testprepaid.mobilepulsa.net/v1/legacy/index', [
        //     "commands" => "topup",
        //     "username" => "081553355305",
        //     "ref_id" => "we12",
        //     "hp" => "081553355305",
        //     "pulsa_code" => "hindosat10000",
        //     "sign" => "284b8afb134565575b3a2e88c9496b12"
        // ]);

        // return $data->json();
        // dd($data->json());
        // $bersih = $data->json();
        // $aa = json_decode($data);
        // dd($bersih);
        // return $bersih->where('data->status', 1)->get();
        // return "<script> console.log($aa)</script>";
        // return response($bersih);

        // return collect($bersih['data'])->unique('pulsa_op');
        // return collect($bersih)->where('name', 'KEPULAUAN BANGKA BELITUNG');

        // $data['data'];

        // foreach ($bersih as $key) {
        //     echo $key['name'];
        // }

        // echo $data['data']['message'];
    }

    public function export()
    {
        // return Excel::download(new SiswaExport, 'laporan.xlsx');
        // return (new SiswaExport)->download('invoices.pdf', Excel::MPDF);

        // return (new SiswaExport)->download('invoices.pdf', Excel::MPDF);
        return (new SiswaExport)->download('invoices.pdf', \Maatwebsite\Excel\Excel::MPDF);

        // return Pdf->download();

    }

    public function midtrans(Request $request)
    {
        $harga = $request->harga;
        $orderid = $request->id;
        $metode = $request->metode;
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-0o-YZIlbVcurF_KG4uN2pHA2';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderid,
                'gross_amount' => $harga,
            ),
            "enabled_payments" => [
                $metode
            ],
        );

        $snapToken = Snap::getSnapToken($params);

        return json_encode($snapToken);
    }
}
