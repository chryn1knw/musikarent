<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kategori Alat Musik</title>
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
    <h2>Laporan Kategori Alat Musik</h2>
    <p class="subtitle">Sistem Rental Alat Musik & Studio</p>

    <div class="date">
        Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Dibuat Pada</th>
                <th>Diupdate Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>{{ $category->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>