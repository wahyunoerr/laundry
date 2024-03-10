<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costumer = Costumer::latest()->get();
        return view('layouts.dashboard-page.costumer.index', compact('costumer'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'noTelp' => 'required',
            'alamat' => 'required'
        ]);

        Costumer::create([
            'name' => $request->name,
            'noTelp' => $request->noTelp,
            'alamat' => $request->alamat
        ]);
        return redirect('costumer')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costumer $costumer)
    {
        return view('layouts.dashboard-page.costumer.edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costumer $costumer)
    {
        $request->validate([
            'name' => 'required',
            'noTelp' => 'required',
            'alamat' => 'required'
        ]);

        $costumer->update([
            'name' => $request->name,
            'noTelp' => $request->noTelp,
            'alamat' => $request->alamat
        ]);

        return redirect('costumer')->with('success', 'Data berhasi di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costumer $costumer)
    {
        $costumer->delete();

        return redirect('costumer')->with('success', 'Data berhasil di hapus');
    }
}
