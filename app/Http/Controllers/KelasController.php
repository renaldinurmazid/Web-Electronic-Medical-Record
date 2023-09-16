<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\kelasM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KelasController extends Controller
{
    public function index(){
        $kelas = kelasM::all();
        return view('admin.datakelas.kelas', compact('kelas'));
    }

    public function create()
    {
        return view('admin.datakelas.kelascreate');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namakelas' => 'required',
        ]);

        kelasM::create($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Data peserta berhasil ditambahkan.');

        
    }

    public function edit($id)
    {
        $kelas = kelasM::find($id);
        return view('admin.datakelas.kelasedit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $k = kelasM::findOrFail($id);
        
        $k->update([
            'namakelas' =>$request->namakelas,
        ]);
        return redirect()->route('kelas.index')->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $k = kelasM::findOrFail($id);
        $k->delete();

        return redirect()->route('kelas.index')->with('success', 'Data berhasil dihapus.');
    }

}
