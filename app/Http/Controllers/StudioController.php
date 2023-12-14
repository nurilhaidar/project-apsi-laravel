<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Studio::all();
        return view('admin.content.studio', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.studio')->with('url_form', url('dashboard/studio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_studio' => 'required',
                'kapasitas' => 'required|numeric',
                'harga' => 'required|numeric',
            ],
            [
                'nama_studio.required' => 'Nama Studio tidak boleh kosong',
                'kapasitas.required' => 'Kapasitas tidak boleh kosong',
                'harga.required' => 'Harga tidak boleh kosong',
                'kapasitas.numeric' => 'Kapasitas harus berupa angka',
                'harga.numeric' => 'Harga harus berupa angka',
            ]
        );

        $insert = Studio::create([
            'studio_id' => rand(1, 999),
            'nama_studio' => $request->nama_studio,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
        ]);

        if ($insert) {
            return redirect('dashboard/studio')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('dashboard/studio')->with('failed', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Studio::where('studio_id', $id)->first();
        return view('admin.form.studio', compact('data'))->with('url_form', url('dashboard/studio/' . $id));
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
        $request->validate(
            [
                'nama_studio' => 'required',
                'kapasitas' => 'required|numeric',
                'harga' => 'required|numeric',
            ],
            [
                'nama_studio.required' => 'Nama Studio tidak boleh kosong',
                'kapasitas.required' => 'Kapasitas tidak boleh kosong',
                'harga.required' => 'Harga tidak boleh kosong',
                'kapasitas.numeric' => 'Kapasitas harus berupa angka',
                'harga.numeric' => 'Harga harus berupa angka',
            ]
        );

        $update = Studio::where('studio_id', $id)->update([
            'nama_studio' => $request->nama_studio,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
        ]);

        if ($update) {
            return redirect('dashboard/studio')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('dashboard/studio')->with('failed', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Studio::where('studio_id', $id)->delete();

        if ($delete) {
            return redirect('dashboard/studio')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('dashboard/studio')->with('failed', 'Data gagal dihapus');
        }
    }
}
