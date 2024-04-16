@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Home</a></li>
      <li class="breadcrumb-item active">Sadaka ya Ahadi</li>
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
              <h5 class="card-title">Sadaka ya Ahadi kwa Mhumini</h5>

<!-- Modified Form with Additional Fields -->
<form class="row g-3" action="{{ route('update.ahadi') }}" method="post">


    @csrf

    <!-- Field for Chagua jina la mhumini (select the name of the believer) -->
    <div class="col-md-12">
        <label for="mhumini" class="form-label">Chagua jina la mhumini</label>
        <select id="mhumini" name="mhumini" class="form-select" required>
            <option value="">Chagua jina la mhumini</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" data-ahadi="{{ $user->ahadi_yangu }}">{{ $user->full_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Field for Ahadi ya mhumini (display the Ahadi amount of the selected user) -->
    <div class="col-md-12">
        <label for="ahadi_ya_mhumini" class="form-label">Ahadi ya Mhumini</label>
        <input type="text" id="ahadi_ya_mhumini" name="ahadi_ya_mhumini" class="form-control" readonly>
    </div>

    <!-- Field for kiasi alichotoa (amount donated) -->
    <div class="col-md-12">
        <label for="kiasi_alichotoa" class="form-label">Kiasi Alichotoa</label>
        <input type="text" id="kiasi_alichotoa" name="kiasi_alichotoa" class="form-control" required>
    </div>
    <div class="col-md-12">
        <label for="tarehe_ya_jumapili" class="form-label">Tarehe ya Jumapili</label>
        <input type="text" id="tarehe_ya_jumapili"  class="form-control" name="tarehe_ya_jumapili" value="{{ \Carbon\Carbon::now()->startOfWeek()->subDays(1)->format('Y-m-d') }}"  readonly>
    </div>

    <!-- Additional Fields (optional) -->
    <!-- Include additional fields as needed -->

    <div class="text-center">
        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
    </div>
</form><!-- End Modified Form -->

<script>
    // Function to update the Ahadi amount field when a user is selected
    document.getElementById('mhumini').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var ahadiYangu = selectedOption.getAttribute('data-ahadi');
        document.getElementById('ahadi_ya_mhumini').value = ahadiYangu;
    });
</script>

            </div>
          </div>
    </section>

</main><!-- End #main -->


@endsection
