@extends('layouts.main_memberdashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Matangazo ya Kanisa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body pb-0">
                <h5 class="card-title">News &amp; Updates <span>| This Week</span></h5>

                <div class="news">
                    @if($news->isEmpty())
                    <div class="alert alert-info" role="alert">
                       Samahani, Hakuna Matangazo yoyote yaliyo tumwa wiki hii!.
                    </div>
                    @else
                    @foreach($news as $index => $article)
                    <div class="post-item clearfix">
                        <h4>
                            <a href="">{{ $article->headline }}</a>
                            @if(!$article->isReadByUser())
                            <span class="badge badge-primary">New</span>
                            @endif
                        </h4>
                        <p>{{ $article->content }}</p>
                        <p>Date Posted: {{ $article->created_at->format('l, F j, Y') }}</p> <!-- Display date posted -->
                    </div>
                    <!-- Add a horizontal line between each post except the last one -->
                    @if (!$loop->last)
                    <hr>
                    @endif
                    @endforeach
                    @endif
                </div><!-- End sidebar recent posts-->
            </div>
        </div><!-- End News & Updates -->
    </section>

</main><!-- End #main -->
<style>
    /* Add your custom CSS styles for hover effect here */
.post-item:hover {
    background-color: #f5f5f5;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
</style>
@endsection
