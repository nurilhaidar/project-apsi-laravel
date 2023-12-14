<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailOrder;
use App\Models\JamOrder;
use App\Models\Order;
use App\Models\Studio;
use App\Models\Tema;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $studio = Studio::all();
        $tanggal_request = $request->tgl;
        $studio_request = $request->studio;

        if ($studio_request != null && $tanggal_request != null) {
            $booked = DetailOrder::whereHas('order', function ($q) use ($tanggal_request, $studio_request) {
                $q->where('tgl', $tanggal_request);
                $q->where('studio_id', $studio_request);
            })->pluck('order_jam_id')->toArray();

            $jam_order = JamOrder::orderby('jam')->get();
            return view('user.content.order', compact('studio', 'jam_order', 'booked', 'tanggal_request', 'studio_request'));
        } else {
            return view('user.content.order', compact('studio'))->with('alert_tgl', 'Pilih tanggal dan studio terlebih dahulu');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Request
        $selected_jam = $request->selected_jam;
        $tanggal_request = $request->tgl;
        $studio_request = $request->studio;

        // Order Jam
        $jam = [];
        $index = 0;
        foreach ($selected_jam as $item) {
            $jamOrder = JamOrder::where('order_jam_id', $item)->first();
            $jam[$index] = $jamOrder;
            $index++;
        }

        // Tema
        $tema = Tema::all();

        // Studio
        $studio = Studio::where('studio_id', $studio_request)->first();

        // Total
        $total = count($selected_jam) * $studio->harga;

        return view('user.content.form', compact('studio', 'tema', 'jam', 'total', 'tanggal_request'))->with('url_form', url('/order'));
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
                'nama' => 'required|string|max:50',
                'no_hp' => 'required|string|min:1|max:13',
                'tema' => 'required|string',
            ],
            [
                'tema.required' => 'Tema harus diisi',
                'nama.required' => 'Nama harus diisi',
                'no_hp.required' => 'Nomor HP harus diisi',
                'no_hp.min' => 'Nomor HP harus 13 digit',
                'no_hp.max' => 'Nomor HP harus 13 digit',
            ]
        );

        $customerStore = Customer::create([
            'customer_id' => Rand('1', '999'),
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
        ]);

        $transaksiStore = Transaksi::create([
            'transaksi_id' => Rand('1', '999'),
            'total_harga' => $request->total,
            'status' => 'Belum Bayar',
        ]);

        $orderStore = Order::create([
            'order_id' => Rand('1', '999'),
            'studio_id' => $request->studio,
            'tema_id' => $request->tema,
            'transaksi_id' => $transaksiStore->transaksi_id,
            'customer_id' => $customerStore->customer_id,
            'tgl' => $request->tgl,
        ]);

        foreach ($request->jam as $jam) {
            DetailOrder::create([
                'order_id' => $orderStore->order_id,
                'order_jam_id' => $jam,
            ]);
        }

        if ($orderStore && $transaksiStore && $customerStore) {
            return redirect('order/receipt/' . $orderStore->order_id)->with(['data' => $request->all()]);
        } else {
            return redirect()->back()->with('alert', 'Gagal melakukan pemesanan');
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
        $data = Order::where('order_id', $id)->first();
        $tgl = Carbon::parse($data->tgl)->format('d-m-Y');
        foreach ($data->detail as $item) {
            $jam[] = JamOrder::where('order_jam_id', $item->order_jam_id)->first();
        }
        return view('user.content.receipt', compact('data', 'tgl', 'jam'));
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
        //
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

    public function showAll(Request $request)
    {
        if ($request->has('tgl_awal') && $request->has('tgl_akhir')) {
            $data = Order::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->orderBy('tgl')->get();
        } else {
            $data = Order::all();
        }

        return view('admin.content.order', compact('data'));
    }

    public function receipt($id)
    {
        $data = Order::where('order_id', $id)->first();
        $tgl = Carbon::parse($data->tgl)->format('d-m-Y');
        foreach ($data->detail as $item) {
            $jam[] = JamOrder::where('order_jam_id', $item->order_jam_id)->first();
        }
        return view('user.content.receipt', compact('data', 'tgl', 'jam'));
    }

    public function print(Request $request)
    {
        if ($request->has('tgl_awal') && $request->has('tgl_akhir')) {
            $data = Order::whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir])->orderBy('tgl')->get();
            $total = Transaksi::whereHas('order', function ($q) use ($request) {
                $q->whereBetween('tgl', [$request->tgl_awal, $request->tgl_akhir]);
            })->sum('total_harga');

            $tgl_awal = Carbon::parse($request->tgl_awal)->format('d-m-Y');
            $tgl_akhir = Carbon::parse($request->tgl_akhir)->format('d-m-Y');
        }

        if (count($data) < 1) {
            $data = Order::orderBy('tgl')->get();
            $total = Transaksi::sum('total_harga');

            $tgl_awal = Carbon::parse(Order::min('tgl'))->format('d-m-Y');
            $tgl_akhir = Carbon::parse(Order::max('tgl'))->format('d-m-Y');
        }

        return view('admin.content.print', compact('data', 'total', 'tgl_awal', 'tgl_akhir'));
    }
}
