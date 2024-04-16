@extends('layouts.main_admindashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Post News</li>
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
                <h5 class="card-title">Post News</h5>

                <!-- Form for posting news -->
                <form class="row g-3" action="{{ route('post.news') }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="headline" class="form-label">Headline</label>
                        <input type="text" id="headline" name="headline" class="form-control" placeholder="Headline">
                    </div>

                    <div class="col-md-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea id="content" name="content" class="tinymce-editor form-control" rows="3" placeholder="Content"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn" style="background:#086808; color:#FFFFFF">Submit</button>
                    </div>
                </form><!-- End Form for posting news -->

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
