@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item active">Register Program</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <h5 class="card-title">Register Program</h5>

                        <!-- General Form Elements -->
                        <form id="registerProgramForm" method="POST" action="{{ route('store-program-name') }}">
    @csrf
    <div class="form-group">
        <label for="inputText" class="col-sm-2 col-form-label">Program</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" placeholder="Enter the program name here">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-10">
            <button type="submit" id="submitBtn" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
        </div>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
