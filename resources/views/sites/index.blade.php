@extends('layouts.site')

@section('content')
<!-- Intro Section -->
    <section id="intro" class="intro-section">
        <!-- Full Page Image Background Carousel Header -->
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('img/green_city-wide.jpg');"></div>
                    <div class="carousel-caption">
                        <h2>HIRUP UDARA SEGAR SETIAP SAAT</h2>
                        <p>
                            Suasana yang segar dan nyaman dapat membantu aktifitas kita menjadi lebih baik. lingkungan keluarga dan lingkungan pekerjaan akan menjadi hidup. Kebahagiaan akan terjalin dalam kehidupan kita.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('img/photo1.png');"></div>
                    <div class="carousel-caption">
                        <h2>AMAN TIDAK MENYEBABKAN KEBOCORAN</h2>
                        <p>
                            Suasana yang segar dan nyaman dapat membantu aktifitas kita menjadi lebih baik. lingkungan keluarga dan lingkungan pekerjaan akan menjadi hidup. Kebahagiaan akan terjalin dalam kehidupan kita.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('img/photo2.png');"></div>
                    <div class="carousel-caption">
                        <h2>NIKMATI SUASANA SANTAI DENGAN KELUARGA</h2>
                        <p>
                            Suasana yang segar dan nyaman dapat membantu aktifitas kita menjadi lebih baik. lingkungan keluarga dan lingkungan pekerjaan akan menjadi hidup. Kebahagiaan akan terjalin dalam kehidupan kita.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>

        </header>
    </section>

    <!-- Category Section -->
    <section id="category" class="category-section">
        <div class="container">

            <div id="categoryCarousel" class="carousel slide">
                <!-- Indicators -->
                <!-- <ol class="carousel-indicators">
                    <li data-target="#testimonyCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#testimonyCarousel" data-slide-to="1"></li>
                    <li data-target="#testimonyCarousel" data-slide-to="2"></li>
                </ol> -->

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    
                    {{--*/ $active = 'active' /*--}}
                    @foreach(array_chunk($products->all(), 3) as $row)

                                  <div class="item {{ $active }}">
                                      <!-- Set the first background image using inline CSS below. -->
                                      <div class="row">
                                  
                                  @foreach($row as $product)

                                        <div class="col-sm-6 col-md-4">
                                          <h3>{{ $product->title }}</h3>
                                          <img src="{{ asset('upload/img/'.$product->image) }}" alt="..." class="img-thumbnail" width="200">
                                          {!! str_limit($product->description, $limit = 100, $end = '...') !!}
                                          <br/>
                                          <a href="{{ url('product/'.$product->id) }}" class="btn btn-default">VIEW</a>
                                        </div>

                                  @endforeach
                                      </div>
                                  </div>

                    {{--*/ $active = '' /*--}}
                    @endforeach


               
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#categoryCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#categoryCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>

            </div>

            

            



            <br/><br/>

           <!--  <div class="panel panel-default">
               <div class="panel-body">
                   <div class="row">
                     <div class="col-md-2">
                         <img src="{{ asset('img/user3-128x128.jpg') }}" alt="..." class="img-circle">
                     </div>
                     <div class="col-md-10">
                           <h3>Hi, Saya Dewy CEO Service AC, Selamat Datang di Website Kami</h3>
                           <p>
                           Corporate Website Design examples for your inspiration : Making a website just for fun and making a hardcore business website are poles apart. While making a website just for yourself, you can enjoy a complete freehand. However, while making a corporate website design, you need to follow some basic guidelines.
                           </p>
                     </div>
                   </div>
               </div>
           </div> -->

        </div>
    </section>

    <!-- Promo Section -->
    <section id="promo" class="promo-section">
        <div class="container">
            <div class="row">
              <div class="col-md-8">
                    <div class="row">

                    @foreach($articles as $article)

                          <div class="col-md-6">
                        
                              <h3><span class="fa fa-newspaper" aria-hidden="true"></span> <a href="{{ url('article/'.$article->id) }}">{!! $article->title !!}</a></h3>
                              <p><span class="glyphicon glyphicon-time"></span> Posted on {!! $article->created_at !!}</p>
                              {!! str_limit($article->description, $limit = 100, $end = '...') !!}
                            
                      </div>

                    @endforeach

                    </div>
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