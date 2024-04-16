@extends('layouts.main_admindashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Family Number: {{ $family->id }} Details</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Started</th>
                                <th>Completed</th>
                                <th>Program</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1 @endphp
                            
                            @foreach($family->members as $member)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $member ? $member->firstname : '' }} {{ $member ? $member->middlename : '' }} {{ $member ? $member->lastname : '' }}</td>
                                <td>{{ $member ? $member->phone : '' }}</td>
                                <td>{{ $member ? $member->year_started : '' }}</td>
                                <td>{{ $member ? $member->year_completion : '' }}</td>
                                <td>{{ $member && $member->program ? $member->program->name : '' }}</td>
                                <td>
                                    @if($member && $member->id === $family->father_id)
                                        <span class="badge bg-primary">Baba</span>
                                    @elseif($member && $member->id === $family->mother_id)
                                        <span class="badge bg-danger">Mama</span>
                                    @else
                                        <span class="badge bg-success">Mtoto</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Back Button with Animation -->
                    <div class="text-end mt-3">
                        <a href="{{ route('create_family') }}" class="btn btn-back">
                            <span class="badge bg-secondary">Back to Families</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<style>
    /* Custom Button Styles */
    .btn-back {
        transition: all 0.3s ease-in-out; /* Add animation to button */
    }

    .btn-back:hover {
        transform: scale(1.2); /* Increase button size on hover */
    }
</style>

@endsection
