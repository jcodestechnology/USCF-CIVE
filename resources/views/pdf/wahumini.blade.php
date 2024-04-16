<!-- resources/views/pdf/user_list.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        .table-container {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .logo-container {
    text-align: center;
}
.logo-container img {
    max-width: 200px; /* Adjust the width as needed */
}

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagenum:before {
            content: counter(page);
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>CCT-UNIVERSITY STUDENT CHRISTIAN FELLOWSHIP</h1>
   
        <p>USCF College of Informatics and Virtual Education (CIVE)</p>
        <h2>Orodha ya wahumini wa kanisa la USCF-CIVE</h2>
        <hr>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Names</th>
                    <th>Phone</th>
                    <th>First Year</th>
                    <th>Last Year</th>
                    <th>Block</th>
                    <th>Program</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->year_started }}</td>
                    <td>{{ $user->year_completion }}</td>
                    <td>{{ $user->block }}</td>
                    <td>{{ $user->program->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        Page <span class="pagenum"></span>
    </div>
</body>
</html>
