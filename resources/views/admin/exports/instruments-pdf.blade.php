<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Alat Musik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #111827;
            padding: 1rem;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            text-align: center;
            font-size: 0.875rem;
            color: #6B7280;
            margin-bottom: 1.5rem;
        }

        .date {
            text-align: right;
            font-size: 0.75rem;
            color: #6B7280;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th {
            background-color: #F3F4F6;
            text-align: left;
            padding: 0.5rem;
            font-weight: 600;
            font-size: 0.875rem;
            border-bottom: 1px solid #D1D5DB;
        }

        td {
            padding: 0.5rem;
            font-size: 0.875rem;
            border-bottom: 1px solid #E5E7EB;
        }

        tr:nth-child(even) {
            background-color: #FAFAFA;
        }
    </style>
</head>

<body>
    <h2>Laporan Alat Musik</h2>
    <p class="subtitle">Sistem Rental Alat Musik & Studio</p>

    <div class="date">
        Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Merek</th>
                <th>Kategori</th>
                <th>Harga / Hari</th>
                <th>Stok</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instruments as $instrument)
                <tr>
                    <td>{{ $instrument->id }}</td>
                    <td>{{ $instrument->name }}</td>
                    <td>{{ $instrument->brand ?? '-' }}</td>
                    <td>{{ $instrument->category->name ?? '-' }}</td>
                    <td>Rp {{ number_format($instrument->price_per_day, 2, ',', '.') }}</td>
                    <td>{{ $instrument->stock }}</td>
                    <td>{{ ucfirst($instrument->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>