<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .heading {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%
        }
    </style>
</head>
<body>
    <div class="heading">
        <h3>Data Transaksi</h3>
    </div>
    <p>Rentang Waktu: {{ $oldestDate->format('d-m-Y') }} - {{ $newestDate->format('d-m-Y') }}</p>
    <p>Tanggal Dibuat: {{ $createdDate->format('d-m-Y H:i:s') }}</p>
    <table class="table table-hover my-0" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Mobil</th>
                <th>Tanggal Rental</th>
                <th>Tanggal Kembali</th>
                <th>Total Harga Rental</th>
                <th>Denda</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->car->merek }} {{ $transaction->car->tipe }}</td>
                <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                <td>{{ $transaction->tanggal_selesai->format('d-m-Y') }}</td>
                <td>{{ $transaction->total_harga }}</td>
                <td>{{ $transaction->denda }}</td>
                <td>{{ $transaction->total_harga + $transaction->denda }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
