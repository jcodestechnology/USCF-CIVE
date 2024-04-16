@extends('layouts.main_admindashboard')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage Matangazo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Matangazo</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <!-- First Card: Post Matangazo -->
            <div class="col-md-6">
                <a href="post_matangazo" class="card post-matangazo">
                    <div class="card-body">
                        <h5 class="card-title">Post Matangazo</h5>
                        <p class="card-text">Click here to post new Matangazo</p>
                    </div>
                </a>
            </div>

            <!-- Second Card: Manage Matangazo -->
            <div class="col-md-6">
                <a href="manage_matangazo" class="card manage-matangazo">
                    <div class="card-body">
                        <h5 class="card-title">Manage Matangazo</h5>
                        <p class="card-text">Click here to manage existing Matangazo</p>
                    </div>
                </a>
            </div>

        </div><!-- End row -->
    </section>

</main><!-- End #main -->

@endsection

@section('styles')
<style>
    /* Custom CSS for hover effect */
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    /* Custom CSS for card styles */
    .post-matangazo, .manage-matangazo {
        background-color: #f5f5f5;
        border-radius: 10px;
        display: block; /* Ensure the entire card is clickable */
        text-decoration: none; /* Remove default link underline */
    }

    /* Custom CSS for card text */
    .card-title {
        color: #333;
    }

    .card-text {
        color: #666;
    }
</style>
@endsection
