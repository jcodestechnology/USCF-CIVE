@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Jaza Mapato ya Kamati mbali mbali</li>
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
                <h5 class="card-title">Mapato ya Kamati </h5>

                <!-- Modified Form with Required Fields -->
                <form class="row g-3" action="{{ route('store.kamati-mapato') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Field for Tarehe -->
                    <div class="col-md-6">
                        <label for="tarehe" class="form-label">Tarehe</label>
                        <input type="date" id="tarehe" name="tarehe" class="form-control" value="{{ date('Y-m-d') }}" readonly required>
                    </div>
                    <!-- Field for Aina ya Mapato -->
                    <div class="col-md-6">
                        <label for="aina_ya_mapato" class="form-label">Aina ya Mapato</label>
                        <select id="aina_ya_mapato" name="aina_ya_mapato" class="form-control" required>
                            <option value="Team Jesus">Team Jesus</option>
                            <option value="Celestials">Celestials</option>
                            <option value="Praise Team">Praise Team</option>
                            <option value="Kamati ya wadada">Kamati ya wadada</option>
                            <option value="Kamati ya Wanaume">Kamati ya Wanaume</option>
                            <option value="Alama ya First Year">Alama ya First Year</option>
                            <option value="Kwaya Kuu">Kwaya Kuu</option>
                            <option value="Outreach">Outreach</option>
                        </select>
                    </div>
                    <!-- Field for Kiasi cha Mapato -->
                    <div class="col-md-6">
                        <label for="kiasi_cha_mapato" class="form-label">Kiasi cha Mapato</label>
                        <input type="number" id="kiasi_cha_mapato" name="kiasi_cha_mapato" class="form-control" required>
                    </div>
                    <!-- Field for Risiti -->
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
