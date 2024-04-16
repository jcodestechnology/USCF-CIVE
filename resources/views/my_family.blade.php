@extends('layouts.main_memberdashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">View My Family</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h2><span class="animated-text">Family No:</span> {{ $family->id }}</h2>
                @if ($hasFamily)
                    @if ($family)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Names</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $family->father->firstname }} {{ $family->father->lastname }}</td>
                                    <td>{{ $family->father->phone }}</td>
                                    <td>{{ $family->father->gender }}</td>
                                    <td><span class="badge bg-primary">Baba</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{ $family->mother->firstname }} {{ $family->mother->lastname }}</td>
                                    <td>{{ $family->mother->phone }}</td>
                                    <td>{{ $family->mother->gender }}</td>
                                    <td><span class="badge bg-info">Mama</span></td>
                                </tr>
                                @php $counter = 3; @endphp
                                @foreach ($family->members as $member)
                                    @if ($member->id !== $family->father_id && $member->id !== $family->mother_id)
                                        <tr>
                                            <td>{{ $counter }}</td>
                                            <td>{{ $member->firstname }} {{ $member->lastname }}</td>
                                            <td>{{ $member->phone }}</td>
                                            <td>{{ $member->gender }}</td>
                                            <td><span class="badge bg-success">Mtoto</span></td>
                                        </tr>
                                        @php $counter++; @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-info" role="alert">Sorry! No family information found .</p>
                    @endif
                @else
                    <p class="alert alert-info" role="alert">You do not have a family yet. Please consult a leader (Social-Matters Leader) to generate a family for you!.</p>
                @endif
            </div>
        </div>
    </section>

</main><!-- End #main -->
<style>
    .card {
        border: none;
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
        border-radius: 0.375rem;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    /* Animation for Family No */
    .animated-text {
        animation: sway 2s infinite alternate ease-in-out;
    }

    @keyframes sway {
        from {
            transform: rotate(-2deg);
        }
        to {
            transform: rotate(2deg);
        }
    }
</style>
@endsection
