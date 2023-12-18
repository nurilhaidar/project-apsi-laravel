<?php

namespace App\Http\Controllers;

use App\Models\JamOrder;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JamOrder::orderBy('jam')->get();
        return view('admin.content.jam', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.jam')->with('url_form', url('dashboard/jam'));
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
                'jam' => 'required'
            ],
            [
                'jam.required' => 'Jam harus diisi'
            ]
        );

        $insert = JamOrder::create([
            'order_jam_id' => rand(1, 999),
            'jam' => $request->jam
        ]);

        if ($insert) {
            return redirect('dashboard/jam')->with('success', 'Jam Berhasil Ditambahkan');
        } else {
            return redirect('dashboard/jam')->with('failed', 'Jam Gagal Ditambahkan');
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
        $data = JamOrder::where('order_jam_id', $id)->first();
        return view('admin.form.jam', compact('data'))->with('url_form', url('dashboard/jam/' . $id));
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
                'jam' => 'required'
            ],
            [
                'jam.required' => 'Jam harus diisi'
            ]
        );

        $update = JamOrder::where('order_jam_id', $id)->update([
            'jam' => $request->jam
        ]);

        if ($update) {
            return redirect('dashboard/jam')->with('success', 'Jam Berhasil Diubah');
        } else {
            return redirect('dashboard/jam')->with('failed', 'Jam Gagal Diubah');
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
            $delete = JamOrder::where('order_jam_id', $id)->delete();
            if ($delete) {
                return redirect('dashboard/jam')->with('success', 'Jam Berhasil Dihapus');
            } else {
                return redirect('dashboard/jam')->with('failed', 'Jam Gagal Dihapus');
            }
        } catch (QueryException) {
            return redirect('dashboard/jam')->with('failed', 'Jam Gagal Dihapus, karena data masih digunakan');
        }
    }
}
