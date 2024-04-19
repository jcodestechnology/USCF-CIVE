@extends('layouts.authent')
@section('content')
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="/" class="logo d-flex align-items-center w-auto">
                                        <img src="{{URL:: asset('imports_dashboard/assets/img/lg.png')}}" alt="">
                                        <span class="d-none d-lg-block">USCF CIVE</span>
                                    </a>
                                </div><!-- End Logo -->
                                @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@elseif ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                </div>
                                <form id="registration-form" class="row g-3" method="POST" action="{{ route('register') }}">
    @csrf
    <input type="hidden" name="user_role" value="Member">

    <div class="col-md-4">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" name="firstname" class="form-control" id="firstName" required>
        <div class="invalid-feedback">Please enter your first name!</div>
    </div>
    <div class="col-md-4">
        <label for="middleName" class="form-label">Middle Name</label>
        <input type="text" name="middlename" class="form-control" id="middleName">
    </div>
    <div class="col-md-4">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lastName" required>
        <div class="invalid-feedback">Please enter your last name!</div>
    </div>
    <div class="col-md-6">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" class="form-select" id="gender" required>
            <option value="">Choose...</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <div class="invalid-feedback">Please select your gender!</div>
    </div>
    <div class="col-md-6">
        <label for="program" class="form-label">Program</label>
        <select name="program_id" class="form-select" id="program" required>
            <option value="">Choose...</option>
            @foreach ($programs as $program)
            <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">Please select your program!</div>
    </div>
    <div class="col-md-6">
        <label for="yearStarted" class="form-label">Year Started</label>
        <input type="number" name="year_started" class="form-control year-picker" id="yearStarted" placeholder="First year" min="1900" max="2099" step="1" required>
        <div class="invalid-feedback">Please enter the year you started!</div>
    </div>
    <div class="col-md-6">
        <label for="yearCompletion" class="form-label">Year of Completion</label>
        <input type="number" name="year_completion" class="form-control year-picker" id="yearCompletion" placeholder="Last year" min="1900" max="2099" step="1" required>
        <div class="invalid-feedback">Please enter the year of completion!</div>
    </div>
    <div class="col-md-6">
        <label for="blockNumber" class="form-label">Block Number</label>
        <select name="block" class="form-select" id="blockNumber" required>
            <option value="">Choose...</option>
            @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <div class="invalid-feedback">Please select your block number!</div>
    </div>
    <div class="col-md-6">
        <label for="phoneNumber" class="form-label">Phone Number</label>
        <input type="tel" name="phone" class="form-control" id="phoneNumber" placeholder="Start with 2557 or 2556, 12 digits" required>
        <div class="invalid-feedback">Please enter a valid phone number starting with 2557 or 2556 and having 12 digits!</div>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" name="email" class="form-control" id="email" required>
        <div class="invalid-feedback">Please enter a valid email address!</div>
    </div>

    <!-- Form inputs -->
    <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        <div class="invalid-feedback">Please enter your password!</div>
    </div>
    <div class="col-md-6">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" required>
        <div class="invalid-feedback">Please confirm your password!</div>
    </div>

    <div class="col-12">
        <button class="btn w-100" style="background:#086808; color:#FFFFFF" type="submit">Create Account</button>
    </div>

    <div class="col-12">
        <p class="small mb-0">Already have an account? <a href="login">Log in</a></p>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>




  @endsection


