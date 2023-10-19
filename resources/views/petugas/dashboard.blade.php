@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Dashboard Petugas</h1>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Kelas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKelas}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSiswa}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fcha-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Obat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalObat}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x fa-tablets text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Stok Obat</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Manfaat Obat</th>
                        <th>Jumlah Obat Terisa</th>
                    </tr>
                </thead>
                @foreach ($dataObat as $o)
                <tbody>
                    <tr>
                        <td>{{ $o->nama_obat }}</td>
                        <td>{{ $o->manfaat }}</td>
                        <td>{{ $o->stok }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
