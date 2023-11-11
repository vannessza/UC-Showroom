@extends('petugas.layouts.main')

@section('container')

<div class="form-signin form m-auto p-4">
    <h1>Create Order</h1>
    <form method="post" action="{{ route('admin.order.store') }}">
        @csrf
        <div class="form-group">
            <label for="id_customer">Customer:</label>
            <select name="id_customer" id="id_customer" class="form-control mb-3">
                    <option value="">Pilih Customer</option>
                @foreach($customer as $cus)
                    <option value="{{ $cus->id }}">{{ $cus->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Tanggal">Tanggal:</label>
            <input type="date" name="Tanggal" id="Tanggal" class="form-control mb-3">
        </div>

        <!-- Input fields for order details -->
        <div class="form-group">
            <label for="id_kendaraan">Vehicle:</label>
            <select name="id_kendaraan" id="id_kendaraan" class="form-control mb-3">
                    <option value="">Pilih Kendaraan</option>
                @foreach($kendaraan as $ken)
                    <option value="{{ $ken->id }}">{{ $ken->model }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control mb-3">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection