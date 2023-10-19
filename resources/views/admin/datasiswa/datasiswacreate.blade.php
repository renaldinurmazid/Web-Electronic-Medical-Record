@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Datasiswa</h1>
<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><strong>TAMBAH DATASISWA</strong></h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('siswa.store') }}">
            @csrf
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="number" id="nisn" class="form-control" name="nisn">
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap">
            </div>
            <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select class="form-control" id="kelas_id" name="kelas_id">
                    @foreach($kelasList as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->namakelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sakit">sakit</label>
                <input type="text" id="sakit" class="form-control" name="sakit">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" class="form-control" name="tanggal">
            </div>
            <div class="form-group">
                <label for="obat_id">Obat</label>
                <select class="form-control" id="obat_id" name="obat_id">
                    <option value="" selected>Pilih</option>
                    @foreach($obatList as $obat)
                        <option value="{{ $obat->id }}">{{ $obat->nama_obat }} - {{ $obat->manfaat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" class="form-control" name="alamat">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
@endsection
