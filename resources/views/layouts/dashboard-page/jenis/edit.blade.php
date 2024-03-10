@extends('home')
@section('title', 'Edit Jenis Cucian')
@section('content')

    <div class="row">
        <form action="{{ url('jenisCucian/update', ['jenisCucian' => $jenisCucian]) }}" class="col-lg-12" method="POST">
            @method('PATCH')
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Input @yield('title')</h6>
                </div>
                <div class="card-body">
                    <label for="labelName">Nama Costumer</label>
                    <input type="text" name="name" value="{{ $jenisCucian->name }}" class="form-control"
                        placeholder="Masukkan Nama Costumer">
                    <label for="labelAlamat">Alamat Costumer</label>
                    <input type="text" name="harga" value="{{ $jenisCucian->harga }}" class="form-control"
                        placeholder="Masukkan Harga Costumer">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="sumbit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
