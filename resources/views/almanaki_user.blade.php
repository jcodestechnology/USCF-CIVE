@extends('layouts.main_memberdashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Almanaki ya Kanisa</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            @if ($almanakis->isEmpty())
                <div class="alert alert-info" role="alert">
                    No Almanaki posted yet.
                </div>
            @else
                <div class="row">
                    @foreach($almanakis as $almanaki)
                        @php
                            $eventDate = \Carbon\Carbon::parse($almanaki->tarehe);
                            $currentDate = \Carbon\Carbon::now();
                            $daysRemaining = $currentDate->diffInDays($eventDate, false);
                        @endphp
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $almanaki->tarehe }}</h5>
                                    <p class="card-text">{{ $almanaki->tukio }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            @if($daysRemaining > 0 && $daysRemaining <= 7)
                                                <span class="badge badge-pill badge-info position-absolute top-0 end-0 badge-animation">{{ $daysRemaining }} days remaining</span>
                                            @elseif($daysRemaining == 0)
                                                <span class="badge badge-pill badge-warning position-absolute top-0 end-0 badge-animation">Today</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

</main><!-- End #main -->

<style>
    /* Add your custom CSS styles for card design and animations here */
    .badge-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .badge-animation {
        animation: rotate-badge 20s infinite linear; /* Add rotation animation */
    }

    @keyframes rotate-badge {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

@endsection
