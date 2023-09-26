<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\kelasM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KelasController extends Controller
{
    public function index(){
        $x['title']='Data Kelas';
        $kelas = kelasM::all();
        return view('admin.datakelas.kelas', compact('kelas'), $x);
    }

    public function create()
    {
        $x['title']='Tambah Kelas';
        return view('admin.datakelas.kelascreate', $x);
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
        $x['title']='Edit Kelas';
        $kelas = kelasM::find($id);
        return view('admin.datakelas.kelasedit', compact('kelas'), $x);
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
