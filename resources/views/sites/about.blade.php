@extends('layouts.site')

@section('content')

<!-- Intro Section -->
    <section id="intro" class="intro-section-detail">
        
    </section>
    
<!-- Promo Section -->
    <section id="promo" class="promo-section">
        <div class="container">
            <div class="row">
              <div class="col-md-8">
                    

                    {!! $about->description !!}
                    
                    <div class="margin-bottom50"></div>

                    <a class="btn btn-default" href="">Hubungi Kami Sekarang</a>

                    <div class="margin-bottom50"></div>

              </div>
              <div class="col-md-4">
                  <div class="thumbnail">
                  <img src="{{ asset('upload/img/'.$about->image) }}" alt="..." class="">
                  <!-- <div class="caption">
                    <h3>Kami Siap Melayani Anda.</h3>
                    <p>
                        Sebagai prusahaan yang baik kami akan melakukan service sesuai standar yang duharapkan. kepedulian kami terhadap client kami sangat besar demi menjaga nama baik prusahaan kami.    
                    </p>
                    
                  </div> -->
                </div>
              </div>
            </div>
        </div>
    </section>

    <!-- Testimony Section -->
    <section id="footer" class="footer-section">
        <div class="overlay padding-v30">
            <div class="container">

                    <h2><span class="fa fa-phone" aria-hidden="true"></span></h2>

                    {!! $setting->contact !!}

            </div>
        </div>
    </section>

    @endsection