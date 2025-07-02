@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pesanan</h2>
    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" value="{{ old('nama_pelanggan', $pesanan->nama_pelanggan) }}" required>
        </div>
        <div class="mb-3">
            <label>Produk</label>
            <input type="text" name="produk" class="form-control" value="{{ old('produk', $pesanan->produk) }}" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $pesanan->jumlah) }}" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $pesanan->harga) }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pesanan</label>
            <input type="date" name="tanggal_pesanan" class="form-control" value="{{ old('tanggal_pesanan', $pesanan->tanggal_pesanan) }}" required>
        </div>
        <button class="btn btn-success">Update</button>
        <button class="btn btn-danger">Batal</button>
    </form>
</div>
@endsection
