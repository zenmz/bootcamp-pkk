<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Upload::all();

        return view('upload.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload.tambah');
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
            'image' => 'required|image|max:10000|mimes:jpg',
        ]);

        $file = $request->file('image')->store('img');

        Upload::create([
            'image' => $file
        ]);


        return redirect('upload')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Upload::findOrFail($id);
        return view('upload.edit', compact('data'));
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
        $data = Upload::findOrFail($id);

        // if ($request->file('image')) {
        //     $file = $request->file('image')->store('img');

        //     $data->update([
        //         'image' => $file
        //     ]);
        // } else {
        //     $data->update([
        //         'image' => $data->image
        //     ]);

        //     // return redirect('upload')->with('error', 'Tidak ada yang diubah');
        // }

        try {
            $file = $request->file('image')->store('img');

            $data->update([
                'image' => $file
            ]);
        } catch (\Throwable $th) {
            $data->update([
                'image' => $data->image
            ]);
        }

        return redirect('upload')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
