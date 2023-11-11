@extends('petugas.layouts.main')

@section('container')

<div class="container">
    <br>
    <h2>Order Details</h2>
    <br>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer:</strong> {{ $order->customer->nama }}</p>
    <p><strong>Order Date:</strong> {{ $order->Tanggal }}</p>
    <br>
    <h3>Ordered Vehicle</h3>
    <table class="table">
        <br>
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Model</th>
            <th>Tahun</th>
            <th>Jumlah Penumpang</th>
            <th>Manufaktur</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
            @php($i = 0)
            @foreach ($order->orderDetails as $detail)
            @php($i++)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $detail->kendaraan['model'] }}</td>
            <td>{{ $detail->kendaraan['tahun'] }}</td>
            <td>{{ $detail->kendaraan['jumlah_penumpang'] }}</td>
            <td>{{ $detail->kendaraan['manufaktur'] }}</td>
            <td>{{ $detail->kendaraan['harga'] }}</td>
          </tr>
          @endforeach
        </tbody>
        </table>
        <p><strong>Total Price:</strong> {{ $totalPrice }}</p>
    </div>
</div>

@endsection