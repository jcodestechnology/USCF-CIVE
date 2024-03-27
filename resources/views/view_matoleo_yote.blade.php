@extends('layouts.main_admindashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Sadaka zote</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">
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

                    <!-- Table with stripped rows -->
                    <table class="table datatable" style="table-layout: auto; width: 100%;">
                        <thead>
                            <tr>
                                <th style="white-space: nowrap;">Tarehe ya Jpili</th>
                                <th style="white-space: nowrap;">Sadaka ya Jpili</th>
                                <th style="white-space: nowrap;">Shukrani</th>
                                <th style="white-space: nowrap;">Mchungaji</th>
                                <th style="white-space: nowrap;">Mnada</th>
                                <th style="white-space: nowrap;">Changizo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sadakas as $sadaka)
                                <tr>
                                    <td>{{ $sadaka->date }}</td>
                                    <td>{{ $sadaka->sadaka_jumapili ?? '-' }}</td>
                                    <td>{{ $sadaka->shukrani_ya_pekee ?? '-' }}</td>
                                    <td>{{ $sadaka->kumtunza_mchungaji ?? '-' }}</td>
                                    <td>{{ $sadaka->mnada ?? '-' }}</td>
                                    <td>{{ $sadaka->changizo ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
