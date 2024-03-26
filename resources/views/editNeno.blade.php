@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Edit Neno la Wiki</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">

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

                    <h5 class="card-title">Edit Neno la Wiki</h5>
                    <form action="{{ route('updateNeno', $nenoLaWeek->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kichwa" class="form-label">Kichwa cha Neno</label>
                            <input type="text" class="form-control" id="kichwa" name="kichwa" value="{{ $nenoLaWeek->kichwa }}">
                        </div>
                        <div class="mb-3">
                            <label for="kifungu" class="form-label">Kifungu cha Biblia</label>
                            <input type="text" class="form-control" id="kifungu" name="kifungu" value="{{ $nenoLaWeek->kifungu }}">
                        </div>
                        <div class="mb-3">
                            <label for="maelezo" class="form-label">Maelezo</label>
                            <textarea class="tinymce-editor form-control" id="maelezo" name="maelezo" rows="4">{{ $nenoLaWeek->maelezo }}</textarea>
                        </div>
                        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Update</button>
                        <!-- Back button -->
                        <a href="../manage_neno" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

@endsection
