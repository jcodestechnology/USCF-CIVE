@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Jaza Mapato ya Mradi</li>
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
                <h5 class="card-title">Mapato ya Mradi </h5>

                <!-- Modified Form with Required Fields -->
                <form class="row g-3" action="{{ route('store.income') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Field for Tarehe -->
                    <div class="col-md-6">
                        <label for="tarehe" class="form-label">Tarehe</label>
                        <input type="date" id="tarehe" name="tarehe" class="form-control" value="{{ date('Y-m-d') }}" readonly required>
                    </div>
                    <!-- Field for Jina la Mradi -->
                    <div class="col-md-6">
                        <label for="jina_la_mradi" class="form-label">Jina la Mradi</label>
                        <input type="text" id="jina_la_mradi" name="jina_la_mradi" class="form-control" required>
                    </div>
                    <!-- Field for Garama kwa bidhaa -->
                    <div class="col-md-6">
                        <label for="gharama_kwa_bidhaa" class="form-label">Gharama kwa Bidhaa</label>
                        <input type="number" id="gharama_kwa_bidhaa" name="gharama_kwa_bidhaa" class="form-control" required>
                    </div>
                    <!-- Field for idadi ya bidhaa -->
                    <div class="col-md-6">
                        <label for="idadi_ya_bidhaa" class="form-label">Idadi ya Bidhaa</label>
                        <input type="number" id="idadi_ya_bidhaa" name="idadi_ya_bidhaa" class="form-control" required>
                    </div>
                    <!-- Field for Kiasi (read-only, calculated using JavaScript) -->
                
                    <!-- Field for Risiti (PDF) -->
                    <div class="col-md-6">
                        <label for="risiti" class="form-label">Risiti (PDF)</label>
                        <input type="file" id="risiti" name="risiti" class="form-control-file" accept="application/pdf" required>
                    </div>

                    <!-- Additional Fields (optional) -->
                    <!-- Include additional fields as needed -->

                    <div class="text-center">
                        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
                    </div>
                </form><!-- End Modified Form -->
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection

@section('scripts')
<script>
    // Set the current date for the "Tarehe" field
    document.addEventListener("DOMContentLoaded", function() {
        var currentDate = new Date().toISOString().split('T')[0];
        document.getElementById("tarehe").value = currentDate;
    });
</script>
@endsection
