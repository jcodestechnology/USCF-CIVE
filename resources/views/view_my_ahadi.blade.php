@extends('layouts.main_memberdashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">View Ahadi yangu</li>
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
                <h5 class="card-title">Sadaka ya Ahadi yangu ya Mwaka</h5>

                <!-- Button trigger modal -->
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" style="background:#086808; color:#FFFFFF">
                    Bofya kutazama matoleo ya Ahadi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ahadi yangu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            @if(isset($message))
    <div class="alert alert-info" role="alert">
        {{ $message }}
    </div>
@else
                                <!-- Ahadi details -->
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Jina Kamili:</label>
                                    <input type="text" class="form-control" id="full_name" value="{{ $user['firstname'] }} {{ $user['middlename'] }} {{ $user['lastname'] }}" readonly>
                                </div>
                                @foreach($ahadis as $ahadi)
                                <div class="mb-3">
                                    <label for="ahadi_yangu" class="form-label">Kiasi Nilicho Ahidi:</label>
                                    <input type="text" class="form-control" id="ahadi_yangu" value="{{ $ahadi->ahadi_yangu }} TZS" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="kiasi_alichotoa" class="form-label">Kiasi Nilichotoa:</label>
                                    <input type="text" class="form-control" id="kiasi_alichotoa" value="{{ $ahadi->kiasi_alichotoa }} TZS" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="baki" class="form-label">Baki:</label>
                                    <input type="text" class="form-control" id="baki" value="{{ $ahadi->ahadi_yangu - $ahadi->kiasi_alichotoa }} TZS" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    @php
                                        $status = $ahadi->ahadi_yangu - $ahadi->kiasi_alichotoa <= 0 ? 'Complete' : 'Not Completed';
                                        $badgeColor = $status === 'Complete' ? 'success' : 'danger';
                                    @endphp
                                    
                                    <span class="badge bg-{{ $badgeColor }}">{{ $status }}</span>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="modal-footer">
                                <button href="view_my_ahadi" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
