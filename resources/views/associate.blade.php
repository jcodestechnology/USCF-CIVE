@extends('layouts.main_admindashboard')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>View Associate</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">View Associate</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
                <h5 class="card-title">Associate waliopita USCF CIVE</h5>

                <!-- Search Bar -->
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                </div>

                @if ($users->isEmpty())
                    <p class="alert alert-info" role="alert">No associate entries found.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Jina</th>
                                <th>miaka aliosoma</th>
                                <th>Phone</th>
                                <th>Program</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        @foreach($users as $user)
       <tr>
        <!-- Display user details -->
        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
        <td>{{ $user->year_started }}-{{ $user->year_completion }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->program->name }}</td>
        <td>{{ $user->gender }}</td>
       
    </tr>
@endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Filter table rows based on input value
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@endsection
