@extends('layouts.site')

@section('content')

<!-- Intro Section -->
    <section id="intro" class="intro-section-detail">
        
    </section>

    

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="box-contact">
            <div class="row">
              <div class="col-md-8">
                    <div class="map" id="googleMap"></div>
              </div>
              <div class="col-md-4">
                <div class="panel panel-default panel-contact-costum">
                  <div class="panel-heading">Send your Question</div>
                  <div class="panel-body">
                    <form action="{{ url('questions/store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="Full Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Question</label>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-default">Send</button>
                    </form>
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