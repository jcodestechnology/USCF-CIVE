@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Neno la Wiki</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
   <div class="card">
            <div class="card-body">
              <h5 class="card-title">Neno La Wiki</h5>
              <p>Tafadhali fahamu kwamba hapa utapost maneno muhimu kuhusu neno la wiki. Tunaamini kwamba ujumbe utakaopost utasaidia kukua kiroho na kuimarisha imani ya wahumini. Bofya vitufe hapo chini kutoa mafundisho ya Biblia kupitia neno la wiki</p>

            <!-- Scrolling Modal -->
<a href="post_neno" class="btn" style="background:#086808; color:#FFFFFF">
  Post
</a>

<!-- Modal Dialog Scrollable -->
<a href="manage_neno" class="btn" style="background:#086808; color:#FFFFFF">
  Manage
</a>

             

            </div>
          </div>  

    </section>

</main><!-- End #main -->


@endsection
