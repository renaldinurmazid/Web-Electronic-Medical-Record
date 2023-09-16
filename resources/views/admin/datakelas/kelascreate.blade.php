@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Kelas</h1>
<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><strong>TAMBAH KELAS</strong></h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('kelas.store') }}">
            @csrf
            <div class="form-group">
                <label for="namakelas">Nama Kelas</label>
                <input type="text" id="namakelas" class="form-control" name="namakelas">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
@endsection
