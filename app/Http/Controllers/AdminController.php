<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderToday = Order::where('tgl', now()->format('Y-m-d'))->count();
        $orderMonth = Order::whereMonth('tgl', now()->format('m'))->count();
        $totalMonth = Transaksi::select('total_harga')->whereHas('order', function ($query) {
            $query->where('tgl', now()->format('Y-m-d'));
        })->sum('total_harga');

        return view('admin.content.dashboard', compact('orderToday', 'orderMonth', 'totalMonth'));
    }

    public function userShow($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.form.user', compact('data'))->with('url_form', url('dashboard/user/' . $id));
    }

    public function userCreate()
    {
        return view('admin.form.user')->with('url_form', url('dashboard/user'));
    }

    public function userInsert(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'username' => 'required|unique:user,username,' . 'id',
                'password' => 'required',
                'status' => 'required'
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah digunakan',
                'password.required' => 'Password harus diisi',
                'status.required' => 'Status harus diisi',
                'status.in' => 'Status harus Admin atau Super Admin'
            ]
        );

        $insert = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        if ($insert) {
            return redirect('dashboard/user')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('dashboard/user')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'username' => 'required|unique:user,username,' . $id . ',id',
                'password' => 'required',
                'status' => 'required|in:Admin, Super Admin'
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah digunakan',
                'password.required' => 'Password harus diisi',
                'status.required' => 'Status harus diisi',
                'status.in' => 'Status harus Admin atau Super Admin'
            ]
        );

        $update = User::where('id', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        if ($update) {
            return redirect('dashboard/user')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('dashboard/user')->with('error', 'Data gagal diubah');
        }
    }

    public function userAll()
    {
        $data = User::all();
        return view('admin.content.user', compact('data'));
    }
}
