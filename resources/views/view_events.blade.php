@extends('layouts.main1')
@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Upcoming Events</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Events</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->
    <section id="gallery" class="gallery">
        <div class="container">

            <div class="section-title">
                <h2>Church Events</h2>
                <p>Events prepared by different departments in the church.</p>
            </div>

            <div class="row">
                @foreach($events as $event)
                <div class="col-lg-4">
                    <div class="card">
                        <img src="{{ asset($event->picture) }}" class="card-img-top" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->event_name }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $event->created_at->format('F d, Y') }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
</main>
@endsection
