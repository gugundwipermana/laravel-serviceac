@extends('layouts.site')

@section('content')

<!-- Intro Section -->
    <section id="intro" class="intro-section-detail">
        
    </section>

    

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        
        <div class="container" style="height: 100%">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Page Heading
                        <small>Secondary Text</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <!-- Projects Row -->
            <div class="row">

                @foreach($galleries as $gallery)
                <div class="col-md-3 portfolio-item">
                    <a href="#" data-toggle="modal" data-target="#myModalGal1">
                        <img class="img-responsive" src="{{ asset('upload/img/'.$gallery->image) }}" alt="">
                    </a>
                </div>
                @endforeach
        
            </div>
            <!-- /.row -->

            

            <hr>

            <!-- Pagination -->
           {!! $galleries->render() !!}
            <!-- /.row -->

        </div>


    </section>

    <!-- MODAL GALLERY -->
        <div class="modal fade modal-gall" id="myModalGal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-gall">
              <div class="modal-header modal-header-gall">
                <button type="button" class="close close-gall" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body" style="text-align:center">
                <img src="img/gal1.jpeg" />
              </div>
            </div>
          </div>
        </div> 
        

    <!-- END MODAL -->


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