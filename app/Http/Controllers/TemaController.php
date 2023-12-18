<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tema::all();
        return view('admin.content.tema', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.tema')->with('url_form', url('dashboard/tema'));
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
                'nama_tema' => 'required',
            ],
            [
                'nama_tema.required' => 'Nama Tema tidak boleh kosong',
            ]
        );

        $insert = Tema::create([
            'tema_id' => rand(1, 999),
            'nama_tema' => $request->nama_tema,
        ]);

        if ($insert) {
            return redirect('dashboard/tema')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('dashboard/tema')->with('failed', 'Data gagal ditambahkan');
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
        $data = Tema::where('tema_id', $id)->first();
        return view('admin.form.tema', compact('data'))->with('url_form', url('dashboard/tema/' . $id));
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
                'nama_tema' => 'required',
            ],
            [
                'nama_tema.required' => 'Nama Tema tidak boleh kosong',
            ]
        );

        $update = Tema::where('tema_id', $id)->update([
            'nama_tema' => $request->nama_tema,
        ]);

        if ($update) {
            return redirect('dashboard/tema')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('dashboard/tema')->with('failed', 'Data gagal diubah');
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
        try {
            $delete = Tema::where('tema_id', $id)->delete();

            if ($delete) {
                return redirect('dashboard/tema')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('dashboard/tema')->with('failed', 'Data gagal dihapus');
            }
        } catch (QueryException) {
            return redirect('dashboard/tema')->with('failed', 'Data gagal dihapus karena terdapat data lain yang terkait');
        }
    }
}
