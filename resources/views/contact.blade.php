@extends('layouts.main1')
@section('content')
<main id="main">
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact us</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Contact us</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->
   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Connecting with us is easy. Reach out for any inquiries.</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;"  src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3966.3567677220635!2d35.81177777365904!3d-6.216593810886248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x184dfb7d1bdf5485%3A0x49b653824a70bd16!2sCIVE%20Student%20Hostel%20block%201%2C%20Dodoma!3m2!1d-6.2158356!2d35.8135532!5e0!3m2!1sen!2stz!4v1710421234250!5m2!1sen!2stz"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Informatics, UDOM, DODOMA</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@uscfcive-udom.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+255 756 405 762</p>
              </div>

            </div>

          </div>
          @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif

          <div class="col-lg-8 mt-5 mt-lg-0">
    
          <form action="{{ route('contact.method') }}" method="post" role="form" class="php-email-form">

    @csrf
    <div class="row">
        <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
        </div>
        <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
        </div>
    </div>
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
    </div>
    <div class="form-group mt-3">
        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
    </div>
   
 
   
    <div class="text-center"><button type="submit">Send Message</button></div>
</form>

     

          </div>
   
        </div>

      </div>
    </section><!-- End Contact Section -->
</main>
@endsection