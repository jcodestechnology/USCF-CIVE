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
                <form class="row g-3" action="{{ route('store.ahadiKapu') }}" method="post">
                    @csrf
                    <!-- Field for Tarehe -->
                    <div class="col-md-6">
                        <label for="tarehe" class="form-label">Tarehe</label>
                        <input type="date" id="tarehe" name="tarehe" class="form-control" required>
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
                    <div class="col-md-12">
                        <label for="kiasi" class="form-label">Kiasi</label>
                        <input type="text" id="kiasi" name="kiasi" class="form-control" readonly>
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
    // JavaScript to calculate the value for the "Kiasi" field
    document.addEventListener("DOMContentLoaded", function() {
        // Get input elements
        var gharamaInput = document.getElementById('gharama_kwa_bidhaa');
        var idadiInput = document.getElementById('idadi_ya_bidhaa');
        var kiasiInput = document.getElementById('kiasi');

        // Function to calculate kiasi
        function calculateKiasi() {
            var gharama = parseFloat(gharamaInput.value);
            var idadi = parseFloat(idadiInput.value);
            var kiasi = gharama * idadi;
            kiasiInput.value = kiasi.toFixed(2);
        }

        // Event listeners to trigger calculateKiasi function when inputs change
        gharamaInput.addEventListener('input', calculateKiasi);
        idadiInput.addEventListener('input', calculateKiasi);
    });
</script>
@endsection
