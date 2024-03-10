@extends('home')
@section('title', 'Tambah Transaksi')
@section('content')
    <div class="row">
        <form action="{{ url('transaksi/simpan') }}" class="col-lg-12" method="POST">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Input @yield('title')</h6>
                </div>
                <div class="card-body">
                    <label for="labelName">Nama Costumer</label>
                    <select name="costumerId" id="" class="form-control">
                        @foreach ($costumer as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="labelName">Jenis Cucian</label>
                    <select name="jenisCucianId" id="" class="form-control">
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="labelKodeTransaksi">Kode Transaksi</label>
                    <input type="text" name="kodeTransaksi" class="form-control" value="{{ $kodeTransaksi }}" disabled>
                    <label for="labelNoTransaksi">Harga Jenis Cucian</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga Jenis Cucian">

                    <label for="labelKeteranganTransaksi">Keterangan</label>
                    <textarea name="keterangan" id="" cols="20" rows="5" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="sumbit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
