@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pesanan</h2>
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Produk</label>
            <input type="text" name="produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pesanan</label>
            <input type="date" name="tanggal_pesanan" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
