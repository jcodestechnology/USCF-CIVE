@extends('layouts.main1')
@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Our Leaders</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Leaders</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Viongozi Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Our Leaders</h2>
                <p>Our church leaders guide us with wisdom and devotion, fulfilling our spiritual needs. They inspire us to walk the path of faith with compassion and dedication, fostering unity and growth within our community.</p>
            </div>

            <div class="row">
                @if($members->isEmpty())
                <div class="col">
                    <p class="alert alert-info" role="alert">No leaders posted yet.</p>
                </div>
                @else
                @foreach($members as $member)
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset($member->picture) }}" class="img-fluid" alt="{{ $member->full_name }}"></div>
                        <div class="member-info">
                            <h4>{{ $member->full_name }}</h4>
                            <span>{{ $member->position }}</span>
                            <!-- <p>{{ $member->description }}</p> -->
                            <div class="social">
                                @if($member->facebook)
                                <a href="{{ $member->facebook }}"><i class="ri-facebook-fill"></i></a>
                                @endif
                                @if($member->instagram)
                                <a href="{{ $member->instagram }}"><i class="ri-instagram-fill"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Doctors Section -->
</main>
@endsection
