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
                @if($events->isEmpty())
                    <div class="col-lg-12">
                        <div class="alert alert-info" role="alert">
                            There are no events currently available.
                        </div>
                    </div>
                @else
                    @foreach($events as $event)
                    <div class="col-lg-4">
                        <div class="card custom-card" data-toggle="modal" data-target="#eventModal{{ $event->id }}">
                            <img src="{{ asset($event->picture) }}" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ htmlspecialchars($event->event_name) }}</h5>
                                <!-- Removed card text to focus on event name -->
                            </div>
                            <div class="card-footer text-muted">
                                Posted on {{ $event->created_at->format('F d, Y') }}
                            </div>
                        </div>
                    </div>
                    <!-- Event Modal -->
                    <div class="modal fade" id="eventModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eventModalLabel{{ $event->id }}">{{ htmlspecialchars($event->event_name) }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ htmlspecialchars($event->description) }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</main>

<!-- Custom CSS -->
<style>
    /* Add shadow to the card */
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    /* Add hover effect to the card */
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        cursor: pointer; /* Change cursor to pointer on hover */
    }

    /* Limit the size of the card */
    .card {
        height: 100%; /* Ensure all cards have the same height */
    }

    /* Limit the size of the card body */
    .card-body {
        max-height: 200px; /* Adjust as needed */
        overflow: hidden;
    }

    /* Button styling */
    .btn-read-more {
        margin-top: 10px;
    }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        // Event modal trigger on hover
        $('.card.custom-card').mouseenter(function() {
            var eventId = $(this).find('.event-modal-trigger').data('event-id');
            $('#eventModal' + eventId).modal('show');
        });
    });
</script>
@endsection
