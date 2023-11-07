<?php

namespace App\Http\Controllers;

use App\Models\kelasM;
use App\Models\obatM;
use App\Models\siswaM;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = siswaM::search(request('search'))
        ->paginate(10);
        $vcari = request('search');
        $obatList = obatM::all();
        $kelasList = kelasM::all(); 
        $x['title']='Data Siswa';
        return view('admin.datasiswa.datasiswa', compact('siswa','obatList','kelasList','vcari'), $x);
    }
    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $siswa = siswaM::find($id);

        if ($siswa) {
            $siswa->update(['status' => $status]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Data not found.']);
    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obatList = obatM::all();
        $kelasList = kelasM::all(); 
        $siswa = siswaM::all();
        $x['title']='Tambah Datasiswa';
        return view('admin.datasiswa.datasiswacreate', compact( 'kelasList', 'obatList'), $x);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|unique:siswa,nisn',
            'nama_lengkap' => 'required',
            'kelas_id' => 'required', 
            'sakit' => 'required',
            'tanggal' => 'required|date',
            'obat_id' => 'required',
            'alamat' => 'required',
            // 'status' => 'required',
        ]);

        siswaM::create($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Datasiswa Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $x['title']='Edit Datasiswa';
        $obatList = obatM::all();
        $kelasList = kelasM::all();
        $siswa = siswaM::find($id);
        return view('admin.datasiswa.datasiswaedit', compact('siswa','kelasList', 'obatList'), $x);
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
        $s = siswaM::findOrFail($id);
        
        $s->update([
            'nisn' =>$request->nisn,
            'nama_lengkap' =>$request->nama_lengkap,
            'kelas_id' =>$request->kelas_id,
            'sakit' => $request->sakit,
            'tanggal' =>$request->tanggal,
            'obat_id' =>$request->obat_id,
            'alamat' =>$request->alamat,
            'status' =>$request->status,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data peserta berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = siswaM::findOrFail($id);
        $s->delete();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus.');
    }
    
    public function pdf($id){
        $s = siswaM::findOrFail($id);
        $pdf = Pdf::loadview('admin.suratpdf', ['s' => $s]);
        return $pdf-> stream('surat-izin.pdf');
    }

    public function status(Request $request, siswaM $siswa)
    {
        // Get the value of the 'status' field from the request.
        $status = $request->input('status');

        // Check which button was clicked (Sembuh or Pulang) and update the status accordingly.
        if ($status === 'Sembuh') {
            $siswa->update(['status' => '1']);
        } elseif ($status === 'Pulang') {
            $siswa->update(['status' => '1']);
        }

        return redirect()->route('siswa.index')->with('success', 'Status updated successfully.');
    }
}
