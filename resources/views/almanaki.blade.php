@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Kutuma Almanaki</li>
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
            <h5 class="card-title">Post Almanaki</h5>

            <!-- Modified Form with Tarehe and Tukio fields -->
            <form class="row g-3" action="{{ route('store.almanaki') }}" method="post">

                @csrf
                <div class="col-md-12">
                    <label for="tarehe" class="form-label">Tarehe</label>
                    <input type="date" id="tarehe" name="tarehe" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="tukio" class="form-label">Tukio</label>
                    <input type="text" id="tukio" name="tukio" class="form-control" placeholder="Tukio">
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
