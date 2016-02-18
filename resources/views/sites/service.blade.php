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
                    

                    {!! $service->description !!}
                    
                    <div class="margin-bottom50"></div>

                    <a class="btn btn-default" href="">Hubungi Kami Sekarang</a>

                    <div class="margin-bottom50"></div>

              </div>

              <div class="col-md-4">
                  <div class="thumbnail">
                  <img src="{{ asset('upload/img/'.$setting->image) }}" alt="..." class="">
                  <div class="caption">
                    {!! $setting->quote !!}
                  </div>
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