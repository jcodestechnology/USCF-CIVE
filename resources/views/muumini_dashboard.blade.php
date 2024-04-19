@extends('layouts.main_memberdashboard')
@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard!</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="muumini_dashboard">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card animated">
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
        <div class="card animated fadeInUp">
          <div class="card-header">
            <h2 class="animated fadeInDown">Welcome Message</h2>
          </div>
          <div class="card-body">
            <p class="animated fadeInLeft">Welcome to your dashboard! Here you will receive important notifications and stay in touch with the latest updates from USCF management.</p>
            <p class="animated fadeInRight">Feel free to explore the various features and functionalities available to you.</p>
          </div>
        </div><!-- End Card -->
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection

@section('additional_styles')
<style>
.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.card.animated:hover .card-body .fadeInUp {
    animation-name: fadeInUp;
}
</style>
@endsection

@section('additional_scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.querySelectorAll
    ('.animated');
    for (var i = 0; i < elements.length; i++) {
        var el = elements[i];
        el.classList.add('fadeInUp'); // Change this to the desired animation class
    }
});
</script>
@endsection
