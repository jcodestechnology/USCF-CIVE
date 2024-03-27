@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Sadaka ya Ahadi</li>
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
                <h5 class="card-title">Sadaka ya Ahadi za kwenye Kapu</h5>

                <!-- Modified Form with Single Field -->
                <form class="row g-3" action="{{ route('store.ahadiKapu') }}" method="post">
                    @csrf

                    <!-- Field for kiasi alichotoa (amount donated) -->
                    <div class="col-md-12">
                        <label for="kiasi_alichotoa" class="form-label">Kiasi kilichotolewa</label>
                        <input type="text" id="kiasi_alichotoa" name="kiasi_alichotoa" class="form-control" required>
                    </div>

                    <!-- Additional Fields (optional) -->
                    <!-- Include additional fields as needed -->

                    <div class="text-center">
                        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
                    </div>
                </form><!-- End Modified Form -->
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
