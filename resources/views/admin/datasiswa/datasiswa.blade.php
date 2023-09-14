@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">SISWA</h1>
<a href="" class="btn btn-success my-2">Tambah +</a>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Manfaat Obat</th>
                        <th>Jumlah Obat Terisa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tolak Angin Sidomuncul</td>
                        <td>Meredakan Masuk Angin</td>
                        <td>100</td>
                        <td>
                            <div class="d-flex">
                                <a href="" class="btn btn-warning mx-1"> 
                                    <i class="fas fa-fw fa-pencil-alt"></i>
                                </a>
                                <form action="">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
