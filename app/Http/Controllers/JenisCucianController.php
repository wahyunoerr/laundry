<?php

namespace App\Http\Controllers;

use App\Models\JenisCucian;
use Illuminate\Http\Request;

class JenisCucianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisCucian = JenisCucian::latest()->get();

        return view('layouts.dashboard-page.jenis.index', compact('jenisCucian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required'
        ]);


        JenisCucian::create($request->all());

        return redirect('jenis')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisCucian $jenisCucian)
    {
        return view('layouts.dashboard-page.jenis.edit', compact('jenisCucian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisCucian $jenisCucian)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required'
        ]);

        $jenisCucian->update($request->all());

        return redirect('jenis')->with('Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisCucian $jenisCucian)
    {
        $jenisCucian->delete();
        return redirect('jenis')->with('success', 'Data berhasil di hapus');
    }
}
