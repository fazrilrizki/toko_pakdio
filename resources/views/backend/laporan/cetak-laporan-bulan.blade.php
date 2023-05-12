<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static
        {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>LAPORAN PENJUALAN</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Penjualan</b></p>
        <p>Bulan :{{ $monthName }} </p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Nama Produk</th>
                <th>Jumlah Pesanan</th>
                <th>Sisa Stock Barang</th>
                <th>Total Harga</th>
                <th>Alamat Pengirim</th>
                <th>Status</th>
            </tr>
            @foreach($cetakLaporanB as $ambilData)
            <tr>
                <td align="center">{{ $no++ }}</td>
                <td align="center">{{ $ambilData->user->name }}</td>
                <td align="center">{{ $ambilData->product->product_name }}</td>
                <td align="center">{{ $ambilData->jumlah_pembelian }}</td>
                <td align="center">{{ $ambilData->product->product_stock }}</td>
                <td align="center">Rp. @money($totalPenjualanB)</td>
                <td align="center">{{ $ambilData->alamat_pembelian }}</td>
                <td align="center">{{ $ambilData->status }}</td>
            </tr>
            @endforeach
            <p>Total Pemasukkan : Rp. @money($totalPenjualanB)</p>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>