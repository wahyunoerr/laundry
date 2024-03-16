<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\JenisCucian;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('costumer', 'jenis')->latest()->get();
        return view('layouts.dashboard-page.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $jenis = JenisCucian::all();
        $costumer = Costumer::all();
        $transaksi = Transaksi::with('costumer', 'jenis')->latest()->get();


        $kodeTransaksi = "TCL-" . time();

        return view('layouts.dashboard-page.transaksi.create', compact('jenis', 'costumer', 'kodeTransaksi', 'transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'costumerId' => 'required',
            'jenisId' => 'required',
            'kodeTransaksi' => 'required',
            'berat' => 'required',
            'keterangan' => 'nullable',
        ]);

        Transaksi::create([
            'costumer_id' => $request->costumerId,
            'jenis_id' => $request->jenisId,
            'kodeTransaksi' => $request->kodeTransaksi,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('massage', 'Data Pesanan berhasil disimpan.');
    }

    public function show(Transaksi $transaksi)
    {
        //
    }

    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
