@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Pesanan</h4>
    <div class="d-flex gap-2">
        <a href="{{ route('pesanan.export') }}" class="btn btn-success">Export</a>
        <a href="{{ route('pesanan.create') }}" class="btn btn-primary">Tambah Pesanan</a>
    </div>
</div>



    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pesanan.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_pelanggan', name: 'nama_pelanggan' },
                { data: 'produk', name: 'produk' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'harga', name: 'harga' },
                { data: 'tanggal_pesanan', name: 'tanggal_pesanan' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Tambahkan event listener untuk tombol "Tambah Pesanan"
        $('#tambahPesanan').click(function() {
            window.location.href = "{{ route('pesanan.create') }}";
        });

        // Event delegation untuk tombol Edit
        $('.data-table').on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            window.location.href = '/pesanan/' + id + '/edit';
        });

        // Event delegation untuk tombol Delete
        $('.data-table').on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
                // Buat form tersembunyi untuk submit delete
                var form = $('<form>', {
                    action: '/pesanan/' + id,
                    method: 'POST'
                });

                // Tambahkan CSRF token
                form.append($('<input>', {
                    type: 'hidden',
                    name: '_token',
                    value: '{{ csrf_token() }}'
                }));

                // Tambahkan method spoofing untuk DELETE
                form.append($('<input>', {
                    type: 'hidden',
                    name: '_method',
                    value: 'DELETE'
                }));

                $('body').append(form);
                form.submit();
            }
        });
    });
</script>
@endpush
