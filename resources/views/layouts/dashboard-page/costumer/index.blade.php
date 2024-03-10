@extends('home')
@section('title', 'Costumer')
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
                            <th width="10px">#</th>
                            <th>Name</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($costumer as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->noTelp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <form action="{{ url('costumer/edit', $item->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-sm btn-info float-left"><i
                                                class="fas fa-pencil-alt"></i></button>
                                    </form>
                                    <button type="button" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @include('layouts.dashboard-page.costumer.delete', ['costumer' => $item->id])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ url('costumer/simpan') }}" class="col-lg-12" method="POST">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Input @yield('title')</h6>
                </div>
                <div class="card-body">
                    <label for="labelName">Nama Costumer</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Costumer">
                    <label for="labelAlamat">Alamat Costumer</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Costumer">
                    <label for="labelNoTelp">NoTelp Costumer</label>
                    <input type="number" name="noTelp" class="form-control" placeholder="Masukkan NoTelp Costumer">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="sumbit">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection
