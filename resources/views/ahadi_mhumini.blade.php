@extends('layouts.main_memberdashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="muumini_dashboard">Home</a></li>
      <li class="breadcrumb-item active">Kutoa Ahadi</li>
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
              <h5 class="card-title">Sehemu Kutoa Ahadi</h5>

<!-- Modified Form with Additional Fields -->
<form class="row g-3" action="{{ route('ahadi.store') }}" method="post">

    @csrf

    <!-- Field for Aina ya Sadaka -->
    <div class="col-md-12">
        <label for="aina_ya_sadaka" class="form-label">Aina ya Sadaka</label>
        <select id="aina_ya_sadaka" name="aina_ya_sadaka" class="form-select" required>
            <option value="Ujenzi">Ujenzi</option>
            <option value="Gari">Gari</option>
        </select>
    </div>

    <!-- Field for Ahadi yangu ya Mwaka -->
 <!-- Field for Ahadi yangu ya Mwaka -->
<!-- Field for Ahadi yangu ya Mwaka -->
<div class="col-md-12">
    <label for="ahadi_yangu" class="form-label">Ahadi yangu ya Mwaka (Starts from laki moja, will be divided twice per semester (50,000/=))</label>
    <input type="number" id="ahadi_yangu" name="ahadi_yangu" class="form-control"  min="100000" required>
    @error('ahadi_yangu')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
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
