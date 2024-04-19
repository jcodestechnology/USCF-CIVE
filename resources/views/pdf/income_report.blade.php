<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TAARIFA YA MAPATO YA KANISA</title>
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
        .receipts {
            margin-top: 20px;
        }
        .receipts h2 {
            margin-bottom: 10px;
        }
        .receipts ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .receipts ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Section A: Committee Income --}}
        <div class="header">
            <h1>CCT-UNIVERSITY STUDENT CHRISTIAN FELLOWSHIP</h1>
            <p>USCF-College of Informatics and Virtual Education (CIVE)</p>
            <h2>TAARIFA YA MAPATO YA KANISA</h2>
            <p>Kuanzia Tarehe: {{ date('d/m/Y', strtotime($startDate)) }} - {{ date('d/m/Y', strtotime($endDate)) }}</p>
            <hr>
        </div>

        {{-- Section B: Sadaka za Kanisa --}}
        <div class="header">
            <h2>A: MAPATO YA SADAKA ZA KANISA</h2>
           
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
                    $totalOfferings = [
                        'sadaka_jumapili' => 0,
                        'chaplaincy' => 0,
                        'uscfcive' => 0,
                        'kumtunza_mchungaji' => 0,
                        'mnada' => 0,
                        'shukrani_ya_pekee' => 0,
                        'changizo' => 0,
                        'madhabahu' => 0,
                        'katikati_week' => 0,
                    ];
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
                        // Update total offerings
                        $totalOfferings['sadaka_jumapili'] += $incomeItem->sadaka_jumapili;
                        $totalOfferings['chaplaincy'] += $incomeItem->sadaka_jumapili * 0.7;
                        $totalOfferings['uscfcive'] += $incomeItem->sadaka_jumapili * 0.3;
                        $totalOfferings['kumtunza_mchungaji'] += $incomeItem->kumtunza_mchungaji;
                        $totalOfferings['mnada'] += $incomeItem->mnada;
                        $totalOfferings['shukrani_ya_pekee'] += $incomeItem->shukrani_ya_pekee;
                        $totalOfferings['changizo'] += $incomeItem->changizo;
                        $totalOfferings['madhabahu'] += $incomeItem->sadaka_madhabahu;
                        $totalOfferings['katikati_week'] += $incomeItem->katikati_week;
                    @endphp
                @endforeach
                <tr class="total-row">
                    <td>Jumla</td>
                    <td>{{ number_format($totalOfferings['sadaka_jumapili']) }}</td>
                    <td>{{ number_format($totalOfferings['chaplaincy']) }}</td>
                    <td>{{ number_format($totalOfferings['uscfcive']) }}</td>
                    <td>{{ number_format($totalOfferings['kumtunza_mchungaji']) }}</td>
                    <td>{{ number_format($totalOfferings['mnada']) }}</td>
                    <td>{{ number_format($totalOfferings['shukrani_ya_pekee']) }}</td>
                    <td>{{ number_format($totalOfferings['changizo']) }}</td>
                    <td>{{ number_format($totalOfferings['madhabahu']) }}</td>
                    <td>{{ number_format($totalOfferings['katikati_week']) }}</td>
                    <td>{{ number_format(array_sum($totalOfferings)) }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Section C: Committee Income --}}
<div class="header">
    <h2>B: MAPATO YA KAMATI MBALIMBALI</h2>
</div>
@php
    $totalCommitteeIncome = 0; // Initialize the variable here
@endphp
@foreach($committeeIncome as $committee => $income)
    @php
        $committeeTotalIncome = 0;
    @endphp
    <h3>{{ $committee }}</h3>
    <table>
        <!-- Committee Income table content -->
        @foreach($income as $item)
            <tr>
                <td>{{ date('d/m/Y', strtotime($item->tarehe)) }}</td>
                <td>{{ number_format($item->kiasi_cha_mapato) }}</td>
            </tr>
            @php
                $committeeTotalIncome += $item->kiasi_cha_mapato;
            @endphp
        @endforeach
        <!-- Add total row for each committee -->
        <tr class="total-row">
            <td>Jumla</td>
            <td>{{ number_format($committeeTotalIncome) }}</td>
        </tr>
    </table>
    @php
        $totalCommitteeIncome += $committeeTotalIncome;
    @endphp
@endforeach
        {{-- Section D: Project Income --}}
        <div class="header">
            <h2>C: MAPATO YA KAMATI YA MIRADI</h2>
          
        </div>
        <table>
            <thead>
                <tr>
                    <th>Tarehe</th>
                    <th>Jina la Mradi</th>
                    <th>Gharama kwa bidhaa</th>
                    <th>Idadi ya bidhaa</th>
                    <th>Jumla ya Fedha</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalProjectIncome = 0;
                @endphp
                @foreach($projectIncome as $item)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($item->date)) }}</td>
                        <td>{{ $item->project_name }}</td>
                        <td>{{ number_format($item->cost_per_item) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->total_cost) }}</td>
                    </tr>
                    @php
                        $totalProjectIncome += $item->total_cost;
                    @endphp
                @endforeach
                <tr class="total-row">
                    <td>Jumla</td>
                    <td colspan="4">{{ number_format($totalProjectIncome) }}</td>
                </tr>
            </tbody>
        </table>

      
    
        {{-- Section E: Overall Totals --}}
<div class="header">
    <h2>D: JUMLA YA MAKUSANYO</h2>
    <table>
        <!-- Overall Totals table content -->
        <tr>
            <td>Jumla ya Mapato ya Sadaka za Kanisa:</td>
            <td>{{ number_format(array_sum($totalOfferings)) }}</td>
        </tr>
        <tr>
            <td>Jumla ya Mapato ya Kamati Mbalimbali:</td>
            <td>{{ number_format($totalCommitteeIncome) }}</td>
        </tr>
        <tr>
            <td>Jumla ya Mapato ya Kamati ya Miradi:</td>
            <td>{{ number_format($totalProjectIncome) }}</td>
        </tr>
        <tr class="total-row">
            <td>Jumla ya Mapato ya Taarifa Nzima:</td>
            <td>{{ number_format(array_sum($totalOfferings) + $totalCommitteeIncome + $totalProjectIncome) }}</td>
        </tr>
    </table>
</div>


    </div>
</body>
</html>
