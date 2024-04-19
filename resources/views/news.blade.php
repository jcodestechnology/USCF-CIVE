@extends('layouts.main_memberdashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="muumini_dashboard">Home</a></li>
                <li class="breadcrumb-item active">Matangazo ya Kanisa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body pb-0">
                <h5 class="card-title">News &amp; Updates <span>| This Week</span></h5>

                <div class="row">
                    @if($news->isEmpty())
                    <div class="alert alert-info" role="alert">
                       {{ __('Samahani, Hakuna Matangazo yoyote yaliyo tumwa wiki hii!.') }}
                    </div>
                    @else
                    @foreach($news as $index => $article)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->headline }}</h5>
                                <p class="card-text">@php echo htmlspecialchars_decode($article->content); @endphp</p>
                                <p class="card-text">{{ __('Date Posted:') }} {{ $article->created_at->format('l, F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div><!-- End row -->
            </div>
        </div><!-- End News & Updates -->
    </section>

</main><!-- End #main -->

<style>
    /* Add your custom CSS styles for hover effect here */
.card:hover {
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
    cursor: pointer;
}
</style>

@endsection
