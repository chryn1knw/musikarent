<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Studio</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
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
    <h2>Laporan Studio</h2>
    <p class="subtitle">Sistem Rental Alat Musik & Studio</p>

    <div class="date">
        Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Studio</th>
                <th>Harga / Jam</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Rating</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studios as $studio)
                <tr>
                    <td>{{ $studio->id }}</td>
                    <td>{{ $studio->name }}</td>
                    <td>Rp {{ number_format($studio->price_per_hour, 2, ',', '.') }}</td>
                    <td>{{ $studio->capacity }} orang</td>
                    <td>{{ ucfirst($studio->status) }}</td>
                    <td>{{ $studio->rating ?? '-' }}</td>
                    <td>{{ $studio->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>