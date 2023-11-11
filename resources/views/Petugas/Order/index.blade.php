@extends('petugas.layouts.main')

@section('container')

<div class="p-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Order</h1>
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('admin.order.create') }}">
                <i class="fas fa-arrow-alt-circle-right"></i> Create
            </a>
        </div>
    </div>
@if(count($order) > 0)
    <table class="table">
        <br>
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>ID Order</th>
            <th>Nama Customer</th>
            <th>Tanggal Order</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @php($i = 0)
            @foreach($order as $ord)
            @php($i++)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $ord->id }}</td>
            <td>{{ $ord->customer->nama }}</td>
            <td>{{ $ord->Tanggal}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-info" href="{{ route('admin.order.show', $ord->id) }}">
                        <i class="fas fa-arrow-alt-circle-right"></i>Show
                    </a>
                    <a class="btn btn-primary" href="{{ route('admin.order.edit', $ord->id) }}">
                        <i class="fas fa-arrow-alt-circle-right"></i>Edit
                    </a>
                    <a class="btn btn-danger" href="{{ route('admin.order.delete', $ord->id) }}">
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