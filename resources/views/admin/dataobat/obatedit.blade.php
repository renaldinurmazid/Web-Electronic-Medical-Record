@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Obat</h1>
<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><strong>EDIT STOK OBAT</strong></h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('obat.update', $obat->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" id="nama_obat" class="form-control" name="nama_obat" value="{{ $obat->nama_obat }}">
            </div>
            <div class="form-group">
                <label for="manfaat">Manfaat</label>
                <input type="text" id="manfaat" class="form-control" name="manfaat" value="{{ $obat->manfaat}}">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" class="form-control" name="stok" value="{{ $obat->stok }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
@endsection
