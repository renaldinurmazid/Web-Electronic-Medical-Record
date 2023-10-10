@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">KELAS</h1>
<a href="{{ url('kelas/create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah</a>
{{-- Search --}}
<form class="d-inline-block d-sm-inline-block form-inline float-right">
    <div class="input-group">
        <input type="search" name="search" value="{{ $vcari }}" class="form-control bg-light border-0 small shadow" placeholder="Cari Nama Kelas"
        aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary d-none d-sm-block" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            <button type="submit" class="btn btn-primary btn-sm d-block d-sm-none" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            <a href="{{ url('kelas')}}" class="btn btn-danger d-none d-sm-block" type="button">
                <i class="fas fa-history fa-sm"></i>
            </a>
            <a href="{{ url('kelas')}}" class="btn btn-danger btn-sm d-block d-sm-none" type="button">
                <i class="fas fa-history fa-sm"></i>
            </a>
        </div>
    </div>
</form>
<br><br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <script>
            $(document).ready(function () {
                var message = @json(Session::get('success')); 
                if (message) {
                    // Use sweetAlert instead of Swal.fire
                    swal({
                        icon: 'success',
                        title: 'Success Message',
                        text: message,
                        confirmButtonText: 'OK'
                    });
                }
            });
        </script>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-fixed" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $kelas as $k )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->namakelas }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', ['id' => $k->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> - 
                            <a href="{{ route('kelas.destroy', ['id' => $k->id]) }}"
                                class="btn btn-danger btn-sm"
                                onclick="event.preventDefault();
                                if (confirm('Apakah anda yakin ingin menghapus?')) {
                                  document.getElementById('delete-form-{{ $k->id }}').submit();
                                }">
                                 <i class="fas fa-trash-alt"></i>
                            </a>
                            <form id="delete-form-{{ $k->id }}" action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
