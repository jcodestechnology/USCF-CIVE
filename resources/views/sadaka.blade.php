@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Sadaka</li>
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
              <h5 class="card-title">Sadaka za Jumla</h5>

<!-- Modified Form with Additional Fields -->
<form class="row g-3" action="{{ route('sadaka.store') }}" method="post">


    @csrf

    <!-- Non-editable field for the date of ijumapili ya current week -->
    <div class="col-md-12">
    <label class="form-label">Tarehe ya Jumapili husika</label>
    <input type="text" class="form-control" value="{{ \Carbon\Carbon::now()->startOfWeek()->subDays(1)->format('Y-m-d') }}" name="date" readonly>
</div>

    <!-- Field for Sadaka ya Jumapili (required) -->
    <div class="col-md-12">
        <label for="sadaka_jumapili" class="form-label">Sadaka ya Jumapili</label>
        <input type="text" id="sadaka_jumapili" name="sadaka_jumapili" class="form-control" required>
    </div>

    <!-- Additional Fields (optional) -->
    <div class="col-md-12">
        <label for="kumtunza_mchungaji" class="form-label">Kumtunza Mchungaji</label>
        <input type="text" id="kumtunza_mchungaji" name="kumtunza_mchungaji" class="form-control">
    </div>

    <div class="col-md-12">
        <label for="mnada" class="form-label">Mnada</label>
        <input type="text" id="mnada" name="mnada" class="form-control">
    </div>

    <div class="col-md-12">
        <label for="shukrani_ya_pekee" class="form-label">Shukrani ya Pekee</label>
        <input type="text" id="shukrani_ya_pekee" name="shukrani_ya_pekee" class="form-control">
    </div>

    <div class="col-md-12">
        <label for="changizo" class="form-label">Changizo</label>
        <input type="text" id="changizo" name="changizo" class="form-control">
    </div>
  
    <div class="text-center">
        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
    </div>
</form><!-- End Modified Form -->


            </div>
          </div>
    </section>

</main><!-- End #main -->


@endsection
