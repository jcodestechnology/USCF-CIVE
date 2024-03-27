@extends('layouts.main_admindashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Sadaka za Ahadi</li>
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
                                <th style="white-space: nowrap;">Jina </th>
                                <th style="white-space: nowrap;">Kiasi alichoahidi</th>
                                <th style="white-space: nowrap;">Kiasi alichotoa</th>
                                <th style="white-space: nowrap;">Baki</th>
                                <th style="white-space: nowrap;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->ahadi_yangu }}</td>
                                    <td>{{ $user->kiasi_alichotoa }}</td>
                                    <td>{{ $user->ahadi_yangu - $user->kiasi_alichotoa }}</td>
                                    <td>
                                        @if($user->ahadi_yangu - $user->kiasi_alichotoa <= 0)
                                            <span class="badge badge-success" style="margin-right: 5px;">Complete</span>
                                        @else
                                            <span class="badge badge-danger" style="margin-right: 5px;">Not Completed</span>
                                        @endif
                                    </td>
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
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection
