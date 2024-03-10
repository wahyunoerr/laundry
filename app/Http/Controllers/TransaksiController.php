<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\JenisCucian;
use App\Models\Transaksi;
use Illuminate\Http\Request;

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

        $kodeTransaksi = "TCL-" . time();

        return view('layouts.dashboard-page.transaksi.create', compact('jenis', 'costumer', 'kodeTransaksi'));
    }

    public function store(Request $request)
    {
        //
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
