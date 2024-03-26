@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Wahumini</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            
              <!-- Table with stripped rows -->
              <table class="table datatable" style="table-layout: auto; width: 100%;">
                <thead>
                  <tr>
                    <th style="white-space: nowrap;">
                      <b>N</b>ame
                    </th>
                    <th style="white-space: nowrap;">Phone</th>
                    <th style="white-space: nowrap;">First Year</th>
                    <th style="white-space: nowrap;">Final Year</th>
                    <th style="white-space: nowrap;">Academic Year</th>
                    <th style="white-space: nowrap;">Block</th>
                    <th style="white-space: nowrap;">Program</th>
                    <!-- <th style="white-space: nowrap;">Gender</th> -->
                    <!-- <th style="white-space: nowrap;">Picture</th> -->
                  
                    <th style="white-space: nowrap;">Action</th>
                  </tr>
                </thead>
                <tbody>
       <!-- Your existing HTML content -->
       @foreach($users as $user)
       <tr>
        <!-- Display user details -->
        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->year_started }}</td>
        <td>{{ $user->year_completion }}</td>
        <td>{{ $user->academic_year }}</td>
        <td>{{ $user->block }}</td>
        <td>{{ $user->program->name }}</td>
        <!-- <td>{{ $user->gender }}</td> -->
        <td>
            <!-- Design the profile picture in a circular shape -->
            <!-- <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                <img src="{{ $user->profile_picture }}" alt="Profile Picture" style="width: 100%; height: auto;">
            </div> -->
        </td>
        <td>
            <!-- Action buttons -->
             <!-- Action buttons -->
             <div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary mr-7">Assign</button>
    <button type="button" class="btn btn-success">View</button>
</div>

        </td>
    </tr>
@endforeach
</tbody>
<!-- Your existing HTML content continues -->


            
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->


@endsection
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
