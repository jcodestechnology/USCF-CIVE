@extends('layouts.main_memberdashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Maoni</li>
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
              <h5 class="card-title">Sehemu ya Maoni binafsi kuhusu kanisa</h5>

<!-- No Labels Form -->
<form class="row g-3" action="{{ route('store.maoni') }}" method="post">

    @csrf
   

    <div class="col-md-12">
        <label for="maelezo" class="form-label">Andika maoni yako</label>
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
