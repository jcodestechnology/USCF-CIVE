<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Taarifa ya Mapato ya Sadaka ya USCF CIVE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        @page {
            size: landscape;
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
        .total-row {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CCT-UNIVERSITY STUDENT CHRISTIAN FELLOWSHIP</h1>
            <p>USCF-College of Informatics and Virtual Education (CIVE)</p>
            <h2>Taarifa ya mapato ya sadaka za kanisa</h2>
            <p>Kuanzia Tarehe: {{ date('d/m/Y', strtotime($startDate)) }} - {{ date('d/m/Y', strtotime($endDate)) }}</p>
            <hr>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Tarehe</th>
                    <th>Sadaka ya Jumapili</th>
                    <th>(70%) Chaplaincy</th>
                    <th>(30%) USCF-CIVE</th>
                    <th>Sadaka ya Kumtunza Mchungaji</th>
                    <th>Sadaka ya Mnada</th>
                    <th>Sadaka ya Shukrani ya Pekee</th>
                    <th>Sadaka ya Changizo</th>
                    <th>Sadaka ya Madhabahu</th>
                    <th>Sadaka ya Katikati ya Wiki</th>
                    <th>Jumla USCF-CIVE</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalOfferings = [];
                @endphp
                @foreach($income as $incomeItem)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($incomeItem->date)) }}</td>
                        <td>{{ $incomeItem->sadaka_jumapili != 0 ? number_format($incomeItem->sadaka_jumapili) : '-' }}</td>
                        <td>{{ $incomeItem->sadaka_jumapili != 0 ? number_format($incomeItem->sadaka_jumapili * 0.7) : '-' }}</td>
                        <td>{{ $incomeItem->sadaka_jumapili != 0 ? number_format($incomeItem->sadaka_jumapili * 0.3) : '-' }}</td>
                        <td>{{ $incomeItem->kumtunza_mchungaji != 0 ? number_format($incomeItem->kumtunza_mchungaji) : '-' }}</td>
                        <td>{{ $incomeItem->mnada != 0 ? number_format($incomeItem->mnada) : '-' }}</td>
                        <td>{{ $incomeItem->shukrani_ya_pekee != 0 ? number_format($incomeItem->shukrani_ya_pekee) : '-' }}</td>
                        <td>{{ $incomeItem->changizo != 0 ? number_format($incomeItem->changizo) : '-' }}</td>
                        <td>{{ $incomeItem->sadaka_madhabahu != 0 ? number_format($incomeItem->sadaka_madhabahu) : '-' }}</td>
                        <td>{{ $incomeItem->katikati_week != 0 ? number_format($incomeItem->katikati_week) : '-' }}</td>
                        <td>{{ $incomeItem->sadaka_jumapili != 0 ? number_format($incomeItem->sadaka_jumapili * 0.3 + $incomeItem->kumtunza_mchungaji + $incomeItem->mnada + $incomeItem->shukrani_ya_pekee + $incomeItem->changizo + $incomeItem->sadaka_madhabahu + $incomeItem->katikati_week) : '-' }}</td>
                    </tr>
                    @php
                        // Store the total offering for each type
                        $totalOfferings['sadaka_jumapili'] = ($totalOfferings['sadaka_jumapili'] ?? 0) + $incomeItem->sadaka_jumapili;
                        $totalOfferings['kumtunza_mchungaji'] = ($totalOfferings['kumtunza_mchungaji'] ?? 0) + $incomeItem->kumtunza_mchungaji;
                        $totalOfferings['mnada'] = ($totalOfferings['mnada'] ?? 0) + $incomeItem->mnada;
                        $totalOfferings['shukrani_ya_pekee'] = ($totalOfferings['shukrani_ya_pekee'] ?? 0) + $incomeItem->shukrani_ya_pekee;
                        $totalOfferings['changizo'] = ($totalOfferings['changizo'] ?? 0) + $incomeItem->changizo;
                        $totalOfferings['sadaka_madhabahu'] = ($totalOfferings['sadaka_madhabahu'] ?? 0) + $incomeItem->sadaka_madhabahu;
                        $totalOfferings['katikati_week'] = ($totalOfferings['katikati_week'] ?? 0) + $incomeItem->katikati_week;
                    @endphp
                @endforeach
                <tr class="total-row">
                    <td>Jumla</td>
                    <td>{{ number_format($totalOfferings['sadaka_jumapili'] ?? 0) }}</td>
                    <td>{{ number_format($totalOfferings['sadaka_jumapili'] * 0.7) }}</td>
                    <td>{{ number_format($totalOfferings['sadaka_jumapili'] * 0.3) }}</td>
                    <td>{{ number_format($totalOfferings['kumtunza_mchungaji'] ?? 0) }}</td>
                    <td>{{ number_format($totalOfferings['mnada'] ?? 0) }}</td>
                    <td>{{ number_format($totalOfferings['shukrani_ya_pekee'] ?? 0) }}</td>
                    <td>{{ number_format($totalOfferings['changizo'] ?? 0) }}</td>
                    <td>{{ number_format($totalOfferings['sadaka_madhabahu'] ?? 0) }}</td>
                    <td>{{ number_format($totalOfferings['katikati_week'] ?? 0) }}</td>
                    <td>{{ number_format($totalOfferings['sadaka_jumapili'] * 0.3 + ($totalOfferings['kumtunza_mchungaji'] ?? 0) + ($totalOfferings['mnada'] ?? 0) + ($totalOfferings['shukrani_ya_pekee'] ?? 0) + ($totalOfferings['changizo'] ?? 0) + ($totalOfferings['sadaka_madhabahu'] ?? 0) + ($totalOfferings['katikati_week'] ?? 0)) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
