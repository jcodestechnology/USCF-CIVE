@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"></a>
              
            </div>

            <div class="card-body">
              <h5 class="card-title">Washarika</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>145</h6>
          

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"></a>
             
            </div>

            <div class="card-body">
              <h5 class="card-title">Viongozi</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-award"></i>
                </div>
                <div class="ps-3">
                  <h6>$3,264</h6>
                 
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"></a>
             
            </div>

            <div class="card-body">
              <h5 class="card-title">Familia </h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>$3,264</h6>
              
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"></a>
             
            </div>

            <div class="card-body">
              <h5 class="card-title">Vikundi vya uimbaji </h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-music-note"></i>
                </div>
                <div class="ps-3">
                  <h6>$3,264</h6>
              
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->
      </div>
    </div><!-- End Left side columns -->


</section>

</main><!-- End #main -->


@endsection