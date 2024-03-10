@extends('home')
@section('title', 'Transaksi')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('success') !!}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables @yield('title')</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Transaksi</th>
                            <th>Costumer</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>Rp.{{ $item->total }}/kg</td>
                                <td>
                                    <form action="{{ url('jenisCucian/edit', $item->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-sm btn-info float-left"><i
                                                class="fas fa-pencil-alt"></i></button>
                                    </form>
                                    <button type="button" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            {{-- @include('layouts.dashboard-page.jenis.delete', [
                                'jenisCucian' => $item->id,
                            ]) --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
