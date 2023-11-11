@extends('petugas.layouts.main')

@section('container')

<div class="form-signin form m-auto p-4">
    <h1>Edit Order</h1>
    <form method="post" action="{{ route('admin.order.update', $order->id) }}" required>
        @csrf
        <div class="form-group">
            <label for="id_customer">Customer:</label>
            <select name="id_customer" id="id_customer" class="form-control mb-3" required>
                <option value="">Pilih Customer</option>
                @foreach($customer as $cus)
                    <option value="{{ $cus->id }}" {{ $cus->id == $order->id_customer ? 'selected' : '' }}>
                        {{ $cus->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Tanggal">Tanggal:</label>
            <input type="date" name="Tanggal" id="Tanggal" class="form-control mb-3" value="{{ $order->Tanggal }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection