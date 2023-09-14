@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">PROFILE</h1>
<div class="d-flex justify-content-center align-items-center">
    <img src="{{ asset('images/icon/operator.png') }}" alt="" width="100px" height="100px"
        class="rounded-circle border border-1 border-dark p-1">
</div>
<div class="d-flex justify-content-center align-items-center">
    <div class="w-50 w-md-75">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Role</label>
                <select name="" id="" class="form-control">
                    <option value="">Admin</option>
                    <option value="">Petugas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-4">Submit</button>
        </form>
    </div>
</div>

@endsection
