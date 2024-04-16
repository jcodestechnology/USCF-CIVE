@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Manage Neno la Wiki</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
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
                    <!-- Table with stripped rows -->
                    <table class="table datatable" style="table-layout: auto; width: 100%;">
                        <thead>
                            <tr>
                                <th style="white-space: nowrap;">Tarehe</th>
                                <th style="white-space: nowrap;">Kichwa</th>
                                <th style="white-space: nowrap;">Kifungu</th>
                                <th style="white-space: nowrap;">Maelezo</th>
                                <th style="white-space: nowrap;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($allNenoLaWeek as $nenoLaWeek)
                            <tr>
                                <td>{{ $nenoLaWeek->created_at }}</td>
                                <td>{{ $nenoLaWeek->kichwa }}</td>
                                <td>{{ $nenoLaWeek->kifungu }}</td>
                                <td>{!! $nenoLaWeek->maelezo !!}</td>
                                <td>
                                    <!-- Edit Icon -->
                                    <a href="{{ route('editNeno', $nenoLaWeek->id) }}"><i class="bi bi-pencil"></i></a>
                                    <!-- Delete Icon -->
                                    <a href="" data-toggle="modal" data-target="#deleteModal{{ $nenoLaWeek->id }}"><i class="bi bi-trash"></i></a>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $nenoLaWeek->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $nenoLaWeek->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $nenoLaWeek->id }}">Confirm Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this post?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('deleteNeno', $nenoLaWeek->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
