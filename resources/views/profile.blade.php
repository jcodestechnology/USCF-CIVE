@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">My profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
      <div class="row">
      @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ Auth::user()->profile}}" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</h2>
              <h3>{{ Auth::user()->user_role }}</h3>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
    <div class="col-lg-3 col-md-4 label">Names</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Designation</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->user_role }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Block</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->block }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Gender</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->gender }}</div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-4 label">Program</div>
    <div class="col-lg-9 col-md-8">
        @php
            $programName = Auth::user()->program->name;
        @endphp
        {{ $programName }}
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-4 label">Year Started</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->year_started }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Year Completion</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->year_completion }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Phone</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Email</div>
    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
</div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{ Auth::user()->profile}}" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="f" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                      <input name="f" type="hidden" class="form-control" id="f" value="">

                      </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="firstname" value=" {{ Auth::user()->firstname }} ">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" type="text" class="form-control" id="middlename" value=" {{ Auth::user()->middlename }} ">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname" value="{{ Auth::user()->lastname }}">
                      </div>
                    </div>
                  

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="{{ Auth::user()->email }}">
                      </div>
                    </div>

                    

                   

                    <div class="text-center">
                      <button type="submit" class="btn "  style="background:#086808; color:#FFFFFF">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    
                    <div class="text-center">
                      <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
  
                  <form action="{{ route('change.password') }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="row mb-3">
        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="password" type="password" class="form-control" id="newPassword">
        </div>
    </div>

    <div class="row mb-3">
        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="renewPassword" type="password" class="form-control" id="renewPassword">
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn " style="background:#086808; color:#FFFFFF">Change Password</button>
    </div>    
</form><!-- End Change Password Form -->


                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->


@endsection
