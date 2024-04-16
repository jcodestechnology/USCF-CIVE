@extends('layouts.main_admindashboard')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage Matangazo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Manage Matangazo</li>
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
                <h5 class="card-title">Matangazo ya Kanisa</h5>

                <!-- Search Bar -->
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                </div>

                @if ($matangazos->isEmpty())
                    <p class="alert alert-info" role="alert">Hamna matangazo yaliyo tumwa wiki hii.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Headline</th>
                                <th>Content</th>
                                <th>Posted on</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($matangazos as $matangazo)
                                <tr>
                                    <td>{{ $matangazo->headline }}</td>
                                    <td>{{ $matangazo->content }}</td>
                                    <td>{{ $matangazo->created_at->format('Y-m-d') }}</td> <!-- Display the created date -->
                                    <td>
                                        <button class="btn " style="background:#086808; color:#FFFFFF" data-toggle="modal" data-target="#editModal{{ $matangazo->id }}">
                                            Edit
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $matangazo->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $matangazo->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $matangazo->id }}">Edit Matangazo Entry</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('update.matangazo', $matangazo->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="editHeadline{{ $matangazo->id }}">Headline</label>
                                                        <input type="text" class="form-control" id="editHeadline{{ $matangazo->id }}" name="headline" value="{{ $matangazo->headline }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editContent{{ $matangazo->id }}">Content</label>
                                                        <textarea class="form-control" id="editContent{{ $matangazo->id }}" name="content">{{ $matangazo->content }}</textarea>
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
