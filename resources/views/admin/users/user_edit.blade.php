@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><strong>TAMBAH USER</strong></h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user.update', $users->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $users->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ $users->email }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin" {{ old('role', $users->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ old('role', $users->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
@endsection
