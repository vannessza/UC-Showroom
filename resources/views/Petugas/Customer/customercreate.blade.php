@extends('petugas.layouts.main')

@section('container')

<div class="form-signin form m-auto p-4">
    <h1>Create Customer</h1>
    <form method="post" action="{{ route('admin.customer.store') }}">
        @csrf
        <div class="form-floating">
            <input type="text" name="nama" class="form-control rounded-top mb-3" id="nama" placeholder="Nama" required value="{{ old('nama') }}">
            <label for="nama">Nama</label>
        </div>
        <div class="form-floating">
            <input type="text" name="alamat" class="form-control mb-3" id="alamat" placeholder="Username" required value="{{ old('alamat') }}">
            <label for="alamat">Alamat</label>
        </div>
        <div class="form-floating">
            <input type="no_telepon" name="no_telepon" class="form-control mb-3" id="no_telepon" placeholder="name@example.com" required value="{{ old('no_telepon') }}">
            <label for="no_telepon">No Telepon</label>
        </div>
        <div class="form-floating">
            <input type="ID_card" name="ID_card" class="form-control mb-3" id="ID_card" placeholder="name@example.com" required value="{{ old('ID_card') }}">
            <label for="ID_card">ID Card</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection