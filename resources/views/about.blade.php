@extends('layouts.main1')
@section('content')
<main id="main">
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About us</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>About us</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->
<!-- ======= About Section ======= -->
<section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Welcome to USCF CIVE</h3>
            <p>USCF CIVE, established in 2008 under the CCT USCF UDOM Chaplaincy, is a vibrant community within the five faculties at UDOM. Our mission is to provide a nurturing environment for spiritual growth and community engagement.</p>
          
            <div class="icon-box">
              <div class="icon"><i class="bx bx-id-card"></i></div>
              <h4 class="title"><a href="">Our Identity</a></h4>
              <p class="description">Discover our unique identity and the values that guide us. We are committed to fostering a sense of belonging and purpose.</p>
            </div>
          
            <div class="icon-box">
              <div class="icon"><i class="bx bx-group"></i></div>
              <h4 class="title"><a href="">Community Outreach</a></h4>
              <p class="description">Engage with us in various community outreach programs. Join hands with our members to make a positive impact and spread love.</p>
            </div>
          
            <div class="icon-box">
              <div class="icon"><i class="bx bx-line-chart"></i></div>
              <h4 class="title"><a href="">Spiritual Growth</a></h4>
              <p class="description">Embark on a journey of spiritual growth and enlightenment. Explore opportunities for personal and collective growth within our community.</p>
            </div>
          
          </div>
          
        </div>

      </div>
    </section><!-- End About Section -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-users"></i>
              <span data-purecounter-start="0" data-purecounter-end="324" data-purecounter-duration="1" class="purecounter"></span>
              <p>Ours Members</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fas fa-microphone"></i>

              <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1" class="purecounter"></span>
              <p>Choirs & Team singers</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-chess-king"></i>

              <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter"></span>
              <p>Leaders</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-building"></i>

              <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
              <p>Departments</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
</main>
@endsection
  
  
