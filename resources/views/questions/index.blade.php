@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
          <h1 class="font-green">Questions <small>World!</small></h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb breadcrumb-costum">
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li class="active">Articles</li>
        </ol>
    </div>
</div>

  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" data-target="#panel-body-collapse" style="cursor:pointer">
      <h3 class="panel-title"><i class="fa fa-btn fa-plus"></i>  Questions</h3>
    </div>

                <div class="panel-body collapse" id="panel-body-collapse">
                        <!-- <form> -->
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name">
                          </div>

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                          </div>

                          <div class="form-group">
                            <label for="description">Description</label>
                           <textarea class="form-control" id="description" rows="3" placeholder="Description"></textarea>
                          </div>
                          
                          <hr/>
                          
                          <button type="submit" class="btn btn-primary" id="save" data-link="{{ url('/questions') }}" data-token="{{ csrf_token() }}">
                                <i class="fa fa-btn fa-save"></i>Save
                          </button>

                          <button type="submit" class="btn btn-primary" id="update" data-link="{{ url('/questions') }}" data-token="{{ csrf_token() }}" data-id='' style="display:none">
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
                    Data Qusetions
                </div>
                <div class="panel-body">
                       <table id="dataTable" class="table table-striped" cellspacing="0" width="100%">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Description</th>
                                   <th width="100">Actions</th>
                               </tr>
                           </thead>
                           <tbody id="display-data" data-link="{{ url('/questions') }}" >
                               
                           </tbody>
                       </table>
                </div>
            </div>

@endsection

@section('script')

    <script>
        $('#cancle').click(function() {
            reset();
        });
                
        $('#save').click(function() {
                var url = $(this).attr("data-link");

                var email = $('#email').val();
                var name = $('#name').val();
                var  description = CKEDITOR.instances['description'].getData(); //'ZZZ';//.$('#description').val();

                var data = {
                    _token:$(this).data('token'),
                    'name': name,
                    'description': description,
                    'email': email
                }

                 saveData(url, data) ;

            });

        function setDataEdit(data) {
            $('.collapse').collapse("show");
            $('#save').css({'display':'none'});
            $('#update').css({'display':'block'});

            document.getElementById('update').setAttribute('data-id', data.id);

            document.getElementById("name").value = (data.name);
            CKEDITOR.instances['description'].setData(data.description);

            document.getElementById("email").value = (data.email);
        }

        $('#update').click(function() {
                var id = $(this).attr("data-id");

                var url = $(this).attr("data-link")+'/'+id;
                var email = $('#email').val();
                var name = $('#name').val();
                var  description = CKEDITOR.instances['description'].getData(); //.$('#description').val();

                var data = {
                    _token:$(this).data('token'),
                    _method: 'PUT',
                    'name': name,
                    'description': description,
                    'email': email
                }

                 updateData(url, data) ;
        })

        function reset()
        {
            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
            //document.getElementById("description").value = "";
            CKEDITOR.instances['description'].setData('');

            /*$(".image-crop-result img#avatar").remove();
            $(".image-crop-result img#old-avatar").remove();*/
            $('.collapse').collapse("hide");
        }

    </script>

@endsection