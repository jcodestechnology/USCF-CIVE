<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TAARIFA YA MATUMIZI YA KANISA</title>
    <style>
        @page {
            size: landscape;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            overflow-x: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 5px 0;
        }
        .header p {
            margin: 0;
        }
        .header h2 {
            margin-bottom: 10px;
        }
        .header hr {
            border: 1px solid #000;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        td:first-child {
            min-width: 120px; /* Ensure date column is wide enough */
        }
        .total-row td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CCT-UNIVERSITY STUDENT CHRISTIAN FELLOWSHIP</h1>
            <p>USCF-College of Informatics and Virtual Education (CIVE)</p>
            <h2>TAARIFA YA MATUMIZI YA KANISA</h2>
            <p>Kuanzia Tarehe: {{ date('d/m/Y', strtotime($startDate)) }} - {{ date('d/m/Y', strtotime($endDate)) }}</p>
            <hr>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tarehe</th>
                    <th>Matumizi</th>
                    <th>Kiasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($expense->expense_date)) }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>{{ number_format($expense->amount) }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="2">Jumla ya Matumizi:</td>
                    <td>{{ number_format($totalExpenses) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
