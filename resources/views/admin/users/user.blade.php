@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">USERS</h1>
<a href="{{ route('user.create') }}" class="btn btn-success my-2">Tambah +</a>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $users)
                    <tr>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->password }}</td>
                        <td>{{ $users->role }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('user.edit', ['id' => $users->id]) }}" class="btn btn-warning mx-1"> 
                                    <i class="fas fa-fw fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('user.destroy', $users->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
