@extends('petugas.layouts.main')

@section('container')

<div class="p-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Kendaraan</h1>
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('admin.kendaraan.create') }}">
                <i class="fas fa-arrow-alt-circle-right"></i> Create
            </a>
        </div>
    </div>
@if(count($kendaraan) > 0)
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @php($i = 0)
            @foreach($kendaraan as $ken)
            @php($i++)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $ken['model'] }}</td>
            <td>{{ $ken['tahun'] }}</td>
            <td>{{ $ken['jumlah_penumpang'] }}</td>
            <td>{{ $ken['manufaktur'] }}</td>
            <td>{{ $ken['harga'] }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-primary" href="{{ route('admin.kendaraan.edit', $ken->id) }}">
                        <i class="fas fa-arrow-alt-circle-right"></i>Edit
                    </a>
                    <a class="btn btn-danger" href="{{ route('admin.kendaraan.delete', $ken->id) }}">
                        <i class="fas fa-arrow-alt-circle-right"></i>Delete
                    </a>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info">
    Belum ada data yang tersedia.
</div>
@endif

@endsection