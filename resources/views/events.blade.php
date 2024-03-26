@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Kupost Events</li>
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
                <h5 class="card-title">Post Event</h5>

                <!-- No Labels Form -->
                <form class="row g-3" action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12">
                        <label for="event_name" class="form-label">Name of the Event</label>
                        <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Name of the Event">
                    </div>

                    <div class="col-md-12">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" accept="image/*">
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Description of Event</label>
                        <textarea class="tinymce-editor form-control" id="description" name="description" rows="3" placeholder="Description of Event"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
                    </div>
                </form><!-- End No Labels Form -->

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
