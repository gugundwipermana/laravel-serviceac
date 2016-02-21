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
                    

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                @foreach($articles as $article)
                
                <div class="row">
                    <div class="col-md-5">
                        <img class="img-responsive img-thumbnail" src="{{ asset('/upload/img/'.$article->image) }}" alt="">
                    </div>
                    <div class="col-md-7">
                        <h2><a href="{{ url('article/'.$article->id) }}">{!! $article->title !!}</a></h2>
                        <p><span class="fa fa-calendar"></span> Posted on {{ date('d F Y', strtotime($article->created_at)) }}</p>
                         <p>by <a href="">{{ $article->user->name }}</a></p/public_html/serviceac/resources/views/sites>
                        {!! str_limit($article->description, $limit = 100, $end = '...') !!}
                        <br/>
                        <a class="btn btn-primary" href="{{ url('article/'.$article->id) }}">Read More <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>
                <hr>
                <br/>
                @endforeach
                

                <hr>

                <!-- Pager -->
                {!! $articles->render() !!}

                

               <!--  <ul class="pager">
                   <li class="previous">
                       <a href="#">&larr; Older</a>
                   </li>
                   <li class="next">
                       <a href="#">Newer &rarr;</a>
                   </li>
               </ul> -->
                    

              </div>
              <div class="col-md-4">
                    <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div> 
                    <!-- /.input-group -->
                </div>


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