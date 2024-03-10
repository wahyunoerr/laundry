@extends('home')
@section('title', 'Tambah Transaksi')
@section('content')
    @if (Session::has('massage'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('massage') !!}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <form action="{{ url('transaksi/simpan') }}" class="col-lg-12" method="POST">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Input @yield('title')</h6>
                </div>
                <div class="card-body d-flex justify-content-evenly">
                    <div class="col-lg-6">
                        <label for="labelName">Nama Costumer</label>
                        <select name="costumerId" id="" class="form-control">
                            @foreach ($costumer as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="labelKodeTransaksi">Kode Transaksi</label>
                        <input type="text" name="kodeTransaksi" class="form-control" value="{{ $kodeTransaksi }}"
                            readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="labelName">Jenis Cucian</label>
                        <select name="jenisId" id="" class="form-control">
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="labelNoTransaksi">Berat Cucian (kg) </label>
                        <input type="number" name="berat" class="form-control" placeholder="Masukkan Berat Cucian">
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="labelKeteranganTransaksi">Keterangan</label>
                    <textarea name="keterangan" id="" cols="20" rows="5" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    {{-- Table Pesanan --}}
    <div class="row">
        <div class="card shadow mb-4 col-lg-12">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Pesanan</h6>
            </div>
            <div class="card-body d-flex justify-content-evenly">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Cucian</th>
                                <th>Berat</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalBayar = 0;
                            @endphp
                            @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->jenis->name }}</td>
                                    <td>{{ $item->berat }}</td>
                                    <td>Rp. {{ number_format($item->jenis->harga) }}</td>
                                    <td>
                                        @php
                                            $subTotal = $item->berat * $item->jenis->harga;
                                            $totalBayar += $subTotal;
                                        @endphp
                                        Rp. {{ number_format($subTotal) }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="background-color: grey; color: #f9f9f9">
                                <th colspan="4">Total Bayar</th>
                                <th colspan="2">
                                    Rp. {{ number_format($totalBayar) }}
                                    <input type="hidden" name="total" value="{{ $totalBayar }}">
                                </th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary float-right" type="sumbit">Submit</button>
            </div>
        </div>
    </div>
@endsection
