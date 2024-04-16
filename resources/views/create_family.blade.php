@extends('layouts.main_admindashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Generate Families</li>
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

                    <!-- Download PDF Button -->
                    <form action="{{ route('download.families.pdf') }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary float-right mb-3">Download Families PDF</button>
                    </form>
                    
                    <!-- Generate Families Form -->
                    <form action="{{ route('generate.families') }}" method="GET">
                        @csrf
                        <!-- Add Generate Button -->
                        <div class="text-left mb-3">
                            <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Generate</button>
                        </div>
                    </form><!-- End Generate Families Form -->
                    <form action="{{ route('add.member') }}" method="GET">
    @csrf
    <!-- Add Member Button -->
    <div class="text-left mb-3">
        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Add Member</button>
    </div>
</form>

                    <!-- Table with stripped rows -->
                    <table class="table datatable" style="table-layout: auto; width: 100%;">
                        <thead>
                            <tr>
                                <th style="white-space: nowrap;">Family NO</th>
                                <th style="white-space: nowrap;">Father Name</th>
                                <th style="white-space: nowrap;">Father Phone</th>
                                <th style="white-space: nowrap;">Mother Name</th>
                                <th style="white-space: nowrap;">Mother Phone</th>
                                <th style="white-space: nowrap;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($families as $family)
                            <tr>
                                <td>{{ $family->id }}</td>
                                <td>{{ optional($family->father)->firstname }} {{ optional($family->father)->middlename }} {{ optional($family->father)->lastname }}</td>
                                <td>{{ optional($family->father)->phone }}</td>
                                <td>{{ optional($family->mother)->firstname }} {{ optional($family->mother)->middlename }} {{ optional($family->mother)->lastname }}</td>
                                <td>{{ optional($family->mother)->phone }}</td>
                                <td>
                                    <a href="{{ route('view_family', $family->id) }}" class="badge bg-success">View Family</a>
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

@endsection
