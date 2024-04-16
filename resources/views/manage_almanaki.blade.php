@extends('layouts.main_admindashboard')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage Almanaki</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Manage Almanaki</li>
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
                <h5 class="card-title">Almanaki ya Kanisa</h5>

                <!-- Search Bar -->
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                </div>

                @if ($almanakis->isEmpty())
                    <p class="alert alert-info" role="alert">No Almanaki entries found.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tarehe</th>
                                <th>Tukio</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($almanakis as $almanaki)
                                <tr>
                                    <td>{{ $almanaki->tarehe }}</td>
                                    <td>{{ $almanaki->tukio }}</td>
                                    <td>
                                        <button class="btn " style="background:#086808; color:#FFFFFF" data-toggle="modal" data-target="#editModal{{ $almanaki->id }}">
                                            Edit
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $almanaki->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $almanaki->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $almanaki->id }}">Edit Almanaki Entry</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('update.almanaki', $almanaki->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="editTarehe{{ $almanaki->id }}">Tarehe</label>
                                                        <input type="date" class="form-control" id="editTarehe{{ $almanaki->id }}" name="tarehe" value="{{ $almanaki->tarehe }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editTukio{{ $almanaki->id }}">Tukio</label>
                                                        <input type="text" class="form-control" id="editTukio{{ $almanaki->id }}" name="tukio" value="{{ $almanaki->tukio }}">
                                                    </div>
                                                    <button type="submit" class="btn " style="background:#086808; color:#FFFFFF">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Edit Modal -->

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
