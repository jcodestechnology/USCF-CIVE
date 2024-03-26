@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Kutuma Neno la Wiki</li>
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
              <h5 class="card-title">Post Neno la week</h5>

<!-- No Labels Form -->
<form class="row g-3" action="{{ route('store.neno_la_week') }}" method="post">
    @csrf
    <div class="col-md-12">
        <label for="kichwa" class="form-label">Kichwa cha Neno</label>
        <input type="text" id="kichwa" name="kichwa" class="form-control" placeholder="Kichwa cha Neno">
    </div>
    <div class="col-md-12">
        <label for="kifungu" class="form-label">Kifungu cha Biblia</label>
        <input type="text" id="kifungu" name="kifungu" class="form-control" placeholder="Kifungu cha Biblia">
    </div>

    <div class="col-md-12">
        <label for="maelezo" class="form-label">Neno na Maelezo</label>
        <textarea id="maelezo" name="maelezo" class="tinymce-editor form-control" rows="3" placeholder="Maelezo"></textarea>
    </div>
  
    <div class="text-center">
        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
    </div>
</form><!-- End No Labels Form -->


            </div>
          </div>
    </section>

</main><!-- End #main -->


@endsection
