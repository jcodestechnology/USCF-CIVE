@extends('layouts.main1')
@section('content')
<main id="main">
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Ibada ya Jumapili Hii</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Ibada</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->
<section id="gallery" class="gallery">
    <div class="container">

        <div class="section-title">
            <h2>Church Services Images</h2>
            <p>Capturing the essence of our church services through captivating imagery.</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row g-0">
            @if($pictures->count() > 0)
                @foreach($pictures as $picture)
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset($picture->picture) }}" class="galelry-lightbox">
                                <img src="{{ asset($picture->picture) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col">
                    <p class="alert alert-info" role="alert">Sorry!, No Sunday images posted yet.</p>
                </div>
            @endif
        </div>
    </div>
</section>
</main>
@endsection