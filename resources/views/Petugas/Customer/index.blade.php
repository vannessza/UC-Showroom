@extends('petugas.layouts.main')

@section('container')
<div class="p-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Customer</h1>
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('admin.customer.create') }}">
                <i class="fas fa-arrow-alt-circle-right"></i> Create
            </a>
        </div>
    </div>
@if(count($customer) > 0)
    <table class="table">
        <br>
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>ID Card</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @php($i = 0)
            @foreach($customer as $cus)
            @php($i++)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $cus['nama'] }}</td>
            <td>{{ $cus['alamat'] }}</td>
            <td>{{ $cus['no_telepon'] }}</td>
            <td>{{ $cus['ID_card'] }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-info" href="{{ route('admin.customer.show', $cus->id) }}">
                        <i class="fas fa-arrow-alt-circle-right"></i>Show
                    </a>
                    <a class="btn btn-primary" href="{{ route('admin.customer.edit', $cus->id) }}">
                        <i class="fas fa-arrow-alt-circle-right"></i>Edit
                    </a>
                    <a class="btn btn-danger" href="{{ route('admin.customer.delete', $cus->id) }}">
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