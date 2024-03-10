@extends('home')
@section('title', 'Edit Costumer')
@section('content')

    <div class="row">
        <form action="{{ url('costumer/update', ['costumer' => $costumer]) }}" class="col-lg-12" method="POST">
            @method('PATCH')
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Input @yield('title')</h6>
                </div>
                <div class="card-body">
                    <label for="labelName">Nama Costumer</label>
                    <input type="text" name="name" value="{{ $costumer->name }}" class="form-control"
                        placeholder="Masukkan Nama Costumer">
                    <label for="labelAlamat">Alamat Costumer</label>
                    <input type="text" name="alamat" value="{{ $costumer->alamat }}" class="form-control"
                        placeholder="Masukkan Alamat Costumer">
                    <label for="labelNoTelp">NoTelp Costumer</label>
                    <input type="number" name="noTelp" value="{{ $costumer->noTelp }}" class="form-control"
                        placeholder="Masukkan NoTelp Costumer">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="sumbit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
