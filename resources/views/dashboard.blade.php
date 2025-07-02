@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h5 class="card-title mb-2">Total Jumlah Order</h5>
                <h2 class="fw-bold text-primary">
                    {{-- Ganti dengan data dinamis jika ada --}}
                    {{ $data->sum('jumlah') }}
                </h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h5 class="card-title mb-2">Total Pesanan</h5>
                <h2 class="fw-bold text-success">
                    {{-- Ganti dengan data dinamis jika ada --}}
                    {{$data->count()}}
                </h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h5 class="card-title mb-2">Total Harga Seluruh Barang</h5>
                <h2 class="fw-bold text-warning">
                    {{-- Ganti dengan data dinamis jika ada --}}
                    Rp {{ number_format($data->sum('harga')) }}
                </h2>
            </div>
        </div>
    </div>  
</div>

<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-white">
        <h5 class="mb-0">Pesanan Terbaru</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Tanggal Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $d)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $d->nama_pelanggan }}</td>
                            <td>{{ $d->produk }}</td>
                            <td>{{ $d->jumlah }}</td>
                            <td>{{ number_format($d->harga) }}</td>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
