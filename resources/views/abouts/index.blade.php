@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
          <h1 class="font-green">Abouts <small>World!</small></h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb breadcrumb-costum">
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li class="active">About</li>
        </ol>
    </div>
</div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Abouts</h3>
    </div>
    
                <div class="panel-body collapse" id="panel-body-collapse">
                        <!-- <form> -->
                          <div class="form-group">
                            <label for="description">Description</label>
                           <textarea class="form-control" id="description" rows="3" placeholder="Description"></textarea>
                          </div>
                          

                          <div class="panel panel-default">
                            <div class="panel-heading">
                                Create Image
                            </div>
                            <div class="panel-body">
                                   
                                <div class="row">
                                  <div class="col-md-6">

                                    <!-- crop image -->
                                    <div class="imageBox">
                                      <div class="mask"></div>
                                      <div class="thumbBox"></div>
                                      <div class="spinner" style="display: none">Loading...</div>
                                    </div>
                                    <div class="tools clearfix">

                                      <div class="upload-wrapper">
                                        Pilih Gambar
                                        <input type="file" id="upload-file" value="Upload" />
                                      </div>

                                      <span id="zoomIn">-</span>
                                      <span id="zoomOut">+</span>
                                      <span id="crop">Crop</span>
                                    </div>

                                  </div>
                                  <div class="col-md-6">
                                    <div class="image-crop-result"></div>
                                  </div>
                                </div>

                            </div>
                        </div>
                          
                          <hr/>
                          
                          <!-- <button type="submit" class="btn btn-primary" id="save" data-link="{{ url('/abouts') }}" data-token="{{ csrf_token() }}">
                                <i class="fa fa-btn fa-save"></i>Save
                          </button> -->

                          <button type="submit" class="btn btn-primary" id="update" data-link="{{ url('/abouts') }}" data-token="{{ csrf_token() }}" data-id='' > <!-- style="display:none" -->
                                <i class="fa fa-btn fa-save"></i>Update
                          </button>

                          <button type="submit" class="btn btn-default" id="cancle">
                                <i class="fa fa-btn fa-cross"></i>Cancle
                          </button>


                        
                       <!--  </form> -->
                    
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Products
                </div>
                <div class="panel-body">
                       
                        <div id="display-data" data-link="{{ url('/abouts') }}" ></div>

                </div>
            </div>

@endsection

@section('script')

    <script>
        $('#cancle').click(function() {
            reset();
        });

        function setDataEdit(data) {
            $('.collapse').collapse("show");
            $('#save').css({'display':'none'});
            $('#update').css({'display':'block'});

            document.getElementById('update').setAttribute('data-id', data.id);

            /*document.getElementById("title").value = (data.title);*/
            CKEDITOR.instances['description'].setData(data.description);

            var src = 'upload/img/'+data.image;
            $(".image-crop-result").append("<img id='old-avatar' src= '"+src+"' />");
        }

        $('#update').click(function() {
                var id = $(this).attr("data-id");

                var url = $(this).attr("data-link")+'/'+id;
                var image = $('#avatar').attr('src');

               /* var title = $('#title').val();*/
                var  description = CKEDITOR.instances['description'].getData(); //.$('#description').val();

                var data = {
                    _token:$(this).data('token'),
                    _method: 'PUT',
                    /*'title': title,*/
                    'description': description,
                    'image': image
                }

                 updateData(url, data) ;
        })

        function reset()
        {
            /*document.getElementById("title").value = "";*/
            //document.getElementById("description").value = "";
            CKEDITOR.instances['description'].setData('');

            $(".image-crop-result img#avatar").remove();
            $(".image-crop-result img#old-avatar").remove();
            $('.collapse').collapse("hide");
        }

    </script>

    <!-- =================================== CROP IMAGE -->
    <script>

  $(function() {

    var rot = 0, ratio = 1;
    var CanvasCrop = $.CanvasCrop({
      cropBox: ".imageBox",
      imgSrc : "{{ asset('/img/user.jpg') }}",
      limitOver: 2
    });

    $('#upload-file').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        CanvasCrop = $.CanvasCrop({
          cropBox: ".imageBox",
          imgSrc : e.target.result,
          limitOver: 2
        });
        rot = 0;
        ratio = 1;
      }

      reader.readAsDataURL(this.files[0]);
      this.files = [];
    });

    $("#crop").on("click", function() {
      var src = CanvasCrop.getDataURL("jpeg");

      $(".image-crop-result img#avatar").remove();

      $(".image-crop-result").append("<img id='avatar' src= '"+src+"' />");
    });

    $("#zoomIn").on("click", function() {
      ratio = ratio * 0.9;
      CanvasCrop.scale(ratio);
    });

    $("#zoomOut").on("click", function() {
      ratio = ratio * 1.1;
      CanvasCrop.scale(ratio);
    });

  });

    </script>

@endsection