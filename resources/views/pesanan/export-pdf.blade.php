<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
        color: #222;
    }
    h2 {
        text-align: center;
        margin-bottom: 24px;
        margin-top: 10px;
        letter-spacing: 1px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }
    th, td {
        border: 1px solid #888;
        padding: 7px 10px;
    }
    th {
        background: #343a40;
        color: #fff;
        text-align: center;
        font-weight: bold;
        letter-spacing: 0.5px;
    }
    td {
        background: #fff;
    }
    td.center {
        text-align: center;
    }
</style>

<h2>Daftar Pesanan</h2>
<table>
    <thead>
        <tr>
            <th style="width:40px;">No</th>
            <th>Nama Pelanggan</th>
            <th>Produk</th>
            <th style="width:60px;">Jumlah</th>
            <th style="width:100px;">Harga</th>
            <th style="width:120px;">Tanggal Pesanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $index => $pesanan)
        <tr>
            <td class="center">{{ $index + 1 }}</td>
            <td>{{ $pesanan->nama_pelanggan }}</td>
            <td>{{ $pesanan->produk }}</td>
            <td class="center">{{ $pesanan->jumlah }}</td>
            <td>Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
