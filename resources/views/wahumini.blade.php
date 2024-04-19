@extends('layouts.main_admindashboard')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Wahumini</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                
                @if ($users->isEmpty())
                    <p class="alert alert-info" role="alert">No entries found.</p>
                @else
                    <!-- Table with stripped rows -->
                    <table class="table datatable" style="table-layout: auto; width: 100%;">
                        <thead>
                            <tr>
                                <th style="white-space: nowrap;">
                                    <b>Name</b>
                                </th>
                                <th style="white-space: nowrap;">Phone</th>
                                <th style="white-space: nowrap;">First Year</th>
                                <th style="white-space: nowrap;">Final Year</th>
                                <th style="white-space: nowrap;">Academic Year</th>
                                <th style="white-space: nowrap;">Block</th>
                                <th style="white-space: nowrap;">Program</th>
                                <th style="white-space: nowrap;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Your existing HTML content -->
                            @foreach($users as $user)
                                <tr>
                                    <!-- Display user details -->
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->year_started }}</td>
                                    <td>{{ $user->year_completion }}</td>
                                    <td>{{ $user->academic_year }}</td>
                                    <td>{{ $user->block }}</td>
                                    <td>{{ $user->program->name }}</td>
                                    <td>
                                        <!-- View icon with modal trigger -->
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="view-user" data-toggle="modal" data-target="#userModal{{ $user->id }}" title="View"><i class="fas fa-eye text-primary mr-2"></i></a>
                                            <a href="#" title="Assign"><i class="fas fa-user-plus text-success"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal for user details -->
                                <div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="userModalLabel">User Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- User details -->
                                                <div class="text-center">
        <img src="{{ asset($user->profile) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 150px;">
    </div>
                                                <p><strong>Name:</strong> {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</p>
                                                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                                                <p><strong>First Year:</strong> {{ $user->year_started }}</p>
                                                <p><strong>Final Year:</strong> {{ $user->year_completion }}</p>
                                                <p><strong>Academic Year:</strong> {{ $user->academic_year }}</p>
                                                <p><strong>Block:</strong> {{ $user->block }}</p>
                                                <p><strong>Program:</strong> {{ $user->program->name }}</p>
                                                <!-- Add more details as needed -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Your existing HTML content continues -->
                        </tbody>
                    </table>
                @endif
                <!-- End Table with stripped rows -->

                <!-- Button to download the list as PDF -->
                <a href="{{ route('users.download_pdf') }}" class="btn" style="background:#086808; color:#FFFFFF">Download List as PDF</a>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Dompdf script for generating PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompdf/0.8.6/dompdf.min.js"></script>

<script>
    $(document).ready(function() {
        $('.view-user').click(function() {
            var target = $(this).data('target');
            $(target).modal('show');
        });
    });
</script>
<style>
    /* CSS */
.modal-body .text-center img {
    display: block;
    margin: 0 auto; /* Center the image horizontally */
}

/* Adjust image size */
.modal-body img {
    max-width: 100%;
    height: auto;
}

</style>
@endsection
