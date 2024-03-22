@extends('layouts.authent')
@section('content')
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <div class="d-flex justify-content-center py-4">
                                        <a href="/" class="logo d-flex align-items-center w-auto">
                                            <img src="{{ URL::asset('imports_dashboard/assets/img/lg.png')}}" alt="">
                                            <span class="d-none d-lg-block">USCF CIVE</span>
                                        </a>
                                    </div><!-- End Logo -->
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>

                                    <!-- Div for success or error message -->
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @elseif(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <!-- End div for success or error message -->

                                </div>

                                <form class="row g-3 needs-validation" action="{{ route('login') }}" method="POST" novalidate>
                                    @csrf

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Phone/Email</label>
                                        <div class="input-group has-validation">
                                            <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                            <input type="text" name="username" class="form-control" id="yourUsername" placeholder="start with 255 eg.(255717000000)" required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>


                                    <div class="col-12">
                                        <button class="btn  w-100" style="background:#086808; color:#FFFFFF" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="signup">Create an account</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

@endsection
