<!DOCTYPE html>
<html>
<head>
    <title>List of All Families</title>
    <style>
        /* Add your CSS styles for the PDF here */
        body {
            font-family: Arial, sans-serif;
        }

        /* Header styles */
        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 5px 0;
        }

        header p {
            margin: 0;
        }

        /* Table styles */
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

        /* Footer styles */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }

        /* Clearfix */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Page number */
        .pageNumber {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>CCT-UNIVERSITY STUDENT CHRISTIAN FELLOWSHIP</h1>
        <p>USCF College of Informatics and Virtual Education (CIVE)</p>
        <h2>Orodha za familia za kanisa la USCF-CIVE</h2>
        <hr>
    </header>

    <!-- Content -->
    @foreach($families as $family)
        <h2>Family Number: {{ $family->id }}</h2>
        <?php $counter = 1; ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Title</th>
                    <!-- Add more columns if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($family->members as $member)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $member->firstname }} {{ $member->lastname }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>
                            @if($member->id === $family->father_id)
                                <span class="badge bg-primary">Baba</span>
                            @elseif($member->id === $family->mother_id)
                                <span class="badge bg-danger">Mama</span>
                            @else
                                <span class="badge bg-success">Mtoto</span>
                            @endif
                        </td>
                        <!-- Add more columns if needed -->
                    </tr>
                    <?php $counter++; ?>
                @endforeach
            </tbody>
        </table>
    @endforeach
    
    <!-- Footer -->
    <footer class="clearfix">
        <div class="left-content">Printed by: {{ $authenticatedUser->firstname }} {{ $authenticatedUser->middlename }} {{ $authenticatedUser->lastname }} - {{ now() }}</div>
        <div class="right-content">CCT-USCF CIVE</div>
    </footer>

    <!-- Page number -->
 

    <script>
        // Script to set page number dynamically
        var pageNumber = 1;
        var pageNumbers = document.querySelectorAll('.pageNumberValue');
        for (var i = 0; i < pageNumbers.length; i++) {
            pageNumbers[i].textContent = pageNumber;
            pageNumber++;
        }
    </script>
</body>
</html>
