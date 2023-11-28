@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">SISWA</h1>
<a href="{{ url('siswa/create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah</a>
{{-- Search --}}
<form class="d-inline-block d-sm-inline-block form-inline float-right">
    <div class="input-group">
        {{-- <input type="search" name="search" value="{{ $vcari }}" class="form-control bg-light border-0 small shadow"
            placeholder="Cari nama dan NISN" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary d-none d-sm-block" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            <button type="submit" class="btn btn-primary btn-sm d-block d-sm-none" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            <a href="{{ url('siswa')}}" class="btn btn-danger d-none d-sm-block" type="button">
                <i class="fas fa-history fa-sm"></i>
            </a>
            <a href="{{ url('siswa')}}" class="btn btn-danger btn-sm d-block d-sm-none" type="button">
                <i class="fas fa-history fa-sm"></i>
            </a>
        </div> --}}
    </div>
</form>

<br><br>
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
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
            <table class="table table-bordered text-nowrap" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Kelas</th>
                        <th>Sakit</th>
                        <th>Tanggal</th>
                        <th>Nama Obat</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $siswa as $s )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->nisn }}</td>
                        <td>{{ $s->nama_lengkap }}</td>
                        <td>
                            @if ($s->class)
                            {{ $s->class->namakelas }}
                            @endif
                        </td>
                        <td>{{ $s->sakit }}</td>
                        <td>{{ $s->tanggal }}</td>
                        <td>
                            @if ($s->class2)
                            {{ $s->class2->nama_obat }}
                            @endif
                        </td>
                        <td>{{ $s->alamat }}</td>
                        <td>
                            <div class="d-flex">
                                @if ($s->status)
                                <form action="{{ route('siswa.update', $s->id) }}" method="POST">
                                    @csrf
                                    <!-- Menambahkan token CSRF -->
                                    @method('PUT')
                                    <!-- Mengatur metode menjadi PUT -->
                                    <input type="hidden" name="status" value="{{ $s->status }}">
                                    <!-- Tambahkan input tersembunyi untuk data lainnya -->
                                    <button type="submit" class="btn btn-warning btn-sm" data-status="{{ $s->status }}"
                                        data-confirm="Apakah Anda yakin ingin menandai sebagai '{{ $s->status }}'">{{ $s->status }}</button>
                                </form>
                                @else
                                <form action="{{ route('siswa.update', $s->id) }}" method="POST">
                                    @csrf
                                    <!-- Menambahkan token CSRF -->
                                    @method('PUT')
                                    <!-- Mengatur metode menjadi PUT -->
                                    <input type="hidden" name="status" value="Sembuh"> <!-- Atur status yang sesuai -->
                                    <!-- Tambahkan input tersembunyi untuk data lainnya -->
                                    <input type="hidden" name="nisn" value="{{ $s->nisn }}">
                                    <input type="hidden" name="nama_lengkap" value="{{ $s->nama_lengkap }}">
                                    <input type="hidden" name="kelas_id" value="{{ $s->kelas_id }}">
                                    <input type="hidden" name="sakit" value="{{ $s->sakit }}">
                                    <input type="hidden" name="tanggal" value="{{ $s->tanggal }}">
                                    <input type="hidden" name="obat_id" value="{{ $s->obat_id }}">
                                    <input type="hidden" name="alamat" value="{{ $s->alamat }}">
                                    <button type="submit" class="btn btn-success btn-sm"
                                        data-confirm="Apakah Anda yakin ingin menandai sebagai 'Sembuh'">Sembuh</button>
                                </form>

                                <form action="{{ route('siswa.update', $s->id) }}" method="POST">
                                    @csrf
                                    <!-- Menambahkan token CSRF -->
                                    @method('PUT')
                                    <!-- Mengatur metode menjadi PUT -->
                                    <input type="hidden" name="status" value="Pulang"> <!-- Atur status yang sesuai -->
                                    <!-- Tambahkan input tersembunyi untuk data lainnya -->
                                    <input type="hidden" name="nisn" value="{{ $s->nisn }}">
                                    <input type="hidden" name="nama_lengkap" value="{{ $s->nama_lengkap }}">
                                    <input type="hidden" name="kelas_id" value="{{ $s->kelas_id }}">
                                    <input type="hidden" name="sakit" value="{{ $s->sakit }}">
                                    <input type="hidden" name="tanggal" value="{{ $s->tanggal }}">
                                    <input type="hidden" name="obat_id" value="{{ $s->obat_id }}">
                                    <input type="hidden" name="alamat" value="{{ $s->alamat }}">
                                    <button type="submit" class="btn btn-primary btn-sm mx-2"
                                        data-confirm="Apakah Anda yakin ingin menandai sebagai 'Pulang'">Pulang</button>
                                </form>
                                @endif

                                {{-- <form action="{{ route('siswa.update', $s->id) }}" method="POST">
                                @csrf
                                <!-- Menambahkan token CSRF -->
                                @method('PUT')
                                <!-- Mengatur metode menjadi PUT -->
                                <input type="hidden" name="status" value="Sembuh"> <!-- Atur status yang sesuai -->

                                <!-- Menambahkan input tersembunyi untuk data lainnya -->
                                <input type="hidden" name="nisn" value="{{ $s->nisn }}">
                                <input type="hidden" name="nama_lengkap" value="{{ $s->nama_lengkap }}">
                                <input type="hidden" name="kelas_id" value="{{ $s->kelas_id }}">
                                <input type="hidden" name="sakit" value="{{ $s->sakit }}">
                                <input type="hidden" name="tanggal" value="{{ $s->tanggal }}">
                                <input type="hidden" name="obat_id" value="{{ $s->obat_id }}">
                                <input type="hidden" name="alamat" value="{{ $s->alamat }}">

                                <button type="submit" class="btn btn-success btn-sm" data-status="{{ $s->status }}"
                                    data-confirm="Apakah Anda yakin ingin menandai sebagai 'Sembuh'?">Sembuh</button>
                                </form>

                                <form action="{{ route('siswa.update', $s->id) }}" method="POST">
                                    @csrf
                                    <!-- Menambahkan token CSRF -->
                                    @method('PUT')
                                    <!-- Mengatur metode menjadi PUT -->
                                    <input type="hidden" name="status" value="Pulang"> <!-- Atur status yang sesuai -->

                                    <!-- Menambahkan input tersembunyi untuk data lainnya -->
                                    <input type="hidden" name="nisn" value="{{ $s->nisn }}">
                                    <input type="hidden" name="nama_lengkap" value="{{ $s->nama_lengkap }}">
                                    <input type="hidden" name="kelas_id" value="{{ $s->kelas_id }}">
                                    <input type="hidden" name="sakit" value="{{ $s->sakit }}">
                                    <input type="hidden" name="tanggal" value="{{ $s->tanggal }}">
                                    <input type="hidden" name="obat_id" value="{{ $s->obat_id }}">
                                    <input type="hidden" name="alamat" value="{{ $s->alamat }}">

                                    <button type="submit" class="btn btn-primary btn-sm mx-2"
                                        data-status="{{ $s->status }}"
                                        data-confirm="Apakah Anda yakin ingin menandai sebagai 'Pulang'?">Pulang</button>
                                </form> --}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('siswa.destroy', ['id' => $s->id]) }}" class="btn btn-danger btn-sm"
                                    onclick="event.preventDefault();
                                    if (confirm('Apakah anda yakin ingin menghapus?')) {
                                      document.getElementById('delete-form-{{ $s->id }}').submit();
                                    }">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <form id="delete-form-{{ $s->id }}" action="{{ route('siswa.destroy', $s->id) }}"
                                    method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <a href="{{ route('siswa.edit', ['id' => $s->id]) }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('siswa.pdf', ['id' => $s->id]) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa fa-print" style="padding-right: 5px;"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.btn-success, .btn-primary').click(function () {
            var button = $(this);
            var dataId = button.data('patient-id');
            var status = button.data('status');

            $.ajax({
                url: '/updateStatus/' + dataId,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function (response) {
                    if (response.success) {
                        // Tombol telah diklik, dan status telah diperbarui
                        button.prop('disabled', true); // Menonaktifkan tombol
                    } else {
                        alert('Terjadi kesalahan: ' + response.message);
                    }
                }
            });
        });
    });

    document.querySelectorAll('[data-confirm]').forEach(function (button) {
        button.addEventListener('click', function (e) {
            var confirmationMessage = this.getAttribute('data-confirm');
            if (!confirm(confirmationMessage)) {
                e.preventDefault();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var sembuhBtn = document.querySelector('form[data-status="Sembuh"] button');
        var pulangBtn = document.querySelector('form[data-status="Pulang"] button');

        if (sembuhBtn) {
            sembuhBtn.innerHTML = "Sembuh (Terkirim)";
            sembuhBtn.disabled = true;
        }

        if (pulangBtn) {
            pulangBtn.innerHTML = "Pulang (Terkirim)";
            pulangBtn.disabled = true;
        }
    });

</script>


@endsection